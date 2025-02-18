###
#    Copyright (c) ppy Pty Ltd <contact@ppy.sh>.
#
#    This file is part of osu!web. osu!web is distributed with the hope of
#    attracting more community contributions to the core ecosystem of osu!.
#
#    osu!web is free software: you can redistribute it and/or modify
#    it under the terms of the Affero GNU General Public License version 3
#    as published by the Free Software Foundation.
#
#    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
#    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
#    See the GNU Affero General Public License for more details.
#
#    You should have received a copy of the GNU Affero General Public License
#    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
###

import { CommentEditor } from 'comment-editor'
import { CommentShowMore } from 'comment-show-more'
import DeletedCommentsCount from 'deleted-comments-count'
import * as React from 'react'
import { a, button, div, span, textarea } from 'react-dom-factories'
import { ReportComment } from 'report-comment'
import { Spinner } from 'spinner'
import { UserAvatar } from 'user-avatar'

el = React.createElement

deletedUser = username: osu.trans('users.deleted')

export class Comment extends React.PureComponent
  MAX_DEPTH = 6

  makePreviewElement = document.createElement('div')

  makePreview = (comment) ->
    if comment.deleted_at?
      osu.trans('comments.deleted')
    else
      makePreviewElement.innerHTML = comment.message_html
      _.truncate makePreviewElement.textContent, length: 100


  getChildren = (props) ->
    props.commentsByParentId?[props.comment.id] ? []


  @defaultProps =
    showDeleted: true
    showReplies: true


  constructor: (props) ->
    super props

    @xhr = {}
    @loadMoreRef = React.createRef()

    if osu.isMobile()
      # There's no indentation on mobile so don't expand by default otherwise it will be confusing.
      expandReplies = false
    else if @isDeleted()
      expandReplies = false
    else
      @children = getChildren(@props)
      # Collapse if either no children is loaded or current level doesn't add indentation.
      expandReplies = @children.length > 0 && @props.depth < MAX_DEPTH

    @state =
      postingVote: false
      editing: false
      showNewReply: false
      expandReplies: expandReplies


  componentDidUpdate: (prevProps) =>
    prevChildren = getChildren(prevProps)
    currentChildren = getChildren(@props)

    # force expand when replying (adding child)
    if !@state.expandReplies && prevChildren.length == 0 && currentChildren.length > 0
      @setState expandReplies: true


  componentWillUnmount: =>
    xhr?.abort() for own _name, xhr of @xhr


  render: =>
    @children = getChildren(@props)
    user = @userFor(@props.comment)
    parent = @props.comment.parent ? @props.parent

    modifiers = @props.modifiers?[..] ? []
    modifiers.push 'top' if @props.depth == 0

    repliesClass = 'comment__replies'
    repliesClass += ' comment__replies--indented' if @props.depth < MAX_DEPTH
    repliesClass += ' comment__replies--hidden' if !@state.expandReplies

    div
      className: osu.classWithModifiers 'comment', modifiers

      if @props.depth == 0 && @children.length > 0
        div className: 'comment__float-container comment__float-container--right',
          button
            className: 'comment__top-show-replies'
            type: 'button'
            onClick: @toggleReplies
            span className: "fas #{if @state.expandReplies then 'fa-angle-up' else 'fa-angle-down'}"

      if @props.showCommentableMeta
        @commentableMeta()

      div className: "comment__main #{if @isDeleted() then 'comment__main--deleted' else ''}",
        if @canHaveVote()
          div className: 'comment__float-container comment__float-container--left hidden-xs',
            @renderVoteButton()

        if user.id?
          a
            className: 'comment__avatar js-usercard'
            'data-user-id': user.id
            href: laroute.route('users.show', user: user.id)
            el UserAvatar, user: user, modifiers: ['full-circle']
        else
          span
            className: 'comment__avatar'
            el UserAvatar, user: user, modifiers: ['full-circle']
        div className: 'comment__container',
          div className: 'comment__row comment__row--header',
            if user.id?
              a
                'data-user-id': user.id
                href: laroute.route('users.show', user: user.id)
                className: 'js-usercard comment__row-item comment__row-item--username comment__row-item--username-link'
                user.username
            else
              span
                className: 'comment__row-item comment__row-item--username'
                user.username

            if parent?
              span
                className: 'comment__row-item comment__row-item--parent'
                @parentLink(parent)

            if @isDeleted()
              span
                className: 'comment__row-item comment__row-item--deleted'
                osu.trans('comments.deleted')

          if @state.editing
            div className: 'comment__editor',
              el CommentEditor,
                id: @props.comment.id
                message: @props.comment.message
                modifiers: @props.modifiers
                close: @closeEdit
          else if @props.comment.message_html?
            div
              className: 'comment__message',
              dangerouslySetInnerHTML:
                __html: @props.comment.message_html

          div className: 'comment__row comment__row--footer',
            if @canHaveVote()
              div
                className: 'comment__row-item visible-xs'
                @renderVoteText()

            div
              className: 'comment__row-item comment__row-item--info'
              dangerouslySetInnerHTML: __html: osu.timeago(@props.comment.created_at)

            div className: 'comment__row-item',
              a
                href: laroute.route('comments.show', comment: @props.comment.id)
                className: 'comment__action comment__action--permalink'
                osu.trans('common.buttons.permalink')

            if @props.showReplies && !@isDeleted()
              div className: 'comment__row-item',
                button
                  type: 'button'
                  className: "comment__action #{if @state.showNewReply then 'comment__action--active' else ''}"
                  onClick: @toggleNewReply
                  osu.trans('common.buttons.reply')

            if @canEdit()
              div className: 'comment__row-item',
                button
                  type: 'button'
                  className: "comment__action #{if @state.editing then 'comment__action--active' else ''}"
                  onClick: @toggleEdit
                  osu.trans('common.buttons.edit')

            if @isDeleted() && @canRestore()
              div className: 'comment__row-item',
                button
                  type: 'button'
                  className: 'comment__action'
                  onClick: @restore
                  osu.trans('common.buttons.restore')

            if !@isDeleted() && @canDelete()
              div className: 'comment__row-item',
                button
                  type: 'button'
                  className: 'comment__action'
                  onClick: @delete
                  osu.trans('common.buttons.delete')

            if @canReport()
              div className: 'comment__row-item',
                el ReportComment,
                  className: 'comment__action'
                  comment: @props.comment
                  user: @userFor(@props.comment)

            @renderRepliesText()

            if !@isDeleted() && @props.comment.edited_at?
              editor = @props.usersById[@props.comment.edited_by_id] ? deletedUser
              div
                className: 'comment__row-item comment__row-item--info'
                dangerouslySetInnerHTML:
                  __html: osu.trans 'comments.edited',
                    timeago: osu.timeago(@props.comment.edited_at)
                    user:
                      if editor.id?
                        osu.link(laroute.route('users.show', user: editor.id), editor.username, classNames: ['comment__link'])
                      else
                        _.escape editor.username

          if @state.showNewReply
            div className: 'comment__reply-box',
              el CommentEditor,
                parent: @props.comment
                close: @closeNewReply
                modifiers: @props.modifiers

      if @props.showReplies && @props.comment.replies_count > 0
        div
          className: repliesClass
          @children.map @renderComment

          el DeletedCommentsCount, { comments: @children, showDeleted: @props.showDeleted }

          el CommentShowMore,
            parent: @props.comment
            sort: @props.currentSort
            comments: @children
            moreComments: @props.moreComments
            total: @props.comment.replies_count
            modifiers: @props.modifiers
            label: osu.trans('comments.load_replies') if @children.length == 0
            ref: @loadMoreRef


  renderComment: (comment) =>
    return null if comment.deleted_at? && !@props.showDeleted

    el Comment,
      key: comment.id
      comment: comment
      commentsByParentId: @props.commentsByParentId
      usersById: @props.usersById
      userVotesByCommentId: @props.userVotesByCommentId
      commentableMetaById: @props.commentableMetaById
      depth: @props.depth + 1
      parent: @props.comment
      modifiers: @props.modifiers
      currentSort: @props.currentSort
      moreComments: @props.moreComments
      showDeleted: @props.showDeleted


  renderRepliesText: =>
    return if @props.comment.replies_count == 0

    if @props.showReplies
      if !@state.expandReplies && @children.length == 0
        onClick = @loadReplies
        label = osu.trans('comments.load_replies')
      else
        onClick = @toggleReplies
        label = "#{osu.trans('comments.replies')} (#{osu.formatNumber(@props.comment.replies_count)})"

      label = "[#{if @state.expandReplies then '-' else '+'}] #{label}"

      div className: 'comment__row-item',
        button
          type: 'button'
          className: 'comment__action'
          onClick: onClick
          label
    else
      div className: 'comment__row-item',
        osu.trans('comments.replies')
        ': '
        osu.formatNumber(@props.comment.replies_count)


  renderVoteButton: =>
    className = osu.classWithModifiers('comment-vote', @props.modifiers)
    className += ' comment-vote--posting' if @state.postingVote

    if @hasVoted()
      className += ' comment-vote--on'
      hover = null
    else
      className += ' comment-vote--off'
      hover = div className: 'comment-vote__hover', '+1'

    button
      className: className
      type: 'button'
      onClick: @voteToggle
      disabled: @state.postingVote || !@canVote()
      span className: 'comment-vote__text',
        "+#{osu.formatNumberSuffixed(@props.comment.votes_count, null, maximumFractionDigits: 1)}"
      if @state.postingVote
        span className: 'comment-vote__spinner', el Spinner
      hover


  renderVoteText: =>
    className = 'comment__action'
    className += ' comment__action--active' if @hasVoted()

    button
      className: className
      type: 'button'
      onClick: @voteToggle
      disabled: @state.postingVote
      "+#{osu.formatNumberSuffixed(@props.comment.votes_count, null, maximumFractionDigits: 1)}"


  canDelete: =>
    @canModerate() || @isOwner()


  canEdit: =>
    @canModerate() || (@isOwner() && !@isDeleted())


  canHaveVote: =>
    !@isDeleted()


  canModerate: =>
    currentUser.is_admin || currentUser.can_moderate


  canReport: =>
    currentUser.id? && @props.comment.user_id != currentUser.id


  canRestore: =>
    @canModerate()


  canVote: =>
    !@isOwner()


  commentableMeta: =>
    meta = @props.commentableMetaById["#{@props.comment.commentable_type}-#{@props.comment.commentable_id}"]
    meta ?= @props.commentableMetaById['-']

    if meta.url
      component = a
      params =
        href: meta.url
        className: 'comment__link'
    else
      component = span
      params = null

    div className: 'comment__commentable-meta',
      if @props.comment.commentable_type?
        span className: 'comment__commentable-meta-type',
          span className: 'comment__commentable-meta-icon fas fa-comment'
          ' '
          osu.trans("comments.commentable_name.#{@props.comment.commentable_type}")
      component params,
        meta.title


  isOwner: =>
    @props.comment.user_id? && @props.comment.user_id == currentUser.id


  hasVoted: =>
    @props.userVotesByCommentId[@props.comment.id]?


  delete: =>
    return unless confirm(osu.trans('common.confirmation'))

    @xhr.delete?.abort()
    @xhr.delete = $.ajax laroute.route('comments.destroy', comment: @props.comment.id),
      method: 'DELETE'
    .done (data) =>
      $.publish 'comment:updated', comment: data
    .fail (xhr, status) =>
      return if status == 'abort'

      osu.ajaxError xhr


  toggleEdit: =>
    @setState editing: !@state.editing


  closeEdit: =>
    @setState editing: false


  isDeleted: =>
    @props.comment.deleted_at?


  loadReplies: =>
    @loadMoreRef.current?.load()
    @toggleReplies()


  parentLink: (parent) =>
    props = title: makePreview(parent)

    if @props.linkParent
      component = a
      props.href = laroute.route('comments.show', comment: parent.id)
      props.className = 'comment__link'
    else
      component = span

    component props,
      span className: 'fas fa-reply'
      ' '
      @userFor(parent).username


  userFor: (comment) =>
    user = @props.usersById[comment.user_id] ? comment.user

    if user?
      user
    else if comment.legacy_name?
      username: comment.legacy_name
    else
      deletedUser


  restore: =>
    @xhr.restore?.abort()
    @xhr.restore = $.ajax laroute.route('comments.restore', comment: @props.comment.id),
      method: 'POST'
    .done (data) =>
      $.publish 'comment:updated', comment: data
    .fail (xhr, status) =>
      return if status == 'abort'

      osu.ajaxError xhr


  toggleNewReply: =>
    @setState showNewReply: !@state.showNewReply


  voteToggle: (e) =>
    target = e.target

    if !currentUser.id?
      userLogin.show target

      return

    @setState postingVote: true

    if @hasVoted()
      method = 'DELETE'
      voteAction = 'removed'
    else
      method = 'POST'
      voteAction = 'added'

    @xhr.vote?.abort()
    @xhr.vote = $.ajax laroute.route('comments.vote', comment: @props.comment.id),
      method: method
    .always =>
      @setState postingVote: false
    .done (data) =>
      $.publish 'comment:updated', comment: data
      $.publish "commentVote:#{voteAction}", id: @props.comment.id
    .fail (xhr, status) =>
      return if status == 'abort'
      return $(target).trigger('ajax:error', [xhr, status]) if xhr.status == 401

      osu.ajaxError xhr


  closeNewReply: =>
    @setState showNewReply: false


  toggleReplies: =>
    @setState expandReplies: !@state.expandReplies

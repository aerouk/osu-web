<?php

/**
 *    Copyright (c) ppy Pty Ltd <contact@ppy.sh>.
 *
 *    This file is part of osu!web. osu!web is distributed with the hope of
 *    attracting more community contributions to the core ecosystem of osu!.
 *
 *    osu!web is free software: you can redistribute it and/or modify
 *    it under the terms of the Affero GNU General Public License version 3
 *    as published by the Free Software Foundation.
 *
 *    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
 *    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *    See the GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
 */

return [
    'cancel' => '取消',

    'authorise' => [
        'authorise' => '授权',
        'request' => '正在请求访问你的账户',
        'scopes_title' => '该应用将可以：',
        'title' => '授权请求',

        'wrong_user' => [
            '_' => '你正以 :user 登录。:logout_link。',
            'logout_link' => '点此切换用户',
        ],
    ],

    'authorized_clients' => [
        'confirm_revoke' => '你确定要撤回给予的权限吗？',
        'scopes_title' => '此应用能够：',
        'owned_by' => '由 :user 拥有',
        'none' => '无授权第三方',

        'revoked' => [
            'false' => '',
            'true' => '',
        ],
    ],

    'client' => [
        'id' => '',
        'name' => '应用名称',
        'redirect' => '应用回调链接',
        'secret' => '',
    ],

    'login' => [
        'download' => '点此以下载游戏并创建账号',
        'label' => '首先，让我们登录你的账号',
        'title' => '账号登录',
    ],

    'own_clients' => [
        'confirm_delete' => '你确定想要删除这个客户端？',
        'new' => '新的 OAuth 应用',
        'none' => '',

        'revoked' => [
            'false' => '删除',
            'true' => '已删除',
        ],
    ],
];

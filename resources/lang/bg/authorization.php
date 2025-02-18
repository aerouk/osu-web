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
    'beatmap_discussion' => [
        'destroy' => [
            'is_hype' => 'Не може да отмените надъхването.',
            'has_reply' => 'Не може да изтриете дискусия с отговори',
        ],
        'nominate' => [
            'exhausted' => 'Вие стигнахте вашия лимит за номиниране за деня, моля опитайте пак утре.',
            'full_bn_required' => '',
            'full_bn_required_hybrid' => '',
            'incorrect_state' => 'Грешка при извършване на това действие, опитайте да презаредите страницата.',
            'owner' => "Не може да номинирате собствения си бийтмап.",
        ],
        'resolve' => [
            'not_owner' => 'Само автор и притежател на бийтмап могат да разрешат дискусия.',
        ],

        'store' => [
            'mapper_note_wrong_user' => 'Само собственикът на биийтмапа или номинатор/член на QAT групата може да публикува бележки по картата.',
        ],

        'vote' => [
            'limit_exceeded' => 'Моля изчакайте малко преди да гласувате отново',
            'owner' => "Не може да гласувате на собствена дискусия.",
            'wrong_beatmapset_state' => 'Може да се гласува само в дускусии на бийтмапове чакащи одобрение.',
        ],
    ],

    'beatmap_discussion_post' => [
        'edit' => [
            'system_generated' => 'Автоматично създанената публикация не може да бъде редактирана.',
            'not_owner' => 'Само създателят на публикацията може да я редактира.',
        ],
        'store' => [
            'beatmapset_locked' => '',
        ],
    ],

    'chat' => [
        'blocked' => 'Не може да пращате съобщения на потребител, който ви блокира, или сте го блокирали.',
        'friends_only' => 'Потребителят блокира съобщенията от всички, които не са в списъка му с приятели.',
        'moderated' => 'Този канал в момента бива модериран.',
        'no_access' => 'Нямате достъп до този канал.',
        'restricted' => 'Не може да пращате съобщения докато сте заклушени, в ограничен режим или баннати.',
    ],

    'comment' => [
        'update' => [
            'deleted' => "Не може да редактирате вече изтрити публикации.",
        ],
    ],

    'contest' => [
        'voting_over' => 'Не можете да промените гласа си след като периода за гласуване е свършил.',
    ],

    'forum' => [
        'moderate' => [
            'no_permission' => 'Нямате право да модерирате този форум.',
        ],

        'post' => [
            'delete' => [
                'only_last_post' => 'Само последната публикация може да бъде изтрита.',
                'locked' => 'Не може да изтриете публикация в заключена тема.',
                'no_forum_access' => 'Достъп до исканият форум е нужен.',
                'not_owner' => 'Само създателят на публицатията може да я изтрие.',
            ],

            'edit' => [
                'deleted' => 'Не можете да редактирате изтрита публикация.',
                'locked' => 'Тази публикация е заключена от редактиране.',
                'no_forum_access' => 'Достъп до исканият форум е нужен.',
                'not_owner' => 'Само създателят на публикацията може да я редактира.',
                'topic_locked' => 'Не може да изтриете публикация в заключена тема.',
            ],

            'store' => [
                'play_more' => 'Опитайте се да играете играта преди да публикувате във форумите, моля! Ако имате проблем с играта, моля направете пост във форума за Помощ и Поддръжка.',
                'too_many_help_posts' => "Трябва да играете играта повече, преди да можете да направите допълнителни публикации. Ако все още срещате проблеми с играта, пишете имейл към support@ppy.sh", // FIXME: unhardcode email address.
            ],
        ],

        'topic' => [
            'reply' => [
                'double_post' => 'Моля редактирайте последната Ви публикация вместо да публикувате отново.',
                'locked' => 'Не можете да отговаряте във заключен форум.',
                'no_forum_access' => 'Достъп до исканият форум е нужен.',
                'no_permission' => 'Няма разрешение за отговор.',

                'user' => [
                    'require_login' => 'Моля влезте в профила си за да отговорите.',
                    'restricted' => "Не може да отговорите докато сте с ограничен статут.",
                    'silenced' => "Не може да отговорите докато сте заглушен.",
                ],
            ],

            'store' => [
                'no_forum_access' => 'Достъп до исканият форум е нужен.',
                'no_permission' => 'Няма разрешение за създаване на нова тема.',
                'forum_closed' => 'Форумът е затворен и не може да се публикува в него.',
            ],

            'vote' => [
                'no_forum_access' => 'Достъп до исканият форум е нужен.',
                'over' => 'Гласуването е приключило, не може да се гласува повече.',
                'play_more' => '',
                'voted' => 'Промяната на глас не е разрешена.',

                'user' => [
                    'require_login' => 'Моля влезте в профила си, за да гласувате.',
                    'restricted' => "Не може да гласувате докато сте с ограничен статут.",
                    'silenced' => "Не може да гласувате докато сте заглушен.",
                ],
            ],

            'watch' => [
                'no_forum_access' => 'Достъп до исканият форум е нужен.',
            ],
        ],

        'topic_cover' => [
            'edit' => [
                'uneditable' => 'Невалидна зададена корица.',
                'not_owner' => 'Само собственикът може да редактира корицата.',
            ],
            'store' => [
                'forum_not_allowed' => '',
            ],
        ],

        'view' => [
            'admin_only' => 'Само админ може да види този форум.',
        ],
    ],

    'require_login' => 'Моля влезте в профила си, за да продължите.',

    'unauthorized' => 'Достъпът е отказан.',

    'silenced' => "Не може докато сте заглушен.",

    'restricted' => "Не може да правите това докато сте с ограничен статут.",

    'user' => [
        'page' => [
            'edit' => [
                'locked' => 'Профилната страница е заключена.',
                'not_owner' => 'Може да редактирате само собствената си профилна страница.',
                'require_supporter_tag' => 'необходим е osu!supporter',
            ],
        ],
    ],
];

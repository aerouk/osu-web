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
    'deleted' => '[odstraněný uživatel]',

    'beatmapset_activities' => [
        'title' => ":user's modding historie",
        'title_compact' => 'Módování',

        'discussions' => [
            'title_recent' => 'Nedávno zahájená diskuze',
        ],

        'events' => [
            'title_recent' => 'Nedávné události',
        ],

        'posts' => [
            'title_recent' => 'Poslední příspěvky',
        ],

        'votes_received' => [
            'title_most' => 'Nejlépe hodnocený za (poslední 3 měsíce)',
        ],

        'votes_made' => [
            'title_most' => 'Nejlépe hodnocený (poslední 3 měsíce)',
        ],
    ],

    'blocks' => [
        'banner_text' => 'Uživatel byl zablokován.',
        'blocked_count' => 'blokovaných uživatelů (:count)',
        'hide_profile' => 'skrýt profil',
        'not_blocked' => 'Tento uživatel není blokován.',
        'show_profile' => 'zobrazit profil',
        'too_many' => 'Byl dosažen limit blockovaných uživatelů.',
        'button' => [
            'block' => 'blokovat',
            'unblock' => 'odblokovat',
        ],
    ],

    'card' => [
        'loading' => 'Načítání...',
        'send_message' => 'odeslat zprávu',
    ],

    'login' => [
        '_' => 'Přihlásit se',
        'locked_ip' => 'vaše IP adresa je uzamčena. Počkejte, prosím, několik minut.',
        'username' => 'Uživatelské jméno',
        'password' => 'Heslo',
        'button' => 'Přihlásit se',
        'button_posting' => 'Probíhá přihlášení...',
        'remember' => 'Pamatovat si tento počítač',
        'title' => 'Pro pokračování se prosím přihlašte',
        'failed' => 'Nesprávné přihlášení',
        'register' => "Nemáš osu! účet? Vytvoř si ho",
        'forgot' => 'Zapoměl jsi heslo?',
        'beta' => [
            'main' => 'Beta přístup je momentálně omezen na oprávněné uživatele.',
            'small' => '(brzy pro podporovatele)',
        ],

        'here' => 'zde', // this is substituted in when generating a link above. change it to suit the language.
    ],

    'posts' => [
        'title' => ':username\'s příspěvky',
    ],

    'signup' => [
        '_' => 'Registrace',
    ],
    'anonymous' => [
        'login_link' => 'klikněte pro přihlášení',
        'login_text' => 'přihlásit se',
        'username' => 'Návštěvník',
        'error' => 'Pro tuto akci musíte být přihlášeni.',
    ],
    'logout_confirm' => 'Opravdu se chceš odhlásit? :(',
    'report' => [
        'button_text' => 'nahlásit',
        'comments' => 'Přídavné komentáře',
        'placeholder' => 'Prosím uveďte jakékoliv informace které si myslíte že by mohly být užitečně.',
        'reason' => 'Důvod',
        'thanks' => 'Děkují za vaše nahlášení!',
        'title' => 'Nahlásit :username?',

        'actions' => [
            'send' => 'Poslat Nahlášení',
            'cancel' => 'Zrušit',
        ],

        'options' => [
            'cheating' => 'Faulové hráni / Podvádění',
            'insults' => 'Uráží mě / jiné',
            'spam' => 'Spamování',
            'unwanted_content' => 'Linkovaní nebezpečného obsahu',
            'nonsense' => 'Nesmysl',
            'other' => 'Ostatní (napište dolů)',
        ],
    ],
    'restricted_banner' => [
        'title' => 'Tvůj účet byl omezen!',
        'message' => 'Zatímco jsi v omezeném režimu, nebudeš moci komunikovat s ostatními hráči a tvá skóre budou viditelná pouze pro tebe. Toto je obvykle výsledkem automatického procesu který by se měl sám vyřešit do nejpozději 24 hodin. Pokud si přeješ odvolat tvé omezení, prosím <a href="mailto:accounts@ppy.sh">kontaktujte podporu</a>.',
    ],
    'show' => [
        'age' => ':age let',
        'change_avatar' => 'změňte si avatar!',
        'first_members' => 'Zde od počátku',
        'is_developer' => 'osu!vývojář',
        'is_supporter' => 'osu!supporter',
        'joined_at' => 'Členem od :date',
        'lastvisit' => 'Naposledy spatřen :date',
        'lastvisit_online' => 'Momentálně aktivní',
        'missingtext' => 'Možná jste se přepsal! (nebo byl uživatel zabanován)',
        'origin_country' => 'Z :country',
        'page_description' => 'osu! - Všechno co jste kdy chtěli vědět o :username!',
        'previous_usernames' => 'dříve znám jako',
        'plays_with' => 'Hraje s :devices',
        'title' => "profil uživatele :username",

        'edit' => [
            'cover' => [
                'button' => 'Změnit záhlaví profilu',
                'defaults_info' => 'Více možností záhlaví bude k dispozici v budoucnu',
                'upload' => [
                    'broken_file' => 'Zpracování obrázku selhalo. Ověř si obrázek a zkus to znovu.',
                    'button' => 'Nahrát obrázek',
                    'dropzone' => 'Přetáhni sem pro nahrání',
                    'dropzone_info' => 'Můžeš také přetánout sem pro nahrání',
                    'size_info' => 'Velikost záhlaví by měla být 2800x620',
                    'too_large' => 'Nahraný soubor je příliš velký.',
                    'unsupported_format' => 'Nepodporovaný formát.',

                    'restriction_info' => [
                        '_' => '',
                        'link' => '',
                    ],
                ],
            ],

            'default_playmode' => [
                'is_default_tooltip' => 'výchozí herní mód',
                'set' => 'nastavit :mode jako výchozí herní mód profilu',
            ],
        ],

        'extra' => [
            'followers' => '1 sledující |:count followers',
            'none' => '',
            'unranked' => 'Žádné poslední údaje o hraní',

            'achievements' => [
                'achieved-on' => 'Dosaženo :date',
                'locked' => 'Uzamknuto',
                'title' => 'Úspěchy',
            ],
            'beatmaps' => [
                'by_artist' => 'autora :artist',
                'none' => 'Žádná... zatím.',
                'title' => 'Beatmapy',

                'favourite' => [
                    'title' => 'Oblíbené Beatmapy',
                ],
                'graveyard' => [
                    'title' => 'Pohřbené Beatmapy',
                ],
                'loved' => [
                    'title' => 'Oblíbené Beatmapy',
                ],
                'ranked_and_approved' => [
                    'title' => 'Hodnocené & Schválené Beatmapy',
                ],
                'unranked' => [
                    'title' => 'Čekající Beatmapy',
                ],
            ],
            'discussions' => [
                'title' => '',
                'title_longer' => '',
                'show_more' => '',
            ],
            'events' => [
                'title' => '',
                'title_longer' => '',
                'show_more' => '',
            ],
            'historical' => [
                'empty' => 'Žádné výkonnostní záznamy. :(',
                'title' => 'Historické',

                'monthly_playcounts' => [
                    'title' => 'Herní historie',
                    'count_label' => 'Her',
                ],
                'most_played' => [
                    'count' => 'odehraný čas',
                    'title' => 'Nejhranější mapy',
                ],
                'recent_plays' => [
                    'accuracy' => 'přesnost: :percentage',
                    'title' => 'Nedávno zahráno (24h)',
                ],
                'replays_watched_counts' => [
                    'title' => 'Historie zhlédnutí replayů',
                    'count_label' => 'Záznamů přehráno',
                ],
            ],
            'kudosu' => [
                'available' => 'Kudosu k dispozici',
                'available_info' => "Kudosu mohou být směněny za kudosu hvězdy, které pomohou Vaší mapě získat víc pozornosti. Toto je počet kudosu které jste ještě nesměnili.",
                'recent_entries' => 'Nedávná Kudosu historie',
                'title' => 'Kudosu!',
                'total' => 'Celkově získané Kudosu',

                'entry' => [
                    'amount' => ':amount kudosu',
                    'empty' => "Tento uživatel zatím neobdržel žádné kudosu!",

                    'beatmap_discussion' => [
                        'allow_kudosu' => [
                            'give' => 'Obdržel jsi :amount kudosu z kudosu odmítnutí, z módding příspěvku :post',
                        ],

                        'deny_kudosu' => [
                            'reset' => 'Bylo odepřeno :amount z modding příspěvku :post',
                        ],

                        'delete' => [
                            'reset' => 'Ztraceno :amount kvůli smazání modding příspěvku :post',
                        ],

                        'restore' => [
                            'give' => 'Obdrženo :amount za obnovení modding příspěvku :post',
                        ],

                        'vote' => [
                            'give' => 'Obdrženo :amount za získání hlasů u modding příspěvku :post',
                            'reset' => 'Ztraceno :amount za ztrátu hlasů u modding příspěvku :post',
                        ],

                        'recalculate' => [
                            'give' => 'Obdrženo :amount za přepočítání hlasů u modding příspěvku :post',
                            'reset' => 'Ztraceno :amount za přepočítání hlasů u modding příspěvku :post',
                        ],
                    ],

                    'forum_post' => [
                        'give' => 'Obdrženo :amount od :giver za příspěvek u :post',
                        'reset' => 'Kudosu bylo obnoveno od :giver za příspěvek :post',
                        'revoke' => 'Odepřeno kudosu od :giver za příspěvek :post',
                    ],
                ],

                'total_info' => [
                    '_' => '',
                    'link' => '',
                ],
            ],
            'me' => [
                'title' => 'já!',
            ],
            'medals' => [
                'empty' => "Tento uživatel zatím žádné neobdržel ;_;",
                'recent' => 'Nejnovější',
                'title' => 'Medaile',
            ],
            'posts' => [
                'title' => '',
                'title_longer' => '',
                'show_more' => '',
            ],
            'recent_activity' => [
                'title' => 'Nedávné',
            ],
            'top_ranks' => [
                'download_replay' => 'Stáhnout záznam',
                'empty' => 'Zatím žádné záznamy o úžasném výkonu. :(',
                'not_ranked' => 'Pouze hodnocené mapy vydávají pp.',
                'pp_weight' => 'váženo na :percentage',
                'title' => 'Umístění',

                'best' => [
                    'title' => 'Nejlepší výkon',
                ],
                'first' => [
                    'title' => 'Umístění na prvním místě',
                ],
            ],
            'votes' => [
                'given' => '',
                'received' => '',
                'title' => '',
                'title_longer' => '',
                'vote_count' => '',
            ],
            'account_standing' => [
                'title' => 'Stav účtu',
                'bad_standing' => "účet uživatele <strong>:username</strong> není v dobré reputaci :(",
                'remaining_silence' => '<strong>:username</strong> bude znovu moci mluvit za :duration.',

                'recent_infringements' => [
                    'title' => 'Nedávné incidenty',
                    'date' => 'datum',
                    'action' => 'trest',
                    'length' => 'délka',
                    'length_permanent' => 'Permanentní',
                    'description' => 'popis',
                    'actor' => 'od :username',

                    'actions' => [
                        'restriction' => 'Ban',
                        'silence' => 'Ztlumení',
                        'note' => 'Poznámka',
                    ],
                ],
            ],
        ],

        'header_title' => [
            '_' => ':info o hráči',
            'info' => 'Informace',
        ],

        'info' => [
            'discord' => '',
            'interests' => 'Zájmy',
            'lastfm' => 'Last.fm',
            'location' => 'Současná poloha',
            'occupation' => 'Povolání',
            'skype' => '',
            'twitter' => '',
            'website' => 'Webové stránky',
        ],
        'not_found' => [
            'reason_1' => 'Možná si změnil uživatelské jméno.',
            'reason_2' => 'Účet může být dočasně nedostupný z důvodu problémů s bezpečností, nebo zneužitím.',
            'reason_3' => 'Možná jste se přepsal!',
            'reason_header' => 'Existuje několik možných důvodů:',
            'title' => 'Uživatel nebyl nalezen! ;_;',
        ],
        'page' => [
            'button' => 'Upravit stránku profilu',
            'description' => '<strong>já!</strong> je osobní přizpůsobitelná plocha na vašem profilu.',
            'edit_big' => 'Uprav mě!',
            'placeholder' => 'Zde napiš obsah stánky',

            'restriction_info' => [
                '_' => '',
                'link' => '',
            ],
        ],
        'post_count' => [
            '_' => 'Přispěl :link',
            'count' => ':count příspěvkem na fóru|:count příspěvky na fóru',
        ],
        'rank' => [
            'country' => 'Státní pozice pro :mode',
            'country_simple' => 'Místní hodnocení',
            'global' => 'Globální pozice pro :mode',
            'global_simple' => 'Světové hodnocení',
        ],
        'stats' => [
            'hit_accuracy' => 'Přesnost zásahů',
            'level' => 'Úroveň :level',
            'level_progress' => 'Postup do dalšího levelu',
            'maximum_combo' => 'Maximální Combo',
            'medals' => 'Medaile',
            'play_count' => 'Počet zahrání',
            'play_time' => 'Celkový čas hraní',
            'ranked_score' => 'Hodnocené skóre',
            'replays_watched_by_others' => 'Replaye zhlédnuty ostatními',
            'score_ranks' => 'Umístění podle skóre',
            'total_hits' => 'Celkově zásahů',
            'total_score' => 'Celkové skóre',
            // modding stats
            'ranked_and_approved_beatmapset_count' => '',
            'loved_beatmapset_count' => '',
            'unranked_beatmapset_count' => '',
            'graveyard_beatmapset_count' => '',
        ],
    ],

    'status' => [
        'all' => 'Všichni',
        'online' => 'Online',
        'offline' => 'Offline',
    ],
    'store' => [
        'saved' => 'Uživatelem vytvořen',
    ],
    'verify' => [
        'title' => 'Ověření účtu',
    ],

    'view_mode' => [
        'card' => '',
        'list' => '',
    ],
];

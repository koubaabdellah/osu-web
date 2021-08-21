<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'audio' => [
        'autoplay' => 'Пусни следващата песен автоматично',
    ],

    'defaults' => [
        'page_description' => 'osu! - Ритъмът е само на *клик* от вас! Със специални режими на игра като Ouendan/EBA и Taiko, както и напълно фунциониращ редактор на бийтмапове.',
    ],

    'header' => [
        'admin' => [
            'beatmapset' => 'бийтмап сет',
            'beatmapset_covers' => 'бийтмап сет корици',
            'contest' => 'конкурс',
            'contests' => 'конкурси',
            'root' => 'конзола',
            'store_orders' => 'админ на магазина',
        ],

        'artists' => [
            'index' => 'списък',
        ],

        'changelog' => [
            'index' => 'списък',
        ],

        'help' => [
            'index' => 'индекс',
            'sitemap' => 'Карта на сайта',
        ],

        'store' => [
            'cart' => 'количка',
            'orders' => 'история на поръчките',
            'products' => 'продукти',
        ],

        'tournaments' => [
            'index' => 'списък',
        ],

        'users' => [
            'modding' => 'modding',
            'multiplayer' => '',
            'show' => 'инфо',
        ],
    ],

    'gallery' => [
        'close' => 'Затвори (Esc)',
        'fullscreen' => 'Превключване на цял екран',
        'zoom' => 'Приближаване/отдалечаване',
        'previous' => 'Предишно (лява стрелка)',
        'next' => 'Следващо (дясна стрелка)',
    ],

    'menu' => [
        'beatmaps' => [
            '_' => 'бийтмапове',
        ],
        'community' => [
            '_' => 'колектив',
            'dev' => 'разработка',
        ],
        'help' => [
            '_' => 'помощ',
            'getAbuse' => '',
            'getFaq' => 'чзв',
            'getRules' => 'правилник',
            'getSupport' => 'не, наистина, имам нужда от помощ!',
        ],
        'home' => [
            '_' => 'начало',
            'team' => 'отбор',
        ],
        'rankings' => [
            '_' => 'класации',
            'kudosu' => 'kudosu',
        ],
        'store' => [
            '_' => 'магазин',
        ],
    ],

    'footer' => [
        'general' => [
            '_' => 'Общо',
            'home' => 'Начало',
            'changelog-index' => 'Списък на промените',
            'beatmaps' => 'Списък с бийтмапове',
            'download' => 'Изтеглете osu!',
        ],
        'help' => [
            '_' => 'Помощ и Колектив',
            'faq' => 'Често Задавани Въпроси',
            'forum' => 'Обществени форуми',
            'livestreams' => 'Живи Потоци',
            'report' => 'Подайте сигнал за проблем',
            'wiki' => 'Wiki',
        ],
        'legal' => [
            '_' => 'Легалности и статус',
            'copyright' => 'Авторски права (DMCA)',
            'privacy' => 'Поверителност',
            'server_status' => 'Състояние на сървърите',
            'source_code' => 'Програмен код',
            'terms' => 'Условия за ползване',
        ],
    ],

    'errors' => [
        '400' => [
            'error' => 'Невалиден параметър на заявка',
            'description' => '',
        ],
        '404' => [
            'error' => 'Страницата липсва',
            'description' => "Извиняваме се, но страницата която търсите не е тук!",
        ],
        '403' => [
            'error' => "Вие не трябва да сте тук.",
            'description' => 'Можете да опитате да се върнете назад.',
        ],
        '401' => [
            'error' => "Вие не трябва да сте тук.",
            'description' => 'Може да опитате да се върнете назад. Или да влезете в профила си.',
        ],
        '405' => [
            'error' => 'Страницата липсва',
            'description' => "Извиняваме се, но страницата която търсите не е тук!",
        ],
        '422' => [
            'error' => 'Невалиден параметър на заявка',
            'description' => '',
        ],
        '429' => [
            'error' => '',
            'description' => '',
        ],
        '500' => [
            'error' => 'Ох не, нещо се счупи! Т - Т',
            'description' => "Ние сме автоматично осведомени за всяка неизправност.",
        ],
        'fatal' => [
            'error' => 'Ох не, нещо се счупи! (доста зле) Т - Т',
            'description' => "Ние сме автоматично осведомени за всяка неизправност.",
        ],
        '503' => [
            'error' => 'Спрян за профилактика!',
            'description' => "Профилактиката обикновено трае от 5 секунди до 10 минути. В случай че стане повече от 10 минути, проверете :link за повече информация.",
            'link' => [
                'text' => '',
                'href' => '',
            ],
        ],
        // used by sentry if it returns an error
        'reference' => "За всеки случай, това е код, които може да дадете на поддръжка при неизправност!",
    ],

    'popup_login' => [
        'button' => '',

        'login' => [
            'forgot' => "Забравих си данните",
            'password' => 'парола',
            'title' => 'Влезте, за да продължите',
            'username' => 'потребителско име',

            'error' => [
                'email' => "Потребителското име или имейл адресът не съществуват",
                'password' => 'Грешна парола',
            ],
        ],

        'register' => [
            'download' => 'Изтегли',
            'info' => 'Трябва ди акаунт, господине. Защо все още нямате един?',
            'title' => "Нямате акаунт?",
        ],
    ],

    'popup_user' => [
        'links' => [
            'account-edit' => 'Настройки',
            'follows' => '',
            'friends' => 'Приятели',
            'logout' => 'Изход',
            'profile' => 'Моят профил',
        ],
    ],

    'popup_search' => [
        'initial' => 'Пишете тук за търсене!',
        'retry' => 'Търсенето неуспешно. Щракнете, за да опитате отново.',
    ],
];

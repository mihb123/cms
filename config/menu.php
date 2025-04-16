<?php

return [
    'backend' => [
        '/dashboard' => [
            'type' => 'item',
            'text' => 'ダッシュボード',
            'icon' => 'la la-dashboard',
            'can' => 'backend.view',
        ],
        '/sitemap' => [
            'type' => 'tree',
            'text' => 'サイトマップ',
            'icon' => 'flaticon-menu-2',
            'can' => 'backend.view',
            'items' => [
                '/sitemap' => [
                    'type' => 'item',
                    'text' => 'サイトマップ',
                    'icon' => 'flaticon-menu-2',
                    'can' => 'backend.view',
                ],
                '/sitemap-manage' => [
                    'type' => 'item',
                    'text' => 'サイトマップ管理',
                    'icon' => 'flaticon-interface-3',
                    'can' => 'backend.view',
                ],
            ]
        ],
        ':notice' => [
            'type' => 'tree',
            'text' => 'お知らせ',
            'icon' => 'flaticon2-sheet',
            'can' => 'backend.view',
            'items' => [
                '/notice-category' => [
                    'type' => 'item',
                    'text' => 'カテゴリー',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/notice' => [
                    'type' => 'item',
                    'text' => '詳細',
                    'icon' => 'flaticon-interface-3',
                    'can' => 'backend.view',
                ],
            ]
        ],
        ':tag' => [
            'type' => 'tree',
            'text' => 'CMS-2［終末期像］',
            'icon' => 'flaticon2-tag',
            'can' => 'backend.view',
            'items' => [
                '/tag-group-category' => [
                    'type' => 'item',
                    'text' => '親カテゴリー（TOPタブ）',
                    'icon' => 'flaticon-layer',
                    'can' => 'backend.view',
                ],
                '/tag-group' => [
                    'type' => 'item',
                    'text' => '親タグ',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/tag' => [
                    'type' => 'item',
                    'text' => '子タグ',
                    'icon' => 'flaticon-interface-3',
                    'can' => 'backend.view',
                ],
                '/tag-news' => [
                    'type' => 'item',
                    'text' => '子カテゴリー',
                    'icon' => 'flaticon2-medical-records',
                    'can' => 'backend.view',
                ],
            ]
        ],
        ':posts' => [
            'type' => 'tree',
            'text' => 'CMS-1[記事]',
            'icon' => 'flaticon2-website',
            'can' => 'posts.view',
            'items' => [
                '/posts-category' => [
                    'type' => 'item',
                    'text' => '投稿カテゴリー',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/posts-group' => [
                    'type' => 'item',
                    'text' => '親タグ',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/posts-type' => [
                    'type' => 'item',
                    'text' => 'タイトルラベル',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/posts' => [
                    'type' => 'item',
                    'text' => '記事詳細',
                    'icon' => 'flaticon2-list-2',
                    'can' => 'backend.view',
                ],
                '/posts-manage' => [
                    'type' => 'item',
                    'text' => '投稿管理',
                    'icon' => 'flaticon2-list-2',
                    'can' => 'backend.view',
                ],
            ]
        ],
        ':posts-topic' => [
            'type' => 'tree',
            'text' => 'お役立ちトピックス記事',
            'icon' => 'flaticon2-website',
            'can' => 'backend.view',
            'items' => [
                '/posts-topic-category' => [
                    'type' => 'item',
                    'text' => '投稿カテゴリー',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'posts.view',
                ],
                '/posts-topic' => [
                    'type' => 'item',
                    'text' => 'お役立ちトピックス記事',
                    'icon' => 'flaticon2-list-2',
                    'can' => 'backend.view',
                ]
            ]
        ],
        ':topic-useful' => [
            'type' => 'tree',
            'text' => 'お役立ち記事',
            'icon' => 'flaticon2-website',
            'can' => 'backend.view',
            'items' => [
                '/posts-useful-category' => [
                    'type' => 'item',
                    'text' => '投稿カテゴリー',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/topic-useful' => [
                    'type' => 'item',
                    'text' => 'お役立ち記事',
                    'icon' => 'flaticon2-list-2',
                    'can' => 'backend.view',
                ]
            ]
        ],
        ':family-member' => [
            'type' => 'tree',
            'text' => 'CMS-3［看取り体験］',
            'icon' => 'flaticon-users',
            'can' => 'backend.view',
            'items' => [
                '/family-member-tag-group' => [
                    'type' => 'item',
                    'text' => '親タグ',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/family-member-tag' => [
                    'type' => 'item',
                    'text' => '子タグ',
                    'icon' => 'flaticon-interface-3',
                    'can' => 'backend.view',
                ],
                '/family-member-category' => [
                    'type' => 'item',
                    'text' => 'カテゴリー',
                    'icon' => 'flaticon-interface-3',
                    'can' => 'backend.view',
                ],
                '/family-member' => [
                    'type' => 'item',
                    'text' => '看取った方',
                    'icon' => 'flaticon-users',
                    'can' => 'backend.view',
                ],
                '/family-member-news' => [
                    'type' => 'item',
                    'text' => '看取り体験',
                    'icon' => 'flaticon-users',
                    'can' => 'backend.view',
                ]
            ]
        ],
        ':product' => [
            'type' => 'tree',
            'text' => 'CMS- 4「製品紹介」',
            'icon' => 'flaticon2-website',
            'can' => 'backend.view',
            'items' => [
                '/product-category' => [
                    'type' => 'item',
                    'text' => '定番のカテゴリ',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/product-group-category' => [
                    'type' => 'item',
                    'text' => 'TOP- 支えてくれるもの',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/company-service' => [
                    'type' => 'item',
                    'text' => 'お店のサービス',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/company' => [
                    'type' => 'item',
                    'text' => '取扱い店',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/factory' => [
                    'type' => 'item',
                    'text' => 'メーカー公式サイト',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/product' => [
                    'type' => 'item',
                    'text' => '製品',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/product-option' => [
                    'type' => 'item',
                    'text' => '事業所',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/key-words' => [
                    'type' => 'item',
                    'text' => 'キーワード登録',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/destination-guide' => [
                    'type' => 'item',
                    'text' => '誘導先',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                // ],
                // '/key-words-group' => [
                //     'type' => 'item',
                //     'text' => 'key words group',
                //     'icon' => 'flaticon-interface-8',
                //     'can' => 'backend.view',
                // ],

            ]
        ],
        ':product-news' => [
            'type' => 'tree',
            'text' => '支えてくれるもの・サービス',
            'icon' => 'flaticon2-website',
            'can' => 'backend.view',
            'items' => [
                '/product-category-news' => [
                    'type' => 'item',
                    'text' => 'カテゴリ',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
                '/product-news' => [
                    'type' => 'item',
                    'text' => '製品記事',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ],
            ]
        ],
        ':banners' => [
            'type' => 'tree',
            'text' => 'バナー',
            'icon' => 'flaticon2-website',
            'can' => 'backend.view',
            'items' => [
                '/banners' => [
                    'type' => 'item',
                    'text' => 'バナー登録',
                    'icon' => 'flaticon-interface-8',
                    'can' => 'backend.view',
                ]
            ]
        ],
        ':calculate' => [
            'type' => 'tree',
            'text' => '計算式',
            'icon' => 'flaticon2-tag',
            'can' => 'backend.view',
            'items' => [
                '/calculate-group' => [
                    'type' => 'item',
                    'text' => 'グループ',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/calculate-category' => [
                    'type' => 'item',
                    'text' => '要介護度',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/percentage-burden' => [
                    'type' => 'item',
                    'text' => '負担割合',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/calculate-service-group' => [
                    'type' => 'item',
                    'text' => 'サービスグループ',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/calculate-service' => [
                    'type' => 'item',
                    'text' => '自宅に住む _ サービス名',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/calculate-service-care' => [
                    'type' => 'item',
                    'text' => '施設に住む _ サービス名',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/calculate-manage' => [
                    'type' => 'item',
                    'text' => 'サービス管理',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
                '/setting-money' => [
                    'type' => 'item',
                    'text' => '限度額',
                    'icon' => 'flaticon2-files-and-folders',
                    'can' => 'backend.view',
                ],
            ]
        ],
        ':manager' => [
            'type' => 'tree',
            'text' => '管理',
            'icon' => 'flaticon-user',
            'can' => 'backend.admin',
            'items' => [
                '/creator' => [
                    'type' => 'item',
                    'text' => '著者',
                    'icon' => 'flaticon-users',
                    'can' => 'backend.view',
                ],
                '/partner' => [
                    'type' => 'item',
                    'text' => '企業パートナー',
                    'icon' => 'flaticon-users',
                    'can' => 'backend.view',
                ],
                '/menu' => [
                    'type' => 'item',
                    'text' => 'TOPタブメニュー',
                    'icon' => 'flaticon-grid-menu',
                    'can' => 'backend.view',
                ]
            ]
        ],
    ],
];

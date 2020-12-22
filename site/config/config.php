<?php

$base = dirname(__DIR__, 2);
\KirbyExtended\EnvAdapter::load($base);

return [

    'debug' => env('KIRBY_DEBUG', false),

    'panel' => [
        'install' => env('KIRBY_PANEL_INSTALL', false),
        'slug' => env('KIRBY_PANEL_SLUG', 'panel'),
        'language' => 'de'
    ],

    'routes' => require __DIR__ . '/routes.php',

    'date.handler' => 'strftime',
    'locale' => 'de_DE.utf-8',

    'cache' => [
        'pages' => [
            'active' => env('KIRBY_CACHE', false),
            'ignore' => function ($page) {
                if (kirby()->user() !== null) return true;
                $options = $page->blueprint()->options();
                return isset($options['cache']) ? !$options['cache'] : false;
            }
        ]
    ],

    'thumbs' => [
        'quality' => '80',
        'srcsets' => [
            'default' => [360, 720, 1024]
        ]
    ],

    'markdown' => [
      'extra' => true
    ],

    'kirbytext' => [
        'image' => [
            'srcset' => true
        ],
        'video' => [
            'class' => 'image is-16by9',
            'iframe' => [
                'class' => 'has-ratio',
                'width' => '560',
                'height' => '315'
            ]
        ]
    ],

    'kirby-extended.meta-tags' => [
        'default' => require __DIR__ . '/meta.php',
        'templates' => require __DIR__ . '/meta-templates.php',
    ],

    'kirby-extended.locked-pages' => [
        'slug' => 'geschuetzt',
        'title' => 'Geschützte Seite',
        'error' => [
            'csrf' => 'Der CSRF-Token ist nicht korrket',
            'password' => 'Das Passwort ist nicht korrekt'
        ]
    ],

    'community.markdown-field' => [
        'font' => [
            'family' => 'sans-serif',
            'scaling' => true,
            'size' => 'regular',
        ]
    ],

    'cre8ivclick.sitemapper' => [
        'title' => 'Sitemap'
    ]

];

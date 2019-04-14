<?php

$base = dirname(dirname(__DIR__));
(new \Beebmx\KirbyEnv($base))->load();

return [

    'debug' => env('KIRBY_DEBUG', false),
    'panel' => [
        'install' => env('KIRBY_INSTALL', false),
        'slug' => env('KIRBY_PANEL', 'panel'),
        'language' => 'de'
    ],
    'api' => env('KIRBY_API', true),
    'cookieName' => env('KIRBY_SESSION', 'kirby_session'),
    'thumbs' => [
        'quality' => env('KIRBY_THUMBS_QUALITY', '90'),
        'srcsets' => [
            'default' => [576, 768, 992, 1200]
        ]
    ],

    'markdown' => [
      'extra' => true
    ],

    // Dates

    'date.handler' => 'strftime',
    'locale' => 'de_DE.utf-8',

    // Routes

    'routes' => require __DIR__ . '/routes.php',

    // Meta

    'pedroborges.meta-tags.default' => function ($page, $site) {
        if ($page->isHomePage()) {
            $metaTitle       = $site->homePage()->metaTitle()->value();
            $metaDescription = $site->homePage()->metaDescription()->value();
        } else {
            $metaTitle       = r($page->metaTitle()->isNotEmpty(), $page->metaTitle()->value(), $page->title()->value() . ' — ' . $site->title()->value());
            $metaDescription = r($page->metaDescription()->isNotEmpty(), $page->metaDescription()->value(), $site->homePage()->metaDescription()->value());
        }
        $metaImage = $page->metaImage()->isNotEmpty() && $page->metaImage()->toFile() ? $page->metaImage()->toFile()->resize(1200)->url() : url('meta-image.jpg');

        return [
            'title' => $metaTitle,
            'meta' => [
                'description' => $metaDescription,
                'robots' => 'index, follow',
                'google-site-verification' => env('GOOGLE_SITEVERIFICATION', ''),
                'msapplication-TileColor' => env('APP_THEMECOLOR', '#ffffff'),
                'theme-color' => env('APP_THEMECOLOR', '#ffffff')
            ],
            'link' => [
                'canonical' => $page->url(),
                'apple-touch-icon' => ['href' => '/apple-touch-icon.png', 'sizes' => '180x180'],
                'manifest' => '/site.webmanifest',
                'mask-icon' => ['href' => '/safari-pinned-tab.svg', 'color' => env('APP_MASKCOLOR', '#ffffff')],
                'icon' => [
                    ['href' => '/favicon-32x32.png', 'sizes' => '32x32', 'type' =>'image/png'],
                    ['href' => '/favicon-16x16.png', 'sizes' => '16x16', 'type' =>'image/png']
                ]
            ],
            'og' => [
                'type' => 'website',
                'url' => $page->url(),
                'site_name' => $site->title()->value(),
                'title' => $metaTitle,
                'description' => $metaDescription,
                'image' => $metaImage
            ],
            'twitter' => [
                'card' => 'summary',
                'url' => $page->url(),
                //'site' => $site->twitter(),
                'title' => $metaTitle,
                'description' => $metaDescription,
                'image' => $metaImage
            ],
            'json-ld' => [
                'WebSite' => [
                    'url' => $page->url(),
                    'name' => $site->title()->value(),
                    'description' => $metaDescription,
                    'author' => [
                        '@type' => 'Person',
                        'name' => $site->author()->value()
                    ]
                ],
                'Organization' => [
                    'name' => $site->title()->value(),
                    'legalName' => $site->author()->value(),
                    'url' => $site->url(),
                    'logo' => url('assets/images/logo.svg'),
                    'foundingDate' => '2004',
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'contactType' => 'office',
                        'email' => 'vorstand@nabu-gera-greiz.de',
                        'url' => $site->url()
                    ]
                ]
            ]
        ];
    },

    'pedroborges.meta-tags.templates' => function ($page, $site) {
        $metaDescription = r($page->metaDescription()->isNotEmpty(), $page->metaDescription()->value(), $page->text()->excerpt(140)->value());
        $metaImage = $page->metaImage()->isNotEmpty() && $page->metaImage()->toFile() ? $page->metaImage()->toFile()->resize(1200)->url() : url('meta-image.jpg');
        $datePublished = $page->date()->toDate('%Y-%m-%d');

        return [
            'article' => [
                'meta' => [
                    'description' => $metaDescription,
                ],
                'og' => [
                    'type' => 'article',
                    'description' => $metaDescription,
                    'namespace:article' => [
                        'author' => 'Johann Schopplich',
                        'published_time' => $datePublished,
                        'tag' => ['tech', 'web']
                    ],
                    'image' => $metaImage
                ],
                'twitter' => [
                    'description' => $metaDescription,
                    'image' => $metaImage
                ],
                'json-ld' => [
                    'BlogPosting' => [
                        'headline' => $page->title()->value(),
                        'description' => $metaDescription,
                        'mainEntityOfPage' => $page->url(),
                        'url' => $page->url(),
                        'image' => $metaImage,
                        'author' => [
                            '@type' => 'Person',
                            'name' => $site->author()->value()
                        ],
                        'publisher' => [
                            '@type' => 'Organization',
                            'name' => $site->title()->value(),
                            'legalName' => $site->author()->value(),
                            'url' => $site->url(),
                            'logo' => url('assets/images/logo.svg'),
                            'foundingDate' => '2004'
                        ],
                        'datePublished' => $datePublished,
                        'dateCreated' => $datePublished,
                        'dateModified' => $datePublished,
                        //'articleBody' => $page->text()
                    ]
                ]
            ]
        ];
    },

    // Plugins

    'omz13.xmlsitemap.includeUnlistedWhenSlugIs' => ['archiv', 'datenschutzerklaerung', 'impressum', 'korkampagne'],
    'omz13.xmlsitemap.excludeChildrenWhenTemplateIs' => ['events'],
    'community.markdown-field.font' => [
      'family'  => 'sans-serif',
      'scaling' => true,
      'size'    => 'regular',
    ],

    // Custom tags

    'kirbytext.image.width' => '768',
    'kirbytext.image-hero.width' => '768',
    'kirbytext.image-box.width' => '768',
    'kirbytext.image-box.width-vertical' => '480',

];

<?php

return function ($page, $site) {
    if ($page->isHomePage()) {
        $metaTitle       = $site->homePage()->metaTitle()->value();
        $metaDescription = $site->homePage()->metaDescription()->value();
    } else {
        $metaTitle       = r($page->metaTitle()->isNotEmpty(), $page->metaTitle()->value(), $page->title()->value() . ' — ' . $site->title()->value());
        $metaDescription = r($page->metaDescription()->isNotEmpty(), $page->metaDescription()->value(), $site->homePage()->metaDescription()->value());
    }
    $metaImage = $page->metaImage()->isNotEmpty() && $page->metaImage()->toFile() ? $page->metaImage()->toFile()->resize(1280)->url() : url('assets/images/meta-image.jpg');

    return [
        'title' => $metaTitle,
        'meta' => [
            'description' => $metaDescription,
            'apple-mobile-web-app-capable' => 'yes',
            'apple-mobile-web-app-status-bar-style' => 'default',
            'apple-mobile-web-app-title' => env('APP_NAME', $site->title()->value()),
            'theme-color' => '#ffffff'
        ],
        'link' => [
            'canonical' => $page->url(),
            'apple-touch-icon' => ['href' => '/assets/images/icons/apple-touch-icon.png', 'sizes' => '180x180'],
            'manifest' => '/manifest.json',
            'icon' => [
                ['href' => '/assets/images/icons/favicon-32x32.png', 'sizes' => '32x32', 'type' =>'image/png'],
                ['href' => '/assets/images/icons/favicon-16x16.png', 'sizes' => '16x16', 'type' =>'image/png']
            ]
        ],
        'og' => [
            'type' => 'website',
            'url' => $page->url(),
            'title' => $metaTitle,
            'description' => $metaDescription,
            'image' => $metaImage
        ],
        'twitter' => [
            'card' => 'summary',
            'url' => $page->url(),
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
};

<?php

return function ($page, $site) {
    $metaTitle = $page->metaTitle()->or($page->title() . ' – ' . $site->title())->value();
    $metaDescription = $page->metaDescription()->or($site->metaDescription())->value();
    $metaImage = (function () use ($page, $site) {
        $file = $page->metaImage()->toFile() ?? $site->metaImage()->toFile();
        return $file ? $file->resize(1280)->url() : '/assets/img/meta-image.jpg';
    })();

    return [
        'title' => $metaTitle,
        'meta' => [
            'description' => $metaDescription,
            'theme-color' => '#ffffff',
            'apple-mobile-web-app-capable' => 'yes',
            'apple-mobile-web-app-status-bar-style' => 'default',
            'apple-mobile-web-app-title' => $site->title()->value()
        ],
        'link' => [
            'canonical' => $page->url(),
            'manifest' => '/manifest.json',
            'apple-touch-icon' => ['href' => '/assets/img/icons/apple-touch-icon.png', 'sizes' => '180x180'],
            'icon' => [
                ['href' => '/assets/img/icons/favicon-32x32.png', 'sizes' => '32x32', 'type' =>'image/png'],
                ['href' => '/assets/img/icons/favicon-16x16.png', 'sizes' => '16x16', 'type' =>'image/png']
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
            'card' => 'summary_large_image',
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
                'logo' => url('assets/img/logo.svg'),
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

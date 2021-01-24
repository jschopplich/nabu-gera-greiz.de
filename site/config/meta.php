<?php

return function ($kirby, $page, $site) {
    $metaTitle = $page->metaTitle()->or($page->title() . ' – ' . $site->title())->value();
    $metaDescription = $page->metaDescription()->or($site->metaDescription())->value();
    $metaImage = $page->metaImage()->or($site->metaImage())->toFile()->resize(1280)->url();

    return [
        'description' => $metaDescription,
        'opengraph' => [
            'title' => $metaTitle,
            'image' => $metaImage
        ],
        'twitter' => [
            'title' => $metaTitle,
            'image' => $metaImage
        ],
        'jsonld' => [
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

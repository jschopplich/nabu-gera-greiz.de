<?php

return function ($page, $site) {
    $metaDescription = $page->metaDescription()->or($page->text()->excerpt(140))->value();
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
                    'author' => $site->author()->value(),
                    'published_time' => $datePublished
                ]
            ],
            'twitter' => [
                'description' => $metaDescription
            ],
            'json-ld' => [
                'BlogPosting' => [
                    'headline' => $page->title()->value(),
                    'description' => $metaDescription,
                    'mainEntityOfPage' => $page->url(),
                    'url' => $page->url(),
                    'author' => [
                        '@type' => 'Person',
                        'name' => $site->author()->value()
                    ],
                    'publisher' => [
                        '@type' => 'Organization',
                        'name' => $site->title()->value(),
                        'legalName' => $site->author()->value(),
                        'url' => $site->url(),
                        'logo' => url('assets/img/logo.svg'),
                        'foundingDate' => '2004'
                    ],
                    'datePublished' => $datePublished,
                    'dateCreated' => $datePublished,
                    'dateModified' => $page->modified('%Y-%m-%d')
                ]
            ]
        ]
    ];
};

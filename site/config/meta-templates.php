<?php

return function ($page, $site) {
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
};

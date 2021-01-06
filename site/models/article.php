<?php

use Kirby\Cms\Page;

class ArticlePage extends Page
{
    public function metadata(): array
    {
        $metaDescription = $this->metaDescription()->or($this->text()->excerpt(140))->value();
        $datePublished = $this->date()->toDate('%Y-%m-%d');
        $site = site();

        return [
            'description' => $metaDescription,
            'og' => [
                'type' => 'article',
                'namespace:article' => [
                    'author' => $site->author()->value(),
                    'published_time' => $datePublished
                ]
            ],
            'jsonld' => [
                'BlogPosting' => [
                    'headline' => $this->title()->value(),
                    'description' => $metaDescription,
                    'mainEntityOfPage' => $this->url(),
                    'url' => $this->url(),
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
                    'dateModified' => $this->modified('%Y-%m-%d')
                ]
            ]
        ];
    }
}

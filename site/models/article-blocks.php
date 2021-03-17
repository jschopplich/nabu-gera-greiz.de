<?php

class ArticleBlocksPage extends \Kirby\Cms\Page
{
    public function metadata(): array
    {
        $metaDescription = $this->metaDescription()->isNotEmpty()
            ? $this->metaDescription()->value()
            : $this->text()->toBlocks()->excerpt(140);
        $datePublished = $this->date()->toDate('%Y-%m-%d');
        $site = $this->site();

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

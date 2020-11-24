<?php

use Kirby\Cms\Page;
use Kirby\Toolkit\Str;

return [
    [
        'pattern' => 'robots.txt',
        'method' => 'ALL',
        'action' => function () {
            $robots = 'User-agent: *' . PHP_EOL;
            $robots .= 'Allow: /' . PHP_EOL;
            $robots .= 'Sitemap: ' . url('sitemap.xml');
            return kirby()
                ->response()
                ->type('text')
                ->body($robots);
        }
    ],
    [
        // Redirect articles from former archive blogs located under `aktuelles`,
        // since now all articles are located under `aktuelles` and archives
        // are just virtual pages
        // e.g. `aktuelles/archiv/2018/name-of-the-article` -> `aktuelles/name-of-the-article`
        'pattern' => 'aktuelles/archiv/(:num)/(:any)',
        'action'  => function ($year, $article) {
            if ($page = page("aktuelles/{$article}")) {
                go($page->url(), 301);
            }

            go("aktuelles/archiv/{$year}");
        }
    ],
    [
        // Virtual pages for blog archives
        'pattern' => '(:all)/archiv/(:num)',
        'action'  => function ($all, $year) {
            // Locale setting is not inherited from global configuration
            setlocale(LC_TIME, 'de_DE.UTF-8');

            return Page::factory([
                'slug' => $year,
                'parent' => page($all),
                'template' => 'blog-archive',
                'model' => 'virtual',
                'content' => [
                    'title' => "Archiv {$year}",
                    'virtualYear' => $year
                ]
            ]);
        }
    ],
    [
        // Try to find old documents or images from
        // older archive setup and redirect
        'pattern' => [
            'content/documents/(:num)/(:any)',
            'content/images/(:num)/(:any)',
            'documents/(:num)/(:any)',
            'images/(:num)/(:any)'
        ],
        'action' => function ($year, $any) {
            [
                'filename' => $filename,
                'extension' => $extension
            ] = pathinfo($any);

            $filename = Str::slug($filename) . '.' . $extension;
            if ($file = site()->index()->files()->findBy('filename', $filename)) {
                go($file->url(), 301);
            }

            $this->next();
        }
    ]
];

<?php

use Kirby\Cms\Page;

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
        // Redirect articles from former news archive blogs
        // Now they are all located under `aktuelles`,
        // since virtual pages are used for the yearly archives
        'pattern' => 'aktuelles/archiv/(:num)/(:any)',
        'action'  => function ($year, $article) {
            if ($page = page("aktuelles/{$article}")) {
                go($page->url(), 301);
            }

            go("aktuelles/archiv/{$year}");
        }
    ],
    [
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
    ]
];

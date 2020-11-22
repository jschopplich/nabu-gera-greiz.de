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
        'pattern' => '(:all)/archiv/(:num)',
        'action'  => function ($all, $num) {
            $page = page($all);

            if (empty($num) || !$page) {
                go($all);
            }

            return Page::factory([
                'slug' => $num,
                'parent' => $page,
                'template' => 'blog-archive',
                'model' => 'virtual',
                'content' => [
                    'title' => 'Archiv ' . $num,
                    'virtualYear' => $num
                ]
            ]);
        }
    ]
];

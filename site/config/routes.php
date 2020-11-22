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
            if ($page = page($all . '/archiv/' . $num)) {
                return $page;
            }

            return Page::factory([
                'slug' => $num,
                'parent' => page($all),
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

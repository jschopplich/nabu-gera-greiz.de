<?php

namespace KirbyExtended\LockedPages;

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Page;

load([
    'KirbyExtended\LockedPages\LockedPages' => 'classes/KirbyExtended/LockedPages.php'
], __DIR__);

Kirby::plugin('johannschopplich/kirby-locked-pages', [
    'hooks' => [
        'route:after' => function ($route, $path, $method, $result, $final) {
            if (
                $route->env() === 'site' &&
                LockedPages::isLocked($result)
            ) {
                $url = url(option('kirby-extended.locked-pages.slug', 'locked'), [
                    'query' => ['redirect' => $path]
                ]);
                go($url);
            }
        }
    ],
    'routes' => [
        [
            'pattern' => option('kirby-extended.locked-pages.slug', 'locked'),
            'method' => 'GET|POST',
            'action' => function () {
                return new Page([
                    'slug' => option('kirby-extended.locked-pages.slug', 'locked'),
                    'template' => option('kirby-extended.locked-pages.template', 'locked-pages-login'),
                    'content' => [
                        'title' => option('kirby-extended.locked-pages.title', 'Page locked')
                    ]
                ]);
            }
        ]
    ],
    'blueprints' => [
        'fields/locked-pages' => __DIR__ . '/blueprints/fields/locked-pages.yml'
    ],
    'controllers' => [
        'locked-pages-login' => require __DIR__ . '/controllers/locked-pages-login.php'
    ],
    'templates' => [
        'locked-pages-login' => __DIR__ . '/templates/locked-pages-login.php'
    ]
]);

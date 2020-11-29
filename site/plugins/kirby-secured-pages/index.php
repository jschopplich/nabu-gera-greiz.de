<?php

namespace KirbyExtended\SecuredPages;

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Page;

load([
    'KirbyExtended\SecuredPages\SecuredPages' => 'classes/KirbyExtended/SecuredPages.php'
], __DIR__);

Kirby::plugin('kirby-extended/secured-pages', [
    'hooks' => [
        'route:after' => function ($route, $path, $method, $result, $final) {
            if (
                $route->env() === 'site' &&
                SecuredPages::isBlocked($result)
            ) {
                go(url('geschuetzt', [
                    'query' => ['redirect' => $path]
                ]));
            }
        }
    ],
    'routes' => [
        [
            'pattern' => 'geschuetzt',
            'method' => 'GET|POST',
            'action' => function () {
                return new Page([
                    'slug' => 'geschuetzt',
                    'template' => 'secured-pages-login',
                    'content' => [
                        'title' => 'Geschützte Seite'
                    ]
                ]);
            }
        ]
    ],
    'blueprints' => [
        'fields/extended.secured-pages' => __DIR__ . '/blueprints/fields/extended.secured-pages.yml'
    ],
    'controllers' => [
        'secured-pages-login' => require __DIR__ . '/controllers/secured-pages-login.php'
    ],
    'templates' => [
        'secured-pages-login' => __DIR__ . '/templates/secured-pages-login.php'
    ]
]);

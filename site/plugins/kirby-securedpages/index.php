<?php

namespace Plugin\SecuredPage;

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Page;

load([
    'Plugin\SecuredPage\RouterAfterHook' => 'src/RouterAfterHook.php'
], __DIR__);

Kirby::plugin('kerli81/securedpages', [
    'options' => [
        'logintype' => 'loginform', // [loginform, custom]
        'custom.page' => '',
        'loginform.username.name' => 'Username',
        'loginform.username.error' => 'Please enter your username',
        'loginform.password.name' => 'Password',
        'loginform.password.error' => 'Please enter your password',
    ],
    'hooks' => [
        'route:after' => function ($route, $path, $method, $result) {
            if ($route->env() === 'site') {
                $hook = new RouterAfterHook();
                $result = $hook->process($result, $this->user());

                if (!$result) {
                    if (option('kerli81.securedpages.logintype') === 'custom') {
                        $url = option('kerli81.securedpages.custom.page');
                    } else {
                        $url = url('/no-permission', ['query' => ['redirect' => $path]]);
                    }

                    go($url);
                }
            }
        }
    ],
    'routes' => [
        [
            'pattern' => 'no-permission',
            'method' => 'GET|POST',
            'action' => function () {
                if (option('kerli81.securedpages.logintype') === 'loginform') {
                    return new Page([
                        'slug' => 'no-permission',
                        'template' => 'loginform',
                        'content' => [
                            'title' => 'Geschützte Seite'
                        ]
                    ]);
                }
            }
        ]
    ],
    'blueprints' => [
        'fields/kerli81.securedpages.pageconfiguration' => __DIR__ . '/blueprints/fields/page-security.yml'
    ],
    'snippets' => [
        'kerli81.securedpages.loginform' => __DIR__ . '/src/loginform/LoginFormSnippet.php',
    ],
    'controllers' => [
        'loginform' => require __DIR__ . '/src/loginform/LoginFormCtrl.php'
    ],
    'templates' => [
        'loginform' => __DIR__ . '/src/loginform/LoginFormTmpl.php'
    ]
]);

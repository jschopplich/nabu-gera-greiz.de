<?php

use Uniform\Form;

return function ($kirby) {
    $form = new Form([
        'username' => [
            'rules' => ['required'],
            'message' => option('kerli81.securedpages.loginform.username.error'),
        ],
        'password' => [
            'rules' => ['required', 'min' => 8],
            'message' => option('kerli81.securedpages.loginform.password.error'),
        ],
    ]);

    if ($kirby->user() && param('action') === 'logout') {
        $kirby->user()->logout();
        go(url('/no-permission', ['params' => ['redirect' => param('redirect')]]));
    }

    $loginstatus = [
        'user' => $kirby->user(),
        'logouturl' =>  url('/no-permission', [
            'params' => [
                'redirect' => param('redirect'),
                'action' => 'logout'
            ]
        ])
    ];

    if ($kirby->request()->is('POST')) {
        $form->withoutGuards()->loginAction();

        if ($form->success()) {
            go(get('redirect'));
        }
    }

    return compact('form', 'loginstatus');
};

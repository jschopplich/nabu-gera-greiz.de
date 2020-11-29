<?php

return function ($kirby) {
    $error = false;
    $password = get('password');

    if ($kirby->request()->is('POST') && $password) {
        $csrfToken = get('csrf');
        if (!csrf($csrfToken)) {
            return ['error' => 'Der CSRF-Token ist nicht korrket'];
        }

        $protectedPage = SecuredPages::findProtectedPage(get('redirect'));
        if (!$protectedPage) {
            return ['error' => 'Die geschütze Seite existiert nicht'];
        }

        if ($protectedPage->securedPagePassword()->value() !== $password) {
            return ['error' => 'Das Passwort ist nicht korrekt'];
        }

        kirby()->session()->set("securedPages.access.{$protectedPage->id()}", true);
        go(get('redirect'));
    }

    return compact('error');
};

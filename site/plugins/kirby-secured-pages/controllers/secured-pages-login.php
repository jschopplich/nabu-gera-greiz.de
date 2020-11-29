<?php

use KirbyExtended\SecuredPages\SecuredPages;

return function ($kirby) {
    if (!$kirby->request()->is('POST')) {
        return ['error' => false];
    }

    $csrfToken = get('csrf');
    if (!csrf($csrfToken)) {
        return ['error' => 'Der CSRF-Token ist nicht korrket'];
    }

    $redirectPage = page(get('redirect'));
    $protectedPage = SecuredPages::findProtectedPage($redirectPage);
    if (!$protectedPage) {
        return ['error' => 'Die geschütze Seite existiert nicht'];
    }

    if ($protectedPage->securedPagePassword()->value() !== get('password')) {
        return ['error' => 'Das Passwort ist nicht korrekt'];
    }

    kirby()->session()->set("securedPages.access.{$protectedPage->id()}", true);
    go(get('redirect'));
};

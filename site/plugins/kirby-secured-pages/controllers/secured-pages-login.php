<?php

use KirbyExtended\SecuredPages\SecuredPages;

return function ($kirby) {
    $id = get('redirect');
    $redirectPage = page($id);
    $protectedPage = SecuredPages::findProtectedPage($redirectPage);
    if (!$protectedPage) {
        go($id);
    }

    if (!$kirby->request()->is('POST')) {
        return ['error' => false];
    }

    $csrfToken = get('csrf');
    if (!csrf($csrfToken)) {
        return ['error' => 'Der CSRF-Token ist nicht korrket'];
    }

    if ($protectedPage->securedPagePassword()->value() !== get('password')) {
        return ['error' => 'Das Passwort ist nicht korrekt'];
    }

    kirby()->session()->set("securedPages.access.{$protectedPage->id()}", true);
    go($id);
};

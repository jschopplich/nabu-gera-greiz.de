<?php

return function ($kirby, $page) {
    $perpage  = $page->perPage()->int() ?? 6;
    $articles = $kirby->collection('articles');

    return [
        'articles' => $articles->paginate($perpage)
    ];
};

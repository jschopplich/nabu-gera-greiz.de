<?php

return function ($page) {
    $perpage  = $page->perPage()->int() ?? 6;
    $articles = $page
        ->children()
        ->listed()
        ->filterBy('template', 'article')
        ->sortBy(fn($child) => $child->date()->toDate(), 'desc')
        ->paginate($perpage);

    return compact('articles');
};

<?php

use Kirby\Toolkit\Str;

return function ($page) {
    $parent   = $page->parent();
    $perpage  = $parent->perPage()->int();
    $articles = $parent
        ->children()
        ->listed()
        ->filterBy('template', 'article')
        ->filter(fn($child) => Str::startsWith($child->date(), $page->virtualYear()))
        ->sortBy(fn($child) => $child->date()->toDate(), 'desc')
        ->paginate($perpage);

    return compact('articles');
};

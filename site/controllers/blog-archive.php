<?php

use Kirby\Toolkit\Str;

return function ($page) {
    $articles = $page
        ->parent()
        ->children()
        ->listed()
        ->filterBy('template', 'article')
        ->filter(fn($child) => Str::startsWith($child->date(), $page->virtualYear()))
        ->sortBy(fn($child) => $child->date()->toDate(), 'desc')
        ->paginate(12);

    return compact('articles');
};

<?php

return function ($kirby, $page) {
    $count    = $page->perPage()->int();

    if ($page->id() === 'aktuelles') {
        $articles = $kirby
            ->collection('articles')
            ->paginate($count);
    } else {
        $articles = $page
            ->children()
            ->listed()
            ->filterBy('template', 'article')
            ->sortBy(fn($child) => $child->date()->toDate(), 'desc')
            ->paginate($count);
    }

    return compact('articles');
};

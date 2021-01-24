<?php

return function ($page) {
    $articles = $page
        ->parent()
        ->children()
        ->listed()
        ->filterBy('template', 'in', ['article', 'article-blocks'])
        ->filter(fn($child) => $child->date()->toDate('%Y') === $page->virtualYear()->toString())
        ->sortBy(fn($child) => $child->date()->toDate(), 'desc')
        ->paginate(12);

    return compact('articles');
};

<?php

return function ($kirby, $page) {
    $collection = $page
        ->children()
        ->listed()
        ->filterBy('template', 'article');

    if ($pages = $page->associatedBlogs()->toPages()) {
        foreach ($pages as $blog) {
            $collection->add($blog->children()->listed()->filterBy('template', 'article'));
        }
    }

    $collection = $collection
        ->sortBy(fn($child) => $child->date()->toDate(), 'desc')
        ->paginate($page->perPage()->int());

    return ['articles' => $collection];
};

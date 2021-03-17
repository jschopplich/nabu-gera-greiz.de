<?php

return function (\Kirby\Cms\App $kirby) {
    $page = $kirby->page('aktuelles');
    $collection = $page
        ->children()
        ->listed()
        ->filterBy('template', 'in', ['article', 'article-blocks']);

    if ($pages = $page->associatedBlogs()->toPages()) {
        foreach ($pages as $blog) {
            $collection->add(
                $blog
                    ->children()
                    ->listed()
                    ->filterBy('template', 'in', ['article', 'article-blocks'])
                );
        }
    }

    $collection = $collection
        ->sortBy(fn($child) => $child->date()->toDate(), 'desc')
        ->paginate($page->perPage()->int());

    return ['articles' => $collection];
};

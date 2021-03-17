<?php

return function (\Kirby\Cms\Page $page) {
    $collection = $page
        ->children()
        ->listed()
        ->filterBy('template', 'in', ['article', 'article-blocks'])
        ->when($page->showArchive()->toBool(), function () {
            return $this->filterBy('date', 'date >', date('Y') . '-01-15');
        });

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

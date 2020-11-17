<?php

return function ($kirby, $page) {
    $perpage  = $page->perPage()->int() ?? 6;
    $articles = $kirby->collection('articles')
                ->paginate($perpage);

    return compact('articles');
};

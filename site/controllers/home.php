<?php

return function ($kirby, $page) {
    $perpage  = $page->perPage()->int();
    $articles = $kirby
                ->collection('articles')
                ->paginate($perpage);

    return compact('articles');
};

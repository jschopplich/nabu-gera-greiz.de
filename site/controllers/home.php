<?php

return function ($kirby, $page) {
    $count    = $page->perPage()->int();
    $articles = $kirby
                ->collection('articles')
                ->paginate($count);

    return compact('articles');
};

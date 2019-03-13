<?php

return function ($page) {

  $perpage  = $page->perPage()->int();
  $articles = $page->children()->listed()->filterBy('template', 'article')->sortBy(function ($subpage) {
    return $subpage->date()->toDate();
  }, 'desc')->paginate(($perpage >= 1) ? $perpage : 6);

  return [
    'articles'   => $articles,
    'pagination' => $articles->pagination()
  ];

};

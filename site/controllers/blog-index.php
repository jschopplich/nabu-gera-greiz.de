<?php

return function ($page) {

  $perpage  = $page->perPage()->int();
  $articles = $page->children()->listed()->filterBy('template', 'article');
  $articles->add(page('projekte/naturschutzinformation-waldhaus')->children()->listed()->filterBy('template', 'article'));

  $collection = $articles->sortBy(function ($subpage) {
    return $subpage->date()->toDate();
  }, 'desc')->paginate(($perpage >= 1) ? $perpage : 6);

  return [
    'articles'   => $collection,
    'pagination' => $collection->pagination()
  ];

};

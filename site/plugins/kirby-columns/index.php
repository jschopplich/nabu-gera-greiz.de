<?php

Kirby::plugin('kirby/columns', [
  'hooks' => [
    'kirbytags:before' => function ($text) {

      $text = preg_replace_callback('!\(columns(…|\.{3})\)(.*?)\((…|\.{3})columns\)!is', function($matches) use($text) {

        $columns = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
        $html    = [];

        foreach($columns as $column) {
            $field  = new Field(page(), '', trim($column));
            $html[] = '<div class="' . option('kirby.columns.item', 'column') . '">' . kirbytext($field) . '</div>';
        }

        return '<div class="' . option('kirby.columns.container', 'columns is-6 is-variable') . '">' . implode($html) . '</div>';

      }, $text);

      return $text;
    }

  ]
]);
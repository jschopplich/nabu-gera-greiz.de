<?php

Kirby::plugin('nabu-gera-greiz/nabu-kirbytags', [
  'hooks' => [
    'kirbytags:before' => function ($text, array $data = [], array $options = []) {
      return str_replace('\(', '[[', str_replace('\)', ']]', $text));
    },
    'kirbytags:after' => function ($text, array $data = [], array $options = []) {
      return str_replace(']]', ')', str_replace('[[', '(', $text));
    }
  ],

  'tags' => [
    'line'       => require  __DIR__ . '/tags/line.php',
    'hr'         => require  __DIR__ . '/tags/line.php',
    'image'      => require  __DIR__ . '/tags/thumb.php',
    'image-hero' => require  __DIR__ . '/tags/image-hero.php',
    'image-box'  => require  __DIR__ . '/tags/image-box.php',

    // Not used anymore
    'pdf' => require_once  __DIR__ . '/tags/pdf.php'
  ]
]);

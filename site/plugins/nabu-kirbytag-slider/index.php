<?php

Kirby::plugin('nabu-gera-greiz/nabu-kirbytag-slider', [
  'hooks' => [
    'kirbytags:before' => function ($text, array $data = [], array $options = []) {

      $text = preg_replace_callback('!\(carousel(…|\.{3})\)(.*?)\((…|\.{3})carousel\)!is', function ($match) use ($text) {
        return '<div class="carousel">' . $match[2] . '</div>';
      }, $text);
    
      return $text;

    }
  ]
]);

<?php

use Kirby\Cms\App as Kirby;

Kirby::plugin('nabu-gera-greiz/kirby-tags', [
    'hooks' => [
        'kirbytags:before' => function ($text) {
            $text = str_replace('\(', '[[', str_replace('\)', ']]', $text));

            $text = preg_replace_callback('!\(carousel(…|\.{3})\)(.*?)\((…|\.{3})carousel\)!is', function ($match) {
                return '<div class="carousel">' . $match[2] . '</div>';
            }, $text);

            return $text;
        },

        'kirbytags:after' => function ($text) {
            return str_replace(']]', ')', str_replace('[[', '(', $text));
        }
    ],

    'tags' => [
        'line'           => require __DIR__ . '/tags/line.php',
        'hr'             => require __DIR__ . '/tags/line.php',
        'image'          => require __DIR__ . '/tags/image.php',
        'image-hero'     => require __DIR__ . '/tags/image-hero.php',
        'image-box'      => require __DIR__ . '/tags/image-box.php',
        'image-hero-old' => require __DIR__ . '/tags/image-hero-old.php',
        'image-box-old'  => require __DIR__ . '/tags/image-box-old.php',

        // Not used anymore
        'pdf' => require_once __DIR__ . '/tags/pdf.php'
    ]
]);

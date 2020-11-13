<?php

load([
    'KirbyExtended\\BlurryPlaceholder' => 'classes/KirbyExtended/BlurryPlaceholder.php',
    'KirbyExtended\\BlurryPlaceholderHelpers' => 'classes/KirbyExtended/BlurryPlaceholderHelpers.php'
], __DIR__);

use Kirby\Cms\App as Kirby;
use KirbyExtended\BlurryPlaceholder;

Kirby::plugin('nabu-gera-greiz/kirby-tags', [
    'fileMethods' => [
        'placeholder' => fn() => BlurryPlaceholder::image($this),
        'placeholderUri' => fn() => BlurryPlaceholder::uri($this)
    ],

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
        'hr'             => require __DIR__ . '/tags/line.php',
        'line'           => require __DIR__ . '/tags/line.php',
        'image'          => require __DIR__ . '/tags/image.php',
        'image-hero'     => require __DIR__ . '/tags/image-hero.php',
        'image-hero-old' => require __DIR__ . '/tags/image-hero.php',
        'image-box'      => require __DIR__ . '/tags/image-box.php',
        'image-box-old'  => require __DIR__ . '/tags/image-box.php',

        // Not used anymore
        'pdf' => require __DIR__ . '/tags/pdf.php'
    ]
]);

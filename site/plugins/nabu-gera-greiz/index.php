<?php

load([
    'KirbyExtended\\HtmlTruncator' => 'classes/KirbyExtended/HtmlTruncator.php',
], __DIR__);

use Kirby\Cms\App as Kirby;
use KirbyExtended\HtmlTruncator;

Kirby::plugin('nabu-gera-greiz/kirby-extensions', [
    'fieldMethods' => [
        'ktExcerpt' => function ($field, $length = 50) {
            $text = $field->kt();
            return HtmlTruncator::truncate($text, $length);
        }
    ],

    'hooks' => [
        'kirbytags:before' => function ($text) {
            $text = str_replace('\(', '[[', $text);
            $text = str_replace('\)', ']]', $text);

            $text = preg_replace_callback(
                '!\(carousel(…|\.{3})\)(.*?)\((…|\.{3})carousel\)!is',
                fn($match) => '<div class="nabu-carousel">' . $match[2] . '</div>',
                $text
            );

            return $text;
        },

        'kirbytags:after' => function ($text) {
            $text = str_replace('[[', '(', $text);
            $text = str_replace(']]', ')', $text);
            return $text;
        }
    ],

    'tags' => [
        'image'      => require __DIR__ . '/tags/image.php',
        'image-hero' => require __DIR__ . '/tags/image-hero.php',
        'image-box'  => require __DIR__ . '/tags/image-box.php',
        'hr'         => require __DIR__ . '/tags/line.php',
        'line'       => require __DIR__ . '/tags/line.php',
        'video'      => require __DIR__ . '/tags/video.php'
    ]
]);

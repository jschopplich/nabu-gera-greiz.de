<?php

load([
    'KirbyExtended\\BlurryPlaceholder' => 'classes/KirbyExtended/BlurryPlaceholder.php',
    'KirbyExtended\\BlurryPlaceholderHelpers' => 'classes/KirbyExtended/BlurryPlaceholderHelpers.php',
    'KirbyExtended\\HtmlTruncator' => 'classes/KirbyExtended/HtmlTruncator.php',
], __DIR__);

use Kirby\Cms\App as Kirby;
use KirbyExtended\BlurryPlaceholder;
use KirbyExtended\HtmlTruncator;

Kirby::plugin('nabu-gera-greiz/kirby-tags', [
    'fileMethods' => [
        'placeholder' => fn() => BlurryPlaceholder::image($this),
        'placeholderUri' => fn() => BlurryPlaceholder::uri($this)
    ],

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
        'image'          => require __DIR__ . '/tags/image.php',
        'image-hero'     => require __DIR__ . '/tags/image-hero.php',
        'image-box'      => require __DIR__ . '/tags/image-box.php',
        'hr'             => require __DIR__ . '/tags/line.php',
        'line'           => require __DIR__ . '/tags/line.php',
        'link'           => require __DIR__ . '/tags/link.php'
    ]
]);

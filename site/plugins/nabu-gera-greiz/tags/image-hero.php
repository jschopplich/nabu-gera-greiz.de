<?php

use Kirby\Cms\Html;
use Kirby\Cms\Url;
use Kirby\Toolkit\A;
use Kirby\Toolkit\Str;

return [
    'attr' => [
        'alt',
        'caption',
        'class',
        'height',
        'imgclass',
        'link',
        'linkclass',
        'rel',
        'target',
        'text',
        'title',
        'width',

        // Deprecated, but keep them, otherwise
        // they are parsed as text
        'position',
        'layout'
    ],
    'html' => function ($tag) {
        // Handle images from archive
        if ($tag->file = $tag->kirby()->file('images/' . $tag->value) ?? $tag->file($tag->value)) {
            $tag->src     = $tag->file->url();
            $tag->alt     = $tag->alt     ?? $tag->file->alt()->or(' ')->value();
            $tag->title   = $tag->title   ?? $tag->file->title()->value();
            $tag->caption = $tag->caption ?? $tag->file->caption()->value();
        } else {
            $tag->src = Url::to($tag->value);
        }

        $link = function ($img) use ($tag) {
            if (empty($tag->link) === true) {
                return $img;
            }

            if ($link = $tag->file($tag->link)) {
                $link = $link->url();
            } else {
                $link = $tag->link === 'self' ? $tag->src : $tag->link;
            }

            return Html::a($link, [$img], [
                'rel'    => $tag->rel,
                'class'  => $tag->linkclass,
                'target' => $tag->target
            ]);
        };

        $imageAttr = [
            'width'  => $tag->width,
            'height' => $tag->height,
            'class'  => $tag->imgclass,
            'title'  => $tag->title,
            'alt'    => $tag->alt ?? ' '
        ];

        if ($tag->file !== null) {
            $dataUri = $tag->file->placeholderUri();
            $useSrcset = $tag->kirby()->option('kirbytext.image.srcset', false);

            $image = Html::img($dataUri, A::merge($imageAttr, [
                'data-src' => !$useSrcset ? $tag->src : null,
                'data-srcset' => $useSrcset ? $tag->file->srcset() : null,
                'data-sizes' => $useSrcset ? 'auto' : null,
                'data-lazyload' => 'true',
            ]));
        } else {
            $image = Html::img($tag->src, $imageAttr);
        }

        $tag->class = trim($tag->class . ' nabu-image-hero', ' ');

        if ($tag->kirby()->option('kirbytext.image.figure', true) === false) {
            return $link($image);
        }

        // render KirbyText in caption
        if ($tag->caption || $tag->text) {
            // $tag->caption = [$tag->kirby()->kirbytext($tag->caption ?? $tag->text, [], true)];
            $tag->caption = [Html::tag('p', [$tag->caption ?? $tag->text])];
        }

        return Html::figure([$link($image)], $tag->caption, [
            'class' => $tag->class
        ]);
    }
];

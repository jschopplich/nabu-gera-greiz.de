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
        'width'
    ],
    'html' => function ($tag) {
        if ($tag->file = $tag->file($tag->value)) {
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
            $useSrcset = $tag->kirby()->option('kirbytext.image.srcset', true);

            // Disable source set generation for GIFs
            if (Str::endsWith($tag->file->filename(), 'gif')) {
                $useSrcset = false;
            }

            $image = Html::img($dataUri, A::merge($imageAttr, [
                'data-src' => !$useSrcset ? $tag->src : null,
                'data-srcset' => $useSrcset ? $tag->file->srcset() : null,
                'data-sizes' => $useSrcset ? 'auto' : null,
                'data-lazyload' => 'true',
            ]));
        } else {
            $image = Html::img($tag->src, $imageAttr);
        }

        $tag->class = trim($tag->class . ' nabu-image-box', ' ');
        if (Str::contains($tag->class, 'vertical')) {
            $tag->class .= ' is-vertical';
        }

        if (Str::contains($tag->class, 'centered')) {
            $tag->class .= ' has-text-centered';
        } elseif (Str::contains($tag->class, 'left')) {
            $tag->class .= ' is-floating-left';
        } else {
            $tag->class .= ' is-floating-right';
        }

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

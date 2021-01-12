<?php

use Kirby\Cms\Html;
use Kirby\Cms\Url;

return [
    'attr' => [
        'class',
        'caption',
        'height',
        'width'
    ],
    'html' => function ($tag) {
        $video = Html::video(
            $tag->value,
            $tag->kirby()->option('kirbytext.video.options', []),
            [
                'class' => $tag->height ?? 'has-ratio',
                'width'  => $tag->width ?? '560',
                'height' => $tag->height ?? '315'
            ]
        );

        return Html::figure([$video], $tag->caption, [
            'class' => $tag->class ?? 'image is-16by9'
        ]);
    }
];

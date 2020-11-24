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
                'class' => $tag->height ?? $tag->kirby()->option('kirbytext.video.iframe.class'),
                'width'  => $tag->width  ?? $tag->kirby()->option('kirbytext.video.iframe.width'),
                'height' => $tag->height ?? $tag->kirby()->option('kirbytext.video.iframe.height')
            ]
        );

        return Html::figure([$video], $tag->caption, [
            'class' => $tag->class ?? $tag->kirby()->option('kirbytext.video.class', 'video')
        ]);
    }
];

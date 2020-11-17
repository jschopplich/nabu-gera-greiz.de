<?php

use Kirby\Cms\Html;
use Kirby\Cms\Url;

return [
    'attr' => [
        'class',
        'lang',
        'rel',
        'role',
        'target',
        'title',
        'text',
    ],
    'html' => function ($tag) {
        if ($tag->file = $tag->file($tag->value)) {
            $tag->value = $tag->file->url();
        } else if (empty($tag->lang) === false) {
            $tag->value = Url::to($tag->value, $tag->lang);
        }

        return Html::a($tag->value, $tag->text, [
            'rel'    => $tag->rel,
            'class'  => $tag->class,
            'role'   => $tag->role,
            'title'  => $tag->title,
            'target' => $tag->target,
        ]);
    }
];

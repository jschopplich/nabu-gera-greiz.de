<?php

use Kirby\Cms\Html;

return [
    'attr' => [
        'text'
    ],
    'html' => function ($tag) {
        $tag->file = kirby()->file('documents/' . $tag->value);

        if (empty($tag->text)) {
            $tag->text = str_replace('_', '\_', $tag->file->filename());
        }

        return Html::a($tag->file->url(), $tag->text, [
            'class'  => 'pdf'
        ]);
    }
];

<?php

return [
    'attr' => [
        'text'
    ],
    'html' => function ($tag) {
        // use filename if the text is empty and make sure to
        // ignore markdown italic underscores in filenames
        if (empty($tag->text) === true) {
            $tag->text = str_replace('_', '\_', $file->filename());
        }
        return Html::a(Kirby::instance()->file('documents/' . $tag->value), $tag->text, [
            'class'  => 'pdf',
            'target' => '_blank'
        ]);
    }
];

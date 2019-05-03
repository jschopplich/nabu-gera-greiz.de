<?php

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

        // Replace `$tag->src` by a thumb if width or height are not null
        if ($tag->file && ($tag->width || $tag->height)) {
            // Backup data
            $tag->orginal = new StdClass();
            $tag->orginal->src    = $tag->src;
            $tag->orginal->width  = $tag->file->width();
            $tag->orginal->height = $tag->file->height();
            $tag->src = $tag->file->thumb([
                'width'  => $tag->width,
                'height' => $tag->height,
            ])->url();
        } else {
            $thumb = $tag->src;
        }

        if ($tag->file) {
            // Backup data
            $tag->orginal      = new StdClass();
            $tag->orginal->src = $tag->src;
            $tag->src = $tag->file->srcset('default');
        }

        $image = Html::img('', [
            'srcset' => $tag->src,
            'class'  => $tag->imgclass,
            'title'  => $tag->title,
            'alt'    => $tag->alt ?? ' '
        ]);

        if ($tag->kirby()->option('kirbytext.image.figure', true) === false) {
            return $link($image);
        }

        return Html::figure([$link($image)], $tag->caption, [
            'class' => $tag->class
        ]);

    }
];

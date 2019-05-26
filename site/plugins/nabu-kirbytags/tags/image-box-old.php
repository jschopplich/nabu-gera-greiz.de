<?php

return [
    'attr' => [
        'alt',
        'caption',
        'class',
        'position',
        'layout',
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
        if ($tag->file = Kirby::instance()->file('images/' . $tag->value)) {
            $tag->src     = $tag->file->url();
            $tag->alt     = $tag->alt     ?? $tag->file->alt()->or(' ')->value();
            $tag->title   = $tag->title   ?? $tag->file->title()->value();
            $tag->caption = $tag->caption ?? $tag->file->caption()->value();
            $width        = Str::contains($tag->class, 'layout') ? option('kirbytext.image-box.width-vertical') : option('kirbytext.image-box.width');
            $tag->width   = $tag->width   ?? $width;
            $tag->height  = $tag->height  ?? option('kirbytext.image-box.height');
        } else {
            $tag->src = Url::to($tag->value);
        }

        $link = function ($img) use ($tag) {
            if (empty($tag->link) === true) {
                return $img;
            }

            return Html::a($tag->link === 'self' ? $tag->src : $tag->link, [$img], [
                'rel'       => $tag->rel,
                'class'     => $tag->linkclass,
                'target'    => $tag->target,
                'data-size' => $tag->link !== 'self' ? $tag->orginal->width . 'x' . $tag->orginal->height : null
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

        $image = Html::img($tag->src, [
            'width'  => $tag->width,
            'height' => $tag->height,
            'class'  => $tag->imgclass,
            'title'  => $tag->title,
            'alt'    => $tag->alt ?? ' '
        ]);

        $figureClass = ' image-box';
        if (Str::contains($tag->class, 'centered')) {
            $figureClass .= ' has-text-centered';
        } elseif (Str::contains($tag->class, 'left')) {
            $figureClass .= ' is-pulled-left';
        } else {
            $figureClass .= ' is-pulled-right';
        }

        $caption = $tag->text ? [Html::tag('p', [$tag->text])] : null;

        if ($tag->kirby()->option('kirbytext.image.figure', true) === false) {
            return $link($image);
        }

        return Html::figure([$link($image)], $caption, [
            'class' => $tag->class . $figureClass
        ]);

    }
];

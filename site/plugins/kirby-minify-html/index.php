<?php

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Template;
use Kirby\Toolkit\Tpl;
use voku\helper\HtmlMin;

class MinifyHTML extends Template
{
    public function render(array $data = []): string
    {
        $html = Tpl::load($this->file(), $data);

        if (option('kirby-extended.kirby-minify-html.enabled') === false) {
            return $html;
        }

        $htmlMin = new HtmlMin();
        $options = option('kirby-extended.kirby-minify-html.options');

        foreach ($options as $option => $status) {
            if (method_exists($htmlMin, $option)) {
                $htmlMin->{$option}((bool) $status);
            }
        }

        return $htmlMin->minify($html);
    }
}

Kirby::plugin('kirby-extended/kirby-minify-html', [
    'options' => [
        'enabled' => true,
        'options' => []
    ],
    'components' => [
        'template' => function (Kirby $kirby, string $name, ?string $contentType = null) {
            return new MinifyHTML($name, $contentType);
        }
    ]
]);

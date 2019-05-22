<?php

$base = dirname(dirname(__DIR__));
(new \Beebmx\KirbyEnv($base))->load();

return [

    'debug' => env('KIRBY_DEBUG', false),
    'panel' => [
        'install' => env('KIRBY_INSTALL', false),
        'slug' => env('KIRBY_PANEL', 'panel'),
        'language' => 'de'
    ],
    'api' => env('KIRBY_API', true),
    'cookieName' => env('KIRBY_SESSION', 'kirby_session'),
    'thumbs' => [
        'quality' => env('KIRBY_THUMBS_QUALITY', '90'),
        'srcsets' => [
            //'default' => [640, 768, 1024, 1366, 1600, 1920]
            'default' => [640, 768, 1024]
        ]
    ],

    'markdown' => [
      'extra' => true
    ],

    // Dates
    'date.handler' => 'strftime',
    'locale' => 'de_DE.utf-8',

    // Routes
    'routes' => require __DIR__ . '/routes.php',

    // Meta
    'pedroborges.meta-tags.default' => require __DIR__ . '/meta.php',
    'pedroborges.meta-tags.templates' => require __DIR__ . '/meta-templates.php',

    // Plugins
    'omz13.xmlsitemap.includeUnlistedWhenSlugIs' => ['archiv', 'datenschutzerklaerung', 'impressum', 'korkampagne'],
    'omz13.xmlsitemap.excludeChildrenWhenTemplateIs' => ['events'],
    'community.markdown-field.font' => [
        'family'  => 'sans-serif',
        'scaling' => true,
        'size'    => 'regular',
    ],

    // Custom tags
    'kirbytext.image-hero.width' => '768',
    'kirbytext.image-box.width' => '768',
    'kirbytext.image-box.width-vertical' => '480',

];

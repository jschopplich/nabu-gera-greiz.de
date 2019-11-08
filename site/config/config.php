<?php

$base = dirname(__DIR__, 2);
(new \Beebmx\KirbyEnv($base))->load();

return [

    'debug' => env('KIRBY_DEBUG', false),
    'panel' => [
        'install' => env('KIRBY_INSTALL', false),
        'slug' => env('KIRBY_PANEL', 'panel'),
        'language' => 'de'
    ],

    'hooks' => require_once 'hooks.php',
    'routes' => require_once 'routes.php',

    'thumbs' => [
        'quality' => env('KIRBY_THUMBS_QUALITY', '90'),
        'srcsets' => [
            // 'default' => [640, 768, 1024, 1366, 1600, 1920]
            'default' => [640, 768, 1024]
        ]
    ],

    // Format a local time/date according to locale settings
    'date.handler' => 'strftime',
    'locale' => 'de_DE.utf-8',

    'markdown' => [
      'extra' => true
    ],

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

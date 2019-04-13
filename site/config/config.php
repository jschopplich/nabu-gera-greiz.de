<?php

return [

  'debug' => true,
  'markdown' => [
    'extra' => true
  ],

  'date.handler' => 'strftime',
  'locale' => 'de_DE.utf-8',
  'routes' => require __DIR__ . '/routes.php',

  'panel' => [
    'language' => 'de'
  ],

  // Plugins
  'omz13.xmlsitemap.includeUnlistedWhenSlugIs' => ['archiv', 'datenschutzerklaerung', 'impressum', 'korkampagne'],
  'omz13.xmlsitemap.excludeChildrenWhenTemplateIs' => ['events'],
  'community.markdown-field.font' => [
    'family'  => 'sans-serif',
    'scaling' => true,
    'size'    => 'regular',
  ],

  // Custom tags
  'kirbytext.image.width' => '768',
  'kirbytext.image-hero.width' => '768',
  'kirbytext.image-box.width' => '768',
  'kirbytext.image-box.width-vertical' => '480',

];

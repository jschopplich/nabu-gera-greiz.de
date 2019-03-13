<?php

setlocale(LC_TIME, 'de_DE.UTF-8', 'German_Germany', 'German');

return [

  'debug' => true,
  'markdown' => [
    'extra' => true
  ],

  'panel' => [
    'language' => 'de'
  ],

  'routes' => require __DIR__ . '/routes.php',

  'thumbs' => [
    'quality' => '80'
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

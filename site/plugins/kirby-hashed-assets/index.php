<?php

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Url;
use Kirby\Data\Json;
use Kirby\Toolkit\F;
use Kirby\Toolkit\Str;

$handleAsset = function ($kirby, $url, $options, $extension) {
    // Bail if URL is absolute
    if (Url::isAbsolute($url)) {
        return $url;
    }

    $absolutePath = Url::path($url, true);
    $isAuto = $url === '@template';
    $manifestPath = $kirby->root() . '/assets/manifest.json';
    static $manifest = [];

    // Get the manifest contents
    if (empty($manifest) && F::exists($manifestPath)) {
        $manifest = Json::decode(F::read($manifestPath));
    }

    // Build path to template asset
    if ($isAuto) {
        $absolutePath = '/assets/' . $extension . '/templates/' . $kirby->site()->page()->template()->name() . '.' . $extension;
    }

    // Check if the unhashed file exists before looking it up in the manifest
    if (F::exists($kirby->root() . $absolutePath)) {
        $filePath = Str::ltrim($kirby->root() . $absolutePath, $kirby->root());
        return $filePath;
    }

    // Check if the manifest contains the given file
    if (array_key_exists($absolutePath, $manifest)) {
        return $manifest[$absolutePath];
    }

    return $url;
};

Kirby::plugin('johannschopplich/hashed-assets-helper', [
    'components' => [
        'css' => fn($kirby, $url, $options) => $handleAsset($kirby, $url, $options, 'css'),
        'js' => fn($kirby, $url, $options) => $handleAsset($kirby, $url, $options, 'js')
    ]
]);

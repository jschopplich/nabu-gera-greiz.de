<?php

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Url;
use Kirby\Toolkit\Str;

$handleAsset = function ($kirby, $url, $options, $extension) {
    // Bail if URL is absolute and points to a foreign host
    if (Url::isAbsolute($url) && !Str::startsWith($url, Url::stripPath())) {
        return $url;
    }

    $relativeUrl = Url::path($url);
    $isAuto = $url === '@template';

    // Add `*` pattern before extension to matching zero or more characters
    $relativeUrl = Str::replace($relativeUrl, ".{$extension}", ".*{$extension}");

    if ($isAuto) {
        $relativeUrl = 'assets/' . $extension . '/templates/' . $kirby->site()->page()->template()->name() . '.*' . $extension;
    }

    // Try to find the file if glob pattern is used
    $fileMatch = glob($kirby->root() . '/' . $relativeUrl);

    // Make sure only one match was found
    if (count($fileMatch) > 1 && option('debug')) {
        throw new Exception("Multiple matches found. Make sure only one {$extension} file matches {$relativeUrl}.");
    }

    // Make sure the file was found
    if (!empty($fileMatch)) {
        $filePath = Str::ltrim($fileMatch[0], $kirby->root());
        return $filePath;
    }

    return $url;
};

Kirby::plugin('johannschopplich/hashed-assets-helper', [
    'components' => [
        'css' => fn($kirby, $url, $options) => $handleAsset($kirby, $url, $options, 'css'),
        'js' => fn($kirby, $url, $options) => $handleAsset($kirby, $url, $options, 'js')
    ]
]);

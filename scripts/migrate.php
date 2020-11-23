<?php

$base = dirname(__DIR__);

require $base . '/vendor/autoload.php';

use Kirby\Cms\App as Kirby;
use Kirby\Toolkit\F;
use Kirby\Toolkit\Str;

$kirby = new Kirby([
    'roots' => [
        'index'    => $base . '/public',
        'base'     => $base,
        'site'     => $base . '/site',
        'storage'  => $storage = $base . '/storage',
        'content'  => $storage . '/content',
        'accounts' => $storage . '/accounts',
        'cache'    => $storage . '/cache',
        'sessions' => $storage . '/sessions',
    ]
]);

$data = F::read('data.txt');
$data = Str::split($data, PHP_EOL . '(line: thick)');

$destination = 'aktuelles';

foreach ($data as $text) {
    // Get title and subtitle
    preg_match('/#{2}.*/', $text, $title);
    preg_match('/#{3}.*/', $text, $subtitle);

    // Remove markdown headings
    $text = preg_replace('/#{2}.*/', '', $text, 1);
    $text = preg_replace('/#{3}.*/', '', $text, 1);

    // Remove `#` from extract headings
    $title = substr($title[0], 3);
    $subtitle = substr($subtitle[0], 4);

    $match = Str::split($subtitle, '<br>');
    if (count($match) === 1) {
        $subtitle = '';
        $date = $match[0];
    } else {
        $subtitle = $match[0];
        $date = $match[1];
    }

    // Parse date
    $date = Str::replace($date, '(', '');
    $date = Str::replace($date, ')', '');
    $date = date('Y-m-d', strtotime($date));

    $slug = Str::slug($title);
    if (site()->findPageOrDraft($destination . '/' . $slug)) continue;

    echo $title . PHP_EOL . PHP_EOL;

    // Prepare `$images` and `$documents` variables
    preg_match_all('/old:\s.*\.[a-z]{3}[\s)]/', $text, $images);
    preg_match_all('/pdf:\s.*\.[a-z]{3}[\s)]/', $text, $documents);

    // Create child
    kirby()->impersonate('kirby');
    $page = page($destination)->createChild([
        'slug'     => $slug,
        'template' => 'article',
        'content'  => [
            'title' => $title,
            'subtitle' => $subtitle,
            'date' => $date,
            'text' => $text
        ]
    ]);

    $num = $page->createNum();
    $page = $page->publish()->changeNum($num);

    foreach ($images[0] as $image) {
        // Remove `old:` at begining of string
        $image = substr($image, 4);
        // Remove `)` if present
        $image = Str::replace($image, ')', '');
        $image = trim($image);

        echo $image . PHP_EOL;
        kirby()->impersonate('kirby');
        $file = $page->createFile([
            'filename' => basename($image),
            'parent' => $page,
            'source' => kirby()->root('content') . '/images/' . $image
        ]);

        $text = Str::replace($text, '-old: ' . $image, ': ' . $file->filename());
    }

    foreach ($documents[0] as $document) {
        // Remove `pdf:` at begining of string
        $document = substr($document, 4);
        // Remove `)` if present
        $document = Str::replace($document, ')', '');
        $document = trim($document);

        echo $document . PHP_EOL;

        // Create the file
        kirby()->impersonate('kirby');
        $file = $page->createFile([
            'filename' => basename($document),
            'parent' => $page,
            'source' => kirby()->root('content') . '/documents/' . $document
        ]);

        $text = Str::replace($text, 'pdf: ' . $document, 'file: ' . $file->filename());
    }

    // Other text changes
    $text = Str::replace($text, 'image-plain', 'image');

    $text = Str::replace($text, 'position: left layout: custom', 'class: left vertical');
    $text = Str::replace($text, 'position: left layout: vertical', 'class: left vertical');
    $text = Str::replace($text, 'position: right layout: custom', 'class: right vertical');
    $text = Str::replace($text, 'position: right layout: vertical', 'class: right vertical');

    $text = Str::replace($text, 'position: left', 'class: left');
    $text = Str::replace($text, 'layout: custom', 'class: vertical');
    $text = Str::replace($text, 'layout: vertical', 'class: vertical');

    $text = Str::replace($text, 'target: _blank class: arrow', 'target: _blank');
    $text = Str::replace($text, 'target: _blank class: pdf', 'target: _blank');
    $text = Str::replace($text, 'class: arrow target: _blank', 'target: _blank');
    $text = Str::replace($text, 'class: pdf target: _blank', 'target: _blank');

    kirby()->impersonate('kirby');
    $page->update(['text' => $text]);
}

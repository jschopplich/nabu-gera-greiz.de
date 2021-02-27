<?php

/** @var \Kirby\Cms\Block $block */
$alt     = $block->alt();
$caption = $block->caption();
$link    = $block->link();
$props   = trim($block->norm() . ' ' . $block->properties() . ' ' . $block->ratio(), ' ');
$src     = null;
$srcset  = null;
$sizes   = null;
$dataUri = null;

if ($block->location() === 'web') {
  $src = $block->src();
} elseif ($image = $block->image()->toFile()) {
  if ($alt->isEmpty()) $alt = $image->alt();
  if ($caption->isEmpty()) $caption = $image->caption();
  $srcset = $image->srcset();
  $sizes = 'auto';
  $dataUri = $image->placeholderUri();
}

?>
<?php if ($src || $srcset): ?>
  <figure<?= attr(['class' => $props], ' ') ?>>
    <?php if ($link->isNotEmpty()): ?>
      <a href="<?= $link->toUrl() ?>">
    <?php endif ?>
      <img <?= attr([
        'src' => $dataUri,
        'alt' => $alt,
        'data-src' => $src,
        'data-srcset' => $srcset,
        'data-sizes' => $sizes,
        'data-lazyload' => 'true',
      ]) ?>>
    <?php if ($link->isNotEmpty()): ?>
      </a>
    <?php endif ?>

    <?php if ($caption->isNotEmpty()): ?>
      <figcaption>
        <?= $caption ?>
      </figcaption>
    <?php endif ?>
  </figure>
<?php endif ?>

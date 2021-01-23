<?php /** @var \Kirby\Cms\Block $block */ ?>
<div class="nabu-carousel">
  <?php foreach ($block->images()->toFiles() as $image): ?>
    <figure>
      <img
        srcset="<?= $image->srcset() ?>"
        alt="<?= $image->alt() ?>"
        width="<?= $image->width() ?>"
        height="<?= $image->height() ?>"
      >
    </figure>
  <?php endforeach ?>
</div>

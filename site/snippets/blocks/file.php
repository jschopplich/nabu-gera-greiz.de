<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php if ($file = $block->image()->toFile()): ?>
  <p>
    <a download href="<?= $file->url() ?>">
      <?= $block->text() ?>
    </a>
  </p>
<?php endif ?>

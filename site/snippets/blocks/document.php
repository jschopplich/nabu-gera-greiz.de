<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php if ($file = $block->file()->toFile()): ?>
  <p>
    <a href="<?= $file->url() ?>" download>
      <?= $block->text() ?>
    </a>
  </p>
<?php endif ?>

<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php if ($block->url()->isNotEmpty()): ?>
  <figure class="image is-16by9">
    <?= video($block->url(), [], [
      'class' => 'has-ratio',
      'width' => '560',
      'height' => '315'
    ]) ?>
    <?php if ($block->caption()->isNotEmpty()): ?>
      <figcaption><?= $block->caption() ?></figcaption>
    <?php endif ?>
  </figure>
<?php endif ?>

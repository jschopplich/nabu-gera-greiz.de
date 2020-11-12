<?php snippet('header') ?>

<div class="section">
  <div class="content-wrapper container">
    <div class="content is-main is-old-blog">
      <?php snippet('intro') ?>
      <?= $page->text()->kirbytext() ?>
    </div>

    <?php snippet('side') ?>
  </div>
</div>

<?php snippet('footer') ?>

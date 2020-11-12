<?php snippet('header') ?>

<div class="section">
  <div class="container is-main">
    <div class="content is-main">
      <?php snippet('intro') ?>
      <?= $page->text()->kirbytext() ?>
    </div>

    <?php snippet('side') ?>
  </div>
</div>

<?php snippet('footer') ?>

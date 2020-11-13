<?php snippet('header') ?>

<div class="section">
  <div class="content-wrapper container">
    <div class="content is-main">
      <?php snippet('intro') ?>
      <?= $page->text()->kirbytext() ?>
    </div>

    <?php snippet('sidebar') ?>
  </div>
</div>

<?php snippet('footer') ?>

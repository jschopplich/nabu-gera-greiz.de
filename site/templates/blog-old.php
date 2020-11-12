<?php snippet('header') ?>

<div class="container">
  <div class="columns is-marginless pt-6 pb-6">

    <div class="column pr-6">
      <div class="content is-main is-old-blog">
        <?php snippet('intro') ?>
        <?= $page->text()->kirbytext() ?>
      </div>
    </div>

    <div class="column is-narrow pl-6 is-hidden-mobile">
      <?php snippet('side') ?>
    </div>

  </div>
</div>

<?php snippet('footer') ?>

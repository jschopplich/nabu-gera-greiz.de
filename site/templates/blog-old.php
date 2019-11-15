<?php snippet('header') ?>

  <div class="container">
    <div class="columns is-marginless has-pb-xlarge">
      <div class="column section has-pt-xlarge has-pt-xxlarge-tablet has-pr-xlarge-tablet">
        <div class="content is-main is-old-blog">

          <?php snippet('intro') ?>
          <?= $page->text()->kirbytext() ?>

        </div>
      </div>

      <?php snippet('side') ?>

    </div>
  </div>

<?php snippet('footer') ?>

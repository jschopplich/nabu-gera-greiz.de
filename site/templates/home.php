<?php snippet('header') ?>

  <section class="section is-home container has-pt-xlarge">
    <div class="content is-main">
      <h2 class="title is-3 has-text-weight-bold has-mb-large"><?= $page->intro()->html() ?></h2>
      <?= $page->textBeforeListing()->kt() ?>
    </div>
  </section>

  <section class="section is-article-cards has-background-white-bis">
    <div class="container">
      <?php snippet('article-cards', ['articles' => $articles]) ?>
    </div>
  </section>

  <section class="section is-home container">
    <div class="content is-main">
      <?= $page->textAfterListing()->kt() ?>
    </div>
  </section>

<?php snippet('footer') ?>

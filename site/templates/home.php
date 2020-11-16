<?php snippet('header') ?>

<div class="section is-home pt-6">
  <div class="container">
    <section class="content is-main">
      <h2 class="title is-1 is-size-2-mobile has-text-weight-bold"><?= $page->intro()->html() ?></h2>
      <?= $page->textBeforeListing()->kt() ?>
    </section>
  </div>
</div>

<div class="section has-background-white-bis">
  <div class="container">
    <h2 id="aktuelles" class="title is-3 has-text-weight-bold has-text-centered mb-6">
      Aktuelle Beiträge
    </h2>

    <?php foreach ($articles as $article): ?>
      <div class="media box" data-animere="slideInUp">
        <div class="media-left mr-5">
          <?php if ($image = $article->images()->first()): ?>
            <figure class="image is-96x96">
              <img src="<?= $image->crop(96, 96, 'center')->url() ?>" alt="">
            </figure>
          <?php else: ?>
            <span class="icon is-large has-text-grey-lighter">
              <span class="fas fa-3x fa-newspaper" aria-hidden="true"></span>
            </span>
          <?php endif ?>
        </div>

        <div class="media-content">
          <span class="tag mb-2"><?= $article->date()->toDate('%e. %B %Y') ?></span>
          <p class="title is-5">
            <a class="stretched-link" href="<?= $article->url() ?>">
              <?= $article->title() ?>
            </a>
          </p>
          <?php if ($article->subtitle()->isNotEmpty()): ?>
            <p class="subtitle is-6 has-text-grey-dark"><?= $article->subtitle() ?></p>
          <?php endif ?>
        </div>
      </div>
    <?php endforeach ?>

    <div class="has-text-centered mt-6">
      <a href="<?= page('aktuelles')->url() ?>" class="button is-primary is-outlined is-medium" role="button">
        Alle Beiträge
      </a>
    </div>
  </div>
</div>

<div class="section is-home">
  <div class="container">
    <section class="content is-main">
      <?= $page->textAfterListing()->kt() ?>
    </section>
  </div>
</div>

<?php snippet('footer') ?>

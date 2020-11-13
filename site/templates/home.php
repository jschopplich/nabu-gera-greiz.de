<?php snippet('header') ?>

<div class="section is-home pt-6">
  <div class="container">
    <section class="content is-main">
      <h2 class="title is-3 has-text-weight-bold mb-5"><?= $page->intro()->html() ?></h2>
      <?= $page->textBeforeListing()->kt() ?>
    </section>
  </div>
</div>

<div class="section is-article-list has-background-white-bis">
  <div class="container">
    <h2 id="aktuelles" class="title is-3 has-text-weight-bold has-text-centered mb-6">
      Aktuelle Beiträge
    </h2>

    <div class="is-hidden-tablet">
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
    </div>

    <div class="columns is-centered is-multiline is-hidden-mobile">
      <?php foreach ($articles as $article): ?>
        <div class="column is-4">
          <div class="card">

            <div class="card-image">
              <?php if ($image = $article->images()->first()): ?>
                <figure class="image is-3by2">
                  <img src="<?= $image->crop(360, 240, 'center')->url() ?>" alt="<?= $article->title() ?>">
                </figure>
              <?php else: ?>
                <figure class="image is-3by2">
                  <span class="has-ratio icon has-text-grey-lighter">
                    <span class="fas fa-5x fa-newspaper" aria-hidden="true"></span>
                  </span>
                </figure>
              <?php endif ?>
            </div>

            <div class="card-content">
              <span class="tag mb-4"><?= $article->date()->toDate('%e. %B %Y') ?></span>
              <p class="title is-4 is-hyphenated">
                <a class="stretched-link" href="<?= $article->url() ?>"><?= $article->title() ?></a>
              </p>
              <?php if ($article->subtitle()->isNotEmpty()): ?>
                <p class="subtitle is-6 has-text-grey"><?= $article->subtitle() ?></p>
              <?php endif ?>
            </div>

          </div>
        </div>
      <?php endforeach ?>
    </div>

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

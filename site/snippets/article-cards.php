<?php if (isset($articles)): ?>
  <?php if ($articles->count()): ?>

    <h2 id="aktuelles" class="title is-3 has-text-weight-bold has-text-centered has-mb-large has-mb-xlarge-desktop">Aktuelle Beiträge</h2>

    <div class="is-hidden-tablet">
      <?php foreach ($articles as $article): ?>
      <div class="media box" data-scrollreveal="scale">
        <div class="media-left">
          <a href="<?= $article->url() ?>">
            <?php if ($image = $article->images()->first()): ?>
              <figure class="image is-96x96">
                <img class="has-border-radius" src="<?= $image->crop(96, 96, 'center')->url() ?>" alt="">
              </figure>
            <?php else: ?>
              <span class="icon is-large has-text-white-ter">
                <span class="fas fa-2x fa-newspaper" aria-hidden="true"></span>
              </span>
            <?php endif ?>
          </a>
        </div>

        <div class="media-content">
          <span class="tag has-mb-small"><?= strftime('%e. %B %Y', $article->date()->toDate()) ?></span>
          <p class="title is-5">
            <a href="<?= $article->url() ?>"><?= $article->title() ?></a>
          </p>
          <?php if ($article->subtitle()->isNotEmpty()): ?>
            <p class="subtitle is-6 has-text-grey-light"><?= $article->subtitle() ?></p>
          <?php endif ?>
        </div>
      </div>
      <?php endforeach ?>
    </div>

    <div class="columns is-centered is-multiline is-hidden-mobile">
      <?php foreach ($articles as $article): ?>
      <div class="column is-4" data-scrollreveal="scale">
        <div class="card">

          <div class="card-image">
            <a href="<?= $article->url() ?>">
              <?php if ($image = $article->images()->first()): ?>
                <figure class="image is-3by2">
                  <img src="<?= $image->crop(360, 240, 'center')->url() ?>" alt="<?= $article->title() ?>">
                </figure>
              <?php else: ?>
                <figure class="image is-3by2">
                  <span class="has-ratio card-icon icon has-text-white-ter">
                    <svg aria-hidden="true" data-prefix="fal" data-icon="newspaper" class="svg-inline--fa fa-newspaper fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M552 64H88c-13.234 0-24 10.767-24 24v8H24c-13.255 0-24 10.745-24 24v280c0 26.51 21.49 48 48 48h504c13.233 0 24-10.767 24-24V88c0-13.233-10.767-24-24-24zM32 400V128h32v272c0 8.822-7.178 16-16 16s-16-7.178-16-16zm512 16H93.258A47.897 47.897 0 0 0 96 400V96h448v320zm-404-96h168c6.627 0 12-5.373 12-12V140c0-6.627-5.373-12-12-12H140c-6.627 0-12 5.373-12 12v168c0 6.627 5.373 12 12 12zm20-160h128v128H160V160zm-32 212v-8c0-6.627 5.373-12 12-12h168c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12H140c-6.627 0-12-5.373-12-12zm224 0v-8c0-6.627 5.373-12 12-12h136c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0-64v-8c0-6.627 5.373-12 12-12h136c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0-128v-8c0-6.627 5.373-12 12-12h136c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0 64v-8c0-6.627 5.373-12 12-12h136c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12z"></path></svg>
                  </span>
                </figure>
              <?php endif ?>
            </a>
          </div>

          <div class="card-content">
            <span class="tag has-mb-normal"><?= strftime('%e. %B %Y', $article->date()->toDate()) ?></span>
            <p class="title is-4 is-hyphenated">
              <a href="<?= $article->url() ?>"><?= $article->title() ?></a>
            </p>
            <?php if ($article->subtitle()->isNotEmpty()): ?>
              <p class="subtitle is-6 has-text-grey"><?= $article->subtitle() ?></p>
            <?php endif ?>
          </div>

        </div>
      </div>
      <?php endforeach ?>
    </div>

    <?php if ($news = page('aktuelles')): ?>
      <div class="has-text-centered has-mt-large">
        <a href="<?= $news->url() ?>" class="button is-primary is-outlined is-medium" role="button">Alle Beiträge</a>
      </div>
    <?php endif ?>

  <?php else: ?>
    <p>Keine neuen Artikel.</p>
  <?php endif ?>
<?php endif ?>

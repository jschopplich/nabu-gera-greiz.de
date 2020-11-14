<?php snippet('header') ?>

<div class="section">
  <div class="content-wrapper container">
    <div class="pagination-wrapper">
      <div class="content is-main">
        <?php snippet('intro') ?>

        <?php if ($page->text()->isNotEmpty()): ?>
          <div class="mb-6">
            <?= $page->text()->kirbytext() ?>
          </div>
        <?php endif ?>

        <?php foreach ($articles as $article): ?>
          <article>
            <div class="mb-5">
              <h2 class="title is-3 is-size-4-mobile has-text-weight-bold">
                <a href="<?= $article->url() ?>"><?= $article->title()->html() ?></a>
              </h2>

              <?php if ($article->subtitle()->isNotEmpty()): ?>
                <p class="subtitle is-5 is-size-6-mobile has-text-grey">
                  <?= $article->subtitle()->html() ?>
                </p>
              <?php endif ?>

              <span class="tag">
                <time datetime="<?= $article->date('c') ?>"><?= strftime('%e. %B %Y', $article->date()->toDate()) ?></time>
              </span>
            </div>

            <?= $article->text()->kirbytext() ?>

            <hr class="wide">
          </article>
        <?php endforeach ?>
      </div>

      <?php snippet('pagination', ['pagination' => $pagination]) ?>
    </div>

    <?php snippet('sidebar') ?>
  </div>
</div>

<?php snippet('footer') ?>

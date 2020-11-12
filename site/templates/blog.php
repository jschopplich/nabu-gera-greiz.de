<?php snippet('header') ?>

<div class="container">
  <div class="columns is-marginless pt-6 pb-6">

    <div class="column pr-6">
      <div class="content is-main">
        <?php snippet('intro') ?>
        <?= $page->text()->kirbytext() ?>

        <?php foreach ($articles as $article): ?>

          <article>
            <h2 class="title is-3 has-text-weight-bold">
              <a href="<?= $article->url() ?>"><?= $article->title()->html() ?></a>
            </h2>
            <?php if ($article->subtitle()->isNotEmpty()): ?>
              <p class="subtitle is-5 has-text-grey">
                <?= $article->subtitle()->html() ?>
              </p>
            <?php endif ?>

            <span class="tag mb-4">
              <time datetime="<?= $article->date('c') ?>"><?= strftime('%e. %B %Y', $article->date()->toDate()) ?></time>
            </span>

            <?= $article->text()->kirbytext() ?>

            <hr class="wide">
          </article>

        <?php endforeach ?>
      </div>

      <?php snippet('pagination', ['pagination' => $pagination]) ?>
    </div>

    <div class="column is-narrow pl-6 is-hidden-mobile">
      <?php snippet('side') ?>
    </div>

  </div>
</div>

<?php snippet('footer') ?>

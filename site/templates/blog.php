<?php snippet('header') ?>

<div class="section">
  <div class="content-wrapper container">
    <div class="pagination-wrapper">
      <div>
        <?php snippet('intro') ?>

        <?php if ($page->text()->isNotEmpty()): ?>
          <div class="content is-main mb-6">
            <?= $page->text()->kirbytext() ?>
          </div>
        <?php endif ?>

        <?php if (!$page->hideArticles()->toBool()): ?>
          <?php foreach ($articles as $article): ?>
            <article class="content is-main is-clearfix">
              <div class="mb-5">
                <h2 class="title is-size-2-tablet has-text-weight-bold">
                  <a href="<?= $article->url() ?>"><?= $article->title()->html() ?></a>
                </h2>

                <?php if ($article->subtitle()->isNotEmpty()): ?>
                  <p class="subtitle is-size-4-tablet has-text-grey">
                    <?= $article->subtitle()->html() ?>
                  </p>
                <?php endif ?>

                <span class="tag">
                  <time datetime="<?= $article->date()->toDate('%F') ?>">
                    <?= $article->date()->toDate('%e. %B %Y') ?>
                  </time>
                </span>
              </div>

              <?php if ($article->intendedTemplate()->name() === 'article-blocks'): ?>
                <?php
                $blocks = $article->text()->toBlocks();
                $blocks = $blocks->slice(0, 2);
                echo $blocks;
                ?>
              <?php else: ?>
                <?= $article->text()->ktExcerpt(60) ?>
              <?php endif ?>

              <a href="<?= $article->url() ?>" class="button is-primary is-outlined">
                Weiterlesen
                <span class="ml-2 fas fa-arrow-right" aria-hidden="true"></span>
              </a>

              <hr class="is-wide">
            </article>
          <?php endforeach ?>
        <?php endif ?>
      </div>

      <?php if (!$page->hideArticles()->toBool()): ?>
        <?php snippet('pagination', ['pagination' => $articles->pagination()]) ?>
      <?php endif ?>
    </div>

    <?php snippet('sidebar') ?>
  </div>
</div>

<?php snippet('footer') ?>

<?php snippet('header') ?>

  <div class="container">
    <div class="columns is-marginless has-pb-xlarge">
      <div class="column section has-pt-xlarge has-pt-xxlarge-tablet has-pr-xlarge-tablet">
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

            <span class="tag has-mb-medium">
              <time datetime="<?= $article->date('c') ?>"><?= strftime('%e. %B %Y', $article->date()->toDate()) ?></time>
            </span>

            <?= $article->text()->kirbytext() ?>

            <hr class="wide">
          </article>

          <?php endforeach ?>
        </div>
        <?php snippet('navigation/pagination', ['pagination' => $pagination]) ?>
      </div>
      <?php snippet('side') ?>
    </div>
  </div>

<?php snippet('footer') ?>
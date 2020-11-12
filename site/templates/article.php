<?php snippet('header') ?>

<div class="container">
  <div class="columns is-marginless pt-6 pb-6">

    <div class="column pr-6">
      <div class="content is-main">
        <article class="mb-6">
          <h1 class="title is-3 has-text-weight-bold">
            <?= $page->title()->html() ?>
          </h1>
          <?php if ($page->subtitle()->isNotEmpty()): ?>
            <p class="subtitle is-5 has-text-grey">
              <?= $page->subtitle()->html() ?>
            </p>
          <?php endif ?>

          <span class="tag mb-4">
            <time datetime="<?= $page->date()->toDate('%Y-%m-%d') ?>"><?= $page->date()->toDate('%e. %B %Y') ?></time>
          </span>

          <?= $page->text()->kirbytext() ?>
        </article>
        <?php snippet('prevnext') ?>
      </div>
    </div>

    <div class="column is-narrow pl-6 is-hidden-mobile">
      <?php snippet('side') ?>
    </div>

  </div>
</div>

<?php snippet('footer') ?>

<?php snippet('header') ?>

<div class="section">
  <div class="content-wrapper container">
    <div>
      <article class="content is-main mb-6">
        <div class="mb-5">
          <?php snippet('intro') ?>

          <?php if ($page->subtitle()->isNotEmpty()): ?>
            <p class="subtitle is-4 is-size-5-mobile has-text-grey">
              <?= $page->subtitle()->html() ?>
            </p>
          <?php endif ?>

          <span class="tag">
            <time datetime="<?= $page->date()->toDate('%Y-%m-%d') ?>"><?= $page->date()->toDate('%e. %B %Y') ?></time>
          </span>
        </div>

        <?= $page->text()->kirbytext() ?>
      </article>

      <?php snippet('prevnext') ?>
    </div>

    <?php snippet('sidebar') ?>
  </div>
</div>

<?php snippet('footer') ?>

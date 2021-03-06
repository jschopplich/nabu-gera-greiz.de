<?php snippet('header') ?>

<div class="section">
  <div class="content-wrapper container">
    <div>
      <article class="content is-main mb-6 is-clearfix">
        <div class="mb-6">
          <?php snippet('intro') ?>

          <?php if ($page->subtitle()->isNotEmpty()): ?>
            <p class="subtitle is-size-4-tablet has-text-grey">
              <?= $page->subtitle()->html() ?>
            </p>
          <?php endif ?>

          <span class="tag">
            <time datetime="<?= $page->date()->toDate('%F') ?>">
              <?= $page->date()->toDate('%e. %B %Y') ?>
            </time>
          </span>
        </div>

        <?php if ($page->intendedTemplate()->name() === 'article-blocks'): ?>
          <?= $page->text()->toBlocks() ?>
        <?php else: ?>
          <?= $page->text()->kirbytext() ?>
        <?php endif ?>
      </article>

      <?php snippet('prevnext') ?>
    </div>

    <?php snippet('sidebar') ?>
  </div>
</div>

<?php snippet('footer') ?>

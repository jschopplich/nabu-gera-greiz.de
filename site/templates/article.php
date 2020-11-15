<?php snippet('header') ?>

<div class="section">
  <div class="content-wrapper container">
    <div>
      <article class="content is-main mb-6">
        <div class="mb-5">
          <?php snippet('intro') ?>

          <?php if ($page->subtitle()->isNotEmpty()): ?>
            <p class="subtitle is-size-4-tablet has-text-grey">
              <?= $page->subtitle()->html() ?>
            </p>
          <?php endif ?>

          <span class="tag">
            <time datetime="<?= $page->date()->toDate('%F') ?>"><?= $page->date()->toDate('%e. %B %Y') ?></time>
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

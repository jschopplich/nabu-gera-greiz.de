<?php snippet('header') ?>

  <div class="container">
    <div class="columns is-marginless has-pb-xlarge">
      <div class="column section has-pt-xlarge has-pt-xxlarge-tablet has-pr-xlarge-tablet">
        <div class="content is-main">

          <article class="has-mb-xxlarge" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
            <h1 class="title is-3 has-text-weight-bold" itemprop="name headline">
              <?= $page->title()->html() ?>
            </h1>
            <?php if ($page->subtitle()->isNotEmpty()): ?>
              <p class="subtitle is-5 has-text-grey" itemprop="description">
                <?= $page->subtitle()->html() ?>
              </p>
            <?php endif ?>

            <span class="tag has-mb-medium">
              <time itemprop="datePublished" datetime="<?= $page->date()->toDate('%Y-%m-%d') ?>"><?= strftime('%e. %B %Y', $page->date()->toDate()) ?></time>
            </span>

            <div itemprop="articleBody">
              <?= $page->text()->kirbytext() ?>
            </div>
          </article>
          <?php snippet('prevnext') ?>

        </div>
      </div>
      <?php snippet('side') ?>
    </div>
  </div>

<?php snippet('footer') ?>
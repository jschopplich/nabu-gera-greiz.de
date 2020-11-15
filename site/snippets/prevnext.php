<?php if ($page->hasNextListed() || $page->hasPrevListed()): ?>
  <nav class="pagination is-flex-wrap-nowrap">

    <?php if ($page->hasPrevListed()): ?>
    <a href="<?= $page->prevListed()->url() ?>"
      class="pagination-previous button is-light"
      title="<?= $page->prevListed()->title()->html() ?>"
    >
    <?php else: ?>
    <a class="pagination-previous button is-light" disabled tabindex="-1" aria-disabled="true">
    <?php endif ?>
      <span class="mr-2 fas fa-arrow-left" aria-hidden="true"></span>
      Vorheriger
      <span class="is-hidden-mobile">&nbsp;Artikel</span>
    </a>

    <div class="pagination-divider is-hidden-tablet"></div>

    <?php if ($page->hasNextListed() ): ?>
    <a href="<?= $page->nextListed()->url() ?>"
      class="pagination-next button is-light"
      title="<?= $page->nextListed()->title()->html() ?>"
    >
    <?php else: ?>
    <a class="pagination-next button is-light" disabled tabindex="-1" aria-disabled="true">
    <?php endif ?>
      Nächster
      <span class="is-hidden-mobile">&nbsp;Artikel</span>
      <span class="ml-2 fas fa-arrow-right" aria-hidden="true"></span>
    </a>

  </nav>
<?php endif ?>

<?php if ($page->hasNextListed() || $page->hasPrevListed()): ?>
  <nav class="pagination" aria-label="Seitennummerierung">

    <?php if ($page->hasPrevListed()): ?>
      <a href="<?= $page->prevListed()->url() ?>" class="pagination-previous button is-dark is-outlined" rel="prev" title="<?= $page->prevListed()->title()->html() ?>">
        <span aria-hidden="true">&laquo;&nbsp;</span>
        <span class="is-hidden-mobile">Vorheriger Artikel</span>
      </a>
    <?php else: ?>
      <a class="pagination-previous" disabled tabindex="-1" aria-disabled="true">
        <span aria-hidden="true">&laquo;&nbsp;</span>
        <span class="is-hidden-mobile">Vorheriger Artikel</span>
      </a>
    <?php endif ?>

    <?php if ($page->hasNextListed() ): ?>
      <a href="<?= $page->nextListed()->url() ?>" class="pagination-next button is-dark is-outlined" rel="next" title="<?= $page->nextListed()->title()->html() ?>">
        <span class="is-hidden-mobile">Nächster Artikel</span>
        <span aria-hidden="true">&nbsp;&raquo;</span>
      </a>
    <?php else: ?>
      <a class="pagination-next" disabled tabindex="-1" aria-disabled="true">
        <span class="is-hidden-mobile">Nächster Artikel</span>
        <span aria-hidden="true">&nbsp;&raquo;</span>
      </a>
    <?php endif ?>

  </nav>
<?php endif ?>

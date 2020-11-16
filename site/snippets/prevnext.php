<?php if ($page->hasNextListed() || $page->hasPrevListed()): ?>
  <nav class="pagination is-flex-wrap-nowrap">

    <?php if ($page->hasPrevListed()): ?>
    <a href="<?= $page->prevListed()->url() ?>"
      class="pagination-previous button is-text"
      title="<?= $page->prevListed()->title()->html() ?>"
    >
    <?php else: ?>
    <button class="pagination-previous button is-text" disabled aria-disabled="true">
    <?php endif ?>
      <span class="mr-2 fas fa-arrow-left" aria-hidden="true"></span>
      <span class="is-hidden-tablet" aria-hidden="true">Vorheriger</span>
      <span class="is-hidden-mobile">Vorheriger Artikel</span>
    </<?php e($page->hasPrevListed(), 'a', 'button') ?>>

    <div class="pagination-divider is-hidden-tablet"></div>

    <?php if ($page->hasNextListed() ): ?>
    <a href="<?= $page->nextListed()->url() ?>"
      class="pagination-next button is-text"
      title="<?= $page->nextListed()->title()->html() ?>"
    >
    <?php else: ?>
    <button class="pagination-next button is-text" disabled aria-disabled="true">
    <?php endif ?>
      <span class="is-hidden-mobile">Nächster Artikel</span>
      <span class="is-hidden-tablet" aria-hidden="true">Nächster</span>
      <span class="ml-2 fas fa-arrow-right" aria-hidden="true"></span>
    </<?php e($page->hasPrevListed(), 'a', 'button') ?>>

  </nav>
<?php endif ?>

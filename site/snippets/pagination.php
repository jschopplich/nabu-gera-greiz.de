<?php if ($pagination->hasPages()): ?>
  <nav class="pagination" aria-label="Seitennummerierung">

    <?php if ($pagination->hasPrevPage()): ?>
      <a
        href="<?= $pagination->prevPageUrl() ?>"
        class="pagination-previous button is-text is-hidden-mobile"
      >
        <span class="mr-2 fas fa-arrow-left" aria-hidden="true"></span>
        Vorherige Seite
      </a>
    <?php endif ?>

    <ul class="pagination-list">
      <?php foreach ($pagination->range(5) as $r): ?>
        <li>
          <a
            href="<?= $pagination->pageUrl($r) ?>"
            class="pagination-link button<?php e($pagination->page() === $r, ' is-primary is-current', ' is-light') ?>"
            aria-label="Seite <?php $r ?>"
            <?php e($pagination->page() === $r, 'aria-current="page"') ?>
          >
            <?= $r ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>

    <?php if ($pagination->hasNextPage()): ?>
      <a
        href="<?= $pagination->nextPageUrl() ?>"
        class="pagination-next button is-text is-hidden-mobile"
      >
        Nächste Seite
        <span class="ml-2 fas fa-arrow-right" aria-hidden="true"></span>
      </a>
    <?php endif ?>

  </nav>
<?php endif ?>

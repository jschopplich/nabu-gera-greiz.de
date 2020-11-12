<?php if ($pagination->hasPages()): ?>
  <nav class="pagination" aria-label="Seitennummerierung">

    <?php if ($pagination->hasPrevPage()): ?>
      <a href="<?= $pagination->prevPageUrl() ?>" class="pagination-previous" aria-label="Vorherige Seite">
        <span aria-hidden="true">&laquo;</span>&nbsp;Vorherige Seite
      </a>
    <?php else: ?>
      <a class="pagination-previous" disabled tabindex="-1" aria-disabled="true">
        <span aria-hidden="true">&laquo;</span>&nbsp;Vorherige Seite
      </a>
    <?php endif ?>

    <ul class="pagination-list">
      <?php foreach ($pagination->range(10) as $r): ?>
        <li>
          <a
            href="<?= $pagination->pageUrl($r) ?>" class="pagination-link<?php e($pagination->page() === $r, ' is-current') ?>"
            aria-label="Zu Seite <?php $r ?> navigieren"
            <?php e($pagination->page() === $r, 'aria-current="page"') ?>
          >
            <?= $r ?>
            <span class="sr-only">(aktuelle Seite)</span>
          </a>
        </li>
      <?php endforeach ?>
    </ul>

    <?php if ($pagination->hasNextPage()): ?>
      <a href="<?= $pagination->nextPageUrl() ?>" class="pagination-next" aria-label="Nächste Seite">
        Nächste Seite&nbsp;<span aria-hidden="true">&raquo;</span>
      </a>
    <?php else: ?>
      <a class="pagination-next" disabled tabindex="-1" aria-disabled="true">
        Nächste Seite&nbsp;<span aria-hidden="true">&raquo;</span>
      </a>
    <?php endif ?>

  </nav>
<?php endif ?>

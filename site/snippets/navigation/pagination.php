<?php if ($pagination->hasPages()): ?>
  <nav class="pagination is-centered" aria-label="Seitennummerierung">

    <?php if ($pagination->hasPrevPage()): ?>
      <a href="<?= $pagination->prevPageUrl() ?>" class="pagination-previous" rel="prev" aria-label="Vorherige Seite">
        <span aria-hidden="true">&laquo;&nbsp;</span>Vorherige Seite
      </a>
    <?php else: ?>
      <a class="pagination-previous" disabled tabindex="-1" aria-disabled="true">
        <span aria-hidden="true">&laquo;&nbsp;</span>Vorherige Seite
      </a>
    <?php endif ?>

    <ul class="pagination-list">
      <?php foreach ($pagination->range(10) as $r): ?>
        <li>
          <a href="<?= $pagination->pageUrl($r) ?>" class="pagination-link<?php e($pagination->page() === $r, ' is-current') ?>"
          aria-label="Auf Seite <?php $r ?> gehen<?php e($pagination->page() === $r, ', aktuelle Seite') ?>" <?php e($pagination->page() === $r, 'aria-current="page"') ?>>
            <?= $r ?>
            <span class="sr-only">(aktuelle Seite)</span>
          </a>
        </li>
      <?php endforeach ?>
    </ul>

    <?php if ($pagination->hasNextPage()): ?>
      <a href="<?= $pagination->nextPageUrl() ?>" class="pagination-next" rel="next" aria-label="Nächste Seite">
        Nächste Seite<span aria-hidden="true">&nbsp;&raquo;</span>
      </a>
    <?php else: ?>
      <a class="pagination-next" disabled tabindex="-1" aria-disabled="true">
        Nächste Seite<span aria-hidden="true">&nbsp;&raquo;</span>
      </a>
    <?php endif ?>

  </nav>
<?php endif ?>

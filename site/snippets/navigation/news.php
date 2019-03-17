<div class="navbar-dropdown has-more is-boxed">
  <a class="navbar-item<?php e($page->slug() === 'aktuelles', ' is-active') ?>" href="<?= page('aktuelles')->url() ?>">
    <span>
      <span class="icon has-text-warning">
        <i class="fas fa-star" aria-hidden="true"></i>
      </span>
      <strong><?= $item->title()->html() ?></strong>
      <br>
      Die erste Adresse für aktuelle Nachrichten und Informationen
    </span>
  </a>

  <hr class="navbar-divider">

  <div class="navbar-item<?php e($page->slug() === 'archiv', ' is-active') ?>">
    <span>
      <span class="icon has-text-grey-light">
        <i class="fal fa-archive" aria-hidden="true"></i>
      </span>
      <strong><?= page('archiv')->title()->html() ?></strong>
      <br>
      Unsere Artikelarchiv — zurück bis 2008<br>
      <nav class="breadcrumb is-small" aria-label="Archiv-Breadcrumb">
        <ul class="has-mt-small">
        <?php foreach(page('archiv')->children() as $item): ?>
          <li>
            <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
          </li>
        <?php endforeach ?>
        </ul>
      </nav>
    </span>
  </div>
</div>

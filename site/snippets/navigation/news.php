<div class="navbar-dropdown has-more is-boxed">
  <a href="<?= page('aktuelles')->url() ?>" class="navbar-item<?php e($page->id() === 'aktuelles', ' is-active') ?>">
    <span>
      <span class="icon has-text-success">
        <span class="fas fa-star" aria-hidden="true"></span>
      </span>
      <strong><?= page('aktuelles')->title()->html() ?></strong>
      <br>
      Die erste Adresse für aktuelle Nachrichten und Informationen
    </span>
  </a>

  <hr class="navbar-divider">

  <div class="navbar-item<?php e($page->id() === 'archiv', ' is-active') ?>">
    <span>
      <span class="icon">
        <span class="fal fa-archive" aria-hidden="true"></span>
      </span>
      <strong><?= page('archiv')->title()->html() ?></strong>
      <br>
      Unsere Artikelarchiv — zurück bis 2008<br>
      <nav class="breadcrumb is-small">
        <ul class="mt-2">
          <?php foreach(page('archiv')->children()->listed() as $item): ?>
            <li>
              <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
            </li>
          <?php endforeach ?>
        </ul>
      </nav>
    </span>
  </div>
</div>

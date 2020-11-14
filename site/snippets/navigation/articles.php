<div class="navbar-dropdown has-more is-boxed">
  <a href="<?= $child->url() ?>" class="navbar-item<?php e($child->isActive(), ' is-active') ?>">
    <div>
      <span class="icon has-text-success">
        <span class="fas fa-star" aria-hidden="true"></span>
      </span>
      <p><strong><?= $child->title()->html() ?></strong></p>
      <p>Die erste Adresse für aktuelle Nachrichten und Informationen</p>
    </div>
  </a>

  <hr class="navbar-divider">

  <?php if ($archive = page('archiv')): ?>
    <div class="navbar-item<?php e($archive->isActive(), ' is-active') ?>">
      <div>
        <span class="icon">
          <span class="fal fa-archive" aria-hidden="true"></span>
        </span>
        <p><strong><?= $archive->title()->html() ?></strong></p>
        <p>Unsere Artikelarchiv — zurück bis 2008</p>

        <nav class="breadcrumb has-bullet-separator is-small mt-4">
          <ul>
            <?php foreach ($archive->children()->listed() as $item): ?>
              <li>
                <a href="<?= $item->url() ?>">
                  <?= $item->title() ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </nav>
      </div>
    </div>
  <?php endif ?>
</div>

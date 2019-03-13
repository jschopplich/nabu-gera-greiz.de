<nav class="navbar is-spaced<?php e($page->isHomePage(), ' is-home') ?>" aria-label="Navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">

  <div class="navbar-brand">
    <div class="navbar-brand-tabs tabs is-hidden-desktop">
      <ul>
        <li<?php e($page->isHomePage(), ' class="is-active"') ?>>
          <a href="<?= page('home')->url() ?>">Start</a>
        </li>
        <li<?php e($page->slug() === 'aktuelles', ' class="is-active"') ?>>
          <a href="<?= page('aktuelles')->url() ?>"><?= page('aktuelles')->title() ?></a>
        </li>
        <li<?php e($page->slug() === 'veranstaltungen', ' class="is-active"') ?>>
          <a href="<?= page('veranstaltungen')->url() ?>"><?= page('veranstaltungen')->title() ?></a>
        </li>
        <li>
          <a data-navbar-toggle>Projekte</a>
        </li>
      </ul>
    </div>
    <div class="navbar-burger burger" data-target="navbar">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbar" class="navbar-menu">
    <div class="navbar-start">
      <?php if (!$page->isHomePage()): ?>
        <a class="navbar-item<?php e($page->isHomePage(), ' is-active') ?>" href="<?= Url::home() ?>">Startseite</a>
      <?php endif ?>

      <?php foreach($pages->listed() as $item): ?>
      <?php if ($item->hasListedChildren()): ?>
        <div class="navbar-item has-dropdown is-hoverable">
          <?php /* FIXME: Seitenübersicht für Kategorien
          <a class="navbar-link" href="<?= $item->url() ?>" itemprop="url"><?= $item->title()->html() ?></a> */ ?>
          <div class="navbar-link"><?= $item->title()->html() ?></div>

          <?php if ($item->id() == 'aktuelles'): ?>
            <div class="navbar-dropdown has-more is-boxed">
              <a class="navbar-item<?php e($item->isActive(), ' is-active') ?>" href="<?= $item->url() ?>" itemprop="url">
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

              <div class="navbar-item<?php e($page->slug() == 'archiv', ' is-active') ?>">
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
          <?php else: ?>
            <div class="navbar-dropdown is-boxed">
              <?php foreach($item->children()->listed()->filterBy('template', '!=', 'article') as $subitem): ?>
              <a class="navbar-item<?php e($subitem->isOpen(), ' is-active') ?>" href="<?= $subitem->url() ?>" itemprop="url"><?= $subitem->title()->html() ?></a>
              <?php endforeach ?>
            </div>
          <?php endif ?>

        </div>
      <?php else: ?>
        <a class="navbar-item<?php e($item->isOpen(), ' is-active') ?>" href="<?= $item->url() ?>" itemprop="url"><?= $item->title()->html() ?></a>
      <?php endif ?>
      <?php endforeach ?>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <a class="button is-dark is-outlined" data-open-modal data-modal-id="#newsletter-modal">
          <span class="icon">
            <span class="fal fa-envelope" aria-hidden="true"></span>
          </span>
          <span>Newsletter</span>
        </a>
      </div>
    </div>

  </div>
</nav>

<nav class="navbar is-spaced<?php e($page->isHomePage(), ' is-home') ?>" aria-label="Navigation">

  <div class="navbar-brand">
    <div class="navbar-brand-tabs tabs is-hidden-desktop">
      <ul>
        <li class="<?php e($page->isHomePage(), 'is-active') ?>">
          <a href="<?= page('home')->url() ?>">Start</a>
        </li>
        <li class="<?php e($page->id() === 'aktuelles', 'is-active') ?>">
          <a href="<?= page('aktuelles')->url() ?>"><?= page('aktuelles')->title() ?></a>
        </li>
        <li class="<?php e($page->id() === 'veranstaltungen', 'is-active') ?>">
          <a href="<?= page('veranstaltungen')->url() ?>"><?= page('veranstaltungen')->title() ?></a>
        </li>
        <li>
          <a href="#" data-navbar-toggle>Projekte</a>
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
            <div class="navbar-link"><?= $item->title()->html() ?></div>

            <?php if ($item->id() === 'aktuelles'): ?>
              <?php snippet('navigation/news') ?>
            <?php else: ?>
              <div class="navbar-dropdown has-more is-boxed">
                <?php foreach($item->children()->listed()->filterBy('template', '!=', 'article') as $subitem): ?>
                  <a class="navbar-item<?php e($subitem->isOpen(), ' is-active') ?>" href="<?= $subitem->url() ?>">
                    <span>
                      <span class="icon has-text-primary">
                        <span class="fal fa-<?= $subitem->navIcon() ?>" aria-hidden="true"></span>
                      </span>
                      <strong><?= $subitem->title()->html() ?></strong>
                      <br>
                      <?= $subitem->navDescription()->html() ?>
                    </span>
                  </a>
                  <?php if (!$subitem->isLast()): ?>
                    <hr class="navbar-divider">
                  <?php endif ?>
                <?php endforeach ?>
              </div>
            <?php endif ?>
          </div>
        <?php else: ?>
          <a class="navbar-item<?php e($item->isOpen(), ' is-active') ?>" href="<?= $item->url() ?>">
            <?= $item->title()->html() ?>
          </a>
        <?php endif ?>
      <?php endforeach ?>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <a class="button is-light" data-open-modal data-modal-id="#newsletter-modal">
          <span class="icon">
            <span class="fal fa-envelope" aria-hidden="true"></span>
          </span>
          <span>Newsletter</span>
        </a>
      </div>
    </div>

  </div>
</nav>

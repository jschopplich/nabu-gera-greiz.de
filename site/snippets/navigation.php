<nav class="navbar is-spaced<?php e($page->isHomePage(), ' is-home') ?>" aria-label="Navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">

  <div class="navbar-brand">
    <div class="navbar-brand-tabs tabs is-hidden-desktop">
      <ul>
        <li class="<?php e($page->isHomePage(), 'is-active') ?>">
          <a href="<?= page('home')->url() ?>">Start</a>
        </li>
        <li class="<?php e($page->slug() === 'aktuelles', 'is-active') ?>">
          <a href="<?= page('aktuelles')->url() ?>"><?= page('aktuelles')->title() ?></a>
        </li>
        <li class="<?php e($page->slug() === 'veranstaltungen', 'is-active') ?>">
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
          <div class="navbar-link"><?= $item->title()->html() ?></div>

          <?php if ($item->id() === 'aktuelles'): ?>
            <?php snippet('navigation/news.php') ?>
          <?php elseif ($item->id() === 'projekte'): ?>
            <?php snippet('navigation/projects.php') ?>
          <?php else: ?>
            <div class="navbar-dropdown is-boxed">
              <?php foreach($item->children()->listed()->filterBy('template', '!=', 'article') as $subitem): ?>
              <a class="navbar-item<?php e($subitem->isOpen(), ' is-active') ?>" href="<?= $subitem->url() ?>"><?= $subitem->title()->html() ?></a>
              <?php endforeach ?>
            </div>
          <?php endif ?>

        </div>
      <?php else: ?>
        <a class="navbar-item<?php e($item->isOpen(), ' is-active') ?>" href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
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

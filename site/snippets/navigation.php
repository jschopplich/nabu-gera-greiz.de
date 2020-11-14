<nav class="navbar is-spaced<?php e($page->isHomePage(), ' is-home') ?>">

  <div class="navbar-brand">
    <div class="navbar-brand-tabs tabs is-hidden-desktop">
      <ul>
        <?php foreach (['home', 'aktuelles', 'veranstaltungen'] as $pageId): ?>
          <?php if ($p = page($pageId)): ?>
            <li<?= attr(['class' => $p->isActive() ? 'is-active' : null], ' ') ?>>
              <a href="<?= $p->url() ?>"><?= $p->title() ?></a>
            </li>
          <?php endif ?>
        <?php endforeach ?>
      </ul>
    </div>

    <div class="navbar-burger burger" data-target="navbar">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div class="navbar-menu">
    <div class="navbar-start">
      <?php if (!$page->isHomePage()): ?>
        <a class="navbar-item<?php e($page->isHomePage(), ' is-active') ?>" href="<?= url() ?>">
          Startseite
        </a>
      <?php endif ?>

      <?php foreach ($pages->listed() as $child): ?>
        <?php if ($child->hasListedChildren()): ?>
          <div class="navbar-item has-dropdown is-hoverable">
            <div class="navbar-link"><?= $child->title()->html() ?></div>

            <?php if ($child->id() === 'aktuelles'): ?>
              <?php snippet('navigation/articles', compact('child')) ?>
            <?php else: ?>
              <?php snippet('navigation/pages', compact('child')) ?>
            <?php endif ?>
          </div>
        <?php else: ?>
          <a class="navbar-item<?php e($child->isOpen(), ' is-active') ?>" href="<?= $child->url() ?>">
            <?= $child->title()->html() ?>
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

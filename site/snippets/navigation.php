<nav class="navbar is-spaced<?php e($page->isHomePage(), ' is-home') ?>">
  <div class="navbar-brand">
    <div class="navbar-tabs is-hidden-desktop">
      <ul>
        <?php foreach ($site->navigationTabs()->toPages() as $tab): ?>
          <li<?= attr(['class' => $tab->isActive() ? 'is-active' : null], ' ') ?>>
            <a href="<?= $tab->url() ?>">
              <?= $tab->title() ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>

    <div class="navbar-burger burger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div class="navbar-menu">
    <div class="navbar-start">
      <?php if (!$page->isHomePage()): ?>
        <a href="<?= url() ?>" class="navbar-item<?php e($page->isHomePage(), ' is-active') ?>">
          Startseite
        </a>
      <?php endif ?>

      <?php foreach ($pages->listed() as $child): ?>
        <?php if ($child->hasListedChildren()): ?>
          <div class="navbar-item has-dropdown is-hoverable">
            <div class="navbar-link">
              <?= $child->title()->html() ?>
            </div>

            <div class="navbar-dropdown has-more is-boxed">
              <?php if ($child->id() === 'aktuelles'): ?>
                <?php snippet('navigation/news', ['data' => $child]) ?>
              <?php else: ?>
                <?php foreach ($child->children()->listed()->filterBy('template', '!=', 'article') as $grandchild): ?>
                  <a
                    class="navbar-item<?php e($grandchild->isActive(), ' is-active') ?>"
                    href="<?= $grandchild->url() ?>"
                    <?php e($grandchild->isActive(), 'aria-current="page"') ?>
                  >
                    <div>
                      <span class="icon has-text-primary" aria-hidden="true">
                        <span class="fal fa-<?= $grandchild->navIcon() ?>"></span>
                      </span>
                      <p><strong><?= $grandchild->title()->html() ?></strong></p>
                      <p><?= $grandchild->navDescription()->html() ?></p>
                    </div>
                  </a>

                  <?php
                  $grandgrandchilden = $grandchild->children()->filterBy('template', 'in', ['topic', 'blog']);
                  ?>
                  <?php if ($grandgrandchilden->count()): ?>
                    <div class="navbar-item">
                      <div>
                        <nav class="breadcrumb has-bullet-separator is-small">
                          <ul>
                            <?php foreach ($grandgrandchilden as $item): ?>
                              <li<?php e($item->isActive(), ' class="is-active"') ?>>
                                <a href="<?= $item->url() ?>"<?php e($item->isActive(), ' aria-current="page"') ?>>
                                  <?= $item->title() ?>
                                </a>
                              </li>
                            <?php endforeach ?>
                          </ul>
                        </nav>
                      </div>
                    </div>
                  <?php endif ?>

                  <?php snippet('navigation/archive', ['data' => $grandchild, 'titlePrefix' => 'Archiv']) ?>

                  <?php if (!$grandchild->isLast()): ?>
                    <hr class="navbar-divider">
                  <?php endif ?>
                <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        <?php else: ?>
          <a href="<?= $child->url() ?>" class="navbar-item<?php e($child->isActive(), ' is-active') ?>">
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

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
          <?php
          $grandchildren = $child->children()->listed()->filterBy('template', '!=', 'article');
          $isExpanded = $grandchildren->count() > 4;
          ?>
          <div class="navbar-item has-dropdown is-hoverable<?php e($isExpanded, ' is-expanded') ?>">
            <div class="navbar-link">
              <?= $child->title()->html() ?>
            </div>

            <div class="navbar-dropdown has-icon">
              <?php if ($child->id() === 'aktuelles'): ?>
                <?php snippet('navigation/news', ['data' => $child]) ?>
              <?php else: ?>
                <?php if ($isExpanded): ?>
                  <div class="container">
                    <div class="columns is-multiline is-gapless">
                      <?php foreach ($grandchildren as $grandchild): ?>
                        <div class="column is-4">
                          <?php snippet('navigation/grandchild', compact('grandchild')) ?>
                        </div>
                        <?php if (($grandchild->indexOf() + 1) % 3 === 0): ?>
                          <div class="column is-full">
                            <hr class="navbar-divider">
                          </div>
                        <?php endif ?>
                      <?php endforeach ?>
                    </div>
                  </div>
                <?php else: ?>
                  <?php foreach ($grandchildren as $grandchild): ?>
                    <?php snippet('navigation/grandchild', compact('grandchild')) ?>
                    <?php if (!$grandchild->isLast()): ?>
                      <hr class="navbar-divider">
                    <?php endif ?>
                  <?php endforeach ?>
                <?php endif ?>
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

<nav class="navbar is-spaced<?php e($page->isHomePage(), ' is-home') ?>">

  <div class="navbar-brand">
    <div class="navbar-tabs is-hidden-desktop">
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

            <?php
            $isNewspage = $child->id() === 'aktuelles';
            ?>
            <div class="navbar-dropdown has-more is-boxed">
              <?php if ($isNewspage): ?>
                <a
                  href="<?= $child->url() ?>"
                  class="navbar-item<?php e($child->isActive(), ' is-active') ?>"
                  <?php e($child->isActive(), 'aria-current="page"') ?>
                >
                  <div>
                    <span class="icon has-text-primary">
                      <span class="fal fa-<?= $child->navIcon() ?>" aria-hidden="true"></span>
                    </span>
                    <p><strong><?= $child->title()->html() ?></strong></p>
                    <p><?= $child->navDescription()->html() ?></p>
                  </div>
                </a>

                <hr class="navbar-divider">
              <?php endif ?>

              <?php foreach ($child->children()->listed()->filterBy('template', '!=', 'article') as $grandchild): ?>
                <?php
                $tag = $isNewspage ? 'div' : 'a';
                ?>
                <<?= $tag ?>
                  class="navbar-item<?php e($grandchild->isActive(), ' is-active') ?>"
                  <?php e($tag === 'a', 'href="' . $grandchild->url() . '"') ?>
                  <?php e($grandchild->isActive(), 'aria-current="page"') ?>
                >
                  <div>
                    <span class="icon has-text-primary">
                      <span class="fal fa-<?= $grandchild->navIcon() ?>" aria-hidden="true"></span>
                    </span>
                    <p><strong><?= $grandchild->title()->html() ?></strong></p>
                    <p><?= $grandchild->navDescription()->html() ?></p>
                  </div>
                </<?= $tag ?>>

                <?php
                $more = $grandchild->children()->filterBy('template', 'in', ['topic', 'blog', 'blog-old']);
                ?>
                <?php if ($more->count()): ?>
                  <div class="navbar-item">
                    <div>
                      <nav class="breadcrumb has-bullet-separator is-small">
                        <ul>
                          <?php foreach ($more as $item): ?>
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

                <?php if (!$grandchild->isLast()): ?>
                  <hr class="navbar-divider">
                <?php endif ?>
              <?php endforeach ?>
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

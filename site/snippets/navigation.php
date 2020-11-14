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
            <div class="navbar-link">
              <?= $child->title()->html() ?>
            </div>

            <?php
            $isNewspage = $child->id() === 'aktuelles';
            ?>
            <div class="navbar-dropdown has-more is-boxed">
              <?php foreach ($child->children()->listed()->filterBy('template', '!=', 'article') as $subchild): ?>
                <a
                  href="<?= $subchild->url() ?>"
                  class="navbar-item<?php e($subchild->isOpen(), ' is-active') ?>"
                  <?php e($subchild->isActive(), 'aria-current="page"') ?>
                >
                  <div>
                    <span class="icon has-text-primary">
                      <span class="fal fa-<?= $subchild->navIcon() ?>" aria-hidden="true"></span>
                    </span>
                    <p><strong><?= $subchild->title()->html() ?></strong></p>
                    <p><?= $subchild->navDescription()->html() ?></p>
                  </div>
                </a>

                <?php if ($isNewspage): ?>
                  <hr class="navbar-divider">
                <?php endif ?>

                <?php
                $more = $isNewspage
                  ? $subchild->children()->unlisted()->filterBy('template', 'in', ['blog', 'blog-old'])
                  : $subchild->children()->unlisted()->filterBy('template', 'topic');
                if ($more->count()):
                ?>
                  <div class="navbar-item">
                    <div>
                      <?php if ($isNewspage): ?>
                        <span class="icon">
                          <span class="fal fa-archive" aria-hidden="true"></span>
                        </span>
                        <p><strong><?= $archive->title()->html() ?></strong></p>
                        <p>Unsere Artikelarchiv — zurück bis 2008</p>
                      <?php endif ?>

                      <nav class="breadcrumb has-bullet-separator is-small<?php e($isNewspage, ' mt-4') ?>">
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

                <?php if (!$subchild->isLast()): ?>
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

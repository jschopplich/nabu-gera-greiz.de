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

    <?php
    $more = $subchild->children()->unlisted()->filterBy('template', 'topic');
    if ($more->count()):
    ?>
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

    <?php if (!$subchild->isLast()): ?>
      <hr class="navbar-divider">
    <?php endif ?>
  <?php endforeach ?>
</div>

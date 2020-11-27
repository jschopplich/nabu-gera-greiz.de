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
$grandgrandchilden = $grandchild->children()->filterBy('template', 'in', ['default', 'blog']);
?>
<?php if ($grandgrandchilden->count()): ?>
  <div class="navbar-item">
    <div>
      <nav class="navbar-list">
        <ul>
          <?php foreach ($grandgrandchilden as $item): ?>
            <li<?php e($item->isActive(), ' class="is-active"') ?>>
              <a href="<?= $item->url() ?>"<?php e($item->isActive(), ' aria-current="page"') ?>>
                <strong><?= $item->title() ?></strong>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </nav>
    </div>
  </div>
<?php endif ?>

<?php snippet('navigation/archive', ['data' => $grandchild]) ?>

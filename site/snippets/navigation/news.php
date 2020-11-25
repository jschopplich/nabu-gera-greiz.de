<a
  href="<?= $data->url() ?>"
  class="navbar-item<?php e($data->isActive(), ' is-active') ?>"
  <?php e($data->isActive(), 'aria-current="page"') ?>
>
  <div>
    <span class="icon has-text-primary" aria-hidden="true">
      <span class="fal fa-<?= $data->navIcon() ?>"></span>
    </span>
    <p><strong><?= $data->title()->html() ?></strong></p>
    <p><?= $data->navDescription()->html() ?></p>
  </div>
</a>

<hr class="navbar-divider">

<div class="navbar-item">
  <div>
    <span class="icon has-text-primary" aria-hidden="true">
      <span class="fal fa-archive"></span>
    </span>
    <p><strong>Aktuelles</strong></p>
    <p>Unsere Artikelarchiv — zurück bis 2009:</p>
  </div>
</div>

<?php snippet('navigation/archive', [
  'data' => $data
]) ?>

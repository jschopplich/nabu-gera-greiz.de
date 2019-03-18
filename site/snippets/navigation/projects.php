<div class="navbar-dropdown has-more is-boxed">

  <a class="navbar-item<?php e($page->id() === 'naturschutzinformation-waldhaus', ' is-active') ?>" href="<?= page('projekte/naturschutzinformation-waldhaus')->url() ?>">
    <span>
      <span class="icon has-text-grey-primary">
        <i class="fal fa-home-heart" aria-hidden="true"></i>
      </span>
      <strong><?= page('projekte/naturschutzinformation-waldhaus')->title()->html() ?></strong>
      <br>
      Die Naturschutzinformation im Naherholungsgebiet Waldhaus bei Greiz
    </span>
  </a>

  <hr class="navbar-divider">

  <a class="navbar-item<?php e($page->id() === 'friessnitzer-see', ' is-active') ?>" href="<?= page('projekte/friessnitzer-see')->url() ?>">
    <span>
      <span class="icon has-text-grey-primary">
        <i class="fal fa-trees" aria-hidden="true"></i>
      </span>
      <strong><?= page('projekte/friessnitzer-see')->title()->html() ?></strong>
      <br>
      Alle Artikel zum Frießnitzer See<br>
    </span>
  </a>

  <hr class="navbar-divider">

  <a class="navbar-item<?php e($page->id() === 'amphibienzaun', ' is-active') ?>" href="<?= page('projekte/amphibienzaun')->url() ?>">
    <span>
      <span class="icon has-text-grey-primary">
        <i class="fal fa-frog" aria-hidden="true"></i>
      </span>
      <strong><?= page('projekte/amphibienzaun')->title()->html() ?></strong>
      <br>
      Arbeitseinsätze und Berichte zum Aufbau von Amphibienschutzzäunen<br>
    </span>
  </a>

  <hr class="navbar-divider">

  <a class="navbar-item<?php e($page->id() === 'lebensraum-kirchturm', ' is-active') ?>" href="<?= page('projekte/lebensraum-kirchturm')->url() ?>">
    <span>
      <span class="icon has-text-grey-primary">
        <i class="fal fa-church" aria-hidden="true"></i>
      </span>
      <strong><?= page('projekte/lebensraum-kirchturm')->title()->html() ?></strong>
      <br>
      Alles zur Plakette „Lebensraum Kirchturm“ — Hintergründe und Auszeichnungen<br>
    </span>
  </a>

  <hr class="navbar-divider">

  <a class="navbar-item<?php e($page->id() === 'honig-und-bienen', ' is-active') ?>" href="<?= page('projekte/honig-und-bienen')->url() ?>">
    <span>
      <span class="icon has-text-grey-primary">
        <i class="fal fa-flower" aria-hidden="true"></i>
      </span>
      <strong><?= page('projekte/honig-und-bienen')->title()->html() ?></strong>
      <br>
      Artikel zu Honigernte, artgemäßer Bienenhaltung, Imkern, etc.<br>
    </span>
  </a>

</div>

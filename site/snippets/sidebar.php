<div class="is-hidden-mobile">

  <?php foreach ($site->sidebarLinks()->toStructure() as $item): ?>
    <?php if (($p = page($item->linkPage()->toPage())) && ($image = $item->linkImage()->toFile())): ?>
      <div class="link-shape mb-5">
        <a href="<?= $p->url() ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
            <defs>
              <pattern id="<?= $p->slug() ?>" patternUnits="userSpaceOnUse" height="100" width="100">
                <image x="0" y="0" width="100" height="100" href="<?= $image->crop(320, 320)->url() ?>"></image>
              </pattern>
            </defs>
            <path d="M100,49.827A50,50,0,1,0,49.827,100v0H100V49.827Z" fill="url(#<?= $p->slug() ?>)"/>
          </svg>
          <p><?= $item->linkLabel()->html() ?></p>
        </a>
      </div>
    <?php endif ?>
  <?php endforeach ?>

  <div class="content is-sidebar is-small">
    <?= $site->sidebarText()->kt() ?>
  </div>

</div>

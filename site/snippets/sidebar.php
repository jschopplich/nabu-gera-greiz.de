<div class="content is-small is-hidden-mobile">

  <?php
  $data = [
    ['page' => 'informationen/aktiv-werden', 'image' => 'wechselkroete-fokus-natur-proehl_thumb.jpg', 'label' => 'Aktiv werden', 'x' => '0', 'y' => '0'],
    ['page' => 'informationen/spenden', 'image' => 'eisvogel-pixabay-pexels_cc0_thumb.jpg', 'label' => 'Aktiv werden', 'x' => '-35', 'y' => '0'],
    ['page' => 'korkampagne', 'image' => 'naturkorken-nabu-helge-may.jpg', 'label' => 'KORKampagne', 'x' => '-50', 'y' => '0']
  ];
  ?>

  <?php foreach ($data as $item): ?>
    <?php if ($p = page($item['page'])): ?>
      <div class="link-shape mb-5">
        <a href="<?= $p->url() ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
            <defs>
              <pattern id="<?= $item['page'] ?>" patternUnits="userSpaceOnUse" height="100" width="100">
                <image x="<?= $item['x'] ?>" y="<?= $item['y'] ?>" width="150" height="100" href="/assets/img/sidebar/<?= $item['image'] ?>"></image>
              </pattern>
            </defs>
            <path d="M100,49.827A50,50,0,1,0,49.827,100v0H100V49.827Z" fill="url(#<?= $item['page'] ?>)"/>
          </svg>
          <p><?= $item['label'] ?></p>
        </a>
      </div>
    <?php endif ?>
  <?php endforeach ?>

  <h2 class="title has-text-weight-bold has-text-grey">Kontakt</h2>
  <p>
    <b>NABU-Kreisverband<br>Gera-Greiz e.V.</b><br>
    c/o Ingo Eckardt<br>
    Franz-Philipp-Straße 9<br>
    07937 Zeulenroda-Triebes<br>
    <a href="mailto:&#x76;&#111;&#114;&#115;&#x74;&#97;&#110;&#100;&#64;&#x6e;&#x61;&#x62;&#117;&#x2d;&#x67;&#101;&#x72;&#x61;&#45;&#103;&#x72;&#x65;&#105;&#x7a;&#46;&#x64;&#x65;">&#x76;&#x6f;&#x72;&#115;&#116;&#x61;&#x6e;&#x64;&#64;&#x6e;&#x61;&#x62;&#117;&#x2d;&#103;&#x65;&#114;&#x61;&#x2d;&#x67;&#114;&#101;&#x69;&#x7a;&#46;&#x64;&#101;</a>
  </p>

</div>

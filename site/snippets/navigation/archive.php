<?php

use Kirby\Http\Url;
use Kirby\Toolkit\Str;

$articleDates = $data->children()->listed()->filterBy('template', 'article')->pluck('date');
$archiveYears = array_unique(array_map(fn($i) => substr($i, 0, 4), $articleDates));
rsort($archiveYears);

?>
<?php if ($data->showArchive()->toBool() && count($archiveYears)): ?>
  <div class="navbar-item">
    <div>
      <nav class="breadcrumb <?= $breadcrumbSeperator ?? 'has-bullet-separator' ?> is-small">
        <ul>
          <?php foreach ($archiveYears as $year): ?>
            <?php
            $url = $data->url() . '/archiv/' . $year;
            $isActive = Str::startsWith(Url::current(), $url)
            ?>
            <li<?php e($isActive, ' class="is-active"') ?>>
              <a href="<?= $url ?>"<?php e($isActive, ' aria-current="page"') ?>>
                <?= $titlePrefix ?> <?= $year ?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </nav>
    </div>
  </div>
<?php endif ?>

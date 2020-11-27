<?php

use Kirby\Http\Url;
use Kirby\Toolkit\Str;

$articleDates = $data->children()->listed()->filterBy('template', 'article')->pluck('date');
// Grab only year from date of format `2020-11-25`
$archiveYears = array_unique(array_map(fn($i) => substr($i, 0, 4), $articleDates));
// Remove current year
$archiveYears = array_filter($archiveYears, fn($i) => $i !== date('Y'));
// Sort array descending
rsort($archiveYears);

?>
<?php if ($data->showArchive()->toBool() && count($archiveYears)): ?>
  <div class="navbar-item">
    <div>
      <nav class="breadcrumb has-arrow-separator is-small">
        <ul>
          <li>
            <span class="pr-3">Archiv:</span>
          </li>
          <?php foreach ($archiveYears as $year): ?>
            <?php
            $url = $data->url() . '/archiv/' . $year;
            $isActive = Str::startsWith(Url::current(), $url)
            ?>
            <li<?php e($isActive, ' class="is-active"') ?>>
              <a href="<?= $url ?>"<?php e($isActive, ' aria-current="page"') ?>>
                <?= $titlePrefix ?? '' ?> <?= $year ?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </nav>
    </div>
  </div>
<?php endif ?>

<?php

use Kirby\Data\Json;

?>

<?php snippet('header') ?>

<div class="section">
  <div class="container is-main">
    <div class="content is-main">

      <?php snippet('intro') ?>
      <?= $page->textBeforeCalendar()->kt() ?>

      <div class="table-container">
        <table class="calendar-table table is-hoverable">
          <thead>
            <tr>
              <th>Datum</th>
              <th>Beschreibung & Inhalt</th>
              <th>Eintritt</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($page->calendar()->toStructure() as $event): ?>
              <?php
              $schema = [
                '@context' => 'http://www.schema.org',
                '@type' => 'Event',
                'name' => $event->eventTitle()->value(),
                'url' => $page->url(),
                'description' => $event->eventDescription()->value(),
                'startDate' => $event->eventDateOption()->value() === 'date'
                  ? $event->eventStarts()->toDate('%Y-%m-%dT%H:%M')
                  : $event->eventIntervalStarts()->toDate('%Y-%m-%d'),
                'endDate' => $event->eventDateOption()->value() !== 'date'
                  ? $event->eventIntervalEnds()->toDate('%Y-%m-%d')
                  : null,
                'location' => [
                  '@type' => 'Place',
                  'name' => $event->eventLocation()->value()
                ]
              ];
              ?>
              <script type="application/ld+json"><?= Json::encode($schema) ?></script>

              <tr>
                <th>
                  <?php if ($event->eventDateOption()->value() === 'date'): ?>
                    <?= $event->eventStarts()->toDate('%d.%m.%Y') ?><br>
                    ab <?= $event->eventStarts()->toDate('%H:%M') ?>
                  <?php else: ?>
                    <?= $event->eventIntervalStarts()->toDate('%d.%m') ?>–<?= $event->eventIntervalEnds()->toDate('%d.%m.%Y') ?>
                  <?php endif ?>
                </th>
                <td>
                  <p class="title is-5 is-size-6-mobile has-text-primary"><?= $event->eventTitle() ?></p>

                  <p>
                    <?php if ($event->eventReferent()->isNotEmpty()): ?>
                      <span class="has-text-grey">Referent</span>: <?= $event->eventReferent() ?>
                      <br>
                    <?php endif ?>

                    <?php if ($event->eventOrganizer()->isNotEmpty()): ?>
                      <span class="has-text-grey">Veranstalter</span>: <?= $event->eventOrganizer() ?>
                      <br>
                    <?php endif ?>

                    <?php if ($event->eventLocation()->isNotEmpty()): ?>
                      <span class="has-text-grey">Ort</span>: <?= $event->eventLocation() ?>
                    <?php endif ?>
                  </p>

                  <?= $event->eventDescription()->kt() ?>
                </td>
                <td>
                  <?php if (!$event->eventHasPrice()->bool()): ?>
                    <span>kostenlos</span>
                  <?php else: ?>
                    <?= $event->eventPrice() ?>
                  <?php endif ?>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

      <?= $page->textAfterCalendar()->kt() ?>

    </div>
  </div>
</div>

<?php snippet('footer') ?>

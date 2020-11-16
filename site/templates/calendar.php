<?php snippet('header') ?>

<div class="section">
  <div class="content-wrapper container">
    <div>
      <?php snippet('intro') ?>

      <div class="content is-main mb-6">
        <?= $page->textBeforeCalendar()->kt() ?>
      </div>

      <table class="calendar-table table is-hoverable">
        <thead>
          <tr>
            <th>Datum</th>
            <th>Beschreibung & Inhalt</th>
            <th class="is-hidden-mobile">Eintritt</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($events as [
            'structure' => $event,
            'serializedSchema' => $serializedSchema
          ]): ?>
            <script type="application/ld+json"><?= $serializedSchema ?></script>

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
              <td class="is-hidden-mobile">
                <?php if (!$event->eventHasPrice()->toBool()): ?>
                  <span>kostenlos</span>
                <?php else: ?>
                  <?= $event->eventPrice() ?>
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>

      <div class="content is-main">
        <?= $page->textAfterCalendar()->kt() ?>
      </div>

    </div>
  </div>
</div>

<?php snippet('footer') ?>

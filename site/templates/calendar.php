<?php snippet('header') ?>

  <div class="container">
    <div class="columns is-marginless has-pb-xlarge">
      <div class="column section has-pt-xlarge has-pt-xxlarge-tablet">
        <div class="content is-main">

          <?php snippet('intro') ?>
          <?= $page->textBeforeCalendar()->kt() ?>

          <table class="table is-striped">
            <thead>
              <tr>
                <th>Datum</th>
                <th>Beschreibung & Inhalt</th>
                <th>Eintritt</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($page->calendar()->toStructure() as $event): ?>
              <script type='application/ld+json'> 
              {
                "@context": "http://www.schema.org",
                "@type": "Event",
                "name": "<?= $event->eventTitle() ?>",
                "url": "<?= $page->url() ?>",
                "description": "<?= $event->eventDescription() ?>",
                <?php if ($event->eventDateOption()->value() === 'date'): ?>
                "startDate": "<?= $event->eventStarts()->toDate('%Y-%m-%dT%H:%M') ?>",
                <?php else: ?>
                "startDate": "<?= $event->eventIntervalStarts()->toDate('%Y-%m-%d') ?>",
                "endDate": "<?= $event->eventIntervalEnds()->toDate('%Y-%m-%d') ?>",
                <?php endif ?>
                "location": {
                  "@type": "Place",
                  "name": "<?= $event->eventLocation() ?>"
                }
              }
              </script>
              <tr>
                <td>
                  <?php if ($event->eventDateOption()->value() === 'date'): ?>
                    <?= $event->eventStarts()->toDate('%d.%m.%Y ab %H:%M') ?>
                  <?php else: ?>
                    <?= $event->eventIntervalStarts()->toDate('%d.%m') ?>–<?= $event->eventIntervalEnds()->toDate('%d.%m.%Y') ?>
                  <?php endif ?>
                </td>
                <td>
                  <p class="title is-5 is-size-6-mobile has-text-primary"><?= $event->eventTitle() ?></p>

                  <?php if ($event->eventReferent()->isNotEmpty()): ?>
                    <span class="has-text-grey">Referent</span>: <?= $event->eventReferent() ?><br>
                  <?php endif ?>

                  <?php if ($event->eventOrganizer()->isNotEmpty()): ?>
                    <span class="has-text-grey">Veranstalter</span>: <?= $event->eventOrganizer() ?><br>
                  <?php endif ?>

                  <?php if ($event->eventLocation()->isNotEmpty()): ?>
                    <span class="has-text-grey">Ort</span>: <?= $event->eventLocation() ?><br>
                  <?php endif ?>

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

          <?= $page->textAfterCalendar()->kt() ?>

        </div>
      </div>
    </div>
  </div>

<?php snippet('footer') ?>

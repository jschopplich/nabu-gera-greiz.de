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
                "startDate": "<?= $event->eventStarts()->toDate('%Y-%m-%dT%H:%M') ?>",
                "location": {
                  "@type": "Place",
                  "name": "<?= $event->eventLocation() ?>"
                }
              }
              </script>
              <tr>
                <td>
                  <?= $event->eventStarts()->toDate('%Y-%m-%d %H-%M') ?>
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
                  <?php else: ?>
                    <span class="is-sr-only"><?= $site->title()->html() ?></span>
                  <?php endif ?>

                  <?= $event->eventDescription()->kt() ?>
                </td>
                <td>
                  <?= $event->eventPrice() ?>
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

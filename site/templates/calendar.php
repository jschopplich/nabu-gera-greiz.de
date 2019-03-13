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
              <tr itemscope itemtype="http://schema.org/Event">
                <td itemprop="startDate">
                  <?= $event->eventDate()->kt() ?>
                </td>
                <td>
                  <p class="title is-5 is-size-6-mobile has-text-primary" itemprop="name"><?= $event->eventTitle() ?></p>

                  <?php if ($event->eventReferent()->isNotEmpty()): ?>
                    <span class="has-text-grey">Referent</span>: <span itemprop="actor"><?= $event->eventReferent() ?></span><br>
                  <?php endif ?>

                  <?php if ($event->eventOrganizer()->isNotEmpty()): ?>
                    <span class="has-text-grey">Veranstalter</span>: <span itemprop="organizer"><?= $event->eventOrganizer() ?></span><br>
                  <?php endif ?>

                  <?php if ($event->eventLocation()->isNotEmpty()): ?>
                    <span class="has-text-grey">Ort</span>: <span itemprop="location"><?= $event->eventLocation() ?></span><br>
                  <?php else: ?>
                    <span class="is-sr-only" itemprop="location"><?= $site->title()->html() ?></span>
                  <?php endif ?>

                  <?= $event->eventDescription()->kt() ?>
                </td>
                <td itemprop="price">
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

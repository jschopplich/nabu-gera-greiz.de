<div class="modal" id="newsletter-modal">
  <div class="modal-background" data-close-modal data-modal-id="#newsletter-modal"></div>
  <div class="modal-content">
    <div class="box">

      <p class="has-text-centered">
        <a class="button is-primary" href="mailto:&#110;&#101;&#119;&#115;&#108;&#101;&#x74;&#x74;&#101;&#114;&#64;&#110;&#97;&#x62;&#x75;&#45;&#x67;&#x65;&#x72;&#97;&#45;&#x67;&#114;&#101;&#x69;&#122;&#46;&#100;&#x65;&#x3f;&#x73;&#x75;&#x62;&#x6a;&#101;&#x63;&#x74;&#61;&#69;&#105;&#x6e;&#x74;&#114;&#x61;&#103;&#101;&#x6e;&#x26;&#98;&#111;&#x64;&#x79;&#x3d;&#37;&#48;&#65;&#78;&#97;&#x6d;&#101;&#x3d;&#x25;&#x30;&#65;&#86;&#x6f;&#114;&#110;&#97;&#109;&#x65;&#61;&#37;&#48;&#65;&#x41;&#110;&#x72;&#101;&#100;&#101;&#61;&#37;&#x30;&#65;&#84;&#105;&#116;&#x65;&#108;&#61;">Eintragen</a>
        <a class="button is-text" href="mailto:&#x6e;&#x65;&#119;&#x73;&#x6c;&#x65;&#x74;&#x74;&#101;&#114;&#x40;&#110;&#97;&#98;&#117;&#45;&#x67;&#x65;&#x72;&#x61;&#45;&#x67;&#114;&#101;&#105;&#x7a;&#x2e;&#x64;&#x65;&#63;&#115;&#117;&#98;&#x6a;&#x65;&#x63;&#116;&#x3d;&#x41;&#x75;&#x73;&#x74;&#114;&#x61;&#x67;&#x65;&#110;">Austragen</a>
      </p>

      <?php /*
      <div class="newsletter-notification notification is-success is-hidden">
        Lorem ipsum dolor sit amet, consectetur
        adipiscing elit lorem ipsum dolor. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Sit amet,
        consectetur adipiscing elit
      </div>

      <form id="newsletter-form" action="<?= page('newsletter-mailer')->url() ?>" method="post">
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Anrede</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="control">
                <div class="select">
                  <select name="salutation" required>
                    <option value="" selected>Anrede</option>
                    <option value="Frau">Frau</option>
                    <option value="Herr">Herr</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Titel</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="control">
                <input class="input" type="text" name="acadTitle">
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Name</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="control">
                <input class="input" type="text" name="forename" placeholder="Vorname" required>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <input class="input" type="text" name="surname" placeholder="Nachname" required>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">E-Mail</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="control has-icons-left">
                <input class="input" type="email" name="email" placeholder="E-Mail-Aresse" required>
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal"></div>
          <div class="field-body">
            <div class="field">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox" name="terms" required>
                  Bitte beachten Sie unsere <a href="<?= page('datenschutzerklaerung')->url() ?>">Datenschutzerklärung</a>.
                </label>
              </div>
            </div>
          </div>
        </div>

        <?= csrf_field() ?>
        <?= honeypot_field() ?>
        <div class="field is-horizontal">
          <div class="field-label is-normal"></div>
          <div class="field-body">
            <div class="field is-grouped">
              <div class="control">
                <button type="submit" class="button is-link">Eintragen</button>
              </div>
              <div class="control">
                <button class="button is-text has-text-grey-light" type="button" data-close-modal data-modal-id="#newsletter-modal">Abbrechen</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      */ ?>

    </div>
  </div>
  <button class="modal-close is-large" aria-label="close" data-close-modal data-modal-id="#newsletter-modal"></button>
</div>

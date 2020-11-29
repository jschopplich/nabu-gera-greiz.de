<?php snippet('header') ?>

<div class="section">
  <div class="content-wrapper container">
    <div>
      <h1 class="title is-size-2-tablet has-text-weight-bold is-hyphenated">
        Bitte anmelden, um auf diese Seite zuzugreifen.
      </h1>
      <hr class="mb-6">

      <form method="post">
        <div class="field">
          <label class="label">Passwort</label>
          <div class="control">
            <input class="input" type="password" name="password" value="<?= esc(get('password')) ?>">
          </div>
          <?php if ($error): ?>
            <p class="help is-danger"><?= $error ?></p>
          <?php endif ?>
        </div>

        <input type="hidden" name="csrf" value="<?= csrf() ?>">

        <div class="field">
          <div class="control">
            <button class="button is-primary">Seite öffnen</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php snippet('footer') ?>

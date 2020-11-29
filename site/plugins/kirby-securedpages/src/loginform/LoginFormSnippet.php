<div id="kerli81-securedpages-loginform">
  <?php if ($form->error()): ?>
    <p class="mb-4"><?= implode('<br>', $form->error()) ?></p>
  <?php endif ?>

  <?php if ($loginstatus['user']): ?>
    <p class="mb-4">Sie sind derzeit als <strong><?= $loginstatus['user']->username() ?></strong> angemeldet, dessen Nutzerrolle keinen Zugriff auf diese geschütze Seite hat. Bitte <a href="<?= $loginstatus['logouturl'] ?>"> melden Sie sich ab</a> und mit einem anderen Konto an.</p>
  <?php endif ?>

  <form method="POST">
    <div class="field">
      <label class="label"><?= option('kerli81.securedpages.loginform.username.name') ?></label>
      <div class="control">
        <input class="input" name="username" type="text" placeholder="<?= option('kerli81.securedpages.loginform.username.name') ?>" value="<?= $form->old('username') ?>">
      </div>
    </div>

    <div class="field">
      <label class="label"><?= option('kerli81.securedpages.loginform.password.name') ?></label>
      <div class="control">
        <input class="input" name="password" type="password" placeholder="<?= option('kerli81.securedpages.loginform.password.name') ?>" />
      </div>
    </div>

    <?php echo csrf_field() ?>

    <div class="field">
      <div class="control">
        <button class="button is-primary">Einloggen</button>
      </div>
    </div>
  </form>
</div>

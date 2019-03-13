    <section class="section is-partners container is-hidden-mobile">
      <div class="">
        <h2 class="subtitle is-5 has-text-grey has-text-centered has-mb-xlarge">Unsere Partner</h2>
        <div class="columns is-mobile is-6 is-variable is-centered is-multiline">
          <?php
          $images = $site->partners()->toFiles();
          foreach($images as $image): ?>
            <div class="column is-narrow">
              <a class="partner-link" href="<?= $image->link() ?>" target="_blank" rel="noopener noreferrer">
                <figure class="partner-image image">
                  <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
                </figure>
              </a>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>

  </main>

  <footer class="footer">
    <div class="container">

      <div class="columns">
        <?php foreach ($site->footerColumns()->toStructure() as $column): ?>
        <div class="column">
          <div class="content is-inverted">
            <?= $column->text()->kt() ?>
          </div>
        </div>
        <?php endforeach ?>
      </div>

    </div>
  </footer>

<?php snippet('modal-newsletter') ?>

<?= Bnomei\Fingerprint::js('assets/dist/main.min.js') ?>
<?php e(!$page->isHomePage(), Bnomei\Fingerprint::js('assets/dist/main.prefetch.min.js')) ?>
<?= js('@auto') ?>

<?= js('assets/dist/main.cookieconsent.min.js', ['defer' => true]) ?>
<?= css('assets/fonts/FontAwesomePro/css/fontawesome.min.css') ?>
<?= css('assets/fonts/FontAwesomePro/css/solid.min.css') ?>
<?= css('assets/fonts/FontAwesomePro/css/light.min.css') ?>
<script async defer src="//www.instagram.com/embed.js"></script>

<?= js('assets/dist/enhancedux.min.js') ?>

</body>
</html>

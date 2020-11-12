    <section class="section is-partners container is-hidden-mobile">
      <div class="">
        <h2 class="title is-5 has-text-primary  has-text-centered mb-6">Unsere Partner</h2>
        <div class="columns is-mobile is-6 is-variable is-centered is-multiline">
          <?php foreach($site->partners()->toFiles() as $image): ?>
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

<?php snippet('modals/newsletter') ?>

<?= js('assets/js/main.js') ?>

<?= js([
  'assets/fonts/FontAwesomePro/js/fontawesome.min.js',
  'assets/fonts/FontAwesomePro/js/solid.min.js',
  'assets/fonts/FontAwesomePro/js/light.min.js'
], ['defer' => true, 'data-search-pseudo-elements' => true]) ?>

</body>
</html>

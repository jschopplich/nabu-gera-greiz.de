    <div class="section is-hidden-mobile">
      <div class="container">
        <h2 class="title is-4 has-divider-right has-text-primary mb-6">Unsere Partner</h2>
        <div class="columns is-mobile is-6 is-variable">
          <?php foreach ($site->partners()->toFiles() as $image): ?>
            <div class="column">
              <a href="<?= $image->link() ?>" class="partner-image image" target="_blank" rel="noopener">
                <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
              </a>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>

  </main>

  <footer class="footer has-background-primary">
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

<?= js('assets/js/main.js', ['type' => 'module']) ?>

<?= js([
  'assets/fonts/FontAwesomePro/js/fontawesome.min.js',
  'assets/fonts/FontAwesomePro/js/solid.min.js',
  'assets/fonts/FontAwesomePro/js/light.min.js'
], ['defer' => true, 'data-search-pseudo-elements' => true]) ?>

</body>
</html>

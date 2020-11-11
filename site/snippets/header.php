<!doctype html>
<html lang="de">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?= $page->metaTags() ?>

  <?= css([
    'assets/css/main.css',
    'assets/fonts/SourceSerifPro/family.css',
    'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'
  ]) ?>

  <script src="https://www.googletagmanager.com/gtag/js?id=UA-134185590-1" async></script>
  <script>
    window.dataLayer = window.dataLayer || []
    function gtag () { dataLayer.push(arguments) }
    gtag('js', new Date())
    gtag('config', 'UA-134185590-1', { anonymize_ip: true, storage: 'none' })
  </script>

</head>
<body>

  <header class="header <?php e($page->isHomePage(), 'is-home', 'is-default') ?>">

    <?php if ($page->isHomePage()): ?>

      <div class="container">
        <div class="cover">
          <?php if ($image = $page->heroImage()->toFile()): ?>
            <figure class="cover-image image is-16by9 is-hidden-mobile">
              <img class="has-ratio" src="<?= $image->resize(960)->url() ?>" title="<?= $image->caption()->or($image->alt())->html() ?>" alt="<?= $image->caption()->or($image->alt())->html() ?>">
            </figure>

            <div class="cover-hero"<?php e($page->isHomePage(), ' style="background-image: url(' . $image->resize(960)->url() . ');"') ?>>
              <div class="columns is-vcentered">
                <div class="column is-narrow">
                  <figure class="cover-hero-image image" data-animere="fadeInLeft">
                    <img src="<?= url('assets/images/logo.svg') ?>" alt="<?= $site->author() ?>" title="<?= $site->author() ?>">
                  </figure>
                </div>
                <div class="column has-text-centered-mobile">
                  <h1 class="title is-2 has-text-weight-bold has-text-white">Weil unsere Heimatnatur zu bewahren ist.</h1>
                  <h2 class="subtitle is-4 has-text-white">Wir setzen uns für den Erhalt der Natur im Landkreis Greiz und Gera ein.</h2>
                  <a href="#aktuelles" class="button is-primary is-medium" role="button">Aktuelle Beiträge</a>
                </div>
              </div>
            </div>
          <?php endif ?>

          <?php snippet('navigation') ?>
        </div>
      </div>

    <?php else: ?>

      <div class="container">
        <div class="cover">
          <figure class="cover-image image is-16by9">
            <?php
            if ($page->coverImage()->isNotEmpty() && $page->coverImage()->toFile()) {
              $image = $page->coverImage()->toFile();
            } elseif ($page->template() === 'article' && $page->parent()->coverImage()->isNotEmpty() && $page->parent()->coverImage()->toFile()) {
              $image = $page->parent()->coverImage()->toFile();
            } else {
              $image = $site->coverImage()->toFile();
            }
            ?>
            <img src="<?= $image->crop(960, 144, 'right')->url() ?>" title="<?= $image->caption()->or($image->alt())->html() ?>" alt="<?= $image->caption()->or($image->alt())->html() ?>">
          </figure>

          <div class="cover-logo">
            <a href="<?= url() ?>" rel="home">
              <figure class="image">
                <img src="<?= url('assets/images/logo.svg') ?>" alt="<?= $site->author() ?>" title="<?= $site->author() ?>">
              </figure>
            </a>
          </div>
        </div>

        <?php snippet('navigation') ?>
      </div>

    <?php endif ?>

  </header>

  <main class="main main-<?= $page->intendedTemplate() ?>">

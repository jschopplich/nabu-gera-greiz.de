<!doctype html>
<html lang="de">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?= $page->metaTags() ?>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <?= css([
    'assets/css/main.css',
    'https://fonts.googleapis.com/css2?family=Literata:ital,wght@0,400;0,700;1,400;1,700&display=swap',
    'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'
  ]) ?>

  <script src="https://www.googletagmanager.com/gtag/js?id=G-SGQRCEFVJC" async></script>
  <script>
    window.dataLayer = window.dataLayer || []
    function gtag () { dataLayer.push(arguments) }
    gtag('js', new Date())
    gtag('config', 'G-SGQRCEFVJC', { anonymize_ip: true, storage: 'none' })
  </script>

</head>
<body>

  <header class="header <?php e($page->isHomePage(), 'is-home', 'is-default') ?>">
    <div class="container">

      <?php if ($page->isHomePage()): ?>

        <div class="cover">
          <?php if ($image = $page->heroImage()->toFile()): ?>
            <figure class="cover-image image is-16by9 is-hidden-mobile">
              <img
                class="has-ratio"
                <?php if ($image->width() > 1920): ?>
                  srcset="<?= $image->srcset([960, 1920]) ?>"
                <?php else: ?>
                  src="<?= $image->resize(960)->url() ?>"
                <?php endif ?>
                alt="<?= $image->caption()->or($image->alt())->html() ?>"
              >
            </figure>

            <div class="section cover-hero"<?php e($page->isHomePage(), ' style="--cover: url(' . $image->resize(960)->url() . ');"') ?>>
              <div class="columns is-vcentered">
                <div class="column is-narrow">
                  <figure class="cover-hero-image image" data-animere="fadeInLeft">
                    <img src="<?= asset('assets/img/logo.svg')->url() ?>" alt="Logo des <?= $site->author() ?>">
                  </figure>
                </div>
                <div class="column has-text-centered-mobile">
                  <h1 class="title is-1 is-size-3-mobile has-text-weight-bold has-text-white">
                    <?= $site->homePage()->headerTitle()->html() ?>
                  </h1>
                  <p class="subtitle is-3 is-size-5-mobile has-text-white">
                    <?= $site->homePage()->headerSubtitle()->html() ?>
                  </p>
                  <a href="#aktuelles" class="button is-primary is-medium" role="button">
                    Aktuelle Beiträge
                  </a>
                </div>
              </div>
            </div>
          <?php endif ?>

          <?php snippet('navigation') ?>
        </div>

      <?php else: ?>

        <div class="cover">
          <figure class="cover-image image is-16by9">
            <?php
            if ($page->coverImage()->isNotEmpty() && $page->coverImage()->toFile()) {
              $image = $page->coverImage()->toFile();
            } elseif ($page->intendedTemplate()->name() === 'article' && $page->parent()->coverImage()->isNotEmpty() && $page->parent()->coverImage()->toFile()) {
              $image = $page->parent()->coverImage()->toFile();
            } else {
              $image = $site->coverImage()->toFile();
            }
            ?>
            <img src="<?= $image->crop(960, 144, 'right')->url() ?>" alt="<?= $image->caption()->or($image->alt())->html() ?>">
          </figure>

          <div class="cover-logo">
            <a href="<?= url() ?>" aria-label="Zur Startseite">
              <figure class="image">
                <img src="<?= asset('assets/img/logo.svg')->url() ?>" alt="<?= $site->author() ?>">
              </figure>
            </a>
          </div>
        </div>

        <?php snippet('navigation') ?>

      <?php endif ?>

    </div>
  </header>

  <main class="main main-<?= $page->intendedTemplate()->name() ?>">

<?php

$metaTitle = $page->metaTitle()->or($page->title() . ' – ' . $site->title());
$metaDescription = $page->metaDescription()->or($site->homePage()->metaDescription());

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<meta name="robots" content="index,follow">
<link rel="canonical" href="<?= $page->url() ?>">
<meta name="google-site-verification" content="pQ22isBLBAzQz-1VOB56Mk00YEIz_Lv4xKs3HAfrCig">

<title><?= $metaTitle ?></title>

<meta name="description" content="<?= $metaDescription ?>">
<meta name="publisher" content="<?= $site->metaAuthor() ?>">
<meta name="copyright" content="<?= $site->metaAuthor() ?>">

<meta property="og:title" content="<?= $metaTitle ?>">
<meta property="og:description" content="<?= $metaDescription ?>">
<meta property="og:url" content="<?= $page->url() ?>">
<meta property="og:type" content="website">
<meta property="og:image" content="<?= url('meta-image.jpg') ?>">
<meta property="og:site_name" content="<?= $site->title() ?>">
<meta property="article:author" content="<?= $site->metaAuthor() ?>">

<meta name="twitter:card" content="summary">
<?php /*
<meta name="twitter:site" content="@site_account">
<meta name="twitter:creator" content="@individual_account">
*/ ?>
<meta name="twitter:title" content="<?= $metaTitle ?>">
<meta name="twitter:description" content="<?= $metaDescription ?>">
<meta name="twitter:url" content="<?= $page->url() ?>">
<meta name="twitter:image" content="<?= url('meta-image.jpg') ?>">

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0069b3">
<meta name="apple-mobile-web-app-title" content="NABU Gera-Greiz">
<meta name="application-name" content="NABU Gera-Greiz">
<meta name="msapplication-TileColor" content="#0069b3">
<meta name="theme-color" content="#ffffff">

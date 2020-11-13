<h1 class="title is-2 is-size-3-mobile has-text-weight-bold is-hyphenated">
  <?= $page->intro()->or($page->title())->html() ?>
</h1>
<?php if ($page->intendedTemplate()->name() !== 'article'): ?>
  <hr class="mb-6">
<?php endif ?>

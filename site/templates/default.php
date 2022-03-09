<?php snippet("header") ?>

    <main>
      <h1><?= $page->title() ?></h1>
      <?php if($page->text()->isNotEmpty() ) :?>
        <div class="text">
          <?= $page->text()->kt() ?>
        </h1>
      <?php endif ?>
    </main>

<?php snippet("footer") ?>
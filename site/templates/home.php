<?php snippet("header") ?>

    <main>
    <?php if($page->text()->isNotEmpty() ) :?>
        <div class="text">
          <?= $page->text()->kt() ?>
        </div>
      <?php endif ?>

      <?php if($a_la_une = $page->a_la_une()->toPage() ) :?>
        <div class="a_la_une">
          <a href="<?= $a_la_une->url() ?>">
            <img src="<?= $a_la_une->cover()->toFile()->thumb(['width' => 1600, 'height'=> 800, 'crop'=>true])->url() ?>" alt="">
            <p><?= $a_la_une->title() ?> — <?= $a_la_une->year() ?></p>
          </a>
        </div>
      <?php endif ?>
    </main>

<?php snippet("footer") ?>
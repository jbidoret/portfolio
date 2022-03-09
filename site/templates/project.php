<?php snippet("header") ?>

    <main>
      <h1><?= $page->title() ?></h1>
      <?php if($page->text()->isNotEmpty() ) :?>
        <div class="text">
          <?= $page->text()->kt() ?>
      </div>
      <?php endif ?>
      <div class="project-gallery">
        <?php foreach($page->gallery()->toFiles() as $image): 
          if($image->is_big()->toBool()) {
            $thumb = $image->thumb(['width'=>1200]);
          } else {
            $thumb = $image->thumb(['width'=>720]);
          }
          ?>
          <figure>
            <img src="<?= $thumb->url() ?>" alt="<?= $image->alt() ?>">
            <?php if($image->caption()->isNotEmpty()): ?>
              <figcaption>
                <?= $image->caption()->kt() ?>
              </figcaption>
            <?php endif ?>
          </figure>
        <? endforeach ?>
      </div>
    </main>

<?php snippet("footer") ?>
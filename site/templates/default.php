<?php snippet('header') ?>

    <section>
        <h1><?= $page->title() ?></h1>
    </section>

    <?php if($page->intro()->isNotEmpty()) :?>
    <section>
        <?= $page->intro()->kt() ?>
    </section>
    <?php endif ?>

    <?php if($page->text()->isNotEmpty()) :?>
    <section>
        <?= $page->text()->kt() ?>
    </section>
    <?php endif ?>

<?php snippet('footer') ?>
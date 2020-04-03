<?php snippet('header') ?>

    <section class="intro">
        <?= $page->intro()->kt() ?>
    </section>

    <?php foreach($page->children()->listed() as $subpage) : ?>
        <section id="<?= $subpage->slug() ?>" class="program">
            
            <header>
                <?php if($image = $subpage->images()->first()) :?>
                    <figure class="bmap invert">
                        <img src="<?= $image->resize('1200')->url() ?>"  alt="">
                    </figure>
                <?php endif ?>
                <h2><?= $subpage->title() ?></h2>
            </header>

            <?= $subpage->text()->kt() ?>
        </section>
    <?php endforeach ?>

<?php snippet('footer') ?>
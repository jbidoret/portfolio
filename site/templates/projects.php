<?php snippet('header') ?>

    <section>
        <h1><?= $page->title() ?></h1>
    </section>

    <?php if($page->intro()->isNotEmpty()) :?>
    <section>
        <?= $page->intro()->kt() ?>
    </section>
    <?php endif ?>

    <section class="projects">
        <?php // parcours les projets (les enfants publics de la page) ?>  
        <?php foreach ($page->children()->listed() as $p) : ?>
            <article class="project">
                
                <?php if( $image = $p->cover()->toFile() ) : ?>
                    <a href="<?= $p->url() ?>">
                        <figure class="bmap ">      
                            <?php // redimensionne et recadre les images ?>              
                            <img src="<?= $image->resize(1200)->crop(1200, 675)->url() ?>" srcset="<?= $image->srcset("thumb") ?>" alt="<?= $p->title() ?>" >
                        </figure>
                    </a>
                <?php endif ?>
                
                <h3><?= $p->title() ?></h3>

                <p>
                    <?= $p->intro()->kirbytextinline() ?>
                    <br>
                    <a class="button" href="<?= $p->url() ?>">//<?= $p->uri() ?></a>
                </p>
            </article>
        <?php endforeach ?>
    </section>

<?php snippet('footer') ?>
<?php snippet('header') ?>

    <!-- splash ! -->

    <section class="splash">
        <?php // utilise le script plyr.js pour intégrer la vidéo splash ?>
        <div class="player" data-plyr-provider="<?= $page->splash_provider() ?>" data-plyr-embed-id="<?= $page->splash_url() ?>"></div>
    </section>

    <!-- projets collectifs récents -->
    <section class="recent">
        
        <h2>Projets collectifs récents</h2>
        
        <?php 
            // stocke dans la variable $recents 
            // les enfants de  la page dont l’url est "projets"
            // à la condition queleur statut soit "public" (listed) 
            // à la condition que la case "collective" soit cochée
            // et limite le nombre de projets à 3
        ?>
        <?php $recent = page('projets')->children()->listed()->filterBy('collective', true)->limit(3) ?>

        <?php foreach ($recent as $p) : ?>
            <h3><?= $p->title() ?></h3>
            <p>
                <?php // le filtre kirbytextinline renvoie le markdown parsé, mais sans <p></p> autour ?>
                <?= $p->intro()->kirbytextinline() ?>
                <br>
                <a class="button" href="<?= $p->url() ?>">//<?= $p->uri() ?></a>
            </p>
        <?php endforeach ?>
    </section>

    <!-- introduction programme -->

    <section class="programs">
        <?php // stocke dans la variable $program la page dont l’url est "programme" ?>
        <?php $program = page('programme') ?>
        
        <?php // le filtre kirbytext renvoie le markdown parsé avec des <p></p> autour des paragraphes ?>
        <?= $program->intro()->kirbytext() ?>
        
        <?php // pour chaque sous-page, on affiche un lien direct vers l’ancre (#slug) dans la page “programme” ?>
        <?php foreach ($program->children()->listed() as $p) : ?>
            <a class="button" href="<?= $program->url() ?>#<?= $p->slug() ?>"><?= $p->title() ?></a>
        <?php endforeach ?>
    </section>

    <!-- projets d’étudiants -->

    <section class="students">

        <h2>Projets d’étudiants</h2>

        <?php 
            // stocke dans la variable $students 
            // les enfants de  la page dont l’url est "projets"
            // à la condition queleur statut soit "public" (listed) 
            // à la condition que la case "collective" NE SOIT PAS cochée
            // et limite le nombre de projets à 5
        ?>
        <?php $students = page('projets')->children()->listed()->filterBy('collective',  false)->limit(5) ?>
        
        <?php // crée un slideshow qui sera géré par le script flickity.js ?>
        <div class="slideshow">
        <?php foreach ($students as $p) : ?>
            <figure class="slideshow-item" >
            <a href="<?= $p->url() ?>" >
                <?php // vérifie qu’une image de couv existe ?>
                <?php if( $image = $p->cover()->toFile()) : ?>
                    <img src="<?= $image->resize(1200)->url() ?>" srcset="<?= $image->srcset("cover") ?>" alt="<?= $p->title() ?>" >
                <?php // sinon… ?>
                <?php else: ?>
                    <?= $p->uri() ?>
                <?php endif ?>
            </a>
            </figure>
        <?php endforeach ?>
        </div>

    </section>

<?php snippet('footer') ?>
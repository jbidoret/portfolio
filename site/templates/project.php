<?php snippet('header') ?>

        <section class="project-title">
            <h1><?= $page->title() ?></h1>
            
            <?php 
                // la fonction e() permet d‘évaluer une condition (premier paramètre, avant la virgule) 
                // et d’afficher une valeur si elle est remplie
                // un troisième paramètre (optionel) affiche quelque chose d’autre
                // on peut la lire comme : e(si oui, alors, sinon)
            ?>  
            <?php e($page->subtitle()->isNotEmpty(), "<h2>".$page->subtitle()."</h2>" ) ?>
            
            <?php if($page->students()->isNotEmpty()) :?>
                <p class="team">
                <?php // les étudiants sont stockés sous la forme d’une "structure" de données ?>  
                <?php foreach($page->students()->toStructure() as $student): ?>
                    <span><?= $student->name() ?></span>
                <?php endforeach ?>
                </p>
            <?php endif ?>
            
            <?php e($page->year()->isNotEmpty(), "<p class=year'>".$page->year()."</p>" ) ?>
        </section>

        
        <section class="splash">
            <?php // teste successivement toutes les possibilités de "couverture" ?>  
            <?php if($page->video_cover()->isNotEmpty()): ?>
                <?php // fichier vidéo ? ?>  
                <video src="<?= $page->video_cover()->toFile()->url() ?>" class="player"></video>
            <?php elseif($page->yt_cover()->isNotEmpty()): ?>
                <?php // vidéo youtube ? ?>  
                <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?= $page->yt_cover() ?>"></div>
            <?php elseif($page->vimeo_cover()->isNotEmpty()): ?>
                <?php // vidéo vimeo ? ?>  
                <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?= $page->vimeo_cover() ?>"></div>
            <?php elseif($page->cover()->isNotEmpty()): ?>
                <?php // image ? ?>  
                <img src="<?= $page->cover()->toFile()->resize(1200)->url() ?>" srcset="<?= $page->cover()->toFile()->srcset("cover") ?>" alt="<?= $page->title() ?>" >  
            <?php endif ?>
        </section>

        <section class="intro">
            <?= $page->intro()->kt() ?>
        </section>

        <?php 
            // récupère les fichiers sélectionnés dans la galerie (et transforme leur nom en "vrais" fichiers)
            $slides = $page->gallery()->sortBy('sort','asc')->toFiles();
            // est-ce qu’il y a des slides ( count() renvoie le nombre ; s’il renvoie 0, la condition n’est pas remplie)
            if(count($slides)): ?>
        <section class="images">
            <div class="slideshow">
            <?php foreach ($slides as $image) : ?>
                <figure class="slideshow-item" >
                    <img src="<?= $image->resize(1200)->url() ?>" srcset="<?= $image->srcset("cover") ?>" alt="<?= $page->title() ?>" >                    
                </figure>
            <?php endforeach ?>
            </div>
        </section>
        <?php endif ?>

        <section class="details">
            <?= $page->details()->kt() ?>
        </section>


<?php snippet('footer') ?>
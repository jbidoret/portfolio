<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">    
        <title>Nouveaux médias – ÉSAD Pyrénées</title>
        <meta name="description" content="Nouveaux médias — Pôle enseignement / recherche / création de l’ÉSAD Pyrénées" />
        
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta property="og:title" content="Nouveaux médias" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://nm.esapyrenees.fr/" />
        <meta property="og:description" content="Nouveaux médias — Pôle enseignement / recherche / création de l’ÉSAD Pyrénées" />
        <meta property="og:image" content="<?= url('assets/img/nouveauxmedias.png') ?>" />

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@esapyrenees">
        <meta name="twitter:creator" content="@esapyrenees">
        <meta name="twitter:title" content="Nouveaux médias">
        <meta name="twitter:description" content="Nouveaux médias — Pôle enseignement / recherche / création de l’ÉSAD Pyrénées">
        <meta name="twitter:image" content="<?= url('assets/img/nouveauxmedias.png') ?>">
        
        <?php // lien vers plusieurs fichiers CSS ?>
        <?= css(["assets/plyr/plyr.css", "assets/css/flickity.css", "assets/css/nm.css"]) ?>      

    </head>
    <body>
		<div id="page">

            <header id="header">
                <h1>
                    <a href="<?= $site->url()?>">
                        Pôle<br> Nouveaux <br> médias<br> 
                    </a>
                    — <br>
                    <a href="https://esad-pyrenees.fr">
                        École<br> supérieure<br> d’art et <br>de design <br>des Pyrénées
                    </a>
                </h1>
            </header>

            <main>
                <section id="title" >
                    <h1>
                        <a href="<?= $site->url()?>"><span>Nouveaux</span> médias</a>
                    </h1>
                </section>
                <section id="nav">
                    <nav>
                        <ul>
                            <?php // menu : parcours toutes les pages publiques de la racine du site ?>
                            <?php foreach($pages->listed() as $page) :?>
                                <li><a href="<?= $page->url() ?>"><?= $page->title() ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </nav>
                </section>
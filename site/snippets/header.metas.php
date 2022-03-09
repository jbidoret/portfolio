    <title><?= r($page !== $site->homePage(), $page->title()->html() . ' | ') . $site->title()->html() ?></title>

    <meta name="description" content="<?php e($page->text()->isNotEmpty(), $page->text()->excerpt(150)->text(), $site->description()->text()) ?>">
    
    <link rel="icon" type="image/svg+xml" href="<?= url("/assets/images/favicon.svg") ?>">
    <link rel="icon" type="image/png" href="<?= url("/assets/images/favicon.png") ?>">

    <meta property="og:url" content="<?= $site->url() ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= r($page !== $site->homePage(), $page->title()->html() . ' | ') . $site->title()->html() ?>">
    <meta property="og:description" content="<?php e($page->intro()->isNotEmpty(), $page->intro()->text(), $site->description()->text()) ?>">
    <meta property="og:site_name" content="<?= $site->title() ?>">
    <meta property="og:locale" content="<?= $kirby->language() ?? 'fr_FR' ?>">

    <?php
        if ($page->cover()->isNotEmpty()) {
            $cover = $page->cover()->toFile();
        } else {
            $cover = page('home')->images()->first();
        }
        if ($cover) :
            $og_cover = $cover->thumb(['width' => 1200, 'height' => 630, 'crop' => true]);
    ?>

    <meta property="og:image" content="<?= $og_cover->url() ?>">
    <meta property="og:image:width" content="<?= $og_cover->width() ?>">
    <meta property="og:image:height" content="<?= $og_cover->height() ?>">
    <?php endif ?>
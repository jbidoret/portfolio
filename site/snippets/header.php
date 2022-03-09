<!DOCTYPE html>
<html lang="<?= $kirby->language() ?? 'fr' ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="cleartype" content="on">

    <?php snippet("header.metas") ?>

    <?= css('assets/css/kirbyxhibit.css') ?>

</head>
<body
    data-login="<?php e($kirby->user(),'true', 'false') ?>"
    data-template="<?= $page->template() ?>"
    data-intended-template="<?= $page->intendedTemplate() ?>">


    <div class="page">

        <header class="header">

            <span class="logo"><a  href="<?= $site->url() ?>"><?= $site->title() ?></a></span>

            <?php snippet("nav") ?>

        </header>

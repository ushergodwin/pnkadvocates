<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <!-- CSS file -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/imgs/logo/favicon.ico') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/pollscss/scit-votes.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/animate.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/pnkadvocates/css/pnkadvocates-1.0.css') ?>"/>
    <style>
       .se-pre-con {position: fixed;left: 0;top: 0;width: 100%;height: 100%;z-index: 9999;background: url(<?= base_url('assets/imgs/site/Preloader_2.gif')?>) center no-repeat #fff;}.carousel-item img{width: 100%;}
    </style>
</head>
<body>
<div class="se-pre-con"></div>
<nav class="container-fluid sticky-top wow slideInDown" style="background: url(<?= base_url('assets/imgs/site/top-bg-02.jpg') ?>)">
<div class="row justify-content-between text-light">
        <p>Sixth Floor - Trust Towers, Plot 4 Kyadondo Road, Nakasero</p>
        <p><a href="tel:+256756809525" class="b-link text-light"><i class="fas fa-phone-alt text-light"></i> +256756809525</a></p>
        <p><a href="mailto:info@pnkadvocates.ug" class="b-link text-light"><i class="fas fa-envelope text-light"></i> info@pknadvocates.ug</a></p>
</div>
</nav>
<nav class="navbar navbar-expand-md navbar-light bg-light wow slideInLeft shadow">
    <a href="<?= base_url() ?>" class="navbar-brand">PNK ADVOCATES</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
        </div>
        <div class="navbar-nav ml-auto custom-nav">
        <a href="<?= base_url() ?>" class="nav-item nav-link active">Home</a>
            <a href="<?= site_url('about-firm') ?>" class="nav-item nav-link">About Us</a>
            <a href="<?= site_url('legal-team') ?>" class="nav-item nav-link">Our Team</a>
            <a href="<?= site_url('practice-areas') ?>" class="nav-item nav-link">Practice Areas</a>
            <a href="<?= site_url('contacts') ?>" class="nav-item nav-link">Contact Us</a>
        </div>
    </div>
</nav>
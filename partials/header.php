<?php
include_once 'App.php';
if (!isset($title)) {
    $title = 'Home';
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pharmacy system | <?= $title; ?></title>
    <meta name="description" content="Site d'e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS here -->
    <link rel="stylesheet" href="public/assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets2/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/assets2/css/slicknav.css">
    <link rel="stylesheet" href="public/assets2/css/flaticon.css">
    <link rel="stylesheet" href="public/assets2/css/gijgo.css">
    <link rel="stylesheet" href="public/assets2/css/animate.min.css">
    <link rel="stylesheet" href="public/assets2/css/animated-headline.css">
    <link rel="stylesheet" href="public/assets2/css/magnific-popup.css">
    <link rel="stylesheet" href="public/assets2/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="public/assets2/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets2/css/slick.css">
    <link rel="stylesheet" href="public/assets2/css/nice-select.css">
    <link rel="stylesheet" href="public/assets2/css/style.css">
</head>
<body class="black-bg">
<!-- ? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="public/img2/TT.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php">
                            Logo
                        </a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>

                                <li><a href="pricing.php">Pricing</a></li>
                                <li><a href="gallery.php">Gallery</a></li>

                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header-btn -->
                    <div class="header-btns d-none d-lg-block f-right">
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="<?= SITE_URL . '/admin/dashboard/index.php'; ?>" class="btn">
                                Dashboard
                            </a>
                            <a href="logout.php" class="btn">
                                Sign out
                            </a>
                        <?php else: ?>
                            <a href="login.php" class="btn">
                                Sign in
                            </a>
                        <?php endif; ?>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

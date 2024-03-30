<?php
if (!isset($menu)) {
    $menu = 'dashboard';
}
include_once '../App.php';
App::redirectIfNotConnect();
$auth = $_SESSION['user'];
?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/assets/vendors/jquery-bar-rating/css-stars.css"/>
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/assets/vendors/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/assets/css/demo_1/style.css"/>
    <!--    <link rel="shortcut icon" href="<?= SITE_URL; ?>/public/assets/images/favicon.png" />-->
</head>
<body>
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="<?= SITE_URL; ?>"><i class="mdi mdi-home me-3 text-white"></i></a>
                    <button id="bannerClose" class="btn border-0 p-0">
                        <i class="mdi mdi-close text-white me-0"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile border-bottom">
                <a href="#" class="nav-link flex-column">
                    <div class="nav-profile-image" style="margin: 10px 0;">
                        <img src="<?= SITE_URL; ?>/public/img/avatar.png" alt="profile"/>
                    </div>
                    <div class="nav-profile-text d-flex ms-0 mb-3">
                        Name:
                        <span class="font-weight-semibold ms-1">
                            <?= $auth->name; ?>
                        </span>
                    </div>
                    <div class="nav-profile-text d-flex ms-0 mb-3">
                        Profession:
                        <span class="text-secondary ms-1">
                            <?= $auth->profession; ?>
                        </span>
                    </div>
                </a>
            </li>
            <li class="nav-item pt-3">
                <a class="nav-link d-block" href="<?= SITE_URL; ?>">
<!--                    <img class="sidebar-brand-logo" src="<?= SITE_URL; ?>/public/assets/images/logo.svg" alt=""/>-->
<!--                    <img class="sidebar-brand-logomini" src="<?= SITE_URL; ?>/public/assets/images/logo-mini.svg" alt=""/>-->
                    <div class="small font-weight-light pt-1">Home</div>
                </a>
                <!--                <form class="d-flex align-items-center" action="#">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                        </div>
                                        <input type="text" class="form-control border-0" placeholder="Search"/>
                                    </div>
                                </form>-->
            </li>
            <li class="pt-2 pb-1">
                <span class="nav-item-head">Overall View</span>
            </li>
            <li class="nav-item <?= $menu === 'dashboard' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= SITE_URL; ?>/dashboard">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item <?= $menu === 'customers' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= SITE_URL; ?>/dashboard/customers-list.php">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Customers</span>
                </a>
            </li>
            <li class="nav-item <?= $menu === 'products' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= SITE_URL; ?>/dashboard/products-list.php">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Products</span>
                </a>
            </li>
            <li class="nav-item <?= $menu === 'orders' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= SITE_URL; ?>/dashboard/orders-list.php">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Orders</span>
                </a>
            </li>
            <li class="nav-item <?= $menu === 'infos' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= SITE_URL; ?>/dashboard/infos-list.php">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Get in touch info</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= SITE_URL; ?>/logout.php">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="<?= SITE_URL; ?>#ui-basic" aria-expanded="false"
                   aria-controls="ui-basic">
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                <div class="img-ss rounded-circle bg-light border me-3"></div>
                Default
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border me-3"></div>
                Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles default primary"></div>
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles light"></div>
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-chevron-double-left"></span>
                </button>
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="<?= SITE_URL; ?>">
                        <img src="<?= SITE_URL; ?>/public/assets/images/logo-mini.svg" alt="logo"/></a>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE_URL; ?>/dashboard">
                            <i class="mdi mdi-home-circle"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-logout">
                        <a class="nav-link" href="<?= SITE_URL; ?>/logout.php">
                            <i class="mdi mdi-account-off"></i>
                            Deconnexion
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                        type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper pb-0">

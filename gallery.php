<?php
$title = 'Gallery';
include_once 'partials/header.php';
?>
<main style="background-color: rgb(27, 251, 146);">
    <!--? Hero Start -->
    <div class="slider-area2" style="background-image: url(<?= SITE_URL; ?>/public/assets2/img/gallery/gallery3.jpg);">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70">
                            <h2>Gallery</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? Gallery Area Start -->
    <div class="gallery-area section-padding30 ">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img" style="background-image: url('<?= SITE_URL; ?>/public/assets2/img/gallery/gallery1.jpeg');"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Efficient Medicine</h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img" style="background-image: url(<?= SITE_URL; ?>/public/assets2/img/gallery/gallery5.jpg);"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Good Tablets</h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img" style="background-image: url(<?= SITE_URL; ?>/public/assets2/img/gallery/gallery3.jpg);"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Efficient Medicine</h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img" style="background-image: url(<?= SITE_URL; ?>/public/assets2/img/gallery/gallery4.jpg);"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Good Tablets</h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img" style="background-image: url(<?= SITE_URL; ?>/public/assets2/img/gallery/team2.jpg);"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Efficient Medicine</h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img" style="background-image: url(<?= SITE_URL; ?>/public/assets2/img/gallery/drug1.jpg)" ></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Solutions for injection</h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
    <!-- ? services-area -->
    <section class="services-area" style="background-color: rgb(156, 120, 53);">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-40">
                        <div class="features-icon">
                            <img src="<?= SITE_URL; ?>/public/assets2/img/icon/icon1.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Location</h3>
                            <p>DOUALA ZONE INDUSTRIELLE BONABERI MAISON KIA MOTORS </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-40">
                        <div class="features-icon">
                            <img src="<?= SITE_URL; ?>/public/assets2/img/icon/icon2.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Phone</h3>
                            <p>(237) 681079919</p>
                            <p>(237) 677200482</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-40">
                        <div class="features-icon">
                            <img src="<?= SITE_URL; ?>/public/assets2/img/icon/icon3.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Email</h3>
                            <p>Secretariatpharmafg@gmail.com</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
include_once 'partials/footer.php';
?>

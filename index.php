<?php
$title = 'Home';
include_once 'partials/header.php';
?>
<main style="background-color: rgb(23, 231, 23);">
    <!--? slider Area Start-->
    <div class="slider-area position-relative" style="background-image: url('/public/assets2/img/gallery/gallery3.jpg');">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h2 data-animation="fadeInLeft" data-delay="0.1s">
                                    <u>
                                        WELCOME TO THE PHARMACEUTICAL WHOLE DRUGS SALE COMPANY
                                    </u>
                                </h2>
                                <h1 data-animation="fadeInLeft" data-delay="0.4s">P.M.S LTD</h1>
                                <a href="<?= SITE_URL; ?>/register.php" class="border-btn hero-btn"
                                   data-animation="fadeInLeft" data-delay="0.8s">
                                    REGISTER TO START PURCHASE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Training categories Start -->
    <section class="training-categories black-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="public/assets2/img/gallery/drug1.jpg" alt="image">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3>Best Medicine Supplier</h3>
                                    <p>Our medical supply chain is very efficient and reliable to our Customer.<br>
                                        Become one of our clients and profit from our price reduction.</p>
                                    <a href="login.php" class="border-btn">Start Purchase</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="public/assets2/img/gallery/cat2.jpg" alt="image">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3>Enjoy pharmaceutical products</h3>
                                    <p>All you need is to join our membership program to become our best client for
                                        purchasing our inputted medications. <br> We are Fast and reliable.</p>
                                    <a href="login.php" class="btn">Register to be a Customer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- training categories End-->
    <!--? Team -->
    <section class="team-area fix">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mb-55 wow fadeInUp" data-wow-duration="1s"
                         data-wow-delay=".1s">
                        <h2>What We Offer</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-cat text-center mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="public/assets2/img/gallery/team1.jpg" alt="image">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="pricing.php">Pharmaceutical First Group</a></h5>
                            <p>Garantir l'intégrité physique et psychologique de nos collaborateurs</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-cat text-center mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="cat-icon">
                            <img src="public/assets2/img/gallery/team2.jpg" alt="image">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="pricing.php">Drugs For Body Health</a></h5>
                            <p>Medicament par voie Orale</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-cat text-center mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                        <div class="cat-icon">
                            <img src="public/assets2/img/gallery/team3.jpeg" alt="image">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="gallery.php">Good Drugs</a></h5>
                            <p>Solutés massifs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services End -->
    <!--? Gallery Area Start -->
    <div class="gallery-area section-padding30 ">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img"
                             style="background-image: url('/public/assets2/img/gallery/gallery1.jpeg');"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Efficient Drugs </h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img"
                             style="background-image: url('/public/assets2/img/gallery/gallery5.jpg');"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3> Good Tablets</h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img"
                             style="background-image: url('/public/assets2/img/gallery/gallery3.jpg');"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Efficient Medicine </h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img"
                             style="background-image: url('/public/assets2/img/gallery/gallery4.jpg');"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Good Tablets </h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img"
                             style="background-image: url('/public/assets2/img/gallery/gallery5.jpg');"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Good Tablets </h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="box snake mb-30">
                        <div class="gallery-img big-img"
                             style="background-image: url('/public/assets2/img/gallery/drug1.jpg')"></div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <h3>Solution for injection</h3>
                                <a href="gallery.php"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->


    <!--? About Area-2 Start -->
    <section class="about-area2 fix pb-padding pt-50 pb-80">
        <div class="support-wrapper align-items-center">
            <div class="right-content2">
                <!-- img -->
                <div class="right-img wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <img src="public/assets2/img/gallery/about2.jpg" alt="image">
                </div>
            </div>
            <div class="left-content2">
                <!-- section tittle -->
                <div class="section-tittle2 mb-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="front-text">
                        <h2 class="">About Us</h2>
                        <p>We are an innovative company and one of the greatest supplier of pharmaceutical products in
                            the country. We offer cheap prices and good promotion for your first purchase in bulk.
                            we import and distribute new technology medical equipments, medical drugs and all medical
                            surrounding needs.
                        </p>
                        <p class="mb-40">Our customers are our first target, we relate their need to our supply,
                            we studied the medical environment in Cameroon, and we came out to import the most essential
                            for saving cameroonian lives</p>
                        <a href="login.php" class="border-btn">
                            Start Medical Purchase
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
    <!--? Blog Area Start -->
    <section class="home-blog-area pt-10 pb-50">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9 col-sm-10">
                    <div class="section-tittle text-center mb-100 wow fadeInUp" data-wow-duration="2s"
                         data-wow-delay=".2s">
                        <h2>INQUIRE MORE</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="public/assets2/img/gallery/blog1.png" alt="image">
                            </div>
                            <div class="blog-cap">
                                <span>Pharmaceutical Massif solutions </span>
                                <h3><a href="pricing.php">Your Massif Solutions ready for Use</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".6s">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="public/assets2/img/gallery/blog2.png" alt="image">
                            </div>
                            <div class="blog-cap">
                                <span>pharmaceutical antibiotic</span>
                                <h3><a href="pricing.php">Your Antibiotic Ready for Use Options</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->

    <!-- ? services-area -->
    <section class="services-area" style="background-color: rgb(182, 155, 105);">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-40">
                        <div class="features-icon">
                            <img src="public/assets2/img/icon/icon1.svg" alt="image">
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
                            <img src="public/assets2/img/icon/icon2.svg" alt="image">
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
                            <img src="public/assets2/img/icon/icon3.svg" alt="image">
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

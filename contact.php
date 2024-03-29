
<!doctype php>
<php class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>pharmaceutical system</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

   <!-- CSS here -->
   <link rel="stylesheet" href="assets2/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets2/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets2/css/slicknav.css">
   <link rel="stylesheet" href="assets2/css/flaticon.css">
   <link rel="stylesheet" href="assets2/css/gijgo.css">
   <link rel="stylesheet" href="assets2/css/animate.min.css">
   <link rel="stylesheet" href="assets2/css/animated-headline.css">
   <link rel="stylesheet" href="assets2/css/magnific-popup.css">
   <link rel="stylesheet" href="assets2/css/fontawesome-all.min.css">
   <link rel="stylesheet" href="assets2/css/themify-icons.css">
   <link rel="stylesheet" href="assets2/css/slick.css">
   <link rel="stylesheet" href="assets2/css/nice-select.css">
   <link rel="stylesheet" href="assets2/css/style.css">
</head>
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="img2/TT.png" alt="">
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
                        <a href="index.php"><img src="img2/TT.png" alt=""></a>
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
                       <a href="index2.php" class="btn">User Login</a>
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
<main style="background-color: rgb(96, 241, 34);">
    <!--? Hero Start -->
    <div class="slider-area2"  style="background-image: url(assets2/img/gallery/gallery3.jpg);">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70">
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hero End -->

     <?php

include('dbcon.php');

  if (isset($_POST['send'])){
    $message =  $_POST['message'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql= "insert into get_in_touch(message,name,email) values ('$message','$name','$email')";
    $result = mysqli_query($con,$sql);
    if ($result){
        echo "<script>alert('Send successfully');</script>";
    }
    else {
        echo "<script>alert('Please Try again');</script>";
    }
  }
?>

    <!--?  Contact Area start  -->
    <section class="contact-section">
        <div class="container">
           
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="#" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder=" Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                </div>
                            </div>
                            
                                
        
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="send" class="button button-contactForm boxed-btn" value="Send">
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>BONABERI, CAMEROUN</h3>
                            <p>Zone industrielle, KIA Motors </p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+237 681079919/677200482</h3>
                            <p>Monday to Friday 8am to 5pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <p>Secretariatpharmafg@gmail.com</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->
     <!-- ? services-area -->
     <section class="services-area" style="background-color: rgb(182, 155, 105);">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-40">
                        <div class="features-icon">
                            <img src="assets2/img/icon/icon1.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Location</h3>
                            <p>DOUALA ZONE INDUSTRIELLE BONABERI MAISON KIA MOTORS</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-40">
                        <div class="features-icon">
                            <img src="assets2/img/icon/icon2.svg" alt="">
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
                            <img src="assets2/img/icon/icon3.svg" alt="">
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
<footer>
    <!--? Footer Start-->
    <div class="footer-area black-bg" style="background-color: rgb(150, 136, 110);">
        <div class="container">
            <div class="footer-top footer-padding">
                <!-- Footer Menu -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-footer-caption mb-50 text-center">
                            <!-- logo -->
                            <div class="footer-logo wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                <a href="index.php"><img src="img2/TT.jpg" alt=""></a>
                            </div>
                            <!-- Menu -->
                            <!-- Header Start -->
                            <div class="header-area main-header2 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                                <div class="main-header main-header2">
                                    <div class="menu-wrapper menu-wrapper2">
                                        <!-- Main-menu -->
                                        <div class="main-menu main-menu2 text-center">
                                            <nav>
                                                <ul>
                                                    <li><a href="index.php">Home</a></li>
                                                    <li><a href="about.php">About</a></li>
                                                   
                                                    <li><a href="pricing.php">Pricing</a></li>
                                                    <li><a href="gallery.php">Gallery</a></li>
                                                    <li><a href="contact.php">Contact</a></li>
                                                </ul>
                                            </nav>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                            <!-- Header End -->
                            <!-- social -->
                            <div class="footer-social mt-30 wow fadeInUp" data-wow-duration="3s" data-wow-delay=".8s">
                                <a href="https://www.youtube.com/channel/UCsZydS6Ww6KdeGsYao4lniw"><i class="fab fa-youtube"></i></a>
                                <a href="https://m.facebook.com/TT7.in/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/tuitionstonight/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12">
                        <div class="footer-copy-right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart" aria-hidden="true"></i> <a href="" target="_blank">pharmaceuticalms</a>
                              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Footer End-->
  </footer>
  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script src="./assets2/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets2/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets2/js/popper.min.js"></script>
<script src="./assets2/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets2/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets2/js/owl.carousel.min.js"></script>
<script src="./assets2/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets2/js/wow.min.js"></script>
<script src="./assets2/js/animated.headline.js"></script>
<script src="./assets2/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./assets2/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="./assets2/js/jquery.nice-select.min.js"></script>
<script src="./assets2/js/jquery.sticky.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./assets2/js/jquery.counterup.min.js"></script>
<script src="./assets2/js/waypoints.min.js"></script>
<script src="./assets2/js/jquery.countdown.min.js"></script>
<script src="./assets2/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./assets2/js/contact.js"></script>
<script src="./assets2/js/jquery.form.js"></script>
<script src="./assets2/js/jquery.validate.min.js"></script>
<script src="./assets2/js/mail-script.js"></script>
<script src="./assets2/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="./assets2/js/plugins.js"></script>
<script src="./assets2/js/main.js"></script>
</body>
</php>
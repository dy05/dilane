<?php

include_once('App.php');
$message = null;
$datas = [];
$errors = [];

if (!empty($_POST)) {
    $pdo = App::getPDO();
    $datas = $_POST;
//    $message = $_POST['message'];
//    $name = $_POST['name'];
//    $email = $_POST['email'];
//    $sql = "insert into get_in_touch(message,name,email) values ('$message','$name','$email')";
//    $result = mysqli_query($con, $sql);

    try {
        if (empty($datas['message'])) {
            $errors[] = 'Message is required';
        }

        if (empty($datas['email'])) {
            $errors[] = 'Email is required';
        }

        if (empty($datas['name'])) {
            $errors[] = 'Name is required';
        }

        if (empty($errors)) {
            $message = $datas['message'];
            $name = $datas['name'];
            $email = $datas['email'];
            $query = $pdo->prepare("INSERT INTO get_in_touch (message, name, email) VALUES (:message, :name, :email)");
            $query->bindParam(':message', $message);
            $query->bindParam(':name', $name);
            $query->bindParam(':email', $email);
            $query->execute();
            $message = 'Send successfully !';
        }
    } catch (Exception $exc) {
        //$errors[] = 'Unexpected error';
        $message = 'Please try again.';
    }
}

$title = 'Contact';
include_once 'partials/header.php';
?>
<main style="background-color: rgb(96, 241, 34);">
    <!--? Hero Start -->
    <div class="slider-area2" style="background-image: url(<?= SITE_URL; ?>/public/assets2/img/gallery/gallery3.jpg);">
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

    <?php if ($message): ?>
        <script>
            alert(`<?= $message; ?>`);
        </script>
    <?php endif; ?>

    <!--?  Contact Area start  -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="#" method="post" id="contactForm"
                          novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message" class="hidden d-none"></label>
                                    <textarea class="form-control w-100" name="message" id="message" cols="30"
                                              rows="9" placeholder=" Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="hidden d-none"></label>
                                    <input class="form-control valid" name="name" id="name" type="text"
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="hidden d-none"></label>
                                    <input class="form-control valid" name="email" id="email" type="email"
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter email address'" placeholder="Email"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="send" class="button button-contactForm boxed-btn" value="Send"/>
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
                            <img src="<?= SITE_URL; ?>/public/assets2/img/icon/icon1.svg" alt="image"/>
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
                            <img src="<?= SITE_URL; ?>/public/assets2/img/icon/icon2.svg" alt="image"/>
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
                            <img src="<?= SITE_URL; ?>/public/assets2/img/icon/icon3.svg" alt="image"/>
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

<?php
include_once 'App.php';

App::redirectIfConnect();
$datas = [];
$errors = [];

try {
    if (!empty($_POST)) {
        $pdo = App::getPDO();
        $datas = $_POST;

        if (empty($datas['name'])) {
            $errors[] = 'Name is required';
        }

//        if (empty($datas['phone'])) {
//            $errors[] = 'Phone is required';
//        }

        if (empty($datas['email'])) {
            $errors[] = 'Email is required';
        }

        if (empty($datas['gender'])) {
            $errors[] = 'Gender is required';
        }


        if (empty($datas['profession'])) {
            $errors[] = 'Profession is required';
        }

        if (empty($datas['password'])) {
            $errors[] = 'Password is required';
        }

        $email = $datas['email'];
        $phone = $datas['phone'];
        $password = $datas['password'];

        $query = $pdo->prepare("SELECT * FROM user WHERE username = :username");
        $query->bindParam(':username', $email);
        $query->execute();
        if ($query->fetch()) {
            $errors[] = 'Email is already taken.';
        }

        if (!empty($phone)) {
            $query = $pdo->prepare("SELECT * FROM user WHERE phone = :phone");
            $query->bindParam(':phone', $phone);
            $query->execute();
            if ($query->fetch()) {
                $errors[] = 'Phone is already taken.';
            }
        }

        if (!empty($password)) {
            if (strlen($password) < 5) {
                $errors[] = 'Password must be at least 5 characters.';
            }
        }

        if (empty($errors)) {
            $name = $datas['name'];
            $profession = $datas['profession'];
            $gender = $datas['gender'];
            $password = password_hash($password, PASSWORD_BCRYPT);
            // verify email
            $query = $pdo->prepare("INSERT INTO user (username, phone, name, profession, password, gender) VALUES (:username, :phone, :name, :profession, :password, :gender)");
//            $query = $pdo->prepare("INSERT INTO user (username, phone, name, profession, password, gender, role) VALUES (:username, :phone, :name, :profession, :password, :gender, :role)");
//            $query->bindValue(':role', 'admin');
            $query->bindParam(':username', $email);
            $query->bindParam(':password', $password);
            $query->bindParam(':phone', $phone);
            $query->bindParam(':gender', $gender);
            $query->bindParam(':profession', $profession);
            $query->bindParam(':name', $name);
            $query->execute();
            $user = $pdo->query('SELECT * FROM user WHERE id = ' . $pdo->lastInsertId())->fetch();
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php');
            }

            $errors[] = 'Unexpected error.';
        }
    }
} catch (Exception $exc) {
    $errors[] = 'Unexpected error.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pharmaceutical System Admin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="public/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="public/css/matrix-style.css"/>
    <link rel="stylesheet" href="public/css/matrix-login.css"/>
    <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet"/>
<!--    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
    <link rel="shortcut icon" type="image/x-icon" href="assets2/img/favicon.ico">
    <style>
        .main_input_box {
            display: flex;
            width: 100%;
            justify-content: center;
        }
        .bg-class {
            background-image: url('public/assets2/img/gallery/gallery3.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .form-actions {
            padding: 20px 88px !important;
        }
        .pb-5 {
            padding-bottom: 1.25rem;
        }
    </style>
</head>
<body class="bg-class">
<div id="loginbox">
    <form id="loginform" class="form-vertical" action="" method="POST">
        <p class="normal_text">
            Enter your details below
        </p>

        <?php if (!empty($errors)): ?>
            <div style="margin: 0 88px">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li>
                                    <?= $error; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <div class="controls">
            <div class="main_input_box">
                <label for="name" class="add-on bg_lo"><i class="icon-pencil"></i></label>
                <input type="text" name="name" value="<?= isset($datas['name']) ? $datas['name'] : ''; ?>" id="name" placeholder="name"/>
            </div>
        </div>

        <br/>

        <div class="controls">
            <div class="main_input_box">
                <label for="email" class="add-on bg_lo"><i class="icon-envelope"></i></label>
                <input type="text" name="email" value="<?= isset($datas['email']) ? $datas['email'] : ''; ?>" id="email" placeholder="email"/>
            </div>
        </div>

        <br/>

        <div class="controls">
            <div class="main_input_box">
                <label for="phone" class="add-on bg_lo"><i class="icon-leaf"></i></label>
                <input type="text" name="phone" value="<?= isset($datas['phone']) ? $datas['phone'] : ''; ?>" id="phone" placeholder="+237 658183169"/>
            </div>
        </div>

<!--        <br/>-->
<!---->
<!--        <div class="controls">-->
<!--            <div class="main_input_box">-->
<!--                <label for="role" class="add-on bg_lo"><i class="icon-leaf"></i></label>-->
<!--                <input type="text" name="role" id="role" placeholder="role"/>-->
<!--                <label for="role" class="hidden d-none"></label>-->
<!--                <select name="role" id="role" required>-->
<!--                    <option value="customer">Customer</option>-->
<!--                    <option value="staff">Staff</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->

        <br/>

        <div class="controls">
            <div class="main_input_box">
                <label for="password" class="add-on bg_lo"><i class="icon-asterisk"></i></label>
                <input type="password" name="password" id="password" placeholder="password" required/>
            </div>
        </div>

        <br/>

        <div class="controls" style="padding: 0 50px;">
            <div class="main_input_box">
                <label for="gender" class="hidden d-none"></label>
                <select name="gender" id="gender" style="width: 100%;" required>
                    <option value="Male" <?= isset($datas['gender']) && $datas['gender'] === "Male" ? 'selected="selected"' : ''; ?>>Male</option>
                    <option value="Female" <?= isset($datas['gender']) && $datas['gender'] === "Female" ? 'selected="selected"' : ''; ?>>Female</option>
                </select>
            </div>
        </div>

        <br/>

        <div class="controls" style="padding: 0 50px;">
            <div class="main_input_box">
                <label for="profession" class="hidden d-none"></label>
                <select name="profession" id="profession" style="width: 100%;" required>
                    <option <?= !isset($datas['profession']) ? 'selected="selected"' : ''; ?> disabled>Select Profession</option>
                    <option value="pharmacist" <?= isset($datas['profession']) && $datas['profession'] === "pharmacist" ? 'selected="selected"' : ''; ?>>Pharmacist</option>
                    <option value="doctor" <?= isset($datas['profession']) && $datas['profession'] === "doctor" ? 'selected="selected"' : ''; ?>>Medical Doctor</option>
                    <option value="delegate" <?= isset($datas['profession']) && $datas['profession'] === "delegate" ? 'selected="selected"' : ''; ?>>Medical Delegate</option>
                    <option value="hospital" <?= isset($datas['profession']) && $datas['profession'] === "hospital" ? 'selected="selected"' : ''; ?>>Hospital</option>
                </select>
            </div>
        </div>

        <br/>

        <!-- <div class="controls">
            <div class="main_input_box">
            <select name="services" required="required" id="select">
            <option selected="true" disabled="disabled">Select Service</option>
                <option value="Half Palette" >Half Palette Medicine</option>
                <option value=" Palette Medicine"> Palette Medicine</option>
                <option value="Other Medicine">Other Medicine</option>
            </select>
            </div>
        </div> -->

        <div class="form-actions">
            <span class="pull-left">
                <a href="<?= SITE_URL . '/login.php'; ?>"
                   class="flip-link btn btn-success" id="to-login">
                    &laquo; Back to login
                </a>
            </span>
            <span class="pull-right">
                <button class="btn btn-info" type="submit">
                    Submit
                </button>
            </span>
        </div>
    </form>
</div>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/matrix.login.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/matrix.js"></script>
</body>
</html>

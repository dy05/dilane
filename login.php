<?php
include_once 'App.php';

App::redirectIfConnect();
$datas = [];
$errors = [];

try {
    if (!empty($_POST)) {
        $pdo = App::getPDO();
        $datas = $_POST;

        if (empty($datas['username'])) {
            $errors[] = 'Username is required';
        }

        if (empty($datas['password'])) {
            $errors[] = 'Password is required';
        }

        if (empty($errors)) {
            $username = $datas['username'];
            $password = $datas['password'];
            $query = $pdo->prepare("SELECT * FROM user WHERE username = :username OR phone = :username");
            $query->bindParam(':username', $username);
            $query->execute();
            $user = $query->fetch();

            if ($user) {
                if (password_verify($password, $user->password)) {
                    if ($user->status === 'active') {
                        $_SESSION['user'] = $user;
                        header('location:' . SITE_URL . '/index.php');
                    }

                    $errors[] = 'Account has been expired!';
                } else {
                    $errors[] = 'Incorrect password';
                }
            } else {
                $errors[] = 'Invalid Phone/Username';
            }
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
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/matrix-style.css"/>
    <link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/matrix-login.css"/>
    <link href="<?= SITE_URL; ?>/public/font-awesome/css/font-awesome.css" rel="stylesheet"/>
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
    <form id="loginform" class="form-vertical" method="POST" action="">
        <div class="control-group normal_text">
            <h3>Customer Login</h3>
        </div>
        <?php if (!empty($errors)): ?>
        <div style="margin: 0 88px">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <!--            <ul>-->
                <!--                --><?php //foreach ($errors as $error): ?>
                <!--                    <li>-->
                <!--                        --><?php //= $error; ?>
                <!--                    </li>-->
                <!--                --><?php //endforeach; ?>
                <!--            </ul>-->
                <?= $errors[0]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <?php endif; ?>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <label for="username" class="add-on bg_lg"><i class="icon-user"></i></label>
                    <input type="text" name="username" value="<?= isset($datas['username']) ? $datas['username'] : ''; ?>" id="username" placeholder="Username"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <label for="password" class="add-on bg_ly"><i class="icon-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="password"/>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left">
                <a href="register.php" class="flip-link btn btn-info" id="to-recover">
                    Register here
                </a>
            </span>
            <span class="pull-right">
                <button type="submit" name="login" class="btn btn-success">
                    Login Now
                </button>
            </span>
        </div>

        <div class="text-center pb-5">
            <a href="index.php">
                GO TO HOME PAGE
            </a>
        </div>
    </form>
</div>

<script src="<?= SITE_URL; ?>/public/js/jquery.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/matrix.login.js"></script>
<script src="<?= SITE_URL; ?>/public/js/bootstrap.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/matrix.js"></script>
</body>
</html>

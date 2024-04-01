<?php
include_once '../App.php';

App::redirectIfConnect();
$datas = [];
$errors = [];

if (!empty($_POST)) {
    try {
        $pdo = App::getPDO();
        $datas = $_POST;
        if (empty($datas['username'])) {
            $errors[] = 'Username is required';
        }

        if (empty($datas['password'])) {
            $errors[] = 'Password is required';
        }

        if (empty($errors)) {
//    $datas = array_map('trim', $_POST);
//    $datas = array_map('htmlentities', $datas);
//    $datas = array_map('strip_tags', $datas);
//    $datas = array_map('stripslashes', $datas);
//    $datas = array_map('htmlspecialchars', $datas);

            $username = $datas['username'];
//    $password = mysqli_real_escape_string($con, $datas['pass']);
            $password = $datas['password'];

//    $sql = "SELECT * FROM user WHERE username = " . $username;
            $query = $pdo->prepare("SELECT * FROM user WHERE username = :username");
            $query->bindParam(':username', $username);
//    $query = $pdo->prepare("UPDATE user SET password = :password WHERE username = :username");
//    $query->bindParam(':username', $username);
//    $password = password_hash($datas['password'], PASSWORD_BCRYPT);
//    $query->bindParam(':password', $password);
            $query->execute();
            $user = $query->fetch();
            if ($user && password_verify($password, $user->password)) {
                $_SESSION['user'] = $user;
                header("location:admin/dashboard/index.php");
            } else {
                $errors[] = 'User not found';
            }
        }
    } catch (Exception $exc) {
        $errors[] = 'Unexpected error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pharmaceutical ms</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../public/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../public/css/matrix-style.css"/>
    <link rel="stylesheet" href="../public/css/matrix-login.css"/>
    <link href="../public/font-awesome/css/fontawesome.css" rel="stylesheet"/>
    <link href="../public/font-awesome/css/all.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        .login-bg {
            background-image: url('<?= SITE_URL; ?>/public/assets2/img/gallery/gallery3.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="login-bg">
<div id="loginbox">
    <form id="loginform" method="POST" class="form-vertical" action="">
        <div class="control-group normal_text">
            <h3>Sign in</h3>
        </div>
        <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>
                        <?= $error; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box" style="display: flex; height: 3rem; justify-content: center;">
                    <span class="add-on bg_lg" style="display: flex; justify-content: center; align-items: center;">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    <label for="username" class="hidden d-none"></label>
                    <input type="text" id="username" style="height: 100%; padding: 0 10px;"
                           value="<?= isset($datas['username']) ? $datas['username'] : ''; ?>"
                           name="username" placeholder="username" required/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box" style="display: flex; height: 3rem; justify-content: center;">
                    <span class="add-on bg_ly" style="display: flex; justify-content: center; align-items: center;">
                        <i class="fas fa-lock"></i>
                    </span>
                    <label for="password" class="hidden d-none"></label>
                    <input type="password" id="password" style="height: 100%; padding: 0 10px;"
                           name="password" placeholder="Password" required/>
                </div>
            </div>
        </div>
        <div class="form-actions center">
            <button type="submit" class="btn btn-block btn-large btn-info" title="Log In">
                Login
            </button>
        </div>
    </form>

    <div class="text-center">
        <a href="../index.php" class="text-sm">
            GO TO HOME PAGE
        </a>
    </div>
</div>

<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/matrix.login.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/matrix.js"></script>
</body>
</html>

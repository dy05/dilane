<!DOCTYPE html>
<html lang="en">
<head>
    <title>pharmaceutical System Admin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../public/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../../public/css/calendar.css"/>
    <link rel="stylesheet" href="../../public/css/matrix-style.css"/>
    <link rel="stylesheet" href="../../public/css/matrix-media.css"/>
    <link href="../../public/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../../public/css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<form role="form" action="index.php" method="POST">
    <?php

    if (isset($_POST['name'])) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $username = $_POST["Username"];
        $role = $_POST["role"];
        $gender = $_POST["gender"];
        $profession = $_POST["profession"];
        $password = $_POST["password"];

        $username = md5($username);

        include 'dbcon.php';
//code after connection is success
        $qry = "insert into members(name,phone,Username,dor,role,gender,amount,profession,password,status) values ('$name','$phone','$username', CURRENT_TIMESTAMP,'$role','$gender','0','','$profession','$password','Pending')";
        $result = mysqli_query($con, $qry); //query executes

        if (!$result) {
            echo "<div class='container-fluid'>";
            echo "<div class='row-fluid'>";
            echo "<div class='span12'>";
            echo "<div class='widget-box'>";
            echo "<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
            echo "<h5>Error Message</h5>";
            echo "</div>";
            echo "<div class='widget-content'>";
            echo "<div class='error_ex'>";
            echo "<h1 style='color:maroon;'>Error 404</h1>";
            echo "<h3>Error occured while entering your details</h3>";
            echo "<p>Please Try Again</p>";
            echo "<a class='btn btn-warning btn-big'  href='../pages/index.php'>Go Back</a> </div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {

            echo "<div class='container-fluid'>";
            echo "<div class='row-fluid'>";
            echo "<div class='span12'>";
            echo "<div class='widget-box'>";
            echo "<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
            echo "<h5>Message</h5>";
            echo "</div>";
            echo "<div class='widget-content'>";
            echo "<div class='error_ex'>";
            echo "<h1>Success</h1>";
            echo "<h3>Member details has been added!</h3>";
            echo "<p>The requested details are added. Please wait for the verification.</p>";
            echo "<a class='btn btn-inverse btn-big'  href='./index.php'>Go Back</a> </div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

        }

    } else {
        echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='./index.php'> DASHBOARD </a></h3>";
    }


    ?>


</form>
</body>

<!--end-Footer-part-->

<script src="../../public/js/excanvas.min.js"></script>
<script src="../../public/js/jquery.min.js"></script>
<script src="../../public/js/jquery.ui.custom.js"></script>
<script src="../../public/js/bootstrap.min.js"></script>
<script src="../../public/js/jquery.flot.min.js"></script>
<script src="../../public/js/jquery.flot.resize.min.js"></script>
<script src="../../public/js/jquery.peity.min.js"></script>
<script src="../../public/js/calendar.min.js"></script>
<script src="../../public/js/matrix.js"></script>
<script src="../../public/js/matrix.dashboard.js"></script>
<script src="../../public/js/jquery.gritter.min.js"></script>
<script src="../../public/js/matrix.interface.js"></script>
<script src="../../public/js/matrix.chat.js"></script>
<script src="../../public/js/jquery.validate.js"></script>
<script src="../../public/js/matrix.form_validation.js"></script>
<script src="../../public/js/jquery.wizard.js"></script>
<script src="../../public/js/jquery.uniform.js"></script>
<script src="../../public/js/select2.min.js"></script>
<script src="../../public/js/matrix.popover.js"></script>
<script src="../../public/js/jquery.dataTables.min.js"></script>
<script src="../../public/js/matrix.tables.js"></script>
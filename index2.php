<?php
session_start();
include('dbcon.php');
if ($con===false)
  {
  die("connection error");
  }

  if (isset($_POST['login'])){
    $name = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $sql = "select * from user where Username = '$name' and password= '$password'";
    $result = mysqli_query($con,$sql); 

    $row = mysqli_fetch_array($result);

    if ($row ['usertype']== "Admin"){
        $_SESSION['Username'] = $name;
        $_SESSION['usertype'] = 'Admin';
        header ("location:admin/dashboard/index.php");

    }

    else {
        $message= "Invalid Input";
        $_SESSION['logmessage'] =$message;
        header ("location:index2.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
   
<head>
        <title>Pharmaceutical ms</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-style.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/fontawesome.css" rel="stylesheet" />
        <link href="font-awesome/css/all.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" type="image/x-icon" href="assets2/img/favicon.ico">

    </head>
    
    <body style=" background-image: url(assets2/img/gallery/gallery3.jpg);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
    
        <div id="loginbox">            
            <form id="loginform" method="POST" class="form-vertical" action="#">
            <div class="control-group normal_text"> <h3>Admin Login</h3></div>
            <div style="color: white;">
               <?php
            error_reporting(0);
            session_start();
            session_destroy();
            echo $_SESSION['logmessage'];
            ?> 
            </div>
            
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="fas fa-user-circle"></i></span><input type="text" name="user" placeholder="Username" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="fas fa-lock"></i></span><input type="password" name="pass" placeholder="Password" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions center">
                                        <button type="submit" class="btn btn-block btn-large btn-info" title="Log In" name="login" value="Admin Login">Admin Login</button>
                </div>
            </form>
           
            <div class="pull-left">
            <a href="index.php"><h6>GO TO HOME PAGE</h6></a>
            </div>

            <div class="pull-right">
            <a href="staff/index.php"><h6>Staff Login</h6></a>
            </div>
            
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
    </body>

</html>

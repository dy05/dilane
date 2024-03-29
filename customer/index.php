<?php 
session_start();
// include('dbcon.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
        <title>pharmaceutical System Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-style.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" type="image/x-icon" href="assets2/img/favicon.ico">

    </head>
    
    <body style=" background-image: url(../assets2/img/gallery/gallery3.jpg);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
    
    <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="#">
				 <div class="control-group normal_text"> <h3>Customer Login</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="user" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pass" placeholder="password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Register here</a></span>
                    <span class="pull-right"><button type="submit" name="login" class="btn btn-success">Login Now</button></span>
                </div>
                
                <div class="g">
                <a href="../index.php"><h6>GO TO HOME PAGE</h6></a>
                </div>
                
                <?php
                if (isset($_POST['login']))
                    {
                        $Phone_N° = mysqli_real_escape_string($con, $_POST['user']);
                        $Username = mysqli_real_escape_string($con, $_POST['pass']);

                        $Username = md5($Username);
                        
                        $query 		= mysqli_query($con, "SELECT * FROM members WHERE  Username='$Username' and Phone_N°='$Phone_N°' and status='Active'");
                        $row		= mysqli_fetch_array($query);
                        $num_row 	= mysqli_num_rows($query);
                        
                        if ($num_row > 0) 
                            {			
                                $_SESSION['user_id']=$row['user_id'];
                                header('location:pages/index.php');
                                
                            }
                        else
                            {
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                Invalid Phone_N°/Username or Account has been Expired!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>";
                            }
                    }
            ?>
            </form>
            <form id="recoverform" action="../customer/pages/register-cust.php" method="POST" class="form-vertical">
				<p class="normal_text">Enter your details below</p>
			

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-pencil"></i></span><input type="text" name="name" placeholder="name" />
                        </div>
                    </div>

                    <br>

                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lo"><i class="icon-leaf"></i></span><input type="number" name="Phone_N°" placeholder="+237 658183169" />
                            </div>
                        </div>

                    <br>

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="Username" name="Username" placeholder="Username" />
                        </div>
                    </div>

                <br>

                       <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lo"><i class="icon-leaf"></i></span><input type="usertype" name="usertype" placeholder="usertype" />
                            </div>
                        </div>

                    <br>

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="password" name="pass" placeholder="password" />
                        </div>
                    </div>

                        <br>

                        <div class="controls">
                            <div class="main_input_box">
                                <select name="gender" required="required" id="select">
                                    <option value="Male" selected="selected">Male</option>
                                    <option value="Female">Female</option>
                                    
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="controls">
                            <div class="main_input_box">
                            <select name="plan" required="required" id="select">
                            <option selected="true" disabled="disabled">Profession</option>
                                <option value="1" >Pharmacist</option>
                                <option value="3">Medical Doctor</option>
                                <option value="6">Medical Delegate</option>
                                <option value="12">Hospital</option>
                            </select>
                            </div>
                        </div>

                        <br>

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
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><button class="btn btn-info" type="SUBMIT">Submit Details</button></span>
                </div>

                
            </form>
        </div>           
            
            
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
    </body>

</html>

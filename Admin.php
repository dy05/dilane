<?php
include('dbcon.php');
if ($con===false)
  {
  die("connection error");
  }

  if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $sql = 'select * from admin where Username = "'.$name'" and password= "'.$password'"';
    $result = mysqli_query($con,$sql); 

    $row = mysqli_fetch_array($result);

    if ($row ['role']== "Admin"){
        $_SESSION['Username'] = $name;
        $_SESSION['role'] = 'Admin';
        header ("location:../admin/index.php");

    }

    else {
        $message= "Invalid Input";
        $_SESSION['Seplong'] =$message;
        header ("location:../login.php");
    }
  }
?>
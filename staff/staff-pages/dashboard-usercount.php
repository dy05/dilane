<?php

$servername="localhost";
$uname="root";
$pass="";
$db="pharmaceutical";

$conn=mysqli_connect($servername,$uname,$pass,$db);

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM members";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>
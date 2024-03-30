<?php
//session_start();
//$host = 'localhost';
//$db_user = 'root';
//$db_password = '';
//$db_name = 'pharmaceutical';
//$con = mysqli_connect($host, $db_user, $db_password, $db_name);

/*
try {
    $password = "'1' OR 1=1";
    $password = mysqli_real_escape_string($con, $password);
    $sql = "SELECT * FROM user WHERE username = 'admin' AND password = " . $password;
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            print_r($row);
            echo "<br/>";
        }
    } else {
        echo "0 results";
    }
} catch (Exception $exc) {
    $errors = ['Unexpected error.'];
}
*/

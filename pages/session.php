<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user']) || (trim($_SESSION['user']->id) == '')) {
    header("location: login.php");
} else {
    $session_id = $_SESSION['user']->id;
}
?>
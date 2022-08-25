<?php
// Starting session
session_start();
// Accessing session data
$username= $_SESSION["username"];

 unset($_SESSION['username']);
   header("location:index.php");
?>
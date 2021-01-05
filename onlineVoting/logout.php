<?php

session_start();
unset($_SESSION['user_email']);
unset($_SESSION['user_name']);
unset($_SESSION['userid']);
session_destroy();
echo "<script>alert('You have successfully logged out.')</script>";
header("location:home.php");

?>

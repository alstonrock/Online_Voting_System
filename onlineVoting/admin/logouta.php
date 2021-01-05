<?php
session_start();
unset($_SESSION['admin_email']);
unset($_SESSION['admin_name']);
session_destroy();
header("location:logina.php");
?>
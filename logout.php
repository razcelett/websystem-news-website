<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['isAdmin']);
header("Location:login.php");
?>

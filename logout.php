<?php
session_start();
unset($_SESSION['user_info']);
unset($_SESSION['products']);
unset($_SESSION['user_total']);
header('location:listing.php');
?>

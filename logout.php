<?php 
session_start();

unset($_SESSION['user_id']);

session_destroy();
session_unset();

header("Location: login.php");

?>
<?php 
session_start();

unset($_SESSION['admin_id']);

session_destroy();
session_unset();

header("Location: login.php");

?>
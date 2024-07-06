<?php 
session_start();
$db = mysqli_connect("localhost", "root", "", "pj_group");




include("functions.php");

$pageName = basename($_SERVER['PHP_SELF']);


?>
<?php 
session_start();
$db = mysqli_connect("localhost", "root", "", "pj_group");




include("functions.php");

$pageName = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['admin_id'])) {
    redirect("login");
} else {
    redirect("users");
     // Ensure script stops executing after redirection
}

?>
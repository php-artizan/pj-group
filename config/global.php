<?php 
session_start();
include("init.php");
include("config/functions.php");
// check_user_session();
require "classes/CustomOperations.php";
require("classes/ads.php");
require("classes/User.php");

$pageName = basename($_SERVER['PHP_SELF']);
$pageName  = explode(".", $pageName)[0];



?>
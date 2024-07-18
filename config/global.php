<?php 
session_start();
include("init.php");
include("config/functions.php");
// check_user_session();
require "classes/CustomOperations.php";
require("classes/ads.php");
require("classes/Amenties.php");
require("classes/User.php");

$pageName = basename($_SERVER['PHP_SELF']);
$pageName  = explode(".", $pageName)[0];
$user_name = '';

if(is_user_logged_in()){
    $user = User::find($_SESSION['user_id']);
    // dd($user);
    $user_name = $user ? $user['name'] : false;
}

$properties = Ad::get_active_properties();
dd($properties);
// dd(Ad::get_ad_meta(3, "zip_code"));

?>
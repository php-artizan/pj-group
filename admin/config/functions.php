<?php 
include("../config/functions.php");

function is_admin_logged_in(){
    if (!isset($_SESSION['admin_id'])) {
       return false;
    } else {
        return false;
        
    }
}
function check_admin_session(){
    if (!isset($_SESSION['admin_id'])) {
        redirect("login");
    } 
}




?>
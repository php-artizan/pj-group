<?php 

function dd($array){

    echo "<pre style='background: #000; color: #fff'>";
    print_r($array);
    echo "</pre>";
    die;
}


function redirect($route){
    $pageName = basename($_SERVER['PHP_SELF']);
    if($pageName != "$route.php"){
        header("Location: $route.php");

    }
}

function is_admin_logged_in(){
    if (!isset($_SESSION['admin_id'])) {
        redirect("login");
    } else {
        redirect("index");
        
    }
}

?>
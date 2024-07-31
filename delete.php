<?php
require "config/global.php";

if (isset($_POST['id']) && isset($_SESSION['user_id'])) {
    $ad_id = intval($_POST['id']);
    echo $ad_id ;
    $user_id = intval($_SESSION['user_id']);
echo$user_id ;
    if (Ad::delete_ad($ad_id, $user_id)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo "Invalid Request";
}
?>

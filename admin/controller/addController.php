<?php
include_once('../../config/functions.php');

session_start();
$uploadDir = __DIR__ . '/../../uploads/icons';

// ADD Category
if(isset($_POST['submitAddCategoryBtn'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'image'=> $_POST['image'],
        'status'=> $_POST['status'],
    ];

    if(!empty($_FILES['image']) && !empty($_FILES['image']['name'])){
        $filesInfo = uploadSingleFile($uploadDir, 'image');
        $dataAds['image'] = $filesInfo;
    }

    $insertAndGetID = insertRowAndGetID('categories',$dataAds);
    $_SESSION['success_msg'] ="New Category Added Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}


// Add Location
if(isset($_POST['submitAddLocationBtn'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'image'=> $_POST['image'],
        'status'=> $_POST['status'],
    ];

    if(!empty($_FILES['image']) && !empty($_FILES['image']['name'])){
        $filesInfo = uploadSingleFile($uploadDir, 'image');
        $dataAds['image'] = $filesInfo;
    }

    $insertAndGetID = insertRowAndGetID('location',$dataAds);
    $_SESSION['success_msg'] ="New Location Added Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}

// For Edit 
if(isset($_POST['getEditField'])){

    if($_POST['getEditField'] ==5){
        $allData = selectAllData('category',['id' => $_POST['id']]);
    }elseif ($_POST['getEditField'] ==6){
        $allData = selectAllData('ad_location',['id' => $_POST['id']]);

    }
    
    echo json_encode($allData);

}

// Category Update 
if(isset($_POST['AdCategoryUpdate'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'image'=> $_POST['image'],
        'status'=> $_POST['status'],
    ];

    if(!empty($_FILES['image']) && !empty($_FILES['image']['name'])){
        $filesInfo = uploadSingleFile($uploadDir, 'image');
        $dataAds['image'] = $filesInfo;
    }

    $where = ['id' => $_POST['id']];
    $insertAndGetID = updateRow('category',$dataAds,$where);
    $_SESSION['success_msg'] ="Category Updated Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);
}


// Location Update 
if(isset($_POST['AdLocationUpdate'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'image'=> $_POST['image'],
        'status'=> $_POST['status'],
    ];

    if(!empty($_FILES['image']) && !empty($_FILES['image']['name'])){
        $filesInfo = uploadSingleFile($uploadDir, 'image');
        $dataAds['image'] = $filesInfo;
    }

    $where = ['id' => $_POST['id']];
    $insertAndGetID = updateRow('ad_location',$dataAds,$where);
    $_SESSION['success_msg'] ="Location Updated Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);
}


// Delete Category
if(isset($_GET['id'])){
    deleteRow('categories',['id' => $_GET['id']]);
    $_SESSION['success_msg'] ="Category Deleted Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}


// Delete Location
if(isset($_GET['id'])){
    deleteRow('location',['id' => $_GET['id']]);
    $_SESSION['success_msg'] ="Location Deleted Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}

if (isset($_GET['del_img'])) {
    $id = $_GET['ad_image_id'];

    deleteRow('ads_images',['id' => $id]);
    $_SESSION['success_msg'] ="Image Deleted Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);
}


?>
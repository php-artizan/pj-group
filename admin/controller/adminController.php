
<?php
include_once('../../config/functions.php');

session_start();
$uploadDir = __DIR__ . '/../../uploads/icons';
$uploadDirProfile = __DIR__ . '/../../uploads/profile';

//dd($_SERVER['HTTP_REFERER']);
if(isset($_POST['submitAmnGrpBtn'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'description'=> $_POST['description'],
        'slug'=> $_POST['slug'],
    ];

    if(!empty($_FILES['icon']) && !empty($_FILES['icon']['name'])){
        $filesInfo = uploadSingleFile($uploadDir, 'icon');
        $dataAds['icon'] = $filesInfo;
    }

    $insertAndGetID = insertRowAndGetID('amenties_groups',$dataAds);
    $_SESSION['success_msg'] ="New Amenities Group Added Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);


}

// ADD Type
if(isset($_POST['submitAtypeGrpBtn'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'descr'=> $_POST['descr'],
        'slug'=> $_POST['slug'],
    ];

    if(!empty($_FILES['icon']) && !empty($_FILES['icon']['name'])){
        $filesInfo = uploadSingleFile($uploadDir, 'icon');
        $dataAds['icon'] = $filesInfo;
    }

    $insertAndGetID = insertRowAndGetID('ads_types',$dataAds);
    $_SESSION['success_msg'] ="New Ads Type Added Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}



if(isset($_POST['getEditField'])){

    if($_POST['getEditField'] ==1){
        $allData = selectAllData('amenties_groups',['id' => $_POST['id']]);

    }elseif ($_POST['getEditField'] ==2){
        $allData = selectAllData('amenties',['id' => $_POST['id']]);

        $group_slug_id = selectAllData('amenties_groups',['slug' => $allData[0]['group_slug']]);

        $allData[0]['group_slug_id'] = $group_slug_id[0]['id'];
    
    }elseif ($_POST['getEditField'] ==3){
        $allData = selectAllData('ads_types',['id' => $_POST['id']]);

    }elseif ($_POST['getEditField'] ==4){
        $allData = selectAllData('users',['id' => $_POST['id']]);

    }elseif ($_POST['getEditField'] ==7){
        $allData = selectAllData('admins',['id' => $_POST['id']]);

    }

    echo json_encode($allData);

}

if(isset($_POST['submitAmnGrpBtnUpdate'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'description'=> $_POST['description'],
        'slug'=> $_POST['slug'],
    ];

    if(!empty($_FILES['icon']) && !empty($_FILES['icon']['name'])){
        $filesInfo = uploadSingleFile($uploadDir, 'icon');
        $dataAds['icon'] = $filesInfo;
    }

    $where = ['id' => $_POST['id']];
    $insertAndGetID = updateRow('amenties_groups',$dataAds,$where);
    $_SESSION['success_msg'] ="Amenities Group Updated Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);
}

if(isset($_POST['submitAdTypeBtnUpdate'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'descr'=> $_POST['descr'],
        'slug'=> $_POST['slug'],
    ];

    $where = ['id' => $_POST['id']];
    $insertAndGetID = updateRow('ads_types',$dataAds,$where);
    $_SESSION['success_msg'] ="Ads Type Updated Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);
}

if(isset($_GET['ad_update_status'])){
    $dataAds = [
        'status'=> $_GET['ad_update_status'],
    ];

    $where = ['id' => $_GET['dsfsfsgsfid']];
    $insertAndGetID = updateRow('ads',$dataAds,$where);
    $_SESSION['success_msg'] ="Status Updated Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);
}



if(isset($_GET['del_id'])){

    if($_GET['del_type'] =="grp_amnt"){
        deleteRow('amenties_groups',['id' => $_GET['del_id']]);
        $_SESSION['success_msg'] ="Amenities Group Deleted Successfully";

        }elseif ($_GET['del_type'] =="single_amnt"){
        deleteRow('amenties',['id' => $_GET['del_id']]);
        $_SESSION['success_msg'] ="Amenity Deleted Successfully";

    }
    redirectBack($_SERVER['HTTP_REFERER']);

}

// Delete Ads Type
if(isset($_GET['del_type'])){

    deleteRow('ads_types',['id' => $_GET['id']]);
    $_SESSION['success_msg'] ="Ads Type Deleted Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}


if(isset($_POST['submitAmnBtn'])){

//    dd($_POST);
    $dataAds = [
        'name'=> $_POST['name'],
        'description'=> $_POST['description'],
        'slug'=> $_POST['slug'],
        'group_slug'=> $_POST['group_slug'],
    ];

    if(!empty($_FILES['icon']) && !empty($_FILES['icon']['name'])){
        $filesInfo = uploadSingleFile($uploadDir, 'icon');
        $dataAds['icon'] = $filesInfo;
    }
    $insertAndGetID = insertRowAndGetID('amenties',$dataAds);

    $_SESSION['success_msg'] ="New Amenity Added Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);


}

if(isset($_POST['submitAmnBtnUpdate'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'description'=> $_POST['description'],
        'slug'=> $_POST['slug'],
        'group_slug'=> $_POST['group_slug'],
    ];


    if(!empty($_FILES['icon']) && !empty($_FILES['icon']['name'])){
        $filesInfo = uploadSingleFile($uploadDir, 'icon');
        $dataAds['icon'] = $filesInfo;
    }

//    dd($dataAds);
    $where = ['id' => $_POST['id']];
    $insertAndGetID = updateRow('amenties',$dataAds,$where);

    $_SESSION['success_msg'] ="Amenity Updated Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}



// ADD User
if(isset($_POST['submitUser'])){
    $dataAds = [
        'name'=> $_POST['name'],
        'email'=> $_POST['email'],
        'pass'=> $_POST['pass'],
        'status'=> $_POST['status'],
    ];

    if(!empty($_FILES['user_image']) && !empty($_FILES['user_image']['name'])){
        $filesInfo = uploadSingleFile($uploadDirProfile,'user_image','profile/');
        $dataAds['user_image'] = $filesInfo;

    }
    // echo
    // print_r($dataAds);
    // die();
    $insertAndGetID = insertRowAndGetID('users',$dataAds);
    $_SESSION['success_msg'] ="New User Added Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}

// ADD Admin
if(isset($_POST['submitAdmin'])){
    $dataAds = [
        'name'=> $_POST['name'],
        'email'=> $_POST['email'],
        'pass'=> $_POST['pass'],
    ];

    if(!empty($_FILES['admin_image']) && !empty($_FILES['admin_image']['name'])){
        $filesInfo = uploadSingleFile($uploadDirProfile,'admin_image','profile/');
        $dataAds['admin_image'] = $filesInfo;

    }
    
    $insertAndGetID = insertRowAndGetID('admins',$dataAds);
    $_SESSION['success_msg'] ="New Admin Added Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}

// Update User
if(isset($_POST['updateUser'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'email'=> $_POST['email'],
        'pass'=> $_POST['pass'],
        'status'=> $_POST['status'],
    ];

    if(!empty($_FILES['user_image']) && !empty($_FILES['user_image']['name'])){
        $filesInfo = uploadSingleFile($uploadDirProfile,'user_image','profile/');
        $dataAds['user_image'] = $filesInfo;

    }

    $where = ['id' => $_POST['id']];
    $insertAndGetID = updateRow('users',$dataAds,$where);
    $_SESSION['success_msg'] ="User Updated Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);
}

// Update Admin
if(isset($_POST['updateadmin'])){

    $dataAds = [
        'name'=> $_POST['name'],
        'email'=> $_POST['email'],
        'pass'=> $_POST['pass'],
    ];

    if(!empty($_FILES['admin_image']) && !empty($_FILES['admin_image']['name'])){
        $filesInfo = uploadSingleFile($uploadDirProfile,'admin_image','profile/');
        $dataAds['admin_image'] = $filesInfo;

    }

    $where = ['id' => $_POST['id']];
    $insertAndGetID = updateRow('admins',$dataAds,$where);
    $_SESSION['success_msg'] ="Admin Updated Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);
}

// Delete User
if(isset($_GET['del_user'])){

    deleteRow('users',['id' => $_GET['id']]);
    $_SESSION['success_msg'] ="User Deleted Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}

// Delete Admin
if(isset($_GET['del_admin'])){

    deleteRow('admins',['id' => $_GET['id']]);
    $_SESSION['success_msg'] ="Admin Deleted Successfully";
    redirectBack($_SERVER['HTTP_REFERER']);

}

?>
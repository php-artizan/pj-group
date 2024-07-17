
<?php
include_once('../../config/functions.php');

session_start();
$uploadDir = __DIR__ . '/../../uploads/icons';

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
if(isset($_POST['getEditField'])){


    if($_POST['getEditField'] ==1){
        $allData = selectAllData('amenties_groups',['id' => $_POST['id']]);

    }elseif ($_POST['getEditField'] ==2){
        $allData = selectAllData('amenties',['id' => $_POST['id']]);

        $group_slug_id = selectAllData('amenties_groups',['slug' => $allData[0]['group_slug']]);

        $allData[0]['group_slug_id'] = $group_slug_id[0]['id'];
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
?>
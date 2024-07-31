
<?php
include_once('../../config/functions.php');

$currentUrl = getCurrentUri();


if(isset($_POST['updateBtn'])){

    $currentUrl = getCurrentUri();
    $adminRoot  = getAdminRoot($currentUrl);



    $dataAds = [
        'title'=> $_POST['title'],
        'description'=> trim($_POST['description']),
        'price'=> $_POST['price'],
        'public_status'=> $_POST['public_status'], 
        'status'=> $_POST['status'],
        'ad_type_id'=> 1,
    ];

    // echo "<pre>";
    // print_r($dataAds);
    // die();
    $where = ['id' => $_POST['ad_id']];
    updateRow('ads',$dataAds,$where);

    if(!empty($_POST['amenity_id'])){
        $where = ['ad_id' => $_POST['ad_id']];
        deleteRow('ad_amenties',$where);
        $dataAmenities = transformArrayAmenity($_POST['amenity_id'], $_POST['ad_id']);
        insertRowsIntoDatabase('ad_amenties',$dataAmenities);
    }


    $arrayMeta = [
        'property_type'=> $_POST['property_type'],
        'area'=>  $_POST['area'],
        'bedrooms'=> $_POST['bedrooms'],
        'bathrooms'=> $_POST['bathrooms'],
        'address'=> $_POST['address'],
        'city'=> $_POST['city'],
        'state'=> $_POST['state'],
        'zip_code'=> $_POST['zip_code'],
        'billing_age'=> $_POST['billing_age'],
        'garage'=> $_POST['garage'],
        'rooms'=> $_POST['rooms'],
        'contact_name'=> $_POST['contact_name'],
        'email'=> $_POST['email'],
        'phone'=> $_POST['phone'],
    ];
           
    
        $where = ['ad_id' => $_POST['ad_id']];
        deleteRow('ads_meta',$where);    
        $dataMeta = transformArrayMetaKey($arrayMeta,$_POST['ad_id']);
        insertRowsIntoDatabase('ads_meta',$dataMeta);

    
        if(!empty($_FILES['images']) && !empty($_FILES['images']['name'][0])){

           $Mainroot = getUrlBeforeAdmin($currentUrl);
            $filesInfo = uploadMultipleFiles($_FILES['images'],"uploads/images/ads/",$_POST['ad_id'],"../../");
            insertRowsIntoDatabase('ads_images',$filesInfo);
        }

        $_SESSION['success_msg'] = "";
        $_SESSION['success_msg'] ="Ad Updated Successfully";
        redirectBack($adminRoot.$_POST['back_url']);


}else{
    dd("Unauthorized");
}






?>
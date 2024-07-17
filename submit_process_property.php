
<?php
include_once('../config/functions.php');




if(isset($_POST['submitBtn'])){

    $dataAds = [
        'title'=> $_POST['title'],
        'description'=> $_POST['description'],
        'price'=> $_POST['price'],
        'public_status'=> $_POST['public_status'], 
        'status'=> 1,
        'ad_type_id'=> 1,
    ];
    $insertAndGetID = insertRowAndGetID('ads',$dataAds);

    if(!empty($_POST['amenity_id'])){
        $dataAmenities = transformArrayAmenity($_POST['amenity_id'],$insertAndGetID);
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
    ];
           
        $dataMeta = transformArrayMetaKey($arrayMeta,$insertAndGetID);
        insertRowsIntoDatabase('ads_meta',$dataMeta);

        if(!empty($_FILES['images']) && !empty($_FILES['images']['name'][0])){
            $filesInfo = uploadMultipleFiles($_FILES['images'],"uploads/images/ads/",$insertAndGetID);
            insertRowsIntoDatabase('ads_images',$filesInfo);
        }


        redirect('submit-property');


}else{
    dd("Unauthorized");
}






?>
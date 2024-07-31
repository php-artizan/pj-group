<?php 
require "config/global.php";
$error = false;
$errorMessage = '';
$success = false;


?>


<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Ad Edit Page | </title>

    <?php
    include("includes/head.php");
    ?>



<style>
    .customDelBtn{
    color: white;
    margin-top: 10px;
    
}


.customDelBtn i{
    border: 1px solid rgb(177,62,62);
    border-radius: 5px;
    color: rgb(177,62,62);
    font-size: 17px;
    transition: ease all 0.4s;
    padding:3px;

}
.customDelBtn i:hover{
background: rgb(177,62,62);
   color: whitesmoke;
}
</style>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
    <!--begin::Theme mode setup on page load-->
    <script>
    var defaultThemeMode = "light";
    var themeMode;

    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }

        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <?php
            include("includes/sidebar.php");
            ?>

            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <?php
                include("includes/header.php");
                ?>

                <!--end::Header-->

                <!--begin::Content-->
                <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bold my-1 fs-2">
                                    View Ad</h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb fw-semibold fs-base my-1">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="<?=ADMIN_PATH?>" class="text-muted text-hover-primary">
                                            Home </a>
                                    </li>

                                    <li class="breadcrumb-item text-muted">

                                        <a href="javascript::void(0)" class="text-muted text-hover-primary">
                                            Ads Management </a>
                                    </li>

                                    <li class="breadcrumb-item text-dark">
                                        <a href="" class="text-dark text-hover-primary">
                                            Edit Ad
                                        </a>
                                    </li>

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Actions-->
                            <!-- <div class="d-flex align-items-center flex-nowrap text-nowrap py-1">
                                <a href="#" class="btn bg-body btn-color-gray-700 btn-active-primary me-4" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                                    Invite Friends
                                </a>

                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project" id="kt_toolbar_primary_button">
                                    New Project </a>
                            </div> -->
                            <!--end::Actions-->
                        </div>
                    </div>
                    <!--end::Toolbar-->
                    <?php 
//
//                    // Check for any errors that occurred
//                    $error = error_get_last();
//                    if ($error) {
//                        $errorMessage = $error['message'];
//                    }  ?>
                    <!---->
                    <!--                    --><?php //if($errorMessage) {?>
                    <!--                        <div class="alert alert-danger">-->
                    <!--                            --><?php //=$errorMessage; ?>
                    <!--                        </div>-->
                    <!--                    --><?php //} ?>
                    <?php if( $success || !empty($_SESSION['success_msg'])) {?>
                        <div class="alert alert-success">
                            <!-- <?php //=$message; ?> -->
                            <?=$_SESSION['success_msg']; ?>
                            <?php unset($_SESSION['success_msg']); ?>

                        </div>
                    <?php } ?>
                    <!--begin::Post-->
                    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div class=" container-xxl ">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card header-->


                                <!-- ================= FORM START ======================         -->

                                <form class="form p-8" action="controller/update_process_property.php" method="post"
                                    enctype="multipart/form-data">

                                    <input type="hidden" name="ad_id" value="<?php echo $_GET['id']?>">

                                    <?php
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        
                                        $getMain="SELECT * FROM ads WHERE id='$id'";
                                        $runMain = mysqli_query($db, $getMain);
                                        $rowMain = mysqli_fetch_array($runMain);
                                        $title = $rowMain['title'];
                                        $public_status = $rowMain['public_status'];
                                        $price = $rowMain['price'];
                                        $description = $rowMain['description'];
                                        $status = $rowMain['status'];
                                        if ($status==0) {
                                            $statusText ="rejected";
                                            $statusClass ="bg-danger";
                                        }elseif($status==1){
                                            $statusText ="pending";
                                            $statusClass ="bg-primary";
                                        }elseif($status==2){
                                            $statusText ="active";
                                            $statusClass ="bg-success";
                                        }
                                ?>

                                    <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $array = [];
                                    
                                            $getmeta="SELECT * from ads_meta WHERE ad_id='$id'";
                                            $run=mysqli_query($db, $getmeta);
                                            while ($row=mysqli_fetch_array($run)) {
                                            $array[$row['meta_key']] = $row['meta_value'];

                                            }
                                            // echo "<pre>";
                                            // print_r($array); 
                                        }       
                                    ?>

                                    <input type="hidden" name="back_url"
                                        value="ads-<?php echo isset($statusText) ? $statusText : 'active'; ?>.php">
                                    <input type="hidden" name="status" value="<?php echo $status?>">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control form-control-solid"
                                                value="<?php echo $title ?>" placeholder="Title" />
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Public Status</label>
                                            <select name="public_status" class="form-select form-select-solid"
                                                aria-label="Select example">
                                                <option value="rent"
                                                    <?php echo $public_status =="rent" ? "selected" : "" ?>>For Rent
                                                </option>
                                                <option value="sale"
                                                    <?php echo $public_status =="sale" ? "selected" : "" ?>>For Sale
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Property Type</label>
                                            <select name="property_type" class="form-select form-select-solid"
                                                aria-label="Select example">
                                                <option>Choose Property
                                                    Type</option>
                                                <option value="houses"
                                                    <?php echo (isset($array['property_type']) && $array['property_type'] == "houses") ? "selected" : ""; ?>>
                                                    Houses</option>
                                                <option value="appartment"
                                                    <?php echo (isset($array['property_type']) && $array['property_type'] == "appartment") ? "selected" : ""; ?>>
                                                    Apartment</option>
                                                <option value="villas"
                                                    <?php echo (isset($array['property_type']) && $array['property_type'] == "villas") ? "selected" : ""; ?>>
                                                    Villas</option>
                                                <option value="commercial"
                                                    <?php echo (isset($array['property_type']) && $array['property_type'] == "commercial") ? "selected" : ""; ?>>
                                                    Commercial</option>
                                                <option value="offices"
                                                    <?php echo (isset($array['property_type']) && $array['property_type'] == "offices") ? "selected" : ""; ?>>
                                                    Offices</option>
                                                <option value="garage"
                                                    <?php echo (isset($array['property_type']) && $array['property_type'] == "garage") ? "selected" : ""; ?>>
                                                    Garage</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Price</label>
                                            <input type="text" name="price" class="form-control form-control-solid"
                                                value="<?php echo $price ?>" placeholder="USD" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Ares</label>
                                            <input type="text" name="area" class="form-control form-control-solid"
                                                value="<?php echo (isset($array['area']) ? $array['area'] : '') ?>"
                                                placeholder="Title" />
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Bedrooms</label>
                                            <select id="bedrooms" name="bedrooms" class="form-select form-select-solid"
                                                aria-label="Select example">
                                                <option>Choose Bedrooms</option>
                                                <option value="1"
                                                    <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "1") ? "selected" : ""; ?>>
                                                    1</option>
                                                <option value="2"
                                                    <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "2") ? "selected" : ""; ?>>
                                                    2</option>
                                                <option value="3"
                                                    <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "3") ? "selected" : ""; ?>>
                                                    3</option>
                                                <option value="4"
                                                    <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "4") ? "selected" : ""; ?>>
                                                    4</option>
                                                <option value="5"
                                                    <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "5") ? "selected" : ""; ?>>
                                                    5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label class="form-label">Bathrooms</label>
                                        <select id="bathrooms" name="bathrooms" class="form-select form-select-solid"
                                            aria-label="Select example">
                                            <option value="1"
                                                <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "1") ? "selected" : ""; ?>>
                                                1</option>
                                            <option value="2"
                                                <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "2") ? "selected" : ""; ?>>
                                                2</option>
                                            <option value="3"
                                                <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "3") ? "selected" : ""; ?>>
                                                3</option>
                                            <option value="4"
                                                <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "4") ? "selected" : ""; ?>>
                                                4</option>
                                            <option value="5"
                                                <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "5") ? "selected" : ""; ?>>
                                                5</option>
                                        </select>
                                    </div>

                                    <?php
                                        if (isset($_GET['id'])) {
                                        $id = $_GET['id'];

                                        $get = "SELECT * FROM ads_images WHERE ad_id='$id'";
                                        $run = mysqli_query($db, $get);

                                        $images = [];
                                        while ($row = mysqli_fetch_array($run)) {
                                            $images[] = [
                                                'id' => $row['id'],
                                                'path' => $row['path']
                                            ];
                                        }
                                    ?>
                                    <div class="col">
                                        <label class="form-label">Upload Gallery</label>
                                        <input type="file" id="fileInput" name="images[]"
                                            class="form-control form-control-solid" multiple/>

                                        <div class="dz-default dz-message mt-3">
                                            <i class="fa-solid fa-images file-upload-icon"></i>
                                            <span>Ads Images</span>
                                            <div class="d-flex flex-row">
                                                <?php
                                                    if (!empty($images)) {
                                                        foreach ($images as $img) {
                                                            ?>
                                                            <div class="d-flex flex-column m-2 justify-content-center align-items-center" >
                                                                <img src="../<?php echo $img['path'] ?>" class="rounded-2" width="80" height="80">
                                                                   <a href="controller/addController.php?ad_image_id=<?php echo $img['id'] ?>&del_img=image" class="customDelBtn"> <i class="bi bi-trash-fill m-2 "></i></a>
                                                                </div>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                    <span style="color: red;">No Images Found!</span>
                                                    <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php } ?>


                                    <h3 class="m-2">Location</h3>

                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control form-control-solid"
                                                value="<?php echo (isset($array['address']) ? $array['address']  : '')?>"
                                                placeholder="Title" />
                                        </div>

                                        <div class="col">
                                            <label class="form-label">City</label>
                                            <input type="text" name="city" class="form-control form-control-solid"
                                                value="<?php echo (isset($array['city']) ? $array['city']  : '')?>"
                                                placeholder="Title" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">State</label>
                                            <input type="text" name="state" class="form-control form-control-solid"
                                                value="<?php echo (isset($array['state']) ? $array['state']  : '')?>"
                                                placeholder="Title" />
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Zip Code</label>
                                            <input type="text" name="zip_code" class="form-control form-control-solid"
                                                value="<?php echo (isset($array['zip_code']) ? $array['zip_code']  : '')?>"
                                                placeholder="Title" />
                                        </div>
                                    </div>
                                    <div class="mb-10 m-2">
                                        <h3 class="m-2">Detailed Information</h3>
                                        <div class="input-group input-group-solid">
                                            <span class="input-group-text">With textarea</span>
                                            <textarea name="description" class="form-control"
                                                aria-label="With textarea"><?php echo $description ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Building Age (optional)</label>
                                            <select id="bage" name="billing_age" class="form-select form-select-solid"
                                                aria-label="Select example">
                                                <option>&nbsp;</option>
                                                <option value="1"
                                                    <?php echo (isset($array['billing_age']) && $array['billing_age'] == "1") ? "selected" : ""; ?>>
                                                    0 - 5 Years</option>
                                                <option value="2"
                                                    <?php echo (isset($array['billing_age']) && $array['billing_age'] == "2") ? "selected" : ""; ?>>
                                                    0 - 10Years</option>
                                                <option value="3"
                                                    <?php echo (isset($array['billing_age']) && $array['billing_age'] == "3") ? "selected" : ""; ?>>
                                                    0 - 15 Years</option>
                                                <option value="4"
                                                    <?php echo (isset($array['billing_age']) && $array['billing_age'] == "4") ? "selected" : ""; ?>>
                                                    0 - 20 Years</option>
                                                <option value="5"
                                                    <?php echo (isset($array['billing_age']) && $array['billing_age'] == "5") ? "selected" : ""; ?>>
                                                    20+ Years</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Garage (optional)</label>
                                            <select id="garage" name="garage" class="form-select form-select-solid"
                                                aria-label="Select example">
                                                <option>&nbsp;</option>
                                                <option value="1"
                                                    <?php echo (isset($array['garage']) && $array['garage'] == "1") ? "selected" : ""; ?>>
                                                    1</option>
                                                <option value="2"
                                                    <?php echo (isset($array['garage']) && $array['garage'] == "2") ? "selected" : ""; ?>>
                                                    2</option>
                                                <option value="3"
                                                    <?php echo (isset($array['garage']) && $array['garage'] == "3") ? "selected" : ""; ?>>
                                                    3</option>
                                                <option value="4"
                                                    <?php echo (isset($array['garage']) && $array['garage'] == "4") ? "selected" : ""; ?>>
                                                    4</option>
                                                <option value="5"
                                                    <?php echo (isset($array['garage']) && $array['garage'] == "5") ? "selected" : ""; ?>>
                                                    5</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Rooms (optional)</label>
                                            <select id="rooms" name="rooms" class="form-select form-select-solid"
                                                aria-label="Select example">
                                                <option>&nbsp;</option>
                                                <option value="1"
                                                    <?php echo (isset($array['rooms']) && $array['rooms'] == "1") ? "selected" : ""; ?>>
                                                    1</option>
                                                <option value="2"
                                                    <?php echo (isset($array['rooms']) && $array['rooms'] == "2") ? "selected" : ""; ?>>
                                                    2</option>
                                                <option value="3"
                                                    <?php echo (isset($array['rooms']) && $array['rooms'] == "3") ? "selected" : ""; ?>>
                                                    3</option>
                                                <option value="4"
                                                    <?php echo (isset($array['rooms']) && $array['rooms'] == "4") ? "selected" : ""; ?>>
                                                    4</option>
                                                <option value="5"
                                                    <?php echo (isset($array['rooms']) && $array['rooms'] == "5") ? "selected" : ""; ?>>
                                                    5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php 
                                            $arrayAmenity =[];
                                                $ad_amenities = selectAllData('ad_amenties',['ad_id'=>$id]);
                                                foreach($ad_amenities as $key => $amenity){
                                                    $arrayAmenity[$key] = $amenity['amenty_id'];
                                                }

                                                $row = 1;
                                                $groups = selectAllData('amenties_groups');
                                                foreach($groups as $group){
                                            ?>
                                    <div class="form-group col-md-12 mt-3 mb-3">
                                        <label> <?php echo $group['name']; ?> </label>
                                        <div class="o-features">
                                            <ul class="no-ul-list third-row">
                                                <?php 
                                                            $num =1;
                                                            $amenities = selectAllData('amenties',['group_slug' => $group['slug']]); 
                                                            foreach($amenities as $amenity){
                                                        ?>
                                                <li>
                                                    <input id="a<?php echo $row; ?>-<?php echo $num; ?>"
                                                        class="form-check-input" name="amenity_id[]" type="checkbox"
                                                        <?php echo in_array($amenity['id'],$arrayAmenity) ? "checked" : "" ?>
                                                        value="<?php echo $amenity['id']; ?>">
                                                    <label for="a<?php echo $row; ?>-<?php echo $num; ?>"
                                                        class="form-check-label">
                                                        <?php echo $amenity['name']; ?></label>
                                                </li>
                                                <?php 
                                                            $num++;
                                                            };
                                                        ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php
                                                $row++;
                                                };
                                            ?>

                                    <div class="row">
                                        <h3 class="m-2">Contact Information</h3>
                                        <div class="col">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="contact_name"
                                                class="form-control form-control-solid"
                                                value="<?php echo (isset($array['contact_name']) ? $array['contact_name']  : '')?>"
                                                placeholder="Title" />
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control form-control-solid"
                                                value="<?php echo (isset($array['email']) ? $array['email']  : '')?>"
                                                placeholder="Title" />
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Phone (optional)</label>
                                            <input type="text" name="phone" class="form-control form-control-solid"
                                                value="<?php echo (isset($array['phone']) ? $array['phone']  : '')?>"
                                                placeholder="Title" />
                                        </div>
                                    </div>
                                    <div class="mb-10 m-2">
                                        <div class="form-check">
                                            <label class="form-label">GDPR Agreement *</label>
                                            <input class="form-check-input" type="checkbox" name="gdpr_agreement"
                                                type="checkbox" value="true" required id="aj-1" />
                                            <label class="form-check-label" for="aj-1">
                                                I consent to having this website
                                                store my
                                                submitted information
                                                so they can respond to my inquiry.
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-10 m-2">
                                        <button class="btn btn-bg-warning" name="updateBtn" type="submit">
                                            Update
                                        </button>
                                    </div>

                                    <?php } ?>
                                </form>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                <?php 
                include("includes/footer.php");
                ?>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <?php 
    include("includes/footer_scripts.php");
    ?>
    <!--end::Custom Javascript-->

    <!--end::Javascript-->

</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/craft/apps/user-management/users/list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2024 09:53:49 GMT -->

</html>
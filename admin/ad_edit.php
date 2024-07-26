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
    <title>Ad Detail Page | </title>

    <!-- Custom CSS -->
    <link href=".././assets/css/styles.css" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href=".././assets/css/colors.css" rel="stylesheet">

    <?php
    include("includes/head.php");
    ?>




</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <!-- ============================================================== -->
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
            <input type="hidden" id="document_root" value="<?php echo str_replace("\\admin", "", __DIR__);?>">
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
                <div class="content bg-light fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">

                                <!-- ============================= -->

                                <div class="row">
                                    <form action="controller/update_process_property.php" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="ad_id" value="<?php echo $_GET['id']?>" >
                                        <!-- Submit Form -->
                                        <div class="col-lg-12 col-md-12">
                                            <div class="submit-page">
                                                <!-- Basic Information -->
                                                <div class="form-submit">
                                                    <h3>Basic Information</h3>
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
                                                    <div class="submit-section">
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
                                                        <input type="hidden" name="back_url" value="ads-<?php echo isset($statusText) ? $statusText : 'active'; ?>.php">
                                                        <input type="hidden" name="status" value="<?php echo $status?>">

                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label>Property Title<span class="tip-topdata"
                                                                        data-tip="Property Title"><i
                                                                            class="fa-solid fa-info"></i></span></label>
                                                                <input type="text" class="form-control" name="title"
                                                                    value="<?php echo $title ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Status</label>
                                                                <select id="status" class="form-control"
                                                                    name="public_status" required>
                                                        
                                                                    <option value="rent" <?php echo $public_status =="rent" ? "selected" : "" ?> >For Rent</option>
                                                                    <option value="sale" <?php echo $public_status =="sale" ? "selected" : "" ?>>For Sale</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Property Type</label>
                                                                <select id="ptypes" class="form-control"
                                                                    name="property_type" required>
                                                                    
                                                                    <option value="" selected disabled>Choose Property
                                                                        Type
                                                                    </option>
                                                                    <option value="houses" <?php echo (isset($array['property_type']) && $array['property_type'] == "houses") ? "selected" : ""; ?>>Houses</option>
                                                                    <option value="appartment" <?php echo (isset($array['property_type']) && $array['property_type'] == "appartment") ? "selected" : ""; ?>>Apartment</option>
                                                                    <option value="villas" <?php echo (isset($array['property_type']) && $array['property_type'] == "villas") ? "selected" : ""; ?>>Villas</option>
                                                                    <option value="commercial" <?php echo (isset($array['property_type']) && $array['property_type'] == "commercial") ? "selected" : ""; ?>>Commercial</option>
                                                                    <option value="offices" <?php echo (isset($array['property_type']) && $array['property_type'] == "offices") ? "selected" : ""; ?>>Offices</option>
                                                                    <option value="garage" <?php echo (isset($array['property_type']) && $array['property_type'] == "garage") ? "selected" : ""; ?>>Garage</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Price</label>
                                                                <input type="text" name="price" class="form-control"
                                                                    placeholder="USD" value="<?php echo $price ?>"
                                                                    required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Area</label>
                                                                <input type="text" name="area" class="form-control"  
                                                                value="<?php echo (isset($array['area']) ? $array['area'] : '') ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Bedrooms</label>
                                                                <select id="bedrooms" name="bedrooms"
                                                                    class="form-control">
                                                                    <option value="" selected disabled>Choose Bedrooms
                                                                    </option>
                                                                    <option value="1" <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "1") ? "selected" : ""; ?>>1</option>
                                                                    <option value="2" <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "2") ? "selected" : ""; ?>>2</option>
                                                                    <option value="3" <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "3") ? "selected" : ""; ?>>3</option>
                                                                    <option value="4" <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "4") ? "selected" : ""; ?>>4</option>
                                                                    <option value="5" <?php echo (isset($array['bedrooms']) && $array['bedrooms'] == "5") ? "selected" : ""; ?>>5</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Bathrooms</label>
                                                                <select id="bathrooms" name="bathrooms"
                                                                    class="form-control">
                                                                    <option value="" selected disabled>Choose Bathrooms
                                                                    </option>
                                                                    <option value="1" <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "1") ? "selected" : ""; ?>>1</option>
                                                                    <option value="2" <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "2") ? "selected" : ""; ?>>2</option>
                                                                    <option value="3" <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "3") ? "selected" : ""; ?>>3</option>
                                                                    <option value="4" <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "4") ? "selected" : ""; ?>>4</option>
                                                                    <option value="5" <?php echo (isset($array['bathrooms']) && $array['bathrooms'] == "5") ? "selected" : ""; ?>>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Gallery -->
                                                <div class="form-submit">
                                                    <h3>Gallery</h3>
                                                    <div class="submit-section">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label>Upload Gallery</label>
                                                                <input type="file" id="fileInput" name="images[]"
                                                                    multiple>
                                                                <div class="dz-default dz-message">
                                                                    <i class="fa-solid fa-images file-upload-icon"></i>
                                                                    <span>Drag & Drop To Change Logo</span>
                                                                </div>
                                    </form>
                                </div>
                                <!-- Location -->
                                <div class="form-submit">
                                    <h3>Location</h3>
                                    <div class="submit-section">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" 
                                                value="<?php echo (isset($array['address']) ? $array['address']  : '')?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" 
                                                value="<?php echo (isset($array['city']) ? $array['city']  : '')?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>State</label>
                                                <input type="text" name="state" class="form-control" 
                                                value="<?php echo (isset($array['state']) ? $array['state']  : '')?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip_code" class="form-control" 
                                                value="<?php echo (isset($array['zip_code']) ? $array['zip_code']  : '')?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Detailed Information -->
                                <div class="form-submit">
                                    <h3>Detailed Information</h3>
                                    <div class="submit-section">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control h-120"><?php echo $description ?></textarea>
                                            </div>
                                            <div class="form-group col-md-4">billing_age
                                                <label>Building Age (optional)</label>
                                                <select id="bage" class="form-control" name="billing_age">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1" <?php echo (isset($array['billing_age']) && $array['billing_age'] == "1") ? "selected" : ""; ?>>0 - 5 Years</option>
                                                    <option value="2" <?php echo (isset($array['billing_age']) && $array['billing_age'] == "2") ? "selected" : ""; ?>>0 - 10Years</option>
                                                    <option value="3" <?php echo (isset($array['billing_age']) && $array['billing_age'] == "3") ? "selected" : ""; ?>>0 - 15 Years</option>
                                                    <option value="4" <?php echo (isset($array['billing_age']) && $array['billing_age'] == "4") ? "selected" : ""; ?>>0 - 20 Years</option>
                                                    <option value="5" <?php echo (isset($array['billing_age']) && $array['billing_age'] == "5") ? "selected" : ""; ?>>20+ Years</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Garage (optional)</label>
                                                <select id="garage" class="form-control" name="garage">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1" <?php echo (isset($array['garage']) && $array['garage'] == "1") ? "selected" : ""; ?>>1</option>
                                                    <option value="2" <?php echo (isset($array['garage']) && $array['garage'] == "2") ? "selected" : ""; ?>>2</option>
                                                    <option value="3" <?php echo (isset($array['garage']) && $array['garage'] == "3") ? "selected" : ""; ?>>3</option>
                                                    <option value="4" <?php echo (isset($array['garage']) && $array['garage'] == "4") ? "selected" : ""; ?>>4</option>
                                                    <option value="5" <?php echo (isset($array['garage']) && $array['garage'] == "5") ? "selected" : ""; ?>>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Rooms (optional)</label>
                                                <select id="rooms" class="form-control" name="rooms">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1" <?php echo (isset($array['rooms']) && $array['rooms'] == "1") ? "selected" : ""; ?>>1</option>
                                                    <option value="2" <?php echo (isset($array['rooms']) && $array['rooms'] == "2") ? "selected" : ""; ?>>2</option>
                                                    <option value="3" <?php echo (isset($array['rooms']) && $array['rooms'] == "3") ? "selected" : ""; ?>>3</option>
                                                    <option value="4" <?php echo (isset($array['rooms']) && $array['rooms'] == "4") ? "selected" : ""; ?>>4</option>
                                                    <option value="5" <?php echo (isset($array['rooms']) && $array['rooms'] == "5") ? "selected" : ""; ?>>5</option>
                                                </select>
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
                                            <div class="form-group col-md-12">
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
                                                                class="form-check-input" name="amenity_id[]"
                                                                type="checkbox" <?php echo in_array($amenity['id'],$arrayAmenity) ? "checked" : "" ?> value="<?php echo $amenity['id']; ?>">
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
                                        </div>
                                    </div>
                                </div>
                                <!-- Contact Information -->
                                <div class="form-submit">
                                    <h3>Contact Information</h3>
                                    <div class="submit-section">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Name</label>
                                                <input type="text" name="contact_name" class="form-control" 
                                                value="<?php echo (isset($array['contact_name']) ? $array['contact_name']  : '')?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" 
                                                value="<?php echo (isset($array['email']) ? $array['email']  : '')?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Phone (optional)</label>
                                                <input type="text" name="phone" class="form-control" 
                                                value="<?php echo (isset($array['phone']) ? $array['phone']  : '')?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12">
                                    <label>GDPR Agreement *</label>
                                    <ul class="no-ul-list">
                                        <li>
                                            <input id="aj-1" class="form-check-input" name="gdpr_agreement"
                                                type="checkbox" value="true" required>
                                            <label for="aj-1" class="form-check-label">I consent to having this website
                                                store my
                                                submitted information
                                                so they can respond to my inquiry.</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="btn btn-primary fw-medium px-5" name="updateBtn" type="submit">Update
                                        &
                                        Preview
                                    </button>

                                    <a href="ads-<?php echo isset($statusText) ? $statusText : 'active'; ?>.php" 
                                        class="btn btn-primary btn-sm" id="btn-back" role="button">
                                        Back
                                    </a>
                                </div>
                                <?php } ?>

                                <!-- ------------------------------------- -->
                            </div>
                            <!--end::Info-->
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


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script src=".././assets/js/jquery.min.js"></script>
    <script src=".././assets/js/select2.min.js"></script>

    <script src=".././assets/js/popper.min.js"></script>
    <script src=".././assets/js/bootstrap.min.js"></script>
    <script src=".././assets/js/rangeslider.js"></script>
    <script src=".././assets/js/jquery.magnific-popup.min.js"></script>
    <script src=".././assets/js/slick.js"></script>
    <script src=".././assets/js/slider-bg.js"></script>
    <script src=".././assets/js/lightbox.js"></script>
    <script src=".././assets/js/imagesloaded.js"></script>

    <script src=".././assets/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->


    <script src=".././assets/js/dropzone.js"></script>
    <!-- New Js --

</body>
<!--end::Body-->

    <!-- Mirrored from preview.keenthemes.com/craft/apps/user-management/users/list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2024 09:53:49 GMT -->

</html>
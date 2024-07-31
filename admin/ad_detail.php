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

    <link rel="stylesheet" href=".././assets/css/detail-page.css">

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
                <!--begin::Content-->
                <div class="content bg-light fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                                <!-- <a href="ads-<?php echo isset($statusText) ? $statusText : 'active'; ?>.php" 
                                        class="btn btn-primary btn-sm" id="btn-back" role="button">
                                        Back
                                    </a> -->
                                <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                                    <!--begin::Title-->
                                    <h1 class="text-dark fw-bold my-1 fs-2">
                                    View Ads</h1>
                                    
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
                                                View Ads
                                            </a>
                                        </li>

                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Info-->




                                <!-- content -->
                                <section class="py-5">
                                    <div class="container">
                                        <div class="row gx-5">
                                            <aside class="col-lg-6">
                                                <!-- <div class="border rounded-4 mb-3 d-flex justify-content-center">
                                                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp">
                                                        <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
                                                    </a>
                                                    </div> -->

                                                <?php
                                                    if (isset($_GET['id'])) {
                                                        $id = $_GET['id'];
                                                
                                                    $get="SELECT * from ads_images WHERE ad_id=$id";
                                                    $run=mysqli_query($db, $get);
                                                    while ($row=mysqli_fetch_array($run)) {
                                                
                                                ?>

                                                <div class="d-flex justify-content-center mb-3">
                                                    <?php 
                                                        if (!empty($row['path'])) {
                                                            echo '<img class="rounded-2" src=".././' . $row['path'] . '" width="140" height="140">';
                                                        }else{
                                                            echo '<img class="rounded-2" src=".././assets/propertyImages/default.png" width="140" height="140">';
                                                        }
                                                    ?>
                                                    <!-- <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" class="item-thumb">
                                                            <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" />
                                                        </a>
                                                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" class="item-thumb">
                                                            <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" />
                                                        </a>
                                                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" class="item-thumb">
                                                            <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" />
                                                        </a>
                                                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" class="item-thumb">
                                                            <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
                                                        </a> -->
                                                </div>

                                                <?php } } ?>
                                                <!-- thumbs-wrap.// -->
                                                <!-- gallery-wrap .end// -->
                                            </aside>
                                            <main class="col-lg-6 bg-secondary pt-4 pb-4 rounded-3">
                                                <div class="ps-lg-3">

                                                    <div class="mb-3">
                                                        <h2 class="text-dark">Title</h2>
                                                        <p>
                                                            <?php echo $title ?>
                                                        </p>
                                                    </div>

                                                    <div class="mb-3">
                                                        <strong class="text-dark">Public Status: </strong>
                                                        <span class="label text-light badge bg-success">
                                                            <?php echo $public_status ?>
                                                        </span>
                                                    </div>

                                                    <div class="mb-3">
                                                        <strong class="text-dark">Price:</strong>
                                                        $ <?php echo $price ?>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h2 class="text-dark">Description</h2>
                                                        <p>
                                                            <?php echo $description ?>
                                                        </p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <strong class="text-dark">Status:</strong>
                                                        <span class="h5">
                                                            <span
                                                                class="label text-light badge <?php echo $statusClass ?>"><?php echo ucwords($statusText) ?></span>
                                                        </span>
                                                    </div>

                                                    <?php }  ?>
                                                    <hr />

                                                    <h2 class="text-dark">Feature Details</h2>
                                                    <?php
                                                        if (isset($_GET['id'])) {
                                                            $id = $_GET['id'];
                                                    
                                                        $get="SELECT * from ads LEFT JOIN ads_meta 
                                                                ON ads.id=ads_meta.ad_id WHERE ads.id='$id'";
                                                        $run=mysqli_query($db, $get);
                                                        while ($row=mysqli_fetch_array($run)) {
                                                    ?>
                                                    <div class="row">
                                                        <dt class="col-5">
                                                            <i class="fas fa-check text-success me-2"></i>
                                                            <?php echo $row['meta_key'] ?>:
                                                        </dt>
                                                        <dd class="col-6"><?php echo $row['meta_value'] ?></dd>
                                                    </div>

                                                    <?php } } ?>
                                                    <hr />

                                                    <?php
                                                        if (isset($_GET['id'])) {
                                                            $id = $_GET['id'];
                                                    
                                                        $get="SELECT * from ads LEFT JOIN ad_amenties 
                                                            ON ads.id=ad_amenties.ad_id 
                                                            LEFT JOIN amenties ON amenties.id=ad_amenties.amenty_id
                                                            WHERE ads.id='$id'";
                                                        $run=mysqli_query($db, $get);
                                                        while ($row=mysqli_fetch_array($run)) {
                                                    ?>


                                                    <h2 class="text-dark">Ameneties</h2>
                                                    <div class="row mb-4">
                                                        <div class="col-12 col-md-6 text">
                                                            <ul class="list-unstyled mb-0">
                                                                <li><i class="fas fa-check text-success me-2"></i>
                                                                    <?php echo $row['slug'] ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <?php } } ?>

                                                </div>
                                            </main>
                                        </div>
                                    </div>
                                </section>
                                <!-- content -->





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



</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/craft/apps/user-management/users/list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2024 09:53:49 GMT -->

</html>
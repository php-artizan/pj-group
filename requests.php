<?php
require "config/global.php";

if (!isset($_GET['slug'])) {
    redirect(ROOT_PATH, '');
}
$slug = $_GET['slug'];
if ($slug == "") {
    redirect(ROOT_PATH, '');
}



$property = Ad::get_ad(
    array(
        "slug" => $slug
    )
);
if (!$property) {
    redirect(ROOT_PATH, '');
}

// dd($property);
$id = $property['id'];

$publisher = $property['publisher'];
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?= page_title($property['title']); ?></title>
    <?php
    include ("include/head.php");
    ?>
    <style>
        .avl-features li {
            padding-left: 0 !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avl-features li::before {
            display: none !important
        }

        .avl-features li img {
            width: 31px;
            background: #f0f0f0;
            padding: 5px;
            border-radius: 35%;
        }
    </style>
</head>

<body class="blue-skin">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <?php
        include ("include/header.php");
        ?>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
         <h2 class='text-center p-3'>Requests</h2>
        <?php
if ($id) {
   
    
    // Check if $db is a valid connection
    if (!$db) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to avoid SQL injection
    $stmt = $db->prepare("SELECT * FROM user_request WHERE ad_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                ?>
                
                <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['phone']) ?></h5>
                                <p class="card-subtitle mb-2 text-muted"><b><?= htmlspecialchars($row['email']) ?></b></p>
                                <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                            </div>
                        </div>
                <?php
            }
        } else {
            echo "No results found.";
        }
        
        $stmt->close();
    } else {
        echo "Failed to prepare statement: " . $db->error;
    }
}
?>

        <!-- ============================ Footer Start ================================== -->
        <?php include ("include/footer.php"); ?>
        <!-- ============================ Footer End ================================== -->





        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/rangeslider.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/slider-bg.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/imagesloaded.js"></script>

    <script src="assets/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->


</body>

<!-- Mirrored from shreethemes.net/resido-live/resido/single-property-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jun 2024 15:37:38 GMT -->

</html>
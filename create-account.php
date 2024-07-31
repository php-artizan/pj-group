<?php
require "config/global.php";

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $signup_as = htmlspecialchars(trim($_POST['signup_as']));
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);

    if (empty($full_name) || empty($email) || empty($username) || empty($password) || empty($phone) || empty($signup_as) || !$check) {
        $msg = "<div class='alert alert-danger'>All fields are required and image must be valid.</div>";
    } else {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "<div class='alert alert-danger'>Invalid email format.</div>";
        } else {

            $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $msg = "<div class='alert alert-danger'>User already exists.</div>";
            } else {
        
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($imageFileType, $allowed_types)) {
                    $msg = "<div class='alert alert-danger'>Only JPG, JPEG, PNG, and GIF files are allowed.</div>";
                } elseif (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
             
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                    $stmt = $db->prepare("INSERT INTO users (fname, name, phone, email, pass, status, created_at, updated_at, profile_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssssss", $full_name, $username, $phone, $email, $hashed_password, $signup_as, $created_at, $updated_at, $target_file);

                    if ($stmt->execute()) {
                        $msg = "<div class='alert alert-success'>Account created successfully.</div>";
                    } else {
                        $msg = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                    }
                } else {
                    $msg = "<div class='alert alert-danger'>Error uploading image.</div>";
                }
            }
            $stmt->close();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="zxx">
<head>
    <title><?=page_title("SignUp"); ?></title>
    <?php include("include/head.php"); ?>
</head>

<body class="blue-skin">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div> -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <?php include("include/header.php"); ?>

        
        <!-- ============================ Signup Form Start ================================== -->
        <section class="gray-simple">
            <div class="container">

                <!-- row Start -->
                <div class="row justify-content-center">
                    
                    <!-- Single blog Grid -->
                    <div class="col-xl-7 col-lg-8 col-md-9">
                        <div class="card border-0 rounded-4 p-xl-4 p-lg-4 p-md-4 p-3">
                            
                            <div class="simple-form">
                                <div class="form-header text-center mb-5">
                                    <div class="effco-logo mb-2">
                                        <a class="d-flex align-items-center justify-content-center" href="index.php">
                                            <span class="svg-icon text-primary svg-icon-2hx">
                                                <?php displaylogo(); ?>
                                            </span>
                                        </a>
                                    </div>
                                    <h4 class="fs-2">Create Account</h4>
                                </div>
                                <?= $msg ?>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="*******" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="tel" class="form-control" name="phone" placeholder="123 546 5847" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label>Signup As</label>
                                                <select class="form-control" name="signup_as" required>
                                                    <option value="Customer">As a Customer</option>
                                                    <option value="Agent">As an Agent</option>
                                                    <option value="Agency">As an Agency</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label>Profile Image</label>
                                                <input type="file" class="form-control" name="profile_image" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary full-width fw-medium">Create Account<i class="fa-solid fa-arrow-right-long ms-2"></i></button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="modal-divider" style="display: none;"><span>Or SignUp via</span></div>
                            <div class="social-login mb-3" style="display: none;">
                                <ul>
                                    <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                                    <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google+</a></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- /row -->                    
                
            </div>
                    
        </section>
        <!-- ============================ Signup Form End ================================== -->
        
        <!-- ============================ Call To Action ================================== -->
        <section class="theme-bg call-to-act-wrap" style="display:none;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="call-to-act">
                            <div class="call-to-act-head">
                                <h3>Want to Become a Real Estate Agent?</h3>
                                <span>We'll help you to grow your career and growth.</span>
                            </div>
                            <a href="#" class="btn btn-call-to-act">SignUp Today</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- ============================ Call To Action End ================================== -->
    
        <!-- ============================ Footer Start ================================== -->
        <?php include("include/footer.php"); ?>
        <!-- ============================ Footer End ================================== -->

        <!-- Log In Modal -->
        <?php include("include/loginmodal.php"); ?>
        <!-- End Modal -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

   

</body>
</html>

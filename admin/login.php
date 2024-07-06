<?php
require "config/global.php";
require "includes/footer_scripts.php";
require "includes/head.php";

$error = false;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debugging: Check if form data is received
    echo "Username: $username, Password: $password";

    $query = $db->query("SELECT * FROM admins WHERE email = '$username' AND pass = '$password' ");

    if (mysqli_num_rows($query) != 0) {
        $user = mysqli_fetch_assoc($query);
        $_SESSION['admin_id'] = $user['id'];

        if ($user) {

            $_SESSION['user_id'] = 1;
            redirect("users");
        }
       

    } else {
        $error = "Invalid credentials";
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ("includes/head.php"); ?>
</head>

<body>
    <div class="w-50 mx-auto mt-20">
        <form class="form w-40" method="POST" novalidate="novalidate" action="">
            <!-- <form class="form w-40" method="POST" novalidate="novalidate" id="kt_sign_in_form" action=""> -->
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3">
                    Login In PJ Group Admin
                </h1>
                <!--end::Title-->

                <!--begin::Link-->
                <div class="text-gray-400 fw-semibold fs-4">
                    New Here?
                    <a href="../sign-up/basic.html" class="link-primary fw-bold">
                        Create an Account
                    </a>
                </div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->

            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Email</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="text" name="username"
                    autocomplete="off" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack mb-2">
                    <!--begin::Label-->
                    <label class="form-label fw-bold text-dark fs-6 mb-0">Password</label>
                    <!--end::Label-->
                    <!--begin::Link-->
                    <a href="password-reset.html" class="link-primary fs-6 fw-bold">
                        Forgot Password ?
                    </a>
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                    autocomplete="off" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <?php
            if ($error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
            ?>
            <!--begin::Actions-->
            <div class="text-center">
                <input type="submit" name="login" value="Login" class="btn btn-lg btn-primary w-100 mb-5">
                <!-- Other action buttons omitted for brevity -->
            </div>
            <!--end::Actions-->
        </form>
    </div>

    <?php include ("includes/footer_scripts.php"); ?>
</body>

</html>
<?php
require "config/global.php";


$error = false;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debugging: Check if form data is received
    // echo "Username: $username, Password: $password";

    $query = $db->query("SELECT * FROM users WHERE email = '$username' AND pass = '$password' ");

    

    if (mysqli_num_rows($query) != 0) {
        $user = mysqli_fetch_assoc($query);
       
        if ($user) {

            if($user['status']!=0){
                $_SESSION['user_id'] = $user['id'];

                header("Location: index.php");
            } else {
                $error = "Please verify your account first";
            }

            
        }
       

    } else {
        $error = "Invalid credentials";
    }
}



?>


<!DOCTYPE html>
<html lang="zxx">

<?php
include("include/head.php");
?>


<body class="blue-skin">


    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <?php
        include("include/header.php");
        ?>

        <section class="container ">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">

                   
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <span class="svg-icon text-primary svg-icon-2hx">
                          <?php displaylogo(200) ?>
                        </span>
                    </div>
                    <h4 class="modal-header-title mt-5">Log In</h4>
                    <div class="login-form">
                        <form action="" method="POST">

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" placeholder="name@example.com" name="username" required>
                                <label>Email address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                                <label>Password</label>
                            </div>
                            <?php  if($error){ ?>
                                <div class="alert alert-danger">
                                    <?=$error?>
                                </div>
                            <?php } ?>
                            <div class="form-group mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="flex-shrink-0 flex-first">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="save-pass" value="option1">
                                            <label class="form-check-label" for="save-pass">Save Password</label>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 flex-first">
                                        <a href="#" class="link fw-medium">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary fw-medium full-width rounded-2" name="login">LogIn</button>
                            </div>

                        </form>
                    </div>
                    <div class="modal-divider"><span>Or login via</span></div>
                    <!-- <div class="social-login mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google+</a></li>
                        </ul>
                    </div> -->
                    <div class="text-center">
                        <p class="mt-4">Have't Any Account? <a href="create-account.html" class="link fw-medium">create An Account</a></p>
                    </div>

                </div>
                <div class="col-md-3">

                </div>
            </div>
            


        </section>

        


        <!-- ============================ Footer Start ================================== -->
        <?php include("include/footer.php"); ?>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.click').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true
            });
        });


        const track = document.querySelector('.carousel-track');
        const slides = Array.from(track.children);
        const nextButton = document.querySelector('.carousel-button.next');
        const prevButton = document.querySelector('.carousel-button.prev');

        const slideWidth = slides[0].getBoundingClientRect().width;

        // Arrange the slides next to one another
        const setSlidePosition = (slide, index) => {
            slide.style.left = slideWidth * index + 'px';
        };
        slides.forEach(setSlidePosition);

        const moveToSlide = (track, currentSlide, targetSlide) => {
            track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
            currentSlide.classList.remove('current-slide');
            targetSlide.classList.add('current-slide');
        };

        // When I click left, move slides to the left
        prevButton.addEventListener('click', e => {
            const currentSlide = track.querySelector('.current-slide');
            const prevSlide = currentSlide.previousElementSibling;

            moveToSlide(track, currentSlide, prevSlide);
        });

        // When I click right, move slides to the right
        nextButton.addEventListener('click', e => {
            const currentSlide = track.querySelector('.current-slide');
            const nextSlide = currentSlide.nextElementSibling;

            moveToSlide(track, currentSlide, nextSlide);
        });
    </script>

</body>


</html>
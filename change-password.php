<?php
require "config/global.php";
if (!isset($_SESSION['user_id'])) {
   
    header("Location: login.php");
    exit; 
}

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
	if(isset($_SESSION['user_id'])){


    $user_id = $_SESSION['user_id'];

    $query = $db->query("SELECT pass FROM users WHERE id='$user_id'");

    if (!$query) {
 
        $msg = "<div class='alert alert-danger'>Error fetching user data: " . $db->error . "</div>";
    } else {
        $user = $query->fetch_assoc();
        $stored_password = $user['pass'];

        $is_hashed = password_get_info($stored_password)['algo'] != 0;

        if (($is_hashed && password_verify($current_password, $stored_password)) || (!$is_hashed && $current_password === $stored_password)) {
   
            if ($new_password === $confirm_password) {
      
                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

              
                if ($db->query("UPDATE users SET pass='$hashed_password' WHERE id='$user_id'")) {
                    $msg = "<div class='alert alert-success'>Password updated successfully.</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Error updating password: " . $db->error . "</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Passwords do not match.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Current password is incorrect.</div>";
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title><?=page_title("Change Password"); ?></title>
	<?php
	include("include/head.php");
	?>
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
            <?php
            include("include/header.php");
            ?>

            <!-- ============================ Page Title Start================================== -->
            <?php
            include("include/page-components/my-account-header.php");
            ?>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ User Dashboard ================================== -->
			<section class="bg-light">
				<div class="container-fluid">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="filter_search_opt">
								<a href="javascript:void(0);" onclick="openFilterSearch()" class="btn btn-dark full-width mb-4">Dashboard Navigation<i class="fa-solid fa-bars ms-2"></i></a>
							</div>
						</div>
					</div>
								
					<div class="row">
						
					<div class="col-lg-3 col-md-12">
							
							<div class="simple-sidebar sm-sidebar" id="filter_search">
								
								<?php
									include("include/page-components/my-account-sidebar.php");
								?>
								
							</div>
						</div>
						
						<div class="col-lg-9 col-md-12">
							<div class="dashboard-wraper">
								<?php 
	if(!empty($msg)){
		echo $msg;
	}
								?>

						
								<!-- Basic Information -->
								<div class="form-submit">
        <h4>Change Your Password</h4>
        <form method="post" action="change-password.php">
            <div class="submit-section">
                <div class="row">
                    <div class="form-group col-lg-12 col-md-6">
                        <label>Old Password</label>
                        <input type="password" class="form-control" name="current_password" required>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="new_password" required>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" required>
                    </div>
                    
                    <div class="form-group col-lg-12 col-md-12">
                        <button class="btn btn-primary px-5 rounded" type="submit">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ User Dashboard End ================================== -->
			<!-- ============================ Call To Action ================================== -->
			<section class="theme-bg call-to-act-wrap">
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
		$(document).ready(function(){
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
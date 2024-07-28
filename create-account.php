<?php
require "config/global.php";

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize and trim inputs
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $signup_as = htmlspecialchars(trim($_POST['signup_as']));
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    // Validation for required fields
    if (empty($full_name) || empty($email) || empty($username) || empty($password) || empty($phone) || empty($signup_as)) {
        $msg = "<div class='alert alert-danger'>All fields are required.</div>";
    } else {
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "<div class='alert alert-danger'>Invalid email format.</div>";
        } else {
            // Check if user already exists
            $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $msg = "<div class='alert alert-danger'>User already exists.</div>";
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // Insert new user
                $stmt = $db->prepare("INSERT INTO users (fname, name, phone, email, pass, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssss", $full_name, $username, $phone, $email, $hashed_password, $signup_as, $created_at, $updated_at);

                if ($stmt->execute()) {
                    $msg = "<div class='alert alert-success'>Account created successfully.</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
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
											<a class="d-flex align-items-center justify-content-center" href="index-2.html">
												<span class="svg-icon text-primary svg-icon-2hx">
													<svg width="90" height="90" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M15.8797 15.375C15.9797 15.075 15.9797 14.775 15.9797 14.475C15.9797 13.775 15.7797 13.075 15.4797 12.475C14.7797 11.275 13.4797 10.475 11.9797 10.475C11.7797 10.475 11.5797 10.475 11.3797 10.575C7.37971 11.075 4.67971 14.575 2.57971 18.075L10.8797 3.675C11.3797 2.775 12.5797 2.775 13.0797 3.675C13.1797 3.875 13.2797 3.975 13.3797 4.175C15.2797 7.575 16.9797 11.675 15.8797 15.375Z" fill="currentColor"/>
														<path opacity="0.3" d="M20.6797 20.6749C16.7797 20.6749 12.3797 20.275 9.57972 17.575C10.2797 18.075 11.0797 18.375 11.9797 18.375C13.4797 18.375 14.7797 17.5749 15.4797 16.2749C15.6797 15.9749 15.7797 15.675 15.7797 15.375V15.2749C16.8797 11.5749 15.2797 7.47495 13.2797 4.07495L21.6797 18.6749C22.2797 19.5749 21.6797 20.6749 20.6797 20.6749ZM8.67972 18.6749C8.17972 17.8749 7.97972 16.975 7.77972 15.975C7.37972 13.575 8.67972 10.775 11.3797 10.375C7.37972 10.875 4.67972 14.375 2.57972 17.875C2.47972 18.075 2.27972 18.375 2.17972 18.575C1.67972 19.475 2.27972 20.475 3.27972 20.475H10.3797C9.67972 20.175 9.07972 19.3749 8.67972 18.6749Z" fill="currentColor"/>
													</svg>
												</span>
											</a>
										</div>
										<h4 class="fs-2">Create Account On Resido</h4>
									</div>
									<?= $msg ?>
    <form method="post" action="">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group mb-3">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Full Name" >
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" >
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" >
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="*******" >
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" class="form-control" name="phone" placeholder="123 546 5847" >
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
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary full-width fw-medium">Create Account<i class="fa-solid fa-arrow-right-long ms-2"></i></button>
        </div>
    </form>
								</div>
								
								<div class="modal-divider" style="display: none;"><span>Or SignUp via</span></div>
								<div class="social-login mb-3">
									<ul style="display: none;">
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
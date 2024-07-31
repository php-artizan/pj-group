
<?php 

require "config/global.php";
if (!isset($_SESSION['user_id'])) {
   
    header("Location: login.php");
    exit; 
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title><?=page_title("Homepage"); ?></title>
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
			<section class="bg-light ">
				<div class="container pt-5">
				
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
							
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<h4>Your Current Package: <span class="pc-title text-primary">Gold Package</span></h4>
								</div>
							</div>
					
							<?php
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $queryTrash = $db->query("SELECT COUNT(*) AS count FROM ads WHERE user_id = '$user_id' AND status = 'trash'");
    $trashCount = ($queryTrash && $row = $queryTrash->fetch_assoc()) ? $row['count'] : 0;

    $queryPending = $db->query("SELECT COUNT(*) AS count FROM ads WHERE user_id = '$user_id' AND status = 'pending'");
    $pendingCount = ($queryPending && $row = $queryPending->fetch_assoc()) ? $row['count'] : 0;

    $queryActive = $db->query("SELECT COUNT(*) AS count FROM ads WHERE user_id = '$user_id' AND status = 'active'");
    $activeCount = ($queryActive && $row = $queryActive->fetch_assoc()) ? $row['count'] : 0;
    
    ?>

     
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat widget-1">
                    <div class="dashboard-stat-content">
                        <h4><?php echo $activeCount; ?></h4>
                        <span>Active Listings</span>
                    </div>
                    <div class="dashboard-stat-icon"><i class="fa-solid fa-location-dot"></i></div>
                </div>  
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat widget-2">
                    <div class="dashboard-stat-content">
                        <h4><?php echo $pendingCount; ?></h4>
                        <span>Pending Listings</span>
                    </div>
                    <div class="dashboard-stat-icon"><i class="ti-pie-chart"></i></div>
                </div>  
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat widget-3">
                    <div class="dashboard-stat-content">
                        <h4><?php echo $trashCount; ?></h4>
                        <span>Pending Listings</span>
                    </div>
                    <div class="dashboard-stat-icon"><i class="ti-user"></i></div>
                </div>  
            </div>
        </div>
        <?php
    }

?>

					
							<div class="dashboard-wraper">
							
								<!-- Basic Information -->
								<?php


$msg = '';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user data
    $query = $db->query("SELECT * FROM users WHERE id='$user_id'");
    $user = mysqli_fetch_assoc($query);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate form inputs
        $full_name = htmlspecialchars(trim($_POST['full_name']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $username = htmlspecialchars(trim($_POST['username']));
        $phone = htmlspecialchars(trim($_POST['phone']));
        $address = htmlspecialchars(trim($_POST['address']));
        $city = htmlspecialchars(trim($_POST['city']));
        $state = htmlspecialchars(trim($_POST['state']));
        $zip = htmlspecialchars(trim($_POST['zip']));
        $about = htmlspecialchars(trim($_POST['about']));
        $updated_at = date('Y-m-d H:i:s');

        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "<div class='alert alert-danger'>Invalid email format.</div>";
        } else {
            // Update the users table
            $stmt = $db->prepare("UPDATE users SET fname=?, name=?, phone=?, email=?, adress=?, city=?, state=?, zip=?, about=?, updated_at=? WHERE id=?");

            // Check if the prepare statement was successful
            if ($stmt === false) {
                $msg = "<div class='alert alert-danger'>Error preparing query: " . $db->error . "</div>";
            } else {
                $stmt->bind_param("ssssssssssi", $full_name, $username, $phone, $email, $address, $city, $state, $zip, $about, $updated_at, $user_id);

                if ($stmt->execute()) {
                    $msg = "<div class='alert alert-success'>Account updated successfully. <a href='my-profile.php'> View Updated Profile</a></div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Error updating user data: " . $stmt->error . "</div>";
                }

                // Close the statement
                $stmt->close();
            }
        }
    }
}
?>

    <?= $msg ?>
    <form method="post" action="">
        <div class="form-submit">	
            <h4>My Account</h4>
            <div class="submit-section">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Your Name</label>
                        <input type="text" class="form-control" name="full_name" value="<?= htmlspecialchars($user['fname']) ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($user['name']) ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($user['phone']) ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="<?= htmlspecialchars($user['adress']) ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" value="<?= htmlspecialchars($user['city']) ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>State</label>
                        <input type="text" class="form-control" name="state" value="<?= htmlspecialchars($user['state']) ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="zip" value="<?= htmlspecialchars($user['zip']) ?>">
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label>About</label>
                        <textarea class="form-control" name="about"><?= htmlspecialchars($user['about']) ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary px-5 rounded">Save Changes</button>
                </div>
            </div>
        </div>
    </form>


    <div id="social-form" class="form-submit" style="display:none;">    
    <h4>Social Accounts</h4>
    <div class="submit-section">
        <div class="row">
            <div class="form-group col-md-6">
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control" value="https://facebook.com/">
            </div>
            
            <div class="form-group col-md-6">
                <label>Twitter</label>
                <input type="text" name="twitter" class="form-control" value="https://twitter.com/">
            </div>
            
            <div class="form-group col-md-6">
                <label>Google Plus</label>
                <input type="text" name="google_plus" class="form-control" value="https://googleplus.com/">
            </div>
            
            <div class="form-group col-md-6">
                <label>LinkedIn</label>
                <input type="text" name="linkedin" class="form-control" value="https://linkedin.com/">
            </div>
            
            <div class="form-group col-lg-12 col-md-12">
                <button class="btn btn-primary rounded px-5" type="button" onclick="saveChanges()">Save Changes</button>
            </div>
        </div>
    </div>
</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ User Dashboard End ================================== -->
			
		
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
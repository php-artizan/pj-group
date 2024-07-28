<?php
require "config/global.php";
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title><?= page_title("Homepage"); ?></title>
	<?php
	include ("include/head.php");
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
		include ("include/header.php");
		?>

		<!-- ============================ Page Title Start================================== -->
		<?php
		include ("include/page-components/my-account-header.php");
		?>
		<!-- ============================ Page Title End ================================== -->

		<!-- ============================ User Dashboard ================================== -->
		<section class="bg-light">
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
                    <?php include("include/page-components/my-account-sidebar.php"); ?>
                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                <div class="dashboard-wraper">
                    <div class="form-submit">
                        <h4>My Property</h4>
                    </div>
                    <div class="success-message alert alert-success" style="display:none;"></div>
                    <div class="error-message alert alert-danger" style="display:none;"></div>
					<div class="row" id="ads-container">
    <!-- Ads will be loaded here -->
    <?php 
    $active_ads = Ad::get_ads_by_user_id($user_id, "active");
    if (empty($active_ads)): 
    ?>
        <div class="col-12">
            <div class="alert alert-info">No Properties Available</div>
        </div>
    <?php 
    else: 
        foreach ($active_ads as $ad): 
            $image = $ad['images'][0];
            $id = $ad['id'];
    ?>
        <div class="col-md-12 col-sm-12 col-md-12">
            <div class="singles-dashboard-list">
                <div class="sd-list-left">
                    <img src="<?= $image['path'] ?>" class="img-fluid" alt="" />
                </div>
                <div class="sd-list-right">
                    <h4 class="listing_dashboard_title"><a href="#" class="text-primary"><?= $ad['title'] ?></a></h4>
                    <div class="user_dashboard_listed">
                        Price: from <?= CustomOperations::price($ad['price']) ?> month
                    </div>
                    <div class="user_dashboard_listed">
                        City: <a href="javascript:void(0);" class="text-primary"><?= Ad::get_ad_meta($id, 'city') ?></a> , Area: <?= Ad::get_ad_meta($id, 'area') ?>
                    </div>
                    <div class="action">
                        <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="property.php?slug=<?= $ad['slug'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="202 User View"><i class="fa-regular fa-eye"></i></a>
                        <a href="#" data-id="<?= $ad['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Property" class="delete"><i class="fa-regular fa-circle-xmark"></i></a>
                        <a href="requests.php?slug=<?= $ad['slug'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Requests"><i class="fa-solid fa-file-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php 
        endforeach; 
    endif; 
    ?>
</div>

                </div>
            </div>
        </div>
    </div>
</section>

		<!-- ============================ User Dashboard End ================================== -->


		<!-- ============================ Footer Start ================================== -->
		<?php include ("include/footer.php"); ?>
		<!-- ============================ Footer End ================================== -->

		<!-- Log In Modal -->
		<?php include ("include/loginmodal.php"); ?>
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
		$(document).ready(function () {
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
	<script>
$(document).ready(function () {
    function loaddata() {
        $.ajax({
            url: 'record-loader.php',
            type: 'post',
            success: function (data) {
                $('#ads-container').html(data); // Update the ads container with the new data
            }
        });
    }

    $(document).on("click", '.delete', function () {
        if (confirm("Are you sure you want to trash this ad?")) {
            var id = $(this).data("id");
            var element = this;
            $.ajax({
                url: "trash_ad.php",
                type: "POST",
                data: { id: id },
                success: function (data) {
                    if (data == 1) {
						$('.error-message').html('Error in moving record to Trash.').slideDown().delay(3000).slideUp();
                    } else {
                       
						loaddata(); // Reload the data after deleting
                        $('.success-message').html('Record Moved to trash').slideDown().delay(3000).slideUp();
                    }
                }
            });
        }
    });
});
</script>


</body>


</html>
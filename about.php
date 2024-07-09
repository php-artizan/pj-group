<!DOCTYPE html>
<html lang="zxx">

<?php
include("include/head.php");
?>
<style>
    .white-box {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: white;
        z-index: 1;
    }

    .swiper-container {
        width: 100%;
        height: auto;
        position: relative;
        /* Ensure container is positioned relative for absolute positioning of arrows */
        overflow: hidden;
        /* Hide overflow to prevent navigation arrows from going outside */
    }

    .swiper-wrapper {
        display: flex;
        align-items: center;
        /* Center items vertically */
    }

    .swiper-slide {
        flex: 0 0 auto;
        /* Let the slide size be determined by its contents */
        width: 18rem;
        /* Fixed width of the card */
        margin-right: 20px;
        /* Adjust space between slides */
    }


    .swiper-button-prev,
    .swiper-button-next {
        position: absolute;
        top: 50%;
        /* Position arrows vertically centered */
        transform: translateY(-50%);
        /* Offset by half of arrow height */
        width: 30px;
        height: 30px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        z-index: 10;
        /* Ensure arrows are above the slides */
    }

    .swiper-button-prev {
        left: 10px;
        /* Position left arrow on the left side */
    }

    .swiper-button-next {
        right: 10px;
        /* Position right arrow on the right side */
    }

    .card1 {
        margin: 10px;
        flex: 1;
        min-width: 200px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.25rem;
    }

    .card-body {
        padding: 1rem;
    }

    .card-text {
        margin: 0.5rem 0;
    }

    .btn {
        margin-top: 1rem;
    }

    .badge {
        cursor: pointer;
    }

    .selected {
        background-color: green;
        color: white;
    }

    .badge-container {
        display: flex;
        gap: 10px;
    }

    .info-icon {
        cursor: pointer;
        margin-left: 10px;
    }

    .tooltip-box {
        display: none;
        position: absolute;
        top: 50%;
        left: 100%;
        transform: translate(10px, -50%);
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }
</style>

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
        include("include/header.php");
        ?>

        <!-- ============================ Hero Banner  Start================================== -->
        <!-- Section 1 -->
        <section>
            <!-- ============================ Hero Banner  Start================================== -->
            <div class="image-cover hero-banner" style="background:#eff6ff url(assets/img/city-banner.png) no-repeat; height: 70px">
                <div class="container ">
                    <div class="row  ">
                        <div class="col-lg-9 col-md-11 col-sm-12 ">
                            <div class="inner-banner-text ">
                                <h2>About Us
                                </h2>
                                <p>Zameen.com is Pakistan’s Largest Online Real Estate Portal Connecting Buyers with Sellers within & outside the country

                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ============================ Hero Banner End ================================== -->
        </section>
        <!-- Section 2 -->




        <section>
            <div class=" container my-5">

                <div class="row">
                    <div class="col-xl-6">
                        <h2 class="heading_h2__2cO0G">How did it all start?
                        </h2>
                        <p>Zameen.com was the brainchild of two British-Pakistani entrepreneur brothers, Zeeshan Ali Khan and Imran Ali Khan. Their mission was to make Pakistani real estate accessible and convenient for everyone. Together, they proceeded to lead Zameen.com from a small start-up to the premier real estate entity of Pakistan.</p>
                        <p>Zameen.com started its funding first round in 2012 which constituted of several angel investors and substantial investment from venture capital firms. A further two rounds of major investment were closed in late 2015 and early 2016, bringing in a total of $29 million.</p>
                    </div>
                    <div class="col-xl-6">
                        <div class="text-center">
                            <img src="./assets/img/partners/about-us-block.png" alt="" width="400px" height="400px">

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <!-- First Row, First Column -->
                    <div class="col-md-6 col-lg-6 pos-relative">
                        <div class="card">
                            <div class="card-body d-flex flex-column position-relative">
                                <h2 class="h2">Exclusive Marketing by Zameen.com</h2>
                                <p class="text-muted">The team uses a 360-degree marketing strategy, covering all aspects of the projects, and helps buyers on every step of the way, with guaranteed transparency.</p>
                                <a href="https://www.zameen.com/new-projects/" class="d-flex align-items-center" style="color:#00A651;font-weight:800">View Our Projects
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" style="margin-left:4px" height="1.4em" width="1.4em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- First Row, Second Column -->
                    <div class="col-md-6 col-lg-6 pos-relative">
                        <div class="card">
                            <div class="card-body d-flex flex-column position-relative">
                                <h2 class="h2">Exclusive Marketing by Zameen.com</h2>
                                <p class="text-muted">The team uses a 360-degree marketing strategy, covering all aspects of the projects, and helps buyers on every step of the way, with guaranteed transparency.</p>
                                <a href="https://www.zameen.com/new-projects/" class="d-flex align-items-center" style="color:#00A651;font-weight:800">View Our Projects
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" style="margin-left:4px" height="1.4em" width="1.4em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <!-- Second Row, First Column -->
                    <div class="col-md-6 col-lg-6 pos-relative">
                        <div class="card">
                            <div class="card-body d-flex flex-column position-relative">
                                <h2 class="h2">Exclusive Marketing by Zameen.com</h2>
                                <p class="text-muted">The team uses a 360-degree marketing strategy, covering all aspects of the projects, and helps buyers on every step of the way, with guaranteed transparency.</p>
                                <a href="https://www.zameen.com/new-projects/" class="d-flex align-items-center" style="color:#00A651;font-weight:800">View Our Projects
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" style="margin-left:4px" height="1.4em" width="1.4em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- Second Row, Second Column -->
                    <div class="col-md-6 col-lg-6 pos-relative">
                        <div class="card">
                            <div class="card-body d-flex flex-column position-relative">
                                <h2 class="h2">Exclusive Marketing by Zameen.com</h4>
                                    <p class="text-muted">The team uses a 360-degree marketing strategy, covering all aspects of the projects, and helps buyers on every step of the way, with guaranteed transparency.</p>
                                    <a href="https://www.zameen.com/new-projects/" class="d-flex align-items-center" style="color:#00A651;font-weight:800">View Our Projects
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" style="margin-left:4px" height="1.4em" width="1.4em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path>
                                        </svg>
                                    </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section>
            <div class="container">
                <div>
                    <h2>Explore Zameen</h2>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card" style="position: relative; border-radius:15px;">
                            <img src="./assets/img/partners/explore-zameen-1@2x.png" alt="" style="width: 100%; height: auto;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; align-items: flex-end; padding: 16px;">
                                <h6 style="color: #fff;">Real Estate Listings<br>Look at the best properties around you!</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="position: relative; border-radius:15px;">
                            <img src="./assets/img/partners/explore-zameen-2@2x.png" alt="" style="width: 100%; height: auto;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; align-items: flex-end; padding: 16px;">
                                <h6 style="color: #fff;">Real Estate Listings<br>Look at the best properties around you!</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="position: relative; border-radius:15px;">
                            <img src="./assets/img/partners/explore-zameen-3@2x.png" alt="" style="width: 100%; height: auto;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; align-items: flex-end; padding: 16px;">
                                <h6 style="color: #fff;">Real Estate Listings<br>Look at the best properties around you!</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="position: relative; border-radius:15px;">
                            <img src="./assets/img/partners/explore-zameen-4@2x.png" alt="" style="width: 100%; height: auto;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; align-items: flex-end; padding: 16px;">
                                <h6 style="color: #fff;">Real Estate Listings<br>Look at the best properties around you!</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============================ Footer Start ================================== -->
        <?php include("include/footer.php"); ?>
        <!-- ============================ Footer End ================================== -->

        <!-- Log In Modal -->
        <?php include("include/loginmodal.php"); ?>
        <!-- End Modal -->



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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 'auto', // Adjust slides per view as needed
                centeredSlides: true,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });




        function selectBadge(badge) {
            // Remove the selected class from both badges
            const badges = document.querySelectorAll('.badge');
            badges.forEach(b => {
                b.classList.remove('selected');
                b.querySelector('i').classList.remove('fa-check');
            });

            // Add the selected class to the clicked badge
            badge.classList.add('selected');
            badge.querySelector('i').classList.add('fa-check');
        }

        function toggleTooltip() {
            const tooltip = document.querySelector('.tooltip-box');
            tooltip.style.display = tooltip.style.display === 'block' ? 'none' : 'block';
        }

        // Close the tooltip if clicked outside
        document.addEventListener('click', function(event) {
            const isClickInside = document.querySelector('.info-icon').contains(event.target);
            const tooltip = document.querySelector('.tooltip-box');
            if (!isClickInside) {
                tooltip.style.display = 'none';
            }
        });

        function selectBadge(badge) {
            // Remove the selected class from both badges
            const badges = document.querySelectorAll('.badge');
            badges.forEach(b => {
                b.classList.remove('selected');
                b.querySelector('i').classList.remove('fa-check');
            });

            // Add the selected class to the clicked badge
            badge.classList.add('selected');
            badge.querySelector('i').classList.add('fa-check');
        }

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
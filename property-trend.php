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
                    <div class="row justify-content-center ">
                        <div class="col-lg-9 col-md-11 col-sm-12 ">
                            <div class="inner-banner-text text-center">
                                <h2>Property Price Trends and Index by Zameen </h2>
                                <p>Explore the latest price trends and index across various cities and localities in Pakistan</p>
                            </div>
                            <div class="full-search-2 eclip-search italian-search hero-search-radius shadow-hard mt-5  " style="width: 1000px; ">
                                <div class="hero-search-content">
                                    <div class="row ">

                                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group mb-2">
                                                <div class="" placeholder="Lahore">
                                                    City
                                                    <select id="town" class="form-control">
                                                        <option value="1" selected>Lahore</option>
                                                        <option value="2">Karachi</option>
                                                        <option value="3">Islamabad</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 p-md-0 elio ">
                                            <div class="form-group ">
                                                <div class="position-relative ">
                                                    Location
                                                    <input type="text" class="form-control" placeholder="Location" style="height: 55px;" />
                                                    <div class="position-absolute top-50 start-0 translate-middle-y ms-2">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group mb-2">
                                                <div>
                                                Property Type
                                                    <select id="town" class="form-control">
                                                        <option value="" selected disabled hidden>All</option>
                                                        <option value="7">House</option>
                                                        <option value="7">Flats</option>
                                                        <option value="8">Plots</option>
                                                        <option value="8">Commercial</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        




                                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-dark full-width">View</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Collapse Advance Search Form -->
                                    <div class="collapse" id="advance-search" aria-expanded="false" role="banner">

                                        <!-- row -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================ Hero Banner End ================================== -->
        </section>
        <!-- Section 2 -->




        <section>
            <div class=" container my-5">
                <h2 class="heading_h2__2cO0G">About Home Loan Calculator</h2>
                <div class="overview_overviewContent__J47Fa">
                    <p>Everyone dreams of owning their own house at some point in their life. However, this is not easily achievable given the fact that the process requires a lot of dedication, consideration, and of course, money. Having said that, this does not mean that you should become disheartened with the entire venture, and not give it a shot. The process of buying a house or property, in general, can seem particularly threatening for first-timers. No matter where in the world you are, there are some legal aspects attached to buying a piece of real estate that you need to look out for. To make the whole endeavor easier for buyers, Zameen introduces Home Loan Calculator. Additionally, there are numerous home/house financing options available in the market with almost every major bank trying to provide the best means to address this pressing issue. Use this tool to evaluate the best house financing option there is. Now if you are worried about how you can score a decent home loan in Pakistan, there’s no need to fret! You can easily find a bank plan that suits your financing/payment needs. However, it is pertinent to mention here that your eligibility for these various house financing options depends on several factors – ranging from your salary to your nationality. Also, different banks have different eligibility standards when approving home loan applications. Therefore, to figure out the best bank in Pakistan for the purpose, weigh your options carefully with Zameen’s Home Loan Calculator. In addition, the sanctioned loan amount, as well as the duration you have to repay it over, may vary from bank to bank. Your debt-to-equity ratio is also an important factor, so make sure that you have a strong case to present when submitting your house loan application.
                    </p>
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
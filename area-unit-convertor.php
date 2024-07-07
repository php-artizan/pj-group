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
                            <div class="inner-banner-text text-center mt-5">
                                <h2>Property Price Trends and Index by Zameen </h2>
                                <p>Explore the latest price trends and index across various cities and localities in Pakistan</p>
                            </div>
                            <div class="full-search-2 eclip-search italian-search hero-search-radius shadow-hard mt-5 " style="width: 100%; min-height: 380px ">
                                <div class="hero-search-content">
                                    <div class="row ">
                                        <div class="p-5">
                                            <!-- First Row: Marla Size -->
                                            <div>
                                                <h3 class="text-muted u-mb12">
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" style="margin-right: 8px; font-size: 1.2rem;" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M131.3 231.1L32 330.6l99.3 99.4v-74.6h174.5v-49.7H131.3v-74.6zM480 181.4L380.7 82v74.6H206.2v49.7h174.5v74.6l99.3-99.5z"></path>
                                                    </svg>
                                                    Marla Size
                                                </h3>
                                                <div>
                                                    <div class="radio-group">
                                                        <input type="radio" id="marla225" name="marla-size" value="225">
                                                        <label for="marla225">225 /Sq. ft.</label>

                                                        <input type="radio" id="marla250" name="marla-size" value="250">
                                                        <label for="marla250">250 /Sq. ft.</label>

                                                        <input type="radio" id="marla272" name="marla-size" value="272">
                                                        <label for="marla272">272 /Sq. ft.</label>

                                                        <input type="radio" id="marla1" name="marla-size" value="1">
                                                        <label for="marla1">1 Marla</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="card text-start">
                                                        <div class="card-body">
                                                            <p>Content goes here...</p>
                                                        </div>
                                                        <footer style="width: 100%;">
                                                            <select class="form-select">
                                                                <option selected>Square Feet</option>
                                                                <option value="1">Marla</option>
                                                                <option value="2">kanal</option>
                                                                <option value="3">acre/killa</option>
                                                                <option value="3">squre yard</option>
                                                            </select>
                                                            
                                                        </footer>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                <div class="col">
                                                    <div class="card text-start">
                                                        <div class="card-body">
                                                            <p>Content goes here...</p>
                                                        </div>
                                                        <footer style="width: 100%;">
                                                            <select class="form-select">
                                                                <option selected>Square Feet</option>
                                                                <option value="1">Marla</option>
                                                                <option value="2">kanal</option>
                                                                <option value="3">acre/killa</option>
                                                                <option value="3">squre yard</option>
                                                            </select>
                                                            
                                                        </footer>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- Second Row: Useful Converter -->
                                            <div style="margin-top: 1rem; margin-bottom: 1rem;">
                                                <h3 class="text-muted u-mb12">
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" style="margin-right: 8px; font-size: 1.2rem;" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M131.3 231.1L32 330.6l99.3 99.4v-74.6h174.5v-49.7H131.3v-74.6zM480 181.4L380.7 82v74.6H206.2v49.7h174.5v74.6l99.3-99.5z"></path>
                                                    </svg>
                                                    Useful Converter
                                                </h3>
                                                <div class="radio-group">
                                                    <input type="radio" id="marla-square-yard" name="useful-converter" value="marla|square-yard">
                                                    <label for="marla-square-yard">Marla / Sq. yd.</label>

                                                    <input type="radio" id="square-meter-square-yard" name="useful-converter" value="square-meter|square-yard">
                                                    <label for="square-meter-square-yard">Sq. m. / Sq. yd.</label>

                                                    <input type="radio" id="kanal-marla" name="useful-converter" value="kanal|marla">
                                                    <label for="kanal-marla">Kanal / Marla</label>

                                                    <input type="radio" id="square-feet-square-meter" name="useful-converter" value="square-feet|square-meter">
                                                    <label for="square-feet-square-meter">Sq. ft. / Sq. m.</label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- Collapse Advance Search Form -->
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
                <h2 class="heading_h2__2cO0G">About Area Unit Converter</h2>
                <div class="overview_overviewContent__J47Fa">
                   <p>Not sure of what to do when facing unfamiliar area units? Introducing Zameen Area Unit Converter — now easily convert any unit of area measurement for better understanding. What is a unit of measurement? A unit is a measurement of a quantity, defined or adopted by tradition (and/or law). Human history has witnessed various forms of unit systems used in different regions and cultures. To eradicate this issue and help uniform the global system of measurement units, an international worldwide standard of measurement units was developed — also known as the International System of Units (SI). This modern form of the metric system, intended as a single set of rules and unit conversions for global use, has been fully adopted. What are the internationally recognised area units? The basic unit used to calculate land area measurements, elected by convention, and regarded as dimensionally independent, is the meter (m). However, in Pakistan, the most used unit to establish an area’s landmass is marla. Use Zameen’s area unit converter to convert from marla to kanal, square feet (sq ft), square yards (sq yds), acres, and hectares. Benefits of using Area Unit Converter Usually most of the population involved in the real estate industry of Pakistan are somewhat familiar with the basic units of land area measurements. However, with that said, the majority of the citizens remain in the dark with many of these units. For example, the province of Punjab primarily uses the following as area calculating units: marla, kanal, and acre, while those residing in the province of Sindh mostly use square feet (sq ft) and square yards (sq yds). Additionally, this land area converter is best for those looking to understand the variation in the property spheres of each province and aims to get involved in both. There is no need to download any area converter application or software because Zameen Area Unit Converter is the best measurement converter for you to take benefit from. Using this unit converter, you can easily convert all forms of land area measurements.

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
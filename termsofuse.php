<!DOCTYPE html>
<html lang="zxx">

<?php
include("include/head.php");
?>


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
                                <h2>Terms of Use</h2>
                                <p>Find the step-by-step usage criteria below and any additional conditions which may apply.</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ============================ Hero Banner End ================================== -->
        </section>
        <!-- Section 2 -->




        <section>
            <div class=" container my-5">

                <div class="card" style="background-color: #F5F5F5; border-radius: 10px; border:none;">
                    <div class="card-body">
                        <p>We take your privacy very seriously and are committed to protecting the privacy of all visitors and subscribers to our website <a href="www.zameen.com ">www.zameen.com </a> (the <span class="fw-bold">"Website"</span> ) or any mobile application we make available via an app store (the <span class="fw-bold">"Application"</span>, together with the Website, the <span class="fw-bold">"Platform"</span>), and the corresponding services available through the Platform (the <span class="fw-bold"> "Services"</span>).
                        </p>
                        <p>Below we set out our privacy policy, which will govern the way in which we process any personal information that you provide to us.
                        </p>
                        <p>Please read this privacy policy carefully as it contains important information on who we are and how we collect, store, use and share your information. By accessing the Platform or using our Services or otherwise indicating your consent, you agree to, and where required, consent to the collection, use and transfer of your information as set out in this policy. If you do not accept the terms of this policy, you must not use the Platform and/or the Services. This privacy policy supplements other notices and privacy policies and is not intended to override them.
                        </p>
                        <p>This privacy policy: (i) applies only to the Platform and not to websites or applications of any other companies or organisations; and (ii) specifically addresses our obligations pursuant to the applicable laws of Pakistan (the <span class="fw-bold">"Applicable Laws"</span> ).
                        </p>
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
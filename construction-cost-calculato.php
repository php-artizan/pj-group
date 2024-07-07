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
            position: relative; /* Ensure container is positioned relative for absolute positioning of arrows */
            overflow: hidden; /* Hide overflow to prevent navigation arrows from going outside */
        }
        .swiper-wrapper {
            display: flex;
            align-items: center; /* Center items vertically */
        }
        .swiper-slide {
            flex: 0 0 auto; /* Let the slide size be determined by its contents */
            width: 18rem; /* Fixed width of the card */
            margin-right: 20px; /* Adjust space between slides */
        }


    .swiper-button-prev,
        .swiper-button-next {
            position: absolute;
            top: 50%; /* Position arrows vertically centered */
            transform: translateY(-50%); /* Offset by half of arrow height */
            width: 30px;
            height: 30px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 10; /* Ensure arrows are above the slides */
        }
        .swiper-button-prev {
            left: 10px; /* Position left arrow on the left side */
        }
        .swiper-button-next {
            right: 10px; /* Position right arrow on the right side */
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
                                <h2>Construction Cost Calculator </h2>
                                <p>Use our Construction Cost Calculator to get a quick estimate of required building materials along with their costs.</p>
                            </div>
                            <div class="full-search-2 eclip-search italian-search hero-search-radius shadow-hard mt-5  " style="width: 1000px; ">
                                <div class="hero-search-content">
                                    <div class="row ">

                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12">
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
                                                    Area Size
                                                    <input type="text" class="form-control" placeholder="Area Size" style="height: 55px;" />
                                                    <div class="position-absolute top-50 start-0 translate-middle-y ms-2">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 d-flex align-items-end">
                                            <div class="form-group">
                                                <a class="collapsed ad-search" data-bs-toggle="collapse" data-bs-parent="#search" data-bs-target="#advance-search" href="javascript:void(0);" aria-expanded="false" aria-controls="advance-search"><i class="fa fa-sliders-h"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-dark full-width">Calculate Cost</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Collapse Advance Search Form -->
                                    <div class="collapse" id="advance-search" aria-expanded="false" role="banner">

                                        <!-- row -->
                                        <div class="row">

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-md-0 elio ">
                                                <div class="form-group ">
                                                    <div class="position-relative ">
                                                        Covered Area
                                                        <input type="text" class="form-control" placeholder="Enter Covered Area in Sq.Ft." />
                                                        <div class="position-absolute top-50 start-0 translate-middle-y ms-2">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-md-0 elio ">
                                                <div class="form-group">
                                                    <div class="position-relative mx-3">
                                                        Covered Area
                                                        <i class="fa fa-info-circle info-icon" onclick="toggleTooltip()"></i>
                                                        <div class="tooltip-box">
                                                            This is some information about the covered area.
                                                        </div>
                                                        <div class="position-absolute top-50 start-0 translate-middle-y ms-2 badge-container mt-5">
                                                            <span class="badge d-flex align-items-center justify-content-center" style="width: 110px; height: 30px; border-radius: 17px; background-color: #074DA3;" onclick="selectBadge(this)"><i class="fa mx-1"></i>Gray structure</span>
                                                            <span class="badge d-flex align-items-center justify-content-center" style="width: 110px; height: 30px; border-radius: 17px; background-color: #074DA3;" onclick="selectBadge(this)"><i class="fa mx-1"></i>Complete </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-md-0 elio ">
                                                <div class="form-group">
                                                    <div class="position-relative">
                                                    Construction Mode
                                                        <i class="fa fa-info-circle info-icon" onclick="toggleTooltip()"></i>
                                                        <div class="tooltip-box">
                                                            This is some information about the covered area.
                                                        </div>
                                                        <div class="position-absolute top-50 start-0 translate-middle-y ms-2 badge-container mt-5">
                                                            <span class="badge d-flex align-items-center justify-content-center" style="width: 110px; height: 30px; border-radius: 17px; background-color: #074DA3;" onclick="selectBadge(this)"><i class="fa mx-1"></i>With Material</span>
                                                            <span class="badge d-flex align-items-center justify-content-center" style="width: 110px; height: 30px; border-radius: 17px; background-color: #074DA3;" onclick="selectBadge(this)"><i class="fa mx-1"></i>Without Material</span>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <!-- /row -->

                                        </div>
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
            <div class="container mt-4">
                <div class="swiper-container">
                <div class="swiper-button-prev"></div>
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">3 Marla Construction Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">1,215 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/3-marla-house-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">4 Marla Construction Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">1,620 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/4-marla-house-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">5 Marla Construction Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">2,025 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/5-marla-house-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">6 Marla Construction Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">2,295 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/6-marla-house-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 5 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">7 Marla Construction Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">2,678 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/7-marla-house-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 6 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">8 Marla Construction Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">3,060 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/8-marla-house-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 7 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">10 Marla Construction Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">3,375 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/10-marla-house-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 8 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">1 Kanal Construction Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">6,300 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/1-kanal-house-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 9 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">3 Marla Grey Structure Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">1,215 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/3-marla-grey-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 10 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">5 Marla Grey Structure Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">2,025 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/5-marla-grey-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 11 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">10 Marla Grey Structure Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">3,375 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/10-marla-grey-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 12 -->
                        <div class="swiper-slide">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title">1 Kanal Grey Structure Cost</h4>
                                    <p class="card-text">Double Story</p>
                                    <p class="card-text">6,300 sq. ft.</p>
                                    <a href="/tools/construction-cost-calculator/1-kanal-grey-construction-cost-lahore-1/" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <!-- Add navigation buttons -->
                  
                  
                </div>
            </div>
        </section>

        <section>
            <div class="container my-5">
                <div class="u-mb16 u-mb4 important-things_headingStyle__2x7e6 heading-block_headingBlock__yDqev">
                    <h2 class="heading_h2__2cO0G  ">Things to Keep In Mind While Constructing Your House</h2>
                    <p class="d-flex justify-content-center"> Your house is often the hard earned fruit of your hard work over decades of your life. It only makes sense to be absolutely sure about where, when and particularly how to build your house. Following are some things you should keep in mind while constructing your house.</p>
                </div>
                <div class="grid flex-between important-things_infoBlocks__2uPzz d-flex">
                    <div class="feature_contentWrap__2KIiN">
                        <div class="feature_content__3JyB7 false"><img src="https://content-cdn.zameen.com/Labour_Quality_f15c5145c1.svg" alt="">
                            <h4 class="heading_h4__5Kb_J">Labour Quality</h4>
                            <p>High quality &amp; trained labor should be assigned.</p>
                        </div>
                    </div>
                    <div class="feature_contentWrap__2KIiN">
                        <div class="feature_content__3JyB7 false"><img src="https://content-cdn.zameen.com/Foundation_Quality_5e085fe05e.svg" alt="">
                            <h4 class="heading_h4__5Kb_J">Foundation Quality</h4>
                            <p>No compromise on foundation quality.</p>
                        </div>
                    </div>
                    <div class="feature_contentWrap__2KIiN">
                        <div class="feature_content__3JyB7 false"><img src="https://content-cdn.zameen.com/Building_Material_e356cc65ce.svg" alt="">
                            <h4 class="heading_h4__5Kb_J">Building Material</h4>
                            <p>Building material should be Premium Plus grade.</p>
                        </div>
                    </div>
                    <div class="feature_contentWrap__2KIiN">
                        <div class="feature_content__3JyB7 false"><img src="https://content-cdn.zameen.com/Manual_vs_Contractor_9183aa6f42.svg" alt="">
                            <h4 class="heading_h4__5Kb_J">Construction Mode</h4>
                            <p>Sourcing material yourself or outsourcing everything to a contractor.</p>
                        </div>
                    </div>
                    <div class="feature_contentWrap__2KIiN">
                        <div class="feature_content__3JyB7 false"><img src="https://content-cdn.zameen.com/Cost_Calculator_7271657dff.svg" alt="">
                            <h4 class="heading_h4__5Kb_J">Cost Calculator</h4>
                            <p>Get quick cost estimate using our calculator.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container my-5">
                <div class="card px-5" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); padding:20px;">
                    <h3 class="u-mb16 heading_h3__yJ0ks">Construction Cost Calculator</h3>
                    <p class="text-gray-light u-mb24 ">Want to learn more about Zameen.com’s Construction Cost Calculator and build your dream house?</p>
                    <ul class="read-more_ccList__3539o text-gray-light flex flexColumn u-mb16 fs14">
                        <li>
                            <div class="d-flex align-items-center" style="--font-size:0.875rem;--font-color:#707070;--gap:10"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="#00a651" style="color:#00a651" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </svg>
                                <div class="mx-3">Flexibility of Area Size and Units</div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center" style="--font-size:0.875rem;--font-color:#707070;--gap:10"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="#00a651" style="color:#00a651" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </svg>
                                <div class="mx-3"> Separate Estimates for Grey Structure and Complete House</div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center" style="--font-size:0.875rem;--font-color:#707070;--gap:10"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="#00a651" style="color:#00a651" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </svg>
                                <div class="mx-3">Multiple Construction Modes</div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center" style="--font-size:0.875rem;--font-color:#707070;--gap:10"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="#00a651" style="color:#00a651" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </svg>
                                <div class="mx-3">Flexibility to Change the number of rooms</div>
                            </div>
                        </li>
                    </ul><a target="_blank" rel="nofollow" class="button_btn__r8N5j button_outline__4xZ8Q" href="https://www.zameen.com/blog/zameen-construction-cost-calculator.html">Read More <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" style="margin-left:5px;margin-right:0" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <line x1="7" y1="17" x2="17" y2="7"></line>
                            <polyline points="7 7 17 7 17 17"></polyline>
                        </svg></a>
                </div>
            </div>
        </section>
        <section>
            <div class=" container my-5">
                <h2 class="heading_h2__2cO0G">About Construction Cost Calculator</h2>
                <div class="overview_overviewContent__J47Fa">
                    <p>The first challenge one usually encounters when building a house is not knowing how much the unit will cost to construct because there are several variables that might affect the cost such as the quality and type of materials used, the number of floors, and whether or not the house will be built by you or a construction company.

                        Zameen has launched its new house construction cost calculator tool to provide its users with a reliable way to estimate the construction costs of their houses. If you want to build your dream home, you can quickly estimate the construction cost with our Construction Cost Calculator.

                        This tool makes it simple to estimate home building costs. Simply enter the city where you intend to build your home, choose the area of the house in Marla or Kanals, and choose the quality of the materials you wish to use. You will get the estimated construction costs including grey structure cost, contractor cost, finishing cost and price per sq. feet. The price of the grey structure is determined by adding the cost of the basic framework, such as pillars, walls, beams, cement, and steel structure while the finishing cost is calculated by taking into account the finer details, which include tiles, bathroom fixtures, doors, and other components.

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
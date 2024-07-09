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
                        <div class="col-lg-7 col-md-7 col-sm-12 ">
                            <div class="inner-banner-text ">
                                <h3>Let's Talk About Everything!
                                </h3>
                                <p>Hello there! If you'd like to ask us something, you can get in touch with us here! We'd love to address any and all concerns you may have.</p>
                            </div>
                            <div>
                                <h5>Head Office</h5>
                                <p>Pearl One, 94-B/I, MM Alam Road, Gulberg III, Lahore, Pakistan</p>
                                <p>0800 Zameen (92633)</p>
                                <p>Monday To Friday (9AM-6PM)</p>
                            </div>

                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 ">
                            <div class="card" style="max-width: 600px; margin: auto; padding: 0px; border: 1px solid #ccc; border-radius: 8px;">
                                <div class="card-body">
                                    <form>
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="name" style="display: block; font-weight: bold;">Your Name*</label>
                                            <input type="text" id="name" placeholder="Please enter your full name" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="phone" style="display: block; font-weight: bold;">Phone Number*</label>
                                            <div style="display: flex;">
                                                <select style="padding: 8px; border: 1px solid #ccc; border-radius: 4px 0 0 4px;">
                                                    <option value="Pakistan">Pakistan</option>
                                                </select>
                                                <input type="text" value="+92" disabled style="width: 50px; padding: 8px; border: 1px solid #ccc; border-left: 0;">
                                                <input type="text" id="phone" placeholder="Please enter a valid phone number" style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 0 4px 4px 0;">
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="email" style="display: block; font-weight: bold;">Email Address*</label>
                                            <input type="email" id="email" placeholder="Your best email address?" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label for="subject" style="display: block; font-weight: bold;">Subject*</label>
                                            <select id="subject" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                                <option value="General Inquiry">General Inquiry</option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label for="message" style="display: block; font-weight: bold;">Your Message*</label>
                                            <textarea id="message" placeholder="What would you like to say?" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                                        </div>
                                        <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px;">Send Your Question</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ============================ Hero Banner End ================================== -->
        </section>
        <!-- Section 2 -->


        <section>
            <div class="container" style="margin-top: 20px;">
                <div class="row">
                    <div class="col">
                        <h2 style="font-size: 2rem; margin-bottom: 10px;">Zameen Offices</h2>
                        <p style="font-size: 1rem; color: #666;">If you need to mail any advertising literature then please use any of the following addresses:</p>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 30px; border-radius:20px;">
                    <img src="assets/img/partners/map_Illustration_d15b399254.png" alt="" style="width: 100%; height: auto;">

                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card" style="margin: 5px; border-radius: 15px;">
                                            <div class="card-body" style="padding: 10px;">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9">
                                                        <h5 class="card-title" style="font-size: 1.2rem;">Lahore- <span style="color: green;">Head Office</span></h5>
                                                        <p>Pearl One, 94-B/1,MM Alam Road <br>
                                                            Gulberg 3,
                                                            <br>lahore, Pakistan
                                                            <br>0800 Zameen (92633)
                                                        </p>

                                                    </div>
                                                    <div class="col-md-3 col-sm-3">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #00c660; color:#fff; border:none; border-radius:10px;">
                                                                Get Direction
                                                            </button>
                                                        </div>
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #fff; color:#00c660; border: 1px solid #00c660; border-radius:10px;">
                                                                Call
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card" style="margin: 5px; border-radius: 15px;">
                                            <div class="card-body" style="padding: 10px;">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9">
                                                        <h5 class="card-title" style="font-size: 1.2rem;">Lahore- <span style="color: green;">Head Office</span></h5>
                                                        <p>Pearl One, 94-B/1,MM Alam Road <br>
                                                            Gulberg 3,
                                                            <br>lahore, Pakistan
                                                            <br>0800 Zameen (92633)
                                                        </p>

                                                    </div>
                                                    <div class="col-md-3 col-sm-3">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #00c660; color:#fff; border:none; border-radius:10px;">
                                                                Get Direction
                                                            </button>
                                                        </div>
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #fff; color:#00c660; border: 1px solid #00c660; border-radius:10px;">
                                                                Call
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card" style="margin: 5px; border-radius: 15px;">
                                            <div class="card-body" style="padding: 10px;">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9">
                                                        <h5 class="card-title" style="font-size: 1.2rem;">Lahore- <span style="color: green;">Head Office</span></h5>
                                                        <p>Pearl One, 94-B/1,MM Alam Road <br>
                                                            Gulberg 3,
                                                            <br>lahore, Pakistan
                                                            <br>0800 Zameen (92633)
                                                        </p>

                                                    </div>
                                                    <div class="col-md-3 col-sm-3">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #00c660; color:#fff; border:none; border-radius:10px;">
                                                                Get Direction
                                                            </button>
                                                        </div>
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #fff; color:#00c660; border: 1px solid #00c660; border-radius:10px;">
                                                                Call
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card" style="margin: 5px; border-radius: 15px;">
                                            <div class="card-body" style="padding: 10px;">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9">
                                                        <h5 class="card-title" style="font-size: 1.2rem;">Lahore- <span style="color: green;">Head Office</span></h5>
                                                        <p>Pearl One, 94-B/1,MM Alam Road <br>
                                                            Gulberg 3,
                                                            <br>lahore, Pakistan
                                                            <br>0800 Zameen (92633)
                                                        </p>

                                                    </div>
                                                    <div class="col-md-3 col-sm-3">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #00c660; color:#fff; border:none; border-radius:10px;">
                                                                Get Direction
                                                            </button>
                                                        </div>
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #fff; color:#00c660; border: 1px solid #00c660; border-radius:10px;">
                                                                Call
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card" style="margin: 5px; border-radius: 15px;">
                                            <div class="card-body" style="padding: 10px;">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9">
                                                        <h5 class="card-title" style="font-size: 1.2rem;">Lahore- <span style="color: green;">Head Office</span></h5>
                                                        <p>Pearl One, 94-B/1,MM Alam Road <br>
                                                            Gulberg 3,
                                                            <br>lahore, Pakistan
                                                            <br>0800 Zameen (92633)
                                                        </p>

                                                    </div>
                                                    <div class="col-md-3 col-sm-3">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #00c660; color:#fff; border:none; border-radius:10px;">
                                                                Get Direction
                                                            </button>
                                                        </div>
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #fff; color:#00c660; border: 1px solid #00c660; border-radius:10px;">
                                                                Call
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card" style="margin: 5px; border-radius: 15px;">
                                            <div class="card-body" style="padding: 10px;">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9">
                                                        <h5 class="card-title" style="font-size: 1.2rem;">Lahore- <span style="color: green;">Head Office</span></h5>
                                                        <p>Pearl One, 94-B/1,MM Alam Road <br>
                                                            Gulberg 3,
                                                            <br>lahore, Pakistan
                                                            <br>0800 Zameen (92633)
                                                        </p>

                                                    </div>
                                                    <div class="col-md-3 col-sm-3">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #00c660; color:#fff; border:none; border-radius:10px;">
                                                                Get Direction
                                                            </button>
                                                        </div>
                                                        <div class="col">
                                                            <button style="width: 100%; background-color: #fff; color:#00c660; border: 1px solid #00c660; border-radius:10px;">
                                                                Call
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="background-color: rgba(0, 0, 0, 0.5); width: 30px; height: 30px; border-radius: 50%;">
                            <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 15px; height: 15px;"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="background-color: rgba(0, 0, 0, 0.5); width: 30px; height: 30px; border-radius: 50%;">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="width: 15px; height: 15px;"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>



        <section>
            <div class="container">
                <div class="card w-100 " style="padding-left: 40px; padding-top: 40px; background-color:#F1F9FD">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Need extra help? Chat With Our Agent!</h3>
                            <p>Zameen.com offers an official integration with Zendesk to help you navigate our system in a better,
                                more meaningful way. If you're looking to utilise our Zendesk solution, you're only one click away!</p>
                            <button style="width: 150px; background-color: #00c660; color: #fff; border: none; border-radius: 10px;">
                                Get Started
                            </button>
                        </div>
                        <div class="col-md-4">
                            <img src="assets/img/partners/chat_With_Agent_Img_30766fbf7c.png" alt="">
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <section>
            <div class="container">
                <div class="row">
                    <h2>Agents & Developers</h2>
                    <div class="col">
                        <div class="card w-100 p-5" style="border-radius: 10px; background-image:url(assets/img/partners/developer_Banner_Card_3cb6839b15.svg) ">
                            <h3>Are you a Developer?
                            </h3>
                            <p>If you're a developer, Zameen.com offers you the

                                <br> best packages to get started on your journey.
                            </p>
                            <button style="width:150px; background-color: #fff; color:#00c660; border:none; border-radius:10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                Inquire Now
                            </button>

                        </div>
                    </div>
                    <div class="col">
                        <div class="card w-100 p-5" style="border-radius: 10px; background-image:url(assets/img/partners/agents_Banner_Card_bcb2b93d84.svg) ">
                            <h3>Are you an Agent?</h3>
                            <p>If you're a agent, Zameen.com offers you the

                                <br> best packages to get started on your journey.
                            </p>
                            <button style="width:150px; background-color: #fff; color:#00c660; border:none; border-radius:10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                Inquire Now
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-10 text-center">
							<div class="sec-heading center mb-4">
								<h2>Explore categories</h2>
							</div>
						</div>
					</div>

					<div class="row justify-content-center gx-3 gy-3">
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="classical-cats-wrap d-flex align-items-center">
								<a class="classical-cats-boxs d-flex align-items-center w-100" href="calculator.html">
									<div class="classical-cats-icon px-4 py-4 rounded bg-light-success text-success fs-2">
										<i class="fa-solid fa-house"></i>
									</div>
									<div class="classical-cats-wrap-content ms-3">
										<h4>New Projects</h4>
										<p>The best investment opportunities</p>
									</div>
								</a>
							</div>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="classical-cats-wrap d-flex align-items-center">
								<a class="classical-cats-boxs d-flex align-items-center w-100" href="construction-cost-calculato.php">
									<div class="classical-cats-icon px-4 py-4 rounded bg-light-warning text-warning fs-2">
										<i class="fa-solid fa-building"></i>
									</div>
									<div class="classical-cats-wrap-content ms-3">
										<h4>Construction Cost Calculation</h4>
										<p>Get Construction Cost Estimate</p>
									</div>
								</a>
							</div>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="classical-cats-wrap d-flex align-items-center">
								<a class="classical-cats-boxs d-flex align-items-center w-100" href="home-loan.php">
									<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
										<i class="fa-solid fa-building-shield"></i>
									</div>
									<div class="classical-cats-wrap-content ms-3">
										<h4>Home Loan Calculator</h4>
										<p>Find affordable loan package</p>
									</div>
								</a>
							</div>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="classical-cats-wrap d-flex align-items-center">
								<a class="classical-cats-boxs d-flex align-items-center w-100" href="area-guide.php">
									<div class="classical-cats-icon px-4 py-4 rounded bg-light-info text-primary fs-2">
										<i class="fa-solid fa-synagogue"></i>
									</div>
									<div class="classical-cats-wrap-content ms-3">
										<h4>Area Guide</h4>
										<p>Explore housing societies in pakistan</p>
									</div>
								</a>
							</div>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="classical-cats-wrap d-flex align-items-center">
								<a class="classical-cats-boxs d-flex align-items-center w-100" >
									<div class="classical-cats-icon px-4 py-4 rounded bg-light-success text-success fs-2">
										<i class="fa-solid fa-mosque"></i>
									</div>
									<div class="classical-cats-wrap-content ms-3">
										<h4>Plot Finder</h4>
										<p>Find plot in any housing society</p>
									</div>
								</a>
							</div>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="classical-cats-wrap d-flex align-items-center">
								<a class="classical-cats-boxs d-flex align-items-center w-100" href="property-index.php">
									<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
										<i class="fa-solid fa-tree-city"></i>
									</div>
									<div class="classical-cats-wrap-content ms-3">
										<h4>Property Index</h4>
										<p>Track Changes in real estate prices</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="classical-cats-wrap d-flex align-items-center">
								<a class="classical-cats-boxs d-flex align-items-center w-100" href="area-unit-convertor.php">
									<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
										<i class="fa-solid fa-tree-city"></i>
									</div>
									<div class="classical-cats-wrap-content ms-3">
										<h4>Area Unit Converter</h4>
										<p>Convert any area unit instantly</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="classical-cats-wrap d-flex align-items-center">
								<a class="classical-cats-boxs d-flex align-items-center w-100" href="property-trend.php">
									<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
										<i class="fa-solid fa-tree-city"></i>
									</div>
									<div class="classical-cats-wrap-content ms-3">
										<h4>Property Trends </h4>
										<p>Find popular area to buy property</p>
									</div>
								</a>
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
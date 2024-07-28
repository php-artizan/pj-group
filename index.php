<?php
require "config/global.php";
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title><?= page_title("Homepage"); ?></title>
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

		<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title" id="offcanvasScrollingLabel">Compare & Selected Property</h5>
				<a href="#" data-bs-dismiss="offcanvas" aria-label="Close">
					<span class="svg-icon text-primary svg-icon-2hx">
						<svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
							<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
							<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
						</svg>
					</span>
				</a>
			</div>
			<div class="offcanvas-body">
				<ul class="nav nav-pills sider_tab mb-3" id="pills-tab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="pills-compare-tab" data-bs-toggle="pill" data-bs-target="#pills-compare" type="button" role="tab" aria-controls="pills-compare" aria-selected="true">Compare Property</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="pills-saved-tab" data-bs-toggle="pill" data-bs-target="#pills-saved" type="button" role="tab" aria-controls="pills-saved" aria-selected="false">Saved Property</button>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-compare" role="tabpanel" aria-labelledby="pills-compare-tab" tabindex="0">
						<div class="sidebar_featured_property">

							<!-- List Sibar Property -->
							<div class="sides_list_property p-2">
								<div class="sides_list_property_thumb">
									<img src="assets/img/p-1.jpg" class="img-fluid" alt="">
								</div>
								<div class="sides_list_property_detail">
									<h4><a href="single-property-1.php">Loss vengel New Apartment</a></h4>
									<span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Sans
										Fransico</span>
									<div class="lists_property_price">
										<div class="lists_property_types">
											<div class="property_types_vlix sale">For Sale</div>
										</div>
										<div class="lists_property_price_value">
											<h4 class="text-primary">$4,240</h4>
										</div>
									</div>
								</div>
							</div>

							<!-- List Sibar Property -->
							<div class="sides_list_property p-2">
								<div class="sides_list_property_thumb">
									<img src="assets/img/p-4.jpg" class="img-fluid" alt="">
								</div>
								<div class="sides_list_property_detail">
									<h4><a href="single-property-1.php">Montreal Quriqe Apartment</a></h4>
									<span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Liverpool,
										London</span>
									<div class="lists_property_price">
										<div class="lists_property_types">
											<div class="property_types_vlix">For Rent</div>
										</div>
										<div class="lists_property_price_value">
											<h4 class="text-primary">$7,380</h4>
										</div>
									</div>
								</div>
							</div>

							<!-- List Sibar Property -->
							<div class="sides_list_property p-2">
								<div class="sides_list_property_thumb">
									<img src="assets/img/p-7.jpg" class="img-fluid" alt="">
								</div>
								<div class="sides_list_property_detail">
									<h4><a href="single-property-1.php">Curmic Studio For Office</a></h4>
									<span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Montreal,
										Canada</span>
									<div class="lists_property_price">
										<div class="lists_property_types">
											<div class="property_types_vlix buy">For Buy</div>
										</div>
										<div class="lists_property_price_value">
											<h4 class="text-primary">$8,730</h4>
										</div>
									</div>
								</div>
							</div>

							<!-- List Sibar Property -->
							<div class="sides_list_property p-2">
								<div class="sides_list_property_thumb">
									<img src="assets/img/p-5.jpg" class="img-fluid" alt="">
								</div>
								<div class="sides_list_property_detail">
									<h4><a href="single-property-1.php">Montreal Quebec City</a></h4>
									<span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Sreek View, New
										York</span>
									<div class="lists_property_price">
										<div class="lists_property_types">
											<div class="property_types_vlix">For Rent</div>
										</div>
										<div class="lists_property_price_value">
											<h4 class="text-primary">$6,240</h4>
										</div>
									</div>
								</div>
							</div>

							<div class="input-group">
								<a href="compare-property.html" class="btn btn-light-primary fw-medium full-width">View
									& Compare</a>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="pills-saved" role="tabpanel" aria-labelledby="pills-saved-tab" tabindex="0">
						<div class="sidebar_featured_property">

							<!-- List Sibar Property -->
							<div class="sides_list_property p-2">
								<div class="sides_list_property_thumb">
									<img src="assets/img/p-2.jpg" class="img-fluid" alt="">
								</div>
								<div class="sides_list_property_detail">
									<h4><a href="single-property-1.php">Loss vengel New Apartment</a></h4>
									<span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Sans
										Fransico</span>
									<div class="lists_property_price">
										<div class="lists_property_types">
											<div class="property_types_vlix sale">For Sale</div>
										</div>
										<div class="lists_property_price_value">
											<h4 class="text-primary">$4,240</h4>
										</div>
									</div>
								</div>
							</div>

							<!-- List Sibar Property -->
							<div class="sides_list_property p-2">
								<div class="sides_list_property_thumb">
									<img src="assets/img/p-3.jpg" class="img-fluid" alt="">
								</div>
								<div class="sides_list_property_detail">
									<h4><a href="single-property-1.php">Montreal Quriqe Apartment</a></h4>
									<span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Liverpool,
										London</span>
									<div class="lists_property_price">
										<div class="lists_property_types">
											<div class="property_types_vlix">For Rent</div>
										</div>
										<div class="lists_property_price_value">
											<h4 class="text-primary">$7,380</h4>
										</div>
									</div>
								</div>
							</div>

							<!-- List Sibar Property -->
							<div class="sides_list_property p-2">
								<div class="sides_list_property_thumb">
									<img src="assets/img/p-4.jpg" class="img-fluid" alt="">
								</div>
								<div class="sides_list_property_detail">
									<h4><a href="single-property-1.php">Curmic Studio For Office</a></h4>
									<span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Montreal,
										Canada</span>
									<div class="lists_property_price">
										<div class="lists_property_types">
											<div class="property_types_vlix buy">For Buy</div>
										</div>
										<div class="lists_property_price_value">
											<h4 class="text-primary">$8,730</h4>
										</div>
									</div>
								</div>
							</div>

							<!-- List Sibar Property -->
							<div class="sides_list_property p-2">
								<div class="sides_list_property_thumb">
									<img src="assets/img/p-27.jpg" class="img-fluid" alt="">
								</div>
								<div class="sides_list_property_detail">
									<h4><a href="single-property-1.php">Montreal Quebec City</a></h4>
									<span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Sreek View, New
										York</span>
									<div class="lists_property_price">
										<div class="lists_property_types">
											<div class="property_types_vlix">For Rent</div>
										</div>
										<div class="lists_property_price_value">
											<h4 class="text-primary">$6,240</h4>
										</div>
									</div>
								</div>
							</div>

							<div class="input-group">
								<a href="#" class="btn btn-light-primary fw-medium full-width">View & Compare</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->


		<!-- ============================ Hero Banner  Start================================== -->
		<div class="image-cover hero-banner" style="background:#eff6ff url(assets/img/city-banner.png) no-repeat;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-9 col-md-11 col-sm-12">
						<div class="inner-banner-text text-center">
							<h2>Search properties <span class="text-primary">for sale in </span> Pakistan</h2>
						</div>
						<div class="full-search-2 eclip-search italian-search hero-search-radius shadow-hard mt-5">
							<div class="hero-search-content">
								<div class="row">

									<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 b-r">
										<div class="form-group">
											<div class="choose-propert-type">
												<ul>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="radio" id="typbuy" name="typeprt">
															<label class="form-check-label" for="typbuy">
																For Buy
															</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="radio" id="typrent" name="typeprt" checked>
															<label class="form-check-label" for="typrent">
																For Rent
															</label>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 p-md-0 elio">
										<div class="form-group border-start borders">
											<div class="position-relative">
												<input type="text" class="form-control border-0 ps-5" placeholder="Search for a location">
												<div class="position-absolute top-50 start-0 translate-middle-y ms-2">
													<span class="svg-icon text-primary svg-icon-2hx">
														<svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
															<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
														</svg>
													</span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-1 col-lg-1 col-md-1 col-sm-2">
										<div class="form-group">
											<a class="collapsed ad-search" data-bs-toggle="collapse" data-bs-parent="#search" data-bs-target="#advance-search" href="javascript:void(0);" aria-expanded="false" aria-controls="advance-search"><i class="fa fa-sliders-h"></i></a>
										</div>
									</div>

									<div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
										<div class="form-group">
											<button type="button" class="btn btn-dark full-width">Search</button>
										</div>
									</div>

								</div>
								<!-- Collapse Advance Search Form -->
								<div class="collapse" id="advance-search" aria-expanded="false" role="banner">

									<!-- row -->
									<div class="row">

										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group mb-2">
												<div class="input-with-icon">
													<select id="town" class="form-control">
														<option value="">&nbsp;</option>
														<option value="1">Any Town</option>
														<option value="2">Toronto</option>
														<option value="3">Montreal</option>
														<option value="4">Alberta</option>
														<option value="5">Ontario</option>
														<option value="6">Ottawa</option>
													</select>
													<i class="fa-solid fa-location-dot"></i>
												</div>
											</div>
										</div>

										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group mb-2">
												<div class="input-with-icon">
													<select id="bedrooms" class="form-control">
														<option value="">&nbsp;</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
													<i class="fas fa-bed"></i>
												</div>
											</div>
										</div>

										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group mb-2">
												<div class="input-with-icon">
													<select id="bathrooms" class="form-control">
														<option value="">&nbsp;</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
													<i class="fas fa-bath"></i>
												</div>
											</div>
										</div>

									</div>
									<!-- /row -->

									<!-- row -->
									<div class="row">

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="form-group mb-2">
												<input type="text" class="form-control" placeholder="min price" />
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="form-group mb-2">
												<input type="text" class="form-control" placeholder="max price" />
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="form-group mb-2">
												<input type="text" class="form-control" placeholder="min sqft" />
											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-6">
											<div class="form-group mb-2">
												<input type="text" class="form-control" placeholder="max sqft" />
											</div>
										</div>

									</div>
									<!-- /row -->

									<!-- row -->
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
											<h6>Advance Price</h6>
											<div class="rg-slider">
												<input type="text" class="js-range-slider" name="my_range" value="" />
											</div>
										</div>
									</div>
									<!-- /row -->

									<!-- row -->
									<div class="row">

										<div class="col-lg-12 col-md-12 col-sm-12 mt-3">
											<h4 class="text-dark">Amenities & Features</h4>
											<ul class="no-ul-list third-row">
												<li>
													<input id="a-1" class="form-check-input" name="a-1" type="checkbox">
													<label for="a-1" class="form-check-label">Air Condition</label>
												</li>
												<li>
													<input id="a-2" class="form-check-input" name="a-2" type="checkbox">
													<label for="a-2" class="form-check-label">Bedding</label>
												</li>
												<li>
													<input id="a-3" class="form-check-input" name="a-3" type="checkbox">
													<label for="a-3" class="form-check-label">Heating</label>
												</li>
												<li>
													<input id="a-4" class="form-check-input" name="a-4" type="checkbox">
													<label for="a-4" class="form-check-label">Internet</label>
												</li>
												<li>
													<input id="a-5" class="form-check-input" name="a-5" type="checkbox">
													<label for="a-5" class="form-check-label">Microwave</label>
												</li>
												<li>
													<input id="a-6" class="form-check-input" name="a-6" type="checkbox">
													<label for="a-6" class="form-check-label">Smoking Allow</label>
												</li>
												<li>
													<input id="a-7" class="form-check-input" name="a-7" type="checkbox">
													<label for="a-7" class="form-check-label">Terrace</label>
												</li>
												<li>
													<input id="a-8" class="form-check-input" name="a-8" type="checkbox">
													<label for="a-8" class="form-check-label">Balcony</label>
												</li>
												<li>
													<input id="a-9" class="form-check-input" name="a-9" type="checkbox">
													<label for="a-9" class="form-check-label">Icon</label>
												</li>
												<li>
													<input id="a-10" class="form-check-input" name="a-10" type="checkbox">
													<label for="a-10" class="form-check-label">Wi-Fi</label>
												</li>
												<li>
													<input id="a-11" class="form-check-input" name="a-11" type="checkbox">
													<label for="a-11" class="form-check-label">Beach</label>
												</li>
												<li>
													<input id="a-12" class="form-check-input" name="a-12" type="checkbox">
													<label for="a-12" class="form-check-label">Parking</label>
												</li>
											</ul>
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

		<!-- ============================ Category Start ================================== -->
		<section>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7 col-md-10 text-center">
						<div class="sec-heading center my-4">
							<h2>Explore categories</h2>
						</div>
					</div>
				</div>

				<div class="row justify-content-center gx-3 gy-3">
				<?php
// Assuming $db is your database connection
$sql = "SELECT * FROM categories ORDER BY id DESC LIMIT 8";
$query = mysqli_query($db, $sql);

// Check if the query executed successfully
if (!$query) {
    die("Query failed: " . mysqli_error($db));
}

// Fetch and display the results
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
					?>
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="classical-cats-wrap d-flex align-items-center">
							<a class="classical-cats-boxs d-flex align-items-center w-100" href="calculator.html">
								<div class="classical-cats-icon px-4 py-4 rounded bg-light-success text-success fs-2">
									<i class="fa-solid fa-house"></i>
								</div>
								<div class="classical-cats-wrap-content ms-3">
									<h4><?=$row['name']?></h4>
									
								</div>
							</a>
						</div>
					</div>
<?php 
    }
} else {
    echo "No categories found.";
}
?>

				</div>
			</div>

		</section>
		<div class="clearfix"></div>
		<!-- ============================ Titanum Category================================== -->


		<section>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7 col-md-10 text-center">
						<div class="sec-heading center my-4">
							<h2>Titanium Agencies</h2>
						</div>
					</div>
				</div>

				<div class="carousel-container">
					<button class="carousel-button prev">
						<img src="assets/img/partners/iconArrowInCircle_noinline.96b514aae0bafa74b5ff0d319b153426.svg" alt="Left Arrow Icon" width="30px">
					</button>
					<div class="carousel-track-container">
						<div class="carousel-track">
							<div class="carousel-slide current-slide">
								<div class="row justify-content-center gx-3 gy-3">
									<!-- 1st row with 4 boxes -->
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<div class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-warning text-warning fs-2">
													<i class="fa-solid fa-building"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Apartment</h4>
													<p><i class="fa-solid fa-location-dot"></i> <a href="404.html">lahore</a></p>
												</div>
											</div>
										</div>
									</div>





									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-warning text-warning fs-2">
													<i class="fa-solid fa-building"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Apartment</h4>
													<p>16 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
													<i class="fa-solid fa-building-shield"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Townhouse</h4>
													<p>22 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-info text-primary fs-2">
													<i class="fa-solid fa-synagogue"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Villa</h4>
													<p>18 Properties</p>
												</div>
											</a>
										</div>
									</div>
								</div>
								<div class="row justify-content-center gx-3 gy-3">
									<!-- 2nd row with 4 boxes -->
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-success text-success fs-2">
													<i class="fa-solid fa-mosque"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Offices</h4>
													<p>42 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
													<i class="fa-solid fa-tree-city"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Warehouses</h4>
													<p>63 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
													<i class="fa-solid fa-tree-city"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Warehouses</h4>
													<p>63 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
													<i class="fa-solid fa-tree-city"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Warehouses</h4>
													<p>63 Properties</p>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Additional carousel-slide sections for more boxes -->
							<div class="carousel-slide">
								<div class="row justify-content-center gx-3 gy-3">
									<!-- 3rd row with 4 boxes -->
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-success text-success fs-2">
													<i class="fa-solid fa-warehouse"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Retail</h4>
													<p>5 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-warning text-warning fs-2">
													<i class="fa-solid fa-hotel"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Hotel</h4>
													<p>7 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
										
												<i class="fa-solid fa-gas-pump"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Gas Station</h4>
													<p>3 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-info text-primary fs-2">
													<i class="fa-solid fa-warehouse-alt"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Industrial</h4>
													<p>9 Properties</p>
												</div>
											</a>
										</div>
									</div>
								</div>
								<div class="row justify-content-center gx-3 gy-3">
									<!-- 4th row with 4 boxes -->
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-success text-success fs-2">
													<i class="fa-solid fa-church"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Church</h4>
													<p>11 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-warning text-warning fs-2">
													<i class="fa-solid fa-school"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>School</h4>
													<p>14 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-danger text-danger fs-2">
													<i class="fa-solid fa-hospital"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Hospital</h4>
													<p>20 Properties</p>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="classical-cats-wrap d-flex align-items-center">
											<a class="classical-cats-boxs d-flex align-items-center w-100">
												<div class="classical-cats-icon px-4 py-4 rounded bg-light-info text-primary fs-2">
													<i class="fa-solid fa-stadium"></i>
												</div>
												<div class="classical-cats-wrap-content ms-3">
													<h4>Stadium</h4>
													<p>8 Properties</p>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Additional carousel-slide sections can be added here for more slides -->
						</div>
					</div>
					<button class="carousel-button next">
						<img src="assets/img/partners/iconArrowInCircle_noinline.96b514aae0bafa74b5ff0d319b153426.svg" alt="Right Arrow Icon" width="30px">
					</button>
				</div>
			</div>
		</section>
		<!-- ============================ Category End ================================== -->


		<!-- ============================ Property Location Start ================================== -->
		<section class="pt-0">
			<div class="container">

				<div class="row justify-content-center">
					<div class="col-xl-6 col-lg-7 col-md-10 text-center">
						<div class="sec-heading center">
							<h2>Find Best Locations</h2>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
								voluptatum deleniti atque corrupti quos dolores</p>
						</div>
					</div>
				</div>

				<div class="row justify-content-center g-xl-4 g-md-3 g-4">

				<?php
// Assuming $db is your database connection
$sql = "SELECT * FROM location ORDER BY id DESC";
$query = mysqli_query($db, $sql);

// Check if the query executed successfully
if (!$query) {
    die("Query failed: " . mysqli_error($db));
}

// Check if there are any results
if (mysqli_num_rows($query) > 0) {
    // Loop through and display the results
    while ($row = mysqli_fetch_array($query)) {
?>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
            <div class="location-property-wrap rounded-4 p-2">
                <div class="location-property-thumb rounded-4">
                    <a href="listings-list-with-sidebar.php"><img src="<?=$row['images']?>" class="img-fluid" alt="" /></a>
                </div>
                <div class="location-property-content">
                    <div class="lp-content-flex">
                        <h4 class="lp-content-title"><?=$row['name']?></h4>
						<?php 
						$id = $row['id'];
						$ads_sql = "SELECT * FROM ads WHERE location_id = '$id'";
						$ads_query = mysqli_query($db, $ads_sql);
						
						// Check if the query executed successfully
						if (!$ads_query) {
						    die("Query failed: " . mysqli_error($db));
						}
						
						$num_properties = mysqli_num_rows($ads_query);
						?>
                        <span class="text-muted-2"><?=$num_properties?> Properties</span>
                    </div>
                    <div class="lp-content-right">
                        <a href="listings-list-with-sidebar.php" class="text-primary">
                            <span class="svg-icon svg-icon-2hx">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                                    <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "No locations found.";
}
?>



				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 text-center mt-5">
						<a href="listings-list-with-sidebar.php" class="btn btn-primary px-md-5 rounded">Browse More
							Locations</a>
					</div>
				</div>

			</div>
		</section>
		<!-- ============================ Property Location End ================================== -->


		<!-- ================================ All Property ========================================= -->
		<section class="gray-simple">
			<div class="container">

				<div class="row justify-content-center">
					<div class="col-xl-6 col-lg-7 col-md-10 text-center">
						<div class="sec-heading mss">
							<h2>Featured Property For Sale</h2>
							<p>At vero eos et accusamus dignissimos ducimus</p>
						</div>
					</div>
				</div>

				<div class="row justify-content-center g-4">

					<!-- Single Property -->
					<?php 
					foreach ( $properties as $property){
						$images = $property['images'];
						$meta = $property['meta'];
						// dd($property);
						echo Ad::get_ad_card_html($property);
					
					} ?>

					<!-- Single Property -->
					<!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="property-listing card border-0 rounded-3">

							<div class="listing-img-wrapper p-3">
								<div class="position-relative">
									<div class="position-absolute top-0 left-0 ms-3 mt-3 z-1">
										<div class="label bg-purple text-light d-inline-flex align-items-center justify-content-center">
											<span class="svg-icon text-light svg-icon-2hx me-1">
												<svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
													<path d="M12.0006 11.1542C13.1434 11.1542 14.0777 10.22 14.0777 9.0771C14.0777 7.93424 13.1434 7 12.0006 7C10.8577 7 9.92348 7.93424 9.92348 9.0771C9.92348 10.22 10.8577 11.1542 12.0006 11.1542Z" fill="currentColor" />
													<path d="M15.5652 13.814C15.5108 13.6779 15.4382 13.551 15.3566 13.4331C14.9393 12.8163 14.2954 12.4081 13.5697 12.3083C13.479 12.2993 13.3793 12.3174 13.3067 12.3718C12.9257 12.653 12.4722 12.7981 12.0006 12.7981C11.5289 12.7981 11.0754 12.653 10.6944 12.3718C10.6219 12.3174 10.5221 12.2902 10.4314 12.3083C9.70578 12.4081 9.05272 12.8163 8.64456 13.4331C8.56293 13.551 8.49036 13.687 8.43595 13.814C8.40875 13.8684 8.41781 13.9319 8.44502 13.9864C8.51759 14.1133 8.60828 14.2403 8.68991 14.3492C8.81689 14.5215 8.95295 14.6757 9.10715 14.8208C9.23413 14.9478 9.37925 15.0657 9.52439 15.1836C10.2409 15.7188 11.1026 15.9999 11.9915 15.9999C12.8804 15.9999 13.7421 15.7188 14.4586 15.1836C14.6038 15.0748 14.7489 14.9478 14.8759 14.8208C15.021 14.6757 15.1661 14.5215 15.2931 14.3492C15.3838 14.2312 15.4655 14.1133 15.538 13.9864C15.5833 13.9319 15.5924 13.8684 15.5652 13.814Z" fill="currentColor" />
												</svg>
											</span>SuperAgent
										</div>
									</div>
									<div class="list-img-slide">
										<div class="click mb-0 rounded-3 overflow-hidden">
											<div><a href="single-property-1.php"><img src="assets/img/p-2.jpg" class="img-fluid" alt="" /></a></div>
											<div><a href="single-property-1.php"><img src="assets/img/p-6.jpg" class="img-fluid" alt="" /></a></div>
											<div><a href="single-property-1.php"><img src="assets/img/p-8.jpg" class="img-fluid" alt="" /></a></div>
										</div>
									</div>
								</div>
							</div>

							<div class="listing-caption-wrapper px-3">
								<div class="listing-detail-wrapper">
									<div class="listing-short-detail-wrap">
										<div class="listing-short-detail">
											<div class="d-flex align-items-center mb-1">
												<span class="label bg-light-success text-success prt-type me-2">For
													Rent</span><span class="label bg-light-purple text-purple property-cats">Apartment</span>
											</div>
											<h4 class="listing-name fw-semibold fs-6 mb-0"><a href="single-property-1.php" class="prt-link-detail">Purple
													Flatiron House</a></h4>
											<div class="prt-location text-muted-2">
												<span class="svg-icon svg-icon-2hx">
													<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"></path>
														<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path>
													</svg>
												</span>
												210 Zirak Road, Canada
											</div>
										</div>
									</div>
								</div>

								<div class="price-features-wrapper d-flex align-items-center justify-content-between my-4">
									<div class="listing-short-detail-flex">
										<h6 class="listing-card-info-price text-primary ps-0 m-0">$67,000</h6>
									</div>
									<div class="lst-short-btns-groups d-flex align-items-center">
										<a href="JavaScript:Void(0);" class="square--50 circle text-primary bg-light-primary me-2"><i class="fa-solid fa-code-compare"></i></a>
										<a href="JavaScript:Void(0);" class="square--50 circle text-success bg-light-success me-2"><i class="fa-solid fa-envelope-open-text"></i></a>
										<a href="JavaScript:Void(0);" class="square--50 circle text-danger bg-light-danger"><i class="fa-solid fa-heart-circle-check"></i></a>
									</div>
								</div>
							</div>
							<div class="lst-detail-footer d-flex align-items-center justify-content-between border-top py-2 px-3">
								<div class="footer-first">
									<div class="foot-reviews-wrap">
										<div class="foot-reviews-stars">
											<span><i class="fa-solid fa-star text-warning fs-sm"></i></span>
											<span><i class="fa-solid fa-star text-warning fs-sm"></i></span>
											<span><i class="fa-solid fa-star text-warning fs-sm"></i></span>
											<span><i class="fa-solid fa-star text-warning fs-sm"></i></span>
											<span><i class="fa-solid fa-star text-warning fs-sm"></i></span>
										</div>
										<div class="foot-reviews-subtitle">
											<span class="text-muted">102 Reviews</span>
										</div>
									</div>
								</div>
								<div class="footer-flex">
									<div class="list-fx-features d-flex align-items-center justify-content-between m-0">
										<div class="listing-card d-flex align-items-center me-3">
											<div class="square--30 text-muted-2 fs-sm circle gray-simple me-2"><i class="fa-solid fa-building-shield fs-sm"></i></div><span class="text-muted-2">3BHK</span>
										</div>
										<div class="listing-card d-flex align-items-center">
											<div class="square--30 text-muted-2 fs-sm circle gray-simple me-2"><i class="fa-solid fa-clone fs-sm"></i></div><span class="text-muted-2">1800 SQFT</span>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div> -->
					<!-- End Single Property -->

					

				</div>

				<div class="row align-items-center justify-content-center">
					<div class="col-lg-12 col-md-12 col-sm-12 text-center mt-5">
						<a href="listings-list-with-sidebar.php" class="btn btn-primary px-md-5 rounded">Browse More
							Properties</a>
					</div>
				</div>

			</div>
		</section>
		<!-- ============================ All Featured Property ================================== -->


		<!-- ============================ Explore Featured Agents Start ================================== -->
		<section>
			<div class="container">

				<div class="row justify-content-center">
					<div class="col-lg-7 col-md-10 text-center">
						<div class="sec-heading center">
							<h2>Explore Featured Agents</h2>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
								voluptatum deleniti atque corrupti quos dolores</p>
						</div>
					</div>
				</div>

				<div class="row justify-content-center g-4">

					<!-- Single Agent -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="agents-grid card rounded-3 shadow">

							<div class="agents-grid-wrap">
								<div class="fr-grid-thumb mx-auto text-center mt-5 mb-3">
									<a href="agent-page.php" class="d-inline-flex p-1 circle border">
										<img src="assets/img/user-1.png" class="img-fluid circle" width="130" alt="" />
									</a>
								</div>
								<div class="fr-grid-deatil text-center">
									<div class="fr-grid-deatil-flex">
										<h5 class="fr-can-name mb-0"><a href="#">James N. Green</a></h5>
										<span class="agent-property text-muted-2">117 Properties</span>
									</div>
								</div>
							</div>

							<div class="fr-grid-info d-flex align-items-center justify-content-between px-4 py-4">
								<div class="fr-grid-sder">
									<ul class="p-0">
										<li><strong>Call:</strong><span class="fw-medium text-primary ms-2">1234567859</span></li>
										<li>
											<div class="fr-can-rating">
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-muted"></i>
												<span class="reviews_text fs-sm text-muted-2">(42 Reviews)</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="fr-grid-deatil-flex-right">
									<div class="agent-email"><a href="#" class="square--50 rounded text-danger bg-light-danger"><i class="fa-solid fa-envelope-circle-check"></i></a></div>
								</div>
							</div>

						</div>
					</div>

					<!-- Single Agent -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="agents-grid card rounded-3 shadow">

							<div class="agents-grid-wrap">
								<div class="fr-grid-thumb mx-auto text-center mt-5 mb-3">
									<a href="agent-page.php" class="d-inline-flex p-1 circle border">
										<img src="assets/img/user-2.png" class="img-fluid circle" width="130" alt="" />
									</a>
								</div>
								<div class="fr-grid-deatil text-center">
									<div class="fr-grid-deatil-flex">
										<h5 class="fr-can-name mb-0"><a href="#">Seema Gauranki</a></h5>
										<span class="agent-property text-muted-2">46 Properties</span>
									</div>
								</div>
							</div>

							<div class="fr-grid-info d-flex align-items-center justify-content-between px-4 py-4">
								<div class="fr-grid-sder">
									<ul class="p-0">
										<li><strong>Call:</strong><span class="fw-medium text-primary ms-2">1234567859</span></li>
										<li>
											<div class="fr-can-rating">
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-muted"></i>
												<span class="reviews_text fs-sm text-muted-2">(33 Reviews)</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="fr-grid-deatil-flex-right">
									<div class="agent-email"><a href="#" class="square--50 rounded text-danger bg-light-danger"><i class="fa-solid fa-envelope-circle-check"></i></a></div>
								</div>
							</div>

						</div>
					</div>

					<!-- Single Agent -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="agents-grid card rounded-3 shadow">

							<div class="agents-grid-wrap">
								<div class="fr-grid-thumb mx-auto text-center mt-5 mb-3">
									<a href="agent-page.php" class="d-inline-flex p-1 circle border">
										<img src="assets/img/user-3.png" class="img-fluid circle" width="130" alt="" />
									</a>
								</div>
								<div class="fr-grid-deatil text-center">
									<div class="fr-grid-deatil-flex">
										<h5 class="fr-can-name mb-0"><a href="#">Adam Walcorn</a></h5>
										<span class="agent-property text-muted-2">38 Properties</span>
									</div>
								</div>
							</div>

							<div class="fr-grid-info d-flex align-items-center justify-content-between px-4 py-4">
								<div class="fr-grid-sder">
									<ul class="p-0">
										<li><strong>Call:</strong><span class="fw-medium text-primary ms-2">1234567859</span></li>
										<li>
											<div class="fr-can-rating">
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-muted"></i>
												<span class="reviews_text fs-sm text-muted-2">(16 Reviews)</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="fr-grid-deatil-flex-right">
									<div class="agent-email"><a href="#" class="square--50 rounded text-danger bg-light-danger"><i class="fa-solid fa-envelope-circle-check"></i></a></div>
								</div>
							</div>

						</div>
					</div>

					<!-- Single Agent -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="agents-grid card rounded-3 shadow">

							<div class="agents-grid-wrap">
								<div class="fr-grid-thumb mx-auto text-center mt-5 mb-3">
									<a href="agent-page.php" class="d-inline-flex p-1 circle border">
										<img src="assets/img/user-4.png" class="img-fluid circle" width="130" alt="" />
									</a>
								</div>
								<div class="fr-grid-deatil text-center">
									<div class="fr-grid-deatil-flex">
										<h5 class="fr-can-name mb-0"><a href="#">Jasmin Khatri</a></h5>
										<span class="agent-property text-muted-2">51 Properties</span>
									</div>
								</div>
							</div>

							<div class="fr-grid-info d-flex align-items-center justify-content-between px-4 py-4">
								<div class="fr-grid-sder">
									<ul class="p-0">
										<li><strong>Call:</strong><span class="fw-medium text-primary ms-2">1234567859</span></li>
										<li>
											<div class="fr-can-rating">
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-muted"></i>
												<span class="reviews_text fs-sm text-muted-2">(28 Reviews)</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="fr-grid-deatil-flex-right">
									<div class="agent-email"><a href="#" class="square--50 rounded text-danger bg-light-danger"><i class="fa-solid fa-envelope-circle-check"></i></a></div>
								</div>
							</div>

						</div>
					</div>

					<!-- Single Agent -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="agents-grid card rounded-3 shadow">

							<div class="agents-grid-wrap">
								<div class="fr-grid-thumb mx-auto text-center mt-5 mb-3">
									<a href="agent-page.php" class="d-inline-flex p-1 circle border">
										<img src="assets/img/user-5.png" class="img-fluid circle" width="130" alt="" />
									</a>
								</div>
								<div class="fr-grid-deatil text-center">
									<div class="fr-grid-deatil-flex">
										<h5 class="fr-can-name mb-0"><a href="#">Rudra K. Mathan</a></h5>
										<span class="agent-property text-muted-2">75 Properties</span>
									</div>
								</div>
							</div>

							<div class="fr-grid-info d-flex align-items-center justify-content-between px-4 py-4">
								<div class="fr-grid-sder">
									<ul class="p-0">
										<li><strong>Call:</strong><span class="fw-medium text-primary ms-2">1234567859</span></li>
										<li>
											<div class="fr-can-rating">
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-muted"></i>
												<span class="reviews_text fs-sm text-muted-2">(52 Reviews)</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="fr-grid-deatil-flex-right">
									<div class="agent-email"><a href="#" class="square--50 rounded text-danger bg-light-danger"><i class="fa-solid fa-envelope-circle-check"></i></a></div>
								</div>
							</div>

						</div>
					</div>

					<!-- Single Agent -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="agents-grid card rounded-3 shadow">

							<div class="agents-grid-wrap">
								<div class="fr-grid-thumb mx-auto text-center mt-5 mb-3">
									<a href="agent-page.php" class="d-inline-flex p-1 circle border">
										<img src="assets/img/user-6.png" class="img-fluid circle" width="130" alt="" />
									</a>
								</div>
								<div class="fr-grid-deatil text-center">
									<div class="fr-grid-deatil-flex">
										<h5 class="fr-can-name mb-0"><a href="#">Niharika Muthurk</a></h5>
										<span class="agent-property text-muted-2">15 Properties</span>
									</div>
								</div>
							</div>

							<div class="fr-grid-info d-flex align-items-center justify-content-between px-4 py-4">
								<div class="fr-grid-sder">
									<ul class="p-0">
										<li><strong>Call:</strong><span class="fw-medium text-primary ms-2">1234567859</span></li>
										<li>
											<div class="fr-can-rating">
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-muted"></i>
												<span class="reviews_text fs-sm text-muted-2">(46 Reviews)</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="fr-grid-deatil-flex-right">
									<div class="agent-email"><a href="#" class="square--50 rounded text-danger bg-light-danger"><i class="fa-solid fa-envelope-circle-check"></i></a></div>
								</div>
							</div>

						</div>
					</div>

					<!-- Single Agent -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="agents-grid card rounded-3 shadow">

							<div class="agents-grid-wrap">
								<div class="fr-grid-thumb mx-auto text-center mt-5 mb-3">
									<a href="agent-page.php" class="d-inline-flex p-1 circle border">
										<img src="assets/img/user-7.png" class="img-fluid circle" width="130" alt="" />
									</a>
								</div>
								<div class="fr-grid-deatil text-center">
									<div class="fr-grid-deatil-flex">
										<h5 class="fr-can-name mb-0"><a href="#">Grack Chappel</a></h5>
										<span class="agent-property text-muted-2">17 Properties</span>
									</div>
								</div>
							</div>

							<div class="fr-grid-info d-flex align-items-center justify-content-between px-4 py-4">
								<div class="fr-grid-sder">
									<ul class="p-0">
										<li><strong>Call:</strong><span class="fw-medium text-primary ms-2">1234567859</span></li>
										<li>
											<div class="fr-can-rating">
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-muted"></i>
												<span class="reviews_text fs-sm text-muted-2">(102 Reviews)</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="fr-grid-deatil-flex-right">
									<div class="agent-email"><a href="#" class="square--50 rounded text-danger bg-light-danger"><i class="fa-solid fa-envelope-circle-check"></i></a></div>
								</div>
							</div>

						</div>
					</div>

					<!-- Single Agent -->
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="agents-grid card rounded-3 shadow">

							<div class="agents-grid-wrap">
								<div class="fr-grid-thumb mx-auto text-center mt-5 mb-3">
									<a href="agent-page.php" class="d-inline-flex p-1 circle border">
										<img src="assets/img/user-8.png" class="img-fluid circle" width="130" alt="" />
									</a>
								</div>
								<div class="fr-grid-deatil text-center">
									<div class="fr-grid-deatil-flex">
										<h5 class="fr-can-name mb-0"><a href="#">Nikita Rajaswi</a></h5>
										<span class="agent-property text-muted-2">62 Properties</span>
									</div>
								</div>
							</div>

							<div class="fr-grid-info d-flex align-items-center justify-content-between px-4 py-4">
								<div class="fr-grid-sder">
									<ul class="p-0">
										<li><strong>Call:</strong><span class="fw-medium text-primary ms-2">1234567859</span></li>
										<li>
											<div class="fr-can-rating">
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-warning"></i>
												<i class="fas fa-star fs-xs text-muted"></i>
												<span class="reviews_text fs-sm text-muted-2">(18 Reviews)</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="fr-grid-deatil-flex-right">
									<div class="agent-email"><a href="#" class="square--50 rounded text-danger bg-light-danger"><i class="fa-solid fa-envelope-circle-check"></i></a></div>
								</div>
							</div>

						</div>
					</div>

				</div>

				<!-- Pagination -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 text-center mt-5">
						<a href="listings-list-with-sidebar.php" class="btn btn-primary px-lg-5 rounded">Explore More
							Agents</a>
					</div>
				</div>

			</div>
		</section>
		<div class="clearfix"></div>
		<!-- ============================ Explore Featured Agents End ================================== -->



		<!-- ============================ Smart Testimonials ================================== -->
		<section class="gray-bg">
			<div class="container">

				<div class="row justify-content-center">
					<div class="col-lg-7 col-md-10 text-center">
						<div class="sec-heading center">
							<h2>Good Reviews by Customers</h2>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
								voluptatum deleniti atque corrupti quos dolores</p>
						</div>
					</div>
				</div>

				<div class="row justify-content-center">

					<div class="col-lg-12 col-md-12">

						<div class="smart-textimonials smart-center" id="smart-textimonials">

							<!-- Single Item -->
							<div class="item">
								<div class="item-box">
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<div class="quotes bg-primary"><i class="fa-solid fa-quote-left"></i>
												</div>
												<img src="assets/img/user-3.png" class="img-fluid" alt="" />
											</div>
										</div>
									</div>

									<div class="smart-tes-content">
										<p>Cicero famously orated against his political opponent Lucius Sergius
											Catilina. Occasionally the first Oration against Catiline is taken
											specimens.</p>
									</div>

									<div class="st-author-info">
										<h4 class="st-author-title">Adam Williams</h4>
										<span class="st-author-subtitle">CEO Of Microwoft</span>
									</div>
								</div>
							</div>

							<!-- Single Item -->
							<div class="item">
								<div class="item-box">
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<div class="quotes bg-success"><i class="fa-solid fa-quote-left"></i>
												</div>
												<img src="assets/img/user-8.png" class="img-fluid" alt="" />
											</div>
										</div>
									</div>

									<div class="smart-tes-content">
										<p>Cicero famously orated against his political opponent Lucius Sergius
											Catilina. Occasionally the first Oration against Catiline is taken
											specimens.</p>
									</div>

									<div class="st-author-info">
										<h4 class="st-author-title">Retha Deowalim</h4>
										<span class="st-author-subtitle">CEO Of Apple</span>
									</div>
								</div>
							</div>

							<!-- Single Item -->
							<div class="item">
								<div class="item-box">
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<div class="quotes bg-purple"><i class="fa-solid fa-quote-left"></i>
												</div>
												<img src="assets/img/user-4.png" class="img-fluid" alt="" />
											</div>
										</div>
									</div>

									<div class="smart-tes-content">
										<p>Cicero famously orated against his political opponent Lucius Sergius
											Catilina. Occasionally the first Oration against Catiline is taken
											specimens.</p>
									</div>

									<div class="st-author-info">
										<h4 class="st-author-title">Sam J. Wasim</h4>
										<span class="st-author-subtitle">Pio Founder</span>
									</div>
								</div>
							</div>

							<!-- Single Item -->
							<div class="item">
								<div class="item-box">
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<div class="quotes bg-seegreen"><i class="fa-solid fa-quote-left"></i>
												</div>
												<img src="assets/img/user-5.png" class="img-fluid" alt="" />
											</div>
										</div>
									</div>

									<div class="smart-tes-content">
										<p>Cicero famously orated against his political opponent Lucius Sergius
											Catilina. Occasionally the first Oration against Catiline is taken
											specimens.</p>
									</div>

									<div class="st-author-info">
										<h4 class="st-author-title">Usan Gulwarm</h4>
										<span class="st-author-subtitle">CEO Of Facewarm</span>
									</div>
								</div>
							</div>

							<!-- Single Item -->
							<div class="item">
								<div class="item-box">
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<div class="quotes bg-danger"><i class="fa-solid fa-quote-left"></i>
												</div>
												<img src="assets/img/user-6.png" class="img-fluid" alt="" />
											</div>
										</div>
									</div>

									<div class="smart-tes-content">
										<p>Cicero famously orated against his political opponent Lucius Sergius
											Catilina. Occasionally the first Oration against Catiline is taken
											specimens.</p>
									</div>

									<div class="st-author-info">
										<h4 class="st-author-title">Shilpa Shethy</h4>
										<span class="st-author-subtitle">CEO Of Zapple</span>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- ============================ Smart Testimonials End ================================== -->



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
		$(document).ready(function() {
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
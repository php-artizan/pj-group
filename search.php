<?php 
require "config/global.php";
// if(!isset($_GET['slug'])){
// 	redirect(ROOT_PATH, '');
// }
// $slug = $_GET['slug'];
// if($slug==""){
// 	redirect(ROOT_PATH, '');
// } 

unset($_GET['submit']);

$query_params = $_GET;
// dd($query_params);


$search_results = Ad::search($query_params);
dd($search_results);



?>
<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from shreethemes.net/resido-live/resido/listings-list-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jun 2024 15:38:02 GMT -->
<?php
include("include/head.php");
?>
	
    <body class="blue-skin">
	
		 <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
            <?php
                include("include/header.php");
                ?>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ All Property ================================== -->
			<section class="gray-simple">
			
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="filter_search_opt">
								<a href="javascript:void(0);" class="btn btn-dark full-width mb-4" onclick="openFilterSearch()">
									<span class="svg-icon text-light svg-icon-2hx me-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"/>
										</svg>
									</span>Open Filter Option
								</a>
							</div>
						</div>
					</div>
					
					<div class="row">
					
						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="simple-sidebar sm-sidebar" id="filter_search"  style="left:0;">							
							
								<div class="search-sidebar_header">
									<h4 class="ssh_heading">Close Filter</h4>
									<button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i class="fa-regular fa-circle-xmark fs-5 text-muted-2"></i></button>
								</div>
								
								<!-- Find New Property -->
								<div class="sidebar-widgets">
									
									<div class="search-inner p-0">
										
										<div class="filter-search-box">
											<div class="form-group">
												<div class="position-relative">
													<input type="text" class="form-control rounded-3 ps-5" placeholder="Search by space name…">
													<div class="position-absolute top-50 start-0 translate-middle-y ms-2">
														<span class="svg-icon text-primary svg-icon-2hx">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
																<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"/>
															</svg>
														</span>	
													</div>
												</div>
											</div>
										</div>
										
										<div class="position-relative d-flex flex-xl-row flex-column align-items-center">
											<div class="verifyd-prt-block flex-fill full-width my-1 me-1">
												<div class="d-flex align-items-center justify-content-center justify-content-between border rounded-3 px-2 py-3">
													<div class="eliok-cliops d-flex align-items-center">
														<span class="svg-icon text-success svg-icon-2hx">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"/>
																<path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"/>
															</svg>
														</span><span class="text-muted-2 fw-medium ms-1">Verified</span>
													</div>
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
														<label class="form-check-label" for="flexSwitchCheckChecked"></label>
													</div>
												</div>
											</div>
											
											<div class="super-agt-block flex-fill full-width my-1 ms-1">
												<div class="d-flex align-items-center justify-content-center justify-content-between border rounded-3 px-2 py-3">
													<div class="eliok-cliops d-flex align-items-center">
														<span class="svg-icon text-warning svg-icon-2hx">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor"/>
																<path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"/>
															</svg>
														</span><span class="text-muted-2 fw-medium ms-1">SuperAgent</span>
													</div>
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
														<label class="form-check-label" for="flexSwitchCheckChecked"></label>
													</div>
												</div>
												
											</div>
										</div>
										
										<div class="filter_wraps">
											
											<!-- Single Search -->
											<div class="single_search_boxed">
												<div class="widget-boxed-header">
													<h4>
														<a href="#where" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed">Where<span class="selected">Chicago</span></a>
													</h4>
													
												</div>
												<div class="widget-boxed-body collapse" id="where" data-parent="#where">
													<div class="side-list no-border">
														<!-- Single Filter Card -->
														<div class="single_filter_card">
															<div class="card-body pt-0">
																<div class="inner_widget_link">
																	<ul class="no-ul-list filter-list">
																		<li class="form-check">
																			<input id="b1" class="form-check-input" name="where" type="radio">
																			<label for="b1" class="form-check-label">Atlanta</label>
																		</li>
																		<li class="form-check">
																			<input id="b2" class="form-check-input" name="where" type="radio">
																			<label for="b2" class="form-check-label">Austin</label>
																		</li>
																		<li class="form-check">
																			<input id="b3" class="form-check-input" name="where" type="radio">
																			<label for="b3" class="form-check-label">Boston</label>
																		</li>
																		<li class="form-check">
																			<input id="b4" class="form-check-input" name="where" type="radio" checked>
																			<label for="b4" class="form-check-label">Chicago</label>
																		</li>
																		<li class="form-check">
																			<input id="b5" class="form-check-input" name="where" type="radio">
																			<label for="b5" class="form-check-label">Dallas</label>
																		</li>
																		<li class="form-check">
																			<input id="b6" class="form-check-input" name="where" type="radio">
																			<label for="b6" class="form-check-label">Denver</label>
																		</li>
																		<li class="form-check">
																			<input id="b7" class="form-check-input" name="where" type="radio">
																			<label for="b7" class="form-check-label">Houston</label>
																		</li>
																		<li class="form-check">
																			<input id="b8" class="form-check-input" name="where" type="radio">
																			<label for="b8" class="form-check-label">Jacksonville</label>
																		</li>
																		<li class="form-check">
																			<input id="b9" class="form-check-input" name="where" type="radio">
																			<label for="b9" class="form-check-label">Los Angeles</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<!-- Single Search -->
											<div class="single_search_boxed">
												<div class="widget-boxed-header">
													<h4>
														<a href="#fptype" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed">Property Types<span class="selected">Apartment</span></a>
													</h4>
													
												</div>
												<div class="widget-boxed-body collapse" id="fptype" data-parent="#fptype">
													<div class="side-list no-border">
														<!-- Single Filter Card -->
														<div class="single_filter_card">
															<div class="card-body pt-0">
																<div class="inner_widget_link">
																	<ul class="no-ul-list filter-list">
																		<li class="form-check">
																			<input id="c1" class="form-check-input" name="ptype" type="radio">
																			<label for="c1" class="form-check-label">House</label>
																		</li>
																		<li class="form-check">
																			<input id="c2" class="form-check-input" name="ptype" type="radio">
																			<label for="c2" class="form-check-label">Office Desk</label>
																		</li>
																		<li class="form-check">
																			<input id="c3" class="form-check-input" name="ptype" type="radio">
																			<label for="c3" class="form-check-label">Villa</label>
																		</li>
																		<li class="form-check">
																			<input id="c4" class="form-check-input" name="ptype" type="radio" checked>
																			<label for="c4" class="form-check-label">Apartment</label>
																		</li>
																		<li class="form-check">
																			<input id="c5" class="form-check-input" name="ptype" type="radio">
																			<label for="c5" class="form-check-label">Condo</label>
																		</li>
																		<li class="form-check">
																			<input id="c6" class="form-check-input" name="ptype" type="radio">
																			<label for="c6" class="form-check-label">Denver</label>
																		</li>
																		<li class="form-check">
																			<input id="c7" class="form-check-input" name="ptype" type="radio">
																			<label for="c7" class="form-check-label">Studio</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<!-- Single Search -->
											<div class="single_search_boxed">
												<div class="widget-boxed-header">
													<h4>
														<a href="#fbedrooms" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed">Bedrooms<span class="selected">2 Beds</span></a>
													</h4>
													
												</div>
												<div class="widget-boxed-body collapse" id="fbedrooms" data-parent="#fbedrooms">
													<div class="side-list no-border">
														<!-- Single Filter Card -->
														<div class="single_filter_card">
															<div class="card-body pt-0">
																<div class="inner_widget_link">
																	<ul class="no-ul-list filter-list">
																		<li class="form-check">
																			<input id="a1" class="form-check-input" name="bed" type="radio">
																			<label for="a1" class="form-check-label">01 Bedrooms</label>
																		</li>
																		<li class="form-check">
																			<input id="a2" class="form-check-input" name="bed" type="radio">
																			<label for="a2" class="form-check-label">02 Bedrooms</label>
																		</li>
																		<li class="form-check">
																			<input id="a3" class="form-check-input" name="bed" type="radio">
																			<label for="a3" class="form-check-label">03 Bedrooms</label>
																		</li>
																		<li class="form-check">
																			<input id="a4" class="form-check-input" name="bed" type="radio" checked>
																			<label for="a4" class="form-check-label">04 Bedrooms</label>
																		</li>
																		<li class="form-check">
																			<input id="a5" class="form-check-input" name="bed" type="radio">
																			<label for="a5" class="form-check-label">05 Bedrooms</label>
																		</li>
																		<li class="form-check">
																			<input id="a6" class="form-check-input" name="bed" type="radio">
																			<label for="a6" class="form-check-label">06+ Bedrooms</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<!-- Single Search -->
											<div class="single_search_boxed">
												<div class="widget-boxed-header">
													<h4>
														<a href="#fprice" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed">Price Range<span class="selected">$10,000 - $15,000</span></a>
													</h4>
													
												</div>
												<div class="widget-boxed-body collapse" id="fprice" data-parent="#fprice">
													<div class="side-list no-border">
														<!-- Single Filter Card -->
														<div class="single_filter_card">
															<div class="card-body pt-0">
																<div class="inner_widget_link">
																	<ul class="no-ul-list filter-list">
																		<li class="form-check">
																			<input id="e1" class="form-check-input" name="prices" type="radio">
																			<label for="e1" class="form-check-label">Less Then $10,000</label>
																		</li>
																		<li class="form-check">
																			<input id="e2" class="form-check-input" name="prices" type="radio">
																			<label for="e2" class="form-check-label">$10,000 - $15,000</label>
																		</li>
																		<li class="form-check">
																			<input id="e3" class="form-check-input" name="prices" type="radio">
																			<label for="e3" class="form-check-label">$12,000 - $25,000</label>
																		</li>
																		<li class="form-check">
																			<input id="e4" class="form-check-input" name="prices" type="radio" checked>
																			<label for="e4" class="form-check-label">$30,000 - $35,000</label>
																		</li>
																		<li class="form-check">
																			<input id="e5" class="form-check-input" name="prices" type="radio">
																			<label for="e5" class="form-check-label">$40,000 - $45,000</label>
																		</li>
																		<li class="form-check">
																			<input id="e6" class="form-check-input" name="prices" type="radio">
																			<label for="e6" class="form-check-label">$50,000 - $55,000</label>
																		</li>
																		<li class="form-check">
																			<input id="e7" class="form-check-input" name="prices" type="radio">
																			<label for="e7" class="form-check-label">$60,000 - $65,000</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<!-- Single Search -->
											<div class="single_search_boxed">
												<div class="widget-boxed-header">
													<h4>
														<a href="#mood" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed">Mood<span class="selected">Any Mood</span></a>
													</h4>
													
												</div>
												<div class="widget-boxed-body collapse" id="mood" data-parent="#mood">
													<div class="side-list no-border">
														<!-- Single Filter Card -->
														<div class="single_filter_card">
															<div class="card-body pt-0">
																<div class="inner_widget_link">
																	<ul class="no-ul-list filter-list">
																		<li class="form-check">
																			<input id="f1" class="form-check-input" name="moods" type="radio">
																			<label for="f1" class="form-check-label">Any Mood</label>
																		</li>
																		<li class="form-check">
																			<input id="f2" class="form-check-input" name="moods" type="radio">
																			<label for="f2" class="form-check-label">Professional</label>
																		</li>
																		<li class="form-check">
																			<input id="f3" class="form-check-input" name="moods" type="radio">
																			<label for="f3" class="form-check-label">Essentials</label>
																		</li>
																		<li class="form-check">
																			<input id="f4" class="form-check-input" name="moods" type="radio" checked>
																			<label for="f4" class="form-check-label">Unique</label>
																		</li>
																		<li class="form-check">
																			<input id="f5" class="form-check-input" name="moods" type="radio">
																			<label for="f5" class="form-check-label">Lively</label>
																		</li>
																		<li class="form-check">
																			<input id="f6" class="form-check-input" name="moods" type="radio">
																			<label for="f6" class="form-check-label">Luxe</label>
																		</li>
																		<li class="form-check">
																			<input id="f7" class="form-check-input" name="moods" type="radio">
																			<label for="f7" class="form-check-label">Luxe</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<!-- Single Search -->
											<div class="single_search_boxed">
												<div class="widget-boxed-header">
													<h4>
														<a href="#ameneties" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed">Ameneties<span class="selected">ADA Compliant</span></a>
													</h4>
													
												</div>
												<div class="widget-boxed-body collapse" id="ameneties" data-parent="#ameneties">
													<div class="side-list no-border">
														<!-- Single Filter Card -->
														<div class="single_filter_card">
															<div class="card-body pt-0">
																<div class="inner_widget_link">
																	<ul class="no-ul-list filter-list">
																		<li class="form-check">
																			<input id="g1" class="form-check-input" name="ADA" type="checkbox" checked>
																			<label for="g1" class="form-check-label">ADA Compliant</label>
																		</li>
																		<li class="form-check">
																			<input id="g2" class="form-check-input" name="Parking" type="checkbox">
																			<label for="g2" class="form-check-label">Parking Options</label>
																		</li>
																		<li class="form-check">
																			<input id="g3" class="form-check-input" name="Coffee" type="checkbox">
																			<label for="g3" class="form-check-label">Coffee Provided</label>
																		</li>
																		<li class="form-check">
																			<input id="g4" class="form-check-input" name="Mother" type="checkbox">
																			<label for="g4" class="form-check-label">Mother's Room</label>
																		</li>
																		<li class="form-check">
																			<input id="g5" class="form-check-input" name="Outdoor" type="checkbox">
																			<label for="g5" class="form-check-label">Outdoor Space</label>
																		</li>
																		<li class="form-check">
																			<input id="g6" class="form-check-input" name="Pet" type="checkbox">
																			<label for="g6" class="form-check-label">Pet Friendly</label>
																		</li>
																		<li class="form-check">
																			<input id="g7" class="form-check-input" name="Beauty" type="checkbox">
																			<label for="g7" class="form-check-label">Beauty & Message</label>
																		</li>
																		<li class="form-check">
																			<input id="g8" class="form-check-input" name="Bike" type="checkbox">
																			<label for="g8" class="form-check-label">Bike Parking</label>
																		</li>
																		<li class="form-check">
																			<input id="g9" class="form-check-input" name="Phone" type="checkbox">
																			<label for="g9" class="form-check-label">Phone Line</label>
																		</li>
																		<li class="form-check">
																			<input id="g11" class="form-check-input" name="Private" type="checkbox">
																			<label for="g11" class="form-check-label">Private Areas</label>
																		</li>
																		<li class="form-check">
																			<input id="g12" class="form-check-input" name="Free" type="checkbox">
																			<label for="g12" class="form-check-label">Free WiFi</label>
																		</li>
																		<li class="form-check">
																			<input id="g13" class="form-check-input" name="Swiming" type="checkbox">
																			<label for="g13" class="form-check-label">Swiming Pool</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
										</div>
										
										<div class="form-group filter_button">
											<button type="submit" class="btn btn btn-primary rounded full-width">22 Results Show</button>
										</div>
									</div>							
								</div>
							</div>
							<!-- Sidebar End -->
						
						</div>
						
						<div class="col-lg-8 col-md-12 list-layout">
							
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12">
									<div class="item-shorting-box">
										<div class="item-shorting clearfix">
											<div class="left-column pull-left"><h4 class="fs-6 m-0">Found 1-10 of 142 Results</h4></div>
										</div>
										<div class="item-shorting-box-right">
											<div class="shorting-by">
												<select id="shorty" class="form-control">
													<option value="">&nbsp;</option>
													<option value="1">Low Price</option>
													<option value="2">High Price</option>
													<option value="3">Most Popular</option>
												</select>
											</div>
											<ul class="shorting-list">
												<li>
													<a href="grid-layout-with-sidebar.html" class="w-12 h-12">
														<span class="svg-icon text-muted-2 svg-icon-2hx">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"/>
																<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"/>
																<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"/>
																<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"/>
															</svg>
														</span>
													</a>
												</li>
												<li>
													<a href="listings-list-with-sidebar.html" class="active w-12 h-12">
														<span class="svg-icon text-seegreen svg-icon-2hx">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M14 10V20C14 20.6 13.6 21 13 21H10C9.4 21 9 20.6 9 20V10C9 9.4 9.4 9 10 9H13C13.6 9 14 9.4 14 10ZM20 9H17C16.4 9 16 9.4 16 10V20C16 20.6 16.4 21 17 21H20C20.6 21 21 20.6 21 20V10C21 9.4 20.6 9 20 9Z" fill="currentColor"/>
																<path d="M7 10V20C7 20.6 6.6 21 6 21H3C2.4 21 2 20.6 2 20V10C2 9.4 2.4 9 3 9H6C6.6 9 7 9.4 7 10ZM21 6V3C21 2.4 20.6 2 20 2H3C2.4 2 2 2.4 2 3V6C2 6.6 2.4 7 3 7H20C20.6 7 21 6.6 21 6Z" fill="currentColor"/>
															</svg>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row justify-content-center">

								<!-- Single Property Start -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="property-listing property-1 bg-white p-2 rounded">
											
										<div class="listing-img-wrapper">
											<a href="single-property-2.html">
												<img src="assets/img/p-1.jpg" class="img-fluid mx-auto rounded" alt="" />
											</a>
										</div>
										
										<div class="listing-content">
										
											<div class="listing-detail-wrapper-box">
												<div class="listing-detail-wrapper d-flex align-items-center justify-content-between">
													<div class="listing-short-detail">
														<span class="label bg-light-danger text-danger d-inline-flex mb-1">For Sale</span>
														<h4 class="listing-name mb-0"><a href="single-property-2.html">Adobe Property Advisors</a></h4>
														<div class="fr-can-rating">
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs"></i>
															<span class="reviews_text fs-sm text-muted ms-2">(42 Reviews)</span>
														</div>
														
													</div>
													<div class="list-price">
														<h6 class="listing-card-info-price text-primary">$120M</h6>
													</div>
												</div>
											</div>
											
											<div class="price-features-wrapper">
												<div class="list-fx-features d-flex align-items-center justify-content-between mt-3 mb-1">
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-building-shield fs-xs"></i></div><span class="text-muted-2 fs-sm">3BHK</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-bed fs-xs"></i></div><span class="text-muted-2 fs-sm">3 Beds</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-clone fs-xs"></i></div><span class="text-muted-2 fs-sm">1800 SQFT</span>
													</div>
												</div>
											</div>
										
											<div class="listing-footer-wrapper">
												<div class="listing-locate">
													<span class="listing-location text-muted-2"><i class="fa-solid fa-location-pin me-1"></i>Quice Market, Canada</span>
												</div>
												<div class="listing-detail-btn">
													<a href="single-property-2.html" class="btn btn-sm px-4 fw-medium btn-primary">View</a>
												</div>
											</div>
											
										</div>
										
									</div>
								</div>
								<!-- Single Property End -->
								
								<!-- Single Property Start -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="property-listing property-1 bg-white p-2 rounded">
											
										<div class="listing-img-wrapper">
											<a href="single-property-2.html">
												<img src="assets/img/p-2.jpg" class="img-fluid mx-auto rounded" alt="" />
											</a>
										</div>
										
										<div class="listing-content">
										
											<div class="listing-detail-wrapper-box">
												<div class="listing-detail-wrapper d-flex align-items-center justify-content-between">
													<div class="listing-short-detail">
														<span class="label bg-light-danger text-danger d-inline-flex mb-1">For Sale</span>
														<h4 class="listing-name mb-0"><a href="single-property-2.html">Agile Real Estate Group</a></h4>
														<div class="fr-can-rating">
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs"></i>
															<span class="reviews_text fs-sm text-muted ms-2">(34 Reviews)</span>
														</div>
														
													</div>
													<div class="list-price">
														<h6 class="listing-card-info-price text-primary">$132M</h6>
													</div>
												</div>
											</div>
											
											<div class="price-features-wrapper">
												<div class="list-fx-features d-flex align-items-center justify-content-between mt-3 mb-1">
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-building-shield fs-xs"></i></div><span class="text-muted-2 fs-sm">3BHK</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-bed fs-xs"></i></div><span class="text-muted-2 fs-sm">3 Beds</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-clone fs-xs"></i></div><span class="text-muted-2 fs-sm">1800 SQFT</span>
													</div>
												</div>
											</div>
										
											<div class="listing-footer-wrapper">
												<div class="listing-locate">
													<span class="listing-location text-muted-2"><i class="fa-solid fa-location-pin me-1"></i>Quice Market, Canada</span>
												</div>
												<div class="listing-detail-btn">
													<a href="single-property-2.html" class="btn btn-sm px-4 fw-medium btn-primary">View</a>
												</div>
											</div>
											
										</div>
										
									</div>
								</div>
								<!-- Single Property End -->

								<!-- Single Property Start -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="property-listing property-1 bg-white p-2 rounded">
											
										<div class="listing-img-wrapper">
											<a href="single-property-2.html">
												<img src="assets/img/p-3.jpg" class="img-fluid mx-auto rounded" alt="" />
											</a>
										</div>
										
										<div class="listing-content">
										
											<div class="listing-detail-wrapper-box">
												<div class="listing-detail-wrapper d-flex align-items-center justify-content-between">
													<div class="listing-short-detail">
														<span class="label bg-light-danger text-danger d-inline-flex mb-1">For Sale</span>
														<h4 class="listing-name mb-0"><a href="single-property-2.html">Bluebell Real Estate</a></h4>
														<div class="fr-can-rating">
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs"></i>
															<span class="reviews_text fs-sm text-muted ms-2">(124 Reviews)</span>
														</div>
														
													</div>
													<div class="list-price">
														<h6 class="listing-card-info-price text-primary">$127M</h6>
													</div>
												</div>
											</div>
											
											<div class="price-features-wrapper">
												<div class="list-fx-features d-flex align-items-center justify-content-between mt-3 mb-1">
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-building-shield fs-xs"></i></div><span class="text-muted-2 fs-sm">3BHK</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-bed fs-xs"></i></div><span class="text-muted-2 fs-sm">3 Beds</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-clone fs-xs"></i></div><span class="text-muted-2 fs-sm">1800 SQFT</span>
													</div>
												</div>
											</div>
										
											<div class="listing-footer-wrapper">
												<div class="listing-locate">
													<span class="listing-location text-muted-2"><i class="fa-solid fa-location-pin me-1"></i>Quice Market, Canada</span>
												</div>
												<div class="listing-detail-btn">
													<a href="single-property-2.html" class="btn btn-sm px-4 fw-medium btn-primary">View</a>
												</div>
											</div>
											
										</div>
										
									</div>
								</div>
								<!-- Single Property End -->

								<!-- Single Property Start -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="property-listing property-1 bg-white p-2 rounded">
											
										<div class="listing-img-wrapper">
											<a href="single-property-2.html">
												<img src="assets/img/p-4.jpg" class="img-fluid mx-auto rounded" alt="" />
											</a>
										</div>
										
										<div class="listing-content">
										
											<div class="listing-detail-wrapper-box">
												<div class="listing-detail-wrapper d-flex align-items-center justify-content-between">
													<div class="listing-short-detail">
														<span class="label bg-light-danger text-danger d-inline-flex mb-1">For Sale</span>
														<h4 class="listing-name mb-0"><a href="single-property-2.html">Strive Partners Realty</a></h4>
														<div class="fr-can-rating">
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<span class="reviews_text fs-sm text-muted ms-2">(56 Reviews)</span>
														</div>
														
													</div>
													<div class="list-price">
														<h6 class="listing-card-info-price text-primary">$132M</h6>
													</div>
												</div>
											</div>
											
											<div class="price-features-wrapper">
												<div class="list-fx-features d-flex align-items-center justify-content-between mt-3 mb-1">
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-building-shield fs-xs"></i></div><span class="text-muted-2 fs-sm">3BHK</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-bed fs-xs"></i></div><span class="text-muted-2 fs-sm">3 Beds</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-clone fs-xs"></i></div><span class="text-muted-2 fs-sm">1800 SQFT</span>
													</div>
												</div>
											</div>
										
											<div class="listing-footer-wrapper">
												<div class="listing-locate">
													<span class="listing-location text-muted-2"><i class="fa-solid fa-location-pin me-1"></i>Quice Market, Canada</span>
												</div>
												<div class="listing-detail-btn">
													<a href="single-property-2.html" class="btn btn-sm px-4 fw-medium btn-primary">View</a>
												</div>
											</div>
											
										</div>
										
									</div>
								</div>
								<!-- Single Property End -->				
								
								
								<!-- Single Property Start -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="property-listing property-1 bg-white p-2 rounded">
											
										<div class="listing-img-wrapper">
											<a href="single-property-2.html">
												<img src="assets/img/p-14.jpg" class="img-fluid mx-auto rounded" alt="" />
											</a>
										</div>
										
										<div class="listing-content">
										
											<div class="listing-detail-wrapper-box">
												<div class="listing-detail-wrapper d-flex align-items-center justify-content-between">
													<div class="listing-short-detail">
														<span class="label bg-light-danger text-danger d-inline-flex mb-1">For Sale</span>
														<h4 class="listing-name mb-0"><a href="single-property-2.html">Agile Real Estate Group</a></h4>
														<div class="fr-can-rating">
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<span class="reviews_text fs-sm text-muted ms-2">(16 Reviews)</span>
														</div>
														
													</div>
													<div class="list-price">
														<h6 class="listing-card-info-price text-primary">$117M</h6>
													</div>
												</div>
											</div>
											
											<div class="price-features-wrapper">
												<div class="list-fx-features d-flex align-items-center justify-content-between mt-3 mb-1">
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-building-shield fs-xs"></i></div><span class="text-muted-2 fs-sm">3BHK</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-bed fs-xs"></i></div><span class="text-muted-2 fs-sm">3 Beds</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-clone fs-xs"></i></div><span class="text-muted-2 fs-sm">1800 SQFT</span>
													</div>
												</div>
											</div>
										
											<div class="listing-footer-wrapper">
												<div class="listing-locate">
													<span class="listing-location text-muted-2"><i class="fa-solid fa-location-pin me-1"></i>Quice Market, Canada</span>
												</div>
												<div class="listing-detail-btn">
													<a href="single-property-2.html" class="btn btn-sm px-4 fw-medium btn-primary">View</a>
												</div>
											</div>
											
										</div>
										
									</div>
								</div>
								<!-- Single Property End -->
								
								<!-- Single Property Start -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="property-listing property-1 bg-white p-2 rounded">
											
										<div class="listing-img-wrapper">
											<a href="single-property-2.html">
												<img src="assets/img/p-18.jpg" class="img-fluid mx-auto rounded" alt="" />
											</a>
										</div>
										
										<div class="listing-content">
										
											<div class="listing-detail-wrapper-box">
												<div class="listing-detail-wrapper d-flex align-items-center justify-content-between">
													<div class="listing-short-detail">
														<span class="label bg-light-success text-success d-inline-flex mb-1">For Rent</span>
														<h4 class="listing-name mb-0"><a href="single-property-2.html">Nestled Real Estate</a></h4>
														<div class="fr-can-rating">
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<span class="reviews_text fs-sm text-muted ms-2">(123 Reviews)</span>
														</div>
														
													</div>
													<div class="list-price">
														<h6 class="listing-card-info-price text-primary">$7,500</h6>
													</div>
												</div>
											</div>
											
											<div class="price-features-wrapper">
												<div class="list-fx-features d-flex align-items-center justify-content-between mt-3 mb-1">
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-building-shield fs-xs"></i></div><span class="text-muted-2 fs-sm">3BHK</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-bed fs-xs"></i></div><span class="text-muted-2 fs-sm">3 Beds</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-clone fs-xs"></i></div><span class="text-muted-2 fs-sm">1800 SQFT</span>
													</div>
												</div>
											</div>
										
											<div class="listing-footer-wrapper">
												<div class="listing-locate">
													<span class="listing-location text-muted-2"><i class="fa-solid fa-location-pin me-1"></i>Quice Market, Canada</span>
												</div>
												<div class="listing-detail-btn">
													<a href="single-property-2.html" class="btn btn-sm px-4 fw-medium btn-primary">View</a>
												</div>
											</div>
											
										</div>
										
									</div>
								</div>
								<!-- Single Property End -->
								
								<!-- Single Property Start -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="property-listing property-1 bg-white p-2 rounded">
											
										<div class="listing-img-wrapper">
											<a href="single-property-2.html">
												<img src="assets/img/p-16.jpg" class="img-fluid mx-auto rounded" alt="" />
											</a>
										</div>
										
										<div class="listing-content">
										
											<div class="listing-detail-wrapper-box">
												<div class="listing-detail-wrapper d-flex align-items-center justify-content-between">
													<div class="listing-short-detail">
														<span class="label bg-light-danger text-danger d-inline-flex mb-1">For Sale</span>
														<h4 class="listing-name mb-0"><a href="single-property-2.html">Flow Group Real Estate</a></h4>
														<div class="fr-can-rating">
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<i class="fas fa-star fs-xs filled"></i>
															<span class="reviews_text fs-sm text-muted ms-2">(42 Reviews)</span>
														</div>
														
													</div>
													<div class="list-price">
														<h6 class="listing-card-info-price text-primary">$112M</h6>
													</div>
												</div>
											</div>
											
											<div class="price-features-wrapper">
												<div class="list-fx-features d-flex align-items-center justify-content-between mt-3 mb-1">
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-building-shield fs-xs"></i></div><span class="text-muted-2 fs-sm">3BHK</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-bed fs-xs"></i></div><span class="text-muted-2 fs-sm">3 Beds</span>
													</div>
													<div class="listing-card d-flex align-items-center">
														<div class="square--25 text-muted-2 fs-sm circle gray-simple me-1"><i class="fa-solid fa-clone fs-xs"></i></div><span class="text-muted-2 fs-sm">1800 SQFT</span>
													</div>
												</div>
											</div>
										
											<div class="listing-footer-wrapper">
												<div class="listing-locate">
													<span class="listing-location text-muted-2"><i class="fa-solid fa-location-pin me-1"></i>Quice Market, Canada</span>
												</div>
												<div class="listing-detail-btn">
													<a href="single-property-2.html" class="btn btn-sm px-4 fw-medium btn-primary">View</a>
												</div>
											</div>
											
										</div>
										
									</div>
								</div>
								<!-- Single Property End -->
								
							</div>
							
							<!-- Pagination -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul class="pagination p-center">
										<li class="page-item">
										  <a class="page-link" href="#" aria-label="Previous">
											<i class="fa-solid fa-arrow-left-long"></i>
											<span class="sr-only">Previous</span>
										  </a>
										</li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item active"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">...</a></li>
										<li class="page-item"><a class="page-link" href="#">18</a></li>
										<li class="page-item">
										  <a class="page-link" href="#" aria-label="Next">
											<i class="fa-solid fa-arrow-right-long"></i>
											<span class="sr-only">Next</span>
										  </a>
										</li>
									</ul>
								</div>
							</div>
					
						</div>
						
					</div>
				</div>	
			</section>
			<!-- ============================ All Property ================================== -->
			
			<!-- ============================ Call To Action ================================== -->
		
			<!-- ============================ Call To Action End ================================== -->
			
			<!-- ============================ Footer Start ================================== -->
            <?php include("include/footer.php"); ?>
			<!-- ============================ Footer End ================================== -->
			
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<span class="mod-close" data-bs-dismiss="modal" aria-hidden="true">
							<span class="svg-icon text-primary svg-icon-2hx">
								<svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
									<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor"/>
									<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor"/>
								</svg>
							</span>
						</span>
						<div class="modal-body">
							<h4 class="modal-header-title">Log In</h4>
							<div class="d-flex align-items-center justify-content-center mb-3">
								<span class="svg-icon text-primary svg-icon-2hx">
									<svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M15.8797 15.375C15.9797 15.075 15.9797 14.775 15.9797 14.475C15.9797 13.775 15.7797 13.075 15.4797 12.475C14.7797 11.275 13.4797 10.475 11.9797 10.475C11.7797 10.475 11.5797 10.475 11.3797 10.575C7.37971 11.075 4.67971 14.575 2.57971 18.075L10.8797 3.675C11.3797 2.775 12.5797 2.775 13.0797 3.675C13.1797 3.875 13.2797 3.975 13.3797 4.175C15.2797 7.575 16.9797 11.675 15.8797 15.375Z" fill="currentColor"/>
										<path opacity="0.3" d="M20.6797 20.6749C16.7797 20.6749 12.3797 20.275 9.57972 17.575C10.2797 18.075 11.0797 18.375 11.9797 18.375C13.4797 18.375 14.7797 17.5749 15.4797 16.2749C15.6797 15.9749 15.7797 15.675 15.7797 15.375V15.2749C16.8797 11.5749 15.2797 7.47495 13.2797 4.07495L21.6797 18.6749C22.2797 19.5749 21.6797 20.6749 20.6797 20.6749ZM8.67972 18.6749C8.17972 17.8749 7.97972 16.975 7.77972 15.975C7.37972 13.575 8.67972 10.775 11.3797 10.375C7.37972 10.875 4.67972 14.375 2.57972 17.875C2.47972 18.075 2.27972 18.375 2.17972 18.575C1.67972 19.475 2.27972 20.475 3.27972 20.475H10.3797C9.67972 20.175 9.07972 19.3749 8.67972 18.6749Z" fill="currentColor"/>
									</svg>
								</span>
							</div>
							<div class="login-form">
								<form>
								
									<div class="form-floating mb-3">
										<input type="email" class="form-control" placeholder="name@example.com">
										<label>Email address</label>
									</div>
									
									<div class="form-floating mb-3">
									  <input type="password" class="form-control" placeholder="Password">
									  <label>Password</label>
									</div>
									
									<div class="form-group mb-3">
										<div class="d-flex align-items-center justify-content-between">
											<div class="flex-shrink-0 flex-first">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" id="save-pass" value="option1">
													<label class="form-check-label" for="save-pass">Save Password</label>
												</div>	
											</div>
											<div class="flex-shrink-0 flex-first">
												<a href="#" class="link fw-medium">Forgot Password?</a>	
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<button type="button" class="btn btn-lg btn-primary fw-medium full-width rounded-2">LogIn</button>
									</div>
								
								</form>
							</div>
							<div class="modal-divider"><span>Or login via</span></div>
							<div class="social-login mb-3">
								<ul>
									<li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google+</a></li>
								</ul>
							</div>
							<div class="text-center">
								<p class="mt-4">Have't Any Account? <a href="create-account.html" class="link fw-medium">Acreate An Account</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
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
		
		<script>
			function openFilterSearch() {
				document.getElementById("filter_search").style.display = "block";
			}
			function closeFilterSearch() {
				document.getElementById("filter_search").style.display = "none";
			}
		</script>
		

	</body>

<!-- Mirrored from shreethemes.net/resido-live/resido/listings-list-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jun 2024 15:38:02 GMT -->
</html>
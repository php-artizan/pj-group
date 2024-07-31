<!-- Start Navigation -->
<div class="top-bar bg-dark text-white py-2">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<span class="me-3">Welcome to <?=site_name()?>!</span>
						<a href="#" class="text-decoration-none text-light">About Us</a>
					</div>
					<div class="col-md-6 text-end">
						<a href="#" class="text-decoration-none text-light me-3">Contact Us</a>
						<span>Phone: +1234567890</span>
					</div>
				</div>
			</div>
		</div>
		<div class="header-wrapper">
			<div class="header header-transparent dark">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand text-logo" href="<?=ROOT_PATH?>">
								<span class="svg-icon text-primary svg-icon-2hx">
									<?php displaylogo(); ?>
								</span>
								<!-- <h5 class="fs-3 fw-bold ms-1 my-0">Zameen</h5> -->
							</a>
							<div class="nav-toggle"></div>
							<div class="mobile_nav">
								<ul>
									<li>
										<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"
											class="text-dark opacity-75">
											<span class="svg-icon svg-icon-2hx">
												<svg width="35" height="35" viewBox="0 0 18 18" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3"
														d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
														fill="currentColor" />
													<path
														d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
														fill="currentColor" />
													<rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
												</svg>
											</span>
										</a>
									</li>
									<li>
										<a href="submit-property.html" class="text-primary">
											<span class="svg-icon svg-icon-2hx">
												<svg width="35" height="35" viewBox="0 0 24 24" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
														fill="currentColor" />
													<rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
														transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
													<rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
														fill="currentColor" />
												</svg>
											</span>
										</a>
									</li>
									<li>
										<a href="#" class="text-primary" data-bs-toggle="offcanvas"
											data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
											<span class="svg-icon svg-icon-2hx">
												<svg width="22" height="22" viewBox="0 0 16 15" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<rect y="6" width="16" height="3" rx="1.5" fill="currentColor" />
													<rect opacity="0.3" y="12" width="8" height="3" rx="1.5"
														fill="currentColor" />
													<rect opacity="0.3" width="12" height="3" rx="1.5"
														fill="currentColor" />
												</svg>
											</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">

								<li class="active"><a href="index.php">Home<span
											class="submenu-indicator"></span></a>
								</li>

								<li>
									<a href="JavaScript:Void(0);">Buy<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li>
										<li><a href="list-layout-new.php">HOME</a></li>
										<li><a href="list-layout-new-3.php">PLOTS</a></li>
										<li><a href="list-layout-new-3.php">COMMERCIAL</a></li>
								</li>
							</ul>
							</li>
							<li class="active"><a href="404.php">AGENTS<span
								class="submenu-indicator"></span></a>
					</li>
					<li class="active"><a href="404.php">NEW PROJECTS<span
						class="submenu-indicator"></span></a>
			</li>
				

							</ul>

							<ul class="nav-menu nav-menu-social align-to-right">

								
								<li class="add-listing">
									<a href="post-ad.php" class="bg-primary">
										<span class="svg-icon svg-icon-muted svg-icon-2hx me-1">
											<svg width="22" height="22" viewBox="0 0 24 24" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.3" width="12" height="q" rx="1"
													transform="matrix(-1 0 0 1 15.5 11)" fill="currentColor" />
												<path
													d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
													fill="currentColor" />
												<path
													d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
													fill="currentColor" />
											</svg>
										</span>Post Property
									</a>
								</li>
								<!-- <li>
									<a href="#" class="text-primary" data-bs-toggle="offcanvas"
										data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
										<span class="svg-icon svg-icon-2hx">
											<svg width="24" height="24" viewBox="0 0 16 15" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<rect y="6" width="16" height="3" rx="1.5" fill="currentColor" />
												<rect opacity="0.3" y="12" width="8" height="3" rx="1.5"
													fill="currentColor" />
												<rect opacity="0.3" width="12" height="3" rx="1.5"
													fill="currentColor" />
											</svg>
										</span>
									</a> 
								</li>-->
								<li>
									<?php 
									if ($pageName != "login"){
								

										if( is_user_logged_in() ){ 
											
										
											
											?>
											<a href="my-account.php" 
												class="fw-medium text-muted-2">
												<span class="svg-icon svg-icon-2hx me-1">
													<svg width="22" height="22" viewBox="0 0 18 18" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3"
															d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
															fill="currentColor" />
														<path
															d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
															fill="currentColor" />
														<rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
													</svg>
												</span>
												<?=$user_name?>
											</a>
											<ul class="nav-dropdown nav-submenu">
											<li>
											<li><a href="my-account.php">My Account</a></li>
											<li><a href="my-ads.php">My Ads</a></li>
											<li><a href="logout.php">Log Out</a></li>
											</li>
										</ul>
										<?php } else { ?>
											<a href="login.php" 
												class="fw-medium text-muted-2">
												<span class="svg-icon svg-icon-2hx me-1">
													<svg width="22" height="22" viewBox="0 0 18 18" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3"
															d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
															fill="currentColor" />
														<path
															d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
															fill="currentColor" />
														<rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
													</svg>
												</span>
												Log In
											</a>
										<?php }
									} ?>
									
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!-- End Navigation -->
		<div class="clearfix"></div>
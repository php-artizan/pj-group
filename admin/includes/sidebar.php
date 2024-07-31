<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<div id="kt_aside" class="aside aside-default  aside-hoverable " data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">

    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto px-10 pt-9 pb-5" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="/admin">
            <img alt="Logo" src="../assets/img/logo.png" style="height: 50px" class="max-h-50px logo-default theme-light-show" />
            <img alt="Logo" src="../assets/img/logo.png" style="height: 50px" class="max-h-50px logo-default theme-dark-show" />
            <img alt="Logo" src="../assets/img/logo.png" style="height: 50px" class="max-h-50px logo-minimize" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->

    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid ps-3 pe-1">
        <!--begin::Aside Menu-->

        <!--begin::Menu-->
        <div class="menu menu-sub-indention menu-column menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-active-bg menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 my-5 mt-lg-2 mb-lg-0" id="kt_aside_menu" data-kt-menu="true">

            <div class="hover-scroll-y mx-4" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="20px" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer">

                <div class="menu-item">
                    <a class="menu-link <?= ($activePage == 'index') ? 'active':''; ?>" href="index.php">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                        <span class="menu-title">Dashboard </span>
                    </a>
                </div>
                <!--begin:Menu content-->
                <!-- <div class="menu-item pt-5">     
                    <div class="menu-content"><span class="fw-bold text-muted text-uppercase fs-7">Dashboard</span></div>
                </div> -->
                <!--end:Menu item--><!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link-->
                    <span class="menu-link <?= $activePage == 'admins' || $activePage == 'users' ? 'active':''; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">User Management</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion <?= $activePage == 'admins' || $activePage == 'users' ? 'show':''; ?>"><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a  class="menu-link <?= ($activePage == 'admins') ? 'active':''; ?>" href="admins.php"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Admins</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link <?= ($activePage == 'users') ? 'active':''; ?>"" href="users.php"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Users</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->

                    </div><!--end:Menu sub-->
                </div>
                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="fw-bold text-muted text-uppercase fs-7">Ads</span></div><!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link-->
                    <span class="menu-link <?= $activePage == 'ads-active' || $activePage == 'ads-pending' || $activePage == 'ads-rejected' || $activePage == 'ads-category' || $activePage == 'ads-location' ? 'active':''; ?>">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Ads Management</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion <?= $activePage == 'ads-active' || $activePage == 'ads-pending' || $activePage == 'ads-rejected' || $activePage == 'ads-category' || $activePage == 'ads-location' ? 'show':''; ?>"><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link <?= ($activePage == 'ads-active') ? 'active':''; ?>" href="ads-active.php"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Active</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link <?= ($activePage == 'ads-pending') ? 'active':''; ?>" href="ads-pending.php"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Pending</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link <?= ($activePage == 'ads-rejected') ? 'active':''; ?>" href="ads-rejected.php"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Rejected</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link <?= ($activePage == 'ads-category') ? 'active':''; ?>" href="ads-category.php"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Categories</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link <?= ($activePage == 'ads-location') ? 'active':''; ?>" href="ads-location.php"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Locations</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->

                    </div><!--end:Menu sub-->
                </div>
                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="fw-bold text-muted text-uppercase fs-7">Miscellaneous</span></div><!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->

                <div class="menu-item"><a class="menu-link <?= ($activePage == 'amenties_groups') ? 'active':''; ?>" href="amenties_groups.php"><span class="menu-icon"><i class="ki-duotone ki-code fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">Amenties Groups </span></a></div>
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link <?= ($activePage == 'amenties') ? 'active':''; ?>" href="amenties.php"><span class="menu-icon"><i class="ki-duotone ki-row-vertical fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Amenties</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link <?= ($activePage == 'ad_type') ? 'active':''; ?>" href="ad_type.php" ><span class="menu-icon"><i class="ki-duotone ki-abstract-41 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Ad Types</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link <?= ($activePage == 'layout-builder') ? 'active':''; ?>" href="../../../layout-builder.html"><span class="menu-icon"><i class="ki-duotone ki-abstract-13 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Features</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->

                <!--  -->
            </div>
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside menu-->

    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pb-5 d-none" id="kt_aside_footer">
        <a href="../../../index-2.html" class="btn btn-light-primary w-100">
            Button
        </a>
    </div>
    <!--end::Footer-->
</div>
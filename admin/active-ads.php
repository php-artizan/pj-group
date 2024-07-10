<?php 
require "config/global.php";
require("../classes/ads.php");

$ads = new Ad();
$active_ads = $ads->get_active_properties();

$error = false;
$errorMessage = '';
$success = false;
try {
    // CRUD operations
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Create
        if ($action == 'create') {
            $fileInput = $_FILES['icon'];
            $uploadResult = uploadFile($fileInput, 'icons/');
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $slug = createSlug($name) ?? '';
            $group_slug = $_POST['amenties_group'];
            $date = date("Y-m-d");
            if ($uploadResult['success']) {
                $icon = $uploadResult['filename'];
                // Insert into database
                $query = $db->query("SELECT * FROM amenties WHERE slug = '$slug'");

                if(mysqli_num_rows($query)==0){
                    $query = "INSERT INTO amenties (name, description, icon, group_slug, slug) VALUES ('$name', '$description', '$icon', '$group_slug', '$slug', '$date' )";
                    if (!mysqli_query($db, $query)) {
                        throw new Exception('Error inserting into database: ' . mysqli_error($db));
                    } else {
                        $success = true;
                        $message = "Added Successfully";
                    }
                    

                } else {
                    throw new Exception('Already Exists: '.$name);
                }
                
              
            } else {
                throw new Exception($uploadResult['message']);
            }
        }

        // Update
        elseif ($action == 'update') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $values = $_POST['values'];
            $query = "UPDATE amenties SET name = '$name', values = '$values' WHERE id = '$id'";
            if (!mysqli_query($db, $query)) {
                throw new Exception('Error updating database: ' . mysqli_error($db));
            }
        }

        // Delete
        elseif ($action == 'delete') {
            $id = $_POST['id'];
            $query = "DELETE FROM amenties WHERE id = '$id'";
            if (!mysqli_query($db, $query)) {
                throw new Exception('Error deleting from database: ' . mysqli_error($db));
            }
        }
    }

} catch(Exception $e){
    $errorMessage = $e->getMessage();
}
// Read
$query = "SELECT * FROM amenties";
$result = mysqli_query($db, $query);

$amenties = array();
while ($row = mysqli_fetch_assoc($result)) {
    $amenties[] = $row;
}

// Read
$query = "SELECT * FROM amenties_groups";
$result = mysqli_query($db, $query);

$amenties_groups = array();
while ($row = mysqli_fetch_assoc($result)) {
    $amenties_groups[] = $row;
}






?>


<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Amenties | </title>

    <?php
    include("includes/head.php");
    ?>




</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <?php
            include("includes/sidebar.php");
            ?>

            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <?php
                include("includes/header.php");
                ?>

                <!--end::Header-->

                <!--begin::Content-->
                <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bold my-1 fs-2">
                                Active Ads </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb fw-semibold fs-base my-1">
                                <li class="breadcrumb-item text-muted">
                                        <a href="<?=ADMIN_PATH?>" class="text-muted text-hover-primary">
                                            Home </a>
                                    </li>

                                    <li class="breadcrumb-item text-muted">
                                        
                                        <a href="javascript::void(0)" class="text-muted text-hover-primary">
                                        Ads </a>
                                    </li>


                                    <li class="breadcrumb-item text-dark">
                                    Active</li>

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Actions-->
                            <!-- <div class="d-flex align-items-center flex-nowrap text-nowrap py-1">
                                <a href="#" class="btn bg-body btn-color-gray-700 btn-active-primary me-4" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                                    Invite Friends
                                </a>

                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project" id="kt_toolbar_primary_button">
                                    New Project </a>
                            </div> -->
                            <!--end::Actions-->
                        </div>
                    </div>
                    <!--end::Toolbar-->
                    <?php 
                    
                    // Check for any errors that occurred
                    $error = error_get_last();
                    if ($error) {
                        $errorMessage = $error['message'];
                    }  ?>
                    
                    <?php if($errorMessage) {?>
                        <div class="alert alert-danger">
                            <?=$errorMessage; ?>
                        </div>
                    <?php } ?>
                    <?php if($success) {?>
                        <div class="alert alert-success">
                            <?=$message; ?>
                        </div>
                    <?php } ?>
                                <!--begin::Post-->
                    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div class=" container-xxl ">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header border-0 pt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i> <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Card title-->

                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                            <!--begin::Filter-->
                                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i> Filter
                                            </button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Separator-->

                                                <!--begin::Content-->
                                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <label class="form-label fs-6 fw-semibold">Role:</label>
                                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                                            <option></option>
                                                            <?php foreach($amenties_groups as $item){ ?>
                                                                <option value="<?=$item['name']?>"><?=$item['name']?></option>

                                                            <?php } ?>
                                                            
                                                           
                                                        </select>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
                                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                                                            <option></option>
                                                            <option value="Enabled">Enabled</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                                        <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Menu 1--> <!--end::Filter-->

                                            <!--begin::Export-->
                                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                                                <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span class="path2"></span></i> Export
                                            </button>
                                            <!--end::Export-->

                                            <!--begin::Add user-->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                                                <i class="ki-duotone ki-plus fs-2"></i> New 
                                            </button>
                                            <!--end::Add user-->
                                        </div>
                                        <!--end::Toolbar-->

                                        <!--begin::Group actions-->
                                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                            <div class="fw-bold me-5">
                                                <span class="me-2" data-kt-user-table-select="selected_count"></span> Selected
                                            </div>

                                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
                                                Delete Selected
                                            </button>
                                        </div>
                                        <!--end::Group actions-->

                                        <!--begin::Modal - Adjust Balance-->
                                        <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bold">Export Users</h2>
                                                        <!--end::Modal title-->

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--end::Modal header-->

                                                    <!--begin::Modal body-->
                                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                        <!--begin::Form-->
                                                        <form id="kt_modal_export_users_form" class="form" action="#">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-10">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                                    <option></option>
                                                                    <option value="Administrator">Administrator</option>
                                                                    <option value="Analyst">Analyst</option>
                                                                    <option value="Developer">Developer</option>
                                                                    <option value="Support">Support</option>
                                                                    <option value="Trial">Trial</option>
                                                                </select>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-10">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                                    <option></option>
                                                                    <option value="excel">Excel</option>
                                                                    <option value="pdf">PDF</option>
                                                                    <option value="cvs">CVS</option>
                                                                    <option value="zip">ZIP</option>
                                                                </select>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Actions-->
                                                            <div class="text-center">
                                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                                                                    Discard
                                                                </button>

                                                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                                    <span class="indicator-label">
                                                                        Submit
                                                                    </span>
                                                                    <span class="indicator-progress">
                                                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </form>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Modal body-->
                                                </div>
                                                <!--end::Modal content-->
                                            </div>
                                            <!--end::Modal dialog-->
                                        </div>
                                        <!--end::Modal - New Card-->

                                        <!--begin::Modal - Add task-->
                                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header" id="kt_modal_add_user_header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bold">Add</h2>
                                                        <!--end::Modal title-->

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--end::Modal header-->

                                                    <!--begin::Modal body-->
                                                    <div class="modal-body px-5 my-7">
                                                        <!--begin::Form-->
                                                        <form  class="form" action="" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="action" value="create" />
                                                            <!--begin::Scroll-->
                                                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                                 <!--begin::Input group-->
                                                                 <div class="fv-row mb-7">
                                                                                <!--begin::Label-->
                                                                                <label class="d-block fw-semibold fs-6 mb-5">Icon</label>
                                                                                <!--end::Label-->

                                                                                                        
                                                                            <!--begin::Image placeholder-->
                                                                            <style>
                                                                                .image-input-placeholder {
                                                                                    background-image: url('/craft/assets/media/svg/files/blank-image.svg');
                                                                                }

                                                                                        [data-bs-theme="dark"] .image-input-placeholder {
                                                                                        background-image: url('/craft/assets/media/svg/files/blank-image-dark.svg');
                                                                                    }               
                                                                                </style>
                                                                            <!--end::Image placeholder-->
                                                                    <!--begin::Image input-->
                                                                    <div class="image-input image-input-outline image-input-placeholder image-input-changed" data-kt-image-input="true">
                                                                        <!--begin::Preview existing avatar-->
                                                                        <div class="image-input-wrapper w-125px h-125px" style=""></div>
                                                                        <!--end::Preview existing avatar-->

                                                                        <!--begin::Label-->
                                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                                                                            <!--begin::Inputs-->
                                                                            <input type="file" name="icon" accept=".png, .jpg, .jpeg">
                                                                            <input type="hidden" name="icon_remove">
                                                                            <!--end::Inputs-->
                                                                        </label>
                                                                        <!--end::Label-->

                                                                        <!--begin::Cancel-->
                                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>                                </span>
                                                                        <!--end::Cancel-->

                                                                        <!--begin::Remove-->
                                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>                                </span>
                                                                        <!--end::Remove-->
                                                                    </div>
                                                                    <!--end::Image input-->

                                                                    <!--begin::Hint-->
                                                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                                    <!--end::Hint-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-semibold fs-6 mb-2">Name</label>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input-->
                                                                    <input type="text" name="name" class="form-control  mb-3 mb-lg-0" id="name_field" placeholder="Full name" value="Emma Smith" />
                                                                    <p class="small">Slug: &nbsp;<span class="text-success" id="slug">name-123</span></p>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                

                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-semibold fs-6 mb-2">Description</label>
                                                                    <!--end::Label-->

                                                                    <textarea class="form-control" aria-label="With textarea" name="description"> </textarea>
                                                                </div>
                                                                <!--end::Input group-->
                                                                <div class="mb-5">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-semibold fs-6 mb-5">Amenties Group</label>
                                                                    <!--end::Label-->

                                                                    <!--begin::Roles-->
                                                                    <?php foreach($amenties_groups as $item){ ?>                               
                                                                    <!--begin::Input row-->
                                                                        <div class="d-flex fv-row">
                                                                            <!--begin::Radio-->
                                                                            <div class="form-check form-check-custom form-check-solid">
                                                                                <!--begin::Input-->
                                                                                <input class="form-check-input me-3" name="amenties_group" type="radio" value="<?=$item['slug'];?>" id="kt_modal_update_role_option_<?=$item['id'];?>" >
                                                                                <!--end::Input-->

                                                                                <!--begin::Label-->
                                                                                <label class="form-check-label" for="kt_modal_update_role_option_<?=$item['id'];?>">
                                                                                    <div class="fw-bold text-gray-800"><?=$item['name'];?></div>
                                                                                    <div class="text-gray-600"><?=$item['description'];?></div>
                                                                                </label>
                                                                                <!--end::Label-->
                                                                            </div>
                                                                            <!--end::Radio-->
                                                                        </div>
                                                                        <!--end::Input row-->

                                                                        <div class="separator separator-dashed my-5"></div>                                                            <!--begin::Input row-->
                                                                    <?php } ?>    
                                                                                                                                <!--end::Roles-->
                                                                </div>
                                                                
                                                            </div>
                                                            <!--end::Scroll-->

                                                            <!--begin::Actions-->
                                                            <div class="text-center pt-10">
                                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                                                                    Discard
                                                                </button>
                                                                
                                                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                                    <span class="indicator-label">
                                                                        Submit
                                                                    </span>
                                                                    <span class="indicator-progress">
                                                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </form>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Modal body-->
                                                </div>
                                                <!--end::Modal content-->
                                            </div>
                                            <!--end::Modal dialog-->
                                        </div>
                                        <!--end::Modal - Add task-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body py-4">

                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                        <thead>
                                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-125px">Name</th>
                                                <th class="min-w-125px">Group</th>
                                           
                                               
                                                <th class="min-w-125px">Joined Date</th>
                                                <th class="text-end min-w-100px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-semibold">
                                            <?php  foreach($active_ads as $item) { ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="1" />
                                                        </div>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <!--begin:: Avatar -->
                                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                            <a href="view.html">
                                                                <div class="symbol-label">
                                                                    <!-- <img src="<?=UPLOADS_DIR; // $item['icon']?>" alt="Emma Smith" class="w-100 p-3" /> -->
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::User details-->
                                                        <div class="d-flex flex-column">
                                                            <a href="view.html" class="text-gray-800 text-hover-primary mb-1"><?=$item['name']?></a>
                                                            <!-- <span><?=$item['description']?></span> -->
                                                        </div>
                                                        <!--begin::User details-->
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        // foreach ( $amenties_groups as $group_item){
                                                        //     if( $group_item['slug'] == $item['group_slug']){
                                                        //         echo $group_item['name'];
                                                        //     }
                                                        // }
                                                        
                                                        ?>
                                                    </td>
                                                    
                                                   
                                                    <td>
                                                        19 Aug 2024, 11:05 am 
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> 
                                                        </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="view.html" class="menu-link px-3">
                                                                    Edit
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                <?php 
                include("includes/footer.php");
                ?>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <?php 
    include("includes/footer_scripts.php");
    ?>                           
    <script>
        $(document).ready(function(){

            $("#name_field").keyup(function(){
                var name = $("#name_field").val();
                var slug = convertToSlug(name);
                $("#slug").html(slug);
            });

            function convertToSlug(str) {
                str = str.replace(/^\s+|\s+$/g, ''); // trim
                str = str.toLowerCase();
                var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
                var to   = "aaaaeeeeiiiioooouuuunc------";
                for (var i=0, l=from.length ; i<l ; i++) {
                    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
                }
                str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                    .replace(/\s+/g, '-') // collapse whitespace and replace by -
                    .replace(/-+/g, '-'); // collapse dashes
                return str;
            }

        });
    </script>                                     
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/craft/apps/user-management/users/list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2024 09:53:49 GMT -->

</html>
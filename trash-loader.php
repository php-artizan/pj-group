<?php
require "config/global.php";
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

// Fetch updated ads for the user
$ads = Ad::get_ads_by_user_id($user_id,"trash");

// Generate HTML for the ads
foreach ($ads as $ad) {
    $image = $ad['images'][0];
    $id = $ad['id'];
    ?>
    <div class="col-md-12 col-sm-12 col-md-12">
        <div class="singles-dashboard-list">
            <div class="sd-list-left">
                <img src="<?= $image['path'] ?>" class="img-fluid" alt="" />
            </div>
            <div class="sd-list-right">
                <h4 class="listing_dashboard_title"><a href="#" class="text-primary"><?= $ad['title'] ?></a></h4>
                <div class="user_dashboard_listed">
                    Price: from <?= CustomOperations::price($ad['price']) ?> month
                </div>
                <div class="user_dashboard_listed">
                    City: <a href="javascript:void(0);" class="text-primary"><?= Ad::get_ad_meta($id, 'city') ?></a> , Area: <?= Ad::get_ad_meta($id, 'area') ?>
                </div>
                <div class="action">
                    <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="property.php?slug=<?= $ad['slug'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="202 User View"><i class="fa-regular fa-eye"></i></a>
                    <a href="#" data-id="<?= $ad['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Property" class="delete"><i class="fa-regular fa-circle-xmark"></i></a>
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Make Featured" class="delete"><i class="fa-solid fa-star"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

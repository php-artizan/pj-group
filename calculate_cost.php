<?php
require "config/global.php";
?>
<!DOCTYPE html>
<html lang="zxx">

<?php
include ("include/head.php");
?>
<style>
    .container,
    .container-lg,
    .container-md,
    .container-sm,
    .container-xl {
        max-width: 1500px !important;
    }

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

    #toggleMoreOptions:checked~#secondRow {
        display: block;
    }
    .fixed-top {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        background: white;
        border-bottom: 1px solid #ddd;
        padding: 10px;
        z-index: 1000; /* Ensures it stays on top of other elements */
    
    }

    .fixed-top .col-md-2,
    .fixed-top .col-md-3 {
        margin-bottom: 0;
    }

    .fixed-top img {
        vertical-align: middle;
        margin: 0 10px;
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
        include ("include/header.php");
        ?>

        <!-- ============================ Hero Banner  Start================================== -->
        <!-- Section 1 -->
        <section>
            <!-- ============================ Hero Banner  Start================================== -->
            <?php


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $city = isset($_POST['city']) ? trim($_POST['city']) : '';
                $area_size = isset($_POST['area_size']) ? trim($_POST['area_size']) : '';
                $covered_area_size = isset($_POST['covered_area_size']) ? trim($_POST['covered_area_size']) : '';
                $covered_area = isset($_POST['covered_area']) ? trim($_POST['covered_area']) : '';
                $construction_mode = isset($_POST['construction_mode']) ? trim($_POST['construction_mode']) : '';

                // Define a variable for 'Gray Structure'
                $grayStructureValue = 'Gray Structure';

                $conversionFactor = 405;
                $areaSizeInSqFt = $area_size * $conversionFactor; ?>
                <div class="container">
                    <div class="mb-5">
                        <h1> <?= $area_size ?> Marla House Construction Cost in Lahore</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h5 class="text-muted">QUICK OPTIONS</h5>
                            <div
                                style="flex: 2; position: relative; display: flex; flex-direction: column; align-items: flex-start;">
                                <label for="textField" class="form-label" style="margin-bottom: 5px;">Area size</label>
                                <div style="position: relative; width: 100%;">
                                    <input type="text" id="textField" placeholder="Enter Area Size"
                                        style="width: 100%; border: none; border-radius: 5px; padding-right: 80px; box-sizing: border-box; border-bottom: 1px solid #ccc;">
                                    <select id="dropdown"
                                        style="position: absolute; right: 10px; top: 0;  bottom: 0;border: none;  border-radius: 5px; cursor: pointer; background-color: transparent; width: auto; z-index: 1;">
                                        <option value="" disabled selected>Marla</option>
                                        <option value="kanal">Kanal</option>
                                        <option value="Sq. Ft">Sq. Ft</option>

                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-start gap-2" style="margin-top: 10px;">
                                <label for="textField" class="form-label">Construction Type
                                </label>
                                <div class="d-flex align-items-center gap-3" style="margin-top: 0px;">
                                    <button id="button1" class="btn" onclick="selectButton('button1')"
                                        style="background-color: #ddd; color: #000; border: 1px solid #ccc; border-radius:20px;">
                                        Grey Structure
                                    </button>
                                    <button id="button2" class="btn" onclick="selectButton('button2')"
                                        style="background-color: #ddd; color: #000; border: 1px solid #ccc; border-radius:20px;">
                                        Complete
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <!-- <h5>Prices last updated on 5th August, 2024</h5>
                            <div
                                style="background: #FAFAFA; padding: 10px; border-radius: 5px; width: 100%; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p class="text-muted">Total Cost</p>
                                        <h4 style="color: #A3640D;">96.38 Lakh</h4>
                                    </div>

                                    <img src="./assets/img/2w2download.svg" alt="" style="width: 50px;">


                                    <div class="col-md-3">
                                        <p>Grey Structure Material Cost</p>
                                        <h4>96.38 Lakh</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="text-muted">Finishing Material Cost</p>
                                        <h4>96.38 Lakh</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="text-muted">Labour Cost</p>
                                        <h4>96.38 Lakh</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="text-muted">Price Per Sq Ft</p>
                                        <h4>96.38 Lakh</h4>
                                    </div>
                                </div>
                            </div> -->


                                <div
                                    style="background: white; padding: 10px; border-radius: 5px; width: 100%; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); margin-top:120px; border: 1px solid var(--card-border-color, #e6e6e6);">
                                    <h4>Breakdown of Overall Construction Cost By Percentage (PKR)</h4>
                                </div>
                                <?php $effectiveAreaSize = !empty($covered_area_size) ? $covered_area_size : $areaSizeInSqFt;

                                // Initialize total costs
                                $totalMaterialCost = 0;
                                $totalLaborCost = 0;

                                // Initialize total costs for Gray Structure
                                $totalGrayStructureMaterialCost = 0;
                                $totalGrayStructureLaborCost = 0;

                                // Search for the city ID in the location table
                                $sql = "SELECT id FROM location WHERE name = ?";
                                $stmt = mysqli_prepare($db, $sql);
                                if ($stmt === false) {
                                    echo "<div class='error'>Error preparing statement: " . mysqli_error($db) . "</div>";
                                    exit;
                                }

                                mysqli_stmt_bind_param($stmt, 's', $city);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                if ($row = mysqli_fetch_assoc($result)) {
                                    $city_id = $row['id'];

                                    function formatCost($cost)
                                    {
                                        if ($cost >= 100000) {
                                            return number_format($cost / 100000, 2) . " Lakh";
                                        } elseif ($cost >= 1000) {
                                            return number_format($cost / 1000, 2) . " Thousand";
                                        } else {
                                            return number_format($cost);
                                        }
                                    }


                                    function displayCategoryItems($db, $category_id, $city_id, $effectiveAreaSize, &$totalMaterialCost, &$totalLaborCost, &$totalGrayStructureMaterialCost, &$totalGrayStructureLaborCost, $construction_mode, $specificItems = [], $isGrayStructure = false)
                                    {
                                        $sql = "SELECT * FROM material_category WHERE id = ?";
                                        $stmt = mysqli_prepare($db, $sql);
                                        if ($stmt === false) {
                                            echo "<div class='error'>Error preparing statement: " . mysqli_error($db) . "</div>";
                                            exit;
                                        }
                                        mysqli_stmt_bind_param($stmt, 'i', $category_id);
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        if ($category = mysqli_fetch_assoc($result)) { ?>
                                            <!-- box  -->

                                            <!-- <div style="background: #fff3f2; padding: 10px; border-radius: 5px; width: 100%; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); margin-top:30px; border: 1px solid var(--card-border-color, #e6e6e6);">
                            <div class="row">
                                <div class="col-md-1" style="display: flex; align-items-center;">
                                    <img src="./assets/img/foundation_f51c88698a.svg" alt="" width="50px">
                                </div>
                                <div class="col-md-9">
                                    <h5>Foundation & Structure</h5>
                                    <p>Foundation & Structure includes materials for the basic house structure including foundation, floors, walls, roofing, and plastering.</p>
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <h4>45.51 Lakh</h4>
                                </div>
                            </div>
                        </div> -->
                                            <?php $sql = "
                                                     SELECT materials.*, material_price.price 
                                                    FROM materials 
                                                    JOIN material_price ON materials.material_price_id = material_price.id 
                                                    WHERE materials.material_cat_id = ? AND material_price.location_id = ?
                                                    ";
                                            $stmt = mysqli_prepare($db, $sql);
                                            if ($stmt === false) {
                                                echo "<div class='error'>Error preparing statement: " . mysqli_error($db) . "</div>";
                                                exit;
                                            }
                                            mysqli_stmt_bind_param($stmt, 'ii', $category_id, $city_id);
                                            mysqli_stmt_execute($stmt);
                                            $query = mysqli_stmt_get_result($stmt);

                                            $totalCategoryCost = 0;

                                            if (mysqli_num_rows($query) > 0) { ?>
                                                <!-- accordion 1 -->

                                                <div style="border-radius: 5px; background-color: #fff; margin-top: 30px">
                                                    <div class="accordion" id="accordionExample">
                                                        <!-- First Accordion Item -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button
                                                                    style="background-color: #fff; color: black; display: flex; justify-content: space-between; align-items: center; width: 100%;"
                                                                    class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                                    <span
                                                                        style="flex-grow: 1;"><?= htmlspecialchars($category['name']) ?></span>
                                                                    <!-- <span style="flex-shrink: 0; margin-right: 15px">61.5 Thousand</span> -->
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body" style="color: #333;">
                                                                    <table style="width: 100%; border-collapse: collapse;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    style="border-bottom: 1px solid #ccc; padding: 8px; text-align: left;">
                                                                                    ITEM</th>
                                                                                <th
                                                                                    style="border-bottom: 1px solid #ccc; padding: 8px; text-align: left;">
                                                                                    RATE</th>
                                                                                <th
                                                                                    style="border-bottom: 1px solid #ccc; padding: 8px; text-align: left;">
                                                                                    QUANTITY</th>
                                                                                <th
                                                                                    style="border-bottom: 1px solid #ccc; padding: 8px; text-align: left;">
                                                                                    COST</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <?php while ($row = mysqli_fetch_assoc($query)) {
                                                                                if (!empty($specificItems) && !in_array($row['material_name'], $specificItems)) {
                                                                                    continue;
                                                                                }

                                                                                $totalQuantity = round($effectiveAreaSize * $row['quantity_per_sqft']);
                                                                                $totalCost = round($totalQuantity * $row['price']);
                                                                                $totalCategoryCost += $totalCost;
                                                                                ?>
                                                                                <tr>
                                                                                    <td style="padding: 8px; border-bottom: 1px solid #ccc;">
                                                                                        <?= htmlspecialchars($row['material_name']) ?>
                                                                                    <td style="padding: 8px; border-bottom: 1px solid #ccc;">
                                                                                        <?= htmlspecialchars(number_format($row['price'])) ?>
                                                                                    </td>
                                                                                    <td style="padding: 8px; border-bottom: 1px solid #ccc;">
                                                                                        <?= htmlspecialchars(number_format($totalQuantity)) ?>
                                                                                    </td>
                                                                                    <td style="padding: 8px; border-bottom: 1px solid #ccc;">
                                                                                        <?= htmlspecialchars(number_format($totalCost)) ?></td>
                                                                                </tr>
                                                                                <?php }?>
                                                                            </tbody>
                                                                        </table>
                                                                 
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                <?php 
                                            } else {
                                                echo "<div class='error'>No materials found for this category.</div>";
                                            } ?>

                                        <?php
                                        }
                                        echo "<p class='debug-info'><strong>Total Material Cost  " . htmlspecialchars(formatCost($totalCategoryCost)) . "</strong></p>";

                                        // Update total costs
                                        $totalMaterialCost += $totalCategoryCost;

                                        if ($isGrayStructure) {
                                            $totalGrayStructureMaterialCost += $totalCategoryCost;
                                        }

                                        $sql = "SELECT cost_per_sqft FROM labor_costs WHERE material_cat_id = ? AND mode = ?";
                                        $stmt = mysqli_prepare($db, $sql);
                                        if ($stmt === false) {
                                            echo "<div class='error'>Error preparing statement: " . mysqli_error($db) . "</div>";
                                            exit;
                                        }
                                        mysqli_stmt_bind_param($stmt, 'is', $category_id, $construction_mode);

                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        if ($labor = mysqli_fetch_assoc($result)) {
                                            $laborCostPerSqFt = $labor['cost_per_sqft'];
                                            $totalLaborCostForCategory = round($laborCostPerSqFt * $effectiveAreaSize);
                                            echo "<p class='debug-info'><strong>Labor Cost " . htmlspecialchars(formatCost($totalLaborCostForCategory)) . "</strong></p>";

                                            // Update total costs
                                            $totalLaborCost += $totalLaborCostForCategory;

                                            if ($isGrayStructure) {
                                                $totalGrayStructureLaborCost += $totalLaborCostForCategory;
                                            } else {
                                                echo "";
                                            }

                                        } else {
                                            echo "<div class='error'></div>";
                                            return;
                                        }
                                    }
                                    ?>
                                     <?php
                        if (strcasecmp($covered_area, $grayStructureValue) === 0) {

                            displayCategoryItems($db, 1, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);
                            displayCategoryItems($db, 2, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);

                            $specificItems = [
                                'Switch Boards',
                                '3/4” dia. Electrical PVC Conduit with accessories',
                                '1” dia. Electrical PVC Conduit with accessories',
                                '1.5” dia. Electrical PVC Conduit with accessories',
                                '2” dia. Electrical PVC Conduit with accessories',
                                'PVC Ceiling Fan Hook'
                            ];

                            displayCategoryItems($db, 3, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode, $specificItems, true);
                            ?>
                        <div class="">
    <div class="row fixed-top">
        <div class="col-md-2">
            <p class="text-muted">Total Cost</p>
            <?php $totalCost = $totalMaterialCost + $totalLaborCost; ?>
            <h4 style="color: #A3640D;"><?= htmlspecialchars(formatCost($totalCost)) ?></h4>
        </div>

        <img src="./assets/img/2w2download.svg" alt="" style="width: 50px;">

        <div class="col-md-3">
            <p>Grey Structure Material Cost</p>
            <h4><?= htmlspecialchars(formatCost($totalMaterialCost)) ?></h4>
        </div>

        <div class="col-md-3">
            <p class="text-muted">Labour Cost</p>
            <h4><?= htmlspecialchars(formatCost($totalLaborCost)) ?></h4>
        </div>

        <div class="col-md-3">
            <p class="text-muted">Price Per Sq Ft</p>
            <h4><?= htmlspecialchars(formatCost($totalCost / $effectiveAreaSize)) ?></h4>
        </div>
    </div>
</div>

                            <?php
                        } else {
                            displayCategoryItems($db, 1, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);
                            displayCategoryItems($db, 2, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);
                            displayCategoryItems($db, 3, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);
                            displayCategoryItems($db, 4, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);
                            displayCategoryItems($db, 5, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);

                            ?>
                            
                            <div class="row fixed-top">
                                    <div class="col-md-2">
                                        <p class="text-muted">Total Cost</p>
                                        
                                <?php $totalCost = $totalMaterialCost + $totalLaborCost; ?>
                                        <h4 style="color: #A3640D;"><?= htmlspecialchars(formatCost($totalCost)) ?></h4>
                                    </div>

                                    <img src="./assets/img/2w2download.svg" alt="" style="width: 50px;">


                                    <div class="col-md-3">
                                        <p> Material Cost</p>
                                        <h4><?= htmlspecialchars(formatCost($totalMaterialCost)) ?></h4>
                                    </div>
                                   
                                    <div class="col-md-3">
                                        <p class="text-muted">Labour Cost</p>
                                        <h4><?= htmlspecialchars(formatCost($totalLaborCost)) ?></h4>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-muted">Price Per Sq Ft</p>
                                        <h4><?= htmlspecialchars(formatCost($effectiveAreaSize)) ?></h4>
                                    </div>
                                </div>

                        <?php }
                                } else {
                                    echo "<div class='error'>City not found.</div>";
                                }?>
                                </div>
                            </div>
                        </div>
                       
          <?php  }


            ?>
                <!-- ============================ Hero Banner End ================================== -->
                <section>
                    <div class="container">
                        <div class="mt-5">
                            <h3>Disclaimer</h3>
                            <p>This cost is for 5 Marla double storey House. All the information in this calculator is
                                published for
                                general information purpose only. All product prices are subject to change according to
                                the market
                                fluctuation and may not be 100% accurate.</p>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container my-5">
                        <div class="card px-5" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); padding:20px;">
                            <h3 class="u-mb16 heading_h3__yJ0ks">Construction Cost Calculator</h3>
                            <p class="text-gray-light u-mb24 ">Want to learn more about Zameen.com’s Construction Cost
                                Calculator
                                and build your dream house?</p>
                            <ul class="read-more_ccList__3539o text-gray-light flex flexColumn u-mb16 fs14">
                                <li>
                                    <div class="d-flex align-items-center"
                                        style="--font-size:0.875rem;--font-color:#707070;--gap:10"><svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 16 16" color="#00a651" style="color:#00a651" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                            </path>
                                        </svg>
                                        <div class="mx-3">Flexibility of Area Size and Units</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center"
                                        style="--font-size:0.875rem;--font-color:#707070;--gap:10"><svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 16 16" color="#00a651" style="color:#00a651" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                            </path>
                                        </svg>
                                        <div class="mx-3"> Separate Estimates for Grey Structure and Complete House
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center"
                                        style="--font-size:0.875rem;--font-color:#707070;--gap:10"><svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 16 16" color="#00a651" style="color:#00a651" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                            </path>
                                        </svg>
                                        <div class="mx-3">Multiple Construction Modes</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center"
                                        style="--font-size:0.875rem;--font-color:#707070;--gap:10"><svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 16 16" color="#00a651" style="color:#00a651" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                            </path>
                                        </svg>
                                        <div class="mx-3">Flexibility to Change the number of rooms</div>
                                    </div>
                                </li>
                            </ul><a target="_blank" rel="nofollow" class="button_btn__r8N5j button_outline__4xZ8Q"
                                href="https://www.zameen.com/blog/zameen-construction-cost-calculator.html">Read More
                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    style="margin-left:5px;margin-right:0" height="1em" width="1em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <line x1="7" y1="17" x2="17" y2="7"></line>
                                    <polyline points="7 7 17 7 17 17"></polyline>
                                </svg></a>
                        </div>
                    </div>
                </section>



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
                                    <a href="/tools/construction-cost-calculator/3-marla-house-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/4-marla-house-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/5-marla-house-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/6-marla-house-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/7-marla-house-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/8-marla-house-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/10-marla-house-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/1-kanal-house-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/3-marla-grey-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/5-marla-grey-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/10-marla-grey-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
                                    <a href="/tools/construction-cost-calculator/1-kanal-grey-construction-cost-lahore-1/"
                                        class="btn btn-primary">Details</a>
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
            <div class="container">
                <div style="border-radius: 5px; background-color: #fff; margin-top: 30px">
                    <h2 class="mb-3">Frequently Asked Questions (FAQs)</h2>
                    <div class="accordion" id="constructionCostsAccordion">
                        <!-- Construction Cost Per Sq. Ft -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                    style="color: #000; background-color: #f8f9fa; border-color: #ddd; box-shadow: none;">
                                    What is the construction cost per sq. ft in Lahore?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#constructionCostsAccordion">
                                <div class="accordion-body">
                                    <!-- Insert cost per sq. ft details here -->
                                </div>
                            </div>
                        </div>

                        <!-- Cost of Building 3 Marla House -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                                    style="color: #000; background-color: #f8f9fa; border-color: #ddd; box-shadow: none;">
                                    What is the cost of building a 3 Marla house in Lahore?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#constructionCostsAccordion">
                                <div class="accordion-body">
                                    <!-- Insert cost details for building 3 Marla house here -->
                                </div>
                            </div>
                        </div>

                        <!-- Grey Structure Cost -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                                    style="color: #000; background-color: #f8f9fa; border-color: #ddd; box-shadow: none;">
                                    What is the cost of building 3 Marla house grey structure in Lahore?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#constructionCostsAccordion">
                                <div class="accordion-body">
                                    <!-- Insert grey structure cost details here -->
                                </div>
                            </div>
                        </div>

                        <!-- Grey Structure Rate -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"
                                    style="color: #000; background-color: #f8f9fa; border-color: #ddd; box-shadow: none;">
                                    What is the grey structure rate in Lahore?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#constructionCostsAccordion">
                                <div class="accordion-body">
                                    <!-- Insert grey structure rate details here -->
                                </div>
                            </div>
                        </div>

                        <!-- Grey Structure Inclusions -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"
                                    style="color: #000; background-color: #f8f9fa; border-color: #ddd; box-shadow: none;">
                                    What is included in the grey structure?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#constructionCostsAccordion">
                                <div class="accordion-body">
                                    <!-- Insert grey structure inclusions here -->
                                </div>
                            </div>
                        </div>

                        <!-- Finishing Cost -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"
                                    style="color: #000; background-color: #f8f9fa; border-color: #ddd; box-shadow: none;">
                                    What is the finishing cost of building 3 Marla house in Lahore?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#constructionCostsAccordion">
                                <div class="accordion-body">
                                    <!-- Insert finishing cost details here -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>





        <!-- ============================ Footer Start ================================== -->
        <?php include ("include/footer.php"); ?>
        <!-- ============================ Footer End ================================== -->

        <!-- Log In Modal -->
        <?php include ("include/loginmodal.php"); ?>
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
        $(document).ready(function () {
            $('.click').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
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
        document.addEventListener('click', function (event) {
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



        function selectButton(buttonId) {
            // Reset both buttons to default state
            document.getElementById('button1').style.backgroundColor = '#ddd';
            document.getElementById('button1').style.color = '#000';
            document.getElementById('button2').style.backgroundColor = '#ddd';
            document.getElementById('button2').style.color = '#000';

            // Set the selected button to active state
            var selectedButton = document.getElementById(buttonId);
            selectedButton.style.backgroundColor = '#007bff';  // Active background color (e.g., Bootstrap primary color)
            selectedButton.style.color = '#fff';               // Active text color (e.g., white)
        }
    </script>

</body>


</html>
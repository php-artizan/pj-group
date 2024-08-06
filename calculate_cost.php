<!-- Add styling -->
<style>
    .debug-info, .info, .error {
        padding: 10px;
        margin: 10px 0;
    }
    .debug-info {
        background-color: #e7f3fe;
        border: 1px solid #b3d4fc;
        color: #31708f;
    }
    .info {
        background-color: #d9edf7;
        border: 1px solid #bce8f1;
        color: #31708f;
    }
    .error {
        background-color: #f2dede;
        border: 1px solid #ebccd1;
        color: #a94442;
    }
    .styled-table {
        border-collapse: collapse;
        margin: 25px auto;
        font-size: 0.9em;
        font-family: 'Arial', sans-serif;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }
    .styled-table th, .styled-table td {
        padding: 12px 15px;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }
    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
    .centered-table {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<?php
require "config/global.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';
    $area_size = isset($_POST['area_size']) ? trim($_POST['area_size']) : '';
    $covered_area_size = isset($_POST['covered_area_size']) ? trim($_POST['covered_area_size']) : '';
    $covered_area = isset($_POST['covered_area']) ? trim($_POST['covered_area']) : '';
    $construction_mode = isset($_POST['construction_mode']) ? trim($_POST['construction_mode']) : '';

    // Define a variable for 'Gray Structure'
    $grayStructureValue = 'Gray Structure';
   
    $conversionFactor = 405;
    $areaSizeInSqFt = $area_size * $conversionFactor;
    echo "<div class='debug-info'><h2 style='text-align:center;'><strong>Construction Cost for ". $area_size ." Marla House</strong></h2> " .  "<br>";

    $effectiveAreaSize = !empty($covered_area_size) ? $covered_area_size : $areaSizeInSqFt;

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

        function formatCost($cost) {
            if ($cost >= 100000) {
                return number_format($cost / 100000, 2) . " Lakh";
            } elseif ($cost >= 1000) {
                return number_format($cost / 1000, 2) . " Thousand";
            } else {
                return number_format($cost);
            }
        }
        
        
        function displayCategoryItems($db, $category_id, $city_id, $effectiveAreaSize, &$totalMaterialCost, &$totalLaborCost, &$totalGrayStructureMaterialCost, &$totalGrayStructureLaborCost, $construction_mode, $specificItems = [], $isGrayStructure = false) {
            $sql = "SELECT name FROM material_category WHERE id = ?";
            $stmt = mysqli_prepare($db, $sql);
            if ($stmt === false) {
                echo "<div class='error'>Error preparing statement: " . mysqli_error($db) . "</div>";
                exit;
            }
            mysqli_stmt_bind_param($stmt, 'i', $category_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($category = mysqli_fetch_assoc($result)) {
                echo "<h2>" . htmlspecialchars($category['name']) . "</h2>";

                $sql = "
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

                if (mysqli_num_rows($query) > 0) {
                    echo "<table class='styled-table centered-table'>";
                    echo "<thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                            </tr>
                          </thead>
                          <tbody>";
                    while ($row = mysqli_fetch_assoc($query)) {
                        if (!empty($specificItems) && !in_array($row['material_name'], $specificItems)) {
                            continue;
                        }

                        $totalQuantity = round($effectiveAreaSize * $row['quantity_per_sqft']);
                        $totalCost = round($totalQuantity * $row['price']);
                        $totalCategoryCost += $totalCost;

                        echo "<tr>
                                <td>" . htmlspecialchars($row['material_name']) . "</td>
                                <td>" . htmlspecialchars(number_format($row['price'])) . "/" . htmlspecialchars($row['unit']) . "</td>
                                <td>" . htmlspecialchars(number_format($totalQuantity)) . "</td>
                                <td>" . htmlspecialchars(number_format($totalCost)) . "</td>
                              </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='error'>No materials found for this category.</div>";
                }

                echo "<p class='debug-info'><strong>Total Material Cost for " . htmlspecialchars($category['name']) . ": " . htmlspecialchars(formatCost($totalCategoryCost)) . "</strong></p>";

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
                    }
                } else {
                    echo "";
                }
                
            } else {
                echo "<div class='error'>Category not found.</div>";
                return;
            }
        }
    

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

            echo "<h2 class='debug-info' style='text-align:center;'>Total Costs for ".$grayStructureValue."</h2>";
            echo "<p class='debug-info'><strong>Total Material Cost: " . htmlspecialchars(formatCost($totalMaterialCost)) . "</strong></p>";
            echo "<p><strong>Total Labor Cost: " . htmlspecialchars(formatCost($totalLaborCost)) . "</strong></p>";
            $totalCost = $totalMaterialCost + $totalLaborCost;
            echo "<p class='debug-info'><strong>Total Cost: " . htmlspecialchars(formatCost($totalCost)) . "</strong></p>";
        } else {
            displayCategoryItems($db, 1, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);
            displayCategoryItems($db, 2, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);
            displayCategoryItems($db, 3, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);
            displayCategoryItems($db, 4, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);
            displayCategoryItems($db, 5, $city_id, $effectiveAreaSize, $totalMaterialCost, $totalLaborCost, $totalGrayStructureMaterialCost, $totalGrayStructureLaborCost, $construction_mode);

            echo "<h2 class='' style='text-align:center;'>Total Costs</h2>";
            echo "<p class='debug-info'><strong>Total Material Cost: " . htmlspecialchars(formatCost($totalMaterialCost)) . "</strong></p>";
            echo "<p><strong>Total Labor Cost: " . htmlspecialchars(formatCost($totalLaborCost)) . "</strong></p>";
            $totalCost = $totalMaterialCost + $totalLaborCost;
            echo "<p class='debug-info'><strong>Total Cost: " . htmlspecialchars(formatCost($totalCost)) . "</strong></p>";
            return $totalCost;
        }
    } else {
        echo "<div class='error'>City not found.</div>";
    }
}
?>


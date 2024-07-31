<?php 
include __DIR__ . '/../init.php';

function dd($array){

    echo "<pre style='background: #000; color: #fff'>";
    print_r($array);
    echo "</pre>";
    die;
}


function redirect($route){
    $pageName = basename($_SERVER['PHP_SELF']);
    if($pageName != "$route.php"){
        header("Location: $route.php");

    }
}

function redirectBack($route){
    $pageName = basename($_SERVER['PHP_SELF']);
    if($pageName != "$route.php"){
        header("Location: $route");
    }
}

function uploadFile($fileInput, $directory, $allowedTypes = array('jpg', 'jpeg', 'png'), $maxFileSize = 500000) {
    $uploadOk = 1;
    $errorMessage = '';

    // Check if file is uploaded
    if (!isset($fileInput)) {
        $errorMessage = 'No file uploaded';
        $uploadOk = 0;
    }

    // Check file type
    $fileType = strtolower(pathinfo($fileInput["name"], PATHINFO_EXTENSION));
    if (!in_array($fileType, $allowedTypes)) {
        $errorMessage = 'Only '. implode(', ', $allowedTypes). 'iles are allowed';
        $uploadOk = 0;
    }

    // Check file size
    if ($fileInput["size"] > $maxFileSize) {
        $errorMessage = 'File size exceeds '. $maxFileSize. 'ytes';
        $uploadOk = 0;
    }

    // Check if file already exists
    $targetFile = UPLOADS_DIR. $directory. basename($fileInput["name"]);
    // if (file_exists($targetFile)) {
    //     $errorMessage = 'File already exists';
    //     $uploadOk = 0;
    // }

    // Check if $uploadOk is set to 0 by an error

    if ($uploadOk == 0) {
        return array('success' => false, 'message' => $errorMessage);
    }

    // Try to upload file
    if (move_uploaded_file($fileInput["tmp_name"], $targetFile)) {
        return array('success' => true, 'filename' =>  $directory. basename($fileInput["name"]));
    } else {
        return array('success' => false, 'message' => 'Failed to upload file');
    }
}
/**
 * Create a slug from a given string.
 *
 * @param string $string The input string to be converted to a slug.
 * @return string The generated slug.
 */
function createSlug($string) {
    // Convert the string to lowercase
    $string = strtolower($string);

    // Replace non-letter or digits by hyphens
    $string = preg_replace('~[^\pL\d]+~u', '-', $string);

    // Transliterate special characters to ASCII
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

    // Remove unwanted characters
    $string = preg_replace('~[^-\w]+~', '', $string);

    // Trim any leading or trailing hyphens
    $string = trim($string, '-');

    // Remove duplicate hyphens
    $string = preg_replace('~-+~', '-', $string);

    // Ensure the string is not empty
    if (empty($string)) {
        return 'n-a';
    }

    return $string;
}



function selectAllData($tableName, $conditions = [], $bool = false) {
    global $db;
    // Base query
    $sql = "SELECT * FROM $tableName";

    // Add conditions if provided
    if (!empty($conditions)) {
        $sql .= " WHERE ";
        $conditionArray = [];
        foreach ($conditions as $column => $value) {
            $conditionArray[] = "$column = '" . mysqli_real_escape_string($db,$value) . "'";
        }
        $sql .= implode(" AND ", $conditionArray);
    }

    // Execute the query
    $result = mysqli_query($db, $sql);



    // Fetch all results
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }


    // Return the data
    return $data;
}



function insertRowsIntoDatabase($table, $rows = [], $bool= false) {
    global $db;

        foreach ($rows as $row) {

            $columns = implode(", ", array_keys($row));
            $values = array_map(function($value) use ($db) {
                return "'" . mysqli_real_escape_string($db, $value) . "'";
            }, array_values($row));
            $values = implode(", ", $values);

            $query = "INSERT INTO $table ($columns) VALUES ($values)";

            mysqli_query($db, $query);
     
        }
}

function insertRowAndGetID($table, $row = [], $bool= false) {
    global $db;

            $columns = implode(", ", array_keys($row));
            $values = array_map(function($value) use ($db) {
                return "'" . mysqli_real_escape_string($db, $value) . "'";
            }, array_values($row));
            $values = implode(", ", $values);

            $query = "INSERT INTO $table ($columns) VALUES ($values)";

            
            if($bool){
                return $query;
            }

            if(mysqli_query($db, $query)){
                $inserted_id = mysqli_insert_id($db);
                return $inserted_id;
            }else{
                return false;
            }
}


function transformArrayAmenity($inputArray, $ad_id) {
    $outputArray = [];

    if (isset($inputArray) && is_array($inputArray)) {
        foreach ($inputArray as $amenity_id) {
            $outputArray[] = [
                'ad_id' => $ad_id,
                'amenty_id' => $amenity_id
            ];
        }
    }

    return $outputArray;
}

function transformArrayMetaKey($inputArray, $ad_id) {
    $outputArray = [];

    if (isset($inputArray) && is_array($inputArray)) {
        foreach ($inputArray as $key => $value) {
            $outputArray[] = [
                'ad_id' => $ad_id,
                'meta_key' => $key,
                'meta_value'=>$value,
            ];
        }
    }

    return $outputArray;
}


function uploadMultipleFiles($files, $uploadDir = "assets/img",$ad_id ,$rooDir = "",$allowedTypes = ["jpg", "jpeg", "png", "gif","jfif"], $maxSize = 2 * 1024 * 1024) {
    $response = [];

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    foreach ($files['name'] as $key => $fileName) {
        $fileTmpName = $files['tmp_name'][$key];
        $fileSize = $files['size'][$key];
        $fileError = $files['error'][$key];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Validate file type
        if (!in_array(strtolower($fileType), $allowedTypes)) {
            $response[] = [
                "fileName" => $fileName,
                "status" => "error",
                "message" => "Invalid file type."
            ];
            continue;
        }

        // Validate file size
        if ($fileSize > $maxSize) {
            $response[] = [
                "fileName" => $fileName,
                "status" => "error",
                "message" => "File size exceeds the maximum limit."
            ];
            continue;
        }

        // Check for errors
        if ($fileError !== UPLOAD_ERR_OK) {
            $response[] = [
                "fileName" => $fileName,
                "status" => "error",
                "message" => "Error uploading file."
            ];
            continue;
        }

        // Generate a unique file name to prevent overwriting
        $uniqueFileName = uniqid() . "." . $fileType;

        $finalUrl = $uploadDir;
        if(!empty($rooDir)){
            $finalUrl = $rooDir.$uploadDir;
        }
        // Move the file to the upload directory
        if (move_uploaded_file($fileTmpName, $finalUrl . $uniqueFileName)) {
            $response[] = [
                "ad_id" => $ad_id,
                "image_type" => $fileType,
                "path" => $uploadDir . $uniqueFileName,
            ];
        } else {
            $response[] = [
                "fileName" => $fileName,
                "status" => "error",
                "message" => "Failed to move uploaded file."
            ];
        }
    }

    return $response;
}

function displaylogo($width="60"){

    echo '<img src="assets/img/logo.png" width="'.$width.'px">';

    return;
}
function is_user_logged_in(){
    if (!isset($_SESSION['user_id'])) {
       return false;
    } else {
        return true;
        
    }
}
function check_user_session(){
    if (!isset($_SESSION['user_id'])) {
        redirect("login");
    } else {
        redirect("index");
    }
}

function site_name(){
    return "PJ Group";
}

function page_title($name=""){

    $title = $name." | ".site_name();
    return $title;

}   

  function returnJson($array){
      return json_encode($array);
  }


function deleteRow($table, $conditions) {

    global $db;

    $whereClauses = [];
    foreach ($conditions as $key => $value) {
        $whereClauses[] = "$key = '" . $db->real_escape_string($value) . "'";
    }
    $where = implode(' AND ', $whereClauses);

    $query = "DELETE FROM $table WHERE $where";

    if(mysqli_query($db, $query)){
        return  true;
    }else{
        return false;
    }
}


function updateRow($table, $row = [], $conditions = [], $bool = false) {
    global $db;

    // Construct the SET clause
    $setClauses = [];
    foreach ($row as $column => $value) {
        $setClauses[] = "$column = '" . mysqli_real_escape_string($db, $value) . "'";
    }
    $setClause = implode(", ", $setClauses);

    // Construct the WHERE clause from the conditions array
    $whereClauses = [];
    foreach ($conditions as $column => $value) {
        $whereClauses[] = "$column = '" . mysqli_real_escape_string($db, $value) . "'";
    }
    $whereClause = implode(" AND ", $whereClauses);

    // Create the UPDATE SQL query
    $query = "UPDATE $table SET $setClause WHERE $whereClause";

    // Return the query if $bool is true
    if ($bool) {
        return $query;
    }

    // Execute the query
    if (mysqli_query($db, $query)) {
        return true;
    } else {
        return false;
    }
}


function uploadSingleFile($uploadDir, $inputName, $pathSave="icons/",$allowedTypes = ['jpg', 'jpeg', 'png', 'gif']) {
    // Check if the upload directory exists, if not create it

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Check if file was uploaded without errors
    if ($_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
        // Validate file type
        $fileInfo = pathinfo($_FILES[$inputName]['name']);
        $extension = strtolower($fileInfo['extension']);
        if (!in_array($extension, $allowedTypes)) {
            return false; // Return false if file type is not allowed
        }

        // Generate unique filename to avoid overwriting existing files
        $fileName = uniqid() . '.' . $extension;
        $targetFile = $uploadDir . '/' . $fileName;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile)) {
            return $pathSave.$fileName; // Return the file path if upload was successful
        } else {
            return false; // Return false if file move failed
        }
    } else {
        return false; // Return false if there was an upload error
    }

    

}


function getAdminRoot($url){
 // Parse the URL to get its components
$parsed_url = parse_url($url);

// Extract the path component
$path = $parsed_url['path'];

// Find the position of "admin/" in the path
$admin_pos = strpos($path, 'admin/');

// Extract the part of the path up to "admin/"
$path_up_to_admin = substr($path, 0, $admin_pos + strlen('admin/'));

// Rebuild the full URL up to "admin/"
$full_url_up_to_admin = $parsed_url['scheme'] . '://' . $parsed_url['host'] . $path_up_to_admin;

// Output the result
return $full_url_up_to_admin;
}

function getUrlBeforeAdmin($url) {
    // Parse the URL to get its components
    $parsedUrl = parse_url($url);
    
    // Get the path component
    $path = $parsedUrl['path'];

    // Find the position of '/admin'
    $adminPos = strpos($path, '/admin');

    // If '/admin' is found in the path
    if ($adminPos !== false) {
        // Extract the path up to '/admin'
        $newPath = substr($path, 0, $adminPos);
    } else {
        // If '/admin' is not found, return the original URL
        return $url;
    }

    // Rebuild the URL
    $newUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $newPath;
    if (isset($parsedUrl['port'])) {
        $newUrl .= ':' . $parsedUrl['port'];
    }

    return $newUrl;
}

function getCurrentUri(){
    // Get the request scheme (http or https)
    $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

    // Get the host
    $host = $_SERVER['HTTP_HOST'];

    // Get the request URI
    $uri = $_SERVER['REQUEST_URI'];

    // Combine them to form the full URL
    $current_url = $scheme . '://' . $host . $uri;

    // Output the current URL
    return $current_url;
}
?>
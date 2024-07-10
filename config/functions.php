<?php 


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



?>
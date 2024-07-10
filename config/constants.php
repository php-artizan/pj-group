<?php
// Define the root path of the project
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', 'http://localhost/pj-group/');
}
// Define the uploads directory
if (!defined('ADMIN_PATH')) {
    define('ADMIN_PATH', ROOT_PATH . 'admin/');
}

// Define the uploads directory
if (!defined('UPLOADS_DIR')) {
    define('UPLOADS_DIR', ROOT_PATH . 'uploads/');
}


// Define the config directory
if (!defined('CONFIG_DIR')) {
    define('CONFIG_DIR', ROOT_PATH . 'config/');
}

// Define the config directory
if (!defined('IMG_DIR')) {
    define('IMG_DIR', UPLOADS_DIR . 'images/');
}

// // Usage examples
// echo "Root Path: " . ROOT_PATH . "\n";
// echo "Uploads Directory: " . UPLOADS_DIR . "\n";
// echo "Config Directory: " . CONFIG_DIR . "\n";

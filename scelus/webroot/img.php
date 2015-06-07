<?php 
// Include the class file.   
include_once(__DIR__ . '/../src/CImage/CImage.php');  

error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

// Define some constant values, append slash  
// Use DIRECTORY_SEPARATOR to make it work on both windows and unix.  
define('IMG_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'img/movie' . DIRECTORY_SEPARATOR);  
define('CACHE_PATH', __DIR__ . '/cache/');  

$CImageObj = new CImage(IMG_PATH, CACHE_PATH);

$CImageObj->performImgScript();
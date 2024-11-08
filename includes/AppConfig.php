<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$db       = 'kingsnaturals';


// Connect to mysql
$mysqli = new mysqli($host, $username, $password, $db);

// Check if there is any error in creating db connection.
if ($mysqli->connect_error) {
  die('Connect Error: Could not connect to database');
}
 



error_reporting(E_ALL); 
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE); 
ini_set('log_errors', TRUE);
ini_set('error_log', '../system_logs/SystemErrors.txt'); 
 
// Define the base URL for files
$GEN_BASE_URL = "http://" . $_SERVER['HTTP_HOST'] . "/kingsnaturals";
$FILE_URL = "http://" . $_SERVER['HTTP_HOST'] . "/kingsnaturals/includes";
$BASE_URL = "http://" . $_SERVER['HTTP_HOST'] . "/kingsnaturals/assets";

// Define directories for various assets
define('IMAGE_BASE_URL',   $BASE_URL . "/images");
define('VIDEO_BASE_URL',   $BASE_URL . "/videos");
define('ANIMATE_BASE_URL', $BASE_URL . "/animations");
define('ICON_BASE_URL',    $BASE_URL . "/icons");
define('FONT_BASE_URL',    $BASE_URL . "/fonts");
define('DOCS_BASE_URL',    $BASE_URL . "/documents");
define('DATA_BASE_URL',    $BASE_URL . "/user_data");
define('CSS_BASE_URL',     $GEN_BASE_URL . "/styles");
define('JS_BASE_URL',      $GEN_BASE_URL . "/javascript");

// Example of specific asset paths (image paths, video paths, etc.)
define('LOGO_IMAGE', IMAGE_BASE_URL . '/logo.png');
define('PROFILE_IMAGE', IMAGE_BASE_URL . '/profile.jpg');
define('SLIDE_IMAGE', IMAGE_BASE_URL . '/slider/slide1.jpg');

// Video paths
define('INTRO_VIDEO', VIDEO_BASE_URL . '/intro.mp4');
define('PROMO_VIDEO', VIDEO_BASE_URL . '/promo.mp4');

// CSS files
define('INDEX_CSS', CSS_BASE_URL . '/index.css');

// JavaScript files
define('CONFIG_JS', JS_BASE_URL . '/config.js');
define('REQUEST_JS', JS_BASE_URL . '/request.js');


// Example of fonts
define('FONT_ARIAL', FONT_BASE_URL . '/arial.ttf');
define('FONT_HELLO', FONT_BASE_URL . '/hello.ttf');


 
include_once($FILE_URL . 'encryption_functions.php');
include_once($FILE_URL . 'registration_functions.php');
include_once($FILE_URL . 'generalfunctions.php');






$encrypt         = new Encrypt();
$User            = new User();
$functions       = new Functions();





?>
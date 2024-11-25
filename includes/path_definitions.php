<?php
    // Define the base URL for files
    $GEN_BASE_URL = "http://" . $_SERVER['HTTP_HOST'] . "/kingsnaturals";
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
    define('LIB_BASE_URL',     $BASE_URL . "/libraries");

    // Example of specific asset paths (image paths, video paths, etc.)
    define('LOGO_IMAGE', IMAGE_BASE_URL . '/logo.png');
    define('PROFILE_IMAGE', IMAGE_BASE_URL . '/profile.jpg');
    define('SLIDE_IMAGE', IMAGE_BASE_URL . '/slider/slide1.jpg');

    // Video paths
    define('INTRO_VIDEO', VIDEO_BASE_URL . '/intro.mp4');
    define('PROMO_VIDEO', VIDEO_BASE_URL . '/kings.mp4');

    // CSS files
    define('INDEX_CSS', CSS_BASE_URL . '/index.css');
    define('ADMIN_CSS', CSS_BASE_URL . '/admin.css');


    // JavaScript files
    define('APP_JS', JS_BASE_URL . '/App.js');
    define('SCRIPT_JS', JS_BASE_URL . '/script.js');
    define('ADMIN_JS', JS_BASE_URL . '/admin.js');


    // libraries
    define('LIB_CSS', LIB_BASE_URL . '/css');
    define('LIB_JS',  LIB_BASE_URL . '/js');


?>
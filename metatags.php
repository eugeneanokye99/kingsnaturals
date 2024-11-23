<?php

// Define variables for dynamic meta tags (optional)
$page_title = isset($page_title) ? $page_title : "Kings Naturals - Premium Hair Products";
$page_description = isset($page_description) ? $page_description : "Discover Kings Naturals' range of premium hair products designed to nourish, style, and protect your hair. Shop now for quality you can trust.";
$page_keywords = isset($page_keywords) ? $page_keywords : "hair products, natural hair care, hair growth, shampoos, conditioners, styling products, Kings Naturals";
// $page_url = isset($page_url) ? $page_url : "https://www.kingsnaturals.com";
// $page_image = isset($page_image) ? $page_image : "https://www.kingsnaturals.com/assets/logo.png";
$page_url = isset($page_url) ? $page_url : "http://localhost/kingsnaturals";
$page_image = isset($page_image) ? $page_image : "http://localhost/kingsnaturals/assets/logo.png";

// Open Graph (OG) Tags for Social Media
$og_title = $page_title;
$og_description = $page_description;
$og_url = $page_url;
$og_image = $page_image;
$og_type = "website";
$og_site_name = "Kings Naturals";

// Twitter Card Tags
$twitter_card = "summary_large_image";
$twitter_title = $page_title;
$twitter_description = $page_description;
$twitter_image = $page_image;
$twitter_site = "@KingsNaturals"; // Replace with your Twitter handle
?>

<!-- Meta Tags -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">

<!-- Primary Meta Tags -->
<title><?php echo htmlspecialchars($page_title); ?></title>
<meta name="title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
<meta name="author" content="Kings Naturals">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="<?php echo htmlspecialchars($og_type); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($og_title); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($og_description); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($og_url); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>">
<meta property="og:site_name" content="<?php echo htmlspecialchars($og_site_name); ?>">

<!-- Twitter -->
<meta name="twitter:card" content="<?php echo htmlspecialchars($twitter_card); ?>">
<meta name="twitter:title" content="<?php echo htmlspecialchars($twitter_title); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($twitter_description); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($twitter_image); ?>">
<meta name="twitter:site" content="<?php echo htmlspecialchars($twitter_site); ?>">

<!-- PHP -->
<?php include "includes/path_definitions.php"; ?>

<!-- Favicon -->
<link rel="icon" href="<?php echo LOGO_IMAGE ?>" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo LOGO_IMAGE ?>" type="image/x-icon">


<!-- Stylesheets -->
<link rel="stylesheet" href="<?php echo LIB_CSS ?>/linearicons.css">
<link rel="stylesheet" href="<?php echo LIB_CSS ?>/swiper.css" />
<link rel="stylesheet" href="<?php echo LIB_CSS ?>/fontawesome.css">
<link rel="stylesheet" href="<?php echo INDEX_CSS ?>">
<link rel="stylesheet" type="text/css" href="<?php echo LIB_CSS ?>/toastify.css">



<!-- JavaScript -->
<script src="<?php echo LIB_JS ?>/crypto.js"></script>
<script type="text/javascript" src="<?php echo LIB_JS ?>/toastify.js"></script>



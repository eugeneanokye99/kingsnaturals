<?php
// Define variables for dynamic meta tags (optional)
$admin_title = isset($admin_title) ? $admin_title : "Admin Panel - Kings Naturals";
$admin_description = isset($admin_description) ? $admin_description : "Manage Kings Naturals products, orders, and users efficiently.";
$admin_keywords = isset($admin_keywords) ? $admin_keywords : "admin panel, management, dashboard, Kings Naturals";
$admin_url = isset($admin_url) ? $admin_url : "http://localhost/kingsnaturals/admin";
$admin_image = isset($admin_image) ? $admin_image : "http://localhost/kingsnaturals/assets/admin-logo.png";
?>

<!-- Meta Tags -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow"> <!-- Prevents search engine indexing -->

<!-- Primary Meta Tags -->
<title><?php echo htmlspecialchars($admin_title); ?></title>
<meta name="title" content="<?php echo htmlspecialchars($admin_title); ?>">
<meta name="description" content="<?php echo htmlspecialchars($admin_description); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($admin_keywords); ?>">
<meta name="author" content="Kings Naturals Admin Team">

<!-- Security -->
<!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline';">
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<meta http-equiv="X-Frame-Options" content="deny">
<meta http-equiv="X-XSS-Protection" content="1; mode=block"> -->

<!-- Compatibility -->
<meta name="theme-color" content="#ed1616"> <!-- Admin Panel Theme -->
<meta name="application-name" content="Kings Naturals Admin">
<meta name="msapplication-TileColor" content="#343a40">
<meta name="msapplication-config" content="none">

<!-- Open Graph (Optional for Admin Panel Sharing) -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($admin_title); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($admin_description); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($admin_url); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($admin_image); ?>">

<!-- PHP -->
<?php include "../includes/path_definitions.php"; ?>

<!-- Favicon -->
<link rel="icon" href="<?php echo LOGO_IMAGE ?>" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo LOGO_IMAGE ?>" type="image/x-icon">

<!-- Stylesheets -->

<!-- Icon Font StyleSheet -->
<link rel="stylesheet" href="<?php echo LIB_CSS ?>/all.min.css" />
<link rel="stylesheet" href="<?php echo LIB_CSS ?>/bootstrap-icons.css" />

<!-- Library Stylesheet -->
<link rel="stylesheet" href="<?php echo LIB_CSS ?>/owl.carousel.min.css" />
<link rel="stylesheet" href="<?php echo LIB_CSS ?>/tempusdominus-bootstrap-4.min.css" />

<!-- Customized Bootstrap Stylesheet -->
<link rel="stylesheet" href="<?php echo LIB_CSS ?>/bootstrap.min.css" />

<!-- Template Stylesheet -->
<link rel="stylesheet" href="<?php echo ADMIN_CSS ?>" />


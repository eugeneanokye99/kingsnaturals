<?php
// sitemap.php

header("Content-Type: application/xml; charset=UTF-8");

// Database connection
include 'AppConfig.php';

// Start XML output
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Static pages
$static_urls = [
    ['loc' => 'https://www.kingsnaturals.com/', 'lastmod' => '2024-10-16', 'changefreq' => 'daily', 'priority' => '1.0'],
    ['loc' => 'https://www.kingsnaturals.com/products/', 'lastmod' => '2024-10-16', 'changefreq' => 'weekly', 'priority' => '0.8'],
    // Add other static pages as needed
];

foreach ($static_urls as $url) {
    echo '<url>';
    echo '<loc>' . htmlspecialchars($url['loc']) . '</loc>';
    echo '<lastmod>' . $url['lastmod'] . '</lastmod>';
    echo '<changefreq>' . $url['changefreq'] . '</changefreq>';
    echo '<priority>' . $url['priority'] . '</priority>';
    echo '</url>';
}

// Dynamic URLs: Products
$result = $mysqli->query("SELECT id, updated_at FROM products");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_url = "https://www.kingsnaturals.com/product_details.php?id=" . $row['id'];
        $lastmod = date('Y-m-d', strtotime($row['updated_at']));
        echo '<url>';
        echo '<loc>' . htmlspecialchars($product_url) . '</loc>';
        echo '<lastmod>' . $lastmod . '</lastmod>';
        echo '<changefreq>weekly</changefreq>';
        echo '<priority>0.8</priority>';
        echo '</url>';
    }
}

// Close urlset
echo '</urlset>';

$mysqli->close();
?>

<?php
header('Content-Type: application/xml; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Homepage -->
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- Services Main -->
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/services/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>

    <!-- Individual Services -->
    <?php foreach ($services as $service): ?>
    <url>
        <loc><?php echo htmlspecialchars($siteUrl . '/services/' . $service['slug'] . '/'); ?></loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>

    <!-- Service Areas Main -->
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/service-areas/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    
    <!-- Individual Service Areas -->
    <?php foreach ($serviceAreas as $area): ?>
    <url>
        <loc><?php echo htmlspecialchars($siteUrl . '/service-areas/' . $area['slug'] . '/'); ?></loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <?php endforeach; ?>
    
    <!-- Blog Main -->
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/blog/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- Blog Posts -->
    <?php foreach ($blogPosts as $post): ?>
    <url>
        <loc><?php echo htmlspecialchars($siteUrl . '/blog/' . $post['slug'] . '/'); ?></loc>
        <lastmod><?php echo htmlspecialchars($post['dateISO']); ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    <?php endforeach; ?>

    <!-- Other Pages -->
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/about/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/contact/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/faq/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <!-- Legal Pages -->
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/privacy-policy/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/terms/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/cookie-policy/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc><?php echo htmlspecialchars($siteUrl); ?>/accessibility/</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
</urlset>

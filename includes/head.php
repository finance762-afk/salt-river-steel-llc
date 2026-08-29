<?php
/**
 * ============================================================
 * includes/head.php — Salt River Steel LLC
 * Document head with SEO, meta tags, schema, fonts, assets
 * ============================================================
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
    // Page-specific meta tags (set these variables before including head.php)
    $pageTitle = $pageTitle ?? $siteName . ' | ' . $primaryKeyword;
    $pageDescription = $pageDescription ?? 'Salt River Steel LLC provides custom steel gates, fencing, and construction services across Florence, AZ and surrounding areas. Commercial, residential, and industrial steel fabrication.';
    $pageCanonical = $pageCanonical ?? $siteUrl . '/';
    ?>
    
    <!-- Primary SEO -->
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($pageCanonical); ?>">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($pageCanonical); ?>">
    <meta property="og:image" content="<?php echo $siteUrl; ?>/assets/images/og-salt-river-steel.jpg">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName); ?>">
    <meta property="og:locale" content="en_US">
    
    <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    
    <!-- Self-hosted fonts (v6.2 — no Google Fonts CDN) -->
    <!-- Preload above-the-fold heading font -->
    <link rel="preload" href="/assets/fonts/bricolage-grotesque.woff2" as="font" type="font/woff2" crossorigin>
    <?php if (!empty($heroPreloadImage)): ?>
    <!-- Preload the LCP hero image (set by the page before including head.php) -->
    <link rel="preload" href="<?php echo htmlspecialchars($heroPreloadImage); ?>" as="image" type="image/webp" fetchpriority="high">
    <?php endif; ?>
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>">
    
    <!-- Google Analytics (placeholder) -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsId; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo $googleAnalyticsId; ?>');
    </script> -->
    
    <!-- LocalBusiness Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "GeneralContractor",
        "@id": "<?php echo $siteUrl; ?>/#organization",
        "name": "<?php echo htmlspecialchars($siteName); ?>",
        "url": "<?php echo $siteUrl; ?>",
        "telephone": "<?php echo $phone; ?>",
        "email": "<?php echo $email; ?>",
        "description": "Custom steel gates, fencing, and construction services for commercial, residential, and industrial projects in Florence, AZ and surrounding areas.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?php echo htmlspecialchars($address['street']); ?>",
            "addressLocality": "<?php echo htmlspecialchars($address['city']); ?>",
            "addressRegion": "<?php echo $address['state']; ?>",
            "postalCode": "<?php echo $address['zip']; ?>",
            "addressCountry": "US"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": <?php echo $geo['lat']; ?>,
            "longitude": <?php echo $geo['lng']; ?>
        },
        "hasMap": "<?php echo $gbpUrl; ?>",
        "image": "<?php echo $siteUrl; ?>/assets/images/logo-mark.png",
        "priceRange": "$$",
        "areaServed": [
            {
                "@type": "City",
                "name": "Florence",
                "containedIn": {
                    "@type": "State",
                    "name": "Arizona"
                }
            }
        ],
        "serviceType": [
            "Custom Steel Gates",
            "Steel Fencing",
            "Commercial Steel Construction",
            "Residential Steel Work",
            "Industrial Steel Fabrication"
        ],
        "foundingDate": "<?php echo $yearEstablished; ?>",
        "slogan": "<?php echo htmlspecialchars($tagline); ?>"
    }
    </script>
</head>

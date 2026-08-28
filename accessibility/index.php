<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   accessibility/index.php — Salt River Steel LLC — Accessibility Statement
   ============================================================ */

$currentPage      = 'accessibility';
$pageTitle        = 'Accessibility Statement | Salt River Steel LLC';
$pageDescription  = 'Our commitment to digital accessibility. Salt River Steel LLC strives to meet WCAG 2.1 Level AA standards for all visitors.';
$canonicalUrl     = $siteUrl . '/accessibility/';
$pageCanonical    = $canonicalUrl;
$ogImage          = $siteUrl . '/assets/images/logo.png';

$lastUpdated      = date('F j, Y');

/* ---------- Schema ---------- */
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebPage',
            '@id' => $canonicalUrl . '#webpage',
            'url' => $canonicalUrl,
            'name' => $pageTitle,
            'description' => $pageDescription,
            'provider' => ['@id' => $siteUrl . '/#organization']
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Accessibility', 'item' => $canonicalUrl],
            ]
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

<!-- Hero -->
<section class="hero hero--legal" aria-label="Accessibility Statement">
    <div class="hero__copy">
        <span class="eyebrow-label">Legal</span>
        <h1>Accessibility Statement</h1>
        <span class="section-subtitle">inclusive by design</span>
        <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">Accessibility</li>
        </ol>
    </div>
</nav>

<!-- Content -->
<article class="legal-prose">

<h2>1. Our Commitment</h2>
<p><?php echo htmlspecialchars($siteName); ?> is committed to ensuring digital accessibility for people with disabilities. We continually improve the user experience for everyone and apply relevant accessibility standards to <?php echo htmlspecialchars($domain); ?>.</p>

<h2>2. Conformance Status</h2>
<p>This site is designed to conform with Web Content Accessibility Guidelines (WCAG) 2.1 Level AA. WCAG defines requirements for designers and developers to improve accessibility for people with disabilities. Our site partially conforms with WCAG 2.1 Level AA, meaning some content does not yet fully meet the standard. We are working to address all known issues.</p>

<h2>3. Accessibility Features</h2>
<p>Our website includes the following accessibility features:</p>
<ul>
    <li>Semantic HTML5 markup with proper landmark regions (header, nav, main, footer)</li>
    <li>Skip-to-content link at the top of every page</li>
    <li>Visible keyboard focus indicators on all interactive elements</li>
    <li>Alt text on all meaningful images</li>
    <li>Sufficient color contrast for body text and interactive elements</li>
    <li>Responsive design that works across screen sizes and zoom levels</li>
    <li><code>prefers-reduced-motion</code> support — animations disabled for users who request reduced motion</li>
    <li>ARIA labels on navigation and form elements</li>
    <li>Form field labels associated with inputs</li>
    <li>Logical heading hierarchy on every page</li>
</ul>

<h2>4. Known Issues</h2>
<p>We are aware of these areas needing improvement:</p>
<ul>
    <li>Some third-party embeds (Google Maps, manufacturer tools) may not fully meet WCAG standards. We provide alternative ways to access this information (call us, email us).</li>
    <li>Some images may lack sufficiently descriptive alt text. We are auditing and updating these.</li>
</ul>

<h2>5. Feedback and Reporting Issues</h2>
<p>If you encounter an accessibility barrier on this site, please tell us. We aim to respond to accessibility feedback within 5 business days.</p>
<p>Contact us at:</p>
<ul>
    <li>Email: <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a></li>
    <li>Phone: <a href="tel:+<?php echo $phoneDigits; ?>"><?php echo htmlspecialchars($phone); ?></a></li>
    <li>Mail: <?php echo htmlspecialchars($address['street']); ?>, <?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></li>
</ul>
<p>When reporting an issue, please describe:</p>
<ul>
    <li>The page URL where you encountered the barrier</li>
    <li>A description of the problem</li>
    <li>The assistive technology you're using (if applicable)</li>
</ul>

<h2>6. Alternative Contact Methods</h2>
<p>If our website is not accessible to you, you can reach us by phone or mail. We will provide service information in alternative formats on request, including:</p>
<ul>
    <li>Email correspondence</li>
    <li>Phone consultation</li>
    <li>In-person meetings at our Florence location</li>
</ul>

<h2>7. Changes to This Statement</h2>
<p>We may update this Accessibility Statement from time to time. The "Last Updated" date at the top will reflect the most recent change.</p>

<h2>8. Contact Us</h2>
<p>For accessibility questions or assistance:</p>
<p>
    <strong><?php echo htmlspecialchars($siteName); ?></strong><br>
    Email: <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a><br>
    Phone: <a href="tel:+<?php echo $phoneDigits; ?>"><?php echo htmlspecialchars($phone); ?></a><br>
    Address: <?php echo htmlspecialchars($address['street']); ?>, <?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?>
</p>

<div class="legal-disclaimer">
    General template; recommend attorney review.
</div>

</article>

</main>

<!-- Schema -->
<?php echo $schemaMarkup; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

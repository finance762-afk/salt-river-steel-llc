<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   terms/index.php — Salt River Steel LLC — Terms of Service
   ============================================================ */

$currentPage      = 'terms';
$pageTitle        = 'Terms of Service | Salt River Steel LLC';
$pageDescription  = 'Terms of Service for Salt River Steel LLC. Understand our service agreements, estimates, project work, warranties, and liability terms.';
$canonicalUrl     = $siteUrl . '/terms/';
$pageCanonical    = $canonicalUrl;
$ogImage          = $siteUrl . '/assets/images/logo.png';

$companyEntityType = 'Limited Liability Company';
$companyState      = 'Arizona';
$companyCounty     = 'Pinal';
$companyPhoneE164  = '+' . $phoneDigits;
$lastUpdated       = date('F j, Y');

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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Terms of Service', 'item' => $canonicalUrl],
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
<section class="hero hero--legal" aria-label="Terms of Service">
    <div class="hero__copy">
        <span class="eyebrow-label">Legal</span>
        <h1>Terms of Service</h1>
        <span class="section-subtitle">your agreement with us</span>
        <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">Terms of Service</li>
        </ol>
    </div>
</nav>

<!-- Content -->
<article class="legal-prose">

<h2>1. Agreement to Terms</h2>
<p>By accessing or using <?php echo htmlspecialchars($domain); ?> or engaging <?php echo htmlspecialchars($siteName); ?> for services, you agree to these Terms of Service. If you do not agree, do not use this site or our services.</p>

<h2>2. Use of This Website</h2>
<ul>
    <li>You may use this Site for personal, non-commercial purposes to learn about our services and contact us.</li>
    <li>You may not use the Site for unlawful purposes, attempt to access non-public systems, scrape or copy content without written permission, submit false information through our contact form, or use automated systems to extract data.</li>
</ul>

<h2>3. Service Estimates and Quotes</h2>
<p>All estimates are based on information provided and conditions visible at the time of inspection. Final pricing may differ if:</p>
<ul>
    <li>Project scope changes</li>
    <li>Material costs change between estimate and project start</li>
    <li>Fabrication requirements differ from initial assumptions</li>
</ul>
<p>Verbal quotes are non-binding. Only written, signed contracts constitute a final agreement.</p>

<h2>4. Project Work</h2>
<ul>
    <li>Work is governed by a written contract specific to each job.</li>
    <li>We comply with applicable <?php echo htmlspecialchars($companyState); ?> state and local building codes.</li>
    <li>Work is performed by <?php echo htmlspecialchars($siteName); ?> employees and qualified subcontractors.</li>
    <li>We are licensed and insured to operate in the state of <?php echo htmlspecialchars($companyState); ?>.</li>
</ul>

<h2>5. Warranties</h2>
<p>Workmanship warranties are detailed in your project contract. Manufacturer warranties on materials are provided by those manufacturers and pass through to you upon project completion. Warranties exclude:</p>
<ul>
    <li>Acts of God beyond manufacturer ratings</li>
    <li>Damage from neglect or alteration by others</li>
    <li>Pre-existing conditions disclosed prior to work</li>
    <li>Normal wear and weathering on outdoor steel (rust patina on bare steel is expected; finished steel is covered per the finish warranty)</li>
</ul>

<h2>6. Payment Terms</h2>
<p>Payment terms are specified in your project contract. Standard terms include:</p>
<ul>
    <li>A deposit at contract signing</li>
    <li>Progress payments at milestones where applicable</li>
    <li>Final balance due upon project completion</li>
</ul>
<p>We accept check, electronic transfer, and cash. Past-due balances may accrue interest as permitted by <?php echo htmlspecialchars($companyState); ?> law.</p>

<h2>7. Cancellation</h2>
<p>Cancellation terms are specified in your contract. Generally:</p>
<ul>
    <li>Cancellation prior to materials ordered: deposit refunded minus administrative costs</li>
    <li>Cancellation after materials ordered: deposit forfeited; materials become customer property</li>
    <li>Cancellation after work begins: payment due for work completed plus materials</li>
</ul>

<h2>8. Limitation of Liability</h2>
<p>To the maximum extent permitted by <?php echo htmlspecialchars($companyState); ?> law, <?php echo htmlspecialchars($siteName); ?>'s total liability for any claim related to the Site or our services shall not exceed the amount you paid for the specific service giving rise to the claim. We are not liable for indirect, incidental, special, or consequential damages.</p>

<h2>9. Intellectual Property</h2>
<p>All content on this Site — text, graphics, photographs, logos — is owned by <?php echo htmlspecialchars($siteName); ?> or used with permission, and is protected by copyright. You may not reproduce, distribute, or create derivative works without written permission.</p>

<h2>10. Governing Law and Disputes</h2>
<p>These Terms are governed by the laws of the State of <?php echo htmlspecialchars($companyState); ?> without regard to conflict-of-laws principles. Any disputes shall be resolved in the state or federal courts located in <?php echo htmlspecialchars($companyCounty); ?> County, <?php echo htmlspecialchars($companyState); ?>.</p>

<h2>11. Changes to These Terms</h2>
<p>We may update these Terms at any time. The "Last Updated" date will reflect the most recent version. Continued use of the Site after updates constitutes acceptance of revised Terms.</p>

<h2>12. Contact Us</h2>
<p>For questions about these Terms:</p>
<p>
    <strong><?php echo htmlspecialchars($siteName); ?></strong><br>
    Email: <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a><br>
    Phone: <a href="tel:<?php echo htmlspecialchars($companyPhoneE164); ?>"><?php echo htmlspecialchars($phone); ?></a><br>
    Address: <?php echo htmlspecialchars($address['street']); ?>, <?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?>
</p>

<div class="legal-disclaimer">
    This document is provided as a general template. We recommend reviewing with a licensed <?php echo htmlspecialchars($companyState); ?> attorney before publication.
</div>

</article>

</main>

<!-- Schema -->
<?php echo $schemaMarkup; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

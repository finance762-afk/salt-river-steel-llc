<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   cookie-policy/index.php — Salt River Steel LLC — Cookie Policy
   ============================================================ */

$currentPage      = 'cookie-policy';
$pageTitle        = 'Cookie Policy | Salt River Steel LLC';
$pageDescription  = 'How Salt River Steel LLC uses cookies and similar technologies on our website. Learn how to control and manage cookies.';
$canonicalUrl     = $siteUrl . '/cookie-policy/';
$pageCanonical    = $canonicalUrl;
$ogImage          = $siteUrl . '/assets/images/logo-mark.png';

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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Cookie Policy', 'item' => $canonicalUrl],
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
<section class="hero hero--legal" aria-label="Cookie Policy">
    <div class="hero__copy">
        <span class="eyebrow-label">Legal</span>
        <h1>Cookie Policy</h1>
        <span class="section-subtitle">how we use cookies</span>
        <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">Cookie Policy</li>
        </ol>
    </div>
</nav>

<!-- Content -->
<article class="legal-prose">

<h2>1. What Are Cookies?</h2>
<p>Cookies are small text files stored on your device when you visit a website. They are used to make websites work more efficiently and provide information to site owners about how visitors use the site.</p>

<h2>2. Cookies We Use</h2>

<h3>Strictly Necessary</h3>
<p>Essential for site functionality (form submission, security). These cannot be disabled. Example: session cookies during form submission.</p>

<h3>Analytics (Google Analytics 4)</h3>
<p>We use Google Analytics 4 to understand how visitors use our site. GA4 sets cookies prefixed with <code>_ga</code> and <code>_gid</code>. Data is anonymized via IP truncation. This helps us:</p>
<ul>
    <li>Understand which pages are most popular</li>
    <li>See how visitors navigate through the site</li>
    <li>Identify technical issues</li>
    <li>Improve our content and user experience</li>
</ul>

<h3>Third-Party Embeds</h3>
<p>Our site may embed tools and content from third parties (Google Maps, manufacturer tools, etc.). These services may set their own cookies subject to their own privacy policies:</p>
<ul>
    <li><strong>Google Maps:</strong> embedded map on our Contact page may set cookies. See <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Google's Privacy Policy</a>.</li>
</ul>

<h2>3. How to Control Cookies</h2>
<p>Most browsers allow you to view, delete, or block cookies. You can:</p>
<ul>
    <li>Block third-party cookies while allowing first-party cookies</li>
    <li>Block all cookies (note: site functionality may break)</li>
    <li>Delete cookies after each browsing session</li>
</ul>
<p>Browser-specific instructions are available from:</p>
<ul>
    <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener">Google Chrome</a></li>
    <li><a href="https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer" target="_blank" rel="noopener">Mozilla Firefox</a></li>
    <li><a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac" target="_blank" rel="noopener">Apple Safari</a></li>
    <li><a href="https://support.microsoft.com/en-us/windows/manage-cookies-in-microsoft-edge-view-allow-block-delete-and-use-168dab11-0753-043d-7c16-ede5947fc64d" target="_blank" rel="noopener">Microsoft Edge</a></li>
</ul>

<h2>4. Opt Out of Google Analytics</h2>
<p>You can opt out of GA4 tracking site-wide by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics Opt-out Browser Add-on</a>.</p>

<h2>5. Our Cookie Notice</h2>
<p>We display a brief banner notifying visitors of our cookie use. Once dismissed, the banner is suppressed for future visits via localStorage. You can re-enable the banner by clearing your browser's site data for <?php echo htmlspecialchars($domain); ?>.</p>

<h2>6. Changes to This Policy</h2>
<p>We may update this Cookie Policy from time to time. The "Last Updated" date at the top will reflect the most recent change. Material changes will be prominently posted on the site.</p>

<h2>7. Contact Us</h2>
<p>For questions about our cookie use:</p>
<p>
    <strong><?php echo htmlspecialchars($siteName); ?></strong><br>
    Email: <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a><br>
    Phone: <a href="tel:+<?php echo $phoneDigits; ?>"><?php echo htmlspecialchars($phone); ?></a>
</p>

<div class="legal-disclaimer">
    General template; recommend attorney review.
</div>

</article>

</main>

<!-- Schema -->
<?php echo $schemaMarkup; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

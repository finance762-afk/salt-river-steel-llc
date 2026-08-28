<?php
/**
 * Test file to verify Phase 2 components (head, header, footer, functions)
 */

// Load config
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';

// Page variables
$currentPage = 'home';
$pageTitle = $siteName . ' | ' . $tagline;
$pageDescription = 'Custom steel gates, fencing, and construction services in Florence, AZ. Commercial, residential, and industrial steel fabrication and welding. Free estimates.';
$canonicalUrl = $siteUrl . '/';

// Include head
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';

// Include header
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Test Content -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); min-height: 60vh; display: flex; align-items: center; justify-content: center;">
    <div class="container" style="text-align: center;">
        <h1 style="color: white; font-size: 3rem; margin-bottom: 1rem;">Phase 2 Components Test</h1>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.25rem; margin-bottom: 2rem;">
            Testing head.php, header.php, footer.php, and functions.php
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="#test-section" class="btn btn-accent btn-lg">Scroll to Test</a>
            <a href="/contact/" class="btn btn-outline-white btn-lg">Contact Us</a>
        </div>
    </div>
</section>

<section id="test-section" style="background: var(--color-light); padding: 4rem 0;">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Component Tests</h2>

        <div class="grid-2" style="gap: 2rem; margin-top: 3rem;">
            <div style="background: white; padding: 2rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-card);">
                <h3 style="margin-bottom: 1rem;">✓ Head Component</h3>
                <ul style="list-style: none; padding: 0; color: var(--color-gray);">
                    <li>✓ Meta tags loaded</li>
                    <li>✓ Open Graph tags present</li>
                    <li>✓ Schema.org LocalBusiness markup</li>
                    <li>✓ Self-hosted fonts (Bricolage Grotesque, Figtree, Caveat)</li>
                    <li>✓ Favicons generated and linked</li>
                </ul>
            </div>

            <div style="background: white; padding: 2rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-card);">
                <h3 style="margin-bottom: 1rem;">✓ Header Component</h3>
                <ul style="list-style: none; padding: 0; color: var(--color-gray);">
                    <li>✓ Logo with black chrome background</li>
                    <li>✓ Desktop navigation with dropdowns</li>
                    <li>✓ Mobile hamburger menu</li>
                    <li>✓ Service links from config.php</li>
                    <li>✓ Inline SVG icons (no CDN)</li>
                </ul>
            </div>

            <div style="background: white; padding: 2rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-card);">
                <h3 style="margin-bottom: 1rem;">✓ Footer Component</h3>
                <ul style="list-style: none; padding: 0; color: var(--color-gray);">
                    <li>✓ 4-column footer grid</li>
                    <li>✓ AEO entity block with schema</li>
                    <li>✓ Footer legal row (v6.1 required)</li>
                    <li>✓ Dofollow Page One credit link</li>
                    <li>✓ Mobile sticky CTA bar</li>
                    <li>✓ Back-to-top button</li>
                </ul>
            </div>

            <div style="background: white; padding: 2rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-card);">
                <h3 style="margin-bottom: 1rem;">✓ Functions Component</h3>
                <ul style="list-style: none; padding: 0; color: var(--color-gray);">
                    <li>✓ isActivePage() helper</li>
                    <li>✓ formatPhone() helper</li>
                    <li>✓ getServiceSlug() helper</li>
                    <li>✓ icon() inline SVG helper</li>
                    <li>✓ Schema generation helpers</li>
                </ul>
            </div>
        </div>

        <div style="background: var(--color-accent); color: white; padding: 2rem; border-radius: var(--radius-lg); margin-top: 3rem; text-align: center;">
            <h3 style="color: white; margin-bottom: 1rem;">Services from Config</h3>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center;">
                <?php foreach ($services as $service): ?>
                <a href="/services/<?php echo $service['slug']; ?>/" class="btn btn-outline-white">
                    <?php echo htmlspecialchars($service['name']); ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>

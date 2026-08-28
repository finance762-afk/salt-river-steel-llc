<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$pageTitle = 'Steel Gates & Fencing in Apache Junction, AZ | Salt River Steel LLC';
$pageDescription = 'Custom steel gates, railings, and residential metalwork in Apache Junction, AZ. Local fabrication serving eastern Valley homeowners. Free estimates.';
$pageCanonical = $siteUrl . '/service-areas/apache-junction/';
$canonicalUrl = $pageCanonical;
$heroPreloadImage = '/assets/images/residential-steel-work-1600.webp';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
        { "@type": "ListItem", "position": 2, "name": "Service Areas", "item": "<?php echo $siteUrl; ?>/service-areas/" },
        { "@type": "ListItem", "position": 3, "name": "Apache Junction", "item": "<?php echo $siteUrl; ?>/service-areas/apache-junction/" }
    ]
}
</script>

<style>
.hero--area-page { position: relative; min-height: 50vh; display: flex; align-items: center; background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark)); overflow: hidden; }
.hero--area-page::before { content: ''; position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6)); z-index: 1; }
.hero--area-page::after { content: ''; position: absolute; inset: 0; background-image: url('/assets/images/residential-steel-work.jpg'); background-size: cover; background-position: center; opacity: 0.2; z-index: 0; }
.hero--area-page .container { position: relative; z-index: 2; }
.hero-area-content { max-width: 800px; color: white; padding: var(--space-4xl) 0; }
.hero-area-content h1 { font-size: clamp(2rem, 5vw, 3rem); font-weight: 700; margin-bottom: var(--space-md); text-wrap: balance; }
.hero-area-content .intro-text { font-size: 1.25rem; line-height: 1.6; margin-bottom: var(--space-xl); opacity: 0.95; }
.area-highlights { display: flex; gap: var(--space-lg); flex-wrap: wrap; margin-top: var(--space-lg); }
.area-highlight { display: flex; align-items: center; gap: var(--space-sm); font-size: 1rem; font-weight: 500; }
.area-highlight svg { color: var(--color-accent); }
.area-content-section { padding: var(--space-4xl) 0; }
.area-content-section h2 { font-size: clamp(1.75rem, 4vw, 2.5rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.area-content-section p { font-size: 1.125rem; line-height: 1.8; margin-bottom: var(--space-lg); max-width: 75ch; }
.services-checklist { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-md); margin: var(--space-xl) 0; }
.service-check-item { display: flex; align-items: flex-start; gap: var(--space-sm); padding: var(--space-md); background: var(--color-bg-alt); border-radius: var(--radius); border-left: 3px solid var(--color-accent); }
.service-check-item svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.cta-section-area { background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark)); color: white; padding: var(--space-4xl) 0; text-align: center; }
.cta-section-area h2 { font-size: clamp(1.75rem, 4vw, 2.5rem); margin-bottom: var(--space-lg); }
.cta-section-area p { font-size: 1.125rem; margin-bottom: var(--space-xl); max-width: 65ch; margin-left: auto; margin-right: auto; }
.cta-buttons { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }
</style>

<section class="hero--area-page">
    <div class="container">
        <div class="hero-area-content">
            <h1>Custom Steel Gates & Railings in Apache Junction, AZ</h1>
            <p class="intro-text">
                Salt River Steel LLC serves Apache Junction homeowners with custom residential steel work. Based in Florence,
                we deliver professional fabrication and installation for gates, fencing, railings, and carports throughout the eastern Valley.
            </p>
            <div class="area-highlights">
                <div class="area-highlight"><?php echo icon('map-pin', 20); ?> Serving Apache Junction</div>
                <div class="area-highlight"><?php echo icon('clock', 20); ?> 3-5 Day Turnaround</div>
                <div class="area-highlight"><?php echo icon('truck', 20); ?> Local Delivery</div>
            </div>
        </div>
    </div>
</section>

<article class="area-content-section">
    <div class="container"><div class="prose">
        <h2>Steel Fabrication for Apache Junction Homes</h2>
        <p><strong>Salt River Steel LLC</strong> is a licensed steel construction company serving Apache Junction residential clients
        from our Florence fabrication shop. Apache Junction's eastern Valley location — where the Superstition Mountains meet established
        retirement communities and newer residential developments — demands custom steel solutions that withstand Arizona's climate while
        complementing Southwestern architectural styles.</p>

        <p>We fabricate custom entry gates, decorative railings, steel carports, and residential fencing for Apache Junction properties
        including Apache Wells, Venture Out, Superstition Springs neighborhoods, and custom hillside homes near the mountains. Every project
        is engineered for Arizona wind loads and UV exposure, powder-coated for long-term durability.</p>

        <h3>Steel Services for Apache Junction</h3>
        <div class="services-checklist">
            <div class="service-check-item"><?php echo icon('check', 20); ?><span>Custom Entry & Driveway Gates</span></div>
            <div class="service-check-item"><?php echo icon('check', 20); ?><span>Decorative Steel Railings</span></div>
            <div class="service-check-item"><?php echo icon('check', 20); ?><span>Carports & Shade Structures</span></div>
            <div class="service-check-item"><?php echo icon('check', 20); ?><span>Residential Perimeter Fencing</span></div>
        </div>

        <p><strong>Licensed Arizona contractor serving Pinal and Maricopa Counties.</strong> Every gate and fence is fabricated in-house with
        American-made steel and installed by our crew. We warranty our work and stand behind every weld — no subcontractors, no shortcuts.</p>
    </div></div>
</article>

<section class="cta-section-area">
    <div class="container">
        <h2>Get a Free Estimate for Your Apache Junction Steel Project</h2>
        <p>Custom gates, railings, or fencing — we're ready to help.</p>
        <div class="cta-buttons">
            <a href="/contact/" class="btn-primary btn-large">Request Free Estimate</a>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn-secondary btn-large">Call <?php echo $phone; ?></a>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

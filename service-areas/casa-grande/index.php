<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$pageTitle = 'Steel Gates & Fencing in Casa Grande, AZ | Salt River Steel LLC';
$pageDescription = 'Custom steel gates, fencing, and fabrication serving Casa Grande, Arizona. Commercial, residential & industrial steel work for Pinal County\'s largest city. Free estimates.';
$pageCanonical = $siteUrl . '/service-areas/casa-grande/';
$canonicalUrl = $pageCanonical;
$heroPreloadImage = '/assets/images/custom-steel-ranch-entry-gate-1440.webp';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "<?php echo $siteUrl; ?>/"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Service Areas",
            "item": "<?php echo $siteUrl; ?>/service-areas/"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "Casa Grande",
            "item": "<?php echo $siteUrl; ?>/service-areas/casa-grande/"
        }
    ]
}
</script>

<style>
/* Page-specific styles for Casa Grande service area page */
.hero--area-page {
    position: relative;
    min-height: 50vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    overflow: hidden;
}

.hero--area-page::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.6) 100%);
    z-index: 1;
}

.hero--area-page::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url('/assets/images/custom-steel-ranch-entry-gate-1440.webp');
    background-size: cover;
    background-position: center;
    opacity: 0.2;
    z-index: 0;
}

.hero--area-page .container {
    position: relative;
    z-index: 2;
}

.hero-area-content {
    max-width: 800px;
    color: white;
    padding: var(--space-4xl) 0;
}

.hero-area-content h1 {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 700;
    margin-bottom: var(--space-md);
    text-wrap: balance;
}

.hero-area-content .intro-text {
    font-size: 1.25rem;
    line-height: 1.6;
    margin-bottom: var(--space-xl);
    opacity: 0.95;
}

.area-highlights {
    display: flex;
    gap: var(--space-lg);
    flex-wrap: wrap;
    margin-top: var(--space-lg);
}

.area-highlight {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 1rem;
    font-weight: 500;
}

.area-highlight svg {
    color: var(--color-accent);
}

.area-content-section {
    padding: var(--space-4xl) 0;
}

.area-content-section h2 {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    margin-bottom: var(--space-lg);
    text-wrap: balance;
}

.area-content-section p {
    font-size: 1.125rem;
    line-height: 1.8;
    margin-bottom: var(--space-lg);
    max-width: 75ch;
}

.services-checklist {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--space-md);
    margin: var(--space-xl) 0;
}

.service-check-item {
    display: flex;
    align-items: flex-start;
    gap: var(--space-sm);
    padding: var(--space-md);
    background: var(--color-bg-alt);
    border-radius: var(--radius);
    border-left: 3px solid var(--color-accent);
}

.service-check-item svg {
    color: var(--color-accent);
    flex-shrink: 0;
    margin-top: 2px;
}

.local-proof-section {
    background: var(--color-bg-alt);
    padding: var(--space-4xl) 0;
}

.local-proof-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-xl);
    margin-top: var(--space-xl);
}

.proof-card {
    padding: var(--space-xl);
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
}

.proof-card h3 {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 1.25rem;
    margin-bottom: var(--space-md);
    color: var(--color-primary);
}

.proof-card svg {
    color: var(--color-accent);
}

.cta-section-area {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    color: white;
    padding: var(--space-4xl) 0;
    text-align: center;
}

.cta-section-area h2 {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    margin-bottom: var(--space-lg);
}

.cta-section-area p {
    font-size: 1.125rem;
    margin-bottom: var(--space-xl);
    max-width: 65ch;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: var(--space-md);
    justify-content: center;
    flex-wrap: wrap;
}
</style>

<!-- Hero Section -->
<section class="hero--area-page">
    <div class="container">
        <div class="hero-area-content">
            <h1>Custom Steel Gates & Fencing in Casa Grande, AZ</h1>
            <p class="intro-text">
                Salt River Steel LLC serves Casa Grande — Pinal County's largest city — with custom steel gates,
                commercial fencing, and industrial fabrication. Based 20 miles east in Florence, we deliver faster
                than Phoenix-area shops and handle projects from residential driveway gates to heavy commercial
                steel construction across Casa Grande's growing business corridor.
            </p>
            <div class="area-highlights">
                <div class="area-highlight">
                    <?php echo icon('map-pin', 20); ?>
                    Serving Casa Grande
                </div>
                <div class="area-highlight">
                    <?php echo icon('clock', 20); ?>
                    3-5 Day Turnaround
                </div>
                <div class="area-highlight">
                    <?php echo icon('truck', 20); ?>
                    Local Job-Site Delivery
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<article class="area-content-section">
    <div class="container">
        <div class="prose">
            <h2>Steel Fabrication for Casa Grande, Arizona</h2>
            <p>
                <strong>Salt River Steel LLC</strong> is a licensed steel construction company serving Casa Grande
                residential, commercial, and industrial clients. Our Florence-based fabrication shop delivers
                custom steel gates, security fencing, structural framing, and specialty metalwork throughout
                Casa Grande's commercial districts along Florence Boulevard and expanding suburban neighborhoods
                near Eleven Mile Corner.
            </p>

            <p>
                Casa Grande's role as Pinal County's commercial hub means diverse steel needs: big-box retail
                properties along the I-10 corridor require security fencing and loading dock infrastructure,
                while historic downtown businesses near Pinal Avenue often need ornamental security gates and
                storefront improvements. Residential developments west of town toward Eleven Mile Corner demand
                custom driveway gates and decorative fencing that match Casa Grande's desert architecture.
            </p>

            <h3>Services Available in Casa Grande</h3>
            <div class="services-checklist">
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Custom Steel Gates</strong><br>
                        Driveway gates, security gates, and commercial entry gates fabricated for Casa Grande properties
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Commercial Steel Fencing</strong><br>
                        Security fencing, perimeter barriers, and ornamental fencing for Casa Grande businesses
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Structural Steel Construction</strong><br>
                        Steel building frames, commercial shop construction, and structural fabrication
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Residential Steel Work</strong><br>
                        Railings, stairs, carports, and architectural metalwork for Casa Grande homes
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Industrial Fabrication</strong><br>
                        Heavy-duty steel fabrication and certified welding for industrial applications
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<!-- Local Proof Section -->
<section class="local-proof-section">
    <div class="container">
        <h2>Why Casa Grande Property Owners Choose Salt River Steel</h2>
        <div class="local-proof-grid">
            <div class="proof-card">
                <h3>
                    <?php echo icon('map-pin', 24); ?>
                    Local Pinal County Fabrication
                </h3>
                <p>
                    Our fabrication shop is located just 20 miles east in Florence. You're working with a local
                    Pinal County team that delivers to Casa Grande daily, not a distant Phoenix supplier who
                    charges premium freight rates and adds weeks to your timeline.
                </p>
            </div>

            <div class="proof-card">
                <h3>
                    <?php echo icon('thermometer', 24); ?>
                    Built for Desert Conditions
                </h3>
                <p>
                    Casa Grande's extreme summer heat regularly exceeds 110°F, and monsoon dust and moisture
                    test every metal finish. We spec corrosion-resistant steel and powder-coat finishes that
                    hold up to Central Arizona's climate year after year.
                </p>
            </div>

            <div class="proof-card">
                <h3>
                    <?php echo icon('clock', 24); ?>
                    Faster Than Phoenix Shops
                </h3>
                <p>
                    Most custom orders are ready in 3–5 business days from our Florence facility. Compare that
                    to the 2–3 week lead times common with large Phoenix fabricators, before you even factor in
                    their delivery schedules to Casa Grande.
                </p>
            </div>

            <div class="proof-card">
                <h3>
                    <?php echo icon('users', 24); ?>
                    Work Directly with the Crew
                </h3>
                <p>
                    Property owners and contractors talk directly with the team cutting and welding your steel.
                    No sales rep middleman, no procurement layers — just straight answers and realistic timelines.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Neighborhood/Local Detail Section -->
<article class="area-content-section">
    <div class="container">
        <div class="prose">
            <h2>Serving Casa Grande's Commercial and Residential Districts</h2>
            <p>
                Salt River Steel serves the full Casa Grande area, from historic downtown properties near Pinal
                Avenue and Main Street to big-box retail sites along Florence Boulevard, suburban neighborhoods
                west of town toward Eleven Mile Corner, and industrial properties along the I-10 corridor. We
                deliver to job sites across Casa Grande and offer pickup at our Florence shop for contractors
                who prefer to handle their own transport.
            </p>

            <p>
                Casa Grande's commercial growth drives demand for security fencing and loading dock access gates
                at retail centers, while residential areas near the Casa Grande Ruins National Monument often
                require ornamental driveway gates and decorative perimeter fencing. Industrial sites along the
                I-10 corridor — warehouses, distribution centers, and contractor yards — demand heavy structural
                steel delivered on tight schedules.
            </p>

            <h2>Get a Free Estimate in Casa Grande</h2>
            <p>
                Whether you're securing a commercial property along Florence Boulevard, adding a custom gate to
                a home near Eleven Mile Corner, or building a warehouse near I-10, Salt River Steel delivers
                local fabrication with honest timelines and competitive pricing. Call
                <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a> or visit our Florence shop
                for a free estimate.
            </p>
        </div>
    </div>
</article>

<!-- CTA Section -->
<section class="cta-section-area">
    <div class="container">
        <h2>Let's Build Your Casa Grande Steel Project</h2>
        <p>
            Custom steel gates, fencing, and fabrication — built in Florence with
            local delivery to Casa Grande and same-week turnaround on most orders.
        </p>
        <div class="cta-buttons">
            <a href="/contact/" class="btn btn-accent btn-lg">Get Free Estimate</a>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg">
                <?php echo icon('phone', 20); ?> Call <?php echo $phone; ?>
            </a>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

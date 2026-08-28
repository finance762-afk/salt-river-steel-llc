<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$pageTitle = 'Steel Gates & Fencing in Florence, AZ | Salt River Steel LLC';
$pageDescription = 'Custom steel gates, fencing, and fabrication serving Florence, Arizona. Local fabrication shop on E Pot O Gold Trail. Commercial, residential & industrial steel work. Free estimates.';
$pageCanonical = $siteUrl . '/service-areas/florence/';
$heroPreloadImage = '/assets/images/custom-steel-gates-1600.webp';

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
            "name": "Florence",
            "item": "<?php echo $siteUrl; ?>/service-areas/florence/"
        }
    ]
}
</script>

<style>
/* Page-specific styles for Florence service area page */
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
    background-image: url('/assets/images/custom-steel-gates.jpg');
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
            <h1>Custom Steel Gates & Fencing in Florence, AZ</h1>
            <p class="intro-text">
                Salt River Steel LLC is your local Florence steel fabrication shop at 12356 E Pot O Gold Trail.
                We build custom steel gates, fencing, and commercial, residential, and industrial steel work
                right here in Florence — faster turnaround than distant suppliers, with pricing that reflects
                local delivery.
            </p>
            <div class="area-highlights">
                <div class="area-highlight">
                    <?php echo icon('map-pin', 20); ?>
                    Located in Florence
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
            <h2>Steel Fabrication in Florence, Arizona</h2>
            <p>
                <strong>Salt River Steel LLC</strong> is a licensed steel construction company based in Florence, Arizona,
                serving residential, commercial, and industrial clients throughout Pinal County. Our shop at 12356 E Pot O Gold Trail
                handles custom steel gates, ranch fencing, structural steel framing, and specialty fabrication that larger
                Phoenix suppliers won't take on or can't deliver quickly.
            </p>

            <p>
                Florence's mix of established ranch properties along Highway 79, newer residential developments west of town near
                Skyline Road, and industrial sites near the state prison complex demand different steel solutions. Salt River Steel
                works directly with property owners, contractors, and facility managers on projects that range from ornamental
                driveway gates on acreage parcels to heavy-duty commercial steel buildings.
            </p>

            <h3>Services Available in Florence</h3>
            <div class="services-checklist">
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Custom Steel Gates</strong><br>
                        Driveway gates, entry gates, and security gates fabricated to your Florence property dimensions
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Steel Fencing</strong><br>
                        Ranch-rail fencing, tube steel, and wrought-iron for residential and agricultural properties
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Commercial Steel Construction</strong><br>
                        Structural framing, metal buildings, and commercial shop construction
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Residential Steel Work</strong><br>
                        Railings, stairs, carports, and architectural metalwork for Florence homes
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Industrial Fabrication</strong><br>
                        Heavy-duty steel fabrication and certified welding for demanding industrial applications
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<!-- Local Proof Section -->
<section class="local-proof-section">
    <div class="container">
        <h2>Why Florence Property Owners Choose Salt River Steel</h2>
        <div class="local-proof-grid">
            <div class="proof-card">
                <h3>
                    <?php echo icon('map-pin', 24); ?>
                    Right Here in Florence
                </h3>
                <p>
                    Our fabrication shop is located at 12356 E Pot O Gold Trail, just east of downtown Florence.
                    You're working with a local team that knows the area, not a distant Phoenix supplier who
                    charges premium freight rates.
                </p>
            </div>

            <div class="proof-card">
                <h3>
                    <?php echo icon('thermometer', 24); ?>
                    Built for Desert Conditions
                </h3>
                <p>
                    Florence summers regularly exceed 110°F, and monsoon dust and moisture test every metal finish.
                    We spec corrosion-resistant steel and finishes that hold up to Central Arizona's extreme climate.
                </p>
            </div>

            <div class="proof-card">
                <h3>
                    <?php echo icon('clock', 24); ?>
                    Faster Than Phoenix Shops
                </h3>
                <p>
                    Most custom orders are ready in 3–5 business days from our Florence facility. Compare that to
                    the 2–3 week lead times common with large Phoenix fabricators, before you even factor in their delivery schedules.
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
            <h2>Serving Florence's Residential and Commercial Districts</h2>
            <p>
                Salt River Steel serves the full Florence area, from historic downtown properties near Main Street and Pinal Avenue
                to ranch parcels along Highway 79 north toward Superior, newer subdivisions west of Hunt Highway, and industrial
                sites clustered near the state prison complex. We deliver to job sites across Florence and offer pickup at our
                E Pot O Gold Trail location for contractors who prefer to handle their own transport.
            </p>

            <p>
                Florence properties face unique steel needs: older ranch homes on large parcels need durable custom gates that match
                existing desert landscaping, while newer residential developments near Anthem Parkway often require ornamental
                fencing and decorative railings. Commercial projects — ag supply warehouses, contractor yards, and industrial
                facilities — demand heavy structural steel delivered on tight schedules.
            </p>

            <h2>Get a Free Estimate in Florence</h2>
            <p>
                Whether you're securing a ranch entrance on Florence-Kelvin Highway, adding a carport to a home near Skyline Road,
                or building a commercial shop near the prison complex, Salt River Steel delivers local fabrication with honest
                timelines and competitive pricing. Call <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a> or
                visit our shop at 12356 E Pot O Gold Trail for a free estimate.
            </p>
        </div>
    </div>
</article>

<!-- CTA Section -->
<section class="cta-section-area">
    <div class="container">
        <h2>Let's Build Your Florence Steel Project</h2>
        <p>
            Custom steel gates, fencing, and fabrication — built right here in Florence with
            local delivery and same-week turnaround on most orders.
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

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$pageTitle = 'Steel Gates & Fencing in Coolidge, AZ | Salt River Steel LLC';
$pageDescription = 'Custom steel gates, fencing, and fabrication serving Coolidge, Arizona. Agricultural and residential steel work near Central Arizona College. Commercial & industrial fabrication. Free estimates.';
$pageCanonical = $siteUrl . '/service-areas/coolidge/';
$canonicalUrl = $pageCanonical;
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
            "name": "Coolidge",
            "item": "<?php echo $siteUrl; ?>/service-areas/coolidge/"
        }
    ]
}
</script>

<style>
/* Page-specific styles for Coolidge service area page */
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
            <h1>Custom Steel Gates & Fencing in Coolidge, AZ</h1>
            <p class="intro-text">
                Salt River Steel LLC serves Coolidge's agricultural and residential communities with custom steel gates,
                fencing, and commercial fabrication. Located just 15 miles east in Florence on Highway 87, we deliver
                faster than distant Phoenix suppliers, with pricing that reflects short-haul delivery and local service.
            </p>
            <div class="area-highlights">
                <div class="area-highlight">
                    <?php echo icon('map-pin', 20); ?>
                    15 Miles from Coolidge
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
            <h2>Steel Fabrication for Coolidge, Arizona</h2>
            <p>
                <strong>Salt River Steel LLC</strong> is a licensed steel construction company based in Florence, Arizona,
                serving Coolidge's residential, agricultural, and commercial clients throughout Pinal County. Our fabrication
                shop at 12356 E Pot O Gold Trail handles custom steel gates, perimeter fencing for agricultural parcels,
                structural steel framing, and specialty projects that larger Phoenix shops either won't accept or can't
                deliver on short notice.
            </p>

            <p>
                Coolidge's agricultural heritage — established cotton and alfalfa operations along Highway 87 and older irrigation
                districts south of Vah Ki Inn Road — requires durable ranch-style steel fencing and access gates that withstand
                heavy equipment traffic and Central Arizona's dust storms. Newer residential subdivisions developing near the
                I-10 corridor need ornamental steel fencing and decorative entry gates. Downtown Coolidge properties, especially
                older homes near Pinal Avenue and Central Avenue, often require custom railings, carports, and structural steel
                that match the character of early-1900s construction.
            </p>

            <h3>Services Available in Coolidge</h3>
            <div class="services-checklist">
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Custom Steel Gates</strong><br>
                        Agricultural access gates, residential driveway gates, and security gates fabricated to Coolidge property specs
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Steel Fencing</strong><br>
                        Ranch-rail fencing, tube steel perimeter fencing, and wrought-iron for residential and agricultural sites
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Commercial Steel Construction</strong><br>
                        Structural framing, pre-engineered metal buildings, and commercial shop construction
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Residential Steel Work</strong><br>
                        Railings, stairs, carports, awning frames, and architectural metalwork for Coolidge homes
                    </div>
                </div>
                <div class="service-check-item">
                    <?php echo icon('check-circle', 20); ?>
                    <div>
                        <strong>Agricultural Fabrication</strong><br>
                        Heavy-duty gates, livestock handling systems, and equipment supports for working farms and ranches
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<!-- Local Proof Section -->
<section class="local-proof-section">
    <div class="container">
        <h2>Why Coolidge Property Owners Choose Salt River Steel</h2>
        <div class="local-proof-grid">
            <div class="proof-card">
                <h3>
                    <?php echo icon('map-pin', 24); ?>
                    Close to Coolidge
                </h3>
                <p>
                    Our fabrication shop is located 15 miles east of Coolidge on Highway 87 in Florence. Short-haul delivery
                    to Coolidge properties means lower freight costs than Phoenix-based suppliers charging 60+ mile round-trip
                    premiums, and we can make same-day delivery runs when schedules align.
                </p>
            </div>

            <div class="proof-card">
                <h3>
                    <?php echo icon('tractor', 24); ?>
                    Built for Agricultural Conditions
                </h3>
                <p>
                    Coolidge's agricultural operations demand steel that withstands heavy tractor and equipment traffic,
                    alkaline soil exposure, and seasonal dust storms. We specify galvanized or powder-coated finishes and
                    heavy-gauge steel that holds up to working farm conditions.
                </p>
            </div>

            <div class="proof-card">
                <h3>
                    <?php echo icon('clock', 24); ?>
                    Faster Than Phoenix Shops
                </h3>
                <p>
                    Most custom orders are ready in 3–5 business days from our Florence facility. Compare that to the 2–3 week
                    lead times common with large Phoenix fabricators, before factoring in their delivery schedules and minimum
                    order requirements.
                </p>
            </div>

            <div class="proof-card">
                <h3>
                    <?php echo icon('users', 24); ?>
                    Work Directly with the Crew
                </h3>
                <p>
                    Property owners and contractors talk directly with the team cutting and welding your steel. No sales rep
                    middleman, no procurement layers — just straight answers, realistic timelines, and honest pricing.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Neighborhood/Local Detail Section -->
<article class="area-content-section">
    <div class="container">
        <div class="prose">
            <h2>Serving Coolidge's Agricultural and Residential Districts</h2>
            <p>
                Salt River Steel serves the full Coolidge area, from established agricultural parcels along Highway 87 and
                Vah Ki Inn Road to historic downtown properties near Pinal Avenue and Central Avenue, newer residential
                subdivisions developing west toward I-10, and commercial sites near Central Arizona College. We deliver to
                job sites across Coolidge or offer pickup at our Florence location for contractors who prefer to handle
                their own transport.
            </p>

            <p>
                Coolidge properties present distinct steel needs: older agricultural operations require wide access gates for
                cotton and alfalfa harvest equipment, durable perimeter fencing that resists alkaline dust, and livestock
                handling systems that last decades. Downtown residential properties, many dating to the early 1900s, often
                need custom carports, porch railings, and structural steel that matches historic architecture. Newer subdivisions
                near the I-10 corridor demand ornamental entry gates and decorative fencing that complement modern desert
                landscaping and HOA design standards.
            </p>

            <h2>Get a Free Estimate in Coolidge</h2>
            <p>
                Whether you're securing a farm entrance along Highway 87, adding a carport to a home near Central Arizona College,
                or building a commercial shop in one of Coolidge's industrial parks, Salt River Steel delivers local fabrication
                with honest timelines and competitive pricing. Call <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a>
                or visit our Florence shop at 12356 E Pot O Gold Trail for a free estimate.
            </p>
        </div>
    </div>
</article>

<!-- CTA Section -->
<section class="cta-section-area">
    <div class="container">
        <h2>Let's Build Your Coolidge Steel Project</h2>
        <p>
            Custom steel gates, fencing, and fabrication — built in Florence with
            local delivery to Coolidge and same-week turnaround on most orders.
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

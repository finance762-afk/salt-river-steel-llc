<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$pageTitle = 'Service Areas | Custom Steel Fabrication | ' . $siteName;
$pageDescription = 'Salt River Steel LLC serves Florence, Coolidge, Casa Grande, Apache Junction, and surrounding communities in Arizona with custom steel gates, fencing, and fabrication services.';
$pageCanonical = $siteUrl . '/service-areas/';
$heroPreloadImage = '/assets/images/hero-home-1600.webp';

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
        }
    ]
}
</script>

<!-- Hero Section -->
<section class="hero hero--service-areas">
    <div class="hero-bg">
        <img
            src="/assets/images/hero-home-1600.webp"
            srcset="/assets/images/hero-home-480.webp 480w,
                    /assets/images/hero-home-960.webp 960w,
                    /assets/images/hero-home-1600.webp 1600w"
            sizes="100vw"
            alt="Steel fabrication serving Florence, Arizona and surrounding areas"
            width="1600"
            height="900"
            loading="eager"
            fetchpriority="high"
        >
    </div>
    <div class="hero-content container">
        <h1 class="hero-title">
            <span class="text-accent">Professional Steel Fabrication</span><br>
            Serving Florence & Surrounding Arizona Communities
        </h1>
        <p class="hero-subtitle">
            Salt River Steel LLC brings custom steel gates, fencing, and fabrication expertise to residential, commercial,
            and industrial clients across the Florence area. Based in Florence, AZ, we serve a 25-mile radius including
            Coolidge, Casa Grande, Apache Junction, and beyond.
        </p>
        <div class="hero-cta-group">
            <a href="/contact/" class="btn-primary btn-large">Get Free Estimate</a>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn-secondary btn-large">
                Call <?php echo $phone; ?>
            </a>
        </div>
    </div>
</section>

<!-- Service Areas Grid -->
<section class="section section--service-areas-grid">
    <div class="container">
        <div class="section-header text-center">
            <span class="eyebrow-label">Where We Serve</span>
            <h2 class="section-title">
                <span class="text-accent">Arizona Communities</span> We Proudly Serve
            </h2>
            <p class="section-intro">
                Salt River Steel LLC operates throughout the Florence area, delivering custom steel fabrication, gates,
                and fencing to residential, commercial, and industrial clients. Select your community below to learn
                about our services in your area.
            </p>
        </div>

        <div class="service-areas-grid">
            <!-- Florence -->
            <div class="service-area-card">
                <div class="service-area-card__image">
                    <img
                        src="/assets/images/custom-steel-gates-960.webp"
                        srcset="/assets/images/custom-steel-gates-480.webp 480w,
                                /assets/images/custom-steel-gates-960.webp 960w,
                                /assets/images/custom-steel-gates-1600.webp 1600w"
                        sizes="(max-width: 768px) 100vw, 50vw"
                        alt="Custom steel gate installation in Florence, AZ"
                        width="960"
                        height="640"
                        loading="lazy"
                    >
                </div>
                <div class="service-area-card__content">
                    <h3 class="service-area-card__title">Florence, AZ</h3>
                    <p class="service-area-card__desc">
                        Our home base. Serving Florence with custom steel gates, fencing, commercial construction,
                        residential metalwork, and industrial fabrication since <?php echo $yearEstablished; ?>.
                    </p>
                    <ul class="service-area-card__features">
                        <li>Custom driveway and security gates</li>
                        <li>Residential and ranch fencing</li>
                        <li>Commercial steel construction</li>
                        <li>Industrial fabrication services</li>
                    </ul>
                    <a href="/service-areas/florence/" class="btn-primary">Learn More →</a>
                </div>
            </div>

            <!-- Coolidge -->
            <div class="service-area-card">
                <div class="service-area-card__image">
                    <img
                        src="/assets/images/steel-fencing-960.webp"
                        srcset="/assets/images/steel-fencing-480.webp 480w,
                                /assets/images/steel-fencing-960.webp 960w,
                                /assets/images/steel-fencing-1600.webp 1600w"
                        sizes="(max-width: 768px) 100vw, 50vw"
                        alt="Steel fencing installation in Coolidge, AZ"
                        width="960"
                        height="640"
                        loading="lazy"
                    >
                </div>
                <div class="service-area-card__content">
                    <h3 class="service-area-card__title">Coolidge, AZ</h3>
                    <p class="service-area-card__desc">
                        Just 12 miles southwest, we bring the same quality steel fabrication and custom metalwork
                        to Coolidge homes, farms, and businesses.
                    </p>
                    <ul class="service-area-card__features">
                        <li>Agricultural and ranch fencing</li>
                        <li>Residential steel gates</li>
                        <li>Commercial property fencing</li>
                        <li>Custom metal fabrication</li>
                    </ul>
                    <a href="/service-areas/coolidge/" class="btn-primary">Learn More →</a>
                </div>
            </div>

            <!-- Casa Grande -->
            <div class="service-area-card">
                <div class="service-area-card__image">
                    <img
                        src="/assets/images/commercial-steel-construction-960.webp"
                        srcset="/assets/images/commercial-steel-construction-480.webp 480w,
                                /assets/images/commercial-steel-construction-960.webp 960w,
                                /assets/images/commercial-steel-construction-1600.webp 1600w"
                        sizes="(max-width: 768px) 100vw, 50vw"
                        alt="Commercial steel construction in Casa Grande, AZ"
                        width="960"
                        height="640"
                        loading="lazy"
                    >
                </div>
                <div class="service-area-card__content">
                    <h3 class="service-area-card__title">Casa Grande, AZ</h3>
                    <p class="service-area-card__desc">
                        Serving Casa Grande's growing commercial and residential communities with structural steel,
                        custom gates, and professional fabrication.
                    </p>
                    <ul class="service-area-card__features">
                        <li>Structural steel for new construction</li>
                        <li>Security gates and access control</li>
                        <li>Industrial steel fabrication</li>
                        <li>Architectural metalwork</li>
                    </ul>
                    <a href="/service-areas/casa-grande/" class="btn-primary">Learn More →</a>
                </div>
            </div>

            <!-- Apache Junction -->
            <div class="service-area-card">
                <div class="service-area-card__image">
                    <img
                        src="/assets/images/residential-steel-work-960.webp"
                        srcset="/assets/images/residential-steel-work-480.webp 480w,
                                /assets/images/residential-steel-work-960.webp 960w,
                                /assets/images/residential-steel-work-1600.webp 1600w"
                        sizes="(max-width: 768px) 100vw, 50vw"
                        alt="Residential steel work in Apache Junction, AZ"
                        width="960"
                        height="640"
                        loading="lazy"
                    >
                </div>
                <div class="service-area-card__content">
                    <h3 class="service-area-card__title">Apache Junction, AZ</h3>
                    <p class="service-area-card__desc">
                        Extending our expertise northwest to Apache Junction with custom residential metalwork,
                        decorative steel, and security solutions.
                    </p>
                    <ul class="service-area-card__features">
                        <li>Custom entry and driveway gates</li>
                        <li>Decorative steel railings and stairs</li>
                        <li>Carports and shade structures</li>
                        <li>Residential fencing solutions</li>
                    </ul>
                    <a href="/service-areas/apache-junction/" class="btn-primary">Learn More →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Coverage Map Context -->
<section class="section section--coverage-context bg-alt">
    <div class="container content-narrow">
        <h2 class="section-title text-center">
            <span class="text-accent">25-Mile Coverage</span> Throughout Central Arizona
        </h2>
        <div class="prose prose-centered">
            <p>
                Salt River Steel LLC maintains a service radius of approximately 25 miles from our Florence, AZ headquarters,
                covering Pinal County and portions of Maricopa County. Whether you're in a rural ranch setting, an established
                neighborhood, or a growing commercial district, we bring the same precision fabrication and installation expertise
                to every project.
            </p>
            <p>
                <strong>Our coverage area includes but is not limited to:</strong> Florence, Coolidge, Casa Grande, Apache Junction,
                Queen Creek, San Tan Valley, Eloy, and surrounding communities. If you're outside our standard service area,
                contact us — we frequently accommodate special requests for larger commercial and industrial projects.
            </p>
        </div>
        <div class="text-center" style="margin-top: var(--space-2xl);">
            <a href="/contact/" class="btn-primary btn-large">Request Service in Your Area</a>
        </div>
    </div>
</section>

<!-- Why Choose Us (Local Focus) -->
<section class="section">
    <div class="container">
        <div class="section-header text-center">
            <span class="eyebrow-label">Local Expertise</span>
            <h2 class="section-title">
                Why <span class="text-accent">Florence-Area Clients</span> Choose Salt River Steel
            </h2>
        </div>

        <div class="grid-3">
            <div class="feature-card">
                <div class="feature-card__icon">
                    <svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                </div>
                <h3 class="feature-card__title">Based in Florence</h3>
                <p class="feature-card__desc">
                    We're not a Phoenix contractor driving out to Pinal County — we're your neighbors. Our Florence location
                    means faster response times, lower travel fees, and genuine local knowledge.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-card__icon">
                    <svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </div>
                <h3 class="feature-card__title">Arizona-Tough Materials</h3>
                <p class="feature-card__desc">
                    Central Arizona's intense heat, monsoon winds, and dust require steel that can take it. We use corrosion-resistant
                    materials rated for desert climates — your gates and fencing won't fade or fail in 5 years.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-card__icon">
                    <svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <h3 class="feature-card__title">Commercial & Residential</h3>
                <p class="feature-card__desc">
                    From ranch gates in Coolidge to commercial buildings in Casa Grande, we handle every scale of steel work.
                    <?php echo $yearsInBusiness; ?>+ years serving both homeowners and businesses throughout Pinal County.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="cta-banner">
    <div class="container">
        <h2 class="cta-banner__title">Ready to Start Your Steel Project?</h2>
        <p class="cta-banner__subtitle">
            Get a free estimate for custom steel gates, fencing, or fabrication in your area.
        </p>
        <div class="cta-banner__buttons">
            <a href="/contact/" class="btn-primary btn-large">Get Free Estimate</a>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn-secondary btn-large">
                Call <?php echo $phone; ?>
            </a>
        </div>
    </div>
</section>

<style>
/* Service Areas Page Styles */
.hero--service-areas {
    position: relative;
    min-height: 60vh;
    display: flex;
    align-items: center;
    color: white;
    overflow: hidden;
}

.hero--service-areas .hero-bg {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.hero--service-areas .hero-bg::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(var(--color-primary-rgb), 0.95), rgba(var(--color-primary-rgb), 0.75));
    z-index: 2;
}

.hero--service-areas .hero-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero--service-areas .hero-content {
    position: relative;
    z-index: 3;
    text-align: center;
    padding: var(--space-4xl) var(--space-md);
}

.hero--service-areas .hero-title {
    font-size: clamp(2.25rem, 5vw, 3.5rem);
    line-height: 1.1;
    margin-bottom: var(--space-lg);
    font-weight: 800;
    text-wrap: balance;
}

.hero--service-areas .hero-subtitle {
    font-size: 1.25rem;
    max-width: 800px;
    margin: 0 auto var(--space-2xl);
    opacity: 0.95;
    line-height: 1.6;
}

.hero-cta-group {
    display: flex;
    gap: var(--space-md);
    justify-content: center;
    flex-wrap: wrap;
}

/* Service Areas Grid */
.service-areas-grid {
    display: grid;
    gap: var(--space-2xl);
    margin-top: var(--space-3xl);
}

.service-area-card {
    background: var(--color-bg);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transition: transform var(--transition), box-shadow var(--transition);
    display: grid;
    gap: var(--space-xl);
}

.service-area-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.service-area-card__image {
    position: relative;
    aspect-ratio: 3 / 2;
    overflow: hidden;
}

.service-area-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-slow);
}

.service-area-card:hover .service-area-card__image img {
    transform: scale(1.05);
}

.service-area-card__content {
    padding: 0 var(--space-xl) var(--space-xl);
}

.service-area-card__title {
    font-size: 1.75rem;
    margin-bottom: var(--space-md);
    color: var(--color-primary);
}

.service-area-card__desc {
    color: var(--color-text-light);
    margin-bottom: var(--space-lg);
    line-height: 1.6;
}

.service-area-card__features {
    list-style: none;
    margin: var(--space-lg) 0;
    display: grid;
    gap: var(--space-sm);
}

.service-area-card__features li {
    padding-left: var(--space-lg);
    position: relative;
    color: var(--color-text-light);
}

.service-area-card__features li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--color-accent);
    font-weight: 700;
}

/* Coverage Context */
.section--coverage-context {
    background: linear-gradient(135deg,
        rgba(var(--color-primary-rgb), 0.02),
        rgba(var(--color-accent-rgb), 0.02));
}

/* Feature Cards */
.feature-card {
    text-align: center;
    padding: var(--space-xl);
    background: var(--color-bg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    transition: transform var(--transition), box-shadow var(--transition);
}

.feature-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.feature-card__icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--space-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--color-accent), var(--color-secondary));
    border-radius: 50%;
    color: white;
}

.feature-card__title {
    font-size: 1.5rem;
    margin-bottom: var(--space-md);
    color: var(--color-primary);
}

.feature-card__desc {
    color: var(--color-text-light);
    line-height: 1.6;
}

/* Responsive */
@media (min-width: 768px) {
    .service-areas-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .service-area-card {
        grid-template-columns: 1fr 1.2fr;
        align-items: center;
    }

    .service-area-card:nth-child(even) {
        grid-template-columns: 1.2fr 1fr;
    }

    .service-area-card:nth-child(even) .service-area-card__image {
        order: 2;
    }

    .service-area-card:nth-child(even) .service-area-card__content {
        order: 1;
    }

    .service-area-card__content {
        padding: var(--space-xl);
    }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

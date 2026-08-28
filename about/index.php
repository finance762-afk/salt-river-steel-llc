<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   about/index.php — Salt River Steel LLC — About Us
   ============================================================ */

$currentPage      = 'about';
$pageTitle        = 'About Us | Salt River Steel | Florence, AZ Steel Fabrication';
$pageDescription  = 'Salt River Steel LLC has served Florence, AZ since 2022 with custom steel gates, fencing, and commercial, residential & industrial fabrication. Meet our team and learn our story.';
$canonicalUrl     = $siteUrl . '/about/';
$pageCanonical    = $canonicalUrl;
$ogImage          = $siteUrl . '/assets/images/crew-salt-river-steel-florence-og.jpg';

/* ---------- BreadcrumbList schema ---------- */
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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => $canonicalUrl],
            ]
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<style>
/* ============================================================
   ABOUT PAGE STYLES
   ============================================================ */
:root {
  --about-card-bg: rgba(var(--color-primary-rgb), 0.04);
  --about-border: rgba(var(--color-primary-rgb), 0.12);
}

.about-hero {
  position: relative; min-height: 54vh; display: flex; align-items: center;
  padding: calc(var(--nav-height) + var(--space-3xl)) 0 var(--space-3xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  overflow: hidden;
}
.about-hero::before {
  content: ""; position: absolute; inset: 0; opacity: 0.12;
  background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l30 30-30 30L0 30z' fill='%23fff' fill-opacity='0.3'/%3E%3C/svg%3E");
}
.about-hero .container { position: relative; z-index: 1; max-width: 800px; text-align: center; }
.about-hero h1 { color: #fff; font-size: clamp(2.2rem, 5vw, 3.2rem); margin: var(--space-md) 0 var(--space-lg); }
.about-hero .hero-lead { color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); line-height: 1.7; max-width: 62ch; margin: 0 auto; }

.breadcrumb {
  background: #fff; border-bottom: 1px solid var(--color-border); padding: var(--space-sm) 0; font-size: 0.88rem;
}
.breadcrumb .container { display: flex; }
.breadcrumb ol {
  display: flex; flex-wrap: wrap; gap: 6px 8px; align-items: center; list-style: none; margin: 0; padding: 0;
}
.breadcrumb li { display: flex; align-items: center; gap: 6px; }
.breadcrumb a { color: var(--color-text-light); transition: color var(--transition); }
.breadcrumb a:hover { color: var(--color-primary); }
.breadcrumb li[aria-current="page"] { color: var(--color-primary); font-weight: 600; }
.breadcrumb .breadcrumb-sep { color: rgba(0,0,0,0.25); font-size: 1rem; }

.story-section { background: var(--color-white); }
.story-grid { display: grid; grid-template-columns: 1.2fr 1fr; gap: var(--space-3xl); align-items: center; }
@media (max-width: 900px) { .story-grid { grid-template-columns: 1fr; gap: var(--space-xl); } }
.story-content h2 { font-size: clamp(1.8rem, 3.5vw, 2.4rem); margin-bottom: var(--space-md); color: var(--color-dark); }
.story-content p { color: var(--color-gray-dark); line-height: 1.75; margin-bottom: var(--space-md); }
.story-image { position: relative; }
.story-image img { width: 100%; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); aspect-ratio: 4 / 5; object-fit: cover; }
.story-badge {
  position: absolute; bottom: -16px; left: -16px; background: var(--color-accent); color: #fff;
  padding: var(--space-md) var(--space-lg); border-radius: var(--radius-lg); box-shadow: var(--shadow-xl);
  text-align: center; font-family: var(--font-heading);
}
.story-badge .big { font-size: var(--font-size-4xl); font-weight: 800; line-height: 1; display: block; }
.story-badge .small { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1px; margin-top: var(--space-xs); display: block; }

.values-section { background: var(--color-light); }
.values-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); margin-top: var(--space-2xl); }
@media (max-width: 800px) { .values-grid { grid-template-columns: 1fr; gap: var(--space-md); } }
.value-card {
  background: var(--color-white); border: 1px solid var(--about-border); border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg); text-align: center;
  transition: transform var(--transition), box-shadow var(--transition);
}
.value-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.value-icon {
  width: 64px; height: 64px; border-radius: var(--radius-full); background: var(--about-card-bg);
  color: var(--color-accent); display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-md); box-shadow: var(--shadow-sm);
}
.value-icon svg { width: 30px; height: 30px; }
.value-card h3 { font-size: var(--font-size-xl); color: var(--color-dark); margin-bottom: var(--space-sm); }
.value-card p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.65; margin: 0; }

.credentials-section { background: var(--color-dark); color: #fff; }
.credentials-section .section-title h2 { color: #fff; }
.credentials-section .section-subtitle { color: var(--color-accent); }
.credentials-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-lg); margin-top: var(--space-2xl); }
@media (max-width: 900px) { .credentials-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-md); } }
@media (max-width: 480px) { .credentials-grid { grid-template-columns: 1fr; } }
.cred-item {
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.14);
  border-radius: var(--radius-md); padding: var(--space-lg) var(--space-md);
  text-align: center; display: flex; flex-direction: column; align-items: center; gap: var(--space-sm);
}
.cred-item svg { color: var(--color-accent); }
.cred-item strong { font-size: var(--font-size-sm); font-weight: 700; display: block; }

.cta-about {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  position: relative; overflow: hidden;
}
.cta-about::after {
  content: ""; position: absolute; right: -80px; top: -80px; width: 420px; height: 420px;
  border-radius: 50%; background: rgba(var(--color-accent-rgb),0.16); pointer-events: none;
}
.cta-about .container { position: relative; z-index: 1; text-align: center; max-width: 680px; }
.cta-about h2 { color: #fff; font-size: clamp(1.9rem, 4vw, 2.8rem); margin-bottom: var(--space-md); }
.cta-about p { color: rgba(255,255,255,0.92); margin-bottom: var(--space-xl); font-size: var(--font-size-lg); }
.cta-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

@media (max-width: 480px) {
  .story-badge { left: 50%; transform: translateX(-50%); bottom: -12px; }
  .cta-actions .btn { width: 100%; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Hero -->
<section class="about-hero" aria-label="About Salt River Steel">
    <div class="container">
        <span class="eyebrow-label" style="color: rgba(255,255,255,0.85);">Our Story</span>
        <h1>Steel Fabrication Rooted in <span class="text-accent">Central Arizona</span></h1>
        <p class="hero-lead">
            Salt River Steel LLC is a Florence-based steel fabrication company serving contractors,
            property owners, and businesses across Central Arizona. Since <?php echo $yearEstablished; ?>,
            we've built custom gates, fencing, and commercial, residential, and industrial steel
            structures from our in-house shop — cutting out the freight costs and long lead times
            that come with ordering from Phoenix or out-of-state suppliers.
        </p>
    </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">About</li>
        </ol>
    </div>
</nav>

<!-- Story Section -->
<section class="section story-section" aria-label="Salt River Steel story">
    <div class="container">
        <div class="story-grid">
            <div class="story-content">
                <span class="eyebrow-label">Who We Are</span>
                <h2>Local fabrication, straight answers, steel that lasts</h2>
                <p>
                    Salt River Steel was founded in <?php echo $yearEstablished; ?> by owner <?php echo htmlspecialchars($ownerName); ?>
                    to fill a gap in Central Arizona's steel supply chain. Contractors and property owners were waiting
                    weeks for fabrication jobs from distant suppliers, paying inflated freight, and dealing with
                    procurement middlemen who couldn't answer basic questions about the job.
                </p>
                <p>
                    We built our Florence shop to change that. Our team handles specialized cuts, welding, and
                    finishing in-house — most custom orders ship within 3–5 business days. We work directly with
                    the people on the job site, so when you call with a question about grades, dimensions, or
                    delivery, you're talking to the crew doing the work.
                </p>
                <p>
                    We serve agricultural operations, industrial builds, commercial contractors, and residential
                    property owners across Florence, Casa Grande, Queen Creek, and the surrounding communities.
                    If you're building in Central Arizona and need steel fabrication that doesn't take three weeks
                    and a premium freight charge, we're the local alternative.
                </p>
            </div>
            <div class="story-image">
                <img src="/assets/images/crew-salt-river-steel-florence-960.webp"
                     srcset="/assets/images/crew-salt-river-steel-florence-480.webp 480w, /assets/images/crew-salt-river-steel-florence-960.webp 960w, /assets/images/crew-salt-river-steel-florence-1440.webp 1440w"
                     sizes="(max-width: 900px) 100vw, 480px"
                     alt="Salt River Steel LLC crew on a steel fence installation job in Central Arizona"
                     width="600" height="450" loading="lazy" decoding="async">
                <div class="story-badge">
                    <span class="big"><?php echo $yearEstablished; ?></span>
                    <span class="small">Est. in Florence</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section values-section" aria-label="Our values">
    <div class="container">
        <div class="section-title">
            <span class="eyebrow-label">What Drives Us</span>
            <h2>The principles that guide every <span class="text-accent">steel job</span></h2>
            <p class="hero-answer">
                We compete on turnaround, accountability, and steel quality — not marketing promises.
                These are the commitments Central Arizona contractors and property owners can count on.
            </p>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <svg aria-hidden="true" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                    </svg>
                </div>
                <h3>Quality Over Volume</h3>
                <p>
                    Every custom gate, fence, and steel structure is built to hold up to Arizona's heat,
                    dust, and monsoon conditions — not mass-produced for the lowest possible bid.
                </p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <svg aria-hidden="true" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <h3>Realistic Timelines</h3>
                <p>
                    We quote what we can actually deliver. Most custom orders ship in 3–5 business days
                    from our Florence facility — and we tell you upfront when rush jobs aren't feasible.
                </p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <svg aria-hidden="true" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3>Direct Communication</h3>
                <p>
                    Contractors and property owners work directly with our in-house team. No
                    procurement middlemen, no vague answers — just straight talk from the crew doing the job.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Credentials -->
<section class="section credentials-section" aria-label="Credentials and certifications">
    <div class="container">
        <div class="section-title">
            <span class="eyebrow-label" style="color: var(--color-accent);">Verified & Trusted</span>
            <h2>Licensed, insured, and <span class="text-accent">Central Arizona</span> accountable</h2>
            <span class="section-subtitle">your steel, our reputation</span>
        </div>
        <div class="credentials-grid">
            <div class="cred-item">
                <svg aria-hidden="true" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                </svg>
                <strong>Licensed in Arizona</strong>
            </div>
            <div class="cred-item">
                <svg aria-hidden="true" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                </svg>
                <strong>Fully Insured</strong>
            </div>
            <div class="cred-item">
                <svg aria-hidden="true" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                    <circle cx="12" cy="10" r="3" />
                </svg>
                <strong>Florence-Based</strong>
            </div>
            <div class="cred-item">
                <svg aria-hidden="true" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
                    <path d="M2 12h20"/>
                </svg>
                <strong><?php echo $yearsInBusiness; ?>+ Years Serving Central AZ</strong>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section cta-about" aria-label="Contact Salt River Steel">
    <div class="container">
        <h2>Work with a Florence steel shop that answers the phone</h2>
        <p>
            Tell us what you need fabricated — agricultural structures, industrial equipment,
            commercial builds, custom gates, fencing — and we'll get you a realistic quote and timeline.
        </p>
        <div class="cta-actions">
            <a href="/contact/" class="btn btn-accent btn-lg">Request Your Free Estimate</a>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg">
                <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                </svg>
                <?php echo $phone; ?>
            </a>
        </div>
    </div>
</section>

<!-- Schema markup -->
<?php echo $schemaMarkup; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

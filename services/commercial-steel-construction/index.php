<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   /services/commercial-steel-construction/index.php — Salt River Steel
   Phase 4. Premium editorial service page. Commercial Steel.
   ============================================================ */

$currentPage     = 'services';
$pageTitle       = 'Commercial Steel Construction Florence AZ | Structural Steel | Salt River Steel';
$pageDescription = 'Structural and commercial steel construction in Florence, AZ — buildings, framing, and fabrication for contractors and businesses. Salt River Steel builds in-house for fast turnaround. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/commercial-steel-construction/';
$pageCanonical   = $canonicalUrl;
$ogImage         = $siteUrl . '/assets/images/commercial-steel-construction.jpg';
$heroPreloadImage = '';

/* ---------- Service-specific FAQs ---------- */
$faqs = [
    [
        'question' => 'What commercial steel projects does Salt River Steel handle?',
        'answer'   => 'Salt River Steel fabricates and erects structural steel for commercial buildings, shops, and light industrial spaces around Florence — steel framing, columns, beams, roll-up door openings, mezzanines, and support structures. We work directly with contractors and property owners on both new builds and additions.',
    ],
    [
        'question' => 'Do you work directly with general contractors and architects?',
        'answer'   => 'Yes. Salt River Steel partners with local general contractors, builders, and architects, fabricating to your drawings and schedule. Because we cut and weld in Florence, we can coordinate deliveries around your build sequence and keep the steel package off your critical path.',
    ],
    [
        'question' => 'How fast can you turn around a commercial steel package?',
        'answer'   => 'Most custom fabrication ships within 3–5 business days from our Florence shop, and we schedule larger structural packages around your build timeline. Local fabrication means no out-of-state freight delays — a real advantage when a commercial project is on a deadline.',
    ],
    [
        'question' => 'Is your commercial steelwork engineered and up to code?',
        'answer'   => 'Salt River Steel fabricates to your project drawings and specifications so the steel integrates with your engineered plans and local permitting. We coordinate with your contractor and engineer of record, and our in-house welders build to the spec the job requires.',
    ],
    [
        'question' => 'Do you deliver commercial steel to the job site?',
        'answer'   => 'Yes. Salt River Steel delivers fabricated commercial steel to job sites throughout Central Arizona and coordinates timing with your crew, or you can pick up at our Florence facility. Delivery is scheduled to match your build sequence.',
    ],
    [
        'question' => 'Can you handle both new construction and building additions?',
        'answer'   => 'Absolutely. Whether you are putting up a new commercial shell or adding onto an existing structure, Salt River Steel fabricates the framing, supports, and connections to tie new steel cleanly into the project. Tell us the scope and we will quote it.',
    ],
];
$faqSchema = generateFAQSchema($faqs);

/* ---------- Service schema ---------- */
$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'Service',
    '@id'      => $siteUrl . '/services/commercial-steel-construction/#service-commercial-steel-construction',
    'name'     => 'Commercial Steel Construction',
    'serviceType' => 'Structural and commercial steel fabrication and erection',
    'description' => 'Structural steel fabrication and installation for commercial buildings, shops, and light industrial projects by Salt River Steel in Florence, AZ and Central Arizona.',
    'provider' => ['@id' => $siteUrl . '/#organization'],
    'areaServed' => ['@type' => 'City', 'name' => 'Florence', 'containedIn' => ['@type' => 'State', 'name' => 'Arizona']],
    'url' => $canonicalUrl,
];
$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services/'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Commercial Steel Construction', 'item' => $canonicalUrl],
    ],
];

/* ---------- "Other services" (exclude current) ---------- */
$otherServices = array_values(array_filter($services, fn($s) => $s['slug'] !== 'commercial-steel-construction'));
$otherMedia = [
    'custom-steel-gates'           => ['img' => 'custom-steel-gates',           'icon' => 'shield-check', 'alt' => 'Custom steel driveway gate in Florence, AZ'],
    'steel-fencing'                => ['img' => 'steel-fencing',                'icon' => 'ruler',        'alt' => 'Steel ranch-rail fencing near Florence, AZ'],
    'residential-steel-work'       => ['img' => 'residential-steel-work',       'icon' => 'home',         'alt' => 'Residential steel work in Central Arizona'],
    'industrial-steel-fabrication' => ['img' => 'industrial-steel-fabrication', 'icon' => 'hammer',       'alt' => 'Industrial steel fabrication near Florence, AZ'],
];
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo json_encode($serviceSchema, JSON_UNESCAPED_SLASHES); ?></script>
<script type="application/ld+json"><?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES); ?></script>

<style>
/* ============================================================
   Service page — Commercial Steel Construction (Premium editorial)
   Token-driven; raw rgba reserved for glass/overlay only.
   Signature block: .scope-columns capability checklist (unique).
   ============================================================ */
:root {
  --sp-line: rgba(var(--color-primary-rgb), 0.10);
  --sp-tint-1: rgba(var(--color-primary-rgb), 0.06);
  --sp-tint-2: rgba(6, 182, 212, 0.09);
}

/* ---------- HERO ---------- */
.sp-hero { position: relative; isolation: isolate; overflow: hidden; color: var(--color-white); padding: calc(var(--space-16) + 56px) 0 var(--space-16); }
.sp-hero-bg { position: absolute; inset: 0; z-index: -3; width: 100%; height: 100%; object-fit: cover; object-position: center; }
.sp-hero::before { content: ""; position: absolute; inset: 0; z-index: -2; background: linear-gradient(118deg, rgba(var(--color-primary-rgb),0.95) 0%, rgba(var(--color-primary-rgb),0.82) 46%, rgba(var(--color-secondary-rgb),0.55) 100%); }
.sp-hero::after { content: ""; position: absolute; inset: 0; z-index: -1; opacity: 0.5; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E"); }
.sp-hero-inner { max-width: 720px; }
.sp-hero .eyebrow-label { color: var(--color-accent); }
.sp-hero h1 { color: var(--color-white); font-size: clamp(2.2rem, 4.6vw, 3.4rem); line-height: 1.06; margin: var(--space-3) 0 var(--space-5); text-wrap: balance; }
.sp-hero h1 .text-accent { color: var(--color-accent); }
.sp-hero .hero-answer { color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); line-height: 1.7; max-width: 60ch; margin: 0 0 var(--space-8); }
.sp-hero-actions { display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-8); }
.sp-hero-trust { display: flex; flex-wrap: wrap; gap: var(--space-3) var(--space-6); padding-top: var(--space-6); border-top: 1px solid rgba(255,255,255,0.18); }
.sp-hero-trust span { display: inline-flex; align-items: center; gap: var(--space-2); font-size: var(--font-size-sm); font-weight: 500; color: rgba(255,255,255,0.92); }
.sp-hero-trust svg { color: var(--color-accent); }

/* ---------- Section shells ---------- */
.sp-section-head { max-width: 760px; margin: 0 auto var(--space-10); text-align: center; }
.sp-section-head .section-subtitle { display: block; font-family: var(--font-accent); color: var(--color-accent); font-size: 1.6rem; line-height: 1; margin-bottom: var(--space-2); }
.sp-section-head h2 { font-size: clamp(1.8rem, 3.3vw, 2.5rem); margin: var(--space-2) 0 var(--space-4); text-wrap: balance; }
.sp-section-head h2 .text-accent { color: var(--color-accent); }
.sp-section-head .answer-block { text-align: left; }

/* ---------- PROBLEM STATEMENT ---------- */
.sp-problem { background: var(--color-white); }
.sp-pullquote { max-width: 900px; margin: 0 auto var(--space-12); text-align: center; font-family: var(--font-heading); font-weight: 700; font-size: clamp(1.5rem, 3vw, 2.1rem); line-height: 1.3; color: var(--color-dark); text-wrap: balance; }
.sp-pullquote .text-accent { color: var(--color-accent); }
.signs-bento { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-5); }
@media (max-width: 860px) { .signs-bento { grid-template-columns: 1fr; } }
.sign-card { padding: var(--space-6); border-radius: var(--radius-lg); background: var(--sp-tint-1); border: 1px solid var(--sp-line); }
.sign-card:nth-child(2) { background: var(--sp-tint-2); }
.sign-card__icon { width: 48px; height: 48px; border-radius: var(--radius-md); background: var(--color-white); box-shadow: var(--shadow-sm); display: flex; align-items: center; justify-content: center; color: var(--color-accent); margin-bottom: var(--space-4); }
.sign-card h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-2); color: var(--color-dark); }
.sign-card p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; }

/* ---------- EXPERT POSITIONING ---------- */
.sp-expert { background: var(--color-light); }
.sp-expert-grid { display: grid; grid-template-columns: 0.8fr 1.2fr; gap: var(--space-16); align-items: center; }
@media (max-width: 900px) { .sp-expert-grid { grid-template-columns: 1fr; gap: var(--space-10); } }
.sp-bigstat { text-align: center; padding: var(--space-10) var(--space-6); border-radius: var(--radius-xl); background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-dark-alt) 100%); color: var(--color-white); box-shadow: var(--shadow-lg); }
.sp-bigstat .big { font-family: var(--font-heading); font-weight: 800; font-size: clamp(3rem, 8vw, 5rem); line-height: 1; color: var(--color-accent); }
.sp-bigstat .cap { display: block; margin-top: var(--space-3); font-size: var(--font-size-sm); text-transform: uppercase; letter-spacing: 1px; color: rgba(255,255,255,0.85); }
.sp-expert-copy h2 { font-size: clamp(1.7rem, 3vw, 2.3rem); margin-bottom: var(--space-4); text-wrap: balance; }
.sp-expert-copy h2 .text-accent { color: var(--color-accent); }
.sp-diff-list { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: flex; flex-direction: column; gap: var(--space-4); }
.sp-diff-list li { display: flex; gap: var(--space-4); align-items: flex-start; }
.sp-diff-list .ic { flex-shrink: 0; width: 40px; height: 40px; border-radius: var(--radius-full); background: var(--sp-tint-2); color: var(--color-accent); display: flex; align-items: center; justify-content: center; }
.sp-diff-list strong { display: block; color: var(--color-dark); margin-bottom: 2px; }
.sp-diff-list p { margin: 0; color: var(--color-gray); font-size: var(--font-size-sm); line-height: 1.6; }

/* ---------- SERVICE BREAKDOWN ---------- */
.sp-breakdown { background: var(--color-white); }
.sp-breakdown-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: var(--space-16); align-items: center; }
@media (max-width: 900px) { .sp-breakdown-grid { grid-template-columns: 1fr; gap: var(--space-10); } }
.sp-breakdown h2 { font-size: clamp(1.7rem, 3vw, 2.3rem); margin-bottom: var(--space-4); text-wrap: balance; }
.sp-breakdown h2 .text-accent { color: var(--color-accent); }
.sp-included { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3); }
@media (max-width: 520px) { .sp-included { grid-template-columns: 1fr; } }
.sp-included li { display: flex; gap: var(--space-2); align-items: flex-start; font-size: var(--font-size-sm); color: var(--color-gray-dark); }
.sp-included svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.sp-breakdown-img { position: relative; }
.sp-breakdown-img img { width: 100%; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); aspect-ratio: 4 / 3; object-fit: cover; }

/* ---------- SIGNATURE: Scope columns capability checklist (unique) ---------- */
.scope-columns { background: var(--color-light); }
.scope-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); }
@media (max-width: 900px) { .scope-grid { grid-template-columns: 1fr; } }
.scope-col { background: var(--color-white); border: 1px solid var(--sp-line); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); }
.scope-col__head { display: flex; align-items: center; gap: var(--space-3); padding: var(--space-5) var(--space-6); background: linear-gradient(135deg, var(--color-primary), var(--color-dark-alt)); color: var(--color-white); }
.scope-col__head svg { color: var(--color-accent); }
.scope-col__head h3 { font-size: var(--font-size-lg); margin: 0; color: var(--color-white); }
.scope-col ul { list-style: none; margin: 0; padding: var(--space-5) var(--space-6); display: flex; flex-direction: column; gap: var(--space-3); }
.scope-col li { display: flex; gap: var(--space-2); align-items: flex-start; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.5; }
.scope-col li svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }

/* ---------- PROOF ---------- */
.sp-proof { background: var(--color-dark); }
.sp-proof .sp-section-head h2 { color: var(--color-white); }
.sp-proof .sp-section-head .answer-block { background: rgba(255,255,255,0.06); border-left-color: var(--color-accent); color: rgba(255,255,255,0.9); }
.sp-proof-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-8); align-items: center; }
@media (max-width: 860px) { .sp-proof-grid { grid-template-columns: 1fr; } }
.sp-proof-img img { width: 100%; border-radius: var(--radius-lg); box-shadow: var(--shadow-xl); aspect-ratio: 4 / 3; object-fit: cover; }
.sp-proof-points { list-style: none; margin: 0 0 var(--space-6); padding: 0; display: flex; flex-direction: column; gap: var(--space-4); }
.sp-proof-points li { display: flex; gap: var(--space-3); align-items: flex-start; color: rgba(255,255,255,0.88); font-size: var(--font-size-base); line-height: 1.6; }
.sp-proof-points svg { color: var(--color-accent); flex-shrink: 0; margin-top: 3px; }
.sp-proof-badges { display: flex; flex-wrap: wrap; gap: var(--space-3); }
.sp-proof-badge { display: inline-flex; align-items: center; gap: var(--space-2); padding: var(--space-3) var(--space-5); border-radius: var(--radius-full); background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.14); color: var(--color-white); font-size: var(--font-size-sm); font-weight: 600; }
.sp-proof-badge svg { color: var(--color-accent); }

/* ---------- COMPARISON ---------- */
.sp-compare { background: var(--color-white); }
.compare-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); max-width: 960px; margin: 0 auto; }
@media (max-width: 720px) { .compare-grid { grid-template-columns: 1fr; } }
.compare-col { border-radius: var(--radius-lg); padding: var(--space-8) var(--space-6); border: 1px solid var(--sp-line); }
.compare-col--them { background: var(--color-light); }
.compare-col--us { background: linear-gradient(160deg, rgba(var(--color-primary-rgb),0.06), rgba(6,182,212,0.10)); border-color: var(--color-accent); }
.compare-col h3 { font-size: var(--font-size-xl); margin-bottom: var(--space-5); color: var(--color-dark); display: flex; align-items: center; gap: var(--space-2); }
.compare-col--us h3 { color: var(--color-primary); }
.compare-col ul { list-style: none; margin: 0; padding: 0; display: flex; flex-direction: column; gap: var(--space-3); }
.compare-col li { display: flex; gap: var(--space-3); align-items: flex-start; font-size: var(--font-size-sm); line-height: 1.55; color: var(--color-gray-dark); }
.compare-col li svg { flex-shrink: 0; margin-top: 2px; }
.compare-col--them li svg { color: var(--color-gray); }
.compare-col--us li svg { color: var(--color-accent); }

/* ---------- FAQ ---------- */
.sp-faq { background: var(--color-light); }
.faq-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); }
@media (max-width: 800px) { .faq-grid { grid-template-columns: 1fr; } }
.faq-item { background: var(--color-white); border-radius: var(--radius-lg); padding: var(--space-6); box-shadow: var(--shadow-sm); border: 1px solid var(--sp-line); }
.faq-question { display: flex; gap: var(--space-3); align-items: flex-start; font-size: var(--font-size-base); color: var(--color-dark); margin-bottom: var(--space-3); }
.faq-question svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.faq-answer { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; margin: 0; padding-left: calc(20px + var(--space-3)); }

/* ---------- OTHER SERVICES ---------- */
.sp-other { background: var(--color-white); }
.sp-other-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-5); }
@media (max-width: 900px) { .sp-other-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 520px) { .sp-other-grid { grid-template-columns: 1fr; } }
.sp-other-card { border-radius: var(--radius-lg); overflow: hidden; background: var(--color-light); border: 1px solid var(--sp-line); display: flex; flex-direction: column; transition: transform var(--transition-base), box-shadow var(--transition-base); }
.sp-other-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.sp-other-card__img { aspect-ratio: 3 / 2; overflow: hidden; }
.sp-other-card__img img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.sp-other-card:hover .sp-other-card__img img { transform: scale(1.06); }
.sp-other-card__body { padding: var(--space-5); display: flex; flex-direction: column; gap: var(--space-2); flex: 1; }
.sp-other-card__body h3 { font-size: var(--font-size-base); color: var(--color-primary); margin: 0; }
.sp-other-card__cta { margin-top: auto; color: var(--color-accent); font-weight: 700; font-size: var(--font-size-sm); }

/* ---------- FINAL CTA ---------- */
.sp-cta { position: relative; overflow: hidden; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%); }
.sp-cta::after { content: ""; position: absolute; right: -60px; top: -60px; width: 320px; height: 320px; border-radius: 50%; background: rgba(6,182,212,0.18); pointer-events: none; }
.sp-cta .container { position: relative; z-index: 1; text-align: center; max-width: 700px; }
.sp-cta h2 { color: var(--color-white); font-size: clamp(1.9rem, 3.6vw, 2.8rem); margin-bottom: var(--space-4); text-wrap: balance; }
.sp-cta p { color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); margin-bottom: var(--space-8); }
.sp-cta-actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }
.sp-cta .phone-line { display: inline-flex; align-items: center; gap: var(--space-2); margin-top: var(--space-6); color: var(--color-white); font-family: var(--font-heading); font-weight: 700; font-size: var(--font-size-xl); }
.sp-cta .phone-line a { color: var(--color-white); }
.sp-cta .phone-line svg { color: var(--color-accent); }

/* ---------- Reveals ---------- */
.reveal-up, .reveal-left, .reveal-right, .reveal-scale { transition: opacity 0.7s ease, transform 0.7s ease; }
html.js-anim .reveal-up { opacity: 0; transform: translateY(28px); }
html.js-anim .reveal-left { opacity: 0; transform: translateX(-34px); }
html.js-anim .reveal-right { opacity: 0; transform: translateX(34px); }
html.js-anim .reveal-scale { opacity: 0; transform: scale(0.94); }
.reveal-up.revealed, .reveal-left.revealed, .reveal-right.revealed, .reveal-scale.revealed { opacity: 1; transform: none; }
.reveal-delay-1 { transition-delay: 0.08s; }
.reveal-delay-2 { transition-delay: 0.18s; }
.reveal-delay-3 { transition-delay: 0.28s; }
@media (prefers-reduced-motion: reduce) {
  html.js-anim .reveal-up, html.js-anim .reveal-left, html.js-anim .reveal-right, html.js-anim .reveal-scale { opacity: 1; transform: none; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/services/">Services</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">/</li>
      <li aria-current="page">Commercial Steel Construction</li>
    </ol>
  </div>
</nav>

<!-- 1. HERO -->
<section class="sp-hero" aria-label="Commercial steel construction in Florence, Arizona">
  <img class="sp-hero-bg"
       src="/assets/images/commercial-steel-construction.jpg"
       srcset="/assets/images/commercial-steel-construction-480.webp 480w, /assets/images/commercial-steel-construction-960.webp 960w, /assets/images/commercial-steel-construction-1600.webp 1600w"
       sizes="100vw"
       alt="Commercial steel building with a roll-up door fabricated and erected by Salt River Steel near Florence, Arizona"
       width="1600" height="1000" loading="eager" fetchpriority="high" decoding="async">
  <div class="container">
    <div class="sp-hero-inner">
      <span class="eyebrow-label">Commercial Steel Construction · Florence, AZ</span>
      <h1>Structural steel that keeps your <span class="text-accent">build on schedule</span></h1>
      <p class="hero-answer">Salt River Steel fabricates and erects structural steel for commercial buildings, shops, and light industrial projects across Central Arizona. We build framing, columns, beams, and supports to your drawings in our Florence shop — coordinating deliveries around your build sequence so the steel package stays off your critical path.</p>
      <div class="sp-hero-actions">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Project Estimate</a>
        <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      </div>
      <div class="sp-hero-trust">
        <span><?php echo icon('shield-check', 18); ?> Licensed &amp; Insured</span>
        <span><?php echo icon('users', 18); ?> Contractor &amp; Architect Partner</span>
        <span><?php echo icon('truck', 18); ?> Job-Site Delivery</span>
      </div>
    </div>
  </div>
</section>

<!-- 2. PROBLEM STATEMENT -->
<section class="section sp-problem" aria-label="When you need a local steel partner">
  <div class="container">
    <p class="sp-pullquote reveal-up">On a commercial build, a late or wrong steel package doesn't slow one trade — <span class="text-accent">it stalls every trade behind it.</span></p>
    <div class="signs-bento">
      <div class="sign-card reveal-up reveal-delay-1">
        <div class="sign-card__icon"><?php echo icon('clock', 24); ?></div>
        <h3>Your schedule can't absorb freight delays</h3>
        <p>Out-of-state steel arrives on someone else's timeline. Local fabrication in Florence lets us schedule around your build sequence.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-2">
        <div class="sign-card__icon"><?php echo icon('pen-tool', 24); ?></div>
        <h3>The steel has to match the drawings</h3>
        <p>We fabricate to your engineered plans and coordinate with your contractor so connections and dimensions land right the first time.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-3">
        <div class="sign-card__icon"><?php echo icon('users', 24); ?></div>
        <h3>You want one accountable source</h3>
        <p>Work directly with the Florence crew fabricating your steel — no layers of middlemen between your plans and the weld.</p>
      </div>
    </div>
  </div>
</section>

<!-- 3. EXPERT POSITIONING -->
<section class="section sp-expert" aria-label="Why contractors choose Salt River Steel">
  <div class="container">
    <div class="sp-expert-grid">
      <div class="sp-bigstat reveal-left">
        <span class="big">3–5</span>
        <span class="cap">Day Fabrication<br>Turnaround</span>
      </div>
      <div class="sp-expert-copy reveal-right">
        <span class="eyebrow-label">Built to Your Schedule</span>
        <h2>Why build commercial steel with <span class="text-accent">Salt River Steel?</span></h2>
        <p class="answer-block">Salt River Steel is a local Florence fabricator that works directly with your build team. We fabricate to your drawings, coordinate delivery around your sequence, and keep the steel package local — so a Central Arizona contractor never waits on out-of-state freight to keep a job moving.</p>
        <ul class="sp-diff-list">
          <li><span class="ic"><?php echo icon('pen-tool', 20); ?></span><div><strong>Fabricated to your drawings</strong><p>We build to your engineered plans and coordinate with your engineer of record and contractor.</p></div></li>
          <li><span class="ic"><?php echo icon('truck', 20); ?></span><div><strong>Delivered on your sequence</strong><p>Local delivery timed to your build so steel shows up when the crew is ready for it.</p></div></li>
          <li><span class="ic"><?php echo icon('hammer', 20); ?></span><div><strong>In-house welding</strong><p>Certified welding and specialized fabrication handled by our own Florence crew.</p></div></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4. SERVICE BREAKDOWN -->
<section class="section sp-breakdown" aria-label="What's included in commercial steel construction">
  <div class="container">
    <div class="sp-breakdown-grid">
      <div class="reveal-left">
        <span class="eyebrow-label">What's Included</span>
        <h2>What does a commercial steel <span class="text-accent">package cover?</span></h2>
        <p class="answer-block">A commercial steel project from Salt River Steel covers the structural package from shop drawings to erected steel — framing, connections, openings, and supports fabricated in Florence and delivered to your site. We coordinate the whole scope with your contractor so nothing falls between trades.</p>
        <ul class="sp-included">
          <li><?php echo icon('check', 18); ?> Structural framing, columns &amp; beams</li>
          <li><?php echo icon('check', 18); ?> Roll-up door &amp; opening framing</li>
          <li><?php echo icon('check', 18); ?> Mezzanines &amp; support structures</li>
          <li><?php echo icon('check', 18); ?> Fabrication to your drawings</li>
          <li><?php echo icon('check', 18); ?> Certified in-house welding</li>
          <li><?php echo icon('check', 18); ?> New builds &amp; additions</li>
          <li><?php echo icon('check', 18); ?> Contractor coordination</li>
          <li><?php echo icon('check', 18); ?> Sequenced job-site delivery</li>
        </ul>
      </div>
      <div class="sp-breakdown-img reveal-right">
        <img src="/assets/images/hero-home.jpg"
             srcset="/assets/images/hero-home-480.webp 480w, /assets/images/hero-home-960.webp 960w, /assets/images/hero-home-1600.webp 1600w"
             sizes="(max-width: 900px) 100vw, 460px"
             alt="Completed steel building exterior in bright Central Arizona sun, built by Salt River Steel"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
    </div>
  </div>
</section>

<!-- 5. SIGNATURE — Scope columns -->
<section class="section scope-columns" aria-label="Commercial steel project scope">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">the full structural scope</span>
      <h2>What kinds of commercial projects <span class="text-accent">do you build?</span></h2>
      <p class="answer-block">Salt River Steel supports commercial builds across three fronts — new structures, additions and expansions, and the structural components that tie a project together. Here's how the work breaks down for Central Arizona contractors and property owners.</p>
    </div>
    <div class="scope-grid">
      <div class="scope-col reveal-up reveal-delay-1">
        <div class="scope-col__head"><?php echo icon('building-2', 24); ?><h3>New Structures</h3></div>
        <ul>
          <li><?php echo icon('check', 16); ?> Commercial building shells</li>
          <li><?php echo icon('check', 16); ?> Shops &amp; light industrial spaces</li>
          <li><?php echo icon('check', 16); ?> Steel framing &amp; roof supports</li>
          <li><?php echo icon('check', 16); ?> Roll-up door openings</li>
        </ul>
      </div>
      <div class="scope-col reveal-up reveal-delay-2">
        <div class="scope-col__head"><?php echo icon('home', 24); ?><h3>Additions &amp; Expansions</h3></div>
        <ul>
          <li><?php echo icon('check', 16); ?> Building additions</li>
          <li><?php echo icon('check', 16); ?> Mezzanines &amp; second levels</li>
          <li><?php echo icon('check', 16); ?> Canopies &amp; covered areas</li>
          <li><?php echo icon('check', 16); ?> Tie-ins to existing steel</li>
        </ul>
      </div>
      <div class="scope-col reveal-up reveal-delay-3">
        <div class="scope-col__head"><?php echo icon('wrench', 24); ?><h3>Structural Components</h3></div>
        <ul>
          <li><?php echo icon('check', 16); ?> Columns, beams &amp; joists</li>
          <li><?php echo icon('check', 16); ?> Stairs, platforms &amp; railings</li>
          <li><?php echo icon('check', 16); ?> Custom connections &amp; brackets</li>
          <li><?php echo icon('check', 16); ?> Load-bearing supports</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 6. PROOF -->
<section class="section sp-proof" aria-label="Why contractors trust Salt River Steel">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <h2>Can a local shop handle a <span class="text-accent">commercial build?</span></h2>
      <p class="answer-block">Salt River Steel is a licensed, insured steel fabricator based in Florence, AZ, partnering with Central Arizona contractors since 2022. We fabricate structural steel in-house to your drawings and deliver to the job site — a real local shop your build team can call, visit, and count on.</p>
    </div>
    <div class="sp-proof-grid">
      <div class="sp-proof-img reveal-left">
        <img src="/assets/images/about-fabrication.jpg"
             srcset="/assets/images/about-fabrication-480.webp 480w, /assets/images/about-fabrication-960.webp 960w, /assets/images/about-fabrication-1600.webp 1600w"
             sizes="(max-width: 860px) 100vw, 460px"
             alt="Salt River Steel crew fabricating structural steel at a Central Arizona job site"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
      <div class="reveal-right">
        <ul class="sp-proof-points">
          <li><?php echo icon('badge-check', 20); ?> Licensed &amp; insured Arizona steel fabricator</li>
          <li><?php echo icon('map-pin', 20); ?> Local shop at 12356 E Pot O Gold Trail, Florence</li>
          <li><?php echo icon('users', 20); ?> Direct partnership with GCs and architects</li>
          <li><?php echo icon('calendar', 20); ?> Serving Central Arizona since <?php echo $yearEstablished; ?></li>
        </ul>
        <div class="sp-proof-badges">
          <a href="<?php echo htmlspecialchars($gbpUrl); ?>" class="sp-proof-badge" target="_blank" rel="noopener"><?php echo icon('map-pin', 18); ?> Find us on Google</a>
          <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" class="sp-proof-badge" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave a Review</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 7. COMPARISON -->
<section class="section sp-compare" aria-label="Local steel fabrication compared to out-of-state suppliers">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">the local difference</span>
      <h2>Why source steel <span class="text-accent">locally in Florence?</span></h2>
      <p class="answer-block">A distant supplier can quote a low steel price, but freight, lead time, and no local accountability add up fast on a commercial schedule. Salt River Steel fabricates in Florence, so your steel package is built close, delivered on sequence, and backed by a crew you can reach.</p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--them reveal-left">
        <h3><?php echo icon('truck', 22); ?> Out-of-State Supplier</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Premium freight on structural loads</li>
          <li><?php echo icon('minus', 18); ?> Long lead times, hard to expedite</li>
          <li><?php echo icon('minus', 18); ?> Delivery on their schedule, not yours</li>
          <li><?php echo icon('minus', 18); ?> No local crew for fit or field fixes</li>
          <li><?php echo icon('minus', 18); ?> Layers of reps between you and the shop</li>
        </ul>
      </div>
      <div class="compare-col compare-col--us reveal-right">
        <h3><?php echo icon('shield-check', 22); ?> Salt River Steel</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Local pricing without premium freight</li>
          <li><?php echo icon('check', 18); ?> Most fabrication in 3–5 business days</li>
          <li><?php echo icon('check', 18); ?> Delivery sequenced to your build</li>
          <li><?php echo icon('check', 18); ?> Florence crew available for the job</li>
          <li><?php echo icon('check', 18); ?> Talk straight to the fabricator</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 8. FAQ -->
<section class="section sp-faq" aria-label="Commercial steel construction questions">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="eyebrow-label">Project Questions</span>
      <h2>Common questions about <span class="text-accent">commercial steel</span></h2>
    </div>
    <div class="faq-grid">
      <?php $fi = 0; foreach ($faqs as $faq): $fdir = ($fi % 2 === 0) ? 'reveal-left' : 'reveal-right'; ?>
      <div class="faq-item <?php echo $fdir; ?>">
        <h3 class="faq-question"><?php echo icon('info', 20); ?> <?php echo htmlspecialchars($faq['question']); ?></h3>
        <p class="faq-answer"><?php echo htmlspecialchars($faq['answer']); ?></p>
      </div>
      <?php $fi++; endforeach; ?>
    </div>
  </div>
</section>

<?php echo $faqSchema; ?>

<!-- OTHER SERVICES -->
<section class="section sp-other" aria-label="Other steel services">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What else can <span class="text-accent">Salt River Steel</span> fabricate?</h2>
    </div>
    <div class="sp-other-grid">
      <?php foreach ($otherServices as $os): $m = $otherMedia[$os['slug']]; ?>
      <a href="/services/<?php echo $os['slug']; ?>/" class="sp-other-card reveal-up">
        <div class="sp-other-card__img">
          <img src="/assets/images/<?php echo $m['img']; ?>.jpg"
               srcset="/assets/images/<?php echo $m['img']; ?>-480.webp 480w, /assets/images/<?php echo $m['img']; ?>-960.webp 960w"
               sizes="(max-width: 520px) 100vw, (max-width: 900px) 50vw, 270px"
               alt="<?php echo htmlspecialchars($m['alt']); ?>"
               width="400" height="267" loading="lazy" decoding="async">
        </div>
        <div class="sp-other-card__body">
          <h3><?php echo htmlspecialchars($os['name']); ?></h3>
          <span class="sp-other-card__cta">Learn more →</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="section sp-cta" aria-label="Request a commercial steel estimate">
  <div class="container">
    <h2 class="reveal-up">Bring us your drawings — we'll build the steel.</h2>
    <p class="reveal-up reveal-delay-1">Salt River Steel fabricates your commercial steel package in Florence and delivers it on your build sequence. Send us the scope and we'll get you a quote and a realistic timeline. Your estimate is free.</p>
    <div class="sp-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-accent btn-lg">Get a Project Estimate</a>
      <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
    <div class="phone-line reveal-up reveal-delay-3"><?php echo icon('phone', 22); ?> <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a></div>
  </div>
</section>

<script>
(function () {
  document.documentElement.classList.add('js-anim');
  var els = document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right, .reveal-scale');
  function revealAll() { els.forEach(function (el) { el.classList.add('revealed'); }); }
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('revealed'); io.unobserve(e.target); } });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    els.forEach(function (el) { io.observe(el); });
  } else { revealAll(); }
  setTimeout(revealAll, 2000);
})();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

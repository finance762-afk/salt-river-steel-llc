<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   /services/commercial-steel-construction/index.php — Salt River Steel LLC
   Phase 4. Premium editorial service page. Commercial Steel Construction.
   ============================================================ */

$service = null;
foreach ($services as $s) { if ($s['slug'] === 'commercial-steel-construction') { $service = $s; break; } }

$currentPage     = 'services';
$pageTitle       = 'Commercial Steel Construction Florence AZ | Structural Steel Fabrication | Salt River Steel';
$pageDescription = 'Structural steel fabrication and installation for commercial buildings in Florence, AZ — beams, columns, mezzanines, canopies, and stairs. Salt River Steel builds and erects it locally. Free estimates — call (480) 450-6959.';
$canonicalUrl    = $siteUrl . '/services/commercial-steel-construction/';
$pageCanonical   = $canonicalUrl;
$ogImage         = $siteUrl . '/assets/images/commercial-steel-building-construction-og.jpg';
$heroPreloadImage = '';

/* ---------- Service-specific FAQs ---------- */
$faqs = [
    [
        'question' => 'What kinds of commercial steel projects does Salt River Steel handle?',
        'answer'   => 'Salt River Steel fabricates and installs structural steel for commercial buildings across the Florence area — load-bearing beams and columns, mezzanines and platforms, entry canopies and awnings, steel stairs and railings, and storefront framing. If your commercial project needs steel cut, welded, and set on site, we build it in our Florence shop and erect it locally.',
    ],
    [
        'question' => 'Do you work from an engineer or architect\'s drawings?',
        'answer'   => 'Yes. Salt River Steel fabricates directly from stamped structural drawings and shop details, and we coordinate with your engineer, architect, or general contractor on connections, tolerances, and load requirements. Bring us the plans and we will turn them into fabricated, code-conscious steel ready for inspection.',
    ],
    [
        'question' => 'How long does commercial steel fabrication take?',
        'answer'   => 'Timeline depends on tonnage, complexity, and your drawing package, but keeping fabrication local in Florence cuts weeks off the freight and scheduling delays of an out-of-area shop. We give every commercial client a firm fabrication and erection schedule with the quote so it slots cleanly into your build sequence.',
    ],
    [
        'question' => 'Can you both fabricate and erect the steel on site?',
        'answer'   => 'Both. Salt River Steel fabricates your structural steel in Florence and can deliver it for another crew to set, or handle the on-site erection ourselves — bolting, welding, plumbing the frame, and connecting to your foundation. One local source from shop drawing to standing steel.',
    ],
    [
        'question' => 'Are you licensed and insured for commercial work?',
        'answer'   => 'Yes. Salt River Steel is a licensed, insured steel contractor based in Florence, AZ. Commercial general contractors and property owners work with us because the fabrication, welding, and installation all sit with one accountable local company they can visit at 12356 E Pot O Gold Trail.',
    ],
    [
        'question' => 'Do you build mezzanines and equipment platforms?',
        'answer'   => 'Yes. Steel mezzanines, equipment platforms, and catwalks are a core part of our commercial work — engineered for the load, welded for the long haul, and built to fit the bay you already have. Tell us the span and the load and we will fabricate the structure around it.',
    ],
];
$faqSchema = generateFAQSchema($faqs);

/* ---------- Service schema ---------- */
$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'Service',
    '@id'      => $siteUrl . '/services/commercial-steel-construction/#service-commercial-steel-construction',
    'name'     => 'Commercial Steel Construction',
    'serviceType' => 'Structural steel fabrication and erection for commercial buildings',
    'description' => 'Structural steel fabrication and installation for commercial buildings by Salt River Steel — beams, columns, mezzanines, canopies, stairs, and railings for Florence, AZ and Central Arizona businesses.',
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
    'custom-steel-gates'           => ['img' => 'custom-steel-ranch-entry-gate',           'icon' => 'shield-check', 'alt' => 'Custom steel driveway gate fabricated by Salt River Steel in Florence, AZ'],
    'steel-fencing'                => ['img' => 'steel-ranch-rail-fence-florence',                'icon' => 'ruler',        'alt' => 'Steel ranch-rail fencing on a Florence-area desert property'],
    'residential-steel-work'       => ['img' => 'residential-steel-casita-building',       'icon' => 'home',         'alt' => 'Residential steel work in Central Arizona'],
    'industrial-steel-fabrication' => ['img' => 'steel-frame-erection-red-iron', 'icon' => 'hammer',       'alt' => 'Industrial steel fabrication near Florence, AZ'],
];
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo json_encode($serviceSchema, JSON_UNESCAPED_SLASHES); ?></script>
<script type="application/ld+json"><?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES); ?></script>

<style>
/* ============================================================
   Service page — Commercial Steel Construction (Premium editorial)
   Token-driven; raw rgba reserved for glass/overlay only.
   Signature block: .commercial-caps numbered capability bento (unique to this page).
   ============================================================ */
:root {
  --sp-line: rgba(var(--color-primary-rgb), 0.10);
  --sp-tint-1: rgba(var(--color-primary-rgb), 0.06);
  --sp-tint-2: rgba(6, 182, 212, 0.09);
}

/* ---------- HERO (layered) ---------- */
.sp-hero { position: relative; isolation: isolate; overflow: hidden; color: var(--color-white); padding: calc(var(--space-16) + 56px) 0 var(--space-16); }
.sp-hero-bg { position: absolute; inset: 0; z-index: -3; width: 100%; height: 100%; object-fit: cover; object-position: center; }
.sp-hero::before { content: ""; position: absolute; inset: 0; z-index: -2; background: linear-gradient(112deg, rgba(var(--color-primary-rgb),0.94) 0%, rgba(var(--color-primary-rgb),0.80) 48%, rgba(var(--color-secondary-rgb),0.55) 100%); }
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

/* ---------- Shared section shells ---------- */
.sp-section-head { max-width: 760px; margin: 0 auto var(--space-10); text-align: center; }
.sp-section-head .section-subtitle { display: block; font-family: var(--font-accent); color: var(--color-accent); font-size: 1.6rem; line-height: 1; margin-bottom: var(--space-2); }
.sp-section-head h2 { font-size: clamp(1.8rem, 3.3vw, 2.5rem); margin: var(--space-2) 0 var(--space-4); text-wrap: balance; }
.sp-section-head h2 .text-accent { color: var(--color-accent); }
.sp-section-head .answer-block { text-align: left; }

/* ---------- PROBLEM STATEMENT (pull-quote + signs bento) ---------- */
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

/* ---------- EXPERT POSITIONING (asymmetric stat + copy) ---------- */
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

/* ---------- SERVICE BREAKDOWN (included list + image) ---------- */
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

/* ---------- SIGNATURE: Commercial capabilities numbered bento (unique to this page) ---------- */
.commercial-caps { background: var(--color-light); }
.cap-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-6); max-width: 1000px; margin: 0 auto; }
@media (max-width: 720px) { .cap-grid { grid-template-columns: 1fr; } }
.cap-card {
  position: relative; display: flex; gap: var(--space-5); align-items: flex-start;
  padding: var(--space-8) var(--space-7); border-radius: var(--radius-lg);
  background: var(--color-white); border: 1px solid var(--sp-line);
  box-shadow: var(--shadow-sm); overflow: hidden;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.cap-card::before {
  content: ""; position: absolute; left: 0; top: 0; bottom: 0; width: 5px;
  background: linear-gradient(180deg, var(--color-accent), var(--color-primary));
}
.cap-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.cap-num { flex-shrink: 0; font-family: var(--font-heading); font-weight: 800; font-size: 2.2rem; line-height: 1; color: var(--sp-tint-2); -webkit-text-stroke: 1px var(--color-accent); }
.cap-body h3 { font-size: var(--font-size-lg); color: var(--color-primary); margin-bottom: var(--space-2); display: flex; align-items: center; gap: var(--space-2); }
.cap-body h3 svg { color: var(--color-accent); }
.cap-body p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; }

/* ---------- PROOF (real credentials, no fabricated reviews) ---------- */
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

/* ---------- Reveals (fail-open, gated) ---------- */
.reveal-up, .reveal-left, .reveal-right, .reveal-scale { transition: opacity 0.7s ease, transform 0.7s ease; }
html.js-anim .reveal-up { opacity: 0; transform: translateY(28px); }
html.js-anim .reveal-left { opacity: 0; transform: translateX(-34px); }
html.js-anim .reveal-right { opacity: 0; transform: translateX(34px); }
html.js-anim .reveal-scale { opacity: 0; transform: scale(0.94); }
html.js-anim .reveal-up.revealed, html.js-anim .reveal-left.revealed, html.js-anim .reveal-right.revealed, html.js-anim .reveal-scale.revealed, .revealed { opacity: 1 !important; transform: none !important; }
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
       src="/assets/images/commercial-steel-building-construction-960.webp"
       srcset="/assets/images/commercial-steel-building-construction-480.webp 480w, /assets/images/commercial-steel-building-construction-960.webp 960w, /assets/images/commercial-steel-building-construction-1440.webp 1440w"
       sizes="100vw"
       alt="Commercial steel building under construction with a telehandler lift, built by Salt River Steel near Florence, AZ"
       width="1440" height="1080" loading="eager" fetchpriority="high" decoding="async">
  <div class="container">
    <div class="sp-hero-inner">
      <span class="eyebrow-label">Commercial Steel Construction · Florence, AZ</span>
      <h1>Structural steel, <span class="text-accent">fabricated and set locally</span></h1>
      <p class="hero-answer">Salt River Steel fabricates and installs structural steel for commercial buildings across Florence and Central Arizona — beams, columns, mezzanines, canopies, stairs, and railings. We work from your engineer's drawings, cut and weld the steel in our Florence shop, and can erect the frame on site, keeping your commercial project on one accountable local schedule.</p>
      <div class="sp-hero-actions">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Project Estimate</a>
        <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      </div>
      <div class="sp-hero-trust">
        <span><?php echo icon('shield-check', 18); ?> Licensed &amp; Insured</span>
        <span><?php echo icon('map-pin', 18); ?> Florence-Based Fabrication</span>
        <span><?php echo icon('file-check', 18); ?> Builds to Your Drawings</span>
      </div>
    </div>
  </div>
</section>

<!-- 2. PROBLEM STATEMENT -->
<section class="section sp-problem" aria-label="Signs your commercial build needs a local steel fabricator">
  <div class="container">
    <p class="sp-pullquote reveal-up">On a commercial build, the steel package sets the whole schedule — <span class="text-accent">and out-of-area fabrication is where timelines quietly slip.</span></p>
    <div class="signs-bento">
      <div class="sign-card reveal-up reveal-delay-1">
        <div class="sign-card__icon"><?php echo icon('truck', 24); ?></div>
        <h3>Freight is eating your budget</h3>
        <p>Hauling fabricated steel in from Phoenix or out of state adds premium freight and coordination to every load. Local Florence fabrication keeps that money in the project.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-2">
        <div class="sign-card__icon"><?php echo icon('clock', 24); ?></div>
        <h3>Lead times keep slipping</h3>
        <p>A distant shop juggles your job behind dozens of others. Fabricating locally means a firm schedule you can actually build the rest of the sequence around.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-3">
        <div class="sign-card__icon"><?php echo icon('file-check', 24); ?></div>
        <h3>Connections don't line up</h3>
        <p>When fabrication and field crews aren't talking, bolt holes and tolerances fight the foundation. One local team from shop drawing to erection keeps the steel true.</p>
      </div>
    </div>
  </div>
</section>

<!-- 3. EXPERT POSITIONING -->
<section class="section sp-expert" aria-label="Why Salt River Steel for commercial steel">
  <div class="container">
    <div class="sp-expert-grid">
      <div class="sp-bigstat reveal-left">
        <span class="big">1</span>
        <span class="cap">Local Source, Shop<br>Drawing to Standing Steel</span>
      </div>
      <div class="sp-expert-copy reveal-right">
        <span class="eyebrow-label">Local Fabrication Advantage</span>
        <h2>Why build your steel with <span class="text-accent">Salt River Steel?</span></h2>
        <p class="answer-block">Salt River Steel fabricates commercial structural steel in its own Florence shop and can erect it on site, so your beams, columns, and connections come from one accountable local company instead of a distant supplier and a separate erector. That means tighter tolerances, no premium freight, and a schedule that holds.</p>
        <ul class="sp-diff-list">
          <li><span class="ic"><?php echo icon('hammer', 20); ?></span><div><strong>Fabricated in Florence</strong><p>Beams, columns, and connections cut and welded in-house so fit and quality stay under our control — no drop-shipped assemblies.</p></div></li>
          <li><span class="ic"><?php echo icon('file-check', 20); ?></span><div><strong>Built to stamped drawings</strong><p>We fabricate from your engineer's and architect's details and coordinate connections, loads, and tolerances for inspection.</p></div></li>
          <li><span class="ic"><?php echo icon('hard-hat', 20); ?></span><div><strong>Fabricate and erect</strong><p>Deliver for your crew or set the frame ourselves — bolting, welding, and plumbing the steel to your foundation.</p></div></li>
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
        <h2>What does a <span class="text-accent">commercial steel package</span> cover?</h2>
        <p class="answer-block">A commercial steel package from Salt River Steel runs from shop drawing review through fabrication, finishing, delivery, and on-site erection. We handle the structural members, the miscellaneous steel, and the connections so your Florence-area commercial project has one source accountable for the steel from start to finish.</p>
        <ul class="sp-included">
          <li><?php echo icon('check', 18); ?> Structural beams &amp; columns</li>
          <li><?php echo icon('check', 18); ?> Mezzanines &amp; equipment platforms</li>
          <li><?php echo icon('check', 18); ?> Entry canopies &amp; awnings</li>
          <li><?php echo icon('check', 18); ?> Steel stairs &amp; handrail</li>
          <li><?php echo icon('check', 18); ?> Storefront &amp; opening framing</li>
          <li><?php echo icon('check', 18); ?> Bollards, lintels &amp; misc. steel</li>
          <li><?php echo icon('check', 18); ?> Shop-drawing coordination</li>
          <li><?php echo icon('check', 18); ?> On-site erection &amp; field welding</li>
        </ul>
      </div>
      <div class="sp-breakdown-img reveal-right">
        <img src="/assets/images/commercial-parking-structure-steelwork-960.webp"
             srcset="/assets/images/commercial-parking-structure-steelwork-480.webp 480w, /assets/images/commercial-parking-structure-steelwork-960.webp 960w, /assets/images/commercial-parking-structure-steelwork-1440.webp 1440w"
             sizes="(max-width: 900px) 100vw, 460px"
             alt="Salt River Steel crew installing steel inside a commercial parking structure in Arizona"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
    </div>
  </div>
</section>

<!-- 5. SIGNATURE — Commercial capabilities -->
<section class="section commercial-caps" aria-label="Commercial steel capabilities">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">what we build</span>
      <h2>What <span class="text-accent">commercial steel work</span> can you handle?</h2>
      <p class="answer-block">Salt River Steel covers the structural and miscellaneous steel most Central Arizona commercial projects need. These are the four capability areas we're brought in for most often — each fabricated in Florence and installed to the drawings and inspection standards your build runs on.</p>
    </div>
    <div class="cap-grid">
      <div class="cap-card reveal-up reveal-delay-1">
        <span class="cap-num">01</span>
        <div class="cap-body">
          <h3><?php echo icon('building-2', 22); ?> Structural Frames</h3>
          <p>Load-bearing beams, columns, and moment connections that carry the building — fabricated to your engineer's stamped design and erected true to the foundation.</p>
        </div>
      </div>
      <div class="cap-card reveal-up reveal-delay-2">
        <span class="cap-num">02</span>
        <div class="cap-body">
          <h3><?php echo icon('hammer', 22); ?> Mezzanines &amp; Platforms</h3>
          <p>Steel mezzanines, equipment platforms, and catwalks engineered for the load and welded to add usable space in the bay you already have.</p>
        </div>
      </div>
      <div class="cap-card reveal-up reveal-delay-1">
        <span class="cap-num">03</span>
        <div class="cap-body">
          <h3><?php echo icon('home', 22); ?> Canopies &amp; Storefronts</h3>
          <p>Entry canopies, awnings, and storefront framing that shape the face of your business and stand up to Arizona sun and wind.</p>
        </div>
      </div>
      <div class="cap-card reveal-up reveal-delay-2">
        <span class="cap-num">04</span>
        <div class="cap-body">
          <h3><?php echo icon('wrench', 22); ?> Stairs, Rails &amp; Misc.</h3>
          <p>Code-conscious steel stairs, handrail, guardrail, bollards, and the miscellaneous metal that ties the whole commercial build together.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 6. PROOF -->
<section class="section sp-proof" aria-label="Why Florence contractors trust Salt River Steel">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <h2>Can you trust the steel to <span class="text-accent">pass inspection?</span></h2>
      <p class="answer-block">Salt River Steel is a licensed, insured steel contractor based in Florence, AZ, fabricating commercial steel from stamped drawings since 2022. General contractors and owners work with us because the fabrication, welding, and erection sit with one accountable local company they can visit — not a distant supplier.</p>
    </div>
    <div class="sp-proof-grid">
      <div class="sp-proof-img reveal-left">
        <img src="/assets/images/commercial-parking-garage-steel-install-960.webp"
             srcset="/assets/images/commercial-parking-garage-steel-install-480.webp 480w, /assets/images/commercial-parking-garage-steel-install-960.webp 960w, /assets/images/commercial-parking-garage-steel-install-1440.webp 1440w"
             sizes="(max-width: 860px) 100vw, 460px"
             alt="Steel installation in progress inside a commercial parking garage, a Salt River Steel commercial project"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
      <div class="reveal-right">
        <ul class="sp-proof-points">
          <li><?php echo icon('badge-check', 20); ?> Licensed &amp; insured Arizona steel contractor</li>
          <li><?php echo icon('map-pin', 20); ?> Local shop at 12356 E Pot O Gold Trail, Florence</li>
          <li><?php echo icon('file-check', 20); ?> Fabricates from stamped structural drawings</li>
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
<section class="section sp-compare" aria-label="Local fabrication compared to distant suppliers">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">the local difference</span>
      <h2>Why not just source steel <span class="text-accent">from a big-city shop?</span></h2>
      <p class="answer-block">You can — but a distant fabricator means premium freight, long lead times, and a hand-off between whoever builds the steel and whoever sets it. Salt River Steel fabricates in Florence and can erect it too, so your commercial steel stays on one accountable local schedule.</p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--them reveal-left">
        <h3><?php echo icon('truck', 22); ?> Distant Steel Supplier</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Premium freight on every fabricated load</li>
          <li><?php echo icon('minus', 18); ?> Long lead times, hard to expedite</li>
          <li><?php echo icon('minus', 18); ?> Fabricator and erector are separate parties</li>
          <li><?php echo icon('minus', 18); ?> No local crew to fix a field problem fast</li>
          <li><?php echo icon('minus', 18); ?> Coordination gaps between shop and site</li>
        </ul>
      </div>
      <div class="compare-col compare-col--us reveal-right">
        <h3><?php echo icon('shield-check', 22); ?> Salt River Steel</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Local pricing, no premium freight</li>
          <li><?php echo icon('check', 18); ?> A firm fabrication and erection schedule</li>
          <li><?php echo icon('check', 18); ?> One source from shop drawing to standing steel</li>
          <li><?php echo icon('check', 18); ?> Florence crew on call for the field</li>
          <li><?php echo icon('check', 18); ?> Fabrication and erection stay coordinated</li>
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
          <img src="/assets/images/<?php echo $m['img']; ?>-960.webp"
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
    <h2 class="reveal-up">Let's put your steel package on a local schedule.</h2>
    <p class="reveal-up reveal-delay-1">Send Salt River Steel your drawings — a single canopy or a full structural frame — and we'll fabricate it in Florence and set it on site. Your commercial estimate is free.</p>
    <div class="sp-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Project Estimate</a>
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

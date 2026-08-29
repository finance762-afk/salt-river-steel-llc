<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   /services/residential-steel-work/index.php — Salt River Steel LLC
   Phase 4. Premium editorial service page. Residential Steel Work.
   ============================================================ */

$service = null;
foreach ($services as $s) { if ($s['slug'] === 'residential-steel-work') { $service = $s; break; } }

$currentPage     = 'services';
$pageTitle       = 'Residential Steel Work Florence AZ | Railings, Stairs & Carports | Salt River Steel';
$pageDescription = 'Custom residential steel fabrication in Florence, AZ — railings, staircases, carports, patio covers, and architectural metalwork. Salt River Steel builds it locally for your home. Free estimates — call (480) 450-6959.';
$canonicalUrl    = $siteUrl . '/services/residential-steel-work/';
$pageCanonical   = $canonicalUrl;
$ogImage         = $siteUrl . '/assets/images/residential-steel-casita-building-og.jpg';
$heroPreloadImage = '';

/* ---------- Service-specific FAQs ---------- */
$faqs = [
    [
        'question' => 'What kinds of residential steel work does Salt River Steel do?',
        'answer'   => 'Salt River Steel fabricates custom residential steelwork for Florence-area homes — interior and exterior railings, steel staircases, carports and patio covers, security doors and window guards, and ornamental and architectural metal. If you want something in steel for your home, we design it, weld it in our Florence shop, and install it.',
    ],
    [
        'question' => 'How much does custom residential steel work cost?',
        'answer'   => 'Cost depends on the piece — a short entry handrail is a modest job, while a full staircase or a carport spanning several vehicles is a larger one. Because Salt River Steel fabricates locally in Florence, you skip out-of-area freight. We give every homeowner a free, itemized quote before any steel is cut — call (480) 450-6959.',
    ],
    [
        'question' => 'Can you match a specific style or design for my home?',
        'answer'   => 'Yes. Salt River Steel builds to your design — bring a photo, a sketch, or an idea and we will fabricate steel that matches your home\'s lines and finish. Because every piece is cut and welded in-house, we can tailor the pattern, profile, and coating instead of forcing a stock part to fit.',
    ],
    [
        'question' => 'Will steel railings and carports handle the Arizona climate?',
        'answer'   => 'They will when they are finished for the desert. Salt River Steel specs corrosion-resistant coatings and heat-stable construction for Central Arizona sun and monsoon moisture, so your railings, carport, or patio cover resist rust and stay true through the seasons. We recommend the right finish for your exposure.',
    ],
    [
        'question' => 'Do you build steel carports and patio covers?',
        'answer'   => 'Yes. Steel carports, patio covers, and shade structures are a common residential job for us — engineered to span your driveway or patio, anchored for Arizona wind, and finished to match the home. Tell us the footprint and we will fabricate the structure around it.',
    ],
    [
        'question' => 'Do you install the steelwork or just build it?',
        'answer'   => 'Both. Salt River Steel fabricates your residential steel in Florence and handles on-site installation — mounting railings, setting staircases, and anchoring carports and covers. You can also arrange pickup if you prefer to install yourself. Let us know your preference with your estimate request.',
    ],
];
$faqSchema = generateFAQSchema($faqs);

/* ---------- Service schema ---------- */
$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'Service',
    '@id'      => $siteUrl . '/services/residential-steel-work/#service-residential-steel-work',
    'name'     => 'Residential Steel Work',
    'serviceType' => 'Custom residential steel fabrication and installation',
    'description' => 'Custom residential steel fabrication by Salt River Steel — railings, staircases, carports, patio covers, security doors, and architectural metalwork for Florence, AZ and Central Arizona homes.',
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
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Residential Steel Work', 'item' => $canonicalUrl],
    ],
];

/* ---------- "Other services" (exclude current) ---------- */
$otherServices = array_values(array_filter($services, fn($s) => $s['slug'] !== 'residential-steel-work'));
$otherMedia = [
    'custom-steel-gates'            => ['img' => 'custom-steel-ranch-entry-gate',            'icon' => 'shield-check', 'alt' => 'Custom steel driveway gate fabricated by Salt River Steel in Florence, AZ'],
    'steel-fencing'                 => ['img' => 'steel-ranch-rail-fence-florence',                 'icon' => 'ruler',        'alt' => 'Steel ranch-rail fencing on a Florence-area desert property'],
    'commercial-steel-construction' => ['img' => 'commercial-steel-building-construction', 'icon' => 'building-2',   'alt' => 'Commercial steel building near Florence, AZ'],
    'industrial-steel-fabrication'  => ['img' => 'steel-frame-erection-red-iron',  'icon' => 'hammer',       'alt' => 'Industrial steel fabrication near Florence, AZ'],
];
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo json_encode($serviceSchema, JSON_UNESCAPED_SLASHES); ?></script>
<script type="application/ld+json"><?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES); ?></script>

<style>
/* ============================================================
   Service page — Residential Steel Work (Premium editorial)
   Token-driven; raw rgba reserved for glass/overlay only.
   Signature block: .res-apps application list with hairline rows (unique to this page).
   ============================================================ */
:root {
  --sp-line: rgba(var(--color-primary-rgb), 0.10);
  --sp-tint-1: rgba(var(--color-primary-rgb), 0.06);
  --sp-tint-2: rgba(var(--color-accent-rgb), 0.09);
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

/* ---------- SIGNATURE: Residential applications hairline list (unique to this page) ---------- */
.res-apps { background: var(--color-light); }
.res-apps-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0; max-width: 1040px; margin: 0 auto; background: var(--color-white); border: 1px solid var(--sp-line); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); }
@media (max-width: 860px) { .res-apps-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 520px) { .res-apps-grid { grid-template-columns: 1fr; } }
.res-app {
  padding: var(--space-8) var(--space-6); border-right: 1px solid var(--sp-line); border-bottom: 1px solid var(--sp-line);
  transition: background var(--transition-base);
}
.res-app:hover { background: var(--sp-tint-1); }
.res-app__chip { width: 46px; height: 46px; border-radius: var(--radius-full); background: var(--sp-tint-2); color: var(--color-accent); display: flex; align-items: center; justify-content: center; margin-bottom: var(--space-4); }
.res-app h3 { font-size: var(--font-size-base); color: var(--color-primary); margin-bottom: var(--space-2); }
.res-app p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; }

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
.compare-col--us { background: linear-gradient(160deg, rgba(var(--color-primary-rgb),0.06), rgba(var(--color-accent-rgb),0.10)); border-color: var(--color-accent); }
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
.sp-cta::after { content: ""; position: absolute; right: -60px; top: -60px; width: 320px; height: 320px; border-radius: 50%; background: rgba(var(--color-accent-rgb),0.18); pointer-events: none; }
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
      <li aria-current="page">Residential Steel Work</li>
    </ol>
  </div>
</nav>

<!-- 1. HERO -->
<section class="sp-hero" aria-label="Residential steel work in Florence, Arizona">
  <img class="sp-hero-bg"
       src="/assets/images/residential-steel-casita-building-960.webp"
       srcset="/assets/images/residential-steel-casita-building-480.webp 480w, /assets/images/residential-steel-casita-building-960.webp 960w, /assets/images/residential-steel-casita-building-1440.webp 1440w"
       sizes="100vw"
       alt="Residential corrugated-steel building with wood accents built by Salt River Steel in Central Arizona"
       width="1440" height="1080" loading="eager" fetchpriority="high" decoding="async">
  <div class="container">
    <div class="sp-hero-inner">
      <span class="eyebrow-label">Residential Steel Work · Florence, AZ</span>
      <h1>Custom steel for your home, <span class="text-accent">built to your design</span></h1>
      <p class="hero-answer">Salt River Steel designs, fabricates, and installs custom residential steelwork for Florence and Central Arizona homes — railings and staircases, carports and patio covers, security doors, and architectural metal. Every piece is cut and welded in our Florence shop to match your home's style and stand up to the desert climate.</p>
      <div class="sp-hero-actions">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Estimate</a>
        <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      </div>
      <div class="sp-hero-trust">
        <span><?php echo icon('shield-check', 18); ?> Licensed &amp; Insured</span>
        <span><?php echo icon('map-pin', 18); ?> Florence-Based Fabrication</span>
        <span><?php echo icon('pen-tool', 18); ?> Built to Your Design</span>
      </div>
    </div>
  </div>
</section>

<!-- 2. PROBLEM STATEMENT -->
<section class="section sp-problem" aria-label="Signs you need custom residential steel">
  <div class="container">
    <p class="sp-pullquote reveal-up">A home upgrade in wood or aluminum looks fine on day one — <span class="text-accent">steel is what still looks right ten Arizona summers later.</span></p>
    <div class="signs-bento">
      <div class="sign-card reveal-up reveal-delay-1">
        <div class="sign-card__icon"><?php echo icon('pen-tool', 24); ?></div>
        <h3>Stock parts won't fit</h3>
        <p>Odd stair rises, curved patios, and custom entries rarely match off-the-shelf railings or covers. Custom steel is built to your exact space instead of forced to fit.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-2">
        <div class="sign-card__icon"><?php echo icon('home', 24); ?></div>
        <h3>You want it to last</h3>
        <p>Wood rots and cheap aluminum bends. Steel railings, carports, and covers finished for the desert hold their shape and their look through Arizona sun and monsoon.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-3">
        <div class="sign-card__icon"><?php echo icon('shield-check', 24); ?></div>
        <h3>You want real security</h3>
        <p>Steel security doors and window guards add protection that also looks intentional — fabricated to your openings and finished to match the home.</p>
      </div>
    </div>
  </div>
</section>

<!-- 3. EXPERT POSITIONING -->
<section class="section sp-expert" aria-label="Why Salt River Steel for residential steelwork">
  <div class="container">
    <div class="sp-expert-grid">
      <div class="sp-bigstat reveal-left">
        <span class="big">100%</span>
        <span class="cap">Custom-Built<br>In Our Florence Shop</span>
      </div>
      <div class="sp-expert-copy reveal-right">
        <span class="eyebrow-label">Local Fabrication Advantage</span>
        <h2>Why build with <span class="text-accent">Salt River Steel?</span></h2>
        <p class="answer-block">Salt River Steel fabricates every residential piece in its own Florence shop rather than reselling stock parts, so your railing, staircase, or carport is cut and welded to your home instead of trimmed to fit. You work directly with the fabricator, and everything is finished for the Central Arizona climate.</p>
        <ul class="sp-diff-list">
          <li><span class="ic"><?php echo icon('pen-tool', 20); ?></span><div><strong>Built to your design</strong><p>Bring a photo, a sketch, or an idea — we fabricate steel that matches your home's lines, not a catalog part.</p></div></li>
          <li><span class="ic"><?php echo icon('shield-check', 20); ?></span><div><strong>Finished for the desert</strong><p>Corrosion-resistant coatings and heat-stable construction chosen for Central Arizona sun and monsoon moisture.</p></div></li>
          <li><span class="ic"><?php echo icon('users', 20); ?></span><div><strong>You talk to the fabricator</strong><p>Straight answers on design, finish, and installation directly from the crew building your steel.</p></div></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4. SERVICE BREAKDOWN -->
<section class="section sp-breakdown" aria-label="What's included in residential steel work">
  <div class="container">
    <div class="sp-breakdown-grid">
      <div class="reveal-left">
        <span class="eyebrow-label">What's Included</span>
        <h2>What can <span class="text-accent">Salt River Steel</span> build for your home?</h2>
        <p class="answer-block">From a single entry handrail to a carport spanning the driveway, Salt River Steel handles residential steel end to end — design, fabrication, finishing, and installation. We build the piece, coat it for the desert, and mount it, so one local shop is accountable for the whole job.</p>
        <ul class="sp-included">
          <li><?php echo icon('check', 18); ?> Interior &amp; exterior railings</li>
          <li><?php echo icon('check', 18); ?> Steel staircases &amp; treads</li>
          <li><?php echo icon('check', 18); ?> Carports &amp; shade structures</li>
          <li><?php echo icon('check', 18); ?> Patio &amp; ramada covers</li>
          <li><?php echo icon('check', 18); ?> Security doors &amp; window guards</li>
          <li><?php echo icon('check', 18); ?> Ornamental &amp; architectural metal</li>
          <li><?php echo icon('check', 18); ?> Corrosion-resistant finishing</li>
          <li><?php echo icon('check', 18); ?> On-site installation</li>
        </ul>
      </div>
      <div class="sp-breakdown-img reveal-right">
        <img src="/assets/images/residential-patio-cover-pipe-rail-960.webp"
             srcset="/assets/images/residential-patio-cover-pipe-rail-480.webp 480w, /assets/images/residential-patio-cover-pipe-rail-960.webp 960w, /assets/images/residential-patio-cover-pipe-rail-1440.webp 1440w"
             sizes="(max-width: 900px) 100vw, 460px"
             alt="Steel patio cover and white pipe-rail fencing on a Central Arizona home by Salt River Steel"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
    </div>
  </div>
</section>

<!-- 5. SIGNATURE — Residential applications -->
<section class="section res-apps" aria-label="Residential steel applications">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">around your home</span>
      <h2>Where does <span class="text-accent">custom steel</span> work best at home?</h2>
      <p class="answer-block">Salt River Steel builds steel for the spots where homeowners want strength and a clean look that lasts. These are the residential applications Florence-area homeowners ask us for most — each one fabricated to your home and finished for the desert.</p>
    </div>
    <div class="res-apps-grid">
      <div class="res-app reveal-up reveal-delay-1">
        <div class="res-app__chip"><?php echo icon('home', 22); ?></div>
        <h3>Railings &amp; Handrail</h3>
        <p>Interior stair rails, balcony guards, and exterior entry handrail built to code and to your home's style.</p>
      </div>
      <div class="res-app reveal-up reveal-delay-2">
        <div class="res-app__chip"><?php echo icon('chevron-up', 22); ?></div>
        <h3>Staircases</h3>
        <p>Steel stair stringers and treads — straight runs or custom shapes — fabricated for the rise and run you have.</p>
      </div>
      <div class="res-app reveal-up reveal-delay-3">
        <div class="res-app__chip"><?php echo icon('car', 22); ?></div>
        <h3>Carports</h3>
        <p>Steel carports engineered to span your driveway and anchored to stand up to Arizona wind and sun.</p>
      </div>
      <div class="res-app reveal-up reveal-delay-1">
        <div class="res-app__chip"><?php echo icon('building', 22); ?></div>
        <h3>Patio &amp; Ramada Covers</h3>
        <p>Shade structures and patio covers that add livable outdoor space and match the home's finish.</p>
      </div>
      <div class="res-app reveal-up reveal-delay-2">
        <div class="res-app__chip"><?php echo icon('shield-check', 22); ?></div>
        <h3>Security Doors &amp; Guards</h3>
        <p>Steel security doors and window guards fabricated to your openings for protection that looks intentional.</p>
      </div>
      <div class="res-app reveal-up reveal-delay-3">
        <div class="res-app__chip"><?php echo icon('pen-tool', 22); ?></div>
        <h3>Ornamental Metal</h3>
        <p>Decorative and architectural steel — accents, panels, and one-off pieces built from your design.</p>
      </div>
    </div>
  </div>
</section>

<!-- 6. PROOF -->
<section class="section sp-proof" aria-label="Why Florence homeowners trust Salt River Steel">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <h2>Can you trust the work to <span class="text-accent">hold up?</span></h2>
      <p class="answer-block">Salt River Steel is a licensed, insured steel fabricator based in Florence, AZ, building custom steel for local homes since 2022. Homeowners work with us because the design, welding, and installation all sit with one accountable local shop they can visit at 12356 E Pot O Gold Trail — not a distant supplier.</p>
    </div>
    <div class="sp-proof-grid">
      <div class="sp-proof-img reveal-left">
        <img src="/assets/images/pool-ramada-steel-shade-structure-960.webp"
             srcset="/assets/images/pool-ramada-steel-shade-structure-480.webp 480w, /assets/images/pool-ramada-steel-shade-structure-960.webp 960w, /assets/images/pool-ramada-steel-shade-structure-1440.webp 1440w"
             sizes="(max-width: 860px) 100vw, 460px"
             alt="Custom steel pool ramada shade structure built by Salt River Steel at an Arizona home"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
      <div class="reveal-right">
        <ul class="sp-proof-points">
          <li><?php echo icon('badge-check', 20); ?> Licensed &amp; insured Arizona steel fabricator</li>
          <li><?php echo icon('map-pin', 20); ?> Local shop at 12356 E Pot O Gold Trail, Florence</li>
          <li><?php echo icon('pen-tool', 20); ?> Every piece designed and welded in-house</li>
          <li><?php echo icon('calendar', 20); ?> Serving Central Arizona homes since <?php echo $yearEstablished; ?></li>
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
<section class="section sp-compare" aria-label="Custom steel compared to stock alternatives">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">the local difference</span>
      <h2>Why not just buy a <span class="text-accent">stock railing or cover?</span></h2>
      <p class="answer-block">You can — but a big-box railing or a kit carport comes in fixed sizes, thinner material, and finishes not made for the desert. Salt River Steel fabricates in Florence to your exact space, so the piece fits, lasts, and matches your home.</p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--them reveal-left">
        <h3><?php echo icon('truck', 22); ?> Stock / Kit Product</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Fixed sizes forced onto your space</li>
          <li><?php echo icon('minus', 18); ?> Thinner material that bends and fades</li>
          <li><?php echo icon('minus', 18); ?> Finishes not specced for Arizona sun</li>
          <li><?php echo icon('minus', 18); ?> Self-install or a separate installer</li>
          <li><?php echo icon('minus', 18); ?> No local shop to adjust or repair it</li>
        </ul>
      </div>
      <div class="compare-col compare-col--us reveal-right">
        <h3><?php echo icon('shield-check', 22); ?> Salt River Steel</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Built to your exact space and design</li>
          <li><?php echo icon('check', 18); ?> Heavier steel welded to last</li>
          <li><?php echo icon('check', 18); ?> Corrosion-resistant, desert-ready finish</li>
          <li><?php echo icon('check', 18); ?> Fabrication and installation from one shop</li>
          <li><?php echo icon('check', 18); ?> A local crew you can call after the job</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 8. FAQ -->
<section class="section sp-faq" aria-label="Residential steel work questions">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="eyebrow-label">Homeowner Questions</span>
      <h2>Common questions about <span class="text-accent">residential steel</span></h2>
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
<!-- Recent work — client photos from the Salt River Steel pool -->
<section class="section sp-gallery" aria-label="Recent residential steel work by Salt River Steel">
    <div class="container">
        <div class="section-title reveal-up">
            <span class="eyebrow-label">Recent Work</span>
            <h2>Residential steel we've <span class="text-accent">built recently</span></h2>
        </div>
        <div class="sp-gallery-grid" data-p1-dynamic>
            <figure class="sp-gallery-item reveal-up reveal-delay-1">
                <img src="/assets/images/pool-ramada-pavers-arizona-960.webp" srcset="/assets/images/pool-ramada-pavers-arizona-480.webp 480w, /assets/images/pool-ramada-pavers-arizona-960.webp 960w, /assets/images/pool-ramada-pavers-arizona-1440.webp 1440w" sizes="(max-width: 900px) 100vw, 520px" alt="Steel pool ramada over a paver patio built by Salt River Steel at an Arizona home" width="960" height="720" loading="lazy" decoding="async">
                <figcaption>Pool ramada over pavers</figcaption>
            </figure>
            <figure class="sp-gallery-item reveal-up reveal-delay-2">
                <img src="/assets/images/residential-steel-garage-driveway-960.webp" srcset="/assets/images/residential-steel-garage-driveway-480.webp 480w, /assets/images/residential-steel-garage-driveway-960.webp 960w, /assets/images/residential-steel-garage-driveway-1440.webp 1440w" sizes="(max-width: 900px) 100vw, 380px" alt="Residential steel-sided garage and driveway built by Salt River Steel in Central Arizona" width="960" height="720" loading="lazy" decoding="async">
                <figcaption>Steel-sided garage and drive</figcaption>
            </figure>
            <figure class="sp-gallery-item reveal-up reveal-delay-3">
                <img src="/assets/images/standing-seam-metal-roof-panels-960.webp" srcset="/assets/images/standing-seam-metal-roof-panels-480.webp 480w, /assets/images/standing-seam-metal-roof-panels-960.webp 960w, /assets/images/standing-seam-metal-roof-panels-1440.webp 1440w" sizes="(max-width: 900px) 100vw, 380px" alt="Standing-seam metal roof panels being installed by Salt River Steel" width="960" height="720" loading="lazy" decoding="async">
                <figcaption>Standing-seam metal roof panels</figcaption>
            </figure>
        </div>
    </div>
</section>

<section class="section sp-cta" aria-label="Request a residential steel estimate">
  <div class="container">
    <h2 class="reveal-up">Let's build the steel your home has been missing.</h2>
    <p class="reveal-up reveal-delay-1">Tell Salt River Steel what you have in mind — a railing, a staircase, a carport, or something one-of-a-kind — and we'll design, quote, and fabricate it right here in Florence. Your estimate is free.</p>
    <div class="sp-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Estimate</a>
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

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   /services/industrial-steel-fabrication/index.php — Salt River Steel LLC
   Phase 4. Premium editorial service page. Industrial Steel Fabrication.
   ============================================================ */

$service = null;
foreach ($services as $s) { if ($s['slug'] === 'industrial-steel-fabrication') { $service = $s; break; } }

$currentPage     = 'services';
$pageTitle       = 'Industrial Steel Fabrication Florence AZ | Heavy Welding & Fabrication | Salt River Steel';
$pageDescription = 'Heavy-duty industrial steel fabrication and welding in Florence, AZ — structural, plate, and equipment work built for demanding job-site conditions. Salt River Steel fabricates it locally. Free estimates — call (480) 450-6959.';
$canonicalUrl    = $siteUrl . '/services/industrial-steel-fabrication/';
$pageCanonical   = $canonicalUrl;
$ogImage         = $siteUrl . '/assets/images/steel-frame-erection-red-iron-og.jpg';
$heroPreloadImage = '';

/* ---------- Service-specific FAQs ---------- */
$faqs = [
    [
        'question' => 'What kinds of industrial steel fabrication does Salt River Steel do?',
        'answer'   => 'Salt River Steel handles heavy-duty industrial fabrication for Florence-area operations — structural supports and frames, plate and gusset work, equipment stands and skids, guarding and platforms, and custom weldments built to demanding specs. If your site needs steel fabricated to take real load and abuse, we build it in our Florence shop.',
    ],
    [
        'question' => 'Can you fabricate to spec drawings and tolerances?',
        'answer'   => 'Yes. Salt River Steel fabricates from your prints, spec sheets, or a sample part, holding the tolerances and weld standards your application calls for. Bring us the drawing — or the broken part you need duplicated — and we will build steel that meets the requirement, not a close-enough approximation.',
    ],
    [
        'question' => 'Do you handle heavy plate and structural material?',
        'answer'   => 'Yes. Heavy plate, structural shapes, and thick-wall material are routine for us. Salt River Steel cuts, forms, and welds heavy-gauge steel for supports, bases, and weldments that have to carry serious load in industrial and agricultural settings across Central Arizona.',
    ],
    [
        'question' => 'Can you do on-site or mobile industrial welding?',
        'answer'   => 'Salt River Steel fabricates in its Florence shop and can arrange on-site work for repairs and installs that can\'t come to the shop. Tell us whether the job needs to be built in-house and delivered, or welded in place at your facility, and we will plan the work around it.',
    ],
    [
        'question' => 'How fast can you turn around an industrial fabrication job?',
        'answer'   => 'Turnaround depends on material, complexity, and load, but fabricating locally in Florence means no waiting on out-of-area freight or a shop that treats your job as one of hundreds. We give you a firm schedule with the quote, and we understand that downtime on a broken support or stand costs you money.',
    ],
    [
        'question' => 'Are you licensed and insured for industrial work?',
        'answer'   => 'Yes. Salt River Steel is a licensed, insured steel fabricator based in Florence, AZ. Industrial and agricultural operations work with us because the fabrication and welding sit with one accountable local shop they can visit at 12356 E Pot O Gold Trail — not a distant vendor.',
    ],
];
$faqSchema = generateFAQSchema($faqs);

/* ---------- Service schema ---------- */
$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'Service',
    '@id'      => $siteUrl . '/services/industrial-steel-fabrication/#service-industrial-steel-fabrication',
    'name'     => 'Industrial Steel Fabrication',
    'serviceType' => 'Heavy-duty industrial steel fabrication and welding',
    'description' => 'Heavy-duty industrial steel fabrication and welding by Salt River Steel — structural supports, plate work, equipment stands, guarding, and custom weldments for Florence, AZ and Central Arizona operations.',
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
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Industrial Steel Fabrication', 'item' => $canonicalUrl],
    ],
];

/* ---------- "Other services" (exclude current) ---------- */
$otherServices = array_values(array_filter($services, fn($s) => $s['slug'] !== 'industrial-steel-fabrication'));
$otherMedia = [
    'custom-steel-gates'            => ['img' => 'custom-steel-ranch-entry-gate',            'icon' => 'shield-check', 'alt' => 'Custom steel driveway gate fabricated by Salt River Steel in Florence, AZ'],
    'steel-fencing'                 => ['img' => 'steel-ranch-rail-fence-florence',                 'icon' => 'ruler',        'alt' => 'Steel ranch-rail fencing on a Florence-area desert property'],
    'commercial-steel-construction' => ['img' => 'commercial-steel-building-construction', 'icon' => 'building-2',   'alt' => 'Commercial steel building near Florence, AZ'],
    'residential-steel-work'        => ['img' => 'residential-steel-casita-building',        'icon' => 'home',         'alt' => 'Residential steel work in Central Arizona'],
];
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo json_encode($serviceSchema, JSON_UNESCAPED_SLASHES); ?></script>
<script type="application/ld+json"><?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES); ?></script>

<style>
/* ============================================================
   Service page — Industrial Steel Fabrication (Premium editorial)
   Token-driven; raw rgba reserved for glass/overlay only.
   Signature block: .ind-caps capabilities spec panel (unique to this page).
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

/* ---------- SIGNATURE: Industrial capabilities spec panel (unique to this page) ---------- */
.ind-caps { background: var(--color-dark-alt, #14202c); position: relative; overflow: hidden; }
.ind-caps .sp-section-head h2 { color: var(--color-white); }
.ind-caps .sp-section-head .answer-block { background: rgba(255,255,255,0.06); border-left: 4px solid var(--color-accent); color: rgba(255,255,255,0.9); padding: var(--space-5) var(--space-6); border-radius: var(--radius-sm); }
.ind-spec { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1px; max-width: 1000px; margin: 0 auto; background: rgba(255,255,255,0.10); border: 1px solid rgba(255,255,255,0.12); border-radius: var(--radius-lg); overflow: hidden; }
@media (max-width: 640px) { .ind-spec { grid-template-columns: 1fr; } }
.ind-spec-row { background: var(--color-dark); padding: var(--space-7) var(--space-7); display: flex; gap: var(--space-5); align-items: flex-start; transition: background var(--transition-base); }
.ind-spec-row:hover { background: #0f1a24; }
.ind-spec-row__ic { flex-shrink: 0; width: 44px; height: 44px; border-radius: var(--radius-md); background: rgba(6,182,212,0.14); color: var(--color-accent); display: flex; align-items: center; justify-content: center; }
.ind-spec-row__label { display: block; font-size: var(--font-size-xs, 0.75rem); text-transform: uppercase; letter-spacing: 1.5px; color: var(--color-accent); margin-bottom: var(--space-2); font-weight: 700; }
.ind-spec-row h3 { font-size: var(--font-size-lg); color: var(--color-white); margin-bottom: var(--space-2); }
.ind-spec-row p { margin: 0; color: rgba(255,255,255,0.78); font-size: var(--font-size-sm); line-height: 1.6; }

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
      <li aria-current="page">Industrial Steel Fabrication</li>
    </ol>
  </div>
</nav>

<!-- 1. HERO -->
<section class="sp-hero" aria-label="Industrial steel fabrication in Florence, Arizona">
  <img class="sp-hero-bg"
       src="/assets/images/steel-frame-erection-red-iron-960.webp"
       srcset="/assets/images/steel-frame-erection-red-iron-480.webp 480w, /assets/images/steel-frame-erection-red-iron-960.webp 960w, /assets/images/steel-frame-erection-red-iron-1440.webp 1440w"
       sizes="100vw"
       alt="Red-iron steel building frame being erected by Salt River Steel in Florence, Arizona"
       width="1440" height="1080" loading="eager" fetchpriority="high" decoding="async">
  <div class="container">
    <div class="sp-hero-inner">
      <span class="eyebrow-label">Industrial Steel Fabrication · Florence, AZ</span>
      <h1>Heavy steel, <span class="text-accent">built to take a beating</span></h1>
      <p class="hero-answer">Salt River Steel handles heavy-duty industrial steel fabrication and welding for Florence and Central Arizona operations — structural supports, plate and gusset work, equipment stands, guarding, and custom weldments. We fabricate from your prints or a sample part in our Florence shop, holding the tolerances and weld standards your job-site demands.</p>
      <div class="sp-hero-actions">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Fabrication Quote</a>
        <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      </div>
      <div class="sp-hero-trust">
        <span><?php echo icon('shield-check', 18); ?> Licensed &amp; Insured</span>
        <span><?php echo icon('map-pin', 18); ?> Florence-Based Fabrication</span>
        <span><?php echo icon('file-check', 18); ?> Fabricates to Spec</span>
      </div>
    </div>
  </div>
</section>

<!-- 2. PROBLEM STATEMENT -->
<section class="section sp-problem" aria-label="Signs you need industrial steel fabrication">
  <div class="container">
    <p class="sp-pullquote reveal-up">When a support cracks or a stand fails, the clock is running — <span class="text-accent">and a distant shop's lead time is downtime you can't afford.</span></p>
    <div class="signs-bento">
      <div class="sign-card reveal-up reveal-delay-1">
        <div class="sign-card__icon"><?php echo icon('hammer', 24); ?></div>
        <h3>Stock parts can't take the load</h3>
        <p>Off-the-shelf supports and stands aren't built for real industrial abuse. Custom heavy-gauge fabrication is engineered for the load your operation actually puts on it.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-2">
        <div class="sign-card__icon"><?php echo icon('clock', 24); ?></div>
        <h3>Downtime is costing you</h3>
        <p>A broken weldment idles equipment and crews. A local Florence shop turns the repair or replacement around fast instead of leaving you waiting on freight.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-3">
        <div class="sign-card__icon"><?php echo icon('file-check', 24); ?></div>
        <h3>The spec has to be exact</h3>
        <p>Guessed dimensions and close-enough welds fail under load. We fabricate to your prints, spec sheets, or sample part so the piece meets the requirement.</p>
      </div>
    </div>
  </div>
</section>

<!-- 3. EXPERT POSITIONING -->
<section class="section sp-expert" aria-label="Why Salt River Steel for industrial fabrication">
  <div class="container">
    <div class="sp-expert-grid">
      <div class="sp-bigstat reveal-left">
        <span class="big">Heavy</span>
        <span class="cap">Plate &amp; Structural<br>Fabrication</span>
      </div>
      <div class="sp-expert-copy reveal-right">
        <span class="eyebrow-label">Local Fabrication Advantage</span>
        <h2>Why fabricate with <span class="text-accent">Salt River Steel?</span></h2>
        <p class="answer-block">Salt River Steel fabricates heavy industrial steel in its own Florence shop, so your supports, stands, and weldments are cut, formed, and welded under one roof to your spec. That means no out-of-area freight, a fast turnaround when downtime is on the line, and a local crew you can hand a broken part and a deadline.</p>
        <ul class="sp-diff-list">
          <li><span class="ic"><?php echo icon('hammer', 20); ?></span><div><strong>Heavy-gauge capability</strong><p>Plate, structural shapes, and thick-wall material cut, formed, and welded for real industrial load.</p></div></li>
          <li><span class="ic"><?php echo icon('file-check', 20); ?></span><div><strong>Fabricated to spec</strong><p>We build from your prints, spec sheets, or a sample part — tolerances and weld standards held to the application.</p></div></li>
          <li><span class="ic"><?php echo icon('clock', 20); ?></span><div><strong>Fast local turnaround</strong><p>No freight wait. A Florence shop that understands downtime and quotes a firm schedule.</p></div></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4. SERVICE BREAKDOWN -->
<section class="section sp-breakdown" aria-label="What's included in industrial steel fabrication">
  <div class="container">
    <div class="sp-breakdown-grid">
      <div class="reveal-left">
        <span class="eyebrow-label">What's Included</span>
        <h2>What can <span class="text-accent">Salt River Steel</span> fabricate for your operation?</h2>
        <p class="answer-block">Salt River Steel builds the heavy, load-bearing steel industrial and agricultural sites depend on — supports, stands, guarding, and custom weldments. We cut, form, weld, and finish the piece in Florence and coordinate delivery or on-site work, so one local shop owns the job from print to installed steel.</p>
        <ul class="sp-included">
          <li><?php echo icon('check', 18); ?> Structural supports &amp; frames</li>
          <li><?php echo icon('check', 18); ?> Heavy plate &amp; gusset work</li>
          <li><?php echo icon('check', 18); ?> Equipment stands &amp; skids</li>
          <li><?php echo icon('check', 18); ?> Machine guarding &amp; railing</li>
          <li><?php echo icon('check', 18); ?> Platforms &amp; catwalks</li>
          <li><?php echo icon('check', 18); ?> Custom weldments to spec</li>
          <li><?php echo icon('check', 18); ?> Part duplication &amp; repair</li>
          <li><?php echo icon('check', 18); ?> Delivery or on-site fabrication</li>
        </ul>
      </div>
      <div class="sp-breakdown-img reveal-right">
        <img src="/assets/images/steel-building-frame-interior-lifts-960.webp"
             srcset="/assets/images/steel-building-frame-interior-lifts-480.webp 480w, /assets/images/steel-building-frame-interior-lifts-960.webp 960w, /assets/images/steel-building-frame-interior-lifts-1440.webp 1440w"
             sizes="(max-width: 900px) 100vw, 460px"
             alt="Interior of a steel building frame with scissor lifts during construction by Salt River Steel"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
    </div>
  </div>
</section>

<!-- 5. SIGNATURE — Industrial capabilities spec -->
<section class="section ind-caps" aria-label="Industrial fabrication capabilities">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">shop capabilities</span>
      <h2>What can the <span class="text-accent">Florence shop</span> handle?</h2>
      <p class="answer-block">Salt River Steel's Florence shop is set up for heavy industrial work — the materials, processes, applications, and finishes below cover what Central Arizona operations bring us most. Have a job outside this list? Call and we'll tell you straight whether we can build it.</p>
    </div>
    <div class="ind-spec">
      <div class="ind-spec-row reveal-up reveal-delay-1">
        <div class="ind-spec-row__ic"><?php echo icon('hammer', 22); ?></div>
        <div>
          <span class="ind-spec-row__label">Materials</span>
          <h3>Heavy Plate &amp; Structural</h3>
          <p>Plate, structural shapes, tube, and thick-wall stock cut and formed for load-bearing industrial work.</p>
        </div>
      </div>
      <div class="ind-spec-row reveal-up reveal-delay-2">
        <div class="ind-spec-row__ic"><?php echo icon('wrench', 22); ?></div>
        <div>
          <span class="ind-spec-row__label">Processes</span>
          <h3>Cut, Form &amp; Weld</h3>
          <p>In-house cutting, forming, and heavy welding to hold the tolerances and weld standards your spec calls for.</p>
        </div>
      </div>
      <div class="ind-spec-row reveal-up reveal-delay-1">
        <div class="ind-spec-row__ic"><?php echo icon('building-2', 22); ?></div>
        <div>
          <span class="ind-spec-row__label">Applications</span>
          <h3>Supports, Stands &amp; Guarding</h3>
          <p>Equipment stands, skids, structural supports, machine guarding, platforms, and custom weldments.</p>
        </div>
      </div>
      <div class="ind-spec-row reveal-up reveal-delay-2">
        <div class="ind-spec-row__ic"><?php echo icon('paint-bucket', 22); ?></div>
        <div>
          <span class="ind-spec-row__label">Finishes</span>
          <h3>Desert-Ready Coatings</h3>
          <p>Corrosion-resistant finishes chosen for Central Arizona heat, dust, and monsoon moisture.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 6. PROOF -->
<section class="section sp-proof" aria-label="Why Florence operations trust Salt River Steel">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <h2>Can you trust the weldment to <span class="text-accent">hold under load?</span></h2>
      <p class="answer-block">Salt River Steel is a licensed, insured steel fabricator based in Florence, AZ, building heavy industrial steel since 2022. Operations work with us because the fabrication and welding sit with one accountable local shop they can visit at 12356 E Pot O Gold Trail — not a distant vendor who never sees the job site.</p>
    </div>
    <div class="sp-proof-grid">
      <div class="sp-proof-img reveal-left">
        <img src="/assets/images/steel-canopy-structure-scissor-lifts-960.webp"
             srcset="/assets/images/steel-canopy-structure-scissor-lifts-480.webp 480w, /assets/images/steel-canopy-structure-scissor-lifts-960.webp 960w, /assets/images/steel-canopy-structure-scissor-lifts-1440.webp 1440w"
             sizes="(max-width: 860px) 100vw, 460px"
             alt="Steel canopy structure under construction with scissor lifts, fabricated by Salt River Steel"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
      <div class="reveal-right">
        <ul class="sp-proof-points">
          <li><?php echo icon('badge-check', 20); ?> Licensed &amp; insured Arizona steel fabricator</li>
          <li><?php echo icon('map-pin', 20); ?> Local shop at 12356 E Pot O Gold Trail, Florence</li>
          <li><?php echo icon('hammer', 20); ?> Heavy plate and structural welding in-house</li>
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
<section class="section sp-compare" aria-label="Local fabrication compared to distant vendors">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">the local difference</span>
      <h2>Why not just order the part <span class="text-accent">from a distant vendor?</span></h2>
      <p class="answer-block">You can — but a distant vendor means freight, lead time, and no one who has seen your equipment. Salt River Steel fabricates in Florence, so you can hand us the broken part, get a firm schedule, and keep downtime short.</p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--them reveal-left">
        <h3><?php echo icon('truck', 22); ?> Distant Vendor</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Freight added to every fabricated part</li>
          <li><?php echo icon('minus', 18); ?> Long lead times while downtime runs</li>
          <li><?php echo icon('minus', 18); ?> Never sees your equipment or site</li>
          <li><?php echo icon('minus', 18); ?> Hard to duplicate a part from a sample</li>
          <li><?php echo icon('minus', 18); ?> No local crew for on-site repair</li>
        </ul>
      </div>
      <div class="compare-col compare-col--us reveal-right">
        <h3><?php echo icon('shield-check', 22); ?> Salt River Steel</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Local pricing, no premium freight</li>
          <li><?php echo icon('check', 18); ?> Fast turnaround on a firm schedule</li>
          <li><?php echo icon('check', 18); ?> A shop you can visit and talk to</li>
          <li><?php echo icon('check', 18); ?> Duplicates a part from your sample</li>
          <li><?php echo icon('check', 18); ?> On-site fabrication when the job needs it</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 8. FAQ -->
<section class="section sp-faq" aria-label="Industrial steel fabrication questions">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="eyebrow-label">Fabrication Questions</span>
      <h2>Common questions about <span class="text-accent">industrial fabrication</span></h2>
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
<section class="section sp-cta" aria-label="Request an industrial fabrication quote">
  <div class="container">
    <h2 class="reveal-up">Let's get your steel fabricated and back to work.</h2>
    <p class="reveal-up reveal-delay-1">Bring Salt River Steel a print, a spec, or the broken part itself — we'll quote it, fabricate it in Florence, and get you a firm schedule so downtime stays short. Your quote is free.</p>
    <div class="sp-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Fabrication Quote</a>
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

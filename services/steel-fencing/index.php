<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   /services/steel-fencing/index.php — Salt River Steel LLC
   Phase 4. Premium editorial service page. Steel Fencing.
   ============================================================ */

$currentPage     = 'services';
$pageTitle       = 'Steel Fencing Florence AZ | Ranch, Privacy & Security Fence | Salt River Steel';
$pageDescription = 'Steel and wrought-iron fencing for Florence, AZ homes, ranches, and businesses. Salt River Steel fabricates ranch-rail, privacy, and security fence built for the desert. Free estimates — (480) 450-6959.';
$canonicalUrl    = $siteUrl . '/services/steel-fencing/';
$pageCanonical   = $canonicalUrl;
$ogImage         = $siteUrl . '/assets/images/steel-ranch-rail-fence-florence-og.jpg';
$heroPreloadImage = '';

/* ---------- Service-specific FAQs ---------- */
$faqs = [
    [
        'question' => 'How much does steel fencing cost in Florence, AZ?',
        'answer'   => 'Steel fencing is usually priced by the linear foot, and the rate depends on the style, height, and terrain. Ranch-rail pipe fencing runs differently than tall privacy or ornamental wrought-iron fence. Salt River Steel measures your property and gives a free, itemized quote so you know the full cost before we cut any steel.',
    ],
    [
        'question' => 'What styles of steel fence do you build?',
        'answer'   => 'Salt River Steel fabricates ranch-rail and pipe fencing, wrought-iron and ornamental fence, tube-steel and panel fencing, and heavier security fencing. We match the style to how you use the property — livestock containment, curb appeal, privacy, or perimeter security — and to the Florence-area terrain.',
    ],
    [
        'question' => 'Will steel fencing rust in the Arizona climate?',
        'answer'   => 'Not when it is finished correctly. Salt River Steel applies corrosion-resistant coatings suited to Central Arizona sun and monsoon moisture, so your fence resists rust and holds its finish for years. We recommend the right coating for your exposure and how close the fence sits to irrigation or livestock.',
    ],
    [
        'question' => 'Can you add a matching gate to my new fence line?',
        'answer'   => 'Yes. Because Salt River Steel builds both fencing and custom gates in the same Florence shop, we can fabricate matching driveway, ranch, or pedestrian gates that tie cleanly into your fence line — same steel, same finish, one coordinated project.',
    ],
    [
        'question' => 'How tall can you build a steel fence for privacy or livestock?',
        'answer'   => 'Height is built to the job. Salt River Steel fabricates low ranch-rail runs for livestock and property lines as well as taller privacy and security fencing where you need screening or protection. Tell us the purpose and we will spec the height, post spacing, and gauge to match.',
    ],
    [
        'question' => 'Do you install the fence, or only supply the steel?',
        'answer'   => 'Both. Salt River Steel can fabricate and fully install your fence — setting posts, hanging panels, and finishing — or supply fabricated fence sections for pickup at our Florence shop. Let us know your preference when you request your estimate.',
    ],
];
$faqSchema = generateFAQSchema($faqs);

/* ---------- Service schema ---------- */
$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'Service',
    '@id'      => $siteUrl . '/services/steel-fencing/#service-steel-fencing',
    'name'     => 'Steel Fencing',
    'serviceType' => 'Steel and wrought-iron fence fabrication and installation',
    'description' => 'Ranch-rail, privacy, ornamental, and security steel fencing fabricated and installed by Salt River Steel for Florence, AZ and Central Arizona properties.',
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
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Steel Fencing', 'item' => $canonicalUrl],
    ],
];

/* ---------- "Other services" (exclude current) ---------- */
$otherServices = array_values(array_filter($services, fn($s) => $s['slug'] !== 'steel-fencing'));
$otherMedia = [
    'custom-steel-gates'            => ['img' => 'custom-steel-ranch-entry-gate',            'icon' => 'shield-check', 'alt' => 'Custom steel driveway gate in Florence, AZ'],
    'commercial-steel-construction' => ['img' => 'commercial-steel-building-construction', 'icon' => 'building-2',   'alt' => 'Commercial steel building near Florence, AZ'],
    'residential-steel-work'        => ['img' => 'residential-steel-casita-building',        'icon' => 'home',         'alt' => 'Residential steel work in Central Arizona'],
    'industrial-steel-fabrication'  => ['img' => 'steel-frame-erection-red-iron',  'icon' => 'hammer',       'alt' => 'Industrial steel fabrication near Florence, AZ'],
];
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo json_encode($serviceSchema, JSON_UNESCAPED_SLASHES); ?></script>
<script type="application/ld+json"><?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES); ?></script>

<style>
/* ============================================================
   Service page — Steel Fencing (Premium editorial)
   Token-driven; raw rgba reserved for glass/overlay only.
   Signature block: .fence-styles alternating rows (unique).
   ============================================================ */
:root {
  --sp-line: rgba(var(--color-primary-rgb), 0.10);
  --sp-tint-1: rgba(var(--color-primary-rgb), 0.06);
  --sp-tint-2: rgba(6, 182, 212, 0.09);
}

/* ---------- HERO ---------- */
.sp-hero { position: relative; isolation: isolate; overflow: hidden; color: var(--color-white); padding: calc(var(--space-16) + 56px) 0 var(--space-16); }
.sp-hero-bg { position: absolute; inset: 0; z-index: -3; width: 100%; height: 100%; object-fit: cover; object-position: center; }
.sp-hero::before { content: ""; position: absolute; inset: 0; z-index: -2; background: linear-gradient(108deg, rgba(var(--color-primary-rgb),0.93) 0%, rgba(var(--color-primary-rgb),0.78) 50%, rgba(var(--color-secondary-rgb),0.52) 100%); }
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
.sp-breakdown-grid { display: grid; grid-template-columns: 0.9fr 1.1fr; gap: var(--space-16); align-items: center; }
@media (max-width: 900px) { .sp-breakdown-grid { grid-template-columns: 1fr; gap: var(--space-10); } }
.sp-breakdown h2 { font-size: clamp(1.7rem, 3vw, 2.3rem); margin-bottom: var(--space-4); text-wrap: balance; }
.sp-breakdown h2 .text-accent { color: var(--color-accent); }
.sp-included { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3); }
@media (max-width: 520px) { .sp-included { grid-template-columns: 1fr; } }
.sp-included li { display: flex; gap: var(--space-2); align-items: flex-start; font-size: var(--font-size-sm); color: var(--color-gray-dark); }
.sp-included svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.sp-breakdown-img { position: relative; }
.sp-breakdown-img img { width: 100%; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); aspect-ratio: 4 / 3; object-fit: cover; }
.sp-breakdown-img.order-first { order: -1; }
@media (max-width: 900px) { .sp-breakdown-img.order-first { order: 0; } }

/* ---------- SIGNATURE: Fence styles alternating rows (unique) ---------- */
.fence-styles { background: var(--color-light); }
.fence-rows { max-width: 940px; margin: 0 auto; display: flex; flex-direction: column; gap: var(--space-5); }
.fence-row { display: grid; grid-template-columns: 88px 1fr auto; gap: var(--space-6); align-items: center; background: var(--color-white); border: 1px solid var(--sp-line); border-left: 4px solid var(--color-accent); border-radius: var(--radius-lg); padding: var(--space-6) var(--space-8); box-shadow: var(--shadow-sm); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.fence-row:hover { transform: translateX(6px); box-shadow: var(--shadow-md); }
.fence-row__icon { width: 72px; height: 72px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--sp-tint-2), var(--sp-tint-1)); color: var(--color-accent); display: flex; align-items: center; justify-content: center; }
.fence-row__body h3 { font-size: var(--font-size-lg); color: var(--color-primary); margin-bottom: var(--space-1); }
.fence-row__body p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; }
.fence-row__tag { white-space: nowrap; font-size: var(--font-size-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--color-primary); background: var(--sp-tint-1); padding: var(--space-2) var(--space-4); border-radius: var(--radius-full); }
@media (max-width: 700px) { .fence-row { grid-template-columns: 60px 1fr; padding: var(--space-5); } .fence-row__icon { width: 52px; height: 52px; } .fence-row__tag { grid-column: 2; justify-self: start; margin-top: var(--space-2); } }

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
      <li aria-current="page">Steel Fencing</li>
    </ol>
  </div>
</nav>

<!-- 1. HERO -->
<section class="sp-hero" aria-label="Steel fencing in Florence, Arizona">
  <img class="sp-hero-bg"
       src="/assets/images/steel-ranch-rail-fence-florence-960.webp"
       srcset="/assets/images/steel-ranch-rail-fence-florence-480.webp 480w, /assets/images/steel-ranch-rail-fence-florence-960.webp 960w, /assets/images/steel-ranch-rail-fence-florence-1440.webp 1440w"
       sizes="100vw"
       alt="Three-rail steel ranch fencing installed by Salt River Steel in Florence, Arizona"
       width="1440" height="1080" loading="eager" fetchpriority="high" decoding="async">
  <div class="container">
    <div class="sp-hero-inner">
      <span class="eyebrow-label">Steel Fencing · Florence, AZ</span>
      <h1>Steel fencing built for <span class="text-accent">Central Arizona land</span></h1>
      <p class="hero-answer">Salt River Steel fabricates and installs steel fencing for Florence-area homes, ranches, and businesses — ranch-rail, wrought-iron, privacy, and security fence. Every run is measured, welded, and finished in our Florence shop with corrosion-resistant coatings that stand up to desert sun and monsoon moisture, then installed to your property line.</p>
      <div class="sp-hero-actions">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Fence Estimate</a>
        <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      </div>
      <div class="sp-hero-trust">
        <span><?php echo icon('shield-check', 18); ?> Licensed &amp; Insured</span>
        <span><?php echo icon('map-pin', 18); ?> Florence-Based Fabrication</span>
        <span><?php echo icon('ruler', 18); ?> Priced by the Linear Foot</span>
      </div>
    </div>
  </div>
</section>

<!-- 2. PROBLEM STATEMENT -->
<section class="section sp-problem" aria-label="Signs you need steel fencing">
  <div class="container">
    <p class="sp-pullquote reveal-up">Wood warps, wire sags, and chain-link rusts — <span class="text-accent">out here, steel is the fence that's still standing in ten years.</span></p>
    <div class="signs-bento">
      <div class="sign-card reveal-up reveal-delay-1">
        <div class="sign-card__icon"><?php echo icon('truck', 24); ?></div>
        <h3>You need to contain livestock</h3>
        <p>Ranch-rail and pipe fencing built heavy enough for horses, cattle, and daily equipment traffic on Central Arizona acreage.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-2">
        <div class="sign-card__icon"><?php echo icon('home', 24); ?></div>
        <h3>You want privacy or curb appeal</h3>
        <p>Ornamental and privacy steel fence that defines the property and looks intentional — not a temporary fix that fades in a season.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-3">
        <div class="sign-card__icon"><?php echo icon('shield-check', 24); ?></div>
        <h3>You need real perimeter security</h3>
        <p>Heavier tube-steel and security fencing for businesses and properties that need a barrier, not just a boundary marker.</p>
      </div>
    </div>
  </div>
</section>

<!-- 3. EXPERT POSITIONING -->
<section class="section sp-expert" aria-label="Why choose Salt River Steel for fencing">
  <div class="container">
    <div class="sp-expert-grid">
      <div class="sp-bigstat reveal-left">
        <span class="big">100%</span>
        <span class="cap">Florence<br>Fabrication</span>
      </div>
      <div class="sp-expert-copy reveal-right">
        <span class="eyebrow-label">The Local Fence Advantage</span>
        <h2>Why fence with <span class="text-accent">Salt River Steel?</span></h2>
        <p class="answer-block">Salt River Steel fabricates fence sections in its own Florence shop and installs them locally, so your fence is built to your terrain and finished for the desert — not shipped in as generic panels. You get one local crew handling measurement, fabrication, coating, and installation.</p>
        <ul class="sp-diff-list">
          <li><span class="ic"><?php echo icon('map-pin', 20); ?></span><div><strong>Built for your terrain</strong><p>Post spacing and footing set for Central Arizona's rocky, caliche-heavy ground — not a one-size spec.</p></div></li>
          <li><span class="ic"><?php echo icon('shield-check', 20); ?></span><div><strong>Desert-grade finishes</strong><p>Corrosion-resistant coatings chosen for sun exposure, monsoon moisture, and proximity to irrigation.</p></div></li>
          <li><span class="ic"><?php echo icon('ruler', 20); ?></span><div><strong>Fence and gate together</strong><p>Matching custom gates fabricated in the same shop tie cleanly into the fence line — one finish, one project.</p></div></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4. SERVICE BREAKDOWN -->
<section class="section sp-breakdown" aria-label="What's included with steel fencing">
  <div class="container">
    <div class="sp-breakdown-grid">
      <div class="sp-breakdown-img order-first reveal-left">
        <img src="/assets/images/corrugated-steel-privacy-fence-960.webp"
             srcset="/assets/images/corrugated-steel-privacy-fence-480.webp 480w, /assets/images/corrugated-steel-privacy-fence-960.webp 960w, /assets/images/corrugated-steel-privacy-fence-1440.webp 1440w"
             sizes="(max-width: 900px) 100vw, 420px"
             alt="Corrugated steel privacy fence installed by Salt River Steel in Central Arizona"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
      <div class="reveal-right">
        <span class="eyebrow-label">What's Included</span>
        <h2>What comes with a <span class="text-accent">Salt River Steel fence?</span></h2>
        <p class="answer-block">A steel fence from Salt River Steel is a complete, installed system — measured, fabricated, coated, and set. We handle the posts, rails or panels, finish, and any matching gates so you get one accountable source from property-line walk to the last post.</p>
        <ul class="sp-included">
          <li><?php echo icon('check', 18); ?> On-site measuring &amp; layout</li>
          <li><?php echo icon('check', 18); ?> Ranch-rail &amp; pipe fencing</li>
          <li><?php echo icon('check', 18); ?> Wrought-iron &amp; ornamental fence</li>
          <li><?php echo icon('check', 18); ?> Privacy &amp; tube-steel panels</li>
          <li><?php echo icon('check', 18); ?> Security &amp; perimeter fencing</li>
          <li><?php echo icon('check', 18); ?> Corrosion-resistant coating</li>
          <li><?php echo icon('check', 18); ?> Matching custom gates</li>
          <li><?php echo icon('check', 18); ?> Post setting &amp; full installation</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 5. SIGNATURE — Fence styles -->
<section class="section fence-styles" aria-label="Steel fence styles we build">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">the right fence for the job</span>
      <h2>What <span class="text-accent">styles of steel fence</span> do you build?</h2>
      <p class="answer-block">Salt River Steel builds four main fence styles for Central Arizona properties, matched to how you use the land. Whether you are containing livestock, screening a yard, or securing a business, we spec the height, gauge, and finish to fit.</p>
    </div>
    <div class="fence-rows">
      <div class="fence-row reveal-up reveal-delay-1">
        <div class="fence-row__icon"><?php echo icon('truck', 30); ?></div>
        <div class="fence-row__body"><h3>Ranch-Rail &amp; Pipe Fence</h3><p>Two-, three-, and four-rail pipe fencing for livestock, pasture lines, and long rural boundaries — heavy enough for daily use.</p></div>
        <span class="fence-row__tag">Best for ranches</span>
      </div>
      <div class="fence-row reveal-up reveal-delay-2">
        <div class="fence-row__icon"><?php echo icon('home', 30); ?></div>
        <div class="fence-row__body"><h3>Wrought-Iron &amp; Ornamental</h3><p>Decorative steel fence that adds curb appeal and defines a yard or entrance while staying low-maintenance in the desert.</p></div>
        <span class="fence-row__tag">Best for homes</span>
      </div>
      <div class="fence-row reveal-up reveal-delay-3">
        <div class="fence-row__icon"><?php echo icon('shield-check', 30); ?></div>
        <div class="fence-row__body"><h3>Privacy &amp; Tube-Steel Panel</h3><p>Taller solid or panel fencing for screening, wind, and privacy where you need more than an open rail line.</p></div>
        <span class="fence-row__tag">Best for yards</span>
      </div>
      <div class="fence-row reveal-up reveal-delay-1">
        <div class="fence-row__icon"><?php echo icon('building-2', 30); ?></div>
        <div class="fence-row__body"><h3>Security &amp; Commercial</h3><p>Heavy perimeter fencing for businesses, equipment yards, and industrial sites that need a genuine barrier.</p></div>
        <span class="fence-row__tag">Best for business</span>
      </div>
    </div>
  </div>
</section>

<!-- 6. PROOF -->
<section class="section sp-proof" aria-label="Why Florence trusts Salt River Steel fencing">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <h2>Will the fence actually <span class="text-accent">last out here?</span></h2>
      <p class="answer-block">Salt River Steel is a licensed, insured steel fabricator based in Florence, AZ, building fence and gates for local ranches, homes, and businesses since 2022. Our fencing is welded in-house and finished for the desert, backed by a real local shop you can visit.</p>
    </div>
    <div class="sp-proof-grid">
      <div class="sp-proof-img reveal-left">
        <img src="/assets/images/crew-setting-steel-posts-lift-960.webp"
             srcset="/assets/images/crew-setting-steel-posts-lift-480.webp 480w, /assets/images/crew-setting-steel-posts-lift-960.webp 960w, /assets/images/crew-setting-steel-posts-lift-1440.webp 1440w"
             sizes="(max-width: 860px) 100vw, 460px"
             alt="Salt River Steel crew member setting steel fence posts from a lift on a Pinal County property"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
      <div class="reveal-right">
        <ul class="sp-proof-points">
          <li><?php echo icon('badge-check', 20); ?> Licensed &amp; insured Arizona steel fabricator</li>
          <li><?php echo icon('map-pin', 20); ?> Local shop at 12356 E Pot O Gold Trail, Florence</li>
          <li><?php echo icon('hammer', 20); ?> Fence sections welded and finished in-house</li>
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
<section class="section sp-compare" aria-label="Steel fencing compared to other fence types">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">why steel wins</span>
      <h2>Steel fence vs. <span class="text-accent">wood and chain-link</span></h2>
      <p class="answer-block">Wood and chain-link cost less up front, but in the Arizona desert they warp, rust, and need replacing far sooner. A Salt River Steel fence costs more once and then holds its line for years — the cheaper long-term investment for land you plan to keep.</p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--them reveal-left">
        <h3><?php echo icon('minus', 22); ?> Wood &amp; Chain-Link</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Wood warps and splits in desert heat</li>
          <li><?php echo icon('minus', 18); ?> Chain-link sags and rusts at the line</li>
          <li><?php echo icon('minus', 18); ?> Frequent repairs and full replacements</li>
          <li><?php echo icon('minus', 18); ?> Limited security and containment strength</li>
          <li><?php echo icon('minus', 18); ?> Looks temporary, not intentional</li>
        </ul>
      </div>
      <div class="compare-col compare-col--us reveal-right">
        <h3><?php echo icon('shield-check', 22); ?> Salt River Steel Fence</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Steel holds its shape through heat and wind</li>
          <li><?php echo icon('check', 18); ?> Corrosion-resistant finish fights rust</li>
          <li><?php echo icon('check', 18); ?> Built once to last years, not seasons</li>
          <li><?php echo icon('check', 18); ?> Real strength for livestock and security</li>
          <li><?php echo icon('check', 18); ?> Clean, finished look with matching gates</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 8. FAQ -->
<section class="section sp-faq" aria-label="Steel fencing questions">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="eyebrow-label">Fence Questions</span>
      <h2>Common questions about <span class="text-accent">steel fencing</span></h2>
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
<section class="section sp-cta" aria-label="Request a steel fencing estimate">
  <div class="container">
    <h2 class="reveal-up">Fence your property with steel that lasts.</h2>
    <p class="reveal-up reveal-delay-1">Tell Salt River Steel about your property line — livestock, privacy, or security — and we'll measure, quote, and fabricate your fence right here in Florence. Your estimate is free.</p>
    <div class="sp-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Fence Estimate</a>
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

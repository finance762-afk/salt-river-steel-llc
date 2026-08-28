<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   /services/custom-steel-gates/index.php — Salt River Steel LLC
   Phase 4. Premium editorial service page. Custom Steel Gates.
   ============================================================ */

$service = null;
foreach ($services as $s) { if ($s['slug'] === 'custom-steel-gates') { $service = $s; break; } }

$currentPage     = 'services';
$pageTitle       = 'Custom Steel Gates Florence AZ | Driveway, Entry & Security Gates | Salt River Steel';
$pageDescription = 'Custom steel driveway, entry, ranch, and security gates fabricated in Florence, AZ. Salt River Steel builds gates to fit your property and the desert climate. Free estimates — call (480) 450-6959.';
$canonicalUrl    = $siteUrl . '/services/custom-steel-gates/';
$pageCanonical   = $canonicalUrl;
$ogImage         = $siteUrl . '/assets/images/custom-steel-gates.jpg';
$heroPreloadImage = '';

/* ---------- Service-specific FAQs ---------- */
$faqs = [
    [
        'question' => 'How much does a custom steel gate cost in Florence, AZ?',
        'answer'   => 'The price of a custom steel gate depends on its size, style, material, and whether it is automated. A simple walk-through pedestrian gate costs far less than a wide automated driveway gate with a decorative panel. Salt River Steel gives every Florence-area customer a free, itemized quote before any steel is cut — call (480) 450-6959 for your number.',
    ],
    [
        'question' => 'Can you automate a steel gate with an opener and keypad?',
        'answer'   => 'Yes. Salt River Steel builds driveway and entry gates sized and reinforced for swing or slide automation, and we coordinate the opener, keypad, and safety hardware so the finished gate operates cleanly. Tell us how you want to control access and we will engineer the gate frame around it.',
    ],
    [
        'question' => 'How long does it take to build and install a custom gate?',
        'answer'   => 'Most custom gates are fabricated within 3–5 business days at our Florence shop, with installation scheduled shortly after. Larger automated systems or heavily detailed decorative gates take a little longer. We give you a firm timeline with your quote so you can plan the project around it.',
    ],
    [
        'question' => 'Will a steel gate hold up to Arizona heat and monsoon weather?',
        'answer'   => 'It will when it is built for the desert. Salt River Steel specs corrosion-resistant finishes and heat-stable construction for Central Arizona conditions, so your gate resists rust from monsoon moisture and stays true through summer heat. We recommend the right coating and grade for your exposure.',
    ],
    [
        'question' => 'Do you build ranch and agricultural gates for larger properties?',
        'answer'   => 'Yes. Alongside residential driveway and entry gates, Salt River Steel fabricates wide ranch and agricultural gates for the larger properties common around Florence and Central Arizona — built heavy enough for daily equipment traffic and livestock use.',
    ],
    [
        'question' => 'Do you install the gate, or only fabricate it?',
        'answer'   => 'Both. Salt River Steel fabricates your gate in Florence and can deliver it for pickup or handle full on-site installation, including posts, hinges, and automation. Let us know your preference when you request your estimate.',
    ],
];
$faqSchema = generateFAQSchema($faqs);

/* ---------- Service schema ---------- */
$serviceSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'Service',
    '@id'      => $siteUrl . '/services/custom-steel-gates/#service-custom-steel-gates',
    'name'     => 'Custom Steel Gates',
    'serviceType' => 'Custom steel gate fabrication and installation',
    'description' => 'Custom-fabricated driveway, entry, security, and ranch gates built and installed by Salt River Steel for Florence, AZ and Central Arizona properties.',
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
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Custom Steel Gates', 'item' => $canonicalUrl],
    ],
];

/* ---------- "Other services" (exclude current) ---------- */
$otherServices = array_values(array_filter($services, fn($s) => $s['slug'] !== 'custom-steel-gates'));
$otherMedia = [
    'steel-fencing'                 => ['img' => 'steel-fencing',                 'icon' => 'ruler',      'alt' => 'Steel ranch-rail fencing on a Florence-area desert property'],
    'commercial-steel-construction' => ['img' => 'commercial-steel-construction', 'icon' => 'building-2', 'alt' => 'Commercial steel building near Florence, AZ'],
    'residential-steel-work'        => ['img' => 'residential-steel-work',        'icon' => 'home',       'alt' => 'Residential steel work in Central Arizona'],
    'industrial-steel-fabrication'  => ['img' => 'industrial-steel-fabrication',  'icon' => 'hammer',     'alt' => 'Industrial steel fabrication near Florence, AZ'],
];
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<script type="application/ld+json"><?php echo json_encode($serviceSchema, JSON_UNESCAPED_SLASHES); ?></script>
<script type="application/ld+json"><?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES); ?></script>

<style>
/* ============================================================
   Service page — Custom Steel Gates (Premium editorial)
   Token-driven; raw rgba reserved for glass/overlay only.
   Signature block: .gate-types spec grid (unique to this page).
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

/* ---------- SIGNATURE: Gate types spec grid (unique to this page) ---------- */
.gate-types { background: var(--color-light); }
.gate-types-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-5); }
@media (max-width: 1000px) { .gate-types-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 520px)  { .gate-types-grid { grid-template-columns: 1fr; } }
.gate-type {
  position: relative; padding: var(--space-8) var(--space-5) var(--space-6);
  border-radius: var(--radius-lg); background: var(--color-white); border: 1px solid var(--sp-line);
  border-top: 4px solid var(--color-accent); box-shadow: var(--shadow-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.gate-type:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.gate-type__icon { width: 52px; height: 52px; border-radius: var(--radius-md); background: var(--sp-tint-2); color: var(--color-accent); display: flex; align-items: center; justify-content: center; margin-bottom: var(--space-4); }
.gate-type h3 { font-size: var(--font-size-lg); color: var(--color-primary); margin-bottom: var(--space-2); }
.gate-type p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; }

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
      <li aria-current="page">Custom Steel Gates</li>
    </ol>
  </div>
</nav>

<!-- 1. HERO -->
<section class="sp-hero" aria-label="Custom steel gates in Florence, Arizona">
  <img class="sp-hero-bg"
       src="/assets/images/custom-steel-gates.jpg"
       srcset="/assets/images/custom-steel-gates-480.webp 480w, /assets/images/custom-steel-gates-960.webp 960w, /assets/images/custom-steel-gates-1600.webp 1600w"
       sizes="100vw"
       alt="Custom steel driveway gate fabricated and installed by Salt River Steel in Florence, Arizona"
       width="1600" height="1000" loading="eager" fetchpriority="high" decoding="async">
  <div class="container">
    <div class="sp-hero-inner">
      <span class="eyebrow-label">Custom Steel Gates · Florence, AZ</span>
      <h1>Custom steel gates built to <span class="text-accent">fit your property</span></h1>
      <p class="hero-answer">Salt River Steel designs, fabricates, and installs custom steel gates for Florence and Central Arizona — driveway gates, entry gates, security gates, and wide ranch gates. Each one is cut and welded in our Florence shop to match your opening, your style, and the demands of the desert climate, then delivered or installed on your schedule.</p>
      <div class="sp-hero-actions">
        <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Gate Estimate</a>
        <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      </div>
      <div class="sp-hero-trust">
        <span><?php echo icon('shield-check', 18); ?> Licensed &amp; Insured</span>
        <span><?php echo icon('map-pin', 18); ?> Florence-Based Fabrication</span>
        <span><?php echo icon('clock', 18); ?> 3–5 Day Turnaround</span>
      </div>
    </div>
  </div>
</section>

<!-- 2. PROBLEM STATEMENT -->
<section class="section sp-problem" aria-label="Signs you need a custom steel gate">
  <div class="container">
    <p class="sp-pullquote reveal-up">A stock gate that almost fits your opening becomes the weak point of your whole property — <span class="text-accent">the part that sags, sticks, and rusts first.</span></p>
    <div class="signs-bento">
      <div class="sign-card reveal-up reveal-delay-1">
        <div class="sign-card__icon"><?php echo icon('ruler', 24); ?></div>
        <h3>Your opening is non-standard</h3>
        <p>Wide driveways, sloped approaches, and long ranch entrances rarely match off-the-shelf gate sizes. A custom gate is built to your exact opening instead of forced to fit.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-2">
        <div class="sign-card__icon"><?php echo icon('shield-check', 24); ?></div>
        <h3>You need real security</h3>
        <p>A gate is only as strong as its frame, hinges, and welds. Salt River Steel builds gates heavy enough to actually secure an entrance — not just mark it.</p>
      </div>
      <div class="sign-card reveal-up reveal-delay-3">
        <div class="sign-card__icon"><?php echo icon('home', 24); ?></div>
        <h3>You want it to look intentional</h3>
        <p>Your gate is the first thing visitors see. A custom steel gate sets the tone for the property with clean lines and a finish that matches the home or ranch.</p>
      </div>
    </div>
  </div>
</section>

<!-- 3. EXPERT POSITIONING -->
<section class="section sp-expert" aria-label="Why Salt River Steel builds better gates">
  <div class="container">
    <div class="sp-expert-grid">
      <div class="sp-bigstat reveal-left">
        <span class="big">3–5</span>
        <span class="cap">Day Custom<br>Turnaround</span>
      </div>
      <div class="sp-expert-copy reveal-right">
        <span class="eyebrow-label">Local Fabrication Advantage</span>
        <h2>Why build your gate with <span class="text-accent">Salt River Steel?</span></h2>
        <p class="answer-block">Salt River Steel builds gates in its own Florence shop rather than reselling imported units, so every weld, hinge, and dimension is under our control. That means a gate engineered for your opening and the desert climate — fabricated in days, not weeks, without out-of-state freight costs.</p>
        <ul class="sp-diff-list">
          <li><span class="ic"><?php echo icon('hammer', 20); ?></span><div><strong>Built here, welded in-house</strong><p>We cut and weld your gate in Florence, so the fit, strength, and finish are ours to stand behind — no drop-shipped mystery hardware.</p></div></li>
          <li><span class="ic"><?php echo icon('shield-check', 20); ?></span><div><strong>Engineered for the desert</strong><p>Corrosion-resistant finishes and heat-stable construction chosen for Central Arizona sun and monsoon moisture.</p></div></li>
          <li><span class="ic"><?php echo icon('users', 20); ?></span><div><strong>You talk to the fabricator</strong><p>Work directly with the crew building your gate — straight answers on design, automation, and timeline.</p></div></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4. SERVICE BREAKDOWN -->
<section class="section sp-breakdown" aria-label="What's included in a custom gate">
  <div class="container">
    <div class="sp-breakdown-grid">
      <div class="reveal-left">
        <span class="eyebrow-label">What's Included</span>
        <h2>What comes with a <span class="text-accent">Salt River Steel gate?</span></h2>
        <p class="answer-block">Every custom gate from Salt River Steel is a complete package — measured, engineered, fabricated, finished, and installed. We handle the frame, the hardware, the coating, and the automation coordination so you get one accountable source from the first measurement to the final swing.</p>
        <ul class="sp-included">
          <li><?php echo icon('check', 18); ?> On-site measuring &amp; design consult</li>
          <li><?php echo icon('check', 18); ?> Driveway, entry &amp; pedestrian gates</li>
          <li><?php echo icon('check', 18); ?> Ranch &amp; agricultural gates</li>
          <li><?php echo icon('check', 18); ?> Swing &amp; slide configurations</li>
          <li><?php echo icon('check', 18); ?> Automation &amp; keypad coordination</li>
          <li><?php echo icon('check', 18); ?> Corrosion-resistant finishing</li>
          <li><?php echo icon('check', 18); ?> Posts, hinges &amp; latch hardware</li>
          <li><?php echo icon('check', 18); ?> Delivery or full installation</li>
        </ul>
      </div>
      <div class="sp-breakdown-img reveal-right">
        <img src="/assets/images/home-hero-steel-construction.jpg"
             srcset="/assets/images/home-hero-steel-construction-480.webp 480w, /assets/images/home-hero-steel-construction-960.webp 960w, /assets/images/home-hero-steel-construction-1600.webp 1600w"
             sizes="(max-width: 900px) 100vw, 460px"
             alt="Residential steel sliding gate set into a block wall, fabricated by Salt River Steel in Florence, AZ"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
    </div>
  </div>
</section>

<!-- 5. SIGNATURE — Gate types -->
<section class="section gate-types" aria-label="Types of steel gates we build">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">every opening, covered</span>
      <h2>What <span class="text-accent">types of steel gates</span> do you build?</h2>
      <p class="answer-block">Salt River Steel fabricates the full range of steel gates for Central Arizona properties — from a single pedestrian gate to a wide, automated ranch entrance. Below are the gate types we build most often for Florence-area homes, ranches, and businesses.</p>
    </div>
    <div class="gate-types-grid">
      <div class="gate-type reveal-up reveal-delay-1">
        <div class="gate-type__icon"><?php echo icon('car', 26); ?></div>
        <h3>Driveway Gates</h3>
        <p>Swing or slide gates sized for wide residential and ranch driveways, ready for automation and daily use.</p>
      </div>
      <div class="gate-type reveal-up reveal-delay-2">
        <div class="gate-type__icon"><?php echo icon('home', 26); ?></div>
        <h3>Entry &amp; Pedestrian</h3>
        <p>Walk-through and courtyard gates that match your home's lines and hold up to constant use.</p>
      </div>
      <div class="gate-type reveal-up reveal-delay-3">
        <div class="gate-type__icon"><?php echo icon('shield-check', 26); ?></div>
        <h3>Security Gates</h3>
        <p>Heavier frames, reinforced welds, and access hardware for properties that need real protection.</p>
      </div>
      <div class="gate-type reveal-up reveal-delay-1">
        <div class="gate-type__icon"><?php echo icon('truck', 26); ?></div>
        <h3>Ranch &amp; Ag Gates</h3>
        <p>Wide, rugged gates built for equipment traffic and livestock on Central Arizona acreage.</p>
      </div>
    </div>
  </div>
</section>

<!-- 6. PROOF -->
<section class="section sp-proof" aria-label="Why Florence trusts Salt River Steel gates">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <h2>Can you trust the gate to <span class="text-accent">last?</span></h2>
      <p class="answer-block">Salt River Steel is a licensed, insured steel fabricator based in Florence, AZ, building gates for local homes, ranches, and businesses since 2022. We back our work with in-house welding, desert-grade finishes, and a real local address you can visit — not a distant supplier.</p>
    </div>
    <div class="sp-proof-grid">
      <div class="sp-proof-img reveal-left">
        <img src="/assets/images/about-fabrication.jpg"
             srcset="/assets/images/about-fabrication-480.webp 480w, /assets/images/about-fabrication-960.webp 960w, /assets/images/about-fabrication-1600.webp 1600w"
             sizes="(max-width: 860px) 100vw, 460px"
             alt="Salt River Steel crew fabricating custom steelwork at a Central Arizona job site"
             width="600" height="450" loading="lazy" decoding="async">
      </div>
      <div class="reveal-right">
        <ul class="sp-proof-points">
          <li><?php echo icon('badge-check', 20); ?> Licensed &amp; insured Arizona steel fabricator</li>
          <li><?php echo icon('map-pin', 20); ?> Local shop at 12356 E Pot O Gold Trail, Florence</li>
          <li><?php echo icon('hammer', 20); ?> Every gate cut and welded in-house</li>
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
<section class="section sp-compare" aria-label="Salt River Steel compared to distant suppliers">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="section-subtitle">the local difference</span>
      <h2>Why not just order a gate <span class="text-accent">from out of state?</span></h2>
      <p class="answer-block">You can — but a gate hauled in from Phoenix or beyond means freight costs, long lead times, and no one local to fix a fit problem. Salt River Steel fabricates in Florence, so you skip the freight and get a gate built to your exact opening.</p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--them reveal-left">
        <h3><?php echo icon('truck', 22); ?> Out-of-State Supplier</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Premium freight added to every order</li>
          <li><?php echo icon('minus', 18); ?> Weeks of lead time, hard to expedite</li>
          <li><?php echo icon('minus', 18); ?> Stock sizes forced onto your opening</li>
          <li><?php echo icon('minus', 18); ?> No local crew to correct a fit issue</li>
          <li><?php echo icon('minus', 18); ?> Generic finishes not specced for the desert</li>
        </ul>
      </div>
      <div class="compare-col compare-col--us reveal-right">
        <h3><?php echo icon('shield-check', 22); ?> Salt River Steel</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Local pricing, no premium freight</li>
          <li><?php echo icon('check', 18); ?> Most custom gates in 3–5 business days</li>
          <li><?php echo icon('check', 18); ?> Built to your exact opening &amp; slope</li>
          <li><?php echo icon('check', 18); ?> Florence crew handles fit and install</li>
          <li><?php echo icon('check', 18); ?> Corrosion-resistant, desert-ready finish</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 8. FAQ -->
<section class="section sp-faq" aria-label="Custom steel gate questions">
  <div class="container">
    <div class="sp-section-head reveal-up">
      <span class="eyebrow-label">Gate Questions</span>
      <h2>Common questions about <span class="text-accent">custom steel gates</span></h2>
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
<section class="section sp-cta" aria-label="Request a custom gate estimate">
  <div class="container">
    <h2 class="reveal-up">Let's build the gate your property deserves.</h2>
    <p class="reveal-up reveal-delay-1">Tell Salt River Steel what you need — a single security gate or a wide automated ranch entrance — and we'll measure, quote, and fabricate it right here in Florence. Your estimate is free.</p>
    <div class="sp-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Gate Estimate</a>
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

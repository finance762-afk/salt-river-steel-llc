<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
 * index.php — Homepage (Phase 3)
 * Salt River Steel LLC — Florence, AZ
 * ============================================================ */

$currentPage     = 'home';
$pageTitle       = 'Salt River Steel LLC | Custom Steel Gates, Fencing & Construction in Florence, AZ';
$pageDescription = 'Salt River Steel LLC is a Florence, AZ steel construction company building custom gates, steel fencing, and commercial, residential & industrial steelwork with same-week local fabrication.';
$pageCanonical   = $siteUrl . '/';

/* ---- Homepage FAQs (sourced from research brief) ---- */
$faqs = [
    [
        'question' => 'How quickly can Salt River Steel deliver steel orders to local projects?',
        'answer'   => 'Salt River Steel ships most custom orders within 3–5 business days from our Florence facility — significantly faster than out-of-state suppliers. We keep common stock items on hand for rush jobs across Central Arizona.',
    ],
    [
        'question' => 'Does Salt River Steel offer custom steel fabrication for non-standard projects?',
        'answer'   => 'Yes. Salt River Steel works directly with contractors and architects on custom designs for agricultural structures, industrial equipment, architectural features, and commercial builds. Our in-house team handles specialized cuts, welding, and finishing.',
    ],
    [
        'question' => 'What steel products and grades does Salt River Steel stock?',
        'answer'   => 'Salt River Steel carries structural steel, plate steel, tubing, angle iron, and specialty grades chosen to resist Arizona heat and monsoon conditions. Contact us for specific grade availability and recommendations for your build.',
    ],
    [
        'question' => 'Does Salt River Steel deliver to job sites, or is it pickup only?',
        'answer'   => 'Salt River Steel offers both local delivery to Central Arizona projects and pickup at our Florence location. Delivery rates depend on distance and load size — call for a quote on your project.',
    ],
    [
        'question' => 'Can Salt River Steel handle tight timelines or expedited orders?',
        'answer'   => 'Absolutely. As a local Florence operation, Salt River Steel works directly with your team to prioritize rush jobs. Call for expedited fabrication options and pricing on same-week turnaround.',
    ],
    [
        'question' => 'What areas around Florence does Salt River Steel serve?',
        'answer'   => 'Salt River Steel is based in Florence, AZ and serves contractors, ranchers, and property owners throughout Central Arizona, including the surrounding Pinal County communities. Free estimates are available for gates, fencing, and steel construction.',
    ],
];

/* ---- Process steps ---- */
$processSteps = [
    ['icon' => 'ruler',        'title' => 'Consult & Measure', 'text' => 'We walk your site, take exact measurements, and talk through how the steel needs to perform in the desert climate.'],
    ['icon' => 'pen-tool',     'title' => 'Design & Quote',    'text' => 'You get a clear, itemized quote and a fabrication plan — no vague estimates, no surprise freight charges from out of state.'],
    ['icon' => 'hammer',       'title' => 'Fabricate In-House','text' => 'Every cut, weld, and finish is done at our Florence shop, so quality and timeline stay in our hands, not a distant supplier\'s.'],
    ['icon' => 'check-circle', 'title' => 'Deliver & Install',  'text' => 'We deliver to your job site or install on location, then walk the finished work with you before we call it done.'],
];

/* ---- Service → icon map (adjacent icons differ) ---- */
$serviceIcons = [
    'custom-steel-gates'             => 'home',
    'steel-fencing'                  => 'ruler',
    'commercial-steel-construction'  => 'building-2',
    'residential-steel-work'         => 'hard-hat',
    'industrial-steel-fabrication'   => 'wrench',
];

/* ---- Service → homepage photo + bullets ---- */
$serviceCards = [
    'custom-steel-gates' => [
        'img'  => 'home-custom-steel-gate',
        'alt'  => 'Custom-fabricated dark steel driveway gate installed at a Florence, AZ property',
        'bul'  => ['Driveway, entry & security gates', 'Built to your exact opening', 'Powder-coat & finish options'],
    ],
    'steel-fencing' => [
        'img'  => 'home-steel-fence',
        'alt'  => 'Tall corrugated steel privacy fence built by Salt River Steel in Florence, AZ',
        'bul'  => ['Ranch, privacy & security fence', 'Corrugated & wrought-iron styles', 'Corrosion-resistant desert builds'],
    ],
    'commercial-steel-construction' => [
        'img'  => 'home-commercial-building',
        'alt'  => 'Completed commercial steel building fabricated by Salt River Steel in Central Arizona',
        'bul'  => ['Structural steel fabrication', 'Buildings, frames & supports', 'Contractor & architect partner'],
    ],
    'residential-steel-work' => [
        'img'  => 'home-residential-steel',
        'alt'  => 'Custom residential steel shade structure and metalwork in Florence, AZ',
        'bul'  => ['Carports, ramadas & railings', 'Architectural metalwork', 'Custom one-off fabrication'],
    ],
    'industrial-steel-fabrication' => [
        'img'  => 'home-industrial-fabrication',
        'alt'  => 'Heavy industrial steel fabrication and site work by Salt River Steel in Central Arizona',
        'bul'  => ['Heavy-duty structural welding', 'Equipment & job-site steel', 'Rush & expedited fabrication'],
    ],
];

/* ---- FAQ schema (LocalBusiness lives in head.php — do not duplicate) ---- */
$faqSchema = generateFAQSchema($faqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- LCP hint: hero background (in-body preload is valid and honored) -->
<link rel="preload" as="image" href="/assets/images/home-hero-bg.webp" fetchpriority="high">

<?php echo $faqSchema; ?>

<style>
/* ============================================================
   HOMEPAGE PAGE-SPECIFIC STYLES (Phase 3)
   Premium tier — page-scoped, tokens only (no hardcoded values)
   ============================================================ */

/* ---- Fail-open reveal system (overrides framework's ungated rule) ----
   Content is visible by default; only hidden once JS confirms it can reveal. */
[data-animate] { opacity: 1; transform: none; }
html.js-anim [data-animate] {
  opacity: 0; transform: translateY(28px);
  transition: opacity var(--transition-slow), transform var(--transition-slow);
}
html.js-anim [data-animate].reveal-left  { transform: translateX(-42px); }
html.js-anim [data-animate].reveal-right { transform: translateX(42px); }
html.js-anim [data-animate].reveal-scale { transform: scale(0.92); }
[data-animate].animated { opacity: 1 !important; transform: none !important; }
.reveal-delay-1 { transition-delay: 0.08s; }
.reveal-delay-2 { transition-delay: 0.16s; }
.reveal-delay-3 { transition-delay: 0.24s; }
.reveal-delay-4 { transition-delay: 0.32s; }

/* ============================================================
   1. HERO — 60/40 split, layered background + glass form card
   ============================================================ */
.hero--home {
  min-height: 92vh;
  align-items: stretch;
  justify-content: flex-start;
  background-image:
    linear-gradient(105deg, rgba(var(--color-primary-rgb), 0.94) 0%, rgba(var(--color-primary-rgb), 0.72) 46%, rgba(var(--color-primary-rgb), 0.42) 100%),
    url('/assets/images/home-hero-bg.webp');
  color: var(--color-white);
}
/* Layered technique: gradient overlay (::before) + subtle noise texture (::after) */
.hero--home::before {
  content: ""; position: absolute; inset: 0; z-index: 1;
  background: radial-gradient(circle at 78% 30%, rgba(var(--color-secondary-rgb), 0.55) 0%, transparent 55%);
  mix-blend-mode: screen; pointer-events: none;
}
.hero--home::after {
  content: ""; position: absolute; inset: 0; z-index: 1; opacity: 0.06; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.hero--home .hero-inner {
  position: relative; z-index: 2;
  width: 100%; max-width: var(--bp-wide);
  margin: 0 auto; padding: 0 var(--space-6);
  display: grid; grid-template-columns: 1.5fr 1fr; gap: var(--space-12);
  align-items: center;
}
.hero-text { max-width: 42rem; }
.hero-eyebrow--home {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600;
  text-transform: uppercase; letter-spacing: 2px; color: var(--color-white);
  padding: var(--space-2) var(--space-4);
  background: rgba(var(--color-accent-rgb, 6, 182, 212), 0.18);
  border: 1px solid rgba(255,255,255,0.28); border-radius: var(--radius-full);
  margin-bottom: var(--space-5);
}
.hero-eyebrow--home svg { width: 18px; height: 18px; color: var(--color-accent); }
.hero-title {
  color: var(--color-white); font-size: clamp(2.4rem, 5vw, var(--font-size-6xl));
  line-height: 1.05; text-wrap: balance; margin-bottom: var(--space-5);
}
.hero-title .text-accent { color: var(--color-accent); display: inline-block; }
.hero-subtitle--home {
  color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); line-height: 1.7;
  max-width: 38rem; margin-bottom: var(--space-8);
}
.hero-actions { display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-8); }
.hero-actions .btn { font-size: var(--font-size-base); }
.btn-ghost-white {
  background: transparent; color: var(--color-white);
  border: 2px solid rgba(255,255,255,0.65); border-radius: var(--radius-md);
  padding: var(--space-3) var(--space-6); font-weight: 700;
  display: inline-flex; align-items: center; gap: var(--space-2);
  transition: background var(--transition-base), border-color var(--transition-base), transform var(--transition-fast);
}
.btn-ghost-white:hover { background: rgba(255,255,255,0.12); border-color: var(--color-white); transform: translateY(-2px); }
.btn-ghost-white svg { width: 18px; height: 18px; }
.hero-trust--home {
  display: grid; grid-template-columns: repeat(2, auto); gap: var(--space-3) var(--space-6);
  justify-content: start;
}
.hero-trust--home .trust-pill {
  display: flex; align-items: center; gap: var(--space-2);
  color: rgba(255,255,255,0.9); font-size: var(--font-size-sm); font-weight: 600;
}
.hero-trust--home .trust-pill svg { width: 18px; height: 18px; color: var(--color-accent); flex-shrink: 0; }

/* Hero glass lead form */
.hero-form-card {
  position: relative;
  background: rgba(255,255,255,0.96);
  -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,0.6);
  border-radius: var(--radius-xl);
  box-shadow: var(--shadow-xl);
  padding: var(--space-8);
  color: var(--color-text);
}
.hero-form-card h2 {
  font-size: var(--font-size-2xl); color: var(--color-primary);
  margin-bottom: var(--space-1); text-wrap: balance;
}
.hero-form-tagline { color: var(--color-gray); font-size: var(--font-size-sm); margin-bottom: var(--space-5); }
.hero-form .form-row { margin-bottom: var(--space-3); }
.hero-form input,
.hero-form select {
  width: 100%; padding: var(--space-4); font-family: var(--font-body); font-size: var(--font-size-base);
  color: var(--color-text); background: var(--color-white);
  border: 1px solid var(--color-border); border-radius: var(--radius-md);
  transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
}
.hero-form input:focus,
.hero-form select:focus {
  outline: none; border-color: var(--color-accent);
  box-shadow: 0 0 0 3px rgba(var(--color-accent-rgb, 6, 182, 212), 0.18);
}
.hero-form .btn-block { width: 100%; margin-top: var(--space-2); }
.form-footnote { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-3); line-height: 1.5; }
.form-footnote a { color: var(--color-primary); text-decoration: underline; }

@media (max-width: 992px) {
  .hero--home .hero-inner { grid-template-columns: 1fr; gap: var(--space-8); padding-top: var(--space-8); padding-bottom: var(--space-8); }
  .hero-text { max-width: none; }
}
@media (max-width: 480px) {
  .hero-trust--home { grid-template-columns: 1fr; }
  .hero-form-card { padding: var(--space-6); }
}

/* ============================================================
   2. TICKER — reuse framework strip, add inline icons
   ============================================================ */
.ticker-track .ticker-item { display: inline-flex; align-items: center; gap: var(--space-2); }
.ticker-track .ticker-item svg { width: 16px; height: 16px; color: rgba(255,255,255,0.85); }
.ticker-track .ticker-dot { color: rgba(255,255,255,0.55); }

/* ============================================================
   3. NUMBERED SECTION SHELL + section headers
   ============================================================ */
.numbered-section { position: relative; padding: clamp(4rem, 9vh, 7rem) 0; overflow: hidden; }
.numbered-section[data-num]::before {
  content: attr(data-num);
  position: absolute; top: -0.35em; right: 4%;
  font-family: var(--font-heading); font-weight: 800; line-height: 1;
  font-size: clamp(7rem, 18vw, 16rem);
  color: var(--color-primary); opacity: 0.04; z-index: 0; pointer-events: none;
}
.numbered-section > .container { position: relative; z-index: 1; }
.section-head { max-width: 46rem; margin-bottom: var(--space-10); }
.section-head--center { margin-left: auto; margin-right: auto; text-align: center; }
.section-head h2 { font-size: clamp(1.9rem, 3.5vw, var(--font-size-5xl)); line-height: 1.1; text-wrap: balance; margin: var(--space-2) 0 var(--space-4); }
.section-head .lead { color: var(--color-gray-dark); font-size: var(--font-size-lg); line-height: 1.7; }
.hero-answer { color: var(--color-gray-dark); font-size: var(--font-size-lg); line-height: 1.7; max-width: 44rem; }
.section-subtitle { display: block; font-family: var(--font-accent); color: var(--color-accent); font-size: var(--font-size-2xl); line-height: 1; margin-top: var(--space-2); }

/* ============================================================
   4. SERVICES — tinted image cards (required-components pattern)
   ============================================================ */
:root {
  --color-card-tint-1: rgba(var(--color-primary-rgb), 0.07);
  --color-card-tint-2: rgba(var(--color-secondary-rgb), 0.08);
  --color-card-tint-3: rgba(6, 182, 212, 0.10);
}
.services-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-6); }
@media (max-width: 1100px) { .services-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px)  { .services-grid { grid-template-columns: 1fr; } }
.card-tint-1 { background: var(--color-card-tint-1); }
.card-tint-2 { background: var(--color-card-tint-2); }
.card-tint-3 { background: var(--color-card-tint-3); }
.service-card-with-image {
  border-radius: var(--radius-lg); overflow: hidden; display: flex; flex-direction: column;
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.service-card-with-image:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
.service-card__image { position: relative; aspect-ratio: 5 / 3; overflow: hidden; }
.service-card__image img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.service-card-with-image:hover .service-card__image img { transform: scale(1.06); }
.service-card__body {
  padding: var(--space-6) var(--space-5) var(--space-5); text-align: center;
  display: flex; flex-direction: column; align-items: center; gap: var(--space-3);
  flex: 1;
}
.service-card__icon {
  width: 58px; height: 58px; border-radius: var(--radius-full);
  background: var(--color-white); box-shadow: var(--shadow-md);
  display: flex; align-items: center; justify-content: center;
  margin-top: -46px; color: var(--color-accent); position: relative; z-index: 1;
}
.service-card__icon svg { width: 26px; height: 26px; }
.service-card-with-image h3 { font-family: var(--font-heading); color: var(--color-primary); font-size: var(--font-size-xl); line-height: 1.15; margin: 0; }
.service-card__desc { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.55; margin: 0; }
.service-card-with-image ul {
  list-style: none; padding: var(--space-4) 0 0; margin: var(--space-1) 0 0; width: 100%;
  text-align: left; display: flex; flex-direction: column; gap: var(--space-2);
  border-top: 1px solid rgba(var(--color-primary-rgb), 0.08);
}
.service-card-with-image ul li { font-size: var(--font-size-sm); color: var(--color-gray-dark); padding-left: var(--space-6); position: relative; }
.service-card-with-image ul li::before { content: "✓"; position: absolute; left: 0; top: 0; color: var(--color-accent); font-weight: 700; }
.service-card__cta {
  margin-top: auto; padding-top: var(--space-4); width: 100%; text-align: center;
  border-top: 1px solid rgba(var(--color-primary-rgb), 0.08);
  color: var(--color-accent); font-weight: 700; font-size: var(--font-size-sm);
  transition: color var(--transition-base);
}
.service-card__cta::after { content: " →"; display: inline-block; transition: transform var(--transition-base); }
.service-card__cta:hover { color: var(--color-primary); }
.service-card__cta:hover::after { transform: translateX(4px); }
.services-cta { text-align: center; margin-top: var(--space-10); }

/* ============================================================
   5. STATS — accent band with counters
   ============================================================ */
.stats-band { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-dark-alt) 100%); padding: clamp(3rem, 7vh, 5rem) 0; position: relative; overflow: hidden; }
.stats-band::after {
  content: ""; position: absolute; inset: 0; opacity: 0.5; pointer-events: none;
  background: radial-gradient(circle at 15% 120%, rgba(var(--color-secondary-rgb), 0.5), transparent 45%);
}
.stats-row { position: relative; z-index: 1; display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-8); text-align: center; }
@media (max-width: 700px) { .stats-row { grid-template-columns: 1fr 1fr; gap: var(--space-6); } }
.stat-block .stat-number { font-family: var(--font-heading); font-size: clamp(2.6rem, 5vw, var(--font-size-6xl)); font-weight: 800; color: var(--color-white); line-height: 1; }
.stat-block .stat-number .unit { color: var(--color-accent); }
.stat-block .stat-label { display: block; margin-top: var(--space-3); color: rgba(255,255,255,0.82); font-size: var(--font-size-sm); text-transform: uppercase; letter-spacing: 1px; }

/* ============================================================
   6. MID CTA banner
   ============================================================ */
.cta-strip { position: relative; overflow: hidden; padding: clamp(3.5rem, 8vh, 6rem) 0; background: var(--color-accent); color: var(--color-white); }
.cta-strip::before {
  content: ""; position: absolute; inset: 0; opacity: 0.16; pointer-events: none;
  background:
    repeating-linear-gradient(45deg, rgba(0,0,0,0.5) 0 2px, transparent 2px 22px);
}
.cta-strip .container { position: relative; z-index: 1; display: flex; align-items: center; justify-content: space-between; gap: var(--space-8); flex-wrap: wrap; }
.cta-strip__text { max-width: 44rem; }
.cta-strip h2 { color: var(--color-white); font-size: clamp(1.8rem, 3.5vw, var(--font-size-4xl)); text-wrap: balance; margin-bottom: var(--space-3); }
.cta-strip p { color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); line-height: 1.6; }
.cta-strip .btn { background: var(--color-primary); color: var(--color-white); }
.cta-strip .btn:hover { background: var(--color-dark); }

/* ============================================================
   7. ABOUT / PROCESS — asymmetric broken grid + overlap stat card
   ============================================================ */
.about-grid { display: grid; grid-template-columns: 1.4fr 1fr; gap: var(--space-12); align-items: center; }
@media (max-width: 992px) { .about-grid { grid-template-columns: 1fr; gap: var(--space-10); } }
.about-copy p { color: var(--color-gray-dark); font-size: var(--font-size-base); line-height: 1.8; margin-bottom: var(--space-4); max-width: 60ch; }
.process-steps { display: grid; gap: var(--space-5); margin-top: var(--space-8); }
.process-step { display: grid; grid-template-columns: auto 1fr; gap: var(--space-5); align-items: start; }
.process-step__num {
  position: relative; width: 52px; height: 52px; flex-shrink: 0;
  border-radius: var(--radius-md); background: var(--color-primary); color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
}
.process-step__num svg { width: 24px; height: 24px; }
.process-step__num span {
  position: absolute; top: -8px; right: -8px; width: 24px; height: 24px; border-radius: var(--radius-full);
  background: var(--color-accent); color: var(--color-white); font-family: var(--font-heading);
  font-size: var(--font-size-xs); font-weight: 800; display: flex; align-items: center; justify-content: center;
}
.process-step h3 { font-size: var(--font-size-lg); color: var(--color-primary); margin-bottom: var(--space-1); }
.process-step p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; margin: 0; }
.about-media { position: relative; }
.about-media img { width: 100%; border-radius: var(--radius-xl); box-shadow: var(--shadow-lg); display: block; aspect-ratio: 3 / 4; object-fit: cover; }
.about-media::before {
  content: ""; position: absolute; top: calc(-1 * var(--space-5)); left: calc(-1 * var(--space-5));
  width: 55%; height: 55%; border: 3px solid var(--color-accent); border-radius: var(--radius-xl);
  z-index: -1;
}
.about-stat-card {
  position: absolute; right: calc(-1 * var(--space-5)); bottom: calc(-1 * var(--space-6));
  background: var(--color-white); box-shadow: var(--shadow-xl); border-radius: var(--radius-lg);
  padding: var(--space-5) var(--space-6); text-align: center; max-width: 12rem;
}
.about-stat-card .n { font-family: var(--font-heading); font-size: var(--font-size-5xl); font-weight: 800; color: var(--color-primary); line-height: 1; }
.about-stat-card .n .unit { color: var(--color-accent); }
.about-stat-card .l { display: block; margin-top: var(--space-2); font-size: var(--font-size-sm); color: var(--color-gray-dark); }
@media (max-width: 480px) { .about-stat-card { position: static; margin: var(--space-6) auto 0; max-width: none; } .about-media::before { display: none; } }

/* ============================================================
   8. TRUST / PROOF (dark) — honest, GBP-linked (no fabricated reviews)
   ============================================================ */
.proof-section { background: var(--color-dark); color: var(--color-white); padding: clamp(4rem, 9vh, 7rem) 0; position: relative; overflow: hidden; }
.proof-section::before {
  content: ""; position: absolute; inset: 0; opacity: 0.35; pointer-events: none;
  background: radial-gradient(circle at 85% 15%, rgba(var(--color-secondary-rgb), 0.55), transparent 50%);
}
.proof-section .container { position: relative; z-index: 1; }
.proof-section .section-head h2 { color: var(--color-white); }
.proof-section .section-head .lead { color: rgba(255,255,255,0.8); }
.proof-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); margin-top: var(--space-8); }
@media (max-width: 900px) { .proof-grid { grid-template-columns: 1fr; } }
.proof-card {
  background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius-lg); padding: var(--space-6);
  transition: transform var(--transition-base), background var(--transition-base);
}
.proof-card:hover { transform: translateY(-4px); background: rgba(255,255,255,0.08); }
.proof-card__icon { width: 48px; height: 48px; border-radius: var(--radius-md); background: rgba(var(--color-accent-rgb, 6,182,212), 0.16); color: var(--color-accent); display: flex; align-items: center; justify-content: center; margin-bottom: var(--space-4); }
.proof-card__icon svg { width: 24px; height: 24px; }
.proof-card h3 { color: var(--color-white); font-size: var(--font-size-lg); margin-bottom: var(--space-2); }
.proof-card p { color: rgba(255,255,255,0.78); font-size: var(--font-size-sm); line-height: 1.65; margin: 0; }
.proof-cta { margin-top: var(--space-10); text-align: center; display: flex; flex-direction: column; align-items: center; gap: var(--space-4); }
.gbp-link {
  display: inline-flex; align-items: center; gap: var(--space-3);
  background: var(--color-white); color: var(--color-primary);
  padding: var(--space-4) var(--space-6); border-radius: var(--radius-full); font-weight: 700;
  transition: transform var(--transition-fast), box-shadow var(--transition-base);
}
.gbp-link:hover { transform: translateY(-2px); box-shadow: var(--shadow-lg); }
.gbp-link svg { width: 20px; height: 20px; color: var(--color-star); }
.proof-cta small { color: rgba(255,255,255,0.6); font-size: var(--font-size-xs); }

/* ============================================================
   9. FAQ — two-column
   ============================================================ */
.faq-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-5) var(--space-8); }
@media (max-width: 800px) { .faq-grid { grid-template-columns: 1fr; } }
.faq-item { background: var(--color-white); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: var(--radius-md); padding: var(--space-6); }
.faq-item .faq-question { display: flex; align-items: flex-start; gap: var(--space-3); font-family: var(--font-heading); font-weight: 700; color: var(--color-primary); font-size: var(--font-size-lg); margin-bottom: var(--space-3); }
.faq-item .faq-question svg { width: 22px; height: 22px; color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.faq-item .faq-answer { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; }

/* ============================================================
   10. CLOSING CTA + section dividers
   ============================================================ */
.section-divider { display: block; width: 100%; height: auto; line-height: 0; }
.divider-fill-light { fill: var(--color-light); }
.divider-fill-dark { fill: var(--color-dark); }
.divider-fill-white { fill: var(--color-white); }
.closing-cta { position: relative; overflow: hidden; padding: clamp(4rem, 10vh, 8rem) 0; text-align: center; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-dark-alt) 100%); color: var(--color-white); }
.closing-cta::after { content: ""; position: absolute; inset: 0; opacity: 0.06; pointer-events: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.closing-cta .container { position: relative; z-index: 1; }
.closing-cta h2 { color: var(--color-white); font-size: clamp(2rem, 4vw, var(--font-size-5xl)); text-wrap: balance; margin-bottom: var(--space-4); max-width: 22ch; margin-left: auto; margin-right: auto; }
.closing-cta p { color: rgba(255,255,255,0.9); font-size: var(--font-size-lg); line-height: 1.7; max-width: 46rem; margin: 0 auto var(--space-8); }
.closing-cta .cta-actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }
.floating-accent { position: absolute; border-radius: var(--radius-full); background: rgba(var(--color-accent-rgb, 6,182,212), 0.10); pointer-events: none; z-index: 0; }
</style>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="hero hero--home" aria-label="Salt River Steel — custom steel gates, fencing and construction in Florence, AZ">
  <div class="hero-inner">
    <div class="hero-text">
      <span class="hero-eyebrow--home">
        <?php echo icon('shield-check'); ?>
        Serving Florence, AZ Since <?php echo $yearEstablished; ?>
      </span>
      <h1 class="hero-title">Steel Built for <span class="text-accent">Central Arizona</span> Construction</h1>
      <p class="hero-subtitle--home">
        Salt River Steel is a Florence-based steel construction company fabricating custom gates,
        fencing, and structural steel in-house. You get local expertise, desert-tough builds, and
        same-week delivery &mdash; without the freight costs and delays of out-of-state suppliers.
      </p>
      <div class="hero-actions">
        <a href="#estimate-form" class="btn btn-primary btn-lg">Get a Free Estimate</a>
        <a href="tel:<?php echo $phoneDigits; ?>" class="btn-ghost-white">
          <?php echo icon('phone'); ?> Call <?php echo $phone; ?>
        </a>
      </div>
      <div class="hero-trust--home">
        <span class="trust-pill"><?php echo icon('shield-check'); ?> Licensed &amp; Insured</span>
        <span class="trust-pill"><?php echo icon('award'); ?> <?php echo $yearsInBusiness; ?>+ Years in Florence</span>
        <span class="trust-pill"><?php echo icon('wrench'); ?> In-House Custom Fabrication</span>
        <span class="trust-pill"><?php echo icon('truck'); ?> Same-Week Delivery</span>
      </div>
    </div>

    <!-- Hero lead-capture form -->
    <aside class="hero-form-card" id="estimate-form">
      <h2>Get Your Free Estimate</h2>
      <p class="hero-form-tagline">No obligation. Same-day response from a local team.</p>
      <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
        <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_template" value="table">
        <input type="hidden" name="_subject" value="New estimate request from <?php echo htmlspecialchars($_SERVER['HTTP_HOST'] ?? $domain); ?>">
        <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">
        <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">
        <input type="hidden" name="form_location" value="hero">
        <input type="hidden" name="consent_version" value="v2.1">
        <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'] ?? '/'); ?>">

        <div class="form-row">
          <label for="hero-name" class="sr-only">Full name</label>
          <input type="text" id="hero-name" name="name" placeholder="Full name" required>
        </div>
        <div class="form-row">
          <label for="hero-phone" class="sr-only">Phone number</label>
          <input type="tel" id="hero-phone" name="phone" placeholder="Phone number" required>
        </div>
        <div class="form-row">
          <label for="hero-zip" class="sr-only">ZIP code</label>
          <input type="text" id="hero-zip" name="zip" placeholder="ZIP code" pattern="[0-9]{5}" inputmode="numeric" required>
        </div>
        <div class="form-row">
          <label for="hero-service" class="sr-only">What do you need?</label>
          <select name="service_requested" id="hero-service">
            <option value="">What do you need?</option>
            <?php foreach ($services as $service): ?>
            <option value="<?php echo htmlspecialchars($service['name']); ?>"><?php echo htmlspecialchars($service['name']); ?></option>
            <?php endforeach; ?>
            <option value="Other / Not sure">Other / Not sure</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Get My Free Estimate</button>
        <p class="form-footnote">By submitting, you agree to our <a href="/terms/">Terms</a> and <a href="/privacy-policy/">Privacy Policy</a>.</p>
      </form>
    </aside>
  </div>
</section>

<!-- ============================================================
     TICKER STRIP
     ============================================================ -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <?php
    $tickerItems = [
        ['calendar',      'Established ' . $yearEstablished],
        ['shield-check',  'Licensed &amp; Insured'],
        ['wrench',        'In-House Fabrication'],
        ['home',          'Custom Steel Gates'],
        ['ruler',         'Steel Fencing'],
        ['building-2',    'Commercial &amp; Industrial'],
        ['truck',         'Same-Week Delivery'],
        ['map-pin',       'Florence, AZ'],
        ['hard-hat',      'Structural Steel'],
        ['thumbs-up',     'Central Arizona Local'],
    ];
    // Rendered twice for a seamless -50% loop
    for ($t = 0; $t < 2; $t++):
        foreach ($tickerItems as $item): ?>
          <span class="ticker-item"><?php echo icon($item[0]); ?> <?php echo $item[1]; ?></span>
          <span class="ticker-dot" aria-hidden="true">•</span>
    <?php endforeach; endfor; ?>
  </div>
</div>

<!-- ============================================================
     01 · SERVICES
     ============================================================ -->
<section class="numbered-section" data-num="01" aria-label="Steel construction services">
  <div class="container">
    <div class="section-head" data-animate>
      <span class="eyebrow-label">What We Do</span>
      <h2>What steel services does <span class="text-accent">Salt River Steel</span> build in Florence?</h2>
      <p class="hero-answer">
        Salt River Steel fabricates and installs custom steel gates, steel fencing, and commercial,
        residential, and industrial steelwork from our Florence, AZ shop. Every project is cut, welded,
        and finished in-house, so contractors and property owners across Central Arizona get durable,
        desert-ready steel on a local timeline.
      </p>
    </div>

    <div class="services-grid">
      <?php
      $tints = [1, 2, 3];
      $i = 0;
      foreach ($services as $service):
          $slug = $service['slug'];
          $card = $serviceCards[$slug];
          $tint = $tints[$i % 3] ; $delay = ($i % 3) + 1;
          $ic   = $serviceIcons[$slug] ?? 'wrench';
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $delay; ?>" data-animate>
        <div class="service-card__image">
          <img src="/assets/images/<?php echo $card['img']; ?>.jpg"
               srcset="/assets/images/<?php echo $card['img']; ?>-480.webp 480w, /assets/images/<?php echo $card['img']; ?>-960.webp 960w, /assets/images/<?php echo $card['img']; ?>-1600.webp 1600w"
               sizes="(max-width: 600px) 100vw, (max-width: 1100px) 50vw, 300px"
               alt="<?php echo htmlspecialchars($card['alt']); ?>" width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($ic); ?></div>
          <h3><?php echo htmlspecialchars($service['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($service['description']); ?></p>
          <ul>
            <?php foreach ($card['bul'] as $b): ?>
            <li><?php echo htmlspecialchars($b); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?php echo $slug; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php $i++; endforeach; ?>
    </div>

    <div class="services-cta" data-animate>
      <a href="/services/" class="btn btn-secondary btn-lg">View All Services</a>
    </div>
  </div>
</section>

<!-- ============================================================
     STATS BAND
     ============================================================ -->
<section class="stats-band" aria-label="Salt River Steel by the numbers">
  <div class="container">
    <div class="stats-row">
      <div class="stat-block" data-animate>
        <div class="stat-number"><span data-counter="<?php echo $yearsInBusiness; ?>">0</span><span class="unit">+</span></div>
        <span class="stat-label">Years serving Florence</span>
      </div>
      <div class="stat-block" data-animate class="reveal-delay-1">
        <div class="stat-number"><span data-counter="<?php echo count($services); ?>">0</span></div>
        <span class="stat-label">Core steel services</span>
      </div>
      <div class="stat-block" data-animate>
        <div class="stat-number">3&ndash;5</div>
        <span class="stat-label">Day typical turnaround</span>
      </div>
      <div class="stat-block" data-animate>
        <div class="stat-number"><span data-counter="100">0</span><span class="unit">%</span></div>
        <span class="stat-label">Local in-house fabrication</span>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     MID CTA
     ============================================================ -->
<section class="cta-strip" aria-label="Request a quote">
  <div class="container">
    <div class="cta-strip__text">
      <h2>Have a steel project on a deadline?</h2>
      <p>Skip the out-of-state wait. Salt River Steel fabricates locally in Florence and can prioritize rush jobs for Central Arizona contractors and property owners.</p>
    </div>
    <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-lg">Call <?php echo $phone; ?></a>
  </div>
</section>

<!-- ============================================================
     02 · ABOUT / PROCESS
     ============================================================ -->
<section class="numbered-section section--light" data-num="02" aria-label="About Salt River Steel and how we work">
  <div class="container">
    <div class="about-grid">
      <div class="about-copy">
        <div class="section-head" data-animate>
          <span class="eyebrow-label">Local Steel Experts</span>
          <h2>The Central Arizona steel partner contractors call first</h2>
          <span class="section-subtitle">rooted in Florence</span>
        </div>
        <p data-animate>
          Salt River Steel has been solving steel problems for Florence-area contractors, ranchers, and
          builders since <?php echo $yearEstablished; ?>. We know what Central Arizona construction demands
          &mdash; from agricultural equipment and industrial structures to residential additions &mdash; and we
          build steel that stands up to the heat, sun, and monsoon season.
        </p>
        <p data-animate>
          This is a hands-on, owner-involved operation. When you call, you talk to the people who cut and weld
          your steel. That direct relationship means faster answers, competitive local pricing, and none of the
          procurement headaches or freight premiums that come with distant Phoenix or out-of-state suppliers.
        </p>

        <div class="process-steps">
          <?php $sn = 1; foreach ($processSteps as $step): ?>
          <div class="process-step" data-animate class="reveal-delay-<?php echo $sn; ?>">
            <div class="process-step__num">
              <?php echo icon($step['icon']); ?>
              <span><?php echo $sn; ?></span>
            </div>
            <div>
              <h3><?php echo htmlspecialchars($step['title']); ?></h3>
              <p><?php echo htmlspecialchars($step['text']); ?></p>
            </div>
          </div>
          <?php $sn++; endforeach; ?>
        </div>
      </div>

      <div class="about-media" data-animate class="reveal-right">
        <img src="/assets/images/home-team-at-work.jpg"
             srcset="/assets/images/home-team-at-work-480.webp 480w, /assets/images/home-team-at-work-960.webp 960w, /assets/images/home-team-at-work-1600.webp 1600w"
             sizes="(max-width: 992px) 100vw, 420px"
             alt="Salt River Steel crew installing custom steel fencing at a Florence, AZ job site"
             width="600" height="800" loading="lazy">
        <div class="about-stat-card">
          <div class="n">Since<br><?php echo $yearEstablished; ?></div>
          <span class="l">Fabricating steel in Florence, AZ</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     03 · TRUST / PROOF (honest, GBP-linked)
     ============================================================ -->
<section class="proof-section" data-num="03" aria-label="Why choose Salt River Steel">
  <div class="container">
    <div class="section-head section-head--center" data-animate>
      <span class="eyebrow-label">Why Salt River Steel</span>
      <h2>Why Central Arizona builders choose local steel</h2>
      <p class="lead">Five reasons contractors, ranchers, and property owners around Florence keep coming back to Salt River Steel for gates, fencing, and structural steel.</p>
    </div>

    <div class="proof-grid">
      <?php
      $proofIcons = ['map-pin', 'wrench', 'truck', 'shield-check', 'users'];
      $pi = 0;
      $proofTitles = [
          'Local Florence fabrication',
          'True custom capabilities',
          'Same-week turnaround',
          'Desert-tough steel',
          'Direct, hands-on service',
      ];
      foreach ($research_brief_diffs = [
          'A Florence-based supplier with rapid turnaround, not a distant Phoenix or out-of-state warehouse.',
          'Custom fabrication for agricultural, construction, and industrial projects specific to Central Arizona.',
          'Most custom orders ship in 3&ndash;5 business days, with rush options for tight project deadlines.',
          'Grades and finishes chosen to resist Arizona heat, sun, and monsoon-season corrosion.',
          'You work directly with the owner and crew who fabricate your steel &mdash; no runaround, no middlemen.',
      ] as $diff): ?>
      <div class="proof-card reveal-delay-<?php echo ($pi % 3) + 1; ?>" data-animate>
        <div class="proof-card__icon"><?php echo icon($proofIcons[$pi]); ?></div>
        <h3><?php echo $proofTitles[$pi]; ?></h3>
        <p><?php echo $diff; ?></p>
      </div>
      <?php $pi++; endforeach; ?>
    </div>

    <div class="proof-cta" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" class="gbp-link" target="_blank" rel="noopener">
        <?php echo icon('star'); ?> See Salt River Steel on Google
      </a>
      <small>Read reviews and see recent projects on our Google Business Profile.</small>
    </div>
  </div>
</section>

<!-- ============================================================
     04 · FAQ
     ============================================================ -->
<section class="numbered-section" data-num="04" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-head section-head--center" data-animate>
      <span class="eyebrow-label">Answers</span>
      <h2>Common questions about our steel &amp; fabrication</h2>
      <p class="lead">Straight answers on turnaround, delivery, custom work, and materials from the Salt River Steel team.</p>
    </div>

    <div class="faq-grid">
      <?php foreach ($faqs as $faq): ?>
      <div class="faq-item" data-animate>
        <div class="faq-question">
          <?php echo icon('info'); ?>
          <span><?php echo htmlspecialchars($faq['question']); ?></span>
        </div>
        <div class="faq-answer"><?php echo $faq['answer']; ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================================================
     CLOSING CTA
     ============================================================ -->
<section class="closing-cta" aria-label="Get started with Salt River Steel">
  <span class="floating-accent" style="width:220px;height:220px;top:-60px;left:-40px;"></span>
  <span class="floating-accent" style="width:140px;height:140px;bottom:-30px;right:8%;"></span>
  <div class="container">
    <h2>Let's build steel that lasts in the Arizona sun</h2>
    <p>
      Whether you need a custom gate, a run of steel fencing, or structural steel for a commercial build,
      Salt River Steel gives you a free estimate and a local team that answers the phone. Serving Florence
      and Central Arizona.
    </p>
    <div class="cta-actions">
      <a href="#estimate-form" class="btn btn-primary btn-lg">Get a Free Estimate</a>
      <a href="tel:<?php echo $phoneDigits; ?>" class="btn-ghost-white"><?php echo icon('phone'); ?> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<script>
/* Fail-open reveals: mark JS active, then let framework's IntersectionObserver
   ([data-animate] → .animated) run. Safety net forces reveal after 2.4s. */
(function () {
  document.documentElement.classList.add('js-anim');
  window.addEventListener('load', function () {
    setTimeout(function () {
      document.querySelectorAll('[data-animate]:not(.animated)').forEach(function (el) {
        el.classList.add('animated');
      });
    }, 2400);
  });
})();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';
?>
<?php
/* ============================================================
   index.php — Salt River Steel LLC — Homepage (Phase 3)
   Premium tier. All client photos localized in /assets/images/
   and pixel-verified to match their alt text (session 3e).
   ============================================================ */

$currentPage      = 'home';
$pageTitle        = 'Steel Gates, Fencing & Construction | Salt River Steel | Florence, AZ';
$pageDescription  = 'Salt River Steel LLC builds custom steel gates, fencing, and commercial, residential & industrial steel in Florence, AZ. Local fabrication, same-week delivery. Free estimates.';
$canonicalUrl     = $siteUrl . '/';
$pageCanonical    = $canonicalUrl;                 // head.php reads $pageCanonical
$ogImage          = $siteUrl . '/assets/images/og-salt-river-steel.jpg';
$heroPreloadImage = '';                            // hero is a discoverable <img fetchpriority="high"> — no separate preload

/* ---------- Homepage FAQs (from research_brief + one local item; all factual) ---------- */
$faqs = [
    [
        'question' => 'How quickly can Salt River Steel deliver orders to local projects?',
        'answer'   => 'Most custom orders ship within 3–5 business days from our Florence facility — significantly faster than out-of-state suppliers. We keep common stock items on hand for rush jobs across Central Arizona.',
    ],
    [
        'question' => 'Do you offer custom steel fabrication for non-standard projects?',
        'answer'   => 'Yes. Salt River Steel works directly with contractors and property owners on custom designs for agricultural structures, industrial equipment, architectural features, and commercial builds. Our in-house team handles specialized cuts, welding, and finishing.',
    ],
    [
        'question' => 'What steel products and grades do you stock?',
        'answer'   => 'We carry structural steel, plate steel, tubing, angle iron, and specialty grades chosen to hold up to Arizona\'s heat and monsoon conditions. Call us for specific grade availability and recommendations for your project.',
    ],
    [
        'question' => 'Do you deliver to job sites, or is pickup only?',
        'answer'   => 'Both. Salt River Steel delivers to Central Arizona job sites and also offers pickup at our Florence location. Delivery rates depend on distance and load size.',
    ],
    [
        'question' => 'Can you work with tight project timelines or expedited orders?',
        'answer'   => 'Absolutely. As a local Florence operation, we work directly with your team to prioritize rush jobs. Call ' . $phone . ' for expedited fabrication options and pricing.',
    ],
    [
        'question' => 'Where is Salt River Steel located and what areas do you serve?',
        'answer'   => 'Salt River Steel LLC is based at 12356 E Pot O Gold Trail in Florence, AZ, and serves Florence and the surrounding Central Arizona communities with steel gates, fencing, and commercial, residential, and industrial fabrication.',
    ],
];
$faqSchema = generateFAQSchema($faqs);

/* ---------- Process steps ---------- */
$processSteps = [
    ['num' => '1', 'icon' => 'ruler',    'title' => 'Consult & Measure',  'text' => 'We review your plans on-site or by phone, confirm dimensions, and recommend the right grade for the job and the desert climate.'],
    ['num' => '2', 'icon' => 'pen-tool', 'title' => 'Design & Quote',     'text' => 'You get a clear, itemized quote and a realistic turnaround before any steel is cut — no vague estimates, no surprise freight.'],
    ['num' => '3', 'icon' => 'hammer',   'title' => 'Fabricate In-House', 'text' => 'Our Florence team handles specialized cuts, welding, and finishing — most custom orders are ready in 3–5 business days.'],
    ['num' => '4', 'icon' => 'truck',    'title' => 'Deliver or Install', 'text' => 'We deliver to your Central Arizona job site or set it for pickup — and coordinate install where the project calls for it.'],
];

/* ---------- Service card media (pixel-verified slug photos on disk) + icons + bullets ---------- */
$serviceMedia = [
    'custom-steel-gates'            => ['img' => 'custom-steel-ranch-entry-gate',            'icon' => 'shield-check', 'alt' => 'Custom steel ranch entry gate with overhead header and wood-infill panels fabricated by Salt River Steel in Florence, AZ',              'bullets' => ['Driveway & entry gates', 'Security & ranch gates', 'Built to fit your property']],
    'steel-fencing'                 => ['img' => 'steel-ranch-rail-fence-florence',                 'icon' => 'ruler',        'alt' => 'Three-rail steel ranch fencing installed by Salt River Steel in Florence, Arizona',                 'bullets' => ['Ranch & property fencing', 'Wrought-iron & tube steel', 'Corrosion-resistant finishes']],
    'commercial-steel-construction' => ['img' => 'commercial-steel-building-construction', 'icon' => 'building-2',   'alt' => 'Commercial steel building under construction with a telehandler lift, built by Salt River Steel near Florence, AZ',  'bullets' => ['Structural steel framing', 'Commercial buildings & shops', 'Contractor-ready delivery']],
    'residential-steel-work'        => ['img' => 'residential-steel-casita-building',        'icon' => 'home',         'alt' => 'Residential corrugated-steel building with wood accents built by Salt River Steel in Central Arizona',                    'bullets' => ['Railings, stairs & carports', 'Metal-clad additions', 'Architectural metalwork']],
    'industrial-steel-fabrication'  => ['img' => 'steel-frame-erection-red-iron',  'icon' => 'hammer',       'alt' => 'Red-iron steel building frame being erected by Salt River Steel in Florence, Arizona',      'bullets' => ['Heavy-duty fabrication', 'Certified welding', 'Job-site-tough builds']],
];

/* Recent-work gallery — every photo is a Salt River Steel job from the client's own photo pool. */
$galleryItems = [
    ['img' => 'steel-shop-building-dusk-florence',   'wide' => true,  'tag' => 'Steel Buildings', 'caption' => 'Two-bay steel shop, lit up after the slab pour',           'alt' => 'Steel shop building with two roll-up bays lit at dusk, built by Salt River Steel near Florence, AZ'],
    ['img' => 'mare-motel-stalls-covered',           'wide' => false, 'tag' => 'Barns',           'caption' => 'Covered mare motel with welded pipe stalls',              'alt' => 'Covered mare motel with pipe stall panels built by Salt River Steel in Central Arizona'],
    ['img' => 'custom-steel-ranch-entry-gate',       'wide' => false, 'tag' => 'Gates',           'caption' => 'Ranch entry gate with overhead header',                   'alt' => 'Custom steel ranch entry gate with overhead header and wood-infill panels fabricated by Salt River Steel in Florence, AZ'],
    ['img' => 'covered-riding-arena-steel',          'wide' => true,  'tag' => 'Barns',           'caption' => 'Clear-span covered riding arena',                         'alt' => 'Covered steel riding arena with clear-span roof built by Salt River Steel'],
    ['img' => 'three-rail-steel-fence-ranch',        'wide' => false, 'tag' => 'Fencing',         'caption' => 'Three-rail welded steel ranch fence',                     'alt' => 'Three-rail welded steel ranch fence installed by Salt River Steel in Central Arizona'],
    ['img' => 'pool-ramada-pavers-arizona',          'wide' => false, 'tag' => 'Residential',     'caption' => 'Pool ramada over a paver patio',                          'alt' => 'Steel pool ramada over a paver patio built by Salt River Steel at an Arizona home'],
    ['img' => 'white-steel-building-exterior',       'wide' => true,  'tag' => 'Steel Buildings', 'caption' => 'Finished steel building, Florence',                       'alt' => 'Completed white steel building exterior by Salt River Steel in Florence, AZ'],
    ['img' => 'corrugated-privacy-panels-yard',      'wide' => false, 'tag' => 'Fencing',         'caption' => 'Corrugated steel privacy panels',                         'alt' => 'Corrugated steel privacy panels enclosing a yard, installed by Salt River Steel'],
    ['img' => 'steel-frame-erection-red-iron',       'wide' => false, 'tag' => 'Fabrication',     'caption' => 'Red-iron frame going up',                                 'alt' => 'Red-iron steel building frame being erected by Salt River Steel in Florence, Arizona'],
    ['img' => 'steel-shop-interior-roll-up-doors',   'wide' => true,  'tag' => 'Steel Buildings', 'caption' => 'Finished shop interior with roll-up doors',               'alt' => 'Interior of a finished steel shop with roll-up doors built by Salt River Steel'],
    ['img' => 'metal-roof-panel-install',            'wide' => false, 'tag' => 'Roofing',         'caption' => 'Metal roof panels going on',                              'alt' => 'Crew installing metal roof panels on a Salt River Steel building'],
    ['img' => 'pipe-corral-gate-ranch',              'wide' => false, 'tag' => 'Gates',           'caption' => 'Welded pipe corral gate',                                 'alt' => 'Welded pipe corral gate and fencing installed by Salt River Steel on a ranch property'],
];

/* ---------- Why-us proof cards (differentiators — NO fabricated reviews; reviews array is empty) ---------- */
$whyCards = [
    ['map-pin',      'Local Florence Fabrication', 'Steel is cut and welded right here in Florence — rapid turnaround versus distant Phoenix and out-of-state suppliers.'],
    ['hammer',       'Custom Work, Any Project',   'Agricultural structures, industrial equipment, architectural features, commercial builds — our in-house team handles the non-standard jobs.'],
    ['users',        'Direct, Straight Answers',   'Property owners and contractors work directly with the crew doing the work, cutting procurement complexity out of the middle.'],
    ['shield-check', 'Built for the Desert',       'We spec for Arizona\'s heat, dust, and monsoon conditions — corrosion resistance and thermal performance built into the recommendation.'],
    ['truck',        'No Premium Freight',         'Competitive local pricing without the freight surcharges that come with hauling steel in from another state.'],
    ['clock',        'Rush Jobs Prioritized',      'On a deadline? As a local operation we can move quickly — call for expedited fabrication options and pricing.'],
];

/* ---------- Ticker proof items ---------- */
$tickerItems = [
    ['award', 'Licensed &amp; Insured'],
    ['map-pin', 'Florence, AZ Fabrication'],
    ['clock', '3–5 Day Custom Turnaround'],
    ['truck', 'Local Job-Site Delivery'],
    ['hammer', 'In-House Cutting &amp; Welding'],
    ['building-2', 'Commercial • Residential • Industrial'],
    ['shield-check', 'Desert-Grade Steel'],
    ['users', 'Contractor Partnerships'],
    ['ruler', 'Custom Gates &amp; Fencing'],
    ['calendar', 'Serving Central AZ Since ' . $yearEstablished],
];
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<style>
/* ============================================================
   HOMEPAGE PAGE-SPECIFIC STYLES (Phase 3 — Premium tier)
   Page-scoped. Brand values use var() tokens; rgba white/black
   is reserved for glass/overlay treatments (framework convention).
   ============================================================ */

/* ---- Card-tint tokens (required-components recipe) ---- */
:root {
  /* Self-define accent-rgb so the page is token-compliant even if framework.css lacks it */
  --color-accent-rgb: 200, 70, 26;
  --color-card-tint-1: rgba(var(--color-primary-rgb), 0.07);
  --color-card-tint-2: rgba(var(--color-secondary-rgb), 0.09);
  --color-card-tint-3: rgba(var(--color-accent-rgb), 0.10);   /* accent @ 10% */
  --hp-line: rgba(var(--color-primary-rgb), 0.10);
  --hp-glass: rgba(255, 255, 255, 0.96);
}

.sr-only {
  position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px;
  overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap; border: 0;
}

/* ============================================================
   1. HERO — layered, 60/40 split with lead-capture card
   ============================================================ */
.hero-modern {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  padding: 170px 0 var(--space-16);
  overflow: hidden;
  isolation: isolate;
}
.hero-bg-img {
  position: absolute; inset: 0; z-index: -3;
  width: 100%; height: 100%;
  object-fit: cover; object-position: center;
}
/* ::before — brand gradient wash for legibility */
.hero-modern::before {
  content: ""; position: absolute; inset: 0; z-index: -2;
  background:
    radial-gradient(60% 80% at 100% 100%, rgba(var(--color-accent-rgb), 0.28) 0%, transparent 70%),
    linear-gradient(105deg,
    rgba(var(--color-primary-rgb), 0.94) 0%,
    rgba(var(--color-primary-rgb), 0.80) 42%,
    rgba(var(--color-secondary-rgb), 0.50) 100%);
}
/* ::after — subtle noise/texture layer */
.hero-modern::after {
  content: ""; position: absolute; inset: 0; z-index: -1; opacity: 0.5;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
}
.hero-modern .container {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: var(--space-12);
  align-items: center;
  width: 100%;
}
.hero-text { color: var(--color-white); max-width: 640px; }
.hero-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 2px;
  color: var(--color-white);
  background: rgba(var(--color-secondary-rgb), 0.45);
  border: 1px solid rgba(255,255,255,0.25);
  padding: var(--space-2) var(--space-4); border-radius: var(--radius-full);
  margin-bottom: var(--space-5);
}
.hero-eyebrow svg { color: var(--color-accent); }
.hero-title {
  color: var(--color-white);
  font-size: clamp(2.4rem, 5vw, 3.6rem);
  line-height: 1.05; margin-bottom: var(--space-5);
}
.hero-title .text-accent { color: var(--color-accent); display: inline-block; }
.hero-subtitle {
  color: rgba(255,255,255,0.92);
  font-size: var(--font-size-lg); line-height: 1.7;
  margin-bottom: var(--space-8); max-width: 56ch;
}
.hero-actions { display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-8); }
.hero-actions .btn { box-shadow: var(--shadow-lg); }
.hero-trust {
  display: grid; grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: var(--space-3) var(--space-5); max-width: 520px;
  padding-top: var(--space-6); border-top: 1px solid rgba(255,255,255,0.18);
}
.hero-trust-item {
  display: flex; align-items: center; gap: var(--space-2);
  color: rgba(255,255,255,0.92); font-size: var(--font-size-sm); font-weight: 500;
}
.hero-trust-item svg { color: var(--color-accent); flex-shrink: 0; }

/* ---- Hero lead-capture card (glassmorphism) ---- */
.hero-form-card {
  background: var(--hp-glass);
  backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(255,255,255,0.5);
  border-radius: var(--radius-xl);
  box-shadow: var(--shadow-xl);
  padding: var(--space-8);
}
.hero-form-card h2 { font-size: var(--font-size-2xl); margin-bottom: var(--space-1); color: var(--color-dark); }
.hero-form-tagline { color: var(--color-gray); font-size: var(--font-size-sm); margin-bottom: var(--space-5); }
.hero-form .form-row { margin-bottom: var(--space-3); }
.hero-form input, .hero-form select {
  width: 100%; min-height: 52px; padding: var(--space-4);
  border: 1.5px solid var(--color-gray-light); border-radius: var(--radius-md);
  font: inherit; font-size: var(--font-size-sm); background: var(--color-white);
  transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
}
.hero-form input:focus, .hero-form select:focus {
  outline: none; border-color: var(--color-primary);
  box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.14);
}
.btn-block { width: 100%; margin-top: var(--space-2); }

/* Compact TCPA consent checkbox (hero/inline form pattern) */
.p1-consent-line {
  display: flex; align-items: flex-start; gap: var(--space-3);
  font-size: var(--font-size-xs); line-height: 1.5; color: var(--color-gray-dark);
  margin: var(--space-4) 0 var(--space-3); cursor: pointer;
}
.p1-consent-line input[type="checkbox"] {
  width: 18px; height: 18px; margin-top: 2px; flex-shrink: 0;
  accent-color: var(--color-primary); cursor: pointer;
}
.p1-consent-line span { flex: 1; }
.p1-consent-line a { color: var(--color-primary); text-decoration: underline; }

.form-footnote { font-size: var(--font-size-xs); color: var(--color-gray); text-align: center; margin: var(--space-3) 0 0; line-height: 1.5; }
.form-footnote a { color: var(--color-primary); text-decoration: underline; }

/* ============================================================
   2. NUMBERED SECTIONS + section titles + dividers
   ============================================================ */
.svc-section { background: var(--color-white); }
/* Divider style A — angled slab at the top of the services section */
.svc-section::before {
  content: ""; position: absolute; top: -1px; left: 0; right: 0; height: 70px;
  background: var(--color-white);
  clip-path: polygon(0 100%, 100% 0, 100% 100%, 0 100%);
}
.numbered-section { position: relative; }
.numbered-section .num-watermark {
  position: absolute; top: var(--space-8); right: 5%; z-index: 0;
  font-family: var(--font-heading); font-weight: 800; line-height: 1;
  font-size: clamp(6rem, 16vw, 12rem);
  color: var(--hp-line); pointer-events: none; user-select: none;
}
.numbered-section .container { position: relative; z-index: 1; }
.section-title { text-align: center; max-width: 760px; margin: 0 auto var(--space-12); }
.section-title h2 { font-size: clamp(1.9rem, 3.5vw, 2.6rem); margin: var(--space-2) 0 var(--space-4); }
.hero-answer { color: var(--color-gray-dark); font-size: var(--font-size-lg); line-height: 1.7; margin: 0 auto var(--space-3); max-width: 60ch; }
.section-subtitle { display: block; font-family: var(--font-accent); color: var(--color-accent); font-size: 1.7rem; line-height: 1; }

/* ============================================================
   3. SERVICES — tinted image cards (required-components pattern)
   ============================================================ */
.services-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-6); }
/* featured first service: 2x2 tile — kills the orphan-fifth-card row */
.services-grid > .service-card-with-image { position: relative; }
.services-grid > .service-card-with-image:first-child { grid-column: span 2; grid-row: span 2; }
.services-grid > .service-card-with-image:first-child .service-card__image { aspect-ratio: auto; flex: 1 1 auto; min-height: 340px; }
.services-grid > .service-card-with-image:first-child .service-card__body { padding-inline: var(--space-8); }
.services-grid > .service-card-with-image:first-child h3 { font-size: var(--font-size-2xl); }
.services-grid > .service-card-with-image:first-child .service-card__desc { font-size: var(--font-size-base); max-width: 52ch; }
.services-grid > .service-card-with-image:first-child ul { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-2) var(--space-4); }
.services-grid > .service-card-with-image:first-child::after { content: "Most requested"; position: absolute; top: var(--space-4); left: var(--space-4); z-index: 2; font-family: var(--font-accent); font-weight: 700; font-size: var(--font-size-sm); letter-spacing: 0.14em; text-transform: uppercase; color: var(--color-white); background: var(--color-accent); padding: 0.35rem 0.7rem; border-radius: var(--radius-sm); box-shadow: var(--shadow-md); }
@media (max-width: 1100px) { .services-grid { grid-template-columns: repeat(2, 1fr); } .services-grid > .service-card-with-image:first-child { grid-row: auto; } .services-grid > .service-card-with-image:first-child .service-card__image { aspect-ratio: 16 / 9; min-height: 0; } }
@media (max-width: 560px)  { .services-grid { grid-template-columns: 1fr; } .services-grid > .service-card-with-image:first-child { grid-column: auto; } .services-grid > .service-card-with-image:first-child ul { grid-template-columns: 1fr; } }

.service-card-with-image {
  border-radius: var(--radius-lg); overflow: hidden;
  display: flex; flex-direction: column; background: var(--color-white);
  border: 1px solid var(--hp-line);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.service-card-with-image:hover { transform: translateY(-6px); box-shadow: var(--shadow-xl); }
.card-tint-1 { background: var(--color-card-tint-1); }
.card-tint-2 { background: var(--color-card-tint-2); }
.card-tint-3 { background: var(--color-card-tint-3); }
.service-card__image { position: relative; aspect-ratio: 5 / 3; overflow: hidden; }
.service-card__image img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.service-card-with-image:hover .service-card__image img { transform: scale(1.06); }
.service-card__body {
  padding: var(--space-8) var(--space-5) var(--space-5);
  text-align: center; display: flex; flex-direction: column;
  align-items: center; gap: var(--space-2); position: relative; flex: 1;
}
.service-card__icon {
  width: 56px; height: 56px; border-radius: var(--radius-full);
  background: var(--color-white); box-shadow: var(--shadow-md);
  display: flex; align-items: center; justify-content: center;
  margin-top: -46px; margin-bottom: var(--space-1); color: var(--color-accent);
}
.service-card__icon svg { width: 26px; height: 26px; }
.service-card-with-image h3 { color: var(--color-primary); margin: 0; font-size: var(--font-size-xl); }
.service-card__desc { color: var(--color-gray-dark); margin: 0; font-size: var(--font-size-sm); line-height: 1.55; }
.service-card-with-image ul {
  list-style: none; padding: var(--space-4) 0 0; margin: var(--space-2) 0 0;
  width: 100%; text-align: left; display: flex; flex-direction: column; gap: var(--space-2);
  border-top: 1px solid var(--hp-line);
}
.service-card-with-image ul li { font-size: var(--font-size-sm); color: var(--color-gray-dark); padding-left: 1.4rem; position: relative; }
.service-card-with-image ul li::before { content: "▸"; color: var(--color-accent); font-weight: 700; position: absolute; left: 0.3rem; top: 0; }
.service-card__cta {
  margin-top: auto; padding: var(--space-4) 0 0; width: 100%; text-align: center;
  color: var(--color-primary); font-weight: 700; font-size: var(--font-size-sm);
  border-top: 1px solid var(--hp-line); transition: color var(--transition-fast);
}
.service-card__cta::after { content: " →"; display: inline-block; transition: transform var(--transition-base); }
.service-card__cta:hover { color: var(--color-accent); }
.service-card__cta:hover::after { transform: translateX(4px); }
.services-cta { text-align: center; margin-top: var(--space-10); }

/* ============================================================
   4. STATS BAND (dark, animated counters)
   ============================================================ */
.stats-band { background: linear-gradient(120deg, var(--color-dark) 0%, var(--color-dark-alt) 48%, var(--color-primary) 100%); padding-top: calc(clamp(4rem, 10vh, 8rem) + 3vw); }
.stats-band .container { position: relative; z-index: 1; }
.stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-8); text-align: center; }
@media (max-width: 700px) { .stats-row { grid-template-columns: 1fr 1fr; gap: var(--space-8) var(--space-6); } }
.stat-item .stat-number { font-family: var(--font-accent); font-size: clamp(2.4rem, 4.6vw, 3.6rem); font-weight: 700; text-transform: uppercase; letter-spacing: 0.04em; color: var(--color-white); line-height: 1; }
.stat-item .stat-number span { color: var(--color-accent-bright); }
.stat-item { padding: var(--space-4) 0; border-left: 1px solid rgba(255,255,255,0.1); }
.stat-item:first-child { border-left: 0; }
@media (max-width: 700px) { .stat-item:nth-child(3) { border-left: 0; } }
.stat-item .stat-label { display: block; margin-top: var(--space-3); font-size: var(--font-size-sm); text-transform: uppercase; letter-spacing: 1px; color: rgba(255,255,255,0.82); }

/* ============================================================
   5. MID CTA BAND (radial-glow signature treatment)
   ============================================================ */
.cta-band { position: relative; background: var(--color-dark); overflow: hidden; }
.cta-band::before {
  content: ""; position: absolute; inset: 0; opacity: 0.35;
  background: radial-gradient(circle at 20% 30%, rgba(var(--color-accent-rgb),0.35), transparent 45%),
              radial-gradient(circle at 85% 70%, rgba(var(--color-secondary-rgb),0.5), transparent 50%);
}
.cta-band .container { position: relative; z-index: 1; text-align: center; max-width: 720px; }
.cta-band h2 { color: var(--color-white); font-size: clamp(1.8rem, 3.5vw, 2.6rem); margin-bottom: var(--space-4); }
.cta-band p { color: rgba(255,255,255,0.9); margin-bottom: var(--space-8); font-size: var(--font-size-lg); }
.cta-band-actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }

/* ============================================================
   6. ABOUT / PROCESS — asymmetric split + overlapping stat card
   ============================================================ */
.about-grid { display: grid; grid-template-columns: 1.35fr 1fr; gap: var(--space-16); align-items: center; }
@media (max-width: 900px) { .about-grid { grid-template-columns: 1fr; gap: var(--space-12); } }
.about-left h2 { font-size: clamp(1.9rem, 3.5vw, 2.6rem); margin: var(--space-2) 0 var(--space-4); }
.about-left > p { color: var(--color-gray-dark); line-height: 1.75; }
.process-steps { margin-top: var(--space-8); display: flex; flex-direction: column; gap: var(--space-5); }
.process-step { display: flex; gap: var(--space-5); align-items: flex-start; }
.process-step__num {
  flex-shrink: 0; width: 52px; height: 52px; border-radius: var(--radius-full);
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white); display: flex; align-items: center; justify-content: center;
  font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-lg);
  box-shadow: var(--shadow-md);
}
.process-step__body h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-1); color: var(--color-dark); display: flex; align-items: center; gap: var(--space-2); }
.process-step__body h3 svg { color: var(--color-accent); }
.process-step__body p { color: var(--color-gray); font-size: var(--font-size-sm); margin: 0; line-height: 1.6; }
.about-right { position: relative; }
.about-right img { width: 100%; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); aspect-ratio: 3 / 4; object-fit: cover; }
.about-stat-card {
  position: absolute; left: -22px; bottom: -22px;
  background: var(--color-accent); color: var(--color-white);
  padding: var(--space-5) var(--space-6); border-radius: var(--radius-lg);
  box-shadow: var(--shadow-xl); text-align: center;
}
.about-stat-card .big { font-family: var(--font-heading); font-size: var(--font-size-4xl); font-weight: 800; line-height: 1; }
.about-stat-card .small { display: block; font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1px; margin-top: var(--space-1); }
@media (max-width: 480px) { .about-stat-card { left: 50%; transform: translateX(-50%); bottom: -18px; } }

/* ============================================================
   7. WHY-US (dark) — proof without fabricated reviews
   ============================================================ */
.whyus-section { background: var(--color-dark); }
.whyus-section .section-title h2 { color: var(--color-white); }
.whyus-section .section-title .hero-answer { color: rgba(255,255,255,0.82); }
.whyus-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); scroll-snap-type: x proximity; }
@media (max-width: 860px) {
  .whyus-grid { grid-auto-flow: column; grid-auto-columns: 82%; grid-template-columns: none; overflow-x: auto; -webkit-overflow-scrolling: touch; padding-bottom: var(--space-4); }
  .whyus-card { scroll-snap-align: start; }
}
.whyus-card {
  background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12);
  border-radius: var(--radius-lg); padding: var(--space-8) var(--space-6);
  backdrop-filter: blur(6px); transition: transform var(--transition-base), border-color var(--transition-base);
}
.whyus-card:hover { transform: translateY(-5px); border-color: rgba(var(--color-accent-rgb),0.5); }
.whyus-card__icon { width: 48px; height: 48px; border-radius: var(--radius-md); background: rgba(var(--color-accent-rgb),0.16); color: var(--color-accent); display: flex; align-items: center; justify-content: center; margin-bottom: var(--space-4); }
.whyus-card h3 { color: var(--color-white); font-size: var(--font-size-lg); margin-bottom: var(--space-2); }
.whyus-card p { color: rgba(255,255,255,0.78); font-size: var(--font-size-sm); line-height: 1.65; margin: 0; }
.review-badge-strip { display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: var(--space-4); margin-top: var(--space-12); }
.review-badge {
  display: inline-flex; align-items: center; gap: var(--space-2);
  padding: var(--space-3) var(--space-5); border-radius: var(--radius-full);
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.14);
  color: var(--color-white); font-size: var(--font-size-sm); font-weight: 600;
  transition: border-color var(--transition-fast);
}
.review-badge:hover { border-color: rgba(var(--color-accent-rgb),0.5); color: var(--color-white); }
.review-badge svg { color: var(--color-accent); }

/* ============================================================
   8. FAQ
   ============================================================ */
.faq-section { background: var(--color-light); }
.faq-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); }
@media (max-width: 800px) { .faq-grid { grid-template-columns: 1fr; } }
.faq-item { background: var(--color-white); border-radius: var(--radius-lg); padding: var(--space-6); box-shadow: var(--shadow-sm); border: 1px solid var(--hp-line); }
.faq-question { display: flex; gap: var(--space-3); align-items: flex-start; font-size: var(--font-size-base); color: var(--color-dark); margin-bottom: var(--space-3); }
.faq-question svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.faq-answer { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; margin: 0; padding-left: calc(20px + var(--space-3)); }

/* ============================================================
   9. CLOSING CTA (decorative floating accent)
   ============================================================ */
.closing-cta { position: relative; overflow: hidden; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%); }
.closing-cta::after {
  content: ""; position: absolute; right: -60px; top: -60px; width: 320px; height: 320px;
  border-radius: 50%; background: rgba(var(--color-accent-rgb),0.18); pointer-events: none;
}
.closing-cta .container { position: relative; z-index: 1; text-align: center; max-width: 700px; }
.closing-cta h2 { color: var(--color-white); font-size: clamp(2rem, 4vw, 3rem); margin-bottom: var(--space-4); }
.closing-cta p { color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); margin-bottom: var(--space-8); }
.closing-cta .phone-line { display: inline-flex; align-items: center; gap: var(--space-2); margin-top: var(--space-6); color: var(--color-white); font-family: var(--font-heading); font-weight: 700; font-size: var(--font-size-xl); }
.closing-cta .phone-line a { color: var(--color-white); }
.closing-cta .phone-line svg { color: var(--color-accent); }

/* ============================================================
   10. SCROLL REVEALS — fail-open, gated under html.js-anim
   ============================================================ */
.reveal-up, .reveal-left, .reveal-right, .reveal-scale { transition: opacity 0.7s ease, transform 0.7s ease; }
html.js-anim .reveal-up { opacity: 0; transform: translateY(28px); }
html.js-anim .reveal-left { opacity: 0; transform: translateX(-34px); }
html.js-anim .reveal-right { opacity: 0; transform: translateX(34px); }
html.js-anim .reveal-scale { opacity: 0; transform: scale(0.94); }
html.js-anim .reveal-up.revealed, html.js-anim .reveal-left.revealed, html.js-anim .reveal-right.revealed, html.js-anim .reveal-scale.revealed, .revealed { opacity: 1 !important; transform: none !important; }
.reveal-delay-1 { transition-delay: 0.08s; }
.reveal-delay-2 { transition-delay: 0.18s; }
.reveal-delay-3 { transition-delay: 0.28s; }
.reveal-delay-4 { transition-delay: 0.38s; }
@media (prefers-reduced-motion: reduce) {
  html.js-anim .reveal-up, html.js-anim .reveal-left, html.js-anim .reveal-right, html.js-anim .reveal-scale { opacity: 1; transform: none; }
}

/* ============================================================
   11. FOCUS-VISIBLE + HERO RESPONSIVE
   ============================================================ */
.hero-form input:focus-visible, .hero-form select:focus-visible,
.hero-actions .btn:focus-visible, .review-badge:focus-visible {
  outline: 3px solid var(--color-accent); outline-offset: 2px;
}
@media (max-width: 900px) {
  .hero-modern { padding-top: 132px; }
  .hero-modern .container { grid-template-columns: 1fr; gap: var(--space-8); }
  .hero-text { max-width: none; }
}
@media (max-width: 480px) {
  .hero-modern { padding-top: 112px; }
  .hero-trust { grid-template-columns: 1fr; }
  .hero-actions .btn { width: 100%; }
}

/* ============================================================
   12. FLOATING DECORATIVE ACCENTS (Premium requirement, 4–8% opacity)
   ============================================================ */
.float-accent {
  position: absolute; z-index: -1; border-radius: 50%;
  pointer-events: none; opacity: 0.06;
  background: radial-gradient(circle at 30% 30%, var(--color-accent), transparent 70%);
  will-change: transform;
}
.float-accent--a { width: 340px; height: 340px; top: 8%; right: -60px; animation: hp-float 13s ease-in-out infinite; }
.float-accent--b { width: 220px; height: 220px; bottom: 6%; left: -40px; opacity: 0.05; animation: hp-float 17s ease-in-out infinite reverse; }
@keyframes hp-float {
  0%, 100% { transform: translate3d(0, 0, 0); }
  50%      { transform: translate3d(0, -26px, 0); }
}
@media (prefers-reduced-motion: reduce) {
  .float-accent--a, .float-accent--b { animation: none; }
}

/* ============================================================
   13. SECOND DIVIDER STYLE (soft wave cap on dark bands)
   ============================================================ */
.stats-band, .whyus-section, .cta-band { position: relative; }
/* Wave sits INSIDE the band's top edge (survives section overflow:hidden) and
   paints the previous (white) section's color as a wavy transition. */
.wave-divider { position: absolute; top: 0; left: 0; width: 100%; height: 44px; line-height: 0; z-index: 1; pointer-events: none; }
.wave-divider svg { width: 100%; height: 100%; display: block; }
.wave-divider path { fill: var(--color-white); }

/* ============================================================
   14. IMAGE SHEEN + TICKER + STAT REFINEMENTS
   ============================================================ */
.service-card__image::after {
  content: ""; position: absolute; inset: 0; pointer-events: none;
  background: linear-gradient(180deg, transparent 55%, rgba(var(--color-primary-rgb), 0.28) 100%);
  opacity: 0; transition: opacity var(--transition-base);
}
.service-card-with-image:hover .service-card__image::after { opacity: 1; }
.ticker-strip .ticker-track span { display: inline-flex; align-items: center; gap: var(--space-2); }
.ticker-strip svg { color: var(--color-white); }
.stats-row .stat-item { position: relative; }
@media (min-width: 701px) {
  .stats-row .stat-item + .stat-item::before {
    content: ""; position: absolute; left: calc(var(--space-8) * -0.5); top: 10%; height: 80%;
    width: 1px; background: rgba(255,255,255,0.14);
  }
}

/* ============================================================
   15. EXTRA BREAKPOINTS + PRINT
   ============================================================ */
@media (max-width: 1100px) {
  .hero-modern .container { gap: var(--space-8); }
}
@media (max-width: 768px) {
  .numbered-section .num-watermark { font-size: clamp(4rem, 20vw, 7rem); opacity: 0.7; }
  .process-step { gap: var(--space-4); }
  .process-step__num { width: 46px; height: 46px; }
}
@media print {
  .hero-form-card, .mobile-cta-bar, .back-to-top, .float-accent, .wave-divider { display: none !important; }
  .hero-modern { min-height: 0; padding: var(--space-8) 0; }
  .hero-modern::before, .hero-modern::after { display: none; }
}

/* ============================================================
   BLOG PREVIEW SECTION (Homepage "From the Blog")
   ============================================================ */
.blog-preview-section {
  background: var(--color-bg-alt);
  padding: var(--space-4xl) 0;
}

.blog-preview-featured {
  margin-top: var(--space-2xl);
  max-width: 900px;
  margin-left: auto;
  margin-right: auto;
}

.blog-featured-card {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-xl);
  background: white;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}

.blog-featured-card__image {
  position: relative;
  height: 100%;
  min-height: 300px;
}

.blog-featured-card__image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.blog-featured-badge {
  position: absolute;
  top: var(--space-md);
  left: var(--space-md);
  background: var(--color-accent);
  color: white;
  padding: var(--space-xs) var(--space-sm);
  border-radius: var(--radius-sm);
  font-size: 0.875rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.blog-featured-card__body {
  padding: var(--space-xl);
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.blog-featured-meta {
  display: flex;
  gap: var(--space-md);
  align-items: center;
  font-size: 0.875rem;
  color: var(--color-text-light);
  margin-bottom: var(--space-md);
}

.blog-featured-meta span {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
}

.blog-featured-title {
  font-size: 1.75rem;
  font-weight: 700;
  margin-bottom: var(--space-md);
  line-height: 1.3;
}

.blog-featured-title a {
  color: var(--color-primary);
  text-decoration: none;
  transition: color var(--transition);
}

.blog-featured-title a:hover {
  color: var(--color-accent);
}

.blog-featured-excerpt {
  font-size: 1.0625rem;
  line-height: 1.7;
  color: var(--color-text);
  margin-bottom: var(--space-xl);
}

.blog-preview-cta {
  margin-top: var(--space-2xl);
  text-align: center;
}

@media (max-width: 768px) {
  .blog-featured-card {
    grid-template-columns: 1fr;
  }

  .blog-featured-card__image {
    min-height: 200px;
    max-height: 250px;
  }

  .blog-featured-card__body {
    padding: var(--space-lg);
  }

  .blog-featured-title {
    font-size: 1.5rem;
  }
}

/* ============================================================
   RECENT WORK GALLERY — scroll-snap strip (premium pass)
   ============================================================ */
.gallery-section { background: var(--color-light); padding-bottom: clamp(3rem, 8vh, 6rem); }
.gallery-head { display: flex; justify-content: space-between; align-items: flex-end; gap: var(--space-8); flex-wrap: wrap; margin-bottom: var(--space-8); }
.gallery-head h2 { font-size: clamp(1.8rem, 3.4vw, 2.6rem); margin: var(--space-2) 0 0; max-width: 18ch; text-wrap: balance; }
.gallery-lead { color: var(--color-gray-dark); max-width: 44ch; margin: 0; line-height: 1.6; }
.gallery-track {
  display: flex; gap: var(--space-5); overflow-x: auto; overscroll-behavior-x: contain;
  scroll-snap-type: x mandatory; scroll-padding-inline: max(5%, calc((100vw - 1200px) / 2));
  padding: var(--space-2) max(5%, calc((100vw - 1200px) / 2)) var(--space-6);
  scrollbar-width: none; position: relative; z-index: 1;
}
.gallery-track::-webkit-scrollbar { display: none; }
.gallery-track:focus-visible { outline: 3px solid var(--color-accent); outline-offset: -3px; }
.gallery-item {
  flex: 0 0 clamp(260px, 30vw, 420px); scroll-snap-align: start; margin: 0; position: relative;
  border-radius: var(--radius-xl); overflow: hidden; aspect-ratio: 4 / 3; background: var(--color-dark);
  box-shadow: var(--shadow-lg); transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.gallery-item--wide { flex-basis: clamp(360px, 44vw, 640px); }
.gallery-item:hover { transform: translateY(-6px); box-shadow: var(--shadow-xl); }
.gallery-item img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.gallery-item:hover img { transform: scale(1.04); }
.gallery-item figcaption {
  position: absolute; inset: auto 0 0 0; padding: var(--space-8) var(--space-5) var(--space-5);
  background: linear-gradient(180deg, transparent 0%, rgba(var(--color-primary-rgb), 0.55) 45%, rgba(var(--color-primary-rgb), 0.9) 100%);
  color: var(--color-white); display: flex; flex-direction: column; gap: var(--space-1);
}
.gallery-item__tag { font-family: var(--font-accent); font-weight: 700; font-size: var(--font-size-xs); letter-spacing: 0.16em; text-transform: uppercase; color: var(--color-accent-bright); }
.gallery-item__cap { font-family: var(--font-heading); font-weight: 600; font-size: var(--font-size-base); line-height: 1.3; text-wrap: balance; }
.gallery-foot { display: flex; justify-content: space-between; align-items: center; gap: var(--space-6); flex-wrap: wrap; margin-top: var(--space-4); position: relative; z-index: 1; }
.gallery-hint { font-family: var(--font-accent); font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; font-size: var(--font-size-sm); color: var(--color-gray); }
@media (max-width: 700px) { .gallery-item, .gallery-item--wide { flex-basis: 82vw; } .gallery-hint { display: none; } }
.floating-ring { position: absolute; border-radius: var(--radius-full); border: 2px solid var(--color-accent); opacity: 0.07; pointer-events: none; z-index: 0; animation: ring-drift 18s ease-in-out infinite alternate; }
.floating-ring--a { width: 420px; height: 420px; top: -140px; right: -120px; }
.floating-ring--b { width: 260px; height: 260px; bottom: -90px; left: 6%; animation-duration: 24s; border-width: 3px; }
@keyframes ring-drift { from { transform: translate3d(0,0,0) rotate(0deg); } to { transform: translate3d(-24px, 18px, 0) rotate(12deg); } }
@media (prefers-reduced-motion: reduce) { .floating-ring { animation: none; } }

/* ABOUT / PROCESS — offset, asymmetric composition (premium pass) */
.about-grid { grid-template-columns: 1.15fr 0.85fr; align-items: start; }
.about-right { position: relative; margin-top: var(--space-16); }
.about-right::before { content: ""; position: absolute; inset: var(--space-6) calc(-1 * var(--space-6)) calc(-1 * var(--space-6)) var(--space-6); border: 2px solid rgba(var(--color-accent-rgb), 0.35); border-radius: var(--radius-xl); z-index: 0; }
.about-right::after { content: ""; position: absolute; top: -34px; left: -34px; width: 120px; height: 120px; border-radius: var(--radius-full); background: rgba(var(--color-accent-rgb), 0.10); z-index: 0; }
.about-right img { position: relative; z-index: 1; border-radius: var(--radius-xl); box-shadow: var(--shadow-xl); clip-path: polygon(0 0, 100% 0, 100% 92%, 88% 100%, 0 100%); }
.about-right .about-stat-card { z-index: 2; }
.process-steps { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6) var(--space-8); }
.process-step:nth-child(even) { transform: translateY(var(--space-6)); }
@media (max-width: 900px) { .about-grid { grid-template-columns: 1fr; } .about-right { margin-top: var(--space-8); } .process-steps { grid-template-columns: 1fr; } .process-step:nth-child(even) { transform: none; } }

/* FAQ — block layout (framework flex made the question a narrow column) */
.faq-item { display: block; }
.faq-question { font-size: var(--font-size-lg); line-height: 1.3; }

/* Dark bands — brushed steel + grain (premium pass) */
.cta-band { background: linear-gradient(120deg, var(--color-dark) 0%, var(--color-dark-alt) 55%, var(--color-primary) 100%); }
.closing-cta { background: linear-gradient(120deg, var(--color-primary) 0%, var(--color-dark-alt) 45%, var(--color-dark) 100%); }
.whyus-section { background: linear-gradient(160deg, var(--color-dark) 0%, var(--color-dark-alt) 60%, var(--color-primary) 100%); }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="hero-modern" aria-label="Salt River Steel — custom steel in Florence, Arizona">
    <img
        class="hero-bg-img"
        src="/assets/images/hero-steel-building-florence-az-1600.webp"
        srcset="/assets/images/hero-steel-building-florence-az-480.webp 480w, /assets/images/hero-steel-building-florence-az-960.webp 960w, /assets/images/hero-steel-building-florence-az-1600.webp 1600w"
        sizes="100vw"
        alt="Completed white steel building constructed by Salt River Steel LLC in Florence, Arizona"
        width="1600" height="1200"
        loading="eager" fetchpriority="high" decoding="async">

    <div class="container">
        <div class="hero-text">
            <span class="hero-eyebrow">
                <?php echo icon('shield-check', 16); ?>
                Serving Florence Since <?php echo $yearEstablished; ?>
            </span>
            <h1 class="hero-title">Steel Built for <span class="text-accent">Central Arizona</span> Construction</h1>
            <p class="hero-subtitle">
                Salt River Steel is Florence's local fabrication partner — custom gates, fencing, and
                commercial, residential, and industrial steel, cut and welded in-house. Skip the freight
                costs and long lead times from Phoenix suppliers: most custom orders ship within 3–5 business days.
            </p>
            <div class="hero-actions">
                <a href="#estimate-form" class="btn btn-accent btn-lg">Get a Free Estimate</a>
                <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg">
                    <?php echo icon('phone', 18); ?> Call <?php echo $phone; ?>
                </a>
            </div>
            <div class="hero-trust">
                <span class="hero-trust-item"><?php echo icon('shield-check', 18); ?> Licensed &amp; Insured</span>
                <span class="hero-trust-item"><?php echo icon('calendar', 18); ?> Locally Owned Since <?php echo $yearEstablished; ?></span>
                <span class="hero-trust-item"><?php echo icon('truck', 18); ?> Same-Week Local Delivery</span>
                <span class="hero-trust-item"><?php echo icon('file-check', 18); ?> Free On-Site Estimates</span>
            </div>
        </div>

        <aside class="hero-form-card" id="estimate-form">
            <h2>Get Your Free Estimate</h2>
            <p class="hero-form-tagline">No obligation. Same-week response from a local fabricator.</p>
            <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
                <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_template" value="table">
                <input type="hidden" name="_subject" value="Salt River Steel — New Website Inquiry">
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
                    <input type="text" id="hero-zip" name="zip" placeholder="ZIP code" inputmode="numeric" pattern="[0-9]{5}" required>
                </div>
                <div class="form-row">
                    <label for="hero-service" class="sr-only">Service needed</label>
                    <select id="hero-service" name="service_requested">
                        <option value="">What do you need?</option>
                        <?php foreach ($services as $svc): ?>
                        <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                        <?php endforeach; ?>
                        <option value="Other / Custom Fabrication">Other / Custom Fabrication</option>
                    </select>
                </div>

                <!-- TCPA v2.1 Consent (compact hero/inline pattern) -->
                <label class="p1-consent-line">
                    <input type="checkbox" name="terms_accepted" value="yes" required>
                    <span>I agree to the <a href="/terms/">Terms of Service</a> and <a href="/privacy-policy/">Privacy Policy</a> and consent to be contacted about my request. *</span>
                </label>

                <button type="submit" class="btn btn-primary btn-block">Get My Free Estimate</button>
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
        <?php for ($t = 0; $t < 2; $t++): foreach ($tickerItems as $ti): ?>
            <span><?php echo icon($ti[0], 16); ?> <?php echo $ti[1]; ?></span>
        <?php endforeach; endfor; ?>
    </div>
</div>

<!-- ============================================================
     SERVICES (01)
     ============================================================ -->
<section class="section numbered-section svc-section" data-num="01" aria-label="Steel services">
    <span class="num-watermark" aria-hidden="true">01</span>
    <div class="container">
        <div class="section-title reveal-up">
            <span class="eyebrow-label">What We Do</span>
            <h2>What <span class="text-accent">steel services</span> does Salt River Steel offer in Florence?</h2>
            <p class="hero-answer">Salt River Steel fabricates and installs custom steel gates, fencing, and structural steel for commercial, residential, and industrial projects across Central Arizona — cut, welded, and finished in our Florence shop for faster turnaround than out-of-state suppliers.</p>
            <span class="section-subtitle">local steel, done right</span>
        </div>

        <div class="services-grid">
            <?php
            $tintCycle = [1, 2, 3];
            $i = 0;
            foreach ($services as $svc):
                $slug  = $svc['slug'];
                $media = $serviceMedia[$slug] ?? null;
                if (!$media) { continue; }
                $tint  = $tintCycle[$i % 3];
                $delay = ($i % 3) + 1;
                $img   = $media['img'];
            ?>
            <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $delay; ?>">
                <div class="service-card__image">
                    <img src="/assets/images/<?php echo $img; ?>-960.webp"
                         srcset="/assets/images/<?php echo $img; ?>-480.webp 480w, /assets/images/<?php echo $img; ?>-960.webp 960w, /assets/images/<?php echo $img; ?>-1440.webp 1440w"
                         sizes="(max-width: 560px) 100vw, (max-width: 1100px) 50vw, 300px"
                         alt="<?php echo htmlspecialchars($media['alt']); ?>"
                         width="600" height="360" loading="lazy" decoding="async">
                </div>
                <div class="service-card__body">
                    <div class="service-card__icon"><?php echo icon($media['icon'], 26); ?></div>
                    <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
                    <p class="service-card__desc"><?php echo htmlspecialchars($svc['description']); ?></p>
                    <ul>
                        <?php foreach ($media['bullets'] as $b): ?>
                        <li><?php echo htmlspecialchars($b); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="/services/<?php echo $slug; ?>/" class="service-card__cta">Learn more</a>
                </div>
            </article>
            <?php $i++; endforeach; ?>
        </div>

        <div class="services-cta reveal-up">
            <a href="/services/" class="btn btn-primary btn-lg">View All Services</a>
        </div>
    </div>
</section>

<!-- ============================================================
     STATS BAND
     ============================================================ -->
<section class="stats-band texture-steel slant-top" aria-label="Salt River Steel at a glance">
    <span class="steel-grain" aria-hidden="true"></span>
    <span class="wave-divider" aria-hidden="true" hidden><svg viewBox="0 0 1440 44" preserveAspectRatio="none"><path d="M0,0 L1440,0 L1440,14 C1200,40 960,2 720,18 C480,34 240,0 0,20 Z"></path></svg></span>
    <div class="container">
        <div class="stats-row">
            <div class="stat-item reveal-up reveal-delay-1">
                <div class="stat-number">Est. <span><?php echo $yearEstablished; ?></span></div>
                <span class="stat-label">Founded in Florence, AZ</span>
            </div>
            <div class="stat-item reveal-up reveal-delay-2">
                <div class="stat-number">In-<span>House</span></div>
                <span class="stat-label">Cut, welded &amp; finished in our shop</span>
            </div>
            <div class="stat-item reveal-up reveal-delay-3">
                <div class="stat-number">3–5<span> Day</span></div>
                <span class="stat-label">Typical custom turnaround</span>
            </div>
            <div class="stat-item reveal-up reveal-delay-4">
                <div class="stat-number">Pinal <span>County</span></div>
                <span class="stat-label">Delivered &amp; installed locally</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     RECENT WORK — horizontal scroll-snap gallery from the client photo pool
     ============================================================ -->
<section class="section gallery-section" aria-label="Recent Salt River Steel projects">
    <span class="floating-ring floating-ring--a" aria-hidden="true"></span>
    <span class="floating-ring floating-ring--b" aria-hidden="true"></span>
    <div class="container">
        <div class="gallery-head reveal-up">
            <div>
                <span class="eyebrow-label">Recent Work</span>
                <h2>Built in Florence, <span class="text-accent">standing across Pinal County</span></h2>
            </div>
            <p class="gallery-lead">Barns, fencing, gates and buildings from the Salt River Steel crew — real jobs, photographed on site, not stock.</p>
        </div>
    </div>
    <div class="gallery-track" data-p1-dynamic tabindex="0" aria-label="Project photos — scroll horizontally">
        <?php foreach ($galleryItems as $gi => $g): ?>
        <figure class="gallery-item<?php echo !empty($g['wide']) ? ' gallery-item--wide' : ''; ?>">
            <img src="/assets/images/<?php echo $g['img']; ?>-960.webp"
                 srcset="/assets/images/<?php echo $g['img']; ?>-480.webp 480w, /assets/images/<?php echo $g['img']; ?>-960.webp 960w, /assets/images/<?php echo $g['img']; ?>-1440.webp 1440w"
                 sizes="(max-width: 700px) 82vw, <?php echo !empty($g['wide']) ? '640px' : '420px'; ?>"
                 alt="<?php echo htmlspecialchars($g['alt']); ?>"
                 width="960" height="720" loading="lazy" decoding="async">
            <figcaption>
                <span class="gallery-item__tag"><?php echo htmlspecialchars($g['tag']); ?></span>
                <span class="gallery-item__cap"><?php echo htmlspecialchars($g['caption']); ?></span>
            </figcaption>
        </figure>
        <?php endforeach; ?>
    </div>
    <div class="container gallery-foot reveal-up">
        <a href="/services/" class="btn btn-primary btn-lg">Explore Our Services</a>
        <span class="gallery-hint" aria-hidden="true">Drag or scroll to see more →</span>
    </div>
</section>

<!-- ============================================================
     MID CTA BAND
     ============================================================ -->
<section class="cta-band texture-steel" aria-label="Request a steel quote">
    <span class="steel-grain" aria-hidden="true"></span>
    <span class="float-accent float-accent--a" aria-hidden="true"></span>
    <span class="float-accent float-accent--b" aria-hidden="true"></span>
    <div class="container">
        <h2 class="reveal-up">Have a project on a deadline? Let's talk steel.</h2>
        <p class="reveal-up reveal-delay-1">Contractors and property owners across Central Arizona count on Salt River Steel to keep builds moving. Tell us what you need fabricated and we'll get you a quote — and a realistic timeline — fast.</p>
        <div class="cta-band-actions reveal-up reveal-delay-2">
            <a href="#estimate-form" class="btn btn-accent btn-lg">Request Your Estimate</a>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
        </div>
    </div>
</section>

<!-- ============================================================
     ABOUT / PROCESS (02)
     ============================================================ -->
<section class="section numbered-section" data-num="02" aria-label="How Salt River Steel works">
    <span class="num-watermark" aria-hidden="true">02</span>
    <div class="container">
        <div class="about-grid">
            <div class="about-left reveal-left">
                <span class="eyebrow-label">Local, Hands-On, Accountable</span>
                <h2>Central Arizona's steel neighbor — not a distant supplier</h2>
                <p>Salt River Steel LLC has served Florence and the surrounding area since <?php echo $yearEstablished; ?>, and ownership is still on the shop floor. From agricultural equipment to industrial structures to residential additions, we understand the demands Central Arizona's heat, dust, and monsoon season put on steel — and we build for it.</p>
                <p>Because we fabricate in Florence, contractors and property owners work directly with the people cutting and welding their steel. That means straighter answers, fewer procurement headaches, competitive pricing without premium freight, and rush jobs that actually get prioritized.</p>

                <div class="process-steps">
                    <?php foreach ($processSteps as $pi => $step): ?>
                    <div class="process-step reveal-up reveal-delay-<?php echo $pi + 1; ?>">
                        <div class="process-step__num"><?php echo $step['num']; ?></div>
                        <div class="process-step__body">
                            <h3><?php echo icon($step['icon'], 20); ?> <?php echo htmlspecialchars($step['title']); ?></h3>
                            <p><?php echo htmlspecialchars($step['text']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="about-right reveal-right">
                <img src="/assets/images/crew-salt-river-steel-florence-960.webp"
                     srcset="/assets/images/crew-salt-river-steel-florence-480.webp 480w, /assets/images/crew-salt-river-steel-florence-960.webp 960w, /assets/images/crew-salt-river-steel-florence-1440.webp 1440w"
                     sizes="(max-width: 900px) 100vw, 460px"
                     alt="Salt River Steel LLC crew on a steel fence installation job in Central Arizona"
                     width="600" height="450" loading="lazy" decoding="async">
                <div class="about-stat-card">
                    <span class="big"><?php echo $yearEstablished; ?></span>
                    <span class="small">Family-Owned<br>in Florence, AZ</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     WHY US (03) — proof without fabricated reviews
     ============================================================ -->
<section class="section numbered-section whyus-section texture-steel" data-num="03" aria-label="Why Central Arizona chooses Salt River Steel">
    <span class="steel-grain" aria-hidden="true"></span>
    <span class="wave-divider" aria-hidden="true"><svg viewBox="0 0 1440 44" preserveAspectRatio="none"><path d="M0,0 L1440,0 L1440,14 C1200,40 960,2 720,18 C480,34 240,0 0,20 Z"></path></svg></span>
    <span class="num-watermark" aria-hidden="true">03</span>
    <div class="container">
        <div class="section-title reveal-up">
            <span class="eyebrow-label" style="color: var(--color-accent);">The Local Advantage</span>
            <h2>Why Central Arizona builds with <span class="text-accent">Salt River Steel</span></h2>
            <p class="hero-answer">Salt River Steel competes on the things distant suppliers can't match: local fabrication, faster turnaround, and a team that answers directly. Here's what contractors and property owners tell us matters most.</p>
        </div>

        <div class="whyus-grid">
            <?php $wi = 0; foreach ($whyCards as $wc): $wd = ($wi % 3) + 1; ?>
            <div class="whyus-card reveal-up reveal-delay-<?php echo $wd; ?>">
                <div class="whyus-card__icon"><?php echo icon($wc[0], 24); ?></div>
                <h3><?php echo $wc[1]; ?></h3>
                <p><?php echo $wc[2]; ?></p>
            </div>
            <?php $wi++; endforeach; ?>
        </div>

        <div class="review-badge-strip reveal-up">
            <a href="<?php echo htmlspecialchars($gbpUrl); ?>" class="review-badge" target="_blank" rel="noopener">
                <?php echo icon('map-pin', 18); ?> Find us on Google
            </a>
            <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" class="review-badge" target="_blank" rel="noopener">
                <?php echo icon('star', 18); ?> Leave a Google Review
            </a>
            <span class="review-badge"><?php echo icon('badge-check', 18); ?> Licensed &amp; Insured in Arizona</span>
        </div>
    </div>
</section>

<!-- ============================================================
     FAQ (04)
     ============================================================ -->
<section class="section numbered-section faq-section" data-num="04" aria-label="Frequently asked questions">
    <span class="num-watermark" aria-hidden="true">04</span>
    <div class="container">
        <div class="section-title reveal-up">
            <span class="eyebrow-label">Good Questions</span>
            <h2>Steel questions Central Arizona <span class="text-accent">contractors ask us</span></h2>
            <p class="hero-answer">Straight answers on turnaround, custom fabrication, delivery, and the steel grades Salt River Steel keeps on hand in Florence.</p>
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

<!-- FAQPage schema (AI comprehension aid) -->
<?php echo $faqSchema; ?>

<!-- ============================================================
     FROM THE BLOG (05) — Homepage preview pulling from registry
     ============================================================ -->
<?php if (!empty($blogPosts)): ?>
<section class="section numbered-section blog-preview-section" data-num="05" aria-label="From the blog">
    <span class="num-watermark" aria-hidden="true">05</span>
    <div class="container">
        <div class="section-title reveal-up">
            <span class="eyebrow-label" style="color: var(--color-accent);">From the Blog</span>
            <h2>Steel & fabrication <span class="text-accent">insights</span></h2>
            <p class="hero-answer">Expert insights on custom steel gates, fencing costs, material comparisons, and industry knowledge from the Salt River Steel team.</p>
        </div>

        <?php
        // Featured post (latest from registry)
        $featuredPost = $blogPosts[0];
        ?>
        <div class="blog-preview-featured reveal-up">
            <article class="blog-featured-card">
                <div class="blog-featured-card__image">
                    <img
                        src="<?php echo htmlspecialchars($featuredPost['image']); ?>"
                        alt="<?php echo htmlspecialchars($featuredPost['alt']); ?>"
                        loading="lazy"
                        width="600"
                        height="400"
                    >
                    <span class="blog-featured-badge"><?php echo htmlspecialchars($featuredPost['category']); ?></span>
                </div>
                <div class="blog-featured-card__body">
                    <div class="blog-featured-meta">
                        <span><?php echo icon('calendar', 18); ?> <?php echo htmlspecialchars($featuredPost['date']); ?></span>
                        <span><?php echo icon('clock', 18); ?> <?php echo htmlspecialchars($featuredPost['readtime']); ?></span>
                    </div>
                    <h3 class="blog-featured-title">
                        <a href="/blog/<?php echo htmlspecialchars($featuredPost['slug']); ?>/">
                            <?php echo htmlspecialchars($featuredPost['title']); ?>
                        </a>
                    </h3>
                    <p class="blog-featured-excerpt">
                        <?php echo htmlspecialchars($featuredPost['excerpt']); ?>
                    </p>
                    <a href="/blog/<?php echo htmlspecialchars($featuredPost['slug']); ?>/" class="btn btn-primary">
                        Read Article <?php echo icon('arrow-right', 18); ?>
                    </a>
                </div>
            </article>
        </div>

        <div class="blog-preview-cta reveal-up reveal-delay-1">
            <a href="/blog/" class="btn btn-outline-primary">View All Articles <?php echo icon('arrow-right', 18); ?></a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     CLOSING CTA
     ============================================================ -->
<section class="closing-cta texture-steel" aria-label="Contact Salt River Steel">
    <span class="steel-grain" aria-hidden="true"></span>
    <div class="container">
        <h2 class="reveal-up">Let's fabricate your next project — right here in Florence.</h2>
        <p class="reveal-up reveal-delay-1">From a single custom gate to a full commercial build, Salt River Steel gives you local fabrication, honest timelines, and steel that's built for Central Arizona. Get your free estimate today.</p>
        <div class="cta-band-actions reveal-up reveal-delay-2">
            <a href="#estimate-form" class="btn btn-accent btn-lg">Get a Free Estimate</a>
            <a href="/contact/" class="btn btn-outline-white btn-lg">Contact Us</a>
        </div>
        <div class="phone-line reveal-up reveal-delay-3">
            <?php echo icon('phone', 22); ?> <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a>
        </div>
    </div>
</section>

<!-- Scroll-reveal init (fail-open, gated under html.js-anim; 2s safety net) -->
<script>
(function () {
  document.documentElement.classList.add('js-anim');
  var els = document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right, .reveal-scale');
  function revealAll() { els.forEach(function (el) { el.classList.add('revealed'); }); }
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('revealed'); io.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    els.forEach(function (el) { io.observe(el); });
  } else {
    revealAll();
  }
  setTimeout(revealAll, 2000);   // safety net — never leave content hidden
})();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

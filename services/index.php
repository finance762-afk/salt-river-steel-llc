<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
 * services/index.php — Services Listing (Phase 4)
 * Salt River Steel LLC — Florence, AZ
 * ============================================================ */

$currentPage     = 'services';
$pageTitle       = 'Steel Services in Florence, AZ | Gates, Fencing & Fabrication | Salt River Steel';
$pageDescription = 'Explore Salt River Steel\'s steel services in Florence, AZ — custom steel gates, steel fencing, and commercial, residential, and industrial fabrication, all built in-house with same-week local turnaround.';
$pageCanonical   = $siteUrl . '/services/';
$canonicalUrl    = $pageCanonical;

/* ---- Per-service homepage-style card data (photo, alt, bullets, icon) ---- */
$serviceIcons = [
    'custom-steel-gates'             => 'home',
    'steel-fencing'                  => 'ruler',
    'commercial-steel-construction'  => 'building-2',
    'residential-steel-work'         => 'hard-hat',
    'industrial-steel-fabrication'   => 'wrench',
];
/* NOTE: card photos use the slug-named files, which are the content-accurate,
 * pixel-verified images. The home-*.jpg variants are mislabeled (home-custom-steel-gate
 * is a livestock pen, home-commercial-building is a pool fence, etc.) — do NOT use them. */
$serviceCards = [
    'custom-steel-gates' => [
        'img'  => 'custom-steel-gates',
        'alt'  => 'Solar-powered steel ranch driveway gate across a paver drive at a Florence, AZ desert home',
        'bul'  => ['Driveway, entry & security gates', 'Built to your exact opening', 'Powder-coat & finish options'],
    ],
    'steel-fencing' => [
        'img'  => 'steel-fencing',
        'alt'  => 'Welded steel ranch-rail fence enclosing a Florence, AZ property',
        'bul'  => ['Ranch, privacy & security fence', 'Corrugated & wrought-iron styles', 'Corrosion-resistant desert builds'],
    ],
    'commercial-steel-construction' => [
        'img'  => 'commercial-steel-construction',
        'alt'  => 'Corrugated steel building with roll-up openings fabricated by Salt River Steel in Central Arizona',
        'bul'  => ['Structural steel fabrication', 'Buildings, frames & supports', 'Contractor & architect partner'],
    ],
    'residential-steel-work' => [
        'img'  => 'residential-steel-work',
        'alt'  => 'Custom corrugated steel-clad structure built by Salt River Steel at a Florence, AZ home',
        'bul'  => ['Carports, ramadas & railings', 'Architectural metalwork', 'Custom one-off fabrication'],
    ],
    'industrial-steel-fabrication' => [
        'img'  => 'industrial-steel-fabrication',
        'alt'  => 'Excavator trenching for steel foundation work on a Central Arizona job site',
        'bul'  => ['Heavy-duty structural welding', 'Equipment & job-site steel', 'Rush & expedited fabrication'],
    ],
];

/* ---- Process steps (shared workflow) ---- */
$processSteps = [
    ['icon' => 'ruler',        'title' => 'Consult & Measure', 'text' => 'We walk your site, take exact measurements, and talk through how the steel needs to perform.'],
    ['icon' => 'pen-tool',     'title' => 'Design & Quote',    'text' => 'You get a clear, itemized quote and a fabrication plan — no vague estimates or surprise freight charges.'],
    ['icon' => 'hammer',       'title' => 'Fabricate In-House','text' => 'Every cut, weld, and finish happens at our Florence shop, keeping quality and timeline in our hands.'],
    ['icon' => 'check-circle', 'title' => 'Deliver & Install',  'text' => 'We deliver to your job site or install on location, then walk the finished work with you.'],
];

/* ---- FAQs for the services overview page ---- */
$faqs = [
    [
        'question' => 'What steel services does Salt River Steel offer in Florence, AZ?',
        'answer'   => 'Salt River Steel offers five core services from its Florence shop: custom steel gates, steel fencing, commercial steel construction, residential steel work, and industrial steel fabrication. Every project is cut, welded, and finished in-house for contractors and property owners across Central Arizona.',
    ],
    [
        'question' => 'Can Salt River Steel handle both small custom jobs and large structural projects?',
        'answer'   => 'Yes. Salt River Steel fabricates one-off residential pieces like railings and carports as well as structural steel for commercial buildings and heavy industrial applications. The same in-house crew handles the full range, so you get one local point of contact for any size job.',
    ],
    [
        'question' => 'How fast can Salt River Steel complete a steel project?',
        'answer'   => 'Most custom orders ship within 3–5 business days from the Florence facility, and rush options are available for tight deadlines. Because fabrication is local, Salt River Steel avoids the freight delays that come with Phoenix and out-of-state steel suppliers.',
    ],
    [
        'question' => 'Does Salt River Steel serve areas outside Florence?',
        'answer'   => 'Salt River Steel is based in Florence and serves contractors, ranchers, and property owners throughout Central Arizona and the surrounding Pinal County communities. Both local job-site delivery and pickup at the Florence shop are available.',
    ],
];

$faqSchema     = generateFAQSchema($faqs);

/* ---- BreadcrumbList schema ---- */
$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services/'],
    ],
];
$breadcrumbJson = '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<?php echo $faqSchema; ?>
<?php echo $breadcrumbJson; ?>

<style>
/* ============================================================
   SERVICES LISTING — PAGE-SPECIFIC STYLES (Phase 4)
   Premium tier — page-scoped, tokens only
   ============================================================ */

/* ---- Fail-open reveal system ---- */
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
   1. INTERIOR HERO — layered gradient + noise, split intro
   ============================================================ */
.svc-hero {
  position: relative; overflow: hidden;
  padding: 168px 0 clamp(3.5rem, 8vh, 6rem);
  background-image:
    linear-gradient(120deg, rgba(var(--color-primary-rgb), 0.95) 0%, rgba(var(--color-primary-rgb), 0.78) 52%, rgba(var(--color-secondary-rgb), 0.62) 100%),
    url('/assets/images/home-hero-steel-construction-1600.webp');
  background-size: cover; background-position: center;
  color: var(--color-white);
}
.svc-hero::before {
  content: ""; position: absolute; inset: 0; z-index: 0; pointer-events: none;
  background: radial-gradient(circle at 82% 22%, rgba(6,182,212,0.42) 0%, transparent 56%);
  mix-blend-mode: screen;
}
.svc-hero::after {
  content: ""; position: absolute; inset: 0; z-index: 0; opacity: 0.06; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.svc-hero .container { position: relative; z-index: 1; }
.svc-hero__eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600;
  text-transform: uppercase; letter-spacing: 2px; color: var(--color-white);
  padding: var(--space-2) var(--space-4);
  background: rgba(6,182,212,0.18); border: 1px solid rgba(255,255,255,0.28);
  border-radius: var(--radius-full); margin-bottom: var(--space-5);
}
.svc-hero__eyebrow svg { width: 18px; height: 18px; color: var(--color-accent); }
.svc-hero h1 {
  color: var(--color-white); font-size: clamp(2.3rem, 5vw, var(--font-size-6xl));
  line-height: 1.06; text-wrap: balance; margin-bottom: var(--space-5); max-width: 20ch;
}
.svc-hero h1 .text-accent { color: var(--color-accent); }
.svc-hero .hero-answer {
  color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); line-height: 1.7;
  max-width: 52rem; margin-bottom: var(--space-8);
}
.svc-hero__actions { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.svc-hero__actions .btn-ghost {
  background: transparent; color: var(--color-white);
  border: 2px solid rgba(255,255,255,0.6); border-radius: var(--radius-md);
  padding: var(--space-3) var(--space-6); font-weight: 700;
  display: inline-flex; align-items: center; gap: var(--space-2);
  transition: background var(--transition-base), transform var(--transition-fast);
}
.svc-hero__actions .btn-ghost:hover { background: rgba(255,255,255,0.12); transform: translateY(-2px); }
.svc-hero__actions .btn-ghost svg { width: 18px; height: 18px; }

/* ============================================================
   2. BREADCRUMB spacing tweak
   ============================================================ */
.breadcrumb .container { padding-top: 0; padding-bottom: 0; }

/* ============================================================
   3. SERVICES INTRO + GRID (required component)
   ============================================================ */
.svc-section { position: relative; padding: clamp(4rem, 9vh, 7rem) 0; overflow: hidden; }
.section-title { max-width: 48rem; margin: 0 auto var(--space-10); text-align: center; }
.section-title h2 { font-size: clamp(1.9rem, 3.6vw, var(--font-size-5xl)); line-height: 1.1; text-wrap: balance; margin: var(--space-2) 0 var(--space-4); }
.section-title .hero-answer { color: var(--color-gray-dark); font-size: var(--font-size-lg); line-height: 1.7; margin: 0 auto var(--space-3); max-width: 46rem; }
.section-title .section-subtitle { display: block; font-family: var(--font-accent); color: var(--color-accent); font-size: var(--font-size-2xl); line-height: 1; }
.section-title .prose { color: var(--color-gray-dark); max-width: 44rem; margin: var(--space-3) auto 0; line-height: 1.7; }

:root {
  --color-card-tint-1: rgba(var(--color-primary-rgb), 0.07);
  --color-card-tint-2: rgba(var(--color-secondary-rgb), 0.08);
  --color-card-tint-3: rgba(6, 182, 212, 0.10);
}
.services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); }
@media (max-width: 1000px) { .services-grid { grid-template-columns: repeat(2, 1fr); } }
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
  display: flex; flex-direction: column; align-items: center; gap: var(--space-3); flex: 1;
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

/* ============================================================
   4. WHY-LOCAL BAND (dark) — asymmetric split + floating accents
   ============================================================ */
.why-band { position: relative; overflow: hidden; background: var(--color-dark); color: var(--color-white); padding: clamp(4rem, 9vh, 7rem) 0; }
.why-band::before {
  content: ""; position: absolute; inset: 0; opacity: 0.4; pointer-events: none;
  background: radial-gradient(circle at 12% 18%, rgba(var(--color-secondary-rgb), 0.55), transparent 48%);
}
.why-band .container { position: relative; z-index: 1; }
.why-grid { display: grid; grid-template-columns: 1fr 1.1fr; gap: var(--space-12); align-items: center; }
@media (max-width: 900px) { .why-grid { grid-template-columns: 1fr; gap: var(--space-8); } }
.why-copy h2 { color: var(--color-white); font-size: clamp(1.8rem, 3.4vw, var(--font-size-4xl)); text-wrap: balance; margin-bottom: var(--space-4); }
.why-copy .answer-block { background: rgba(255,255,255,0.06); border-left: 4px solid var(--color-accent); color: rgba(255,255,255,0.9); padding: var(--space-5) var(--space-6); border-radius: var(--radius-sm); margin: 0; font-size: var(--font-size-base); line-height: 1.7; }
.why-list { display: grid; gap: var(--space-4); }
.why-item { display: grid; grid-template-columns: auto 1fr; gap: var(--space-4); align-items: start; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12); border-radius: var(--radius-md); padding: var(--space-5); }
.why-item__icon { width: 44px; height: 44px; border-radius: var(--radius-md); background: rgba(6,182,212,0.16); color: var(--color-accent); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.why-item__icon svg { width: 22px; height: 22px; }
.why-item h3 { color: var(--color-white); font-size: var(--font-size-lg); margin-bottom: var(--space-1); }
.why-item p { color: rgba(255,255,255,0.78); font-size: var(--font-size-sm); line-height: 1.6; margin: 0; }
.why-float { position: absolute; border-radius: var(--radius-full); background: rgba(6,182,212,0.08); pointer-events: none; z-index: 0; }

/* ============================================================
   5. PROCESS STRIP — numbered horizontal timeline
   ============================================================ */
.proc-section { padding: clamp(4rem, 9vh, 7rem) 0; background: var(--color-light); }
.proc-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-6); margin-top: var(--space-10); }
@media (max-width: 860px) { .proc-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 480px) { .proc-grid { grid-template-columns: 1fr; } }
.proc-card { position: relative; background: var(--color-white); border-radius: var(--radius-lg); padding: var(--space-6); box-shadow: var(--shadow-sm); border-top: 3px solid var(--color-accent); }
.proc-card__num { font-family: var(--font-heading); font-size: var(--font-size-4xl); font-weight: 800; color: rgba(var(--color-primary-rgb), 0.16); line-height: 1; }
.proc-card__icon { width: 46px; height: 46px; border-radius: var(--radius-md); background: rgba(var(--color-primary-rgb), 0.08); color: var(--color-primary); display: flex; align-items: center; justify-content: center; margin: var(--space-3) 0; }
.proc-card__icon svg { width: 22px; height: 22px; }
.proc-card h3 { color: var(--color-primary); font-size: var(--font-size-lg); margin-bottom: var(--space-2); }
.proc-card p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; margin: 0; }

/* ============================================================
   6. FAQ — accented left border cards
   ============================================================ */
.faq-section { padding: clamp(4rem, 9vh, 7rem) 0; }
.faq-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-5) var(--space-8); max-width: 60rem; margin: var(--space-8) auto 0; }
@media (max-width: 800px) { .faq-grid { grid-template-columns: 1fr; } }
.faq-item { background: var(--color-white); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: var(--radius-md); padding: var(--space-6); }
.faq-item .faq-question { display: flex; align-items: flex-start; gap: var(--space-3); font-family: var(--font-heading); font-weight: 700; color: var(--color-primary); font-size: var(--font-size-lg); margin-bottom: var(--space-3); }
.faq-item .faq-question svg { width: 22px; height: 22px; color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.faq-item .faq-answer { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; }

/* ============================================================
   7. CLOSING CTA — gradient + noise
   ============================================================ */
.closing-cta { position: relative; overflow: hidden; padding: clamp(4rem, 10vh, 8rem) 0; text-align: center; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-dark-alt) 100%); color: var(--color-white); }
.closing-cta::after { content: ""; position: absolute; inset: 0; opacity: 0.06; pointer-events: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.closing-cta .container { position: relative; z-index: 1; }
.closing-cta h2 { color: var(--color-white); font-size: clamp(2rem, 4vw, var(--font-size-5xl)); text-wrap: balance; margin-bottom: var(--space-4); max-width: 22ch; margin-left: auto; margin-right: auto; }
.closing-cta p { color: rgba(255,255,255,0.9); font-size: var(--font-size-lg); line-height: 1.7; max-width: 46rem; margin: 0 auto var(--space-8); }
.closing-cta .cta-actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }
.closing-cta .btn-ghost { background: transparent; color: var(--color-white); border: 2px solid rgba(255,255,255,0.6); border-radius: var(--radius-md); padding: var(--space-3) var(--space-6); font-weight: 700; display: inline-flex; align-items: center; gap: var(--space-2); transition: background var(--transition-base); }
.closing-cta .btn-ghost:hover { background: rgba(255,255,255,0.12); }
.closing-cta .btn-ghost svg { width: 18px; height: 18px; }
.closing-cta .floating-accent { position: absolute; border-radius: var(--radius-full); background: rgba(6,182,212,0.10); pointer-events: none; z-index: 0; }

/* Section divider */
.section-divider { display: block; width: 100%; height: auto; line-height: 0; }
</style>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="svc-hero" aria-label="Salt River Steel services overview">
  <div class="container">
    <span class="svc-hero__eyebrow"><?php echo icon('wrench'); ?> Steel Services · Florence, AZ</span>
    <h1>Steel Services Built <span class="text-accent">In-House</span> for Central Arizona</h1>
    <p class="hero-answer">
      Salt River Steel is a Florence, AZ steel construction company that fabricates custom gates, steel fencing,
      and commercial, residential, and industrial steelwork on-site. Contractors, ranchers, and property owners
      across Central Arizona get durable, desert-ready steel on a local timeline — usually within 3–5 business days.
    </p>
    <div class="svc-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Estimate</a>
      <a href="tel:<?php echo $phoneDigits; ?>" class="btn-ghost"><?php echo icon('phone'); ?> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">/</li>
      <li aria-current="page">Services</li>
    </ol>
  </div>
</nav>

<!-- ============================================================
     SERVICES GRID (required component)
     ============================================================ -->
<section class="svc-section" aria-label="Steel construction services">
  <div class="container">
    <div class="section-title" data-animate>
      <span class="eyebrow-label">What We Do</span>
      <h2>Which steel services can <span class="text-accent">Salt River Steel</span> build for your project?</h2>
      <p class="hero-answer">
        Salt River Steel builds five core steel services from its Florence shop — custom gates, fencing, and
        commercial, residential, and industrial fabrication. Each one is cut, welded, and finished in-house,
        so you get one local team, honest pricing, and steel engineered for the Arizona desert.
      </p>
      <span class="section-subtitle">one shop, every build</span>
      <p class="prose">From a single driveway gate to structural steel for a commercial build, our crew handles the full range without handing your job off to a distant supplier.</p>
    </div>

    <div class="services-grid">
      <?php
      $tints = [1, 2, 3];
      $i = 0;
      foreach ($services as $service):
          $slug = $service['slug'];
          $card = $serviceCards[$slug];
          $tint = $tints[$i % 3]; $delay = ($i % 3) + 1;
          $ic   = $serviceIcons[$slug] ?? 'wrench';
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $delay; ?>" data-animate>
        <div class="service-card__image">
          <img src="/assets/images/<?php echo $card['img']; ?>.jpg"
               srcset="/assets/images/<?php echo $card['img']; ?>-480.webp 480w, /assets/images/<?php echo $card['img']; ?>-960.webp 960w, /assets/images/<?php echo $card['img']; ?>-1600.webp 1600w"
               sizes="(max-width: 600px) 100vw, (max-width: 1000px) 50vw, 380px"
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
  </div>
</section>

<!-- ============================================================
     WHY LOCAL (dark)
     ============================================================ -->
<section class="why-band" aria-label="Why choose a local steel fabricator">
  <span class="why-float" style="width:240px;height:240px;top:-70px;right:-50px;"></span>
  <span class="why-float" style="width:150px;height:150px;bottom:-40px;left:6%;"></span>
  <div class="container">
    <div class="why-grid">
      <div class="why-copy" data-animate class="reveal-left">
        <span class="eyebrow-label">Local Advantage</span>
        <h2>Why does buying steel locally in Florence matter?</h2>
        <p class="answer-block">
          Buying steel from a Florence-based fabricator means faster turnaround, no out-of-state freight premiums,
          and a crew that answers the phone. Salt River Steel keeps common stock on hand and ships most custom
          orders in 3–5 business days — a timeline distant Phoenix and regional suppliers rarely match.
        </p>
      </div>
      <div class="why-list">
        <div class="why-item" data-animate class="reveal-delay-1">
          <div class="why-item__icon"><?php echo icon('map-pin'); ?></div>
          <div><h3>Rooted in Central Arizona</h3><p>We know local construction — agricultural equipment, industrial structures, and desert-climate builds — because we work here every day.</p></div>
        </div>
        <div class="why-item" data-animate class="reveal-delay-2">
          <div class="why-item__icon"><?php echo icon('truck'); ?></div>
          <div><h3>Same-week turnaround</h3><p>Most custom orders ship in 3–5 business days, with rush options when your project is on a deadline.</p></div>
        </div>
        <div class="why-item" data-animate class="reveal-delay-3">
          <div class="why-item__icon"><?php echo icon('shield-check'); ?></div>
          <div><h3>Desert-tough steel</h3><p>Grades and finishes chosen to resist Arizona heat, sun, and monsoon-season corrosion.</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     PROCESS
     ============================================================ -->
<section class="proc-section" aria-label="How Salt River Steel works">
  <div class="container">
    <div class="section-title" data-animate>
      <span class="eyebrow-label">The Salt River Steel 4-Point Process</span>
      <h2>How does a steel project with <span class="text-accent">Salt River Steel</span> work?</h2>
      <p class="hero-answer">
        Every Salt River Steel project follows four clear steps — consult and measure, design and quote, fabricate
        in-house, then deliver and install. You work directly with the crew who builds your steel, so there is no
        runaround and no surprise freight from an out-of-state warehouse.
      </p>
    </div>
    <div class="proc-grid">
      <?php $pn = 1; foreach ($processSteps as $step): ?>
      <div class="proc-card reveal-up reveal-delay-<?php echo (($pn - 1) % 4) + 1; ?>" data-animate>
        <div class="proc-card__num"><?php echo str_pad($pn, 2, '0', STR_PAD_LEFT); ?></div>
        <div class="proc-card__icon"><?php echo icon($step['icon']); ?></div>
        <h3><?php echo htmlspecialchars($step['title']); ?></h3>
        <p><?php echo htmlspecialchars($step['text']); ?></p>
      </div>
      <?php $pn++; endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================================================
     FAQ
     ============================================================ -->
<section class="faq-section" aria-label="Services FAQ">
  <div class="container">
    <div class="section-title" data-animate>
      <span class="eyebrow-label">Answers</span>
      <h2>What should you know before starting a steel project?</h2>
      <p class="hero-answer">
        Straight answers on the services Salt River Steel offers, project size, turnaround, and service area — so
        you can plan your Florence-area build with confidence before you ever request an estimate.
      </p>
    </div>
    <div class="faq-grid">
      <?php foreach ($faqs as $faq): ?>
      <div class="faq-item" data-animate>
        <div class="faq-question"><?php echo icon('info'); ?><span><?php echo htmlspecialchars($faq['question']); ?></span></div>
        <div class="faq-answer"><?php echo htmlspecialchars($faq['answer']); ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================================================
     CLOSING CTA
     ============================================================ -->
<section class="closing-cta" aria-label="Get a free steel estimate">
  <span class="floating-accent" style="width:220px;height:220px;top:-60px;left:-40px;"></span>
  <span class="floating-accent" style="width:140px;height:140px;bottom:-30px;right:8%;"></span>
  <div class="container">
    <h2>Ready to get steel built the local way?</h2>
    <p>
      Tell us about your gate, fence, or structural steel project and Salt River Steel will get you a free,
      itemized estimate from a Florence-based team — no out-of-state freight, no runaround.
    </p>
    <div class="cta-actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Estimate</a>
      <a href="tel:<?php echo $phoneDigits; ?>" class="btn-ghost"><?php echo icon('phone'); ?> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<script>
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

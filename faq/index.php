<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   faq/index.php — Salt River Steel LLC — Frequently Asked Questions
   ============================================================ */

$currentPage      = 'faq';
$pageTitle        = 'Frequently Asked Questions | Salt River Steel | Florence, AZ';
$pageDescription  = 'Common questions about Salt River Steel\'s custom steel fabrication, turnaround times, delivery, pricing, and services in Florence, AZ. Get straight answers from a local steel shop.';
$canonicalUrl     = $siteUrl . '/faq/';
$pageCanonical    = $canonicalUrl;
$ogImage          = $siteUrl . '/assets/images/logo-mark.png';

/* ---------- FAQ data (comprehensive 15-20 questions across all services) ---------- */
$faqCategories = [
    'General' => [
        [
            'question' => 'What services does Salt River Steel offer in Florence, AZ?',
            'answer'   => 'Salt River Steel fabricates custom steel gates, fencing, and structural steel for commercial, residential, and industrial projects across Central Arizona. We handle specialized cuts, welding, and finishing in our Florence shop — from driveway gates and ranch fencing to agricultural structures, industrial equipment, and architectural metalwork.'
        ],
        [
            'question' => 'Do you serve areas outside Florence?',
            'answer'   => 'Yes. While we\'re based in Florence, we deliver to job sites across Central Arizona including Casa Grande, Queen Creek, Apache Junction, San Tan Valley, and the surrounding communities. Delivery rates depend on distance and load size — contact us for a quote.'
        ],
        [
            'question' => 'Are you licensed and insured in Arizona?',
            'answer'   => 'Yes. Salt River Steel LLC is fully licensed and insured to operate in Arizona. We carry general liability and workers\' compensation coverage as required by state law.'
        ],
        [
            'question' => 'How long have you been in business?',
            'answer'   => 'Salt River Steel has served Florence and the surrounding area since ' . $yearEstablished . ', with ownership still on the shop floor. We understand the demands Central Arizona\'s heat, dust, and monsoon season put on steel, and we build for it.'
        ],
    ],
    'Services & Process' => [
        [
            'question' => 'Do you offer custom steel fabrication for non-standard projects?',
            'answer'   => 'Yes. Salt River Steel works directly with contractors and property owners on custom designs for agricultural structures, industrial equipment, architectural features, and commercial builds. Our in-house team handles specialized cuts, welding, and finishing.'
        ],
        [
            'question' => 'What steel products and grades do you stock?',
            'answer'   => 'We carry structural steel, plate steel, tubing, angle iron, and specialty grades chosen to hold up to Arizona\'s heat and monsoon conditions. Call us at ' . $phone . ' for specific grade availability and recommendations for your project.'
        ],
        [
            'question' => 'Can you work with tight project timelines or expedited orders?',
            'answer'   => 'Absolutely. As a local Florence operation, we work directly with your team to prioritize rush jobs. Most custom orders ship within 3–5 business days. Call ' . $phone . ' for expedited fabrication options and pricing.'
        ],
        [
            'question' => 'Do you provide installation, or just fabrication?',
            'answer'   => 'We handle both. Salt River Steel fabricates steel in our Florence shop and coordinates installation where the project calls for it. For larger commercial or industrial builds, we deliver to your job site and work with your contractor on installation.'
        ],
    ],
    'Pricing & Estimates' => [
        [
            'question' => 'How much does custom steel fabrication cost in Florence?',
            'answer'   => 'Cost depends on the project scope, steel grade, dimensions, and finish. A simple driveway gate might run $800–$2,500; commercial structural steel is priced per linear foot or by the load. We provide itemized quotes upfront so there are no surprise costs.'
        ],
        [
            'question' => 'Do you offer free estimates?',
            'answer'   => 'Yes. Salt River Steel provides free on-site estimates for custom gates, fencing, and structural steel projects across Central Arizona. We review your plans, confirm dimensions, and recommend the right grade for the job and the desert climate before quoting.'
        ],
        [
            'question' => 'How long does it take to get an estimate?',
            'answer'   => 'Most estimates are delivered within 1 business day of your initial call or contact form submission. For on-site estimates, we schedule within the same week.'
        ],
        [
            'question' => 'Do you charge extra for delivery to job sites?',
            'answer'   => 'Delivery rates depend on distance and load size. As a Florence-based shop, our delivery costs are competitive compared to Phoenix or out-of-state suppliers who charge premium freight. We quote delivery upfront as part of your estimate.'
        ],
    ],
    'Delivery & Turnaround' => [
        [
            'question' => 'How quickly can Salt River Steel deliver orders to local projects?',
            'answer'   => 'Most custom orders ship within 3–5 business days from our Florence facility — significantly faster than out-of-state suppliers. We keep common stock items on hand for rush jobs across Central Arizona.'
        ],
        [
            'question' => 'Do you deliver to job sites, or is pickup only?',
            'answer'   => 'Both. Salt River Steel delivers to Central Arizona job sites and also offers pickup at our Florence location. Delivery rates depend on distance and load size.'
        ],
        [
            'question' => 'What if I need steel delivered on a specific date?',
            'answer'   => 'We coordinate delivery dates directly with your team during the quoting process. As a local operation, we can prioritize jobs on tight timelines — call us at ' . $phone . ' to discuss your deadline.'
        ],
    ],
    'Materials & Quality' => [
        [
            'question' => 'What kind of finishes do you offer on steel gates and fencing?',
            'answer'   => 'We offer powder coating, galvanizing, and paint finishes depending on the application and your budget. All finishes are chosen to hold up to Arizona\'s UV exposure, heat, and monsoon moisture.'
        ],
        [
            'question' => 'Will my steel gate or fence rust in Arizona\'s climate?',
            'answer'   => 'Properly finished steel holds up well to Arizona\'s heat and monsoons. We recommend corrosion-resistant grades and protective finishes (powder coating or galvanizing) for outdoor applications. Bare steel will oxidize over time; we walk you through finish options during the estimate.'
        ],
        [
            'question' => 'Do you warranty your fabrication work?',
            'answer'   => 'Yes. Salt River Steel warranties workmanship on all fabrication jobs. Warranty terms are detailed in your project contract. Manufacturer warranties on materials (if applicable) pass through to you upon project completion.'
        ],
    ],
];

/* ---------- Build flat FAQ array for FAQPage schema ---------- */
$flatFAQs = [];
foreach ($faqCategories as $category => $items) {
    foreach ($items as $item) {
        $flatFAQs[] = $item;
    }
}
$faqSchema = generateFAQSchema($flatFAQs);

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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'FAQ', 'item' => $canonicalUrl],
            ]
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<style>
/* ============================================================
   FAQ PAGE STYLES
   ============================================================ */
:root {
  --faq-border: rgba(var(--color-primary-rgb), 0.12);
  --faq-hover-bg: rgba(var(--color-accent-rgb), 0.04);
}

.faq-hero {
  position: relative; min-height: 48vh; display: flex; align-items: center;
  padding: calc(var(--nav-height) + var(--space-3xl)) 0 var(--space-2xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  overflow: hidden;
}
.faq-hero .container { position: relative; z-index: 1; max-width: 740px; text-align: center; }
.faq-hero h1 { color: #fff; font-size: clamp(2.2rem, 5vw, 3.2rem); margin: var(--space-md) 0 var(--space-md); }
.faq-hero .hero-lead { color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); line-height: 1.7; max-width: 60ch; margin: 0 auto; }

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

.faq-main { background: var(--color-light); }
.faq-category { margin-bottom: var(--space-3xl); }
.faq-category:last-child { margin-bottom: 0; }
.faq-category-title {
  font-size: clamp(1.4rem, 2.5vw, 1.8rem); color: var(--color-primary);
  font-family: var(--font-heading); margin-bottom: var(--space-lg);
  padding-bottom: var(--space-sm); border-bottom: 2px solid var(--color-accent);
  display: inline-block;
}
.faq-list { display: flex; flex-direction: column; gap: var(--space-md); }
.faq-item {
  background: var(--color-white); border: 1px solid var(--faq-border);
  border-radius: var(--radius-lg); padding: var(--space-lg);
  transition: border-color var(--transition), box-shadow var(--transition);
}
.faq-item:hover { border-color: var(--color-accent); box-shadow: var(--shadow-sm); }
.faq-question {
  display: flex; gap: var(--space-sm); align-items: flex-start;
  font-size: var(--font-size-base); font-weight: 700; color: var(--color-dark);
  margin-bottom: var(--space-md);
}
.faq-question svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.faq-answer { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; margin: 0; padding-left: calc(20px + var(--space-sm)); }
.faq-answer a { color: var(--color-primary); text-decoration: underline; }

.faq-cta {
  background: var(--color-dark); position: relative; overflow: hidden;
}
.faq-cta::after {
  content: ""; position: absolute; left: -60px; bottom: -60px; width: 380px; height: 380px;
  border-radius: 50%; background: rgba(var(--color-accent-rgb),0.14); pointer-events: none;
}
.faq-cta .container { position: relative; z-index: 1; text-align: center; max-width: 680px; }
.faq-cta h2 { color: #fff; font-size: clamp(1.9rem, 4vw, 2.8rem); margin-bottom: var(--space-md); }
.faq-cta p { color: rgba(255,255,255,0.92); margin-bottom: var(--space-xl); font-size: var(--font-size-lg); }
.faq-cta-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

@media (max-width: 480px) {
  .faq-cta-actions .btn { width: 100%; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Hero -->
<section class="faq-hero" aria-label="Frequently Asked Questions">
    <div class="container">
        <span class="eyebrow-label" style="color: rgba(255,255,255,0.85);">Got Questions?</span>
        <h1>Steel Fabrication <span class="text-accent">Questions Answered</span></h1>
        <p class="hero-lead">
            Straight answers on turnaround, pricing, delivery, custom fabrication, and the steel grades
            Salt River Steel keeps on hand in Florence. Can't find what you're looking for? Call us at
            <a href="tel:<?php echo $phoneDigits; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $phone; ?></a>.
        </p>
    </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">FAQ</li>
        </ol>
    </div>
</nav>

<!-- FAQ Main -->
<section class="section faq-main" aria-label="FAQ categories">
    <div class="container">
        <?php foreach ($faqCategories as $category => $items): ?>
        <div class="faq-category">
            <h2 class="faq-category-title"><?php echo htmlspecialchars($category); ?></h2>
            <div class="faq-list">
                <?php foreach ($items as $item): ?>
                <div class="faq-item">
                    <h3 class="faq-question">
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                            <path d="M12 17h.01"/>
                        </svg>
                        <?php echo htmlspecialchars($item['question']); ?>
                    </h3>
                    <p class="faq-answer"><?php echo $item['answer']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- CTA -->
<section class="section faq-cta" aria-label="Contact Salt River Steel">
    <div class="container">
        <h2>Still have questions? Let's talk steel.</h2>
        <p>
            Call us at <?php echo $phone; ?> or fill out our contact form — we'll get you a straight
            answer and a realistic quote for your custom gates, fencing, or structural steel project.
        </p>
        <div class="faq-cta-actions">
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

<!-- FAQPage schema (AI comprehension aid) -->
<?php echo $faqSchema; ?>

<!-- BreadcrumbList schema -->
<?php echo $schemaMarkup; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

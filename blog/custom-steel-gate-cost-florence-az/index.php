<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$currentPage = 'blog';
$blogSlug = 'custom-steel-gate-cost-florence-az';
$blogPost = null;

// Find this post in the registry
foreach ($blogPosts as $post) {
    if ($post['slug'] === $blogSlug) {
        $blogPost = $post;
        break;
    }
}

// Fallback if post not found in registry
if (!$blogPost) {
    header('Location: /blog/');
    exit;
}

$pageTitle = $blogPost['title'];
$pageDescription = $blogPost['excerpt'];
$pageCanonical = $siteUrl . '/blog/' . $blogSlug . '/';
$heroPreloadImage = '';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- @graph Schema: BlogPosting + BreadcrumbList + FAQPage -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "BlogPosting",
            "headline": "<?php echo htmlspecialchars($blogPost['title']); ?>",
            "description": "<?php echo htmlspecialchars($blogPost['excerpt']); ?>",
            "image": "<?php echo $siteUrl . $blogPost['image']; ?>",
            "datePublished": "<?php echo $blogPost['dateISO']; ?>",
            "dateModified": "<?php echo $blogPost['dateISO']; ?>",
            "author": {
                "@id": "<?php echo $siteUrl; ?>/#organization"
            },
            "publisher": {
                "@id": "<?php echo $siteUrl; ?>/#organization"
            },
            "keywords": "custom steel gates, gate cost Florence AZ, automated gates, steel gate pricing, driveway gates"
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo $siteUrl; ?>/"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "Blog",
                    "item": "<?php echo $siteUrl; ?>/blog/"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo htmlspecialchars($blogPost['title']); ?>",
                    "item": "<?php echo $pageCanonical; ?>"
                }
            ]
        },
        {
            "@type": "FAQPage",
            "mainEntity": [
                {
                    "@type": "Question",
                    "name": "How much does a custom steel gate cost in Florence, AZ?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Custom steel gates in Florence, AZ typically range from $2,500 to $8,000+. Basic manual swing gates start around $2,500-$4,000, while automated slide gates with advanced features can exceed $8,000. Final cost depends on size, design complexity, automation, and site preparation requirements."
                    }
                },
                {
                    "@type": "Question",
                    "name": "What factors affect custom steel gate pricing?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Gate pricing is influenced by size and span (single vs double gates), design complexity (simple vs ornamental), automation requirements (manual vs motorized operators), material gauge and finish, site preparation and installation complexity, and optional features like keypad entry or solar power."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Are automated steel gates worth the extra cost?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Automated gates add $1,500-$3,500 to project costs but provide significant convenience, improved security with controlled access, increased property value, and reduced wear on manual hardware. For properties with frequent access needs or security concerns, automation typically pays for itself in convenience and home value."
                    }
                },
                {
                    "@type": "Question",
                    "name": "How long do custom steel gates last in Arizona?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Properly fabricated and powder-coated steel gates last 20-30+ years in Arizona's desert climate. Regular maintenance (annual inspection, lubrication, touch-up of scratches) extends lifespan. Steel gates outlast wood and vinyl alternatives in high-heat, low-humidity conditions common to Florence and Pinal County."
                    }
                }
            ]
        }
    ]
}
</script>

<style>
/* Blog Post Page-Specific Styles */
.blog-post__layout {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-3xl);
    padding: var(--space-4xl) 0;
}

@media (min-width: 1024px) {
    .blog-post__layout {
        grid-template-columns: 1fr 320px;
    }
}

.blog-post__main {
    max-width: 800px;
}

.blog-post__sidebar {
    position: sticky;
    top: calc(var(--nav-height) + var(--space-xl));
    height: fit-content;
}

.sidebar-cta {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    color: white;
    padding: var(--space-2xl);
    border-radius: var(--radius-lg);
    text-align: center;
    box-shadow: var(--shadow-lg);
}

.sidebar-cta h3 {
    font-size: 1.5rem;
    margin-bottom: var(--space-md);
}

.sidebar-cta p {
    margin-bottom: var(--space-lg);
    opacity: 0.95;
    line-height: 1.6;
}

.sidebar-cta .btn-accent {
    background: var(--color-accent);
    color: var(--color-primary);
    padding: var(--space-md) var(--space-xl);
    border-radius: var(--radius);
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    text-decoration: none;
    transition: all var(--transition);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.sidebar-cta .btn-accent:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.25);
}

.answer-block {
    background: linear-gradient(135deg, rgba(6, 182, 212, 0.08) 0%, rgba(6, 182, 212, 0.03) 100%);
    border-left: 4px solid var(--color-accent);
    padding: var(--space-xl);
    margin: var(--space-2xl) 0;
    border-radius: var(--radius);
}

.answer-block h3 {
    color: var(--color-primary);
    font-size: 1.5rem;
    margin-bottom: var(--space-md);
    line-height: 1.3;
}

.answer-block p {
    font-size: 1.125rem;
    line-height: 1.7;
    color: var(--color-text);
}

.cost-table {
    width: 100%;
    border-collapse: collapse;
    margin: var(--space-xl) 0;
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow);
}

.cost-table thead {
    background: var(--color-primary);
    color: white;
}

.cost-table th,
.cost-table td {
    padding: var(--space-md) var(--space-lg);
    text-align: left;
    border-bottom: 1px solid var(--color-border);
}

.cost-table tr:last-child td {
    border-bottom: none;
}

.cost-table tbody tr:hover {
    background: var(--color-bg-alt);
}

.cost-range {
    font-weight: 700;
    color: var(--color-accent);
    font-size: 1.125rem;
}

.related-links {
    background: var(--color-bg-alt);
    padding: var(--space-xl);
    border-radius: var(--radius-lg);
    margin: var(--space-2xl) 0;
}

.related-links h3 {
    font-size: 1.25rem;
    margin-bottom: var(--space-md);
    color: var(--color-primary);
}

.related-links ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.related-links li {
    margin-bottom: var(--space-sm);
}

.related-links a {
    color: var(--color-accent);
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: var(--space-xs);
    transition: gap var(--transition);
}

.related-links a:hover {
    gap: var(--space-sm);
}

.faq-section {
    margin: var(--space-3xl) 0;
}

.faq-item {
    background: white;
    border: 1px solid var(--color-border);
    border-radius: var(--radius);
    padding: var(--space-xl);
    margin-bottom: var(--space-lg);
}

.faq-item h3 {
    color: var(--color-primary);
    font-size: 1.25rem;
    margin-bottom: var(--space-md);
}

.faq-item p {
    line-height: 1.7;
    color: var(--color-text);
}

.blog-post__related-services,
.blog-post__related-articles {
    background: var(--color-bg-alt);
    padding: var(--space-4xl) 0;
    margin-top: var(--space-4xl);
}

.blog-post__related-services h2,
.blog-post__related-articles h2 {
    text-align: center;
    margin-bottom: var(--space-2xl);
    font-size: 2rem;
}

.related-services-grid,
.related-articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--space-xl);
    max-width: 1200px;
    margin: 0 auto;
}

.service-card-mini {
    background: white;
    padding: var(--space-xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow);
    transition: transform var(--transition), box-shadow var(--transition);
    text-align: center;
}

.service-card-mini:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.service-card-mini h3 {
    color: var(--color-primary);
    margin: var(--space-md) 0;
    font-size: 1.25rem;
}

.service-card-mini p {
    color: var(--color-text);
    margin-bottom: var(--space-lg);
    font-size: 0.9375rem;
    line-height: 1.6;
}

.service-card-mini .btn-link {
    color: var(--color-accent);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: var(--space-xs);
    transition: gap var(--transition);
}

.service-card-mini .btn-link:hover {
    gap: var(--space-sm);
}

.article-card-mini {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: transform var(--transition), box-shadow var(--transition);
    display: flex;
    flex-direction: column;
}

.article-card-mini:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.article-card-mini__image {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.article-card-mini__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.article-card-mini__body {
    padding: var(--space-lg);
    flex: 1;
}

.article-card-mini__category {
    display: inline-block;
    background: var(--color-accent);
    color: white;
    padding: var(--space-xs) var(--space-sm);
    border-radius: var(--radius-sm);
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: var(--space-sm);
}

.article-card-mini__title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: var(--space-sm);
    color: var(--color-primary);
}

.article-card-mini__title a {
    color: inherit;
    text-decoration: none;
}

.article-card-mini__excerpt {
    font-size: 0.9375rem;
    line-height: 1.6;
    color: var(--color-text);
    margin-bottom: var(--space-md);
}

.article-card-mini__cta {
    color: var(--color-accent);
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: var(--space-xs);
    transition: gap var(--transition);
}

.article-card-mini__cta:hover {
    gap: var(--space-sm);
}
</style>

<!-- Blog Post Header -->
<header class="blog-post__header">
    <div class="container">
        <span class="blog-post__category"><?php echo htmlspecialchars($blogPost['category']); ?></span>
        <h1><?php echo htmlspecialchars($blogPost['title']); ?></h1>
        <div class="blog-post__meta">
            <span><?php echo icon('calendar', 18); ?> <?php echo htmlspecialchars($blogPost['date']); ?></span>
            <span><?php echo icon('clock', 18); ?> <?php echo htmlspecialchars($blogPost['readtime']); ?></span>
        </div>
    </div>
</header>

<!-- Featured Image -->
<div class="container">
    <div class="blog-post__featured-image">
        <img
            src="/assets/images/custom-steel-gates-480.webp"
            srcset="/assets/images/custom-steel-gates-480.webp 480w,
                    /assets/images/custom-steel-gates-960.webp 960w,
                    /assets/images/custom-steel-gates-1600.webp 1600w"
            sizes="(max-width: 768px) 100vw, (max-width: 1200px) 90vw, 1200px"
            alt="<?php echo htmlspecialchars($blogPost['alt']); ?>"
            width="1200"
            height="675"
            loading="eager"
        >
    </div>
</div>

<!-- Main Content + Sidebar -->
<div class="container">
    <div class="blog-post__layout">
        <!-- Main Content -->
        <article class="blog-post__main">
            <div class="blog-post__content">

                <!-- Answer-First Intro Block -->
                <div class="answer-block">
                    <h3>Quick Answer: Custom Steel Gate Cost in Florence, AZ</h3>
                    <p>
                        Custom steel gates in Florence, AZ typically range from <strong>$2,500 to $8,000+</strong> depending on size, design complexity, and automation.
                        Basic manual swing gates start around $2,500-$4,000, while automated slide gates with advanced features can exceed $8,000.
                        Final cost depends on your specific gate width, ornamental details, operator choice, and site preparation requirements.
                    </p>
                </div>

                <p>
                    Salt River Steel LLC fabricates custom steel gates for residential, commercial, and ranch properties across Florence and Pinal County.
                    Over the past four years, we've installed gates ranging from simple manual entry gates to fully automated slide gates with solar power and remote access.
                    This guide breaks down the cost factors, typical pricing ranges, and what you can expect when budgeting for a custom steel gate project in Florence, Arizona.
                </p>

                <h2>What Affects Custom Steel Gate Pricing?</h2>

                <p>
                    Steel gate costs vary significantly based on six primary factors. Understanding these elements helps you budget accurately and make informed decisions about which features provide the best value for your property.
                </p>

                <h3>1. Gate Size and Span</h3>
                <p>
                    Single-width gates (10-16 feet) are less expensive than double gates spanning 20+ feet.
                    A standard 12-foot driveway gate costs $2,500-$4,000 for manual operation, while a 24-foot double gate starts around $5,000-$7,000 before automation.
                    Wider spans require heavier structural steel, larger hinges or track systems, and more labor for fabrication and installation.
                </p>

                <h3>2. Design Complexity</h3>
                <p>
                    Simple horizontal or vertical bar patterns cost less than ornamental scrollwork, laser-cut panels, or custom monogram inserts.
                    A basic five-bar ranch gate runs $2,500-$3,500, while an ornamental estate gate with scroll details and custom finials can reach $6,000-$10,000 for the same width.
                    Labor hours increase significantly with intricate designs — each custom element adds fabrication time and material costs.
                </p>

                <h3>3. Automation and Operators</h3>
                <p>
                    Manual gates are the most affordable option, but automation adds $1,500-$3,500 to project costs.
                    Swing gate operators (arm-style or underground) cost $1,500-$2,500 installed, while slide gate operators with track and chain systems run $2,000-$3,500.
                    Solar-powered systems add another $800-$1,200 but eliminate trenching and electrical work, making them cost-effective for remote driveway locations common around Florence.
                </p>

                <h3>4. Material Gauge and Finish</h3>
                <p>
                    We fabricate gates from 14-gauge to 11-gauge steel tubing depending on gate weight and span.
                    Heavier gauge steel costs more per linear foot but provides greater structural integrity for large or frequently used gates.
                    Powder coating — the standard finish for Arizona's intense UV and heat — adds $400-$800 depending on gate size and color.
                    Powder-coated gates resist fading, rust, and thermal expansion far better than painted alternatives in Florence's desert climate.
                </p>

                <h3>5. Site Preparation and Installation</h3>
                <p>
                    Installation costs depend on soil conditions, access, and existing infrastructure.
                    Standard installation on level ground with adequate clearance costs $500-$1,200.
                    Challenging sites — rocky caliche soil, sloped driveways, or locations requiring post anchoring in bedrock — can add $800-$2,000 in site prep and foundation work.
                    Slide gates require concrete track pads, which add $400-$800 to installation versus swing gates with in-ground posts.
                </p>

                <h3>6. Optional Features</h3>
                <p>
                    Access control features — keypad entry, remote transmitters, smartphone connectivity, vehicle loop detectors — each add to total cost.
                    A basic keypad costs $200-$400, while smartphone-enabled systems with cloud monitoring run $600-$1,200.
                    Safety features like photo-eye sensors ($150-$300) and battery backup ($250-$500) are recommended for automated gates, especially those across driveways with frequent traffic.
                </p>

                <h2>How Much Do Automated Gates Cost in Florence?</h2>

                <p>
                    Automation transforms a manual gate into a controlled-access entry system. The added convenience, security, and property value typically justify the cost for homeowners and business owners with regular access needs.
                </p>

                <table class="cost-table">
                    <thead>
                        <tr>
                            <th>Gate Type</th>
                            <th>Manual Cost</th>
                            <th>Automated Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Single Swing Gate (12-14 ft)</td>
                            <td class="cost-range">$2,500 - $4,000</td>
                            <td class="cost-range">$4,000 - $6,500</td>
                        </tr>
                        <tr>
                            <td>Double Swing Gate (16-20 ft)</td>
                            <td class="cost-range">$4,000 - $6,000</td>
                            <td class="cost-range">$6,000 - $9,000</td>
                        </tr>
                        <tr>
                            <td>Slide Gate (12-16 ft)</td>
                            <td class="cost-range">$3,500 - $5,000</td>
                            <td class="cost-range">$5,500 - $8,000</td>
                        </tr>
                        <tr>
                            <td>Slide Gate (20-24 ft)</td>
                            <td class="cost-range">$5,000 - $7,000</td>
                            <td class="cost-range">$7,500 - $10,000+</td>
                        </tr>
                    </tbody>
                </table>

                <p>
                    Slide gates are preferred for wider spans and windy locations because they operate along a track rather than swinging through an arc.
                    Florence properties with limited driveway setback or tight approach angles often choose slide gates to avoid clearance issues that affect swing gates.
                </p>

                <h2>Are Automated Steel Gates Worth the Investment?</h2>

                <p>
                    The $1,500-$3,500 premium for automation delivers measurable benefits beyond convenience:
                </p>

                <ul>
                    <li><strong>Security and controlled access:</strong> Automated gates with keypads or remote access prevent unauthorized entry and allow you to monitor who enters your property.</li>
                    <li><strong>Reduced wear on manual hardware:</strong> Manual gates experience hinge and latch wear from repeated opening and closing. Automated operators distribute force evenly and reduce stress on structural components.</li>
                    <li><strong>Increased property value:</strong> Automated entry gates are a premium feature that enhances curb appeal and resale value, particularly for ranch properties and gated communities around Florence.</li>
                    <li><strong>All-weather operation:</strong> You can open and close automated gates from inside your vehicle during monsoon storms or extreme heat without stepping outside.</li>
                </ul>

                <p>
                    For properties with frequent daily access or security concerns, automation typically pays for itself in convenience and home value within a few years.
                    Manual gates remain a solid choice for occasional-use ranch gates or budget-conscious projects where access frequency doesn't justify the automation cost.
                </p>

                <h2>What Design Options Are Available for Custom Steel Gates?</h2>

                <p>
                    We fabricate gates to match your property's architectural style and functional requirements. Popular design categories include:
                </p>

                <h3>Simple Bar Gates</h3>
                <p>
                    Horizontal or vertical bar patterns with minimal ornamentation. These gates cost $2,500-$4,000 for standard widths and work well for ranch properties, commercial yards, and modern residential designs where clean lines are preferred.
                </p>

                <h3>Ornamental Estate Gates</h3>
                <p>
                    Custom scrollwork, finials, laser-cut panels, and decorative inserts. Estate gates range from $5,000 to $12,000+ depending on design complexity and size.
                    These gates serve as focal points for upscale properties and gated entries where visual impact is as important as security.
                </p>

                <h3>Privacy Gates with Infill Panels</h3>
                <p>
                    Solid steel panels or perforated metal infill that blocks sightlines while maintaining airflow. Privacy gates cost $4,000-$7,000 for standard spans and are popular for commercial properties, industrial yards, and residential properties where screening is desired.
                </p>

                <h3>Monogram and Custom Cutouts</h3>
                <p>
                    Laser-cut ranch brands, family initials, or custom logos integrated into the gate design. Custom cutouts add $500-$1,500 depending on complexity.
                    We've fabricated gates with livestock brands for area ranches and business logos for commercial properties across Pinal County.
                </p>

                <h2>How Long Do Custom Steel Gates Last in Arizona?</h2>

                <p>
                    Properly fabricated and finished steel gates last 20-30+ years in Arizona's desert climate. Florence's low humidity and minimal rainfall reduce rust risk compared to coastal or high-moisture environments.
                    Powder-coated finishes resist UV degradation, thermal expansion, and surface oxidation far better than traditional paints.
                </p>

                <p>
                    Maintenance requirements are minimal: annual hinge lubrication, periodic inspection of automated components (operators, sensors, safety devices), and touch-up of any finish scratches caused by contact or debris.
                    Steel gates outlast wood gates (which warp, crack, and rot in heat) and vinyl gates (which become brittle and fade under intense UV exposure).
                </p>

                <p>
                    Automated components — operators, circuit boards, photo-eye sensors — have a service life of 10-15 years with regular use. We install commercial-grade operators rated for residential and light commercial duty cycles, and replacement parts are readily available when needed.
                </p>

                <div class="related-links">
                    <h3>Related Services</h3>
                    <ul>
                        <li>
                            <a href="/services/custom-steel-gates/">
                                <?php echo icon('arrow-right', 16); ?>
                                Custom Steel Gates — Fabrication & Installation
                            </a>
                        </li>
                        <li>
                            <a href="/services/steel-fencing/">
                                <?php echo icon('arrow-right', 16); ?>
                                Steel Fencing for Residential & Commercial Properties
                            </a>
                        </li>
                    </ul>
                </div>

                <h2>Frequently Asked Questions About Custom Steel Gate Costs</h2>

                <div class="faq-section">
                    <div class="faq-item">
                        <h3>How much does a custom steel gate cost in Florence, AZ?</h3>
                        <p>
                            Custom steel gates in Florence, AZ typically range from $2,500 to $8,000+.
                            Basic manual swing gates start around $2,500-$4,000, while automated slide gates with advanced features can exceed $8,000.
                            Final cost depends on size, design complexity, automation, and site preparation requirements.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>What factors affect custom steel gate pricing?</h3>
                        <p>
                            Gate pricing is influenced by size and span (single vs double gates), design complexity (simple vs ornamental),
                            automation requirements (manual vs motorized operators), material gauge and finish, site preparation and installation complexity,
                            and optional features like keypad entry or solar power.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>Are automated steel gates worth the extra cost?</h3>
                        <p>
                            Automated gates add $1,500-$3,500 to project costs but provide significant convenience, improved security with controlled access,
                            increased property value, and reduced wear on manual hardware.
                            For properties with frequent access needs or security concerns, automation typically pays for itself in convenience and home value.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>How long do custom steel gates last in Arizona?</h3>
                        <p>
                            Properly fabricated and powder-coated steel gates last 20-30+ years in Arizona's desert climate.
                            Regular maintenance (annual inspection, lubrication, touch-up of scratches) extends lifespan.
                            Steel gates outlast wood and vinyl alternatives in high-heat, low-humidity conditions common to Florence and Pinal County.
                        </p>
                    </div>
                </div>

                <p>
                    Looking to budget for a custom steel gate? Our team at <a href="/services/custom-steel-gates/">Salt River Steel LLC</a> provides free on-site consultations and detailed project quotes for Florence-area properties.
                    We'll assess your driveway layout, discuss design options, and provide transparent pricing for every component of your gate project — from fabrication through final installation and automation.
                </p>

                <p>
                    For more guidance on choosing the right gate material for Arizona's climate, read our companion article on <a href="/blog/steel-vs-wrought-iron-fencing-arizona/">steel vs. wrought iron fencing in Arizona</a>.
                </p>

            </div>
        </article>

        <!-- Sidebar -->
        <aside class="blog-post__sidebar">
            <div class="sidebar-cta">
                <h3>Need a Custom Steel Gate?</h3>
                <p>Get a free consultation and project quote for your Florence-area property.</p>
                <a href="/contact/" class="btn-accent">
                    Get Free Quote
                    <?php echo icon('arrow-right', 20); ?>
                </a>
            </div>
        </aside>
    </div>
</div>

<!-- Related Services Section -->
<section class="blog-post__related-services">
    <div class="container">
        <h2>Related Services</h2>
        <div class="related-services-grid">
            <div class="service-card-mini">
                <?php echo icon('shield-check', 48); ?>
                <h3>Custom Steel Gates</h3>
                <p>Custom-fabricated driveway, entry, and security gates built to fit your Florence-area property.</p>
                <a href="/services/custom-steel-gates/" class="btn-link">
                    Learn More
                    <?php echo icon('arrow-right', 18); ?>
                </a>
            </div>
            <div class="service-card-mini">
                <?php echo icon('fence', 48); ?>
                <h3>Steel Fencing</h3>
                <p>Durable steel and wrought-iron fencing for homes, ranches, and commercial sites across the Florence area.</p>
                <a href="/services/steel-fencing/" class="btn-link">
                    Learn More
                    <?php echo icon('arrow-right', 18); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Articles Section -->
<section class="blog-post__related-articles">
    <div class="container">
        <h2>Related Articles</h2>
        <div class="related-articles-grid">
            <?php
            // Pull the other blog post from the registry (different category preferred)
            $relatedPosts = array_filter($blogPosts, function($post) use ($blogSlug) {
                return $post['slug'] !== $blogSlug;
            });

            foreach (array_slice($relatedPosts, 0, 1) as $relatedPost):
            ?>
                <article class="article-card-mini">
                    <div class="article-card-mini__image">
                        <img
                            src="<?php echo htmlspecialchars($relatedPost['image']); ?>"
                            alt="<?php echo htmlspecialchars($relatedPost['alt']); ?>"
                            loading="lazy"
                            width="400"
                            height="200"
                        >
                    </div>
                    <div class="article-card-mini__body">
                        <span class="article-card-mini__category"><?php echo htmlspecialchars($relatedPost['category']); ?></span>
                        <h3 class="article-card-mini__title">
                            <a href="/blog/<?php echo htmlspecialchars($relatedPost['slug']); ?>/">
                                <?php echo htmlspecialchars($relatedPost['title']); ?>
                            </a>
                        </h3>
                        <p class="article-card-mini__excerpt">
                            <?php echo htmlspecialchars($relatedPost['excerpt']); ?>
                        </p>
                        <a href="/blog/<?php echo htmlspecialchars($relatedPost['slug']); ?>/" class="article-card-mini__cta">
                            Read Article
                            <?php echo icon('arrow-right', 18); ?>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

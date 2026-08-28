<?php
/**
 * /blog/index.php — Salt River Steel LLC
 * Blog index: reads ONLY from includes/blog-data.php ($blogPosts).
 * Layout: dark interior hero → featured (latest) post → category filter →
 * editorial grid → topic clusters (internal links to services) → CTA band.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$currentPage     = 'blog';
$pageTitle       = 'Steel Gate, Fence & Building Guides | Salt River Steel Blog';
$pageDescription = 'Cost guides, material comparisons and planning tips for custom steel gates, ranch fencing, barns and steel buildings in Florence and Pinal County, AZ. Get a free estimate.';
$pageCanonical   = $siteUrl . '/blog/';
$canonicalUrl    = $pageCanonical;
$ogImage         = $siteUrl . '/assets/images/og-salt-river-steel.jpg';

// Newest first (registry is already ordered, but sort defensively by dateISO)
usort($blogPosts, function ($a, $b) { return strcmp($b['dateISO'], $a['dateISO']); });
$featured   = $blogPosts[0] ?? null;
$rest       = array_slice($blogPosts, 1);
$categories = array_values(array_unique(array_map(function ($p) { return $p['category']; }, $blogPosts)));
$slugify    = function ($s) { return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($s)), '-'); };

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- CollectionPage + Blog + BreadcrumbList schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "CollectionPage",
      "@id": "<?php echo $siteUrl; ?>/blog/#webpage",
      "url": "<?php echo $siteUrl; ?>/blog/",
      "name": "<?php echo htmlspecialchars($pageTitle, ENT_QUOTES); ?>",
      "description": "<?php echo htmlspecialchars($pageDescription, ENT_QUOTES); ?>",
      "isPartOf": { "@id": "<?php echo $siteUrl; ?>/#website" },
      "about": { "@id": "<?php echo $siteUrl; ?>/#organization" }
    },
    {
      "@type": "Blog",
      "@id": "<?php echo $siteUrl; ?>/blog/#blog",
      "name": "<?php echo htmlspecialchars($siteName, ENT_QUOTES); ?> Blog",
      "publisher": { "@id": "<?php echo $siteUrl; ?>/#organization" },
      "blogPost": [
        <?php foreach ($blogPosts as $i => $p): ?>
        {
          "@type": "BlogPosting",
          "headline": "<?php echo htmlspecialchars($p['title'], ENT_QUOTES); ?>",
          "url": "<?php echo $siteUrl; ?>/blog/<?php echo $p['slug']; ?>/",
          "datePublished": "<?php echo $p['dateISO']; ?>",
          "image": "<?php echo $siteUrl . $p['image']; ?>",
          "author": { "@id": "<?php echo $siteUrl; ?>/#organization" }
        }<?php echo $i < count($blogPosts) - 1 ? ',' : ''; ?>
        <?php endforeach; ?>
      ]
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
        { "@type": "ListItem", "position": 2, "name": "Blog", "item": "<?php echo $siteUrl; ?>/blog/" }
      ]
    }
  ]
}
</script>

<!-- ============================================================
     HERO — compact dark interior hero (framework .hero--interior)
     ============================================================ -->
<section class="hero hero--interior hero--blog-index" aria-label="Salt River Steel blog">
    <div class="hero__content">
        <span class="eyebrow-label">Steel Insights &amp; Guides</span>
        <h1>Straight Answers on <span class="text-accent">Steel Gates, Fencing &amp; Buildings</span> in Central Arizona</h1>
        <p class="hero__subtitle">
            Cost guides, material comparisons and planning advice written by the Salt River Steel crew in Florence, AZ —
            so you know what a project takes before you call for an estimate.
        </p>
        <nav class="bi-hero-chips" aria-label="Browse by topic">
            <?php foreach ($categories as $c): ?>
                <a href="#posts" class="bi-chip" data-filter-link="<?php echo $slugify($c); ?>"><?php echo htmlspecialchars($c); ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</section>

<?php if ($featured): ?>
<!-- ============================================================
     FEATURED (latest post)
     ============================================================ -->
<section class="bi-featured" aria-label="Latest article">
    <div class="container">
        <div class="section-header">
            <span class="eyebrow">Latest Guide</span>
        </div>
        <article class="bi-featured__card">
            <a href="/blog/<?php echo $featured['slug']; ?>/" class="bi-featured__media" aria-label="Read: <?php echo htmlspecialchars($featured['title']); ?>">
                <img src="<?php echo htmlspecialchars($featured['image']); ?>"
                     srcset="<?php echo htmlspecialchars(str_replace('-960.webp', '-480.webp', $featured['image'])); ?> 480w, <?php echo htmlspecialchars($featured['image']); ?> 960w, <?php echo htmlspecialchars(str_replace('-960.webp', '-1440.webp', $featured['image'])); ?> 1440w"
                     sizes="(max-width: 900px) 100vw, 55vw"
                     alt="<?php echo htmlspecialchars($featured['alt']); ?>"
                     width="960" height="720" loading="eager" fetchpriority="high" decoding="async">
            </a>
            <div class="bi-featured__body">
                <div class="bi-meta">
                    <span class="bi-badge"><?php echo htmlspecialchars($featured['category']); ?></span>
                    <time datetime="<?php echo $featured['dateISO']; ?>"><?php echo $featured['date']; ?></time>
                    <span class="bi-dot" aria-hidden="true">•</span>
                    <span><?php echo htmlspecialchars($featured['readtime']); ?></span>
                </div>
                <h2><a href="/blog/<?php echo $featured['slug']; ?>/"><?php echo htmlspecialchars($featured['title']); ?></a></h2>
                <p><?php echo htmlspecialchars($featured['excerpt']); ?></p>
                <a href="/blog/<?php echo $featured['slug']; ?>/" class="btn-primary">Read the Guide <?php echo icon('arrow-right', 18); ?></a>
            </div>
        </article>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     ALL POSTS — filterable editorial grid (fail-open: all visible without JS)
     ============================================================ -->
<section class="bi-posts section--light" id="posts" aria-label="All articles">
    <div class="container">
        <div class="bi-posts__head">
            <div>
                <span class="eyebrow-label">All Articles</span>
                <h2>Guides from the <span class="text-accent">Florence shop floor</span></h2>
            </div>
            <div class="bi-filter" role="group" aria-label="Filter articles by category">
                <button type="button" class="bi-chip is-active" data-filter="all" aria-pressed="true">All</button>
                <?php foreach ($categories as $c): ?>
                    <button type="button" class="bi-chip" data-filter="<?php echo $slugify($c); ?>" aria-pressed="false"><?php echo htmlspecialchars($c); ?></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="bi-grid" data-p1-dynamic>
            <?php foreach ($blogPosts as $post): ?>
            <article class="bi-card" data-category="<?php echo $slugify($post['category']); ?>">
                <a href="/blog/<?php echo $post['slug']; ?>/" class="bi-card__media" aria-label="Read: <?php echo htmlspecialchars($post['title']); ?>">
                    <img src="<?php echo htmlspecialchars($post['image']); ?>"
                         srcset="<?php echo htmlspecialchars(str_replace('-960.webp', '-480.webp', $post['image'])); ?> 480w, <?php echo htmlspecialchars($post['image']); ?> 960w"
                         sizes="(max-width: 640px) 100vw, (max-width: 1100px) 50vw, 380px"
                         alt="<?php echo htmlspecialchars($post['alt']); ?>"
                         width="960" height="720" loading="lazy" decoding="async">
                    <span class="bi-badge bi-badge--float"><?php echo htmlspecialchars($post['category']); ?></span>
                </a>
                <div class="bi-card__body">
                    <div class="bi-meta">
                        <time datetime="<?php echo $post['dateISO']; ?>"><?php echo $post['date']; ?></time>
                        <span class="bi-dot" aria-hidden="true">•</span>
                        <span><?php echo htmlspecialchars($post['readtime']); ?></span>
                    </div>
                    <h3><a href="/blog/<?php echo $post['slug']; ?>/"><?php echo htmlspecialchars($post['title']); ?></a></h3>
                    <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
                    <a href="/blog/<?php echo $post['slug']; ?>/" class="bi-card__cta">Read Article <?php echo icon('arrow-right', 16); ?></a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <p class="bi-empty" hidden>No articles in that category yet — check back soon.</p>
    </div>
</section>

<!-- ============================================================
     TOPIC CLUSTERS — what we write about, linked to the service pages
     ============================================================ -->
<section class="bi-topics" aria-label="Topics we cover">
    <div class="container">
        <div class="section-header">
            <span class="eyebrow">What We Cover</span>
            <h2>Planning a steel project? <span class="text-accent">Start here.</span></h2>
            <p class="bi-topics__lead">Every guide ties back to work we actually do in Florence, Coolidge, Casa Grande and the rest of Pinal County.</p>
        </div>
        <div class="bi-topics__grid" data-p1-dynamic>
            <?php
            $topics = [
                ['icon' => 'shield-check', 'title' => 'Custom Steel Gates',      'desc' => 'Driveway, ranch-entry and privacy gates — pricing, automation and what holds up in the desert.', 'href' => '/services/custom-steel-gates/'],
                ['icon' => 'ruler',        'title' => 'Steel &amp; Ranch Fencing', 'desc' => 'Pipe rail, corrugated privacy panels and corral fencing compared for cost and longevity.', 'href' => '/services/steel-fencing/'],
                ['icon' => 'building-2',   'title' => 'Steel Buildings &amp; Barns', 'desc' => 'Shops, barns, mare motels and commercial structures from red iron to finished skin.', 'href' => '/services/commercial-steel-construction/'],
                ['icon' => 'home',         'title' => 'Residential Steel Work',  'desc' => 'Patio covers, ramadas, casitas and steel accents that survive Arizona sun.', 'href' => '/services/residential-steel-work/'],
            ];
            foreach ($topics as $t): ?>
            <a href="<?php echo $t['href']; ?>" class="bi-topic">
                <span class="bi-topic__icon"><?php echo icon($t['icon'], 22); ?></span>
                <span class="bi-topic__title"><?php echo $t['title']; ?></span>
                <span class="bi-topic__desc"><?php echo $t['desc']; ?></span>
                <span class="bi-topic__link">See the service <?php echo icon('arrow-right', 14); ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     CTA BAND
     ============================================================ -->
<section class="bi-cta" aria-label="Request an estimate">
    <div class="container bi-cta__inner">
        <div>
            <h2>Ready to price your steel project?</h2>
            <p>Free on-site estimates across Florence and Pinal County. Talk directly with the crew that fabricates and installs your steel.</p>
        </div>
        <div class="bi-cta__actions">
            <a href="/contact/" class="btn-primary btn-large">Get a Free Estimate</a>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn-secondary btn-large"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
        </div>
    </div>
</section>

<style>
/* ---- Blog index (unique sections only; template classes live in framework.css) ---- */
.hero--blog-index .hero__content { max-width: 880px; }
.hero--blog-index h1 { font-size: clamp(2.1rem, 4.2vw, 3.4rem); text-wrap: balance; }
.bi-hero-chips { display: flex; flex-wrap: wrap; justify-content: center; gap: var(--space-2); margin-top: var(--space-6); }

.bi-chip { display: inline-flex; align-items: center; gap: var(--space-1); padding: 0.55rem 1rem; min-height: 44px; border-radius: var(--radius-full);
  border: 1px solid rgba(var(--color-primary-rgb), 0.25); background: var(--color-white); color: var(--color-primary);
  font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600; cursor: pointer; transition: all var(--transition-base); text-decoration: none; }
.bi-chip:hover, .bi-chip.is-active { background: var(--color-primary); border-color: var(--color-primary); color: var(--color-white); }
.hero--blog-index .bi-chip { background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.25); color: var(--color-white); backdrop-filter: blur(6px); }
.hero--blog-index .bi-chip:hover { background: var(--color-accent); border-color: var(--color-accent); color: var(--color-dark); }

.bi-meta { display: flex; flex-wrap: wrap; align-items: center; gap: var(--space-2); color: var(--color-gray); font-size: var(--font-size-sm); }
.bi-dot { opacity: 0.5; }
.bi-badge { display: inline-block; padding: 0.3rem 0.7rem; border-radius: var(--radius-sm); background: var(--color-primary); color: var(--color-white);
  font-family: var(--font-heading); font-size: var(--font-size-xs); font-weight: 700; letter-spacing: 1px; text-transform: uppercase; }
.bi-badge--float { position: absolute; top: var(--space-3); left: var(--space-3); background: var(--color-accent); color: var(--color-dark); box-shadow: var(--shadow-md); }

/* Featured */
.bi-featured { padding-bottom: 0; }
.bi-featured .section-header { margin-bottom: var(--space-6); }
.bi-featured__card { display: grid; grid-template-columns: 1.15fr 1fr; background: var(--color-white); border-radius: var(--radius-xl); overflow: hidden;
  box-shadow: var(--shadow-xl); border: 1px solid rgba(var(--color-primary-rgb), 0.08); }
.bi-featured__media { display: block; position: relative; min-height: 320px; clip-path: polygon(0 0, 100% 0, 94% 100%, 0 100%); }
.bi-featured__media img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow, 0.5s ease); }
.bi-featured__card:hover .bi-featured__media img { transform: scale(1.04); }
.bi-featured__body { padding: clamp(1.75rem, 4vw, 3.5rem); display: flex; flex-direction: column; justify-content: center; gap: var(--space-4); }
.bi-featured__body h2 { font-size: clamp(1.6rem, 2.6vw, 2.3rem); line-height: 1.2; margin: 0; }
.bi-featured__body h2 a { color: var(--color-primary); text-decoration: none; }
.bi-featured__body h2 a:hover { color: var(--color-accent); }
.bi-featured__body p { color: var(--color-gray-dark); line-height: 1.7; margin: 0; }
.bi-featured__body .btn-primary { align-self: flex-start; display: inline-flex; align-items: center; gap: var(--space-2); }

/* Grid */
.bi-posts__head { display: flex; justify-content: space-between; align-items: flex-end; gap: var(--space-6); flex-wrap: wrap; margin-bottom: var(--space-8); }
.bi-posts__head h2 { margin: var(--space-2) 0 0; font-size: clamp(1.6rem, 3vw, 2.4rem); }
.bi-filter { display: flex; flex-wrap: wrap; gap: var(--space-2); }
.bi-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: var(--space-6); }
.bi-card { display: flex; flex-direction: column; background: var(--color-white); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-card, var(--shadow-md));
  border: 1px solid rgba(var(--color-primary-rgb), 0.06); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.bi-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.bi-card[hidden] { display: none; }
.bi-card__media { position: relative; display: block; aspect-ratio: 4 / 3; overflow: hidden; }
.bi-card__media img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow, 0.5s ease); }
.bi-card:hover .bi-card__media img { transform: scale(1.05); }
.bi-card__body { padding: var(--space-6); display: flex; flex-direction: column; gap: var(--space-3); flex: 1; }
.bi-card__body h3 { font-size: var(--font-size-xl); line-height: 1.3; margin: 0; }
.bi-card__body h3 a { color: var(--color-primary); text-decoration: none; }
.bi-card__body h3 a:hover { color: var(--color-accent); }
.bi-card__body p { color: var(--color-gray-dark); line-height: 1.65; margin: 0; flex: 1; font-size: var(--font-size-base); }
.bi-card__cta { display: inline-flex; align-items: center; gap: var(--space-2); color: var(--color-primary); font-weight: 700; font-family: var(--font-heading); text-decoration: none; min-height: 44px; }
.bi-card__cta:hover { color: var(--color-accent); gap: var(--space-3); }
.bi-empty { text-align: center; color: var(--color-gray); margin-top: var(--space-8); }

/* Topics */
.bi-topics__lead { max-width: 60ch; margin: var(--space-3) auto 0; color: var(--color-gray-dark); }
.bi-topics__grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: var(--space-5); }
.bi-topic { display: flex; flex-direction: column; gap: var(--space-2); padding: var(--space-6); border-radius: var(--radius-lg); text-decoration: none;
  background: linear-gradient(160deg, rgba(var(--color-primary-rgb), 0.06), rgba(var(--color-accent-rgb), 0.06)); border-top: 3px solid var(--color-accent); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.bi-topic:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
.bi-topic__icon { width: 46px; height: 46px; border-radius: var(--radius-md); display: grid; place-items: center; background: var(--color-primary); color: var(--color-white); }
.bi-topic__title { font-family: var(--font-heading); font-weight: 700; font-size: var(--font-size-lg); color: var(--color-primary); }
.bi-topic__desc { color: var(--color-gray-dark); line-height: 1.6; font-size: var(--font-size-sm); flex: 1; }
.bi-topic__link { display: inline-flex; align-items: center; gap: var(--space-1); color: var(--color-accent); font-weight: 700; font-size: var(--font-size-sm); }

/* CTA */
.bi-cta { background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-dark) 100%); color: var(--color-white); }
.bi-cta__inner { display: flex; align-items: center; justify-content: space-between; gap: var(--space-8); flex-wrap: wrap; }
.bi-cta h2 { color: var(--color-white); margin: 0 0 var(--space-2); }
.bi-cta p { color: rgba(255,255,255,0.85); margin: 0; max-width: 56ch; }
.bi-cta__actions { display: flex; gap: var(--space-3); flex-wrap: wrap; }
.bi-cta__actions .btn-secondary { display: inline-flex; align-items: center; gap: var(--space-2); }

@media (max-width: 900px) {
  .bi-featured__card { grid-template-columns: 1fr; }
  .bi-featured__media { clip-path: none; min-height: 240px; }
}
@media (prefers-reduced-motion: reduce) {
  .bi-card, .bi-topic, .bi-card__media img, .bi-featured__media img { transition: none; }
}
</style>

<script>
/* Category filter — fail-open: without JS every card is visible. */
(function () {
  var chips = document.querySelectorAll('.bi-filter [data-filter]');
  var cards = document.querySelectorAll('.bi-card[data-category]');
  var empty = document.querySelector('.bi-empty');
  if (!chips.length || !cards.length) return;
  function apply(key) {
    var shown = 0;
    cards.forEach(function (c) { var on = key === 'all' || c.getAttribute('data-category') === key; c.hidden = !on; if (on) shown++; });
    chips.forEach(function (b) { var on = b.getAttribute('data-filter') === key; b.classList.toggle('is-active', on); b.setAttribute('aria-pressed', on ? 'true' : 'false'); });
    if (empty) empty.hidden = shown > 0;
  }
  chips.forEach(function (b) { b.addEventListener('click', function () { apply(b.getAttribute('data-filter')); }); });
  document.querySelectorAll('[data-filter-link]').forEach(function (a) {
    a.addEventListener('click', function () { apply(a.getAttribute('data-filter-link')); });
  });
})();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

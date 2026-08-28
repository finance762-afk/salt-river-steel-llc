<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$currentPage = 'blog';
$pageTitle = 'Blog | Steel Industry Insights & Project Guides | ' . $siteName;
$pageDescription = 'Expert insights on custom steel gates, fencing, and fabrication. Cost guides, material comparisons, and steel construction tips for Arizona property owners.';
$pageCanonical = $siteUrl . '/blog/';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
        { "@type": "ListItem", "position": 2, "name": "Blog", "item": "<?php echo $siteUrl; ?>/blog/" }
    ]
}
</script>

<section class="hero hero--blog">
    <div class="container">
        <h1 class="hero-title text-center">
            Steel Fabrication <span class="text-accent">Insights & Guides</span>
        </h1>
        <p class="hero-subtitle text-center">
            Expert advice on custom steel gates, fencing, and fabrication for Arizona property owners. Cost guides, material comparisons, and project tips from the Salt River Steel team.
        </p>
    </div>
</section>

<section class="section section--blog-grid">
    <div class="container">
        <div class="blog-grid">
            <?php foreach ($blogPosts as $post): ?>
            <article class="blog-card">
                <a href="/blog/<?php echo $post['slug']; ?>/" class="blog-card__image-link">
                    <div class="blog-card__image">
                        <img src="<?php echo $post['image']; ?>" alt="<?php echo htmlspecialchars($post['alt']); ?>" width="960" height="640" loading="lazy">
                    </div>
                </a>
                <div class="blog-card__content">
                    <div class="blog-card__meta">
                        <span class="blog-card__category"><?php echo htmlspecialchars($post['category']); ?></span>
                        <span class="blog-card__date"><?php echo $post['date']; ?></span>
                        <span class="blog-card__readtime"><?php echo $post['readtime']; ?></span>
                    </div>
                    <h2 class="blog-card__title">
                        <a href="/blog/<?php echo $post['slug']; ?>/"><?php echo htmlspecialchars($post['title']); ?></a>
                    </h2>
                    <p class="blog-card__excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                    <a href="/blog/<?php echo $post['slug']; ?>/" class="blog-card__cta">Read Article →</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section bg-alt">
    <div class="container content-narrow text-center">
        <h2 class="section-title">Ready to Start Your Steel Project?</h2>
        <p style="font-size: 1.125rem; margin-bottom: var(--space-xl); color: var(--color-text-light);">
            Get a free estimate for custom steel gates, fencing, or fabrication in Florence and surrounding areas.
        </p>
        <div class="cta-button-group">
            <a href="/contact/" class="btn-primary btn-large">Get Free Estimate</a>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn-secondary btn-large">Call <?php echo $phone; ?></a>
        </div>
    </div>
</section>

<style>
.hero--blog { background: linear-gradient(135deg, rgba(var(--color-primary-rgb), 0.05), rgba(var(--color-accent-rgb), 0.05)); padding: var(--space-4xl) 0; text-align: center; }
.hero--blog .hero-title { font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.hero--blog .hero-subtitle { font-size: 1.25rem; max-width: 700px; margin: 0 auto; color: var(--color-text-light); line-height: 1.6; }
.blog-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: var(--space-2xl); margin-top: var(--space-3xl); }
.blog-card { background: var(--color-bg); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow); transition: transform var(--transition), box-shadow var(--transition); display: flex; flex-direction: column; }
.blog-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.blog-card__image-link { display: block; }
.blog-card__image { position: relative; aspect-ratio: 3 / 2; overflow: hidden; }
.blog-card__image img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.blog-card:hover .blog-card__image img { transform: scale(1.05); }
.blog-card__content { padding: var(--space-xl); flex-grow: 1; display: flex; flex-direction: column; }
.blog-card__meta { display: flex; gap: var(--space-md); flex-wrap: wrap; margin-bottom: var(--space-md); font-size: 0.9rem; color: var(--color-text-light); }
.blog-card__category { display: inline-block; padding: var(--space-xs) var(--space-sm); background: linear-gradient(135deg, var(--color-accent), var(--color-secondary)); color: white; border-radius: var(--radius-sm); font-weight: 600; font-size: 0.85rem; }
.blog-card__title { font-size: 1.5rem; margin-bottom: var(--space-md); line-height: 1.3; }
.blog-card__title a { color: var(--color-primary); transition: color var(--transition); }
.blog-card__title a:hover { color: var(--color-accent); }
.blog-card__excerpt { color: var(--color-text-light); line-height: 1.6; margin-bottom: var(--space-lg); flex-grow: 1; }
.blog-card__cta { display: inline-flex; align-items: center; gap: var(--space-xs); color: var(--color-accent); font-weight: 600; transition: gap var(--transition); }
.blog-card__cta:hover { gap: var(--space-sm); }
.cta-button-group { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }
@media (max-width: 768px) { .blog-grid { grid-template-columns: 1fr; } }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

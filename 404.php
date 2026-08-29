<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   404.php — Salt River Steel LLC — Page Not Found
   ============================================================ */

http_response_code(404);

$currentPage      = '404';
$pageTitle        = 'Page Not Found | Salt River Steel';
$pageDescription  = 'The page you\'re looking for doesn\'t exist. Explore our steel fabrication services or contact us for a free estimate in Florence, AZ.';
$canonicalUrl     = $siteUrl . '/404/';
$pageCanonical    = $canonicalUrl;
$ogImage          = $siteUrl . '/assets/images/logo-mark.png';
$noindex          = true; // Don't index 404 page
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<style>
/* ============================================================
   404 PAGE STYLES
   ============================================================ */
.error-hero {
  position: relative; min-height: 70vh; display: flex; align-items: center;
  padding: calc(var(--nav-height) + var(--space-3xl)) 0 var(--space-3xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  overflow: hidden; text-align: center;
}
.error-hero::before {
  content: ""; position: absolute; inset: 0; opacity: 0.08;
  background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M40 0l40 40-40 40L0 40z' fill='%23fff'/%3E%3C/svg%3E");
}
.error-hero .container { position: relative; z-index: 1; max-width: 720px; }
.error-code {
  font-family: var(--font-heading); font-weight: 900; font-size: clamp(5rem, 15vw, 10rem);
  line-height: 1; color: rgba(255,255,255,0.25); margin-bottom: var(--space-md);
}
.error-hero h1 { color: #fff; font-size: clamp(2rem, 4.5vw, 3rem); margin-bottom: var(--space-lg); }
.error-hero p { color: rgba(255,255,255,0.9); font-size: var(--font-size-lg); line-height: 1.7; max-width: 54ch; margin: 0 auto var(--space-xl); }
.error-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }
.error-actions .btn { box-shadow: var(--shadow-lg); }

.error-links { background: var(--color-light); }
.error-links-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); margin-top: var(--space-2xl); }
@media (max-width: 800px) { .error-links-grid { grid-template-columns: 1fr; gap: var(--space-md); } }
.error-link-card {
  background: var(--color-white); border: 1px solid rgba(var(--color-primary-rgb), 0.12);
  border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg);
  text-align: center; transition: transform var(--transition), box-shadow var(--transition);
}
.error-link-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
.error-link-icon {
  width: 60px; height: 60px; border-radius: var(--radius-full);
  background: rgba(var(--color-accent-rgb), 0.1); color: var(--color-accent);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-md); box-shadow: var(--shadow-sm);
}
.error-link-icon svg { width: 28px; height: 28px; }
.error-link-card h3 { font-size: var(--font-size-lg); color: var(--color-dark); margin-bottom: var(--space-sm); }
.error-link-card p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; margin: 0 0 var(--space-md); }
.error-link-card .btn { font-size: var(--font-size-sm); }

@media (max-width: 480px) {
  .error-actions .btn { width: 100%; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Error Hero -->
<section class="error-hero" aria-label="Page not found">
    <div class="container">
        <div class="error-code">404</div>
        <h1>This Page Doesn't Exist</h1>
        <p>
            The page you're looking for might have been moved, deleted, or never existed.
            Let's get you back on track — check out our popular pages below, or call us
            at <?php echo $phone; ?> if you need help finding something specific.
        </p>
        <div class="error-actions">
            <a href="/" class="btn btn-accent btn-lg">
                <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <path d="M9 22V12h6v10"/>
                </svg>
                Go to Homepage
            </a>
            <a href="/contact/" class="btn btn-outline-white btn-lg">
                <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                </svg>
                Contact Us
            </a>
        </div>
    </div>
</section>

<!-- Popular Links -->
<section class="section error-links" aria-label="Popular pages">
    <div class="container">
        <div class="section-title">
            <h2>Looking for something else?</h2>
            <p class="hero-answer">Here are our most popular pages — or browse our full services list and contact us for a free estimate.</p>
        </div>
        <div class="error-links-grid">
            <article class="error-link-card">
                <div class="error-link-icon">
                    <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
                <h3>Our Services</h3>
                <p>Custom steel gates, fencing, commercial, residential, and industrial fabrication across Central Arizona.</p>
                <a href="/services/" class="btn btn-primary">Browse Services</a>
            </article>
            <article class="error-link-card">
                <div class="error-link-icon">
                    <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3>About Us</h3>
                <p>Meet our Florence-based team and learn how Salt River Steel serves Central Arizona contractors and property owners.</p>
                <a href="/about/" class="btn btn-primary">Learn More</a>
            </article>
            <article class="error-link-card">
                <div class="error-link-icon">
                    <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                        <path d="M12 17h.01"/>
                    </svg>
                </div>
                <h3>FAQ</h3>
                <p>Common questions about turnaround, pricing, delivery, and the steel grades we stock in Florence.</p>
                <a href="/faq/" class="btn btn-primary">Read FAQ</a>
            </article>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

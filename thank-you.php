<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   thank-you.php — Salt River Steel LLC — Thank You
   ============================================================ */

$currentPage      = 'thank-you';
$pageTitle        = 'Thank You | Salt River Steel';
$pageDescription  = 'Thank you for contacting Salt River Steel. We\'ll respond to your steel fabrication inquiry within 1 business day.';
$canonicalUrl     = $siteUrl . '/thank-you/';
$pageCanonical    = $canonicalUrl;
$ogImage          = $siteUrl . '/assets/images/logo.png';
$noindex          = true; // Don't index thank-you page
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<style>
/* ============================================================
   THANK-YOU PAGE STYLES
   ============================================================ */
.thankyou-hero {
  position: relative; min-height: 72vh; display: flex; align-items: center;
  padding: calc(var(--nav-height) + var(--space-3xl)) 0 var(--space-3xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  overflow: hidden; text-align: center;
}
.thankyou-hero::after {
  content: ""; position: absolute; top: -40px; right: -40px; width: 420px; height: 420px;
  border-radius: 50%; background: rgba(var(--color-accent-rgb),0.15); pointer-events: none;
}
.thankyou-hero .container { position: relative; z-index: 1; max-width: 680px; }
.thankyou-icon {
  width: 100px; height: 100px; border-radius: var(--radius-full);
  background: rgba(255,255,255,0.16); color: #fff;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-xl); box-shadow: var(--shadow-lg);
  animation: thankyou-pulse 2s ease-in-out infinite;
}
.thankyou-icon svg { width: 56px; height: 56px; }
@keyframes thankyou-pulse {
  0%, 100% { transform: scale(1); box-shadow: 0 8px 24px rgba(0,0,0,0.18); }
  50%      { transform: scale(1.06); box-shadow: 0 12px 32px rgba(0,0,0,0.24); }
}
.thankyou-hero h1 { color: #fff; font-size: clamp(2.2rem, 5vw, 3.4rem); margin-bottom: var(--space-lg); }
.thankyou-hero p { color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); line-height: 1.7; max-width: 56ch; margin: 0 auto var(--space-xl); }
.thankyou-next {
  background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.25);
  border-radius: var(--radius-lg); padding: var(--space-xl); margin: 0 auto var(--space-2xl); max-width: 540px;
}
.thankyou-next h2 { color: #fff; font-size: var(--font-size-xl); margin-bottom: var(--space-md); }
.thankyou-next ul {
  list-style: none; padding: 0; margin: 0 0 var(--space-lg); text-align: left;
  display: inline-block;
}
.thankyou-next li {
  display: flex; align-items: flex-start; gap: var(--space-sm);
  color: rgba(255,255,255,0.9); font-size: var(--font-size-sm); line-height: 1.65;
  padding: var(--space-sm) 0;
}
.thankyou-next li svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.thankyou-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }
.thankyou-actions .btn { box-shadow: var(--shadow-lg); }

.thankyou-cta { background: var(--color-white); }
.thankyou-cta-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); margin-top: var(--space-2xl); }
@media (max-width: 800px) { .thankyou-cta-grid { grid-template-columns: 1fr; gap: var(--space-md); } }
.thankyou-card {
  background: rgba(var(--color-primary-rgb), 0.04); border: 1px solid rgba(var(--color-primary-rgb), 0.12);
  border-radius: var(--radius-lg); padding: var(--space-xl) var(--space-lg);
  text-align: center; transition: transform var(--transition), box-shadow var(--transition);
}
.thankyou-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
.thankyou-card-icon {
  width: 64px; height: 64px; border-radius: var(--radius-full);
  background: rgba(var(--color-accent-rgb), 0.1); color: var(--color-accent);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-md); box-shadow: var(--shadow-sm);
}
.thankyou-card-icon svg { width: 30px; height: 30px; }
.thankyou-card h3 { font-size: var(--font-size-lg); color: var(--color-dark); margin-bottom: var(--space-sm); }
.thankyou-card p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; margin: 0 0 var(--space-md); }
.thankyou-card .btn { font-size: var(--font-size-sm); }

@media (max-width: 480px) {
  .thankyou-actions .btn { width: 100%; }
}
@media (prefers-reduced-motion: reduce) {
  .thankyou-icon { animation: none; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Thank You Hero -->
<section class="thankyou-hero" aria-label="Thank you confirmation">
    <div class="container">
        <div class="thankyou-icon">
            <svg aria-hidden="true" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <path d="m9 11 3 3L22 4"/>
            </svg>
        </div>
        <h1>Thanks for Reaching Out!</h1>
        <p>
            We received your request for a steel fabrication estimate. A member of our Florence team
            will review your project details and get back to you within <strong>1 business day</strong>
            with a realistic quote and timeline.
        </p>
        <div class="thankyou-next">
            <h2>What Happens Next?</h2>
            <ul>
                <li>
                    <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m5 12 5 5L20 7"/>
                    </svg>
                    We'll review your project details and confirm dimensions
                </li>
                <li>
                    <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m5 12 5 5L20 7"/>
                    </svg>
                    You'll receive an itemized quote with realistic turnaround
                </li>
                <li>
                    <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m5 12 5 5L20 7"/>
                    </svg>
                    If you approve, most custom orders ship within 3–5 business days
                </li>
            </ul>
        </div>
        <div class="thankyou-actions">
            <a href="/" class="btn btn-accent btn-lg">
                <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <path d="M9 22V12h6v10"/>
                </svg>
                Back to Homepage
            </a>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white btn-lg">
                <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                </svg>
                Call Us Now
            </a>
        </div>
    </div>
</section>

<!-- While You Wait -->
<section class="section thankyou-cta" aria-label="While you wait">
    <div class="container">
        <div class="section-title">
            <h2>While You Wait...</h2>
            <p class="hero-answer">
                Explore our services, learn about our Florence-based team, or read straight answers to
                common steel fabrication questions across Central Arizona.
            </p>
        </div>
        <div class="thankyou-cta-grid">
            <article class="thankyou-card">
                <div class="thankyou-card-icon">
                    <svg aria-hidden="true" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
                <h3>Our Services</h3>
                <p>Browse our custom steel gates, fencing, and commercial, residential, and industrial fabrication services.</p>
                <a href="/services/" class="btn btn-primary">View All Services</a>
            </article>
            <article class="thankyou-card">
                <div class="thankyou-card-icon">
                    <svg aria-hidden="true" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3>About Us</h3>
                <p>Meet the Salt River Steel team and learn about our local Florence shop and direct-answers approach.</p>
                <a href="/about/" class="btn btn-primary">Learn More</a>
            </article>
            <article class="thankyou-card">
                <div class="thankyou-card-icon">
                    <svg aria-hidden="true" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                        <path d="M12 17h.01"/>
                    </svg>
                </div>
                <h3>FAQ</h3>
                <p>Find straight answers to common questions about turnaround, pricing, delivery, and steel grades.</p>
                <a href="/faq/" class="btn btn-primary">Read FAQ</a>
            </article>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

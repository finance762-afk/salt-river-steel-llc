<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   contact/index.php — Salt River Steel LLC — Contact Us
   ============================================================ */

$currentPage      = 'contact';
$pageTitle        = 'Contact Us | Salt River Steel | Florence, AZ';
$pageDescription  = 'Contact Salt River Steel LLC in Florence, AZ for a free steel fabrication estimate. Call ' . $phone . ' or fill out our contact form for custom gates, fencing & structural steel.';
$canonicalUrl     = $siteUrl . '/contact/';
$pageCanonical    = $canonicalUrl;
$ogImage          = $siteUrl . '/assets/images/logo.png';

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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => $canonicalUrl],
            ]
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>

<style>
/* ============================================================
   CONTACT PAGE STYLES
   ============================================================ */
:root {
  --contact-card-bg: rgba(var(--color-primary-rgb), 0.04);
  --contact-border: rgba(var(--color-primary-rgb), 0.12);
}

.contact-hero {
  position: relative; min-height: 48vh; display: flex; align-items: center;
  padding: calc(var(--nav-height) + var(--space-3xl)) 0 var(--space-2xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  overflow: hidden;
}
.contact-hero .container { position: relative; z-index: 1; max-width: 740px; text-align: center; }
.contact-hero h1 { color: #fff; font-size: clamp(2.2rem, 5vw, 3.2rem); margin: var(--space-md) 0 var(--space-md); }
.contact-hero .hero-lead { color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); line-height: 1.7; max-width: 60ch; margin: 0 auto var(--space-xl); }
.contact-quick-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }
.contact-quick-actions .btn { box-shadow: var(--shadow-lg); }

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

.contact-main { background: var(--color-light); }
.contact-grid { display: grid; grid-template-columns: 1.2fr 1fr; gap: var(--space-3xl); align-items: start; }
@media (max-width: 900px) { .contact-grid { grid-template-columns: 1fr; gap: var(--space-xl); } }

.contact-form-card {
  background: var(--color-white); border: 1px solid var(--contact-border);
  border-radius: var(--radius-xl); padding: var(--space-2xl); box-shadow: var(--shadow-md);
}
.contact-form-card h2 { font-size: clamp(1.6rem, 3vw, 2rem); margin-bottom: var(--space-sm); color: var(--color-dark); }
.contact-form-tagline { color: var(--color-gray); font-size: var(--font-size-sm); margin-bottom: var(--space-xl); display: block; }

.form-field {
  position: relative; margin-bottom: var(--space-lg);
}
.form-field input,
.form-field select,
.form-field textarea {
  width: 100%; min-height: 54px; padding: var(--space-md) var(--space-md);
  border: 1.5px solid var(--color-border); border-radius: var(--radius-md);
  font: inherit; font-size: var(--font-size-base); background: var(--color-white);
  transition: border-color var(--transition), box-shadow var(--transition);
}
.form-field textarea { min-height: 120px; resize: vertical; padding-top: var(--space-md); }
.form-field input:focus,
.form-field select:focus,
.form-field textarea:focus {
  outline: none; border-color: var(--color-primary);
  box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.12);
}
.form-field label {
  position: absolute; left: var(--space-md); top: 50%; transform: translateY(-50%);
  background: var(--color-white); padding: 0 var(--space-xs); color: var(--color-gray);
  font-size: var(--font-size-sm); pointer-events: none;
  transition: top var(--transition), font-size var(--transition), color var(--transition);
}
.form-field textarea + label { top: 28px; }
.form-field input:focus + label,
.form-field select:focus + label,
.form-field textarea:focus + label,
.form-field input:not(:placeholder-shown) + label,
.form-field select:not(:placeholder-shown) + label,
.form-field textarea:not(:placeholder-shown) + label {
  top: 0; font-size: 0.75rem; color: var(--color-primary);
}

/* TCPA v2.1 consent fieldset (Premium/full-page form pattern) */
.p1-consent-set {
  border: 1px solid var(--contact-border); border-radius: var(--radius-md);
  padding: var(--space-lg); margin: var(--space-xl) 0; background: rgba(0,0,0,0.015);
}
.p1-consent-legend {
  font-family: var(--font-heading); font-weight: 700; font-size: var(--font-size-base);
  color: var(--color-dark); padding: 0 var(--space-xs);
}
.p1-consent-item {
  display: flex; align-items: flex-start; gap: var(--space-sm);
  margin-bottom: var(--space-md); cursor: pointer; font-size: 0.88rem; line-height: 1.55;
}
.p1-consent-item:last-child { margin-bottom: 0; }
.p1-consent-item input[type="checkbox"] {
  width: 18px; height: 18px; margin-top: 2px; flex-shrink: 0; accent-color: var(--color-primary); cursor: pointer;
}
.p1-consent-item span { color: var(--color-gray-dark); }
.p1-consent-item span strong { color: var(--color-dark); }
.p1-consent-item span a { color: var(--color-primary); text-decoration: underline; }

.btn-submit { width: 100%; margin-top: var(--space-md); }
.form-footnote { font-size: var(--font-size-xs); color: var(--color-gray); text-align: center; margin: var(--space-md) 0 0; line-height: 1.5; }
.form-footnote a { color: var(--color-primary); text-decoration: underline; }

.contact-info-sidebar { display: flex; flex-direction: column; gap: var(--space-lg); }
.info-card {
  background: var(--color-white); border: 1px solid var(--contact-border);
  border-radius: var(--radius-lg); padding: var(--space-xl); box-shadow: var(--shadow-sm);
}
.info-card h3 {
  font-size: var(--font-size-lg); color: var(--color-dark); margin-bottom: var(--space-md);
  display: flex; align-items: center; gap: var(--space-sm);
}
.info-card h3 svg { color: var(--color-accent); }
.info-card ul { list-style: none; padding: 0; margin: 0; }
.info-card li {
  display: flex; align-items: flex-start; gap: var(--space-sm);
  color: var(--color-gray-dark); line-height: 1.65; font-size: var(--font-size-sm);
  padding: var(--space-sm) 0; border-bottom: 1px solid rgba(0,0,0,0.06);
}
.info-card li:last-child { border-bottom: none; }
.info-card li svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.info-card a { color: var(--color-primary); font-weight: 600; transition: color var(--transition); }
.info-card a:hover { color: var(--color-accent); }

.map-section { background: var(--color-white); }
.map-embed {
  width: 100%; height: 480px; border: none; border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md); overflow: hidden;
}
.map-embed iframe { width: 100%; height: 100%; border: none; }
.map-cta { text-align: center; margin-top: var(--space-xl); }
.map-cta .btn { box-shadow: var(--shadow-sm); }

@media (max-width: 480px) {
  .contact-quick-actions .btn { width: 100%; }
  .contact-form-card { padding: var(--space-xl) var(--space-lg); }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Hero -->
<section class="contact-hero" aria-label="Contact Salt River Steel">
    <div class="container">
        <span class="eyebrow-label" style="color: rgba(255,255,255,0.85);">Get In Touch</span>
        <h1>Let's Talk Steel Fabrication in <span class="text-accent">Florence</span></h1>
        <p class="hero-lead">
            Call us for a free estimate on custom gates, fencing, or structural steel — or fill out the
            form below and we'll respond within 1 business day with a realistic quote and timeline.
        </p>
        <div class="contact-quick-actions">
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-accent btn-lg">
                <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                </svg>
                Call <?php echo $phone; ?>
            </a>
            <a href="mailto:<?php echo $email; ?>" class="btn btn-outline-white btn-lg">
                <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                    <rect x="2" y="4" width="20" height="16" rx="2" />
                </svg>
                Email Us
            </a>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">Contact</li>
        </ol>
    </div>
</nav>

<!-- Contact Main -->
<section class="section contact-main" aria-label="Contact form and information">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-card">
                <h2>Request Your Free Estimate</h2>
                <span class="contact-form-tagline">No obligation. Same-week response from a local fabricator.</span>
                <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST">
                    <!-- Formsubmit hidden fields -->
                    <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you/">
                    <input type="hidden" name="_captcha" value="false">
                    <input type="hidden" name="_template" value="table">
                    <input type="hidden" name="_subject" value="Salt River Steel — New Contact Form Inquiry">
                    <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">
                    <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">
                    <input type="hidden" name="form_location" value="contact_page">
                    <input type="hidden" name="consent_version" value="v2.1">
                    <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'] ?? '/contact/'); ?>">

                    <div class="form-field">
                        <input type="text" id="contact-name" name="name" placeholder=" " required>
                        <label for="contact-name">Full Name *</label>
                    </div>

                    <div class="form-field">
                        <input type="tel" id="contact-phone" name="phone" placeholder=" " required>
                        <label for="contact-phone">Phone Number *</label>
                    </div>

                    <div class="form-field">
                        <input type="email" id="contact-email" name="email" placeholder=" " required>
                        <label for="contact-email">Email Address *</label>
                    </div>

                    <div class="form-field">
                        <select id="contact-service" name="service_requested" required>
                            <option value="">Select a service...</option>
                            <?php foreach ($services as $svc): ?>
                            <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                            <?php endforeach; ?>
                            <option value="Other / Custom Fabrication">Other / Custom Fabrication</option>
                        </select>
                        <label for="contact-service">Service Needed *</label>
                    </div>

                    <div class="form-field">
                        <textarea id="contact-message" name="message" placeholder=" " rows="5"></textarea>
                        <label for="contact-message">Project Details (optional)</label>
                    </div>

                    <!-- TCPA v2.1 Consent Fieldset (full contact-page pattern) -->
                    <fieldset class="p1-consent-set">
                        <legend class="p1-consent-legend">Communication Consent</legend>

                        <label class="p1-consent-item">
                            <input type="checkbox" name="email_opt_in" value="yes">
                            <span><strong>Email updates (optional):</strong> Receive periodic updates from <?php echo htmlspecialchars($siteName); ?>. You can unsubscribe any time.</span>
                        </label>

                        <label class="p1-consent-item">
                            <input type="checkbox" name="sms_opt_in" value="yes">
                            <span><strong>SMS/Text messages (optional):</strong> Receive text messages from <?php echo htmlspecialchars($siteName); ?> about your project. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help. <strong>Consent is not a condition of purchase.</strong></span>
                        </label>

                        <label class="p1-consent-item">
                            <input type="checkbox" name="terms_accepted" value="yes" required>
                            <span>I have read and agree to the <a href="/terms/">Terms of Service</a> and <a href="/privacy-policy/">Privacy Policy</a>. *</span>
                        </label>
                    </fieldset>

                    <button type="submit" class="btn btn-primary btn-submit">Send My Request</button>
                    <p class="form-footnote">By submitting, you agree to our <a href="/terms/">Terms</a> and <a href="/privacy-policy/">Privacy Policy</a>.</p>
                </form>
            </div>

            <!-- Contact Info Sidebar -->
            <aside class="contact-info-sidebar">
                <div class="info-card">
                    <h3>
                        <svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                        </svg>
                        Contact Information
                    </h3>
                    <ul>
                        <li>
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                            </svg>
                            <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a>
                        </li>
                        <li>
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                            </svg>
                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                        </li>
                        <li>
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <address style="font-style: normal;">
                                <?php echo htmlspecialchars($address['street']); ?><br>
                                <?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?>
                            </address>
                        </li>
                    </ul>
                </div>

                <div class="info-card">
                    <h3>
                        <svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 6v6l4 2"/>
                        </svg>
                        Why Work With Us?
                    </h3>
                    <ul>
                        <li>
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m5 12 5 5L20 7"/>
                            </svg>
                            Same-week response on estimates
                        </li>
                        <li>
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m5 12 5 5L20 7"/>
                            </svg>
                            3–5 day custom order turnaround
                        </li>
                        <li>
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m5 12 5 5L20 7"/>
                            </svg>
                            Florence-based fabrication shop
                        </li>
                        <li>
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m5 12 5 5L20 7"/>
                            </svg>
                            Licensed &amp; insured in Arizona
                        </li>
                        <li>
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m5 12 5 5L20 7"/>
                            </svg>
                            <?php echo $yearsInBusiness; ?>+ years serving Central AZ
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section map-section" aria-label="Our location">
    <div class="container">
        <div class="section-title">
            <span class="eyebrow-label">Find Us</span>
            <h2>Visit Our <span class="text-accent">Florence</span> Shop</h2>
            <p class="hero-answer">
                Salt River Steel is based at <?php echo htmlspecialchars($address['street']); ?> in Florence, AZ.
                Contractors and property owners are welcome to stop by — call ahead to confirm we're on-site.
            </p>
        </div>
        <div class="map-embed">
            <?php echo $gbpMapEmbed; ?>
        </div>
        <div class="map-cta">
            <a href="<?php echo htmlspecialchars($directionsUrl); ?>" class="btn btn-primary btn-lg" target="_blank" rel="noopener">
                <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                    <circle cx="12" cy="10" r="3" />
                </svg>
                Get Directions
            </a>
        </div>
    </div>
</section>

<!-- Schema markup -->
<?php echo $schemaMarkup; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

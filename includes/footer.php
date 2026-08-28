<?php
/**
 * ============================================================
 * includes/footer.php — Salt River Steel LLC
 * Site footer, entity block, legal links, mobile CTA, scripts
 * ============================================================
 */

// Require config.php and functions.php if not already loaded
if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
if (!function_exists('icon')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
}
?>

</main>
<!-- End Main Content -->

<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Column 1: Company Info -->
            <div class="footer-col">
                <a href="/" class="footer-logo">
                    <img src="/assets/images/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" width="120" height="120">
                </a>
                <p><?php echo htmlspecialchars($tagline); ?></p>

                <!-- Trust Badges -->
                <div class="footer-trust">
                    <span class="trust-badge">
                        <?php echo icon('award', 16); ?>
                        Licensed & Insured
                    </span>
                    <span class="trust-badge">
                        <?php echo icon('calendar', 16); ?>
                        <?php echo $yearsInBusiness; ?>+ Years
                    </span>
                    <span class="trust-badge">
                        <?php echo icon('file-check', 16); ?>
                        Free Estimates
                    </span>
                </div>

                <!-- AEO Entity Block -->
                <div class="aeo-entity" itemscope itemtype="https://schema.org/LocalBusiness">
                    <h4><?php echo htmlspecialchars($siteName); ?></h4>
                    <meta itemprop="name" content="<?php echo htmlspecialchars($siteName); ?>">
                    <meta itemprop="url" content="<?php echo $siteUrl; ?>">
                    <meta itemprop="telephone" content="<?php echo htmlspecialchars($phone); ?>">
                    <p>
                        <?php echo htmlspecialchars($siteName); ?> is a licensed steel construction company based in
                        <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?>,
                        serving the Florence area with custom steel gates, fencing, and commercial and residential fabrication
                        since <?php echo $yearEstablished; ?>.
                    </p>
                </div>
            </div>

            <!-- Column 2: Services -->
            <div class="footer-col">
                <h4>Our Services</h4>
                <ul>
                    <?php
                    $firstHalf = array_slice($services, 0, ceil(count($services) / 2));
                    foreach ($firstHalf as $service):
                    ?>
                    <li>
                        <a href="/services/<?php echo $service['slug']; ?>/">
                            <?php echo htmlspecialchars($service['name']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Column 3: More Services / Service Areas -->
            <div class="footer-col">
                <h4>
                    <?php if ($tier === 'premium' && !empty($serviceAreas)): ?>
                    Service Areas
                    <?php else: ?>
                    More Services
                    <?php endif; ?>
                </h4>
                <ul>
                    <?php if ($tier === 'premium' && !empty($serviceAreas)): ?>
                        <?php foreach ($serviceAreas as $area): ?>
                        <li>
                            <a href="/service-areas/<?php echo getAreaSlug($area); ?>/">
                                <?php echo htmlspecialchars($area); ?>, <?php echo htmlspecialchars($address['state']); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                        <li>
                            <a href="/service-areas/">View All Areas &rarr;</a>
                        </li>
                    <?php else: ?>
                        <?php
                        $secondHalf = array_slice($services, ceil(count($services) / 2));
                        foreach ($secondHalf as $service):
                        ?>
                        <li>
                            <a href="/services/<?php echo $service['slug']; ?>/">
                                <?php echo htmlspecialchars($service['name']); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($tier === 'premium'): ?>
                    <li><a href="/blog/">Blog</a></li>
                    <?php endif; ?>
                    <li><a href="/faq/">FAQ</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact -->
            <div class="footer-col">
                <h4>Contact Us</h4>
                <div class="contact-item">
                    <?php echo icon('phone', 18); ?>
                    <a href="tel:<?php echo formatPhone($phone); ?>"><?php echo htmlspecialchars($phone); ?></a>
                </div>

                <div class="contact-item">
                    <?php echo icon('mail', 18); ?>
                    <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
                </div>

                <div class="contact-item">
                    <?php echo icon('map-pin', 18); ?>
                    <span>
                        <?php if ($addressPublic): ?>
                        <?php echo htmlspecialchars($address['street']); ?><br>
                        <?php endif; ?>
                        <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?>
                    </span>
                </div>

                <?php if (!empty($businessHours)): ?>
                <div class="contact-item">
                    <?php echo icon('clock', 18); ?>
                    <div>
                        <strong>Hours:</strong><br>
                        <?php foreach ($businessHours as $day => $hours): ?>
                        <?php echo $day; ?>: <?php echo $hours; ?><br>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <a href="/contact/" class="btn btn-accent" style="margin-top: var(--space-4);">
                    Get Free Estimate
                </a>
            </div>
        </div>

        <!-- Footer Legal Row (REQUIRED v6.1) -->
        <div class="footer-legal-row">
            <a href="/privacy-policy/">Privacy Policy</a>
            <span class="divider">|</span>
            <a href="/terms/">Terms of Service</a>
            <span class="divider">|</span>
            <a href="/cookie-policy/">Cookie Policy</a>
            <span class="divider">|</span>
            <a href="/accessibility/">Accessibility</a>
            <span class="divider">|</span>
            <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
            <span class="divider">|</span>
            <a href="/sitemap.xml">Sitemap</a>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All Rights Reserved.</p>
            <p class="footer-credit">
                <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">
                    Web Design & Hosting by Page One Insights, LLC
                </a>
            </p>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button class="back-to-top" aria-label="Back to top">
    <?php echo icon('chevron-up', 20); ?>
</button>

<!-- Mobile Sticky CTA Bar -->
<div class="mobile-cta-bar">
    <a href="tel:<?php echo formatPhone($phone); ?>" class="btn btn-accent">
        <?php echo icon('phone', 18); ?>
        Call Now
    </a>
    <a href="/contact/" class="btn btn-primary" style="margin-left: var(--space-2);">
        Free Estimate
    </a>
</div>

<!-- Scripts (defer — NO CDN scripts per v6.2) -->
<script src="/assets/js/main.js" defer></script>

<!-- Back to Top Scroll Handler -->
<script>
    // Back to top button visibility
    const backToTop = document.querySelector('.back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Header scroll state
    const header = document.querySelector('[data-header]');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // Mobile menu toggle
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.mobile-menu');
    const navLinks = document.querySelector('.nav-links');

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            navLinks.classList.toggle('active');
            const isExpanded = hamburger.getAttribute('aria-expanded') === 'true';
            hamburger.setAttribute('aria-expanded', !isExpanded);
            document.body.style.overflow = hamburger.classList.contains('active') ? 'hidden' : '';
        });

        // Close mobile menu when clicking a link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                mobileMenu.classList.remove('active');
                navLinks.classList.remove('active');
                hamburger.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            });
        });
    }
</script>

</body>
</html>

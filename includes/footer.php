<?php
/**
 * ============================================================
 * includes/footer.php — Salt River Steel LLC
 * Site footer with links, entity block, legal row, scripts
 * ============================================================
 */
?>
    </main>
    
    <!-- Site Footer -->
    <footer class="site-footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid">
                    <!-- Column 1: About -->
                    <div class="footer-col">
                        <img src="/assets/images/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" class="footer-logo" width="80" height="80">
                        <p class="footer-tagline"><?php echo htmlspecialchars($tagline); ?></p>
                        <p class="footer-desc">
                            Professional steel fabrication and custom metalwork serving Florence, AZ and surrounding areas. 
                            <?php echo $yearsInBusiness; ?>+ years of quality craftsmanship.
                        </p>
                        <div class="footer-trust-badges">
                            <div class="trust-badge">
                                <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                                </svg>
                                Licensed
                            </div>
                            <div class="trust-badge">
                                <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="5"/>
                                    <path d="M20 21a8 8 0 0 0-16 0"/>
                                </svg>
                                <?php echo $yearsInBusiness; ?>+ Years
                            </div>
                            <div class="trust-badge">
                                <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                Florence, AZ
                            </div>
                        </div>
                    </div>
                    
                    <!-- Column 2: Services -->
                    <div class="footer-col">
                        <h3 class="footer-col-title">Our Services</h3>
                        <ul class="footer-links">
                            <?php 
                            $halfCount = ceil(count($services) / 2);
                            $firstHalf = array_slice($services, 0, $halfCount);
                            foreach ($firstHalf as $service): 
                            ?>
                            <li>
                                <a href="/services/<?php echo $service['slug']; ?>/">
                                    <?php echo htmlspecialchars($service['name']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <li><a href="/services/">View All Services →</a></li>
                        </ul>
                    </div>
                    
                    <!-- Column 3: More Services -->
                    <div class="footer-col">
                        <h3 class="footer-col-title">More Services</h3>
                        <ul class="footer-links">
                            <?php 
                            $secondHalf = array_slice($services, $halfCount);
                            foreach ($secondHalf as $service): 
                            ?>
                            <li>
                                <a href="/services/<?php echo $service['slug']; ?>/">
                                    <?php echo htmlspecialchars($service['name']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <li><a href="/about/">About Us</a></li>
                            <li><a href="/contact/">Contact</a></li>
                            <li><a href="/faq/">FAQ</a></li>
                            <li><a href="/blog/">Blog</a></li>
                        </ul>
                    </div>
                    
                    <!-- Column 4: Contact Info -->
                    <div class="footer-col">
                        <h3 class="footer-col-title">Contact Us</h3>
                        <ul class="footer-contact">
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
                                <address>
                                    <?php echo htmlspecialchars($address['street']); ?><br>
                                    <?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?>
                                </address>
                            </li>
                            <?php if (!empty($businessHours)): ?>
                            <li>
                                <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 6v6l4 2" />
                                </svg>
                                <div>
                                    <?php foreach ($businessHours as $day => $hours): ?>
                                    <div><?php echo $day; ?>: <?php echo $hours; ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <a href="/contact/" class="btn-primary">Get Free Estimate</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- AEO Entity Block -->
        <div class="footer-entity" itemscope itemtype="https://schema.org/LocalBusiness">
            <meta itemprop="name" content="<?php echo htmlspecialchars($siteName); ?>">
            <meta itemprop="url" content="<?php echo $siteUrl; ?>">
            <meta itemprop="telephone" content="<?php echo $phone; ?>">
            <p>
                <strong><?php echo htmlspecialchars($siteName); ?></strong> is a licensed steel construction company 
                based in <?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?>, 
                serving residential, commercial, and industrial clients throughout the Florence area with custom 
                steel gates, fencing, and fabrication services. Established in <?php echo $yearEstablished; ?>, 
                we deliver professional metalwork and structural steel solutions.
            </p>
        </div>
        
        <!-- Legal Footer Row (MANDATORY v6.1) -->
        <div class="footer-legal-row">
            <a href="/privacy-policy/">Privacy Policy</a>
            <span class="footer-legal-divider">|</span>
            <a href="/terms/">Terms of Service</a>
            <span class="footer-legal-divider">|</span>
            <a href="/cookie-policy/">Cookie Policy</a>
            <span class="footer-legal-divider">|</span>
            <a href="/accessibility/">Accessibility</a>
            <span class="footer-legal-divider">|</span>
            <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
            <span class="footer-legal-divider">|</span>
            <a href="/sitemap.xml">Sitemap</a>
        </div>
        
        <!-- Footer Bottom Bar -->
        <div class="footer-bottom-bar">
            <div class="container">
                <p class="footer-copyright">
                    &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All rights reserved.
                </p>
                <p class="footer-credit">
                    <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design & Hosting by Page One Insights, LLC</a>
                </p>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button class="back-to-top" aria-label="Back to top" id="backToTop">
        <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m18 15-6-6-6 6" />
        </svg>
    </button>
    
    <!-- Mobile Floating CTA Bar -->
    <div class="mobile-cta-bar">
        <a href="tel:<?php echo $phoneDigits; ?>" class="mobile-cta-btn mobile-cta-call">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
            </svg>
            Call Now
        </a>
        <a href="/contact/" class="mobile-cta-btn mobile-cta-estimate">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                <rect x="2" y="4" width="20" height="16" rx="2" />
            </svg>
            Free Estimate
        </a>
    </div>
    
    <!-- Scripts (v6.2 — NO CDN scripts, local JS only) -->
    <script src="/assets/js/main.js" defer></script>
    <script src="/assets/js/animations.js" defer></script>
    <script src="/assets/js/effects.js" defer></script>
    
    <!-- Back to top inline script -->
    <script>
        // Back to top button
        const backToTop = document.getElementById('backToTop');
        if (backToTop) {
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTop.classList.add('visible');
                } else {
                    backToTop.classList.remove('visible');
                }
            });
            
            backToTop.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    </script>
</body>
</html>

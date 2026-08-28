<?php
/**
 * ============================================================
 * includes/header.php — Salt River Steel LLC
 * Site header with navigation, logo, mobile menu
 * ============================================================
 */
?>
<body>
    <!-- Skip to main content (accessibility) -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- Site Header -->
    <header class="site-header" data-header>
        <nav class="navbar" role="navigation" aria-label="Main navigation">
            <div class="navbar-inner container">
                <!-- Logo -->
                <a href="/" class="site-logo" aria-label="<?php echo htmlspecialchars($siteName); ?> Home">
                    <img 
                        src="/assets/images/logo.png" 
                        alt="<?php echo htmlspecialchars($siteName); ?> Logo" 
                        width="96" 
                        height="96"
                        class="logo-img"
                    >
                </a>
                
                <!-- Desktop Navigation -->
                <ul class="navbar-links" role="menubar">
                    <li role="none">
                        <a href="/" role="menuitem" <?php echo isActivePage('home'); ?>>Home</a>
                    </li>
                    
                    <!-- Services Dropdown -->
                    <li class="has-dropdown" role="none">
                        <a href="/services/" role="menuitem" <?php echo isActivePage('services'); ?>>
                            Services
                            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </a>
                        <ul class="dropdown" role="menu" style="display:none">
                            <?php foreach ($services as $service): ?>
                            <li role="none">
                                <a href="/services/<?php echo $service['slug']; ?>/" role="menuitem">
                                    <?php echo htmlspecialchars($service['name']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li role="none">
                        <a href="/service-areas/" role="menuitem" <?php echo isActivePage('service-areas'); ?>>Service Areas</a>
                    </li>

                    <li role="none">
                        <a href="/about/" role="menuitem" <?php echo isActivePage('about'); ?>>About</a>
                    </li>
                    
                    <li role="none">
                        <a href="/contact/" role="menuitem" <?php echo isActivePage('contact'); ?>>Contact</a>
                    </li>
                </ul>
                
                <!-- Desktop CTA -->
                <div class="navbar-cta">
                    <a href="tel:<?php echo $phoneDigits; ?>" class="navbar-phone">
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                        </svg>
                        <?php echo $phone; ?>
                    </a>
                    <a href="/contact/" class="btn-primary">Free Estimate</a>
                </div>
                
                <!-- Mobile Hamburger -->
                <button class="hamburger" aria-label="Toggle menu" aria-expanded="false">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>
        </nav>
        
        <!-- Mobile Menu Overlay -->
        <div class="mobile-menu" aria-hidden="true">
            <div class="mobile-menu-inner">
                <ul class="mobile-menu-links">
                    <li><a href="/" <?php echo isActivePage('home'); ?>>Home</a></li>
                    
                    <!-- Services in mobile -->
                    <li class="mobile-has-sub">
                        <span class="mobile-menu-label">Services</span>
                        <ul class="mobile-submenu">
                            <li><a href="/services/">All Services</a></li>
                            <?php foreach ($services as $service): ?>
                            <li>
                                <a href="/services/<?php echo $service['slug']; ?>/">
                                    <?php echo htmlspecialchars($service['name']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li><a href="/service-areas/" <?php echo isActivePage('service-areas'); ?>>Service Areas</a></li>
                    <li><a href="/about/" <?php echo isActivePage('about'); ?>>About</a></li>
                    <li><a href="/contact/" <?php echo isActivePage('contact'); ?>>Contact</a></li>
                </ul>
                
                <div class="mobile-menu-cta">
                    <a href="tel:<?php echo $phoneDigits; ?>" class="btn-primary btn-block">
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                        </svg>
                        Call <?php echo $phone; ?>
                    </a>
                    <a href="/contact/" class="btn-secondary btn-block">Get Free Estimate</a>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main id="main-content">

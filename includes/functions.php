<?php
/**
 * ============================================================
 * includes/functions.php — Salt River Steel LLC
 * Helper functions for templates
 * ============================================================
 */

/**
 * Check if current page matches navigation item
 */
function isActivePage($page) {
    global $currentPage;
    return ($currentPage === $page) ? 'aria-current="page"' : '';
}

/**
 * Format phone number for display
 */
function formatPhone($phone) {
    return preg_replace('/[^0-9]/', '', $phone);
}

/**
 * Generate slug from service name
 */
function getServiceSlug($name) {
    return strtolower(str_replace(' ', '-', $name));
}

/**
 * Generate slug from city name
 */
function getAreaSlug($city) {
    return strtolower(str_replace(' ', '-', $city));
}

/**
 * Generate Service schema markup
 */
function generateServiceSchema($service) {
    global $siteName, $siteUrl;
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service['name'],
        'description' => $service['description'],
        'provider' => [
            '@id' => $siteUrl . '/#organization'
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => 'Florence',
            'containedIn' => [
                '@type' => 'State',
                'name' => 'Arizona'
            ]
        ]
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Generate FAQ schema markup
 */
function generateFAQSchema($faqs) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => []
    ];
    
    foreach ($faqs as $faq) {
        $schema['mainEntity'][] = [
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['answer']
            ]
        ];
    }
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Generate meta tags
 */
function generateMetaTags($title, $description, $canonical) {
    $output = '';
    $output .= '<title>' . htmlspecialchars($title) . '</title>' . "\n";
    $output .= '<meta name="description" content="' . htmlspecialchars($description) . '">' . "\n";
    $output .= '<link rel="canonical" href="' . htmlspecialchars($canonical) . '">' . "\n";
    return $output;
}

/**
 * Inline SVG icon helper
 */
function icon($name, $width = 24, $height = 24, $class = '') {
    $iconPath = $_SERVER['DOCUMENT_ROOT'] . "/references/lucide-icons/{$name}.svg";
    
    if (!file_exists($iconPath)) {
        return '<!-- Icon not found: ' . htmlspecialchars($name) . ' -->';
    }
    
    $svg = file_get_contents($iconPath);
    
    // Add aria-hidden and class attributes
    $svg = str_replace('<svg', '<svg aria-hidden="true"', $svg);
    $svg = str_replace('width="24"', 'width="' . $width . '"', $svg);
    $svg = str_replace('height="24"', 'height="' . $height . '"', $svg);
    
    if ($class) {
        $svg = str_replace('<svg', '<svg class="' . htmlspecialchars($class) . '"', $svg);
    }
    
    return $svg;
}

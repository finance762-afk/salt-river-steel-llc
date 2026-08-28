<?php
/**
 * ============================================================
 * includes/blog-data.php — Salt River Steel LLC
 * Single source of truth for all blog posts
 * ============================================================
 *
 * This registry is read by:
 * - /blog/index.php (main blog grid)
 * - index.php "From the Blog" section (homepage preview)
 * - Individual posts' "Related Articles" blocks
 * - sitemap.php (blog URL enumeration)
 *
 * NEVER hardcode post lists elsewhere. All blog posts come from this array.
 */

$blogPosts = [
    [
        'slug'     => 'custom-steel-gate-cost-florence-az',
        'title'    => 'Custom Steel Gate Cost in Florence, AZ',
        'excerpt'  => 'Custom steel gates in Florence, AZ typically range from $2,500 to $8,000+ depending on size, design complexity, and automation. Learn what factors affect pricing and how to budget for your project.',
        'image'    => '/assets/images/custom-steel-gates-960.webp',
        'alt'      => 'Custom steel gate installation in Florence, Arizona',
        'date'     => 'August 28, 2026',
        'dateISO'  => '2026-08-28',
        'category' => 'Cost Guides',
        'readtime' => '6 min read',
    ],
    [
        'slug'     => 'steel-vs-wrought-iron-fencing-arizona',
        'title'    => 'Steel vs. Wrought Iron Fencing in Arizona',
        'excerpt'  => 'Choosing between steel and wrought iron fencing for your Arizona property? Both offer durability and security, but modern steel fencing delivers lower maintenance and better heat resistance for desert climates.',
        'image'    => '/assets/images/steel-fencing-960.webp',
        'alt'      => 'Comparison of steel and wrought iron fencing in Arizona',
        'date'     => 'August 28, 2026',
        'dateISO'  => '2026-08-28',
        'category' => 'Materials Guide',
        'readtime' => '5 min read',
    ],
];

<?php
/**
 * ============================================================
 * includes/config.php — Salt River Steel LLC
 * Central site configuration. All site-wide variables live here.
 * Generated Phase 1 (Scaffold) from build-plan.json.
 * ============================================================
 *
 * NOTE ON $domain: build-plan.json has no `production_domain` field
 * (its `domain` value is only the slug), so per build standard the
 * domain defaults to the preview host "<slug>.pageone.cloud".
 * Update $domain here once the production domain is live, then bump
 * $cssVersion so the CDN picks up the change.
 */

/* ---------- Identity ---------- */
$slug            = 'salt-river-steel-llc';          // exact build directory name
$siteName        = 'Salt River Steel LLC';
$tagline         = 'Custom Steel Gates, Fencing & Construction in Florence, AZ';
$ownerName       = 'Charles French';
$industry        = 'Steel construction company';

/* ---------- Contact ---------- */
$phone           = '(480) 450-6959';
$phoneSecondary  = '';
$phoneDigits     = '4804506959';                    // for tel:/sms: links
$email           = 'saltriversteel1@gmail.com';

/* ---------- Address (NAP) ---------- */
$address = [
    'street' => '12356 E Pot O Gold Trail',
    'city'   => 'Florence',
    'state'  => 'AZ',
    'zip'    => '85132',
];
$addressPublic = true;                               // owner approved public address display

/* ---------- Domain / URLs ---------- */
// No production_domain in build-plan.json → default to the preview host.
$domain    = 'salt-river-steel-llc.pageone.cloud';
$siteUrl   = 'https://' . $domain;                   // always a valid absolute URL
// $canonicalUrl is NOT set here — each page sets it from $siteUrl + its path
// before including head.php.

/* ---------- Geo / Google Business Profile ---------- */
$geo = [
    'lat' => 33.13630499999999,
    'lng' => -111.433116,
];
$gbpUrl            = 'https://maps.google.com/?cid=9908790916856018579';
$gbpPlaceId        = 'ChIJFZbE7Pk3KocRk_bRANcYg4k';
$gbpMapEmbed       = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4171.855040058855!2d-111.433116!3d33.13630499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x872a37f9ecc49615%3A0x898318d700d1f693!2sSalt%20River%20Steel!5e1!3m2!1sen!2sus!4v1787952445862!5m2!1sen!2sus" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>';
$directionsUrl     = 'https://www.google.com/maps/dir/?api=1&destination=place_id:ChIJFZbE7Pk3KocRk_bRANcYg4k';
$reviewRequestUrl  = 'https://search.google.com/local/writereview?placeid=ChIJFZbE7Pk3KocRk_bRANcYg4k';

/* ---------- Business Details ---------- */
$yearEstablished = 2022;
$yearsInBusiness = 4;                                // in business since 2022
$acceptsSms      = false;                            // integrations.accepts_sms — sticky bar gets 2 buttons

/* ---------- Hours ----------
 * Not provided in intake (business_hours empty). Do NOT fabricate.
 * Populate this array when the client supplies hours.
 */
$businessHours = [];

/* ---------- SEO Keywords ----------
 * Source build-plan values contained data-entry typos; cleaned to correct,
 * intent-preserving keywords for this steel construction company in Florence, AZ.
 */
$primaryKeyword    = 'steel construction company Florence AZ';
$secondaryKeywords = [
    'custom steel gates Florence AZ',
    'steel fencing Florence AZ',
    'commercial steel construction',
    'residential steel fabrication',
    'industrial steel contractor',
];

/* ---------- Services ----------
 * Seeded from intake description (commercial / residential / industrial
 * steel work, custom gates, fencing). Copy is refined by the copywriter
 * in a later phase; slugs are stable and drive /services/{slug}/ URLs.
 */
$services = [
    [
        'name'        => 'Custom Steel Gates',
        'slug'        => 'custom-steel-gates',
        'description' => 'Custom-fabricated driveway, entry, and security gates built to fit your Florence-area property.',
        'keywords'    => ['custom steel gates', 'driveway gates', 'security gates Florence AZ'],
    ],
    [
        'name'        => 'Steel Fencing',
        'slug'        => 'steel-fencing',
        'description' => 'Durable steel and wrought-iron fencing for homes, ranches, and commercial sites across the Florence area.',
        'keywords'    => ['steel fencing', 'wrought iron fence', 'ranch fencing Florence AZ'],
    ],
    [
        'name'        => 'Commercial Steel Construction',
        'slug'        => 'commercial-steel-construction',
        'description' => 'Structural steel fabrication and installation for commercial buildings and businesses.',
        'keywords'    => ['commercial steel construction', 'structural steel', 'commercial fabrication'],
    ],
    [
        'name'        => 'Residential Steel Work',
        'slug'        => 'residential-steel-work',
        'description' => 'Custom residential steel fabrication — railings, stairs, carports, and architectural metalwork.',
        'keywords'    => ['residential steel', 'metal railings', 'steel carports'],
    ],
    [
        'name'        => 'Industrial Steel Fabrication',
        'slug'        => 'industrial-steel-fabrication',
        'description' => 'Heavy-duty industrial steel fabrication and welding for demanding job-site applications.',
        'keywords'    => ['industrial steel fabrication', 'industrial welding', 'heavy steel work'],
    ],
];

/* ---------- Service Areas ---------- */
$serviceAreas = [
    'Florence',
];

/* ---------- Social ----------
 * No social profiles supplied in intake.
 */
$socialLinks = [];

/* ---------- Analytics ---------- */
$googleAnalyticsId = 'G-XXXXXXXXXX';                 // placeholder — replace at launch

/* ---------- Brand Colors ----------
 * design.colors was empty in build-plan.json; values mirror the
 * pre-generated framework.css :root tokens (steel-blue palette).
 * Refined during logo analysis if needed.
 */
$colors = [
    'primary'       => '#1a2b3c',
    'primary_rgb'   => '26, 43, 60',
    'secondary'     => '#4d5e6f',
    'secondary_rgb' => '77, 94, 111',
    'accent'        => '#06b6d4',
];

/* ---------- Forms ---------- */
$formAction = 'https://formsubmit.co/saltriversteel1@gmail.com';

/* ---------- Assets ---------- */
$logo = '/assets/images/logo.png';                   // localized in a later phase

/* ---------- Tier ---------- */
$tier = 'premium';

/* ---------- CSS Cache-Bust ----------
 * SINGLE source of the framework.css cache-bust. Pages must NEVER set
 * their own $cssVersion. Bump this on every framework.css change.
 */
$cssVersion = '2';

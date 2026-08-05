<?php
/**
 * Shared <head> for every JindraWebDev page.
 *
 * Set any of these BEFORE including this file (all are optional except
 * $page_title / $page_description):
 *
 *   $page_title       — <title> and og:title
 *   $page_description — meta description / og:description
 *   $page_keywords    — meta keywords
 *   $page_url         — canonical + og:url  (full https:// URL)
 *   $page_image       — social share image (full URL, or /path from site root)
 *   $page_image_alt   — alt text for that image
 *   $page_robots      — defaults to "index, follow"
 *   $page_type        — og:type, defaults to "website" (articles pass "article")
 *   $page_schema      — extra JSON-LD <script> blocks, already stringified
 *   $page_styles      — extra page-specific CSS (raw, no <style> wrapper)
 *   $current_page     — used by header.php/footer.php to mark the active nav item
 */

$site_base   = "https://jindrawebdev.com";
$site_name   = "JindraWebDev";
$site_author = "Lexis Jindra";

if (!isset($page_title))       { $page_title = "JindraWebDev | Web Design for Small Businesses"; }
if (!isset($page_description)) { $page_description = "Thoughtful web design, branding, and local SEO for small businesses in Nebraska and beyond."; }
if (!isset($page_keywords))    { $page_keywords = "Nebraska web designer, small business web design, local SEO, branding"; }
if (!isset($page_url))         { $page_url = $site_base . $_SERVER['REQUEST_URI']; }
if (!isset($page_image))       { $page_image = "/images/jindrawebdev-og-image.png"; }
if (!isset($page_image_alt))   { $page_image_alt = "JindraWebDev web design for small businesses"; }
if (!isset($page_robots))      { $page_robots = "index, follow"; }
if (!isset($page_type))        { $page_type = "website"; }
if (!isset($page_schema))      { $page_schema = ""; }
if (!isset($page_styles))      { $page_styles = ""; }
if (!isset($current_page))     { $current_page = ""; }

// Allow $page_image to be given as either a full URL or a root-relative path.
$page_image_url = (strpos($page_image, 'http') === 0) ? $page_image : $site_base . $page_image;
$page_image_type = (substr($page_image_url, -4) === '.png') ? 'image/png' : 'image/jpeg';

// Site-wide structured data. Page-specific JSON-LD comes in via $page_schema.
$site_schema = [
    "@context" => "https://schema.org",
    "@graph" => [
        [
            "@type" => "Organization",
            "@id" => $site_base . "/#organization",
            "name" => $site_name,
            "alternateName" => "Jindra Web Development LLC",
            "url" => $site_base . "/",
            "logo" => $site_base . "/images/jindrawebdev-og-image.png",
            "founder" => ["@type" => "Person", "name" => $site_author],
            "email" => "contact@jindrawebdev.com",
            "telephone" => "+1-402-450-6563",
            "sameAs" => [
                "https://www.facebook.com/jindrawebdev",
                "https://www.instagram.com/jindrawebdev",
            ],
        ],
        [
            "@type" => "LocalBusiness",
            "@id" => $site_base . "/#localbusiness",
            "name" => $site_name,
            "url" => $site_base . "/",
            "image" => $site_base . "/images/jindrawebdev-og-image.png",
            "email" => "contact@jindrawebdev.com",
            "telephone" => "+1-402-450-6563",
            "areaServed" => [
                ["@type" => "State", "name" => "Nebraska"],
                ["@type" => "City", "name" => "Omaha"],
                ["@type" => "City", "name" => "Fremont"],
            ],
            "priceRange" => "$$",
            "description" => "Web design, branding, local SEO, digital cleanup, drone footage, and aerial photography for small businesses.",
        ],
        [
            "@type" => "WebSite",
            "@id" => $site_base . "/#website",
            "url" => $site_base . "/",
            "name" => $site_name,
            "publisher" => ["@id" => $site_base . "/#organization"],
        ],
    ],
];
?><!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($site_author); ?>">
    <meta name="robots" content="<?php echo htmlspecialchars($page_robots); ?>">
    <meta name="theme-color" content="#768473">
    <link rel="canonical" href="<?php echo htmlspecialchars($page_url); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="<?php echo htmlspecialchars($page_type); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($page_image_url); ?>">
    <meta property="og:image:secure_url" content="<?php echo htmlspecialchars($page_image_url); ?>">
    <meta property="og:image:type" content="<?php echo htmlspecialchars($page_image_type); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?php echo htmlspecialchars($page_image_alt); ?>">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo htmlspecialchars($page_url); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($page_image_url); ?>">
    <meta name="twitter:image:alt" content="<?php echo htmlspecialchars($page_image_alt); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/site.webmanifest">
    <link rel="shortcut icon" href="/img/favicon.ico">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FG722XBQHB"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-FG722XBQHB');
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#768473',
                            light: '#9BAD98',
                            offwhite: '#F5F5F5',
                            charcoal: '#333333',
                            cream: '#FBFAF7',
                            white: '#ffffff'
                        }
                    },
                    fontFamily: {
                        serif: ['"Libre Baskerville"', 'serif'],
                        sans: ['"Lato"', 'sans-serif'],
                    },
                    boxShadow: {
                        soft: '0 24px 70px rgba(51, 51, 51, 0.10)',
                        card: '0 16px 50px rgba(118, 132, 115, 0.14)'
                    }
                }
            }
        }
    </script>
    <style>
        @media (min-width: 768px) {
            h1, h2, h3, h4, h5, h6 { line-height: 1.25 !important; }
        }
        @media (max-width: 767px) {
            h1, h2, h3, h4, h5, h6 { line-height: 1.22 !important; }
        }
        .skip-link { position: absolute; left: -999px; top: 1rem; z-index: 100; background: #333333; color: #ffffff; padding: .75rem 1rem; border-radius: 999px; }
        .skip-link:focus { left: 1rem; }
        a:focus-visible, button:focus-visible { outline: 3px solid rgba(118,132,115,.65); outline-offset: 3px; }
    </style>
<?php if ($page_styles !== ''): ?>
    <style>
<?php echo $page_styles; ?>
    </style>
<?php endif; ?>

    <script type="application/ld+json"><?php echo json_encode($site_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?></script>
<?php echo $page_schema; ?>
</head>

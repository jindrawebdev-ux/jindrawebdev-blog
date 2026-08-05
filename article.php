<?php
/**
 * JindraWebDev Blog — Article Template
 * Sits at the site root next to about.php, contact.php.
 * URL: /blog/{slug} — requires ONE new rule in .htaccess, see
 * htaccess-addition.txt. That rule rewrites /blog/{slug} to
 * /article.php?slug={slug}.
 *
 * Self-contained, matching how about.php/contact.php etc. are actually
 * built on this site — there's no shared includes/head.php,
 * body-start.php, or scripts.php, so this page carries its own <head>,
 * nav, and footer rather than including files that don't exist.
 *
 * Every SEO/AEO/GEO element below is generated FROM blog-data/articles.json
 * — nothing is hardcoded per article. The weekly automation only needs to
 * add one JSON entry + one content file and everything here (title tag,
 * meta description, canonical, OG/Twitter tags, Article + FAQPage +
 * Breadcrumb JSON-LD, quick-answer box, citations) is correct automatically.
 *
 * SEO = ranks in traditional Google search results.
 * AEO = ranks in "answer" surfaces (featured snippets / Google AI Overviews)
 *       via a direct quotable answer up top + FAQPage schema.
 * GEO = optimized to be read, understood, and cited by AI answer engines
 *       (ChatGPT, Perplexity, Claude, etc.) via named authorship, dated
 *       content, and a real, linked source list.
 */

$dataPath = $_SERVER['DOCUMENT_ROOT'] . '/blog-data/articles.json';
$data = json_decode(file_get_contents($dataPath), true);
$site = $data['site'];
$categories = $data['categories'];
$articles = $data['articles'];

$slug = isset($_GET['slug']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['slug'])) : '';
$article = null;
foreach ($articles as $a) {
    if ($a['slug'] === $slug) { $article = $a; break; }
}

$baseUrl = rtrim($site['baseUrl'], '/');

if (!$article) {
    http_response_code(404);
    $page_title = "Article Not Found | JindraWebDev";
    $page_description = "This article couldn't be found.";
    $page_url = $baseUrl . '/blog/' . htmlspecialchars($slug);
    $page_robots = "noindex, follow";
    ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="robots" content="<?php echo htmlspecialchars($page_robots); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { brand: { dark: '#768473', light: '#9BAD98', offwhite: '#F5F5F5', charcoal: '#333333', cream: '#FBFAF7', white: '#ffffff' } }, fontFamily: { serif: ['"Libre Baskerville"', 'serif'], sans: ['"Lato"', 'sans-serif'] } } } }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-brand-cream text-brand-charcoal">
    <main id="main-content">
        <div class="max-w-3xl mx-auto px-5 py-24 text-center">
            <h1 class="font-serif text-4xl font-bold text-brand-charcoal mb-4">Article not found</h1>
            <a href="/blog" class="text-brand-dark underline">Back to the blog</a>
        </div>
    </main>
</body>
</html>
    <?php
    exit;
}

$catLabel = 'General';
foreach ($categories as $cat) {
    if ($cat['slug'] === $article['category']) { $catLabel = $cat['label']; }
}

$canonical = $baseUrl . '/blog/' . $article['slug'];
$ogImageUrl = (strpos($article['ogImage'], 'http') === 0) ? $article['ogImage'] : $baseUrl . $article['ogImage'];
$publishedIso = date('c', strtotime($article['datePublished']));
$modifiedIso = date('c', strtotime($article['dateModified']));

$articleSchema = [
    "@context" => "https://schema.org",
    "@type" => "Article",
    "headline" => $article['title'],
    "description" => $article['metaDescription'],
    "image" => [$ogImageUrl],
    "datePublished" => $publishedIso,
    "dateModified" => $modifiedIso,
    "author" => [
        "@type" => "Person",
        "name" => $site['author']['name'],
        "url" => $site['author']['url'],
    ],
    "publisher" => [
        "@type" => "Organization",
        "name" => "JindraWebDev",
        "url" => $baseUrl,
        "logo" => ["@type" => "ImageObject", "url" => $baseUrl . "/images/jindrawebdev-og-image.png"],
    ],
    "mainEntityOfPage" => ["@type" => "WebPage", "@id" => $canonical],
    "articleSection" => $catLabel,
    "keywords" => implode(', ', $article['tags']),
];

$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $baseUrl . '/'],
        ["@type" => "ListItem", "position" => 2, "name" => "Blog", "item" => $baseUrl . '/blog'],
        ["@type" => "ListItem", "position" => 3, "name" => $article['title'], "item" => $canonical],
    ],
];

$schemaBlocks  = '<script type="application/ld+json">' . json_encode($articleSchema, JSON_UNESCAPED_SLASHES) . "</script>\n";
$schemaBlocks .= '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES) . "</script>\n";

if (!empty($article['faq'])) {
    $faqSchema = [
        "@context" => "https://schema.org",
        "@type" => "FAQPage",
        "mainEntity" => array_map(function ($qa) {
            return [
                "@type" => "Question",
                "name" => $qa['question'],
                "acceptedAnswer" => ["@type" => "Answer", "text" => $qa['answer']],
            ];
        }, $article['faq']),
    ];
    $schemaBlocks .= '<script type="application/ld+json">' . json_encode($faqSchema, JSON_UNESCAPED_SLASHES) . "</script>\n";
}

$page_title = $article['metaTitle'];
$page_description = $article['metaDescription'];
$page_keywords = implode(', ', $article['tags']);
$page_url = $canonical;
$page_image = $ogImageUrl;
$page_robots = "index, follow, max-image-preview:large";

$contentPath = $_SERVER['DOCUMENT_ROOT'] . '/blog-data/content/' . $article['contentFile'];
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($site['author']['name']); ?>">
    <meta name="robots" content="<?php echo htmlspecialchars($page_robots); ?>">
    <meta name="theme-color" content="<?php echo htmlspecialchars($site['themeColor']); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($page_url); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>">
    <meta property="og:image:secure_url" content="<?php echo htmlspecialchars($page_image); ?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="article:published_time" content="<?php echo htmlspecialchars($publishedIso); ?>">
    <meta property="article:modified_time" content="<?php echo htmlspecialchars($modifiedIso); ?>">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo htmlspecialchars($page_url); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($page_image); ?>">

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
    </style>
    <style>
        .skip-link { position: absolute; left: -999px; top: 1rem; z-index: 100; background: #333333; color: #ffffff; padding: .75rem 1rem; border-radius: 999px; }
        .skip-link:focus { left: 1rem; }
        a:focus-visible, button:focus-visible { outline: 3px solid rgba(118,132,115,.65); outline-offset: 3px; }
    </style>
    <?php echo $schemaBlocks; ?>
</head>
<body class="font-sans antialiased bg-brand-cream text-brand-charcoal selection:bg-brand-light selection:text-white">
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <header class="sticky top-0 z-50 bg-brand-cream/90 backdrop-blur border-b border-brand-dark/10">
        <nav class="max-w-7xl mx-auto px-5 md:px-8 py-4 flex items-center justify-between gap-4" aria-label="Main navigation">
            <a href="/" class="font-serif font-bold text-xl md:text-2xl tracking-wide text-brand-charcoal" aria-label="JindraWebDev home">JindraWebDev</a>

            <div class="hidden md:flex items-center gap-8 text-xs uppercase tracking-[0.22em] font-bold text-brand-charcoal/70">
                <a href="/" class="hover:text-brand-dark transition">Home</a>
                <a href="/about" class="hover:text-brand-dark transition">About</a>
                <a href="/services" class="hover:text-brand-dark transition">Services</a>
                <a href="/blog" class="text-brand-dark transition" aria-current="page">Blog</a>
                <a href="/contact" class="hover:text-brand-dark transition">Contact</a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                <a href="tel:4024506563" class="hidden lg:inline-flex text-xs uppercase tracking-[0.2em] font-bold text-brand-charcoal/60 hover:text-brand-dark transition">402-450-6563</a>
                <a href="/contact" class="rounded-full bg-brand-dark text-white px-5 py-2.5 text-xs uppercase tracking-[0.2em] font-bold hover:bg-brand-charcoal transition">Inquire</a>
            </div>

            <button id="mobile-menu-button" type="button" class="md:hidden inline-flex items-center gap-2 justify-center rounded-full border border-brand-dark/15 bg-white text-brand-charcoal px-4 py-3 text-xs uppercase tracking-[0.18em] font-bold hover:border-brand-dark/35 transition focus:outline-none focus:ring-2 focus:ring-brand-dark/40" aria-controls="mobile-menu" aria-expanded="false" aria-label="Open mobile menu">
                <span>Menu</span>
                <svg id="mobile-menu-open-icon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16"></path></svg>
                <svg id="mobile-menu-close-icon" class="hidden w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path></svg>
            </button>
        </nav>

        <div id="mobile-menu" class="hidden md:hidden border-t border-brand-dark/10 bg-brand-cream shadow-card">
            <nav class="px-5 py-5 space-y-3 text-sm uppercase tracking-[0.18em] font-bold" aria-label="Mobile navigation">
                <a href="/" class="block rounded-2xl px-5 py-4 transition bg-white border border-brand-dark/10 hover:border-brand-dark/30 text-brand-charcoal/75">Home</a>
                <a href="/about" class="block rounded-2xl px-5 py-4 transition bg-white border border-brand-dark/10 hover:border-brand-dark/30 text-brand-charcoal/75">About</a>
                <a href="/services" class="block rounded-2xl px-5 py-4 transition bg-white border border-brand-dark/10 hover:border-brand-dark/30 text-brand-charcoal/75">Services</a>
                <a href="/blog" class="block rounded-2xl px-5 py-4 transition bg-brand-dark text-white border border-brand-dark" aria-current="page">Blog</a>
                <a href="/contact" class="block rounded-2xl px-5 py-4 transition bg-white border border-brand-dark/10 hover:border-brand-dark/30 text-brand-charcoal/75">Contact</a>
                <a href="/contact" class="block rounded-full bg-brand-dark text-white text-center px-5 py-4 hover:bg-brand-charcoal transition">Start an inquiry</a>
                <a href="tel:4024506563" class="block rounded-full bg-white border border-brand-dark/10 text-center px-5 py-4 text-brand-charcoal/75 hover:border-brand-dark/30 transition">Call 402-450-6563</a>
            </nav>
        </div>
    </header>

    <main id="main-content">

        <section class="relative overflow-hidden bg-brand-charcoal text-white">
            <div class="relative max-w-4xl mx-auto px-5 md:px-8 py-16 md:py-20">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-light mb-4">
                    <a href="/blog" class="hover:underline">Blog</a> / <?php echo htmlspecialchars($catLabel); ?>
                </p>
                <h1 class="font-serif text-4xl sm:text-5xl font-bold mb-5 leading-tight"><?php echo htmlspecialchars($article['title']); ?></h1>
                <p class="text-white/70 text-sm uppercase tracking-[0.16em] font-bold">
                    By <?php echo htmlspecialchars($site['author']['name']); ?> &middot;
                    <?php echo date('F j, Y', strtotime($article['datePublished'])); ?> &middot;
                    <?php echo (int)$article['readTimeMinutes']; ?> min read
                </p>
            </div>
        </section>

        <?php if (!empty($article['heroImage'])): ?>
        <div class="max-w-5xl mx-auto px-5 md:px-8 -mt-8 md:-mt-10 relative z-10">
            <img src="<?php echo htmlspecialchars($article['heroImage']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="w-full rounded-[1.5rem] shadow-soft object-cover aspect-[1200/630]">
        </div>
        <?php endif; ?>

        <section class="py-14 md:py-20 bg-brand-cream">
            <div class="max-w-3xl mx-auto px-5 md:px-8">

                <?php if (!empty($article['quickAnswer'])): ?>
                <div class="rounded-3xl bg-white border-l-4 border-brand-dark p-6 mb-10 shadow-card">
                    <p class="text-brand-charcoal/85 leading-relaxed"><strong class="text-brand-charcoal">Quick answer:</strong> <?php echo htmlspecialchars($article['quickAnswer']); ?></p>
                </div>
                <?php endif; ?>

                <div class="article-body">
                    <?php
                    if (file_exists($contentPath)) {
                        include $contentPath;
                    } else {
                        echo '<p><em>Content file missing: ' . htmlspecialchars($article['contentFile']) . '</em></p>';
                    }
                    ?>
                </div>

                <?php if (!empty($article['faq'])): ?>
                <div class="mt-14">
                    <h2 class="font-serif text-2xl font-bold text-brand-charcoal mb-5">Frequently Asked Questions</h2>
                    <div class="space-y-4">
                        <?php foreach ($article['faq'] as $qa): ?>
                        <div class="rounded-2xl bg-white border border-brand-dark/10 p-5">
                            <p class="font-bold text-brand-charcoal mb-1"><?php echo htmlspecialchars($qa['question']); ?></p>
                            <p class="text-brand-charcoal/70 leading-relaxed"><?php echo htmlspecialchars($qa['answer']); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (!empty($article['sources'])): ?>
                <div class="mt-14 pt-8 border-t border-brand-dark/10">
                    <h2 class="font-serif text-xl font-bold text-brand-charcoal mb-4">Sources</h2>
                    <ol class="space-y-2 text-sm text-brand-charcoal/70 list-decimal list-inside">
                        <?php foreach ($article['sources'] as $src): ?>
                        <li><a href="<?php echo htmlspecialchars($src['url']); ?>" target="_blank" rel="noopener nofollow" class="text-brand-dark underline hover:text-brand-charcoal"><?php echo htmlspecialchars($src['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                <?php endif; ?>

            </div>
        </section>

        <section class="py-16 md:py-20 bg-brand-dark text-white">
            <div class="max-w-3xl mx-auto px-5 md:px-8 text-center">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-white/60 mb-4">Ready when you are</p>
                <h2 class="font-serif text-3xl md:text-4xl font-bold mb-5">Want your website working this hard for you?</h2>
                <a href="/contact" class="inline-flex rounded-full bg-white text-brand-dark px-8 py-3.5 font-bold hover:bg-brand-offwhite transition">Start a conversation</a>
            </div>
        </section>

    </main>

    <footer class="bg-brand-charcoal py-10 px-5 md:px-8 border-t border-white/10">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6 text-[11px] uppercase tracking-[0.2em] font-bold text-white/55">
            <div>&copy; 2026 JindraWebDev</div>
            <div class="flex gap-4 items-center">
                <a href="mailto:contact@jindrawebdev.com" class="hover:text-white transition">Email</a>
                <a href="tel:4024506563" class="hover:text-white transition">402-450-6563</a>
                <a href="https://www.facebook.com/jindrawebdev" target="_blank" rel="noopener" class="w-10 h-10 rounded-full border border-white/15 text-white/70 flex items-center justify-center hover:text-white hover:border-white/40 hover:bg-white/10 transition" aria-label="JindraWebDev on Facebook"><span aria-hidden="true">f</span></a>
                <a href="https://www.instagram.com/jindrawebdev" target="_blank" rel="noopener" class="w-10 h-10 rounded-full border border-white/15 text-white/70 flex items-center justify-center hover:text-white hover:border-white/40 hover:bg-white/10 transition" aria-label="JindraWebDev on Instagram"><span aria-hidden="true">&#9678;</span></a>
            </div>
            <nav class="flex flex-wrap justify-center gap-6" aria-label="Footer navigation">
                <a href="/" class="hover:text-white transition">Home</a> <a href="/about" class="hover:text-white transition">About</a> <a href="/services" class="hover:text-white transition">Services</a> <a href="/blog" class="text-white transition" aria-current="page">Blog</a> <a href="/contact" class="hover:text-white transition">Contact</a> <a href="/privacy" class="hover:text-white transition">Privacy</a> <a href="/terms" class="hover:text-white transition">Terms</a> <a href="/accessibility" class="hover:text-white transition">Accessibility</a>
            </nav>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOpenIcon = document.getElementById('mobile-menu-open-icon');
        const mobileMenuCloseIcon = document.getElementById('mobile-menu-close-icon');
        if (!mobileMenuButton || !mobileMenu) return;
        function closeMenu() {
            mobileMenu.classList.add('hidden');
            mobileMenuButton.setAttribute('aria-expanded', 'false');
            mobileMenuButton.setAttribute('aria-label', 'Open mobile menu');
            if (mobileMenuOpenIcon) mobileMenuOpenIcon.classList.remove('hidden');
            if (mobileMenuCloseIcon) mobileMenuCloseIcon.classList.add('hidden');
        }
        mobileMenuButton.addEventListener('click', function () {
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
            if (isExpanded) { closeMenu(); return; }
            mobileMenu.classList.remove('hidden');
            mobileMenuButton.setAttribute('aria-expanded', 'true');
            mobileMenuButton.setAttribute('aria-label', 'Close mobile menu');
            if (mobileMenuOpenIcon) mobileMenuOpenIcon.classList.add('hidden');
            if (mobileMenuCloseIcon) mobileMenuCloseIcon.classList.remove('hidden');
        });
        mobileMenu.querySelectorAll('a').forEach(function (link) { link.addEventListener('click', closeMenu); });
        document.addEventListener('keydown', function (event) { if (event.key === 'Escape') closeMenu(); });
    });
    </script>
</body>
</html>

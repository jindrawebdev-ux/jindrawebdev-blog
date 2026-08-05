<?php
/**
 * JindraWebDev Blog — Landing Page
 * Sits at the site root next to about.php, services.php, contact.php.
 * URL: /blog (existing .htaccess rewrites /blog -> /blog.php, the same
 * way /about -> /about.php.)
 *
 * Self-contained, matching how about.php/contact.php etc. are actually
 * built on this site — there's no shared includes/head.php,
 * body-start.php, or scripts.php, so this page carries its own <head>,
 * nav, and footer rather than including files that don't exist.
 *
 * Reads blog-data/articles.json for every article. No database required —
 * the weekly automation appends one entry there + drops one content file,
 * and this page (and article.php) pick it up automatically.
 */
$articlesData = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/blog-data/articles.json'), true);
$site = $articlesData['site'];
$categories = $articlesData['categories'];
$articles = $articlesData['articles'];
usort($articles, function ($a, $b) {
    return strtotime($b['datePublished']) <=> strtotime($a['datePublished']);
});

$page_title = "Blog | JindraWebDev";
$page_description = "Practical, well-sourced articles on websites, local SEO, and social media for small-town Nebraska businesses.";
$page_keywords = "small business blog, Nebraska web design blog, local SEO tips, social media tips for small business";
$page_url = "https://jindrawebdev.com/blog";
$page_image = rtrim($site['baseUrl'], '/') . $site['defaultOgImage'];
$page_robots = "index, follow";

$baseUrl = rtrim($site['baseUrl'], '/');
$webpageSchema = [
    "@context" => "https://schema.org",
    "@type" => "CollectionPage",
    "url" => $page_url,
    "name" => $page_title,
    "description" => $page_description,
    "breadcrumb" => [
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $baseUrl . '/'],
            ["@type" => "ListItem", "position" => 2, "name" => "Blog", "item" => $page_url],
        ],
    ],
];
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
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>">
    <meta property="og:image:secure_url" content="<?php echo htmlspecialchars($page_image); ?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

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
    <script type="application/ld+json"><?php echo json_encode($webpageSchema, JSON_UNESCAPED_SLASHES); ?></script>
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
            <div class="absolute inset-0 opacity-[0.07]" aria-hidden="true">
                <div class="absolute top-12 left-8 w-72 h-72 rounded-full border border-white"></div>
                <div class="absolute -bottom-20 right-10 w-96 h-96 rounded-full border border-white"></div>
            </div>
            <div class="relative max-w-5xl mx-auto px-5 md:px-8 py-16 md:py-24 text-center">
                <p class="text-xs uppercase tracking-[0.3em] font-bold text-brand-light mb-5">The JindraWebDev Blog</p>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">Practical thinking for small-town businesses.</h1>
                <p class="text-lg md:text-xl leading-relaxed text-white/75 max-w-2xl mx-auto">Well-sourced, no-jargon articles on websites, local SEO, and social media — written for busy business owners, not marketers.</p>
            </div>
        </section>

        <section class="py-14 md:py-20 bg-brand-cream">
            <div class="max-w-7xl mx-auto px-5 md:px-8">

                <div class="flex flex-col md:flex-row gap-4 md:items-center md:justify-between mb-10">
                    <input
                        type="text"
                        id="blog-search"
                        placeholder="Search articles..."
                        aria-label="Search articles"
                        class="w-full md:max-w-sm rounded-2xl border border-brand-dark/15 bg-white px-5 py-3.5 text-brand-charcoal focus:border-brand-dark focus:ring-2 focus:ring-brand-dark/20 outline-none transition"
                    >
                    <div class="flex flex-wrap gap-2" id="blog-filters">
                        <button type="button" data-category="all" class="filter-pill active rounded-full border border-brand-dark px-4 py-2 text-xs uppercase tracking-[0.18em] font-bold transition bg-brand-dark text-white">All</button>
                        <?php foreach ($categories as $cat): ?>
                        <button type="button" data-category="<?php echo htmlspecialchars($cat['slug']); ?>" class="filter-pill rounded-full border border-brand-dark/30 px-4 py-2 text-xs uppercase tracking-[0.18em] font-bold text-brand-charcoal/70 hover:border-brand-dark transition">
                            <?php echo htmlspecialchars($cat['label']); ?>
                        </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="blog-grid">
                    <?php foreach ($articles as $a):
                        $catLabel = 'General';
                        foreach ($categories as $cat) {
                            if ($cat['slug'] === $a['category']) { $catLabel = $cat['label']; }
                        }
                        $searchBlob = strtolower($a['title'] . ' ' . $a['excerpt'] . ' ' . implode(' ', $a['tags']));
                    ?>
                    <a
                        href="/blog/<?php echo htmlspecialchars($a['slug']); ?>"
                        class="blog-card group rounded-[2rem] bg-white border border-brand-dark/10 overflow-hidden shadow-card hover:-translate-y-1 transition flex flex-col"
                        data-category="<?php echo htmlspecialchars($a['category']); ?>"
                        data-search="<?php echo htmlspecialchars($searchBlob); ?>"
                    >
                        <div class="aspect-[1200/630] bg-brand-offwhite overflow-hidden">
                            <img src="<?php echo htmlspecialchars($a['heroImage']); ?>" alt="<?php echo htmlspecialchars($a['title']); ?>" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <p class="text-[11px] uppercase tracking-[0.2em] font-bold text-brand-dark mb-3"><?php echo htmlspecialchars($catLabel); ?></p>
                            <h3 class="font-serif text-xl font-bold text-brand-charcoal mb-2 leading-snug"><?php echo htmlspecialchars($a['title']); ?></h3>
                            <p class="text-sm text-brand-charcoal/70 leading-relaxed mb-4 flex-1"><?php echo htmlspecialchars($a['excerpt']); ?></p>
                            <p class="text-xs text-brand-charcoal/50 font-bold uppercase tracking-[0.14em]">
                                <?php echo date('M j, Y', strtotime($a['datePublished'])); ?> &middot; <?php echo (int)$a['readTimeMinutes']; ?> min read
                            </p>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>

                <p id="blog-empty" class="hidden text-center text-brand-charcoal/60 py-16">No articles match your search yet — try a different term.</p>
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
        if (mobileMenuButton && mobileMenu) {
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
        }

        const search = document.getElementById('blog-search');
        const filters = document.getElementById('blog-filters');
        const cards = Array.from(document.querySelectorAll('#blog-grid .blog-card'));
        const empty = document.getElementById('blog-empty');
        let activeCategory = 'all';

        function applyFilters() {
            const term = search.value.trim().toLowerCase();
            let visible = 0;
            cards.forEach(function (card) {
                const matchesCategory = activeCategory === 'all' || card.dataset.category === activeCategory;
                const matchesSearch = term === '' || card.dataset.search.indexOf(term) !== -1;
                const show = matchesCategory && matchesSearch;
                card.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            empty.classList.toggle('hidden', visible !== 0);
        }

        search.addEventListener('input', applyFilters);

        filters.addEventListener('click', function (e) {
            const btn = e.target.closest('.filter-pill');
            if (!btn) return;
            filters.querySelectorAll('.filter-pill').forEach(function (p) {
                p.classList.remove('active', 'bg-brand-dark', 'text-white');
                p.classList.add('border-brand-dark/30', 'text-brand-charcoal/70');
            });
            btn.classList.add('active', 'bg-brand-dark', 'text-white');
            btn.classList.remove('border-brand-dark/30', 'text-brand-charcoal/70');
            activeCategory = btn.dataset.category;
            applyFilters();
        });
    });
    </script>
</body>
</html>

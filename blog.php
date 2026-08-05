<?php
// TEMP DEBUG — remove after diagnosing the 500 error
error_reporting(E_ALL);
ini_set('display_errors', '1');

/**
 * JindraWebDev Blog — Landing Page
 * Sits at the site root next to about.php, services.php, contact.php.
 * URL: /blog (your existing .htaccess already rewrites /blog -> /blog.php,
 * the same way /about -> /about.php.)
 *
 * Reads blog-data/articles.json for every article. No database required —
 * the weekly automation appends one entry there + drops one content file,
 * and this page (and article.php) pick it up automatically.
 */
$page_title = "Blog | JindraWebDev";
$page_description = "Practical, well-sourced articles on websites, local SEO, and social media for small-town Nebraska businesses.";
$page_keywords = "small business blog, Nebraska web design blog, local SEO tips, social media tips for small business";
$page_url = "https://jindrawebdev.com/blog";
$page_robots = "index, follow";
$current_page = "blog";

include $_SERVER['DOCUMENT_ROOT'] . "/includes/head.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/body-start.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";

$articlesData = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/blog-data/articles.json'), true);
$categories = $articlesData['categories'];
$articles = $articlesData['articles'];
usort($articles, function ($a, $b) {
    return strtotime($b['datePublished']) <=> strtotime($a['datePublished']);
});
?>

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

<script>
(function () {
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
})();
</script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/scripts.php";
?>

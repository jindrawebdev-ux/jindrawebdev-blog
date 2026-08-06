<?php
/**
 * JindraWebDev Blog — Article Template
 * Sits at the site root next to about.php, contact.php.
 * URL: /blog/{slug} — requires ONE new rule in .htaccess, see
 * htaccess-addition.txt. That rule rewrites /blog/{slug} to
 * /article.php?slug={slug}.
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

// Scheduling: a future-dated article isn't published yet, so it behaves as
// not-found even if someone guesses the URL. Keeps blog.php and this page
// consistent — nothing is reachable before its publish date.
if ($article !== null && $article['datePublished'] > date('Y-m-d')) {
    $article = null;
}

if (!$article) {
    http_response_code(404);
    $page_title = "Article Not Found | JindraWebDev";
    $page_robots = "noindex, follow";
    $current_page = "blog";
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/head.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/body-start.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";
    ?>
    <main id="main-content">
        <div class="max-w-3xl mx-auto px-5 py-24 text-center">
            <h1 class="font-serif text-4xl font-bold text-brand-charcoal mb-4">Article not found</h1>
            <a href="/blog" class="text-brand-dark underline">Back to the blog</a>
        </div>
    </main>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/scripts.php";
    exit;
}

$catLabel = 'General';
foreach ($categories as $cat) {
    if ($cat['slug'] === $article['category']) { $catLabel = $cat['label']; }
}

$baseUrl = rtrim($site['baseUrl'], '/');
$canonical = $baseUrl . '/blog/' . $article['slug'];
$ogImageUrl = (strpos($article['ogImage'], 'http') === 0) ? $article['ogImage'] : $baseUrl . $article['ogImage'];
$publishedIso = date('c', strtotime($article['datePublished']));
$modifiedIso = date('c', strtotime($article['dateModified']));

// ---- Build JSON-LD for the site's existing $page_schema hook in includes/head.php ----
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
$page_image_alt = $article['title'];
$page_robots = "index, follow, max-image-preview:large";
$page_schema = $schemaBlocks;
$page_type = "article";           // og:type — articles are not "website"
$page_published = $publishedIso;  // drives article:published_time
$page_modified = $modifiedIso;    // drives article:modified_time
$current_page = "blog";

include $_SERVER['DOCUMENT_ROOT'] . "/includes/head.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/body-start.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";

$contentPath = $_SERVER['DOCUMENT_ROOT'] . '/blog-data/content/' . $article['contentFile'];
?>

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

    <?php /*
      No hero image here on purpose. The headline sits directly above and the
      quick answer directly below, so a full-width decorative slab only pushed
      the actual content down -- worst on mobile -- and cost a large image load
      near the top of the page. heroImage is still used on the /blog listing,
      where a grid of text-only cards would look broken, and ogImage still
      carries the share card.
    */ ?>

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

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/scripts.php";
?>

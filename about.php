<?php
/**
 * About — converted to use the shared includes.
 *
 * All page content below is unchanged; only the <head>, nav, and footer
 * markup was removed in favour of includes/head.php, body-start.php,
 * header.php, footer.php, and scripts.php so every page shares one copy.
 */
$page_title = "About Lexis Jindra | JindraWebDev";
$page_description = "Meet Lexis Jindra, the Nebraska mother, widow, designer, and developer behind JindraWebDev, serving small businesses with thoughtful web design and digital strategy.";
$page_keywords = "Lexis Jindra, JindraWebDev, Nebraska web designer, small business web design, Omaha web designer, rural business marketing, local SEO";
$page_url = "https://jindrawebdev.com/about";
$page_robots = "index, follow";
$current_page = "about";

// No $page_styles needed: includes/head.php already carries the
// .mobile-hero-note-title rule this page's hero depends on.

$aboutPageSchema = [
    "@context" => "https://schema.org",
    "@type" => "WebPage",
    "@id" => $page_url . "#webpage",
    "url" => $page_url,
    "name" => $page_title,
    "description" => $page_description,
    "isPartOf" => ["@id" => "https://jindrawebdev.com/#website"],
    "about" => ["@id" => "https://jindrawebdev.com/#organization"],
];
$page_schema = '<script type="application/ld+json">' . json_encode($aboutPageSchema, JSON_UNESCAPED_SLASHES) . "</script>\n";

include $_SERVER['DOCUMENT_ROOT'] . "/includes/head.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/body-start.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";
?>

    <main id="main-content">
        <!-- Editorial hero: intentionally different from homepage -->
        <section class="relative overflow-hidden bg-brand-charcoal text-white">
            <div class="absolute inset-0 opacity-[0.07]" aria-hidden="true">
                <div class="absolute top-12 left-8 w-72 h-72 rounded-full border border-white"></div>
                <div class="absolute -bottom-20 right-10 w-96 h-96 rounded-full border border-white"></div>
                <div class="absolute top-1/3 right-1/3 w-48 h-48 rounded-full bg-brand-light blur-3xl"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-5 md:px-8 pt-10 pb-14 sm:pt-14 sm:pb-16 md:pt-20 md:pb-24">
                <div class="grid lg:grid-cols-[.9fr_1.1fr] gap-5 lg:gap-16 items-end">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] font-bold text-brand-light mb-6">About Lexis Jindra</p>
                        <h1 class="font-serif text-5xl sm:text-6xl lg:text-7xl font-bold max-w-3xl mb-7">The person behind the websites.</h1>
                        <p class="text-lg md:text-xl leading-relaxed text-white/75 max-w-2xl">I’m a Nebraska designer, developer, mother, widow, and small-business advocate building thoughtful digital homes for real people doing meaningful work.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-3 sm:gap-4 md:gap-5 items-end">
                        <div class="space-y-4 md:space-y-5">
                            <div class="rounded-[2rem] bg-white/8 border border-white/10 p-3 sm:p-4 shadow-soft">
                                <div class="aspect-[3/4.25] sm:aspect-[4/5] rounded-[1.4rem] overflow-hidden bg-white/10 flex items-center justify-center">
                                    <img src="/images/about-lexis-portrait.webp" alt="Lexis Jindra portrait" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="hidden w-full h-full items-center justify-center p-6 text-center">
                                        <div>
                                            <p class="font-serif text-2xl font-bold mb-2">Portrait</p>
                                            <p class="text-xs uppercase tracking-[0.2em] text-white/50 font-bold">Replace image</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-3xl bg-brand-light/20 border border-white/10 p-5 sm:p-6">
                                <p class="font-serif text-2xl sm:text-3xl font-bold mb-1 leading-[1.2]">Nebraska</p>
                                <p class="text-[10px] sm:text-sm uppercase tracking-[0.18em] sm:tracking-[0.22em] text-white/55 font-bold leading-relaxed">small-town roots</p>
                            </div>
                        </div>
                        <div class="space-y-4 md:space-y-5 translate-y-8">
                            <div class="rounded-3xl bg-white text-brand-charcoal p-5 sm:p-6 shadow-soft">
                                <p class="mobile-hero-note-title font-serif text-xl sm:text-2xl md:text-3xl font-bold mb-2">Motherhood changed how I build.</p>
                                <p class="text-xs sm:text-sm leading-relaxed text-brand-charcoal/70">Clear. Practical. Intentional. No wasted steps.</p>
                            </div>
                            <div class="rounded-[2rem] bg-white/8 border border-white/10 p-3 sm:p-4 shadow-soft">
                                <div class="aspect-[3/4.25] sm:aspect-[4/5] rounded-[1.4rem] overflow-hidden bg-white/10 flex items-center justify-center">
                                    <img src="/images/about-lexis-lifestyle.webp" alt="Lexis Jindra lifestyle photo" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="hidden w-full h-full items-center justify-center p-6 text-center">
                                        <div>
                                            <p class="font-serif text-2xl font-bold mb-2">Lifestyle Photo</p>
                                            <p class="text-xs uppercase tracking-[0.2em] text-white/50 font-bold">Replace image</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Story section -->
        <section class="py-20 md:py-28 bg-brand-cream">
            <div class="max-w-7xl mx-auto px-5 md:px-8 grid lg:grid-cols-[.72fr_1.28fr] gap-12 lg:gap-16 items-start">
                <aside class="lg:sticky lg:top-28">
                    <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">My story</p>
                    <h2 class="font-serif text-4xl md:text-5xl font-bold text-brand-charcoal mb-7">A life built through love, loss, grit, and starting again.</h2>
                    <div class="rounded-3xl bg-white border border-brand-dark/10 p-6 shadow-card">
                        <p class="font-serif text-2xl font-bold text-brand-charcoal mb-3">A little about me</p>
                        <div class="grid grid-cols-2 gap-3 text-sm text-brand-charcoal/70">
                            <div class="rounded-2xl bg-brand-offwhite p-4"><span class="block font-bold text-brand-dark mb-1">01</span> Mom</div>
                            <div class="rounded-2xl bg-brand-offwhite p-4"><span class="block font-bold text-brand-dark mb-1">02</span> Widow</div>
                            <div class="rounded-2xl bg-brand-offwhite p-4"><span class="block font-bold text-brand-dark mb-1">03</span> Designer</div>
                            <div class="rounded-2xl bg-brand-offwhite p-4"><span class="block font-bold text-brand-dark mb-1">04</span> Developer</div>
                        </div>
                    </div>
                </aside>

                <div class="space-y-8">
                    <div class="rounded-[2rem] bg-white border border-brand-dark/10 p-7 md:p-10 shadow-card">
                        <p class="text-lg md:text-xl leading-relaxed text-brand-charcoal/78">I’m Lexis Jindra, the owner of JindraWebDev. I grew up with small-town Nebraska values: help people when you can, do the work the right way, and care about the community you’re part of. That is still the heart behind how I approach business.</p>
                    </div>

                    <div class="grid md:grid-cols-[1fr_.85fr] gap-6 items-stretch">
                        <div class="rounded-[2rem] bg-white border border-brand-dark/10 p-7 md:p-10 shadow-card">
                            <h3 class="font-serif text-3xl font-bold text-brand-charcoal mb-5">Motherhood made me more intentional.</h3>
                            <div class="space-y-5 text-brand-charcoal/75 leading-relaxed text-lg">
                                <p>Becoming a mom changed the way I see time, trust, and responsibility. I know what it feels like to carry a lot, to make decisions while life is moving fast, and to need things to be clear instead of complicated.</p>
                                <p>That perspective shows up in my work. I build websites for busy business owners who do not have time for confusing tech, scattered content, or a process that makes everything harder than it needs to be.</p>
                            </div>
                        </div>
                        <div class="rounded-[2rem] bg-brand-offwhite border border-brand-dark/10 p-3 sm:p-4 shadow-card">
                            <div class="aspect-[3/4.35] sm:aspect-[4/5] rounded-[1.5rem] overflow-hidden bg-white flex items-center justify-center">
                                <img src="/images/about-motherhood.webp" loading="lazy" decoding="async" alt="Motherhood inspired photo placeholder" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="hidden w-full h-full items-center justify-center p-8 text-center bg-gradient-to-br from-brand-light/25 to-white">
                                    <div>
                                        <p class="font-serif text-3xl text-brand-charcoal font-bold mb-3">Motherhood Photo</p>
                                        <p class="text-xs uppercase tracking-[0.22em] text-brand-charcoal/50 font-bold">Placeholder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2rem] bg-brand-charcoal text-white p-7 md:p-10 shadow-soft">
                        <div class="grid md:grid-cols-[.78fr_1.22fr] gap-8 items-center">
                            <div class="rounded-[1.5rem] bg-white/8 border border-white/10 p-4">
                                <div class="aspect-[4/4.2] sm:aspect-[4/3] rounded-[1.1rem] overflow-hidden bg-white/10 flex items-center justify-center">
                                    <img src="/images/about-jack-memory.webp" loading="lazy" decoding="async" alt="Personal memory photo placeholder" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="hidden w-full h-full items-center justify-center p-6 text-center">
                                        <div>
                                            <p class="font-serif text-2xl font-bold mb-2">Memory Photo</p>
                                            <p class="text-xs uppercase tracking-[0.2em] text-white/50 font-bold">Optional image</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-light mb-4">Widowhood</p>
                                <h3 class="font-serif text-3xl md:text-4xl font-bold mb-5">Loss changed the way I think about legacy.</h3>
                                <div class="space-y-5 text-white/75 leading-relaxed text-lg">
                                    <p>My daughter was only two months old when my husband, Jack, passed away. That kind of loss changes everything. It makes you painfully aware that time is precious, people matter, and the work we leave behind should mean something.</p>
                                    <p>JindraWebDev is part of how I keep moving forward. It gives me a way to build something steady for my daughter while helping other people build something stronger for their businesses, families, and communities.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2rem] bg-white border border-brand-dark/10 p-7 md:p-10 shadow-card">
                        <h3 class="font-serif text-3xl font-bold text-brand-charcoal mb-5">Why web design?</h3>
                        <div class="space-y-5 text-brand-charcoal/75 leading-relaxed text-lg">
                            <p>I love the mix of creativity and structure. A good website is not just pretty. It organizes information, builds trust, answers questions, and helps people take the next step.</p>
                            <p>I especially love working with small businesses because I know the website is usually more than a website. It is the front door, the first impression, the thing people check before they call, visit, shop, book, or believe you are legitimate.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Beliefs / values -->
        <section class="py-20 md:py-28 bg-white">
            <div class="max-w-7xl mx-auto px-5 md:px-8">
                <div class="grid lg:grid-cols-[1fr_1.4fr] gap-12 lg:gap-16 items-start mb-12">
                    <div>
                        <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">What I believe</p>
                        <h2 class="font-serif text-4xl md:text-5xl font-bold text-brand-charcoal">Small businesses deserve websites that feel honest, useful, and polished.</h2>
                    </div>
                    <p class="text-lg leading-relaxed text-brand-charcoal/75 max-w-3xl">My design style is warm, clean, and grounded, but my process is practical. I care about how your site looks, but I care just as much about whether people can understand it, use it, and trust you because of it.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-5">
                    <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-7">
                        <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">01</div>
                        <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Clear over clever</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed">People should understand what you do and how to work with you without digging.</p>
                    </div>
                    <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-7">
                        <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">02</div>
                        <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Beautiful but useful</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed">A website can be stylish and still be simple, organized, mobile-friendly, and easy to maintain.</p>
                    </div>
                    <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-7">
                        <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">03</div>
                        <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Built with care</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed">I pay attention to the small details because they are often what make a business feel trustworthy.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- More personal, less homepage-like -->
        <section class="pt-14 pb-12 md:py-28 bg-brand-offwhite overflow-hidden">
            <div class="max-w-7xl mx-auto px-5 md:px-8 grid lg:grid-cols-[1.05fr_.95fr] gap-0 lg:gap-16 items-center">
                <div class="relative min-h-[850px] sm:min-h-[780px] lg:min-h-[520px]">
                    <div class="absolute left-0 top-0 w-[78%] sm:w-[72%] lg:w-[68%] rounded-[2rem] bg-white border border-brand-dark/10 p-3 sm:p-4 shadow-soft">
                        <div class="aspect-[3/4.45] sm:aspect-[4/5] rounded-[1.5rem] overflow-hidden bg-brand-cream flex items-center justify-center">
                            <img src="/images/about-workspace.webp" loading="lazy" decoding="async" alt="Workspace photo placeholder" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="hidden w-full h-full items-center justify-center p-8 text-center bg-gradient-to-br from-white to-brand-light/20">
                                <div>
                                    <p class="font-serif text-3xl font-bold mb-3">Workspace</p>
                                    <p class="text-xs uppercase tracking-[0.22em] text-brand-charcoal/50 font-bold">Placeholder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute right-0 top-[445px] sm:top-auto sm:bottom-0 w-[78%] sm:w-[70%] lg:w-[58%] rounded-[2rem] bg-white border border-brand-dark/10 p-3 sm:p-4 shadow-soft">
                        <div class="aspect-[3/4] sm:aspect-[4/4] rounded-[1.5rem] overflow-hidden bg-brand-cream flex items-center justify-center">
                            <img src="/images/about-small-town.webp" loading="lazy" decoding="async" alt="Small town Nebraska photo placeholder" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="hidden w-full h-full items-center justify-center p-8 text-center bg-gradient-to-br from-brand-light/25 to-white">
                                <div>
                                    <p class="font-serif text-3xl font-bold mb-3">Local Life</p>
                                    <p class="text-xs uppercase tracking-[0.22em] text-brand-charcoal/50 font-bold">Placeholder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute right-3 top-0 sm:right-8 sm:top-6 lg:right-8 lg:top-12 rounded-3xl bg-brand-dark text-white p-6 max-w-xs shadow-card z-10">
                        <p class="font-serif text-2xl font-bold mb-2">I build for real life.</p>
                        <p class="text-white/70 leading-relaxed">Busy schedules, real customers, small teams, and businesses that need the website to actually help.</p>
                    </div>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">A little more about me</p>
                    <h2 class="font-serif text-4xl md:text-5xl font-bold text-brand-charcoal mb-7">I’m drawn to meaningful work, good design, local businesses, and stories that matter.</h2>
                    <div class="space-y-5 text-lg leading-relaxed text-brand-charcoal/75">
                        <p>Outside of client work, I’m a mom first. I care about creating a life that feels steady, beautiful, and meaningful for my daughter. That same care carries into my work with clients.</p>
                        <p>I like warm neutrals, thoughtful typography, clean layouts, good coffee shop energy, small-town businesses, community projects, and design that feels polished without feeling cold.</p>
                        <p>I’m not here to make your business sound like everyone else’s. I’m here to help your online presence feel clearer, more credible, and more like you.</p>
                    </div>
                    <div class="mt-8 flex flex-wrap gap-3 text-sm font-bold text-brand-charcoal/70">
                        <span class="rounded-full bg-white border border-brand-dark/10 px-4 py-2">Small-town Nebraska</span>
                        <span class="rounded-full bg-white border border-brand-dark/10 px-4 py-2">Motherhood</span>
                        <span class="rounded-full bg-white border border-brand-dark/10 px-4 py-2">Legacy-minded work</span>
                        <span class="rounded-full bg-white border border-brand-dark/10 px-4 py-2">Warm modern design</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-20 md:py-28 bg-brand-dark text-white">
            <div class="max-w-5xl mx-auto px-5 md:px-8 text-center">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-white/55 mb-5">Ready when you are</p>
                <h2 class="font-serif text-4xl md:text-6xl font-bold mb-7">Let’s build a digital presence that feels like the business you’re becoming.</h2>
                <p class="text-lg md:text-xl leading-relaxed text-white/75 max-w-3xl mx-auto mb-10">Whether you need a one-page website, a full refresh, or someone to help clean up the pieces, I’d love to hear what you’re building.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="mailto:contact@jindrawebdev.com?subject=Website%20Inquiry" class="inline-flex justify-center items-center rounded-full bg-white text-brand-charcoal px-9 py-4 font-bold hover:bg-brand-offwhite transition shadow-soft">Email contact@jindrawebdev.com</a>
                    <a href="tel:4024506563" class="inline-flex justify-center items-center rounded-full border border-white/25 text-white px-9 py-4 font-bold hover:bg-white/10 hover:border-white/50 transition">Call 402-450-6563</a>
                </div>
            </div>
        </section>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/scripts.php";
?>

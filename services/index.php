<?php
$page_title = "Services | JindraWebDev";
$page_description = "Website design, branding, local SEO, digital cleanup, drone footage, and aerial photography for small businesses by Lexis Jindra of JindraWebDev.";
$page_keywords = "JindraWebDev services, Nebraska web design, Omaha web designer, drone footage Nebraska, aerial photography Nebraska, small business web design, local SEO, branding, Lexis Jindra";
$page_url = "https://jindrawebdev.com/services";
$page_robots = "index, follow";
$current_page = "services";

$page_schema = <<<HTML
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "https://jindrawebdev.com/services#webpage",
      "url": "https://jindrawebdev.com/services",
      "name": "Services | JindraWebDev",
      "description": "Website design, branding, local SEO, digital cleanup, drone footage, and aerial photography for small businesses in Omaha and Eastern Nebraska.",
      "isPartOf": { "@id": "https://jindrawebdev.com/#website" },
      "about": { "@id": "https://jindrawebdev.com/#organization" }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://jindrawebdev.com/services#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://jindrawebdev.com/" },
        { "@type": "ListItem", "position": 2, "name": "Services", "item": "https://jindrawebdev.com/services" }
      ]
    },
    {
      "@type": "ItemList",
      "@id": "https://jindrawebdev.com/services#servicelist",
      "name": "JindraWebDev services",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Website design + builds", "url": "https://jindrawebdev.com/services/website-design/" },
        { "@type": "ListItem", "position": 2, "name": "Brand + visual direction" },
        { "@type": "ListItem", "position": 3, "name": "Google + local SEO", "url": "https://jindrawebdev.com/services/local-seo/" },
        { "@type": "ListItem", "position": 4, "name": "Digital cleanup" },
        { "@type": "ListItem", "position": 5, "name": "Drone footage + aerial photography", "url": "https://jindrawebdev.com/services/drone-photography/" }
      ]
    }
  ]
}
</script>
HTML;

include $_SERVER['DOCUMENT_ROOT'] . "/includes/head.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/body-start.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";
?>

<main id="main-content">
        <section class="relative overflow-hidden bg-brand-cream">
            <div class="absolute -top-40 -right-32 w-[34rem] h-[34rem] rounded-full bg-brand-light/25 blur-3xl"></div>
            <div class="absolute top-40 -left-40 w-[28rem] h-[28rem] rounded-full bg-brand-dark/10 blur-3xl"></div>

            <div class="relative max-w-7xl mx-auto px-5 md:px-8 py-16 md:py-24 lg:py-28 grid lg:grid-cols-[1.02fr_.98fr] gap-12 items-center">
                <div>
                    <p class="text-xs uppercase tracking-[0.30em] font-bold text-brand-dark mb-5">JindraWebDev services</p>
                    <h1 class="font-serif text-5xl sm:text-6xl lg:text-7xl font-bold text-brand-charcoal mb-7">
                        Digital support for small businesses ready to look more polished online.
                    </h1>
                    <p class="text-lg md:text-xl leading-relaxed text-brand-charcoal/75 max-w-2xl mb-9">
                        From websites and local SEO to branding, digital cleanup, drone footage, and aerial photography, I help small businesses create a stronger first impression and a clearer path for customers.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-brand-dark text-white px-8 py-4 font-bold hover:bg-brand-charcoal transition shadow-soft">Start a service inquiry</a>
                        <a href="#drone" class="inline-flex justify-center items-center rounded-full bg-white border border-brand-dark/15 text-brand-charcoal px-8 py-4 font-bold hover:border-brand-dark/40 hover:bg-brand-offwhite transition">View drone services</a>
                    </div>
                </div>

                <div class="relative">
                    <div class="rounded-[2rem] bg-white border border-brand-dark/10 p-4 shadow-soft">
                        <div class="aspect-[4/5] rounded-[1.5rem] overflow-hidden bg-brand-offwhite flex items-center justify-center">
                            <img src="/images/services-hero.webp" alt="JindraWebDev services preview" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="hidden w-full h-full items-center justify-center p-10 text-center bg-gradient-to-br from-brand-light/30 to-brand-offwhite">
                                <div>
                                    <p class="font-serif text-3xl text-brand-charcoal font-bold mb-3">Services Photo</p>
                                    <p class="text-sm uppercase tracking-[0.22em] text-brand-charcoal/60 font-bold">Replace with branding image</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-7 -left-4 md:-left-8 bg-white rounded-2xl shadow-card border border-brand-dark/10 p-5 max-w-xs">
                        <p class="font-serif text-xl text-brand-charcoal font-bold mb-2">One partner. Clear next steps.</p>
                        <p class="text-sm leading-relaxed text-brand-charcoal/70">Practical help for the pieces that make your business easier to find, trust, and choose.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 md:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-5 md:px-8">
                <div class="max-w-3xl mb-12">
                    <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Core services</p>
                    <h2 class="font-serif text-4xl md:text-5xl font-bold text-brand-charcoal mb-5">Choose the support that fits where your business is right now.</h2>
                    <p class="text-lg text-brand-charcoal/70 leading-relaxed">These can be built into a larger project or handled as smaller focused updates.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                    <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                        <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">01</div>
                        <h3 class="font-serif text-2xl font-bold mb-3">Website design + builds</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed mb-5">Custom one-page sites, multi-page websites, Shopify, Squarespace, WordPress, and practical website refreshes.</p>
                        <ul class="space-y-2 text-sm text-brand-charcoal/70">
                            <li>✓ Homepage and interior page design</li>
                            <li>✓ Mobile-friendly layouts</li>
                            <li>✓ Clear calls-to-action</li>
                            <li>✓ Launch support</li>
                        </ul>
                        <a href="/services/website-design/" class="mt-6 inline-flex items-center gap-2 text-sm font-bold uppercase tracking-[0.16em] text-brand-dark hover:text-brand-charcoal transition">Website design details <span aria-hidden="true">&rarr;</span></a>
                    </article>

                    <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                        <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">02</div>
                        <h3 class="font-serif text-2xl font-bold mb-3">Brand + visual direction</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed mb-5">A polished visual foundation so your website, social pages, graphics, and customer touchpoints feel consistent.</p>
                        <ul class="space-y-2 text-sm text-brand-charcoal/70">
                            <li>✓ Logo support</li>
                            <li>✓ Color palettes</li>
                            <li>✓ Typography direction</li>
                            <li>✓ Social graphic templates</li>
                        </ul>
                    </article>

                    <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                        <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">03</div>
                        <h3 class="font-serif text-2xl font-bold mb-3">Google + local SEO</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed mb-5">Better search foundations for local customers who are trying to find you, understand you, and contact you.</p>
                        <ul class="space-y-2 text-sm text-brand-charcoal/70">
                            <li>✓ Google Business Profile setup</li>
                            <li>✓ Local keyword structure</li>
                            <li>✓ Metadata and page titles</li>
                            <li>✓ Basic search cleanup</li>
                        </ul>
                        <a href="/services/local-seo/" class="mt-6 inline-flex items-center gap-2 text-sm font-bold uppercase tracking-[0.16em] text-brand-dark hover:text-brand-charcoal transition">Local SEO details <span aria-hidden="true">&rarr;</span></a>
                    </article>

                    <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                        <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">04</div>
                        <h3 class="font-serif text-2xl font-bold mb-3">Digital cleanup</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed mb-5">Support for the scattered pieces that make your online presence feel outdated, inconsistent, or hard to manage.</p>
                        <ul class="space-y-2 text-sm text-brand-charcoal/70">
                            <li>✓ Website edits</li>
                            <li>✓ Social profile cleanup</li>
                            <li>✓ Email graphics</li>
                            <li>✓ Platform organization</li>
                        </ul>
                    </article>

                    <article id="drone" class="rounded-3xl bg-brand-charcoal text-white p-7 border border-brand-charcoal/20 hover:shadow-card transition lg:col-span-2">
                        <div class="w-12 h-12 rounded-2xl bg-white text-brand-dark flex items-center justify-center font-serif text-xl mb-6">05</div>
                        <h3 class="font-serif text-2xl md:text-3xl font-bold mb-3">Drone footage + aerial photography</h3>
                        <p class="text-white/75 leading-relaxed mb-5">Add a stronger visual story to your website, social media, or launch content with drone video clips and aerial photography. This is ideal for farms, local businesses, properties, events, construction, outdoor spaces, and community projects.</p>
                        <div class="grid sm:grid-cols-2 gap-3 text-sm">
                            <div class="rounded-2xl bg-white/8 border border-white/10 p-4">✓ Website hero video clips</div>
                            <div class="rounded-2xl bg-white/8 border border-white/10 p-4">✓ Aerial property photos</div>
                            <div class="rounded-2xl bg-white/8 border border-white/10 p-4">✓ Social media reels and b-roll</div>
                            <div class="rounded-2xl bg-white/8 border border-white/10 p-4">✓ Seasonal and event footage</div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="py-20 md:py-28 bg-brand-cream overflow-hidden">
            <div class="max-w-7xl mx-auto px-5 md:px-8 grid lg:grid-cols-[.88fr_1.12fr] gap-12 lg:gap-16 items-center">
                <div>
                    <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Drone visuals</p>
                    <h2 class="font-serif text-4xl md:text-5xl font-bold text-brand-charcoal mb-6">Show people the view they cannot get from the ground.</h2>
                    <div class="space-y-5 text-lg leading-relaxed text-brand-charcoal/75 mb-8">
                        <p>Drone footage can make a small business, farm, event, or property feel more memorable and professional. It gives your website and social media a custom visual element that stock photos cannot match.</p>
                    </div>
                    <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-brand-dark text-white px-7 py-3.5 font-bold hover:bg-brand-charcoal transition shadow-soft">Ask about drone visuals</a>
                </div>

                <div class="grid sm:grid-cols-2 gap-5 items-stretch">
                    <div class="rounded-[2rem] bg-white border border-brand-dark/10 p-4 shadow-card flex flex-col">
                        <div class="aspect-[9/16] rounded-[1.5rem] overflow-hidden bg-brand-offwhite flex items-center justify-center">
                            <video class="w-full h-full object-cover" controls playsinline poster="/images/drone-video-poster.webp" preload="metadata">
                                <source src="/videos/drone-sample.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <p class="mt-4 text-center text-xs uppercase tracking-[0.22em] font-bold text-brand-charcoal/50">Sample drone video</p>
                    </div>
                    <div class="rounded-[2rem] bg-white border border-brand-dark/10 p-4 shadow-card sm:translate-y-10 flex flex-col h-full">
                        <div class="flex-1 min-h-[28rem] sm:min-h-0 rounded-[1.5rem] overflow-hidden bg-brand-offwhite flex items-center justify-center">
                            <img src="/images/drone-farm-place.webp" alt="Aerial drone photograph of a Nebraska farm place" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="hidden w-full h-full items-center justify-center p-8 text-center bg-gradient-to-br from-brand-light/25 to-white">
                                <div>
                                    <p class="font-serif text-3xl text-brand-charcoal font-bold mb-3">Aerial Photo</p>
                                    <p class="text-xs uppercase tracking-[0.22em] text-brand-charcoal/50 font-bold">Replace with farm place image</p>
                                </div>
                            </div>
                        </div>
                        <p class="mt-4 text-center text-xs uppercase tracking-[0.22em] font-bold text-brand-charcoal/50">Sample aerial photography</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 md:py-28 bg-brand-charcoal text-white">
            <div class="max-w-7xl mx-auto px-5 md:px-8">
                <div class="max-w-3xl mb-12">
                    <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-light mb-4">How projects can work</p>
                    <h2 class="font-serif text-4xl md:text-5xl font-bold mb-5">Start small or build the full digital foundation.</h2>
                    <p class="text-lg text-white/70 leading-relaxed">Every business is different, so services can be packaged around your actual goals.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-5">
                    <article class="rounded-3xl border border-white/10 bg-white/5 p-7">
                        <h3 class="font-serif text-2xl font-bold mb-3">Website starter</h3>
                        <p class="text-white/70 leading-relaxed mb-5">For businesses that need a simple, polished online home with the essentials.</p>
                        <ul class="space-y-2 text-sm text-white/65">
                            <li>✓ One-page or simple multi-page site</li>
                            <li>✓ Mobile-friendly design</li>
                            <li>✓ Contact-focused structure</li>
                        </ul>
                        <a href="/services/drone-photography/" class="mt-6 inline-flex items-center gap-2 text-sm font-bold uppercase tracking-[0.16em] text-brand-dark hover:text-brand-charcoal transition">Drone &amp; aerial details <span aria-hidden="true">&rarr;</span></a>
                    </article>
                    <article class="rounded-3xl border border-white/10 bg-white/5 p-7">
                        <h3 class="font-serif text-2xl font-bold mb-3">Full digital refresh</h3>
                        <p class="text-white/70 leading-relaxed mb-5">For businesses ready to clean up their website, messaging, visuals, and local presence.</p>
                        <ul class="space-y-2 text-sm text-white/65">
                            <li>✓ Website rebuild or refresh</li>
                            <li>✓ Brand direction</li>
                            <li>✓ Google + SEO basics</li>
                        </ul>
                    </article>
                    <article class="rounded-3xl border border-white/10 bg-white/5 p-7">
                        <h3 class="font-serif text-2xl font-bold mb-3">Content add-ons</h3>
                        <p class="text-white/70 leading-relaxed mb-5">For businesses that need stronger visuals or ongoing content support.</p>
                        <ul class="space-y-2 text-sm text-white/65">
                            <li>✓ Drone video clips</li>
                            <li>✓ Aerial photography</li>
                            <li>✓ Social or website graphics</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section class="py-20 md:py-28 bg-white">
            <div class="max-w-7xl mx-auto px-5 md:px-8 grid lg:grid-cols-[.8fr_1.2fr] gap-12 lg:gap-16 items-start">
                <div>
                    <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Process</p>
                    <h2 class="font-serif text-4xl md:text-5xl font-bold text-brand-charcoal mb-6">Clear, organized, and built around what you actually need.</h2>
                    <p class="text-lg leading-relaxed text-brand-charcoal/70">No bloated agency process. Just thoughtful strategy, clean design, and practical next steps.</p>
                </div>
                <div class="space-y-5">
                    <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-7">
                        <p class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-3">Step 01</p>
                        <h3 class="font-serif text-2xl font-bold mb-2">Clarify the goal</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed">We define what you need, what is currently not working, and what should happen when someone lands on your site.</p>
                    </div>
                    <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-7">
                        <p class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-3">Step 02</p>
                        <h3 class="font-serif text-2xl font-bold mb-2">Build the pieces</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed">I design, organize, write or refine content, build the pages, and prepare the visuals that support your goals.</p>
                    </div>
                    <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-7">
                        <p class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-3">Step 03</p>
                        <h3 class="font-serif text-2xl font-bold mb-2">Review, polish, and launch</h3>
                        <p class="text-brand-charcoal/70 leading-relaxed">We review the details, test on mobile, connect the important links, and launch with a stronger digital foundation.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 md:py-28 bg-brand-dark text-white">
            <div class="max-w-5xl mx-auto px-5 md:px-8 text-center">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-light mb-5">Ready for the next step?</p>
                <h2 class="font-serif text-4xl md:text-6xl font-bold mb-7">Let’s make your business easier to find, trust, and choose.</h2>
                <p class="text-lg md:text-xl leading-relaxed text-white/75 max-w-3xl mx-auto mb-10">Send me a note about your business, the service you are interested in, and what you want your online presence to do better.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-white text-brand-dark px-9 py-4 font-bold hover:bg-brand-offwhite transition shadow-soft">Email contact@jindrawebdev.com</a>
                    <a href="tel:4024506563" class="inline-flex justify-center items-center rounded-full border border-white/30 text-white px-9 py-4 font-bold hover:bg-white/10 transition">Call 402-450-6563</a>
                </div>
            </div>
        </section>
    </main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/scripts.php";
?>

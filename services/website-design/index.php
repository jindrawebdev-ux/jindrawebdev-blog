<?php
$page_title = "Website Design Omaha NE | Small Business Web Design | JindraWebDev";
$page_description = "Website design for small businesses in Omaha and Eastern Nebraska. JindraWebDev builds polished, mobile-friendly websites with local SEO foundations and personal strategy.";
$page_keywords = "website design Omaha NE, Omaha web designer, small business web design Omaha, Nebraska web designer, Eastern Nebraska website design, JindraWebDev, Lexis Jindra";
$page_url = "https://jindrawebdev.com/services/website-design/";
$page_image = "https://jindrawebdev.com/images/jindrawebdev-og-image.png";
$page_image_alt = "JindraWebDev website design for small businesses";
$current_page = "services";

$page_schema = <<<HTML
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "https://jindrawebdev.com/services/website-design/#service",
      "name": "Website Design Services",
      "serviceType": "Website Design and Small Business Web Design",
      "provider": {
        "@id": "https://jindrawebdev.com/#organization"
      },
      "areaServed": [
        "Omaha NE",
        "Fremont NE",
        "Blair NE",
        "Hooper NE",
        "Columbus NE",
        "Norfolk NE",
        "Lincoln NE",
        "Wahoo NE",
        "West Point NE",
        "Eastern Nebraska"
      ],
      "description": "Website design for small businesses in Omaha and Eastern Nebraska, including mobile-friendly layouts, SEO foundations, clear website copy, contact forms, and launch support."
    },
    {
      "@type": "WebPage",
      "@id": "https://jindrawebdev.com/services/website-design/#webpage",
      "url": "https://jindrawebdev.com/services/website-design/",
      "name": "Website Design Omaha NE | Small Business Web Design | JindraWebDev",
      "description": "Website design for small businesses in Omaha and Eastern Nebraska. JindraWebDev builds polished, mobile-friendly websites with local SEO foundations and personal strategy.",
      "isPartOf": {
        "@id": "https://jindrawebdev.com/#website"
      },
      "about": {
        "@id": "https://jindrawebdev.com/services/website-design/#service"
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://jindrawebdev.com/services/website-design/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How much does a small business website cost?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Website pricing depends on the number of pages, design needs, content, platform, SEO setup, and extra features."
          }
        },
        {
          "@type": "Question",
          "name": "How long does a website project take?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Timelines depend on the size of the project and how quickly content, photos, and feedback are provided."
          }
        },
        {
          "@type": "Question",
          "name": "Can you redesign my existing website?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. JindraWebDev can help redesign the structure, messaging, layout, and user experience."
          }
        },
        {
          "@type": "Question",
          "name": "Do you build WordPress, Squarespace, Shopify, or custom websites?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. JindraWebDev can help with WordPress, Squarespace, Shopify, and custom-coded websites."
          }
        },
        {
          "@type": "Question",
          "name": "Will my website be optimized for Google?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Every website includes basic SEO foundations such as page titles, meta descriptions, heading structure, mobile-friendly design, image alt text, internal linking, and search-friendly page content."
          }
        }
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

        <div class="relative max-w-7xl mx-auto px-5 md:px-8 pt-12 pb-20 md:pt-16 md:pb-24 lg:pt-[5rem] lg:pb-[6rem] grid lg:grid-cols-[1.05fr_.95fr] gap-10 md:gap-14 items-center">
            <div>
                <div class="inline-flex items-center gap-3 rounded-full bg-white border border-brand-dark/10 px-4 py-2 shadow-card mb-7">
                    <span class="w-2 h-2 rounded-full bg-brand-dark"></span>
                    <p class="text-[11px] uppercase tracking-[0.24em] font-bold text-brand-charcoal/70">Website design Omaha NE</p>
                </div>

                <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl lg:text-7xl leading-[1.26] md:leading-[1.30] text-brand-charcoal font-bold mb-7">
                    Website design for small businesses in Omaha & Eastern Nebraska.
                </h1>

                <p class="text-lg md:text-xl leading-relaxed text-brand-charcoal/75 max-w-2xl mb-9">
                    I build polished, mobile-friendly websites that help small businesses look credible, explain what they offer, and turn online visitors into real inquiries.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-brand-dark text-white px-8 py-4 font-bold hover:bg-brand-charcoal transition shadow-soft">Start your website project</a>
                    <a href="/services" class="inline-flex justify-center items-center rounded-full bg-white border border-brand-dark/15 text-brand-charcoal px-8 py-4 font-bold hover:border-brand-dark/40 hover:bg-brand-offwhite transition">View all services</a>
                </div>

                <div class="grid grid-cols-3 gap-4 max-w-xl text-center sm:text-left">
                    <div>
                        <p class="font-serif text-3xl text-brand-dark font-bold">SEO</p>
                        <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">Foundations</p>
                    </div>
                    <div>
                        <p class="font-serif text-3xl text-brand-dark font-bold">Mobile</p>
                        <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">Responsive</p>
                    </div>
                    <div>
                        <p class="font-serif text-3xl text-brand-dark font-bold">1:1</p>
                        <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">Strategy</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="relative rounded-[2rem] overflow-hidden shadow-soft bg-white border border-brand-dark/10 p-4">
                    <div class="aspect-[4/5] rounded-[1.5rem] overflow-hidden bg-brand-offwhite">
                        <img src="/images/lexis-jindra-website-design.webp" alt="Lexis Jindra working on website design for small businesses" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="absolute -bottom-7 -left-4 md:-left-8 bg-white rounded-2xl shadow-card border border-brand-dark/10 p-5 max-w-xs">
                    <p class="font-serif text-xl text-brand-charcoal font-bold mb-2">Built for real business owners.</p>
                    <p class="text-sm leading-relaxed text-brand-charcoal/70">Simple structure, strong calls-to-action, and a site that finally feels like you.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-white border-y border-brand-dark/10">
        <div class="max-w-7xl mx-auto px-5 md:px-8 grid lg:grid-cols-[.88fr_1.12fr] gap-12 lg:gap-16 items-start">
            <div>
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Why your website matters</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.30] font-bold text-brand-charcoal mb-6">
                    Your website should make it easier for customers to choose you.
                </h2>
            </div>

            <div>
                <p class="text-lg leading-relaxed text-brand-charcoal/75 mb-5">
                    When someone finds your business through Google, Facebook, word of mouth, or a local referral, your website becomes part of their decision. If the site feels outdated, confusing, slow, or incomplete, people hesitate.
                </p>
                <p class="text-lg leading-relaxed text-brand-charcoal/75">
                    I help small businesses create websites that feel polished, easy to understand, and built around the questions customers are already asking.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-cream">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-12">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">What is included</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    Website design with strategy, structure, and search in mind.
                </h2>
                <p class="text-lg text-brand-charcoal/70 leading-relaxed">
                    Every website project is built around your goals, your audience, your services, and the way people search for businesses in Omaha and Eastern Nebraska.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                <article class="rounded-3xl bg-white p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">01</div>
                    <h3 class="font-serif text-2xl leading-[1.25] font-bold mb-3">Custom Website Design</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">A polished website layout created around your brand, content, photos, services, and customer journey.</p>
                </article>

                <article class="rounded-3xl bg-white p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">02</div>
                    <h3 class="font-serif text-2xl leading-[1.25] font-bold mb-3">Mobile-Friendly Layouts</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Responsive pages designed to look clean and work well on phones, tablets, laptops, and desktops.</p>
                </article>

                <article class="rounded-3xl bg-white p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">03</div>
                    <h3 class="font-serif text-2xl leading-[1.25] font-bold mb-3">SEO Foundations</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Page titles, meta descriptions, heading structure, internal links, image alt text, and local search-focused copy.</p>
                </article>

                <article class="rounded-3xl bg-white p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">04</div>
                    <h3 class="font-serif text-2xl leading-[1.25] font-bold mb-3">Clear Website Copy</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Messaging that explains what you do, who you help, where you serve, and why someone should reach out.</p>
                </article>

                <article class="rounded-3xl bg-white p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">05</div>
                    <h3 class="font-serif text-2xl leading-[1.25] font-bold mb-3">Contact Forms + CTAs</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Simple ways for visitors to inquire, request information, schedule a conversation, or take the next step.</p>
                </article>

                <article class="rounded-3xl bg-white p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">06</div>
                    <h3 class="font-serif text-2xl leading-[1.25] font-bold mb-3">Launch Support</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Help with testing, domain setup, hosting guidance, analytics, final polish, and basic post-launch support.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-charcoal text-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8 grid lg:grid-cols-[.95fr_1.05fr] gap-12 lg:gap-16 items-center">
            <div class="rounded-[2rem] overflow-hidden bg-white/5 border border-white/10 p-4 shadow-soft">
                <div class="aspect-[4/3] rounded-[1.5rem] overflow-hidden bg-white/10">
                    <img src="/images/website-design-process.webp" alt="Website design planning and development process" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-light mb-4">Simple process</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold mb-5">
                    A clear path from “I need a website” to “this finally feels right.”
                </h2>
                <p class="text-lg text-white/70 leading-relaxed mb-8">
                    You do not need to know exactly what your website should say or look like before reaching out. I help organize the pieces.
                </p>

                <div class="space-y-4">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                        <h3 class="font-serif text-2xl font-bold mb-2">1. Clarify</h3>
                        <p class="text-white/70 leading-relaxed">We talk through your business, goals, audience, services, current website, and what needs to improve.</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                        <h3 class="font-serif text-2xl font-bold mb-2">2. Design + build</h3>
                        <p class="text-white/70 leading-relaxed">I plan the structure, refine the content, design the layout, and build responsive pages.</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                        <h3 class="font-serif text-2xl font-bold mb-2">3. Launch + support</h3>
                        <p class="text-white/70 leading-relaxed">We review, polish, test, connect important links, and launch with a stronger digital foundation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8 grid lg:grid-cols-[.85fr_1.15fr] gap-12 lg:gap-16 items-start">
            <div>
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Who I work with</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.30] font-bold text-brand-charcoal mb-6">
                    Websites for small businesses, local organizations, and service providers.
                </h2>
                <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-brand-dark text-white px-7 py-3.5 font-bold hover:bg-brand-charcoal transition shadow-soft mt-2">Ask about your project</a>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-6">
                    <h3 class="font-serif text-2xl font-bold mb-3">Service businesses</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Contractors, construction companies, trades, repair services, consultants, and local providers.</p>
                </div>

                <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-6">
                    <h3 class="font-serif text-2xl font-bold mb-3">Local shops + restaurants</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Retail, food businesses, boutiques, cafes, wellness brands, and community-based storefronts.</p>
                </div>

                <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-6">
                    <h3 class="font-serif text-2xl font-bold mb-3">Community projects</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Events, nonprofits, committees, organizations, celebrations, and local groups.</p>
                </div>

                <div class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-6">
                    <h3 class="font-serif text-2xl font-bold mb-3">Growing brands</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Businesses ready to look more established, professional, and easy to find online.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-cream">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-12">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Service area</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    Website design serving Omaha, Eastern Nebraska, and small-town businesses.
                </h2>
                <p class="text-lg text-brand-charcoal/70 leading-relaxed">
                    JindraWebDev works with businesses throughout Omaha, Fremont, Blair, Hooper, Columbus, Norfolk, Lincoln, Wahoo, West Point, and surrounding communities.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <span class="rounded-full bg-white border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70">Omaha</span>
                <span class="rounded-full bg-white border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70">Fremont</span>
                <span class="rounded-full bg-white border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70">Blair</span>
                <span class="rounded-full bg-white border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70">Hooper</span>
                <span class="rounded-full bg-white border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70">Columbus</span>
                <span class="rounded-full bg-white border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70">Norfolk</span>
                <span class="rounded-full bg-white border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70">Lincoln</span>
                <span class="rounded-full bg-white border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70">Wahoo</span>
                <span class="rounded-full bg-white border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70">West Point</span>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-4xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-10">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">FAQs</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    Common website design questions.
                </h2>
            </div>

            <div class="space-y-4">
                <details class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">How much does a small business website cost?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Website pricing depends on the number of pages, design needs, content, platform, SEO setup, and extra features.</p>
                </details>

                <details class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">How long does a website project take?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Timelines depend on the size of the project and how quickly content, photos, and feedback are provided.</p>
                </details>

                <details class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Can you redesign my existing website?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Yes. I can help redesign the structure, messaging, layout, and user experience.</p>
                </details>

                <details class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Do you build WordPress, Squarespace, Shopify, or custom websites?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Yes. I can help with WordPress, Squarespace, Shopify, and custom-coded websites.</p>
                </details>

                <details class="rounded-3xl bg-brand-cream border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Will my website be optimized for Google?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Every website includes basic SEO foundations such as page titles, meta descriptions, heading structure, mobile-friendly design, image alt text, internal linking, and search-friendly page content.</p>
                </details>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-dark text-white">
        <div class="max-w-5xl mx-auto px-5 md:px-8 text-center">
            <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-light mb-5">Ready for a better website?</p>
            <h2 class="font-serif text-4xl md:text-6xl leading-[1.34] font-bold mb-7">
                Let’s build a website that helps your business look credible and get found.
            </h2>
            <p class="text-lg md:text-xl leading-relaxed text-white/75 max-w-3xl mx-auto mb-10">
                Send me a quick note about your business, your current website, and what you want your online presence to do better.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-white text-brand-dark px-9 py-4 font-bold hover:bg-brand-offwhite transition shadow-soft">Start your project</a>
                <a href="tel:4024506563" class="inline-flex justify-center items-center rounded-full border border-white/30 text-white px-9 py-4 font-bold hover:bg-white/10 transition">Call 402-450-6563</a>
            </div>
        </div>
    </section>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/scripts.php";
?>
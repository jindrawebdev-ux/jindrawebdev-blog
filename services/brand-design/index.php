<?php
/**
 * Brand + visual direction — service landing page.
 *
 * Targets "brand design Omaha NE", "logo design Nebraska", "small business
 * branding Omaha". Positioned against the two common alternatives a small
 * business actually weighs: a $50 marketplace logo, or nothing at all.
 *
 * City chips are plain text, not links — the /locations/{city}/ pages the
 * older service pages pointed at do not exist.
 */
$page_title = "Brand & Logo Design Omaha NE | Small Business Branding | JindraWebDev";
$page_description = "Logo design, color palettes, and visual direction for small businesses in Omaha and Eastern Nebraska, so your website, signage, and social pages finally look like one business.";
$page_keywords = "brand design Omaha NE, logo design Nebraska, small business branding Omaha, visual identity Eastern Nebraska, brand refresh Fremont NE, JindraWebDev, Lexis Jindra";
$page_url = "https://jindrawebdev.com/services/brand-design/";
$page_robots = "index, follow";
$current_page = "services";

$page_schema = <<<HTML
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "https://jindrawebdev.com/services/brand-design/#service",
      "name": "Brand and Visual Direction",
      "serviceType": "Logo design, brand identity and visual direction",
      "provider": { "@id": "https://jindrawebdev.com/#organization" },
      "areaServed": [
        "Omaha NE", "Fremont NE", "Blair NE", "Hooper NE", "Scribner NE",
        "Uehling NE", "Dodge NE", "North Bend NE", "Columbus NE",
        "West Point NE", "Wahoo NE", "Lincoln NE", "Eastern Nebraska"
      ],
      "description": "Logo support, color palettes, typography direction, and social templates for small businesses in Omaha and Eastern Nebraska."
    },
    {
      "@type": "WebPage",
      "@id": "https://jindrawebdev.com/services/brand-design/#webpage",
      "url": "https://jindrawebdev.com/services/brand-design/",
      "name": "Brand & Logo Design Omaha NE | Small Business Branding | JindraWebDev",
      "description": "Logo design, color palettes, and visual direction for small businesses in Omaha and Eastern Nebraska.",
      "isPartOf": { "@id": "https://jindrawebdev.com/#website" },
      "about": { "@id": "https://jindrawebdev.com/services/brand-design/#service" }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://jindrawebdev.com/services/brand-design/#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://jindrawebdev.com/" },
        { "@type": "ListItem", "position": 2, "name": "Services", "item": "https://jindrawebdev.com/services" },
        { "@type": "ListItem", "position": 3, "name": "Brand Design", "item": "https://jindrawebdev.com/services/brand-design/" }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://jindrawebdev.com/services/brand-design/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Do I need a whole rebrand, or just a logo?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Most small businesses need less than they expect. If your logo is fine but your website, signage, and social pages all use different colors and fonts, the problem is consistency rather than the logo. That is a much smaller piece of work."
          }
        },
        {
          "@type": "Question",
          "name": "What is wrong with a cheap online logo?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Usually nothing, right up until you need it somewhere new. Marketplace logos often arrive as a single low-resolution file with no transparent version, no simplified mark for small sizes, and no color codes, so every future sign, shirt, or web header becomes a fresh problem."
          }
        },
        {
          "@type": "Question",
          "name": "What files will I actually receive?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Your logo in the formats real vendors ask for: scalable vector files for signage and embroidery, transparent PNGs for the web, a horizontal and a stacked arrangement, and a simplified mark for small spaces. Plus your exact color codes and font names in writing."
          }
        },
        {
          "@type": "Question",
          "name": "Can you work with the logo I already have?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, and often that is the right call. If there is recognition built up in your current mark, keeping it and building a consistent palette, typography, and layout system around it preserves that while fixing how scattered everything looks."
          }
        },
        {
          "@type": "Question",
          "name": "How does this connect to my website?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Directly. Brand work done alongside a website means the colors, type, and spacing are decided once and applied consistently, rather than a designer handing off files and a developer reinterpreting them."
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

        <div class="relative max-w-4xl mx-auto px-5 md:px-8 pt-12 pb-20 md:pt-16 md:pb-24 lg:pt-[5rem] lg:pb-[6rem]">
            <div class="inline-flex items-center gap-3 rounded-full bg-white border border-brand-dark/10 px-4 py-2 shadow-card mb-7">
                <span class="w-2 h-2 rounded-full bg-brand-dark"></span>
                <p class="text-[11px] uppercase tracking-[0.24em] font-bold text-brand-charcoal/70">Brand &amp; logo design Omaha NE</p>
            </div>

            <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl lg:text-7xl leading-[1.26] md:leading-[1.30] text-brand-charcoal font-bold mb-7">
                A visual identity that makes your business look like one business.
            </h1>

            <p class="text-lg md:text-xl leading-relaxed text-brand-charcoal/75 max-w-2xl mb-9">
                Logo, colors, and typography decided once and applied everywhere &mdash; so your website, your Facebook page, your invoices, and the sign on your door finally agree with each other.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mb-10">
                <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-brand-dark text-white px-8 py-4 font-bold hover:bg-brand-charcoal transition shadow-soft">Start a brand project</a>
                <a href="/services" class="inline-flex justify-center items-center rounded-full bg-white border border-brand-dark/15 text-brand-charcoal px-8 py-4 font-bold hover:border-brand-dark/40 hover:bg-brand-offwhite transition">View all services</a>
            </div>

            <div class="grid grid-cols-3 gap-4 max-w-xl text-center sm:text-left">
                <div>
                    <p class="font-serif text-3xl text-brand-dark font-bold">Logo</p>
                    <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">Every format</p>
                </div>
                <div>
                    <p class="font-serif text-3xl text-brand-dark font-bold">Color</p>
                    <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">&amp; type</p>
                </div>
                <div>
                    <p class="font-serif text-3xl text-brand-dark font-bold">Ready</p>
                    <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">To hand out</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-12">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Why it matters</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    Inconsistency reads as &ldquo;small&rdquo; even when the work is excellent.
                </h2>
                <p class="text-lg text-brand-charcoal/70 leading-relaxed">
                    A customer sees your Facebook page, then your website, then your truck, then an invoice. If those four look like four different companies, they quietly adjust their sense of how established you are &mdash; usually without noticing they did it. Consistency is the cheapest credibility available to a small business.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">01</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Logo design or refresh</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">A new mark, or a cleanup of the one you have &mdash; keeping whatever recognition you have already built rather than discarding it.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">02</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Every file you will need</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Vector files for signage and embroidery, transparent PNGs for the web, horizontal and stacked versions, and a simplified mark for small spaces.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">03</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Color palette</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">A working set of colors with the exact codes written down, so a printer, a sign shop, and your website all produce the same shade.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">04</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Typography direction</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">A headline face and a body face that read well on a phone, with clear rules for which to use where so choices stop being made ad hoc.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">05</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Social templates</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Editable layouts for the posts you actually make &mdash; hours, promotions, announcements &mdash; so posting does not mean designing from scratch every time.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">06</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">A short brand guide</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">A few pages you can forward to anyone who makes something for you. Not a fifty-page document nobody opens.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-offwhite">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-12">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">How it works</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal">
                    Three steps, and you keep everything at the end.
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-5">
                <div class="rounded-3xl bg-white p-7 border border-brand-dark/10">
                    <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">1. Understand</div>
                    <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Who you serve, and how you want to feel</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">A conversation about your customers and what you want them to think when they see your name. Not a mood board exercise.</p>
                </div>
                <div class="rounded-3xl bg-white p-7 border border-brand-dark/10">
                    <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">2. Design</div>
                    <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">A focused set of directions</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">A small number of considered options rather than dozens of variations, then refinement on the one that fits.</p>
                </div>
                <div class="rounded-3xl bg-white p-7 border border-brand-dark/10">
                    <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">3. Hand over</div>
                    <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Files, codes, and a short guide</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Everything organised and labelled, so you can hand a sign shop or printer exactly what they ask for without coming back to me.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-10">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Service area</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    Brand design serving Omaha, Fremont, and Eastern Nebraska.
                </h2>
                <p class="text-lg text-brand-charcoal/70 leading-relaxed">
                    Brand work happens largely over calls and shared files, so location matters less here than on other services &mdash; but being nearby means we can meet if that is easier.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <?php foreach (['Omaha', 'Fremont', 'Blair', 'Hooper', 'Scribner', 'Uehling', 'Dodge', 'North Bend', 'Columbus', 'West Point', 'Wahoo', 'Lincoln'] as $city): ?>
                <span class="rounded-full bg-brand-cream border border-brand-dark/10 px-5 py-3 text-sm font-bold text-brand-charcoal/70"><?php echo $city; ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-offwhite">
        <div class="max-w-4xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-10">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">FAQs</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    Common brand design questions.
                </h2>
            </div>

            <div class="space-y-4">
                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Do I need a whole rebrand, or just a logo?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Most small businesses need less than they expect. If your logo is fine but your website, signage, and social pages all use different colors and fonts, the problem is consistency rather than the logo &mdash; and that is a much smaller piece of work.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">What is wrong with a cheap online logo?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Usually nothing &mdash; right up until you need it somewhere new. Marketplace logos often arrive as one low-resolution file with no transparent version, no simplified mark for small sizes, and no color codes. Every future sign, shirt, or web header then becomes a fresh problem.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">What files will I actually receive?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Your logo in the formats real vendors ask for: scalable vector files for signage and embroidery, transparent PNGs for the web, horizontal and stacked arrangements, and a simplified mark for small spaces &mdash; plus your exact color codes and font names in writing.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Can you work with the logo I already have?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Yes, and often that is the right call. If there is recognition built up in your current mark, keeping it and building a consistent palette and typography system around it preserves that while fixing how scattered everything looks.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">How does this connect to my website?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Directly. Brand work done alongside a website means colors, type, and spacing get decided once and applied consistently, rather than a designer handing off files and a developer reinterpreting them. See <a href="/services/website-design/" class="text-brand-dark underline hover:text-brand-charcoal">website design</a>.</p>
                </details>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-dark text-white">
        <div class="max-w-5xl mx-auto px-5 md:px-8 text-center">
            <p class="text-xs uppercase tracking-[0.28em] font-bold text-white/55 mb-5">Ready when you are</p>
            <h2 class="font-serif text-4xl md:text-6xl leading-[1.2] font-bold mb-7">Let&rsquo;s make everything look like it belongs together.</h2>
            <p class="text-lg md:text-xl leading-relaxed text-white/75 max-w-3xl mx-auto mb-10">
                Send me what you have now &mdash; a logo, a Facebook page, a photo of your sign &mdash; and I will tell you honestly whether you need a rebrand or just some tidying up.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-white text-brand-charcoal px-9 py-4 font-bold hover:bg-brand-offwhite transition shadow-soft">Start an inquiry</a>
                <a href="tel:4024506563" class="inline-flex justify-center items-center rounded-full border border-white/25 text-white px-9 py-4 font-bold hover:bg-white/10 hover:border-white/50 transition">Call 402-450-6563</a>
            </div>
        </div>
    </section>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/scripts.php";
?>

<?php
/**
 * Digital cleanup — service landing page.
 *
 * "Digital cleanup" is an internal service name, not something anyone
 * searches for. The title and copy target what people actually type when
 * they have this problem: "update my business website", "fix outdated
 * website", "business information wrong on Google". The service name is
 * kept as the section label so it still matches the services hub.
 *
 * City chips are plain text, not links — the /locations/{city}/ pages the
 * older service pages pointed at do not exist.
 */
$page_title = "Update an Outdated Business Website | Digital Cleanup Omaha NE | JindraWebDev";
$page_description = "Fix an outdated website, wrong business hours on Google, and scattered social profiles. Digital cleanup for small businesses in Omaha and Eastern Nebraska, without starting over.";
$page_keywords = "update outdated website Omaha, fix business website Nebraska, wrong hours on Google, business listing cleanup Omaha NE, website maintenance Eastern Nebraska, JindraWebDev, Lexis Jindra";
$page_url = "https://jindrawebdev.com/services/digital-cleanup/";
$page_robots = "index, follow";
$current_page = "services";

$page_schema = <<<HTML
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "https://jindrawebdev.com/services/digital-cleanup/#service",
      "name": "Digital Cleanup",
      "serviceType": "Website updates, listing corrections and online presence cleanup",
      "provider": { "@id": "https://jindrawebdev.com/#organization" },
      "areaServed": [
        "Omaha NE", "Fremont NE", "Blair NE", "Hooper NE", "Scribner NE",
        "Uehling NE", "Dodge NE", "North Bend NE", "Columbus NE",
        "West Point NE", "Wahoo NE", "Lincoln NE", "Eastern Nebraska"
      ],
      "description": "Website edits, outdated content fixes, business listing corrections, and social profile cleanup for small businesses in Omaha and Eastern Nebraska."
    },
    {
      "@type": "WebPage",
      "@id": "https://jindrawebdev.com/services/digital-cleanup/#webpage",
      "url": "https://jindrawebdev.com/services/digital-cleanup/",
      "name": "Update an Outdated Business Website | Digital Cleanup Omaha NE | JindraWebDev",
      "description": "Fix an outdated website, wrong business hours on Google, and scattered social profiles, without starting over.",
      "isPartOf": { "@id": "https://jindrawebdev.com/#website" },
      "about": { "@id": "https://jindrawebdev.com/services/digital-cleanup/#service" }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://jindrawebdev.com/services/digital-cleanup/#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://jindrawebdev.com/" },
        { "@type": "ListItem", "position": 2, "name": "Services", "item": "https://jindrawebdev.com/services" },
        { "@type": "ListItem", "position": 3, "name": "Digital Cleanup", "item": "https://jindrawebdev.com/services/digital-cleanup/" }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://jindrawebdev.com/services/digital-cleanup/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Do I need a new website, or just an update?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Often just an update. If the structure works and it only looks dated or has wrong information, editing is far cheaper and faster than rebuilding. A rebuild makes sense when the site is not mobile-friendly, cannot be edited, or is on a platform that is no longer supported."
          }
        },
        {
          "@type": "Question",
          "name": "I do not have the login for my own website. Can you still help?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Usually yes. This is extremely common, especially when a site was built years ago by someone who has since moved on. There are ways to trace where a domain and site are hosted and recover access, and that is often the first thing worth sorting out."
          }
        },
        {
          "@type": "Question",
          "name": "My hours are wrong on Google. How do I fix that?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Through your Google Business Profile rather than your website. If nobody has claimed the listing, it may need to be claimed and verified first. Wrong hours are worth fixing quickly because customers act on them before they ever reach your site."
          }
        },
        {
          "@type": "Question",
          "name": "Can you clean things up without changing the design?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Plenty of cleanup work is corrections rather than redesign: updating a copyright year, replacing an expired promotion, fixing broken links, or correcting a phone number that appears differently in three places."
          }
        },
        {
          "@type": "Question",
          "name": "How do I know what actually needs fixing?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "That is the first step. A review of your site, your Google listing, and your social profiles produces a plain-language list of what is wrong, ordered by how much it is likely costing you. You can act on that list yourself if you prefer."
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
                <p class="text-[11px] uppercase tracking-[0.24em] font-bold text-brand-charcoal/70">Digital cleanup Omaha NE</p>
            </div>

            <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl lg:text-7xl leading-[1.26] md:leading-[1.30] text-brand-charcoal font-bold mb-7">
                Your website is not broken. It is just out of date.
            </h1>

            <p class="text-lg md:text-xl leading-relaxed text-brand-charcoal/75 max-w-2xl mb-9">
                Old hours on Google, a copyright year from three years ago, a promotion that ended, a phone number that appears three different ways. None of it is a crisis &mdash; and all of it quietly signals you might not still be in business.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mb-10">
                <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-brand-dark text-white px-8 py-4 font-bold hover:bg-brand-charcoal transition shadow-soft">Ask for a cleanup review</a>
                <a href="/services" class="inline-flex justify-center items-center rounded-full bg-white border border-brand-dark/15 text-brand-charcoal px-8 py-4 font-bold hover:border-brand-dark/40 hover:bg-brand-offwhite transition">View all services</a>
            </div>

            <div class="grid grid-cols-3 gap-4 max-w-xl text-center sm:text-left">
                <div>
                    <p class="font-serif text-3xl text-brand-dark font-bold">No</p>
                    <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">Rebuild needed</p>
                </div>
                <div>
                    <p class="font-serif text-3xl text-brand-dark font-bold">Small</p>
                    <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">Focused jobs</p>
                </div>
                <div>
                    <p class="font-serif text-3xl text-brand-dark font-bold">Plain</p>
                    <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">English</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-12">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">What gets fixed</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    The scattered pieces, sorted out one at a time.
                </h2>
                <p class="text-lg text-brand-charcoal/70 leading-relaxed">
                    Most of this is not design work. It is the accumulated drift of a business that has been busy running itself &mdash; and it is usually fixable in hours rather than weeks.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">01</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Outdated website content</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Old prices, expired promotions, staff who have moved on, a copyright year that gives away how long it has been.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">02</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Wrong details on Google</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Hours, phone number, address, or category errors on the listing customers check before they ever visit your website.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">03</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Broken links and forms</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Contact forms that quietly stopped sending, links to pages that no longer exist, buttons that go nowhere.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">04</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Scattered social profiles</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Different logos, different hours, an abandoned account still showing up in search ahead of the one you actually use.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">05</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Lost access</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Nobody knows who owns the domain, where the site is hosted, or how to log in. Common, and usually recoverable.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">06</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Slow, heavy pages</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Enormous photos uploaded straight from a phone, which is the single most common reason a small business site feels slow.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-offwhite">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-12">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">How it works</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal">
                    A list first, so you can decide what is worth doing.
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-5">
                <div class="rounded-3xl bg-white p-7 border border-brand-dark/10">
                    <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">1. Review</div>
                    <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">I look at everything</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Website, Google listing, social profiles. You get a plain-language list of what is wrong, ordered by what is likely costing you most.</p>
                </div>
                <div class="rounded-3xl bg-white p-7 border border-brand-dark/10">
                    <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">2. You choose</div>
                    <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Pick what to fix</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Take the whole list or the top three. Some clients handle a few themselves once they know what to look for, which is fine.</p>
                </div>
                <div class="rounded-3xl bg-white p-7 border border-brand-dark/10">
                    <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">3. Fixed</div>
                    <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Sorted, and written down</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">The work gets done, and you get a note of what changed and where things live &mdash; so nobody is locked out again next time.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-10">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Service area</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    Digital cleanup serving Omaha, Fremont, and Eastern Nebraska.
                </h2>
                <p class="text-lg text-brand-charcoal/70 leading-relaxed">
                    Most of this work happens remotely, so distance is rarely an obstacle &mdash; but for local businesses it often helps to sit down together and go through the list in person.
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
                    Common digital cleanup questions.
                </h2>
            </div>

            <div class="space-y-4">
                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Do I need a new website, or just an update?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Often just an update. If the structure works and it only looks dated or has wrong information, editing is far cheaper and faster than rebuilding. A rebuild makes sense when the site is not mobile-friendly, cannot be edited, or sits on a platform that is no longer supported. See <a href="/services/website-design/" class="text-brand-dark underline hover:text-brand-charcoal">website design</a> if it turns out to be that.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">I do not have the login for my own website. Can you still help?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Usually yes, and this is extremely common &mdash; especially when a site was built years ago by someone who has since moved on. There are ways to trace where a domain and site are hosted and recover access, and that is often the first thing worth sorting out.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">My hours are wrong on Google. How do I fix that?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Through your Google Business Profile rather than your website. If nobody has claimed the listing, it may need claiming and verifying first. Worth fixing quickly, because customers act on those hours before they ever reach your site. See <a href="/services/local-seo/" class="text-brand-dark underline hover:text-brand-charcoal">local SEO</a>.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Can you clean things up without changing the design?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Yes. Plenty of this is corrections rather than redesign &mdash; updating a copyright year, replacing an expired promotion, fixing broken links, or correcting a phone number that appears differently in three places.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">How do I know what actually needs fixing?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">That is the first step. A review of your site, Google listing, and social profiles produces a plain-language list ordered by what is likely costing you most. You are welcome to act on that list yourself if you prefer.</p>
                </details>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-dark text-white">
        <div class="max-w-5xl mx-auto px-5 md:px-8 text-center">
            <p class="text-xs uppercase tracking-[0.28em] font-bold text-white/55 mb-5">Ready when you are</p>
            <h2 class="font-serif text-4xl md:text-6xl leading-[1.2] font-bold mb-7">Let&rsquo;s find out what is actually out of date.</h2>
            <p class="text-lg md:text-xl leading-relaxed text-white/75 max-w-3xl mx-auto mb-10">
                Send me your website address and I will tell you what I find &mdash; including the things you can fix yourself in ten minutes.
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

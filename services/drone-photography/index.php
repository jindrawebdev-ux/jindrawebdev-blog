<?php
/**
 * Drone footage + aerial photography — service landing page.
 *
 * Targets a far less contested set of queries than "web design Omaha":
 * "drone photography Nebraska", "aerial photography Omaha NE", "drone
 * real estate photography Nebraska". Very few web designers also fly,
 * which is the whole argument for this page existing.
 *
 * NOTE: city chips below are plain text, NOT links. The other two service
 * pages link to /locations/{city}/ pages that do not exist on the server —
 * 24 dead links between them. Deliberately not repeating that here.
 *
 * FAA Part 107: certification is scheduled for September 2026, so the FAQ
 * states that plainly rather than implying it is already held. Commercial
 * drone flight in the US requires it; the page should not read as though
 * paid work can be delivered before then.
 */
$page_title = "Drone Photography & Aerial Video Omaha NE | JindraWebDev";
$page_description = "Drone footage and aerial photography for small businesses, properties, and community events in Omaha and Eastern Nebraska. Delivered ready for your website and social media.";
$page_keywords = "drone photography Omaha NE, aerial photography Nebraska, drone video Eastern Nebraska, real estate drone photography Nebraska, aerial footage Fremont NE, JindraWebDev, Lexis Jindra";
$page_url = "https://jindrawebdev.com/services/drone-photography/";
$page_robots = "index, follow";
$current_page = "services";

$page_schema = <<<HTML
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "https://jindrawebdev.com/services/drone-photography/#service",
      "name": "Drone Footage and Aerial Photography",
      "serviceType": "Aerial photography and drone videography",
      "provider": { "@id": "https://jindrawebdev.com/#organization" },
      "areaServed": [
        "Omaha NE", "Fremont NE", "Blair NE", "Hooper NE", "Scribner NE",
        "Uehling NE", "Dodge NE", "North Bend NE", "Columbus NE",
        "West Point NE", "Wahoo NE", "Lincoln NE", "Eastern Nebraska"
      ],
      "description": "Drone footage and aerial photography for small businesses, properties, construction progress, and community events in Omaha and Eastern Nebraska, delivered web-ready."
    },
    {
      "@type": "WebPage",
      "@id": "https://jindrawebdev.com/services/drone-photography/#webpage",
      "url": "https://jindrawebdev.com/services/drone-photography/",
      "name": "Drone Photography & Aerial Video Omaha NE | JindraWebDev",
      "description": "Drone footage and aerial photography for small businesses and community events in Omaha and Eastern Nebraska.",
      "isPartOf": { "@id": "https://jindrawebdev.com/#website" },
      "about": { "@id": "https://jindrawebdev.com/services/drone-photography/#service" }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://jindrawebdev.com/services/drone-photography/#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://jindrawebdev.com/" },
        { "@type": "ListItem", "position": 2, "name": "Services", "item": "https://jindrawebdev.com/services" },
        { "@type": "ListItem", "position": 3, "name": "Drone Photography", "item": "https://jindrawebdev.com/services/drone-photography/" }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://jindrawebdev.com/services/drone-photography/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What does drone footage cost for a small business?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Cost depends on how long the shoot takes, how much editing is involved, and whether you need stills, video, or both. A single property or storefront shoot is far less involved than ongoing construction progress coverage, so it is worth describing what you have in mind."
          }
        },
        {
          "@type": "Question",
          "name": "How do I use drone photos on my website?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Aerial shots work best as a homepage header, a section break, or a location page image, because the wide framing suits full-width layouts. Files are delivered already sized and compressed for the web, so they do not slow your pages down."
          }
        },
        {
          "@type": "Question",
          "name": "What kind of weather do you need to fly?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Drones need reasonably calm, dry conditions, so shoots are scheduled with weather in mind and occasionally moved. Overcast days often produce better results than bright midday sun, which creates harsh shadows across roofs and parking lots."
          }
        },
        {
          "@type": "Question",
          "name": "Can you photograph a property I am selling or renting?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Aerial views show lot lines, acreage, outbuildings, and how a property sits relative to roads and neighbours, which ground-level photos cannot convey. This is especially useful for rural and acreage listings in Eastern Nebraska."
          }
        },
        {
          "@type": "Question",
          "name": "Are you FAA certified to fly commercially?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "I am testing for my FAA Part 107 Remote Pilot Certificate in September 2026 and am booking commercial drone work from that point forward. Commercial flights in the United States require that certification."
          }
        },
        {
          "@type": "Question",
          "name": "Do you also handle the website the footage goes on?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, and that is usually the point. Aerial footage is most valuable when someone places it deliberately, sizes it properly, and builds the page around it, rather than handing over a folder of large files for someone else to figure out."
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
            <div>
                <div class="inline-flex items-center gap-3 rounded-full bg-white border border-brand-dark/10 px-4 py-2 shadow-card mb-7">
                    <span class="w-2 h-2 rounded-full bg-brand-dark"></span>
                    <p class="text-[11px] uppercase tracking-[0.24em] font-bold text-brand-charcoal/70">Drone &amp; aerial photography Omaha NE</p>
                </div>

                <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl lg:text-7xl leading-[1.26] md:leading-[1.30] text-brand-charcoal font-bold mb-7">
                    Drone footage and aerial photography for Nebraska businesses.
                </h1>

                <p class="text-lg md:text-xl leading-relaxed text-brand-charcoal/75 max-w-2xl mb-9">
                    Show people the scale of your property, the progress on your build, or the character of your town &mdash; from a view they cannot get from the ground. Delivered ready to drop straight onto your website and social pages.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <a href="/contact#contact-form" class="inline-flex justify-center items-center rounded-full bg-brand-dark text-white px-8 py-4 font-bold hover:bg-brand-charcoal transition shadow-soft">Ask about a drone shoot</a>
                    <a href="/services" class="inline-flex justify-center items-center rounded-full bg-white border border-brand-dark/15 text-brand-charcoal px-8 py-4 font-bold hover:border-brand-dark/40 hover:bg-brand-offwhite transition">View all services</a>
                </div>

                <div class="grid grid-cols-3 gap-4 max-w-xl text-center sm:text-left">
                    <div>
                        <p class="font-serif text-3xl text-brand-dark font-bold">Stills</p>
                        <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">&amp; video</p>
                    </div>
                    <div>
                        <p class="font-serif text-3xl text-brand-dark font-bold">Web</p>
                        <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">Ready files</p>
                    </div>
                    <div>
                        <p class="font-serif text-3xl text-brand-dark font-bold">Local</p>
                        <p class="text-xs uppercase tracking-[0.18em] text-brand-charcoal/60 font-bold">Eastern NE</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-12">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Why aerial</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    Some things about a business simply cannot be photographed from the sidewalk.
                </h2>
                <p class="text-lg text-brand-charcoal/70 leading-relaxed">
                    Acreage, layout, how a building sits on its lot, the scale of a project, the look of a whole main street. An aerial view answers questions a customer did not know how to ask, and it makes a small business look considerably more established than a phone snapshot of a storefront.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">01</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Property &amp; acreage</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Lot lines, outbuildings, road access, and how the land actually lays &mdash; the things buyers and renters ask about first, especially on rural listings.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">02</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Construction progress</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Repeat visits over the life of a build give you a progress record for clients, a portfolio of finished work, and steady content to post along the way.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">03</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Business &amp; storefront</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">A wide establishing shot of your building, lot, and surroundings that works as a homepage header instead of a stock photo of somewhere else.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">04</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Events &amp; community</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Fairs, parades, ball fields, festivals, and community projects &mdash; the shots that show turnout and scale in a way ground photos never manage.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">05</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Agriculture &amp; land</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Fields, operations, equipment, and facilities photographed at a scale that suits how much ground an operation actually covers.</p>
                </article>

                <article class="rounded-3xl bg-brand-cream p-7 border border-brand-dark/10 hover:shadow-card transition">
                    <div class="w-12 h-12 rounded-2xl bg-brand-dark text-white flex items-center justify-center font-serif text-xl mb-6">06</div>
                    <h3 class="font-serif text-2xl font-bold mb-3">Web-ready delivery</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Files arrive cropped, sized, and compressed for the web, not as a folder of enormous originals that would slow your site to a crawl.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-offwhite">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-12">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">How it works</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal">
                    A simple process, planned around weather and what you actually need.
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-5">
                <div class="rounded-3xl bg-white p-7 border border-brand-dark/10">
                    <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">1. Plan</div>
                    <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Decide what the shots are for</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">A homepage header, a property listing, and a social reel need different framing. Knowing the destination first avoids a second trip.</p>
                </div>
                <div class="rounded-3xl bg-white p-7 border border-brand-dark/10">
                    <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">2. Fly</div>
                    <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Shoot on a workable day</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Scheduled around wind and light. Overcast is often better than bright midday sun, which throws hard shadows across roofs and lots.</p>
                </div>
                <div class="rounded-3xl bg-white p-7 border border-brand-dark/10">
                    <div class="text-xs uppercase tracking-[0.24em] font-bold text-brand-dark mb-5">3. Deliver</div>
                    <h3 class="font-serif text-2xl font-bold text-brand-charcoal mb-3">Edited and web-ready</h3>
                    <p class="text-brand-charcoal/70 leading-relaxed">Colour-corrected, cropped for where they are going, and compressed so they load fast. Placed on your site too, if I built it.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="max-w-3xl mb-10">
                <p class="text-xs uppercase tracking-[0.28em] font-bold text-brand-dark mb-4">Service area</p>
                <h2 class="font-serif text-4xl md:text-5xl leading-[1.34] font-bold text-brand-charcoal mb-5">
                    Drone photography serving Omaha, Fremont, and Eastern Nebraska.
                </h2>
                <p class="text-lg text-brand-charcoal/70 leading-relaxed">
                    Based in Eastern Nebraska and working throughout the surrounding communities. If your town is not listed, it is still worth asking &mdash; most of this area is a short drive.
                </p>
            </div>

            <?php /* Plain chips, not links: the /locations/ pages the other two
                     service pages point at do not exist on the server. */ ?>
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
                    Common drone photography questions.
                </h2>
            </div>

            <div class="space-y-4">
                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">What does drone footage cost for a small business?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Cost depends on how long the shoot takes, how much editing is involved, and whether you need stills, video, or both. A single storefront or property shoot is far less involved than ongoing construction coverage, so it helps to describe what you have in mind.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">How do I actually use drone photos on my website?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Aerial shots work best as a homepage header, a section break, or a location image, because the wide framing suits full-width layouts. Files are delivered already sized and compressed, so they add impact without slowing your pages down.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">What weather do you need to fly?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Drones need reasonably calm, dry conditions, so shoots are scheduled with the forecast in mind and occasionally moved. Overcast days often produce better images than bright midday sun, which creates harsh shadows across roofs and parking lots.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Can you photograph a property I am selling or renting?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Yes. Aerial views show lot lines, acreage, outbuildings, and how a property sits relative to roads and neighbours &mdash; things ground-level photos cannot convey. Particularly useful for rural and acreage listings.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Are you FAA certified to fly commercially?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">I am testing for my FAA Part 107 Remote Pilot Certificate in September 2026, and I am booking commercial drone work from that point forward. Commercial flights in the United States require that certification, so I would rather tell you exactly where I stand than be vague about it. If you are planning a project for autumn or later, now is a good time to talk.</p>
                </details>

                <details class="rounded-3xl bg-white border border-brand-dark/10 p-6">
                    <summary class="cursor-pointer font-bold text-brand-charcoal">Do you also handle the website the footage goes on?</summary>
                    <p class="text-brand-charcoal/70 leading-relaxed mt-4">Yes, and that is usually the point. Aerial footage is most valuable when someone places it deliberately, sizes it properly, and builds the page around it &mdash; rather than handing over a folder of large files for someone else to sort out. See <a href="/services/website-design/" class="text-brand-dark underline hover:text-brand-charcoal">website design</a>.</p>
                </details>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-28 bg-brand-dark text-white">
        <div class="max-w-5xl mx-auto px-5 md:px-8 text-center">
            <p class="text-xs uppercase tracking-[0.28em] font-bold text-white/55 mb-5">Ready when you are</p>
            <h2 class="font-serif text-4xl md:text-6xl leading-[1.2] font-bold mb-7">Let&rsquo;s show your business from a view people have not seen.</h2>
            <p class="text-lg md:text-xl leading-relaxed text-white/75 max-w-3xl mx-auto mb-10">
                Tell me what you are working with &mdash; a property, a build, an event, or a website that needs a real photograph instead of a stock one &mdash; and I will let you know what makes sense.
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

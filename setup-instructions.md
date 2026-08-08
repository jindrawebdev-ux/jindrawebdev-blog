# Blog Code — Setup Instructions

Built directly against the real files you shared (head.php, body-start.php, header.php, footer.php, scripts.php, and your .htaccess), so this plugs into JindraWebDev exactly as-is — same Tailwind CDN setup, same brand colors/fonts, same $page_title/$page_description pattern your other pages already use.

## What's in this package

```
blog.php                            → NEW — the blog landing page (/blog), sits at your site root next to about.php
article.php                          → NEW — the single-article template (/blog/{slug}), also at your site root
blog-data/articles.json               → NEW — every article's metadata + categories (this is what the weekly automation edits)
blog-data/content/*.html               → NEW — each article's body copy, one file per article
includes/header.php                    → UPDATED — your real header, with one addition: a "Blog" nav link
includes/footer.php                     → UPDATED — your real footer, with one addition: a "Blog" link
htaccess-addition.txt                   → ONE rule to add to your existing .htaccess (for /blog/{slug} URLs)
```

`includes/head.php`, `includes/body-start.php`, and `includes/scripts.php` did **not** need any changes — your head.php already has a `$page_schema` hook built in, which is exactly what per-article structured data needed. Handy that you already built it that way.

Two sample articles are included so you can see the whole system working end to end before any automation writes to it.

## 1. Upload

- Upload `blog.php` and `article.php` to your site root (same folder as `about.php`, `contact.php`).
- Upload the `blog-data/` folder to your site root as well.
- Replace your existing `includes/header.php` and `includes/footer.php` with the updated versions here (they're your originals with just a "Blog" link added — nothing else changed).

## 2. Update .htaccess

Open `htaccess-addition.txt` — it's one `RewriteRule` to paste into your existing `.htaccess`, plus exactly where it goes. Your `/blog` landing page needs no `.htaccess` change at all (it works automatically the same way `/about` does); only individual article URLs (`/blog/some-slug`) need the new rule.

## 3. Test

Visit `jindrawebdev.com/blog` — you should see the two sample articles, a working category filter, and a working search box (try typing "google" or "mobile"). Click into one to confirm the article page, quick-answer box, FAQ section, and Sources list render correctly, and that "Blog" now shows up in your header/footer nav.

Then view page source on an article and confirm the `<title>`, `<meta name="description">`, Open Graph tags, and the `application/ld+json` blocks are filled in per-article — that's the SEO/AEO/GEO layer working. (These get injected through your existing `$page_schema` hook in `head.php`.)

## 4. The OG image

Both sample articles currently point at `/images/blog-og-default.jpg`, which doesn't exist yet — see the separate OG image prompt for how to generate it. Once you have it, drop it at that exact path (or update `defaultOgImage` and each article's `ogImage` in `articles.json` if you place it somewhere else).

## 5. How new articles get added (this is what the weekly automation will do)

Adding an article is exactly two steps — this structure is deliberately automation-friendly, no database needed:

1. Save the article's body copy as `blog-data/content/{slug}.html` — just the content (matching the two samples: `<h2>`/`<p>` tags with the same Tailwind utility classes already in the samples, so it inherits your site's typography with zero extra CSS).
2. Add one object to the `"articles"` array in `blog-data/articles.json` with that same `slug`, plus title, metaTitle, metaDescription, category, tags, dates, read time, image path, excerpt, quickAnswer, optional faq[], and sources[].


### Using a real photograph

Add `"photo": "<name>"` to the article's entry in `articles.json` and the
listing card uses that photograph, with the share card composited from it
plus the headline. See `tools/photos/README.md` for processing photos into
the right sizes.

Articles without a `photo` fall back to generated artwork, so you can publish
on schedule and add photography later.

### Publishing a post (the automated flow)

Two files, one push:

1. `blog-data/content/{slug}.html` — the article body
2. one object appended to `articles` in `blog-data/articles.json`

Leave `ogImage` and `heroImage` out; the generator fills them in.

Pushing to `main` runs `.github/workflows/blog-assets.yml`, which generates
the article's share and hero images, rebuilds `sitemap.xml`, and commits the
result. Your cPanel cron then pulls and deploys it.

The same workflow runs daily, so a post dated in the future enters the
sitemap on its publish date without anyone pushing that day.

After changing the image template in `tools/og-images/generate.js`, existing
images are left alone by default. To redraw them all, run the workflow
manually from the Actions tab with **Regenerate every image** ticked.

### Scheduling posts ahead of time

`datePublished` doubles as a publish schedule. An article dated in the
future stays hidden from `/blog`, and its URL returns a 404, until that
date arrives — so you can write several posts in one sitting and let them
appear on their own. Dating a post today (or in the past) publishes it
immediately.

Don't add a future-dated post to `sitemap.xml` until it's live, or you'll
point Google at a URL that 404s.

Nothing else needs to change — `blog.php` and `article.php` both read from this file automatically, so the new article appears on the landing page, is searchable/filterable, and has full SEO/AEO/GEO metadata immediately.

## 6. Categories

Categories live in the `"categories"` array at the top of `articles.json`. To add one, add `{ "slug": "your-slug", "label": "Your Label" }` — it automatically becomes a new filter pill on the blog landing page.

## Notes on the SEO/AEO/GEO approach

- **SEO**: per-article title tag, meta description, canonical URL, keywords, and Article/BreadcrumbList JSON-LD — all generated from your data, so nothing is ever forgotten or copy-pasted stale. Uses the exact same `$page_title`/`$page_description`/`$page_url` pattern your existing pages already use, so it's consistent with the rest of your site.
- **AEO** (Answer Engine Optimization — Google featured snippets / AI Overviews): each article opens with a direct "Quick answer" box that answers the implied question in one or two sentences, plus FAQPage JSON-LD whenever an article has an `faq[]` array — that's what gets lifted into answer boxes.
- **GEO** (Generative Engine Optimization — being cited by ChatGPT/Perplexity/Claude-style answer engines): named, linked authorship (Person schema pointing at your real About page), clear publish/modified dates, and a real Sources list with outbound links to primary sources. AI answer engines weight clear attribution and citation trails heavily when deciding what to cite — this is also just good journalism practice, which is the point.

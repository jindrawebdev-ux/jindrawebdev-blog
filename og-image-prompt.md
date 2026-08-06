> **Superseded.** Blog images are now generated automatically by
> `tools/og-images/generate.js`, which renders branded cards in the real
> brand fonts and colours — consistent every week, no per-image cost, and
> one step in the publishing pipeline rather than a manual chore.
>
> Keep this file if you ever want art-directed photographic images for a
> specific feature post; the prompt below still works for that.

# Reusable Blog OG Image — Prompt

This is one image, reused across every article (not generated per-article) — exactly what you asked for. It lives at `/images/blog-og-default.jpg` and is what shows up when a blog post is shared on Facebook, Instagram, iMessage, LinkedIn, etc., and in Google search result previews.

**Required size: 1200 x 630px, JPG or PNG, under 300KB.**

## The prompt

```
A wide 1200x630 landscape hero image for a small-business web design blog. Warm, minimal, editorial photography style — not illustration, not cartoon.

Scene: a softly blurred aerial/drone view of a small Nebraska town at golden hour — a grid of quiet streets, a grain elevator or water tower silhouette in the distance, warm low sunlight, gentle depth of field — suggesting both "small-town roots" and "aerial photography" as a visual signature.

Overlay in the lower-left third: a clean, minimal laptop or browser window mockup showing a soft abstract website layout (simple blocks, no readable text), rendered in muted sage green (#768473) and cream (#FBFAF7) tones, floating slightly above the background with a soft drop shadow — representing web design without looking generic-corporate.

Color palette: muted sage green #768473, soft light sage #9BAD98, warm off-white #F5F5F5, cream #FBFAF7, deep charcoal #333333 for grounding shadow tones. Warm natural light, soft contrast, no harsh shadows. Avoid neon, avoid saturated blues, avoid stock-photo business handshake clichés.

Leave the upper-right third visually calm and low-detail (soft gradient sky, negative space) — this is reserved for a text/logo overlay added afterward, so it should NOT contain the words "JindraWebDev" or any text baked into the image itself.

Mood: warm, trustworthy, small-town, quietly confident, editorial rather than corporate stock photography. Aspect ratio 1200:630 (roughly 1.9:1), landscape.
```

## How to use it

Paste that prompt into Canva's AI image generator, Midjourney, DALL·E, or whatever tool you prefer. Since the top-right is left intentionally empty, drop your existing wordmark/logo (or just "JindraWebDev Blog" in Libre Baskerville) into that space afterward in Canva — that gives you one finished, on-brand, reusable OG image without needing to design a new one every week.

Once exported, save it as `blog-og-default.jpg` at `/images/blog-og-default.jpg` on your site — that's the exact path `articles.json` already points to for every article's `ogImage`/`heroImage`.

**Heads up on generating this through Canva right now:** the Canva tool I have access to doesn't offer a custom 1200x630 "OG image" size directly — closest built-in options are Poster or Facebook Cover, which you'd need to resize afterward. Given that, this prompt will probably get you a cleaner result pasted directly into an AI image tool or Canva's free-size / "Custom size" canvas. Just say the word if you'd like me to try generating a first draft through Canva anyway and you can resize/crop it.

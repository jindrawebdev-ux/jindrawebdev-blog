#!/usr/bin/env node
/**
 * Branded blog image generator.
 *
 * Renders an HTML template with headless Chromium and screenshots it, so the
 * images use the real brand fonts and colours rather than an approximation.
 * Fonts are embedded as base64 so a build never depends on the network.
 *
 * Two images per article, because they appear in different places and a single
 * image can't serve both well:
 *
 *   {slug}-og.jpg    Social share card. Carries the article title, because on
 *                    Facebook/LinkedIn the image IS the headline.
 *   {slug}-hero.jpg  Listing card + article hero. Deliberately has NO title:
 *                    the title is rendered directly beneath it in both places,
 *                    and repeating it looks like a mistake.
 *
 * Plus blog-og-default.jpg as the fallback for anything without its own image.
 *
 * Usage:
 *   cd tools/og-images && npm install && node generate.js
 *
 * Writes to ../../images/blog/ and updates ogImage/heroImage in articles.json.
 */

const fs = require('fs');
const path = require('path');
const { chromium } = require('playwright');

const ROOT = path.resolve(__dirname, '../..');
const OUT_DIR = path.join(ROOT, 'images/blog');
const DATA = path.join(ROOT, 'blog-data/articles.json');

const BRAND = {
  dark: '#768473',
  light: '#9BAD98',
  offwhite: '#F5F5F5',
  charcoal: '#333333',
  cream: '#FBFAF7',
};

// Hero backgrounds, all drawn from the brand's green/charcoal range. Chosen per
// ARTICLE rather than per category: a weekly blog will publish many posts in the
// same category, and keying off the category alone would make those tiles
// identical in the listing grid.
const HERO_BG = ['#768473', '#333333', '#5F6B5D', '#8A9787', '#414A40', '#6B7A68'];

/** Stable hash so a given slug always renders the same card across rebuilds. */
function slugSeed(slug) {
  let h = 0;
  for (let i = 0; i < slug.length; i++) h = (h * 31 + slug.charCodeAt(i)) >>> 0;
  return h;
}

function font(file) {
  const b64 = fs.readFileSync(path.join(__dirname, 'fonts', file)).toString('base64');
  return `url(data:font/ttf;base64,${b64}) format('truetype')`;
}

const FONT_FACES = `
  @font-face { font-family:'Libre Baskerville'; font-weight:700; src:${font('LibreBaskerville-Bold.ttf')}; }
  @font-face { font-family:'Lato'; font-weight:400; src:${font('Lato-Regular.ttf')}; }
  @font-face { font-family:'Lato'; font-weight:700; src:${font('Lato-Bold.ttf')}; }
  @font-face { font-family:'Lato'; font-weight:900; src:${font('Lato-Black.ttf')}; }
`;

const esc = (s) =>
  String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

/** Long headlines need to step down a size or they overflow the card. */
function titleSize(title) {
  const n = title.length;
  if (n <= 42) return 76;
  if (n <= 62) return 64;
  if (n <= 84) return 56;
  return 48;
}

const shell = (body, bg) => `<!doctype html><html><head><meta charset="utf-8"><style>
  ${FONT_FACES}
  *{margin:0;padding:0;box-sizing:border-box}
  body{width:1200px;height:630px;overflow:hidden;background:${bg};
       font-family:'Lato',sans-serif;-webkit-font-smoothing:antialiased}
  .card{position:relative;width:1200px;height:630px;padding:72px;
        display:flex;flex-direction:column;justify-content:space-between}
  /* Echoes the outlined circles used across the site's dark hero sections. */
  .rings{position:absolute;inset:0;opacity:.10;overflow:hidden}
  .ring{position:absolute;border:2px solid #fff;border-radius:9999px}
  .r1{width:420px;height:420px;top:-120px;left:-90px}
  .r2{width:560px;height:560px;bottom:-260px;right:-120px}
  .r3{width:200px;height:200px;top:250px;right:180px}
  .kicker{font-size:22px;font-weight:900;letter-spacing:.28em;text-transform:uppercase;
          color:${BRAND.light};position:relative}
  .title{font-family:'Libre Baskerville',serif;font-weight:700;color:#fff;
         line-height:1.18;position:relative;max-width:1000px}
  .foot{display:flex;align-items:center;justify-content:space-between;position:relative}
  .mark{font-family:'Libre Baskerville',serif;font-weight:700;font-size:30px;color:#fff;
        letter-spacing:.02em}
  .url{font-size:19px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;
       color:rgba(255,255,255,.55)}
  .rule{height:5px;width:96px;background:${BRAND.light};border-radius:9999px;
        margin-bottom:26px;position:relative}
  .big{font-family:'Libre Baskerville',serif;font-weight:700;color:#fff;font-size:82px;
       line-height:1.12;position:relative;max-width:900px}
</style></head><body>${body}</body></html>`;

const ogCard = (title, category) =>
  shell(
    `<div class="card">
       <div class="rings"><div class="ring r1"></div><div class="ring r2"></div><div class="ring r3"></div></div>
       <div class="kicker">${esc(category)}</div>
       <div>
         <div class="rule"></div>
         <div class="title" style="font-size:${titleSize(title)}px">${esc(title)}</div>
       </div>
       <div class="foot"><div class="mark">JindraWebDev</div><div class="url">jindrawebdev.com</div></div>
     </div>`,
    BRAND.charcoal
  );

/** No title here on purpose — see the header comment. */
const heroCard = (category, bg, seed) => {
  // Nudge the rings so two cards sharing a colour still look distinct.
  const dx = (seed % 5) * 34 - 68;
  const dy = ((seed >> 3) % 5) * 30 - 60;
  const scale = 1 + (((seed >> 6) % 5) - 2) * 0.09;
  return shell(
    `<div class="card">
       <div class="rings" style="transform:translate(${dx}px,${dy}px) scale(${scale})">
         <div class="ring r1"></div><div class="ring r2"></div><div class="ring r3"></div>
       </div>
       <div class="kicker">The JindraWebDev Blog</div>
       <div><div class="rule"></div><div class="big">${esc(category)}</div></div>
       <div class="foot"><div class="mark">JindraWebDev</div><div class="url">jindrawebdev.com</div></div>
     </div>`,
    bg
  );
};

const defaultCard = () =>
  shell(
    `<div class="card">
       <div class="rings"><div class="ring r1"></div><div class="ring r2"></div><div class="ring r3"></div></div>
       <div class="kicker">The JindraWebDev Blog</div>
       <div>
         <div class="rule"></div>
         <div class="title" style="font-size:64px">Practical thinking for small-town businesses.</div>
       </div>
       <div class="foot"><div class="mark">JindraWebDev</div><div class="url">jindrawebdev.com</div></div>
     </div>`,
    BRAND.charcoal
  );

async function main() {
  const data = JSON.parse(fs.readFileSync(DATA, 'utf8'));
  const labels = {};
  data.categories.forEach((c) => (labels[c.slug] = c.label));

  fs.mkdirSync(OUT_DIR, { recursive: true });

  // CHROMIUM_PATH lets a machine with a preinstalled browser skip
  // `npx playwright install` (and sidestep version-pin mismatches).
  const launchOpts = process.env.CHROMIUM_PATH
    ? { executablePath: process.env.CHROMIUM_PATH }
    : {};
  const browser = await chromium.launch(launchOpts);
  const page = await browser.newPage({
    viewport: { width: 1200, height: 630 },
    deviceScaleFactor: 1,
  });

  const shoot = async (html, file) => {
    await page.setContent(html, { waitUntil: 'load' });
    await page.evaluate(() => document.fonts.ready);
    await page.screenshot({
      path: path.join(OUT_DIR, file),
      type: 'jpeg',
      quality: 90,
    });
    const kb = (fs.statSync(path.join(OUT_DIR, file)).size / 1024).toFixed(0);
    console.log(`  ${file}  (${kb} KB)`);
  };

  console.log('Generating:');
  await shoot(defaultCard(), 'blog-og-default.jpg');

  for (const a of data.articles) {
    const label = labels[a.category] || 'Insights';
    const seed = slugSeed(a.slug);
    const bg = HERO_BG[seed % HERO_BG.length];
    await shoot(ogCard(a.title, label), `${a.slug}-og.jpg`);
    await shoot(heroCard(label, bg, seed), `${a.slug}-hero.jpg`);
    a.ogImage = `/images/blog/${a.slug}-og.jpg`;
    a.heroImage = `/images/blog/${a.slug}-hero.jpg`;
  }

  await browser.close();

  data.site.defaultOgImage = '/images/blog/blog-og-default.jpg';
  fs.writeFileSync(DATA, JSON.stringify(data, null, 2) + '\n');
  console.log('\nUpdated ogImage/heroImage paths in blog-data/articles.json');
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});

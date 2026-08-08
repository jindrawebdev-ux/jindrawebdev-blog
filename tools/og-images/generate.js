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
const PHOTO_DIR = path.join(ROOT, 'images/blog/photos');
const DATA = path.join(ROOT, 'blog-data/articles.json');

/**
 * An article may name a real photograph via a "photo" field in articles.json.
 * When present it becomes the listing/hero image directly, and the share card
 * is composited over it. Articles without one fall back to generated geometry,
 * so the weekly pipeline never blocks waiting on photography.
 */
function photoDataUri(name) {
  const f = path.join(PHOTO_DIR, `${name}.jpg`);
  if (!fs.existsSync(f)) return null;
  return `data:image/jpeg;base64,${fs.readFileSync(f).toString('base64')}`;
}

const BRAND = {
  dark: '#768473',
  light: '#9BAD98',
  offwhite: '#F5F5F5',
  charcoal: '#333333',
  cream: '#FBFAF7',
};

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

const ogCard = (title, category, photo) => {
  // Over a photograph the text needs a scrim, or a light sky makes the headline
  // unreadable. Vertical gradient keeps the image visible up top while going
  // near-solid behind the title and footer.
  const bg = photo
    ? `<div style="position:absolute;inset:0;background-image:url('${photo}');
                   background-size:cover;background-position:center"></div>
       <div style="position:absolute;inset:0;background:linear-gradient(
                   to bottom, rgba(30,30,30,.45) 0%, rgba(30,30,30,.72) 45%, rgba(30,30,30,.90) 100%)"></div>`
    : `<div class="rings"><div class="ring r1"></div><div class="ring r2"></div><div class="ring r3"></div></div>`;
  return shell(
    `<div class="card">
       ${bg}
       <div class="kicker">${esc(category)}</div>
       <div>
         <div class="rule"></div>
         <div class="title" style="font-size:${titleSize(title)}px">${esc(title)}</div>
       </div>
       <div class="foot"><div class="mark">JindraWebDev</div><div class="url">jindrawebdev.com</div></div>
     </div>`,
    BRAND.charcoal
  );
};

/**
 * Hero / listing artwork: deliberately TEXT-FREE.
 *
 * The first version printed the category here, which was a mistake — the card
 * in blog.php renders the category label AND the title immediately below the
 * image, so the tile read "Website & Local SEO / WEBSITE & LOCAL SEO / <title>".
 * Worse, two posts in one category produced near-identical tiles, and a weekly
 * blog will publish many posts per category.
 *
 * Abstract brand geometry sidesteps both problems: nothing is duplicated, and
 * composition + palette vary per slug so tiles stay distinct forever.
 */
const HERO_PALETTES = [
  { bg: '#333333', a: '#768473', b: '#9BAD98' },
  { bg: '#768473', a: '#FBFAF7', b: '#333333' },
  { bg: '#414A40', a: '#9BAD98', b: '#768473' },
  { bg: '#9BAD98', a: '#333333', b: '#FBFAF7' },
  { bg: '#2C2C2C', a: '#9BAD98', b: '#768473' },
  { bg: '#5F6B5D', a: '#FBFAF7', b: '#9BAD98' },
];

/**
 * Every composition is FULL BLEED: forms are large and deliberately run off the
 * canvas edges. The first attempt placed small shapes on an open field and read
 * as sparse and unfinished — at 1200x630 a shape needs to be several hundred
 * pixels across to carry the frame.
 */
const COMPOSITIONS = [
  // Three oversized discs bleeding off three edges.
  (p) => `
    <div style="position:absolute;left:-260px;top:-200px;width:820px;height:820px;border-radius:9999px;background:${p.a};opacity:.9"></div>
    <div style="position:absolute;right:-220px;top:-120px;width:700px;height:700px;border-radius:9999px;background:${p.b};opacity:.55"></div>
    <div style="position:absolute;left:38%;bottom:-380px;width:640px;height:640px;border-radius:9999px;background:${p.b};opacity:.9"></div>`,

  // Concentric rings radiating from off-canvas left, spanning the full width.
  (p) => `
    <div style="position:absolute;left:-140px;top:50%;transform:translateY(-50%)">
      ${[1500, 1240, 980, 720, 460, 220]
        .map(
          (d, i) =>
            `<div style="position:absolute;width:${d}px;height:${d}px;left:${-d / 2}px;top:${-d / 2}px;
             border-radius:9999px;border:${i > 3 ? 0 : 5}px solid ${i % 2 ? p.a : p.b};
             ${i > 3 ? `background:${i % 2 ? p.a : p.b};` : ''}opacity:${0.85 - i * 0.07}"></div>`
        )
        .join('')}
    </div>`,

  // Hard diagonal split with a disc straddling the seam.
  (p) => `
    <div style="position:absolute;inset:0;background:${p.a};
                clip-path:polygon(0 0, 100% 0, 100% 34%, 0 78%)"></div>
    <div style="position:absolute;inset:0;background:${p.b};opacity:.75;
                clip-path:polygon(0 88%, 100% 46%, 100% 100%, 0 100%)"></div>
    <div style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);
                width:420px;height:420px;border-radius:9999px;border:6px solid ${p.bg}"></div>`,

  // Full-bleed diagonal stripe field, one solid disc punched over it.
  (p) => `
    <div style="position:absolute;inset:-45%;transform:rotate(-28deg)">
      ${Array.from({ length: 14 })
        .map(
          (_, i) =>
            `<div style="position:absolute;left:0;right:0;top:${i * 7.4}%;height:${i % 3 === 0 ? 42 : 20}px;
             background:${i % 2 ? p.a : p.b};opacity:${i % 3 === 0 ? 0.85 : 0.45}"></div>`
        )
        .join('')}
    </div>
    <div style="position:absolute;right:-120px;top:50%;transform:translateY(-50%);
                width:560px;height:560px;border-radius:9999px;background:${p.bg};opacity:.92"></div>
    <div style="position:absolute;right:-40px;top:50%;transform:translateY(-50%);
                width:400px;height:400px;border-radius:9999px;border:6px solid ${p.a}"></div>`,

  // Quarter-arc tiles tiled edge to edge.
  (p) => `
    ${Array.from({ length: 12 })
      .map((_, i) => {
        const col = i % 4,
          row = Math.floor(i / 4);
        const corners = ['9999px 0 0 0', '0 9999px 0 0', '0 0 9999px 0', '0 0 0 9999px'];
        return `<div style="position:absolute;left:${col * 300}px;top:${row * 210}px;
          width:300px;height:210px;background:${(col + row) % 2 ? p.a : p.b};
          opacity:${0.35 + ((col * 2 + row) % 4) * 0.2};
          border-radius:${corners[(col + row * 3) % 4]}"></div>`;
      })
      .join('')}`,

  // Stacked pill bars bleeding off the right, anchored by a large disc.
  (p) => `
    <div style="position:absolute;right:-300px;top:-160px;width:840px;height:840px;
                border-radius:9999px;background:${p.a};opacity:.85"></div>
    ${[0, 1, 2, 3, 4, 5]
      .map(
        (i) =>
          `<div style="position:absolute;left:-80px;top:${40 + i * 100}px;
           width:${[760, 980, 620, 880, 540, 820][i]}px;height:62px;border-radius:9999px;
           background:${i % 2 ? p.b : p.bg};opacity:${i % 2 ? 0.9 : 0.35}"></div>`
      )
      .join('')}`,
];

const heroCard = (seed) => {
  const p = HERO_PALETTES[seed % HERO_PALETTES.length];
  const comp = COMPOSITIONS[(seed >> 4) % COMPOSITIONS.length];
  return shell(
    `<div style="position:relative;width:1200px;height:630px;overflow:hidden">${comp(p)}</div>`,
    p.bg
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

  // Existing images are left alone so a scheduled CI run doesn't rewrite every
  // file each time. Pass --force to regenerate after a template change.
  const force = process.argv.includes('--force');

  const shoot = async (html, file, alwaysRedraw = false) => {
    if (!force && !alwaysRedraw && fs.existsSync(path.join(OUT_DIR, file))) {
      console.log(`  ${file}  (exists, skipped)`);
      return;
    }
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
    const photo = a.photo ? photoDataUri(a.photo) : null;

    if (a.photo && !photo) {
      console.log(`  ! "${a.photo}" not found in images/blog/photos — using generated art`);
    }

    // Share card is always generated: a bare photo has no headline, and on
    // social the image is doing the headline's job.
    await shoot(ogCard(a.title, label, photo), `${a.slug}-og.jpg`, Boolean(photo));
    a.ogImage = `/images/blog/${a.slug}-og.jpg`;

    if (photo) {
      // Real photograph used as-is for the listing card.
      a.heroImage = `/images/blog/photos/${a.photo}.jpg`;
    } else {
      await shoot(heroCard(seed), `${a.slug}-hero.jpg`);
      a.heroImage = `/images/blog/${a.slug}-hero.jpg`;
    }
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

#!/usr/bin/env node
/**
 * Prepares real photographs for the blog.
 *
 * Point it at a folder of full-size photos (straight off a phone, camera, or
 * drone) and it produces web-ready crops at three widths. A 4 MB phone photo
 * becomes roughly 60-150 KB, which matters: the whole point of the Tailwind
 * work was cutting page weight, and unoptimised photos would hand it all back.
 *
 * Three sizes, wired to a srcset in blog.php, so a phone downloads a 480px
 * image instead of a 1200px one:
 *
 *   {name}.jpg       1200x630  share cards, and any full-width use
 *   {name}-800.jpg    800x420  listing cards on desktop
 *   {name}-480.jpg    480x252  listing cards on mobile
 *
 * Cropping is centre-weighted `cover`, so subjects near the middle survive.
 * A photo whose subject sits far off-centre is better cropped by hand first.
 *
 * Only the processed output is committed — source photos stay on your machine.
 * Keeping multi-megabyte originals in git would bloat the repo permanently.
 *
 * Usage:
 *   node tools/photos/process.js <source-folder>
 *   node tools/photos/process.js ~/Desktop/blog-photos
 */

const fs = require('fs');
const path = require('path');
const { chromium } = require('playwright');

const ROOT = path.resolve(__dirname, '../..');
const OUT_DIR = path.join(ROOT, 'images/blog/photos');

const SIZES = [
  { suffix: '', w: 1200, h: 630, q: 82 },
  { suffix: '-800', w: 800, h: 420, q: 80 },
  { suffix: '-480', w: 480, h: 252, q: 78 },
];

const EXT = /\.(jpe?g|png|webp|avif)$/i;

/** Filenames become URL fragments, so normalise them rather than trusting input. */
function slugify(name) {
  return name
    .replace(EXT, '')
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/^-+|-+$/g, '');
}

async function main() {
  const srcDir = process.argv[2];
  if (!srcDir) {
    console.error('Usage: node tools/photos/process.js <source-folder>');
    process.exit(1);
  }
  if (!fs.existsSync(srcDir)) {
    console.error(`No such folder: ${srcDir}`);
    process.exit(1);
  }

  const files = fs.readdirSync(srcDir).filter((f) => EXT.test(f));
  if (!files.length) {
    console.error(`No images found in ${srcDir}`);
    process.exit(1);
  }

  fs.mkdirSync(OUT_DIR, { recursive: true });

  const launchOpts = process.env.CHROMIUM_PATH
    ? { executablePath: process.env.CHROMIUM_PATH }
    : {};
  const browser = await chromium.launch(launchOpts);
  const page = await browser.newPage();

  let totalIn = 0;
  let totalOut = 0;

  for (const file of files) {
    const src = path.join(srcDir, file);
    const slug = slugify(file);
    const bytesIn = fs.statSync(src).size;
    totalIn += bytesIn;

    const mime = /\.png$/i.test(file)
      ? 'image/png'
      : /\.webp$/i.test(file)
      ? 'image/webp'
      : /\.avif$/i.test(file)
      ? 'image/avif'
      : 'image/jpeg';
    const dataUri = `data:${mime};base64,${fs.readFileSync(src).toString('base64')}`;

    console.log(`\n${file}  (${(bytesIn / 1024 / 1024).toFixed(1)} MB)`);

    for (const s of SIZES) {
      await page.setViewportSize({ width: s.w, height: s.h });
      await page.setContent(
        `<html><body style="margin:0">
           <div style="width:${s.w}px;height:${s.h}px;
                       background-image:url('${dataUri}');
                       background-size:cover;background-position:center"></div>
         </body></html>`,
        { waitUntil: 'load' }
      );
      // setContent resolves before a data: URI background has decoded.
      await page.evaluate(
        () =>
          new Promise((resolve) => {
            const el = document.querySelector('div');
            const url = getComputedStyle(el).backgroundImage.slice(5, -2);
            const img = new Image();
            img.onload = img.onerror = resolve;
            img.src = url;
          })
      );

      const out = path.join(OUT_DIR, `${slug}${s.suffix}.jpg`);
      await page.screenshot({ path: out, type: 'jpeg', quality: s.q });
      const kb = fs.statSync(out).size / 1024;
      totalOut += fs.statSync(out).size;
      console.log(`  ${s.w}x${s.h}  ->  ${path.basename(out)}  (${kb.toFixed(0)} KB)`);
    }
  }

  await browser.close();

  console.log(
    `\nProcessed ${files.length} photo(s): ` +
      `${(totalIn / 1024 / 1024).toFixed(1)} MB in, ` +
      `${(totalOut / 1024 / 1024).toFixed(2)} MB out across ${SIZES.length} sizes each.`
  );
  console.log(`\nOutput: images/blog/photos/`);
  console.log('Reference one from an article by adding to its articles.json entry:');
  console.log('  "photo": "<name-without-extension>"');
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});

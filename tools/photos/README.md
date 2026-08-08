# Using real photographs on the blog

Generated geometric artwork is the fallback, not the goal. Real photographs
are what make the blog feel like a person wrote it — which is the whole
premise of the brand. Use them wherever you have them.

## The workflow

1. Put your full-size photos in a folder anywhere on your computer. No need to
   resize or compress first — that's what this script does.

2. Run the processor:

   ```
   cd tools/photos
   npm install
   node process.js ~/Desktop/blog-photos
   ```

3. It writes three sizes of each photo into `images/blog/photos/` and prints
   the name to reference. `Main Street Fremont.jpg` becomes
   `main-street-fremont`.

4. Add that name to the article's entry in `blog-data/articles.json`:

   ```json
   {
     "slug": "your-article-slug",
     "title": "...",
     "photo": "main-street-fremont",
     ...
   }
   ```

5. Commit and push. The share card is composited automatically from the photo
   with your headline over it.

Leave `ogImage` and `heroImage` out — both are filled in for you.

## What makes a good photo here

Images render at **1200×630**, a wide letterbox crop. That shape is unforgiving
of vertical photos.

- **Shoot or choose landscape.** A portrait photo gets its top and bottom cut off.
- **Keep the subject near the centre.** Cropping is centre-weighted `cover`. A
  subject far off to one side may be cut. Crop by hand first if so.
- **Leave some open sky or wall.** The share card lays a headline across the
  image; a busy frame edge to edge makes text harder to read even with the scrim.
- **Real beats polished.** An actual Nebraska main street, a local storefront,
  your desk, a drone shot of a town — these are things competitors using stock
  photography cannot show. That's the point.

## Sizes, and why there are three

| File | Size | Used for |
|---|---|---|
| `{name}.jpg` | 1200×630 | share cards, full-width use |
| `{name}-800.jpg` | 800×420 | listing cards on desktop |
| `{name}-480.jpg` | 480×252 | listing cards on mobile |

`blog.php` emits a `srcset`, so a phone downloads the 480px file instead of the
1200px one. Without this, real photos would undo the page-weight work — a
single unoptimised phone photo can outweigh the entire rest of the page.

## Source photos are not committed

Only the processed output goes into the repo. Multi-megabyte originals would
bloat it permanently, and git keeps every version forever. Keep your originals
in your own photo library or cloud storage.

## Mixing photos and generated artwork

An article with no `photo` field falls back to generated geometry, so you can
publish on schedule and add a photograph later — rerun the processor, add the
`photo` field, push. Nothing else changes.

If you name a photo that isn't in `images/blog/photos/`, the generator warns and
falls back rather than failing the build.

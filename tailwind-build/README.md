# Rebuilding the Tailwind stylesheet

`css/tailwind.min.css` replaces the old `cdn.tailwindcss.com` script that
used to run in `includes/head.php`. That script was Tailwind's **Play CDN**,
which ships roughly 400KB of JavaScript and compiles the CSS in the
visitor's browser on every page load. Tailwind's own documentation says not
to use it in production. The built file is ~27KB (about 5.5KB gzipped) and
is plain CSS, so the browser renders immediately.

## When you need to rebuild

Only when a **new Tailwind class appears somewhere that isn't already in
this repo**. Tailwind scans your files and generates CSS only for the
classes it actually finds, so a class it never saw produces no CSS and the
element silently renders unstyled.

You need a rebuild if you:

- add a new page, or restyle an existing one, outside this repo
- use a class in a blog article's HTML that no other page uses

You do **not** need a rebuild for normal blog posts that reuse the classes
already present in the sample articles.

## Important: the build needs your whole site

The scan must cover every file that contains Tailwind classes — including
the pages that live only on the server and not in this repo (`index.php`,
`contact.php`, `services/`, and so on). Building from this repo alone would
drop every class unique to those pages and render them unstyled.

So before rebuilding, place a copy of the live site's `.php`/`.html` files
in a `site-files/` directory next to this repo. The config expects:

    ../../site-files/**/*.php
    ../../site-files/**/*.html

## Commands

    cd tailwind-build
    npm install -D tailwindcss@3
    npx tailwindcss -c tailwind.config.js -i input.css -o ../css/tailwind.min.css --minify

Pinned to Tailwind v3 deliberately: the Play CDN served v3, and v4 changed
both the config format and several class behaviours. Upgrading is a separate
decision, not something to do accidentally during a rebuild.

## After rebuilding

Bump the version number in the stylesheet link in `includes/head.php`:

    <link rel="stylesheet" href="/css/tailwind.min.css?v=2">

The `?v=` is a cache-buster. Browsers are told to cache CSS for a month, so
without bumping it returning visitors keep the old file and won't see your
changes.

## Verifying a build

Check that a few distinctive classes survived, especially arbitrary values
and anything toggled by JavaScript rather than written in the HTML:

    grep -c "aspect-\[1200/630\]" ../css/tailwind.min.css   # arbitrary value
    grep -c "bg-brand-dark"       ../css/tailwind.min.css   # JS-toggled pill

Both should return 1 or more. A 0 means the scan missed files.

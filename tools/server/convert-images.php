<?php
/**
 * One-off batch image converter — RUN ON THE SERVER, THEN DELETE.
 *
 * Converts a folder of large JPEGs to WebP at a sane maximum dimension.
 * A 2 GB branding-session folder typically lands somewhere around
 * 100-250 MB, with no visible quality loss at web sizes.
 *
 * If the server has an image library but no WebP support, it writes resized
 * JPEGs instead. Most of the saving comes from the resize -- a 6000px camera
 * file cut to 2000px sheds roughly 90% before format matters -- so that path
 * is still worth running rather than waiting on a host.
 *
 * Why this exists as a server script rather than something run locally:
 * the source photos are far too large to move off the server, so the work
 * has to happen where they already are.
 *
 * ---------------------------------------------------------------------
 * HOW TO USE
 *
 * 1. Change SECRET below to any random string of your own.
 * 2. Upload this file to your site root (next to index.php).
 * 3. Visit:  https://jindrawebdev.com/convert-images.php?token=YOUR_SECRET
 * 4. Leave the tab open. It processes a few images per pass and reloads
 *    itself until finished — that avoids PHP's execution time limit,
 *    which 331 images in one request would blow straight through.
 * 5. When it reports "Finished", check the output folder, then DELETE
 *    THIS FILE from the server.
 *
 * Originals are never modified or deleted. Output goes to a separate
 * folder so you can compare before removing anything. Re-running skips
 * work already done, so it is safe to stop and resume.
 * ---------------------------------------------------------------------
 */

// ---------------------------------------------------------------- config

const SECRET      = 'change-me-to-something-random';
const SRC_DIR     = 'images/jindrawebdev';        // relative to this file
const OUT_DIR     = 'images/jindrawebdev-web';    // created if missing
const MAX_EDGE    = 2000;   // longest side in px; plenty for full-width use
const QUALITY     = 82;     // WebP quality; 80-85 is the sweet spot
const BATCH_SIZE  = 4;      // images per pass — lower this if you hit timeouts

// ------------------------------------------------------------------ guard

if (!isset($_GET['token']) || !hash_equals(SECRET, $_GET['token'])) {
    http_response_code(403);
    exit('Forbidden.');
}

@set_time_limit(0);
@ini_set('memory_limit', '512M');

$root = __DIR__;
$src  = $root . '/' . SRC_DIR;
$out  = $root . '/' . OUT_DIR;

header('Content-Type: text/html; charset=utf-8');
echo '<!doctype html><meta charset="utf-8"><title>Image conversion</title>';
echo '<style>body{font:15px/1.6 system-ui,sans-serif;max-width:820px;margin:40px auto;padding:0 20px;color:#333}
      code{background:#f2f2f2;padding:2px 6px;border-radius:4px}
      .ok{color:#2e7d32}.warn{color:#b26a00}.err{color:#c62828}
      .bar{height:22px;background:#eee;border-radius:99px;overflow:hidden;margin:18px 0}
      .bar>div{height:100%;background:#768473}
      table{border-collapse:collapse;width:100%;margin-top:16px}td{padding:4px 8px;border-bottom:1px solid #eee;font-size:13px}</style>';
echo '<h1>Image conversion</h1>';

// ------------------------------------------------------- capability check

$gdLoaded    = extension_loaded('gd');
$hasGdWebp   = function_exists('imagewebp');
$hasGdJpeg   = function_exists('imagejpeg');
$hasImagick  = class_exists('Imagick');
$imagickWebp = false;
if ($hasImagick) {
    try { $imagickWebp = in_array('WEBP', Imagick::queryFormats('WEBP'), true); }
    catch (Throwable $e) { $imagickWebp = false; }
}

// Resizing is where most of the saving comes from -- a 6000px camera JPEG cut
// to 2000px sheds ~90% before format even matters. So WebP is preferred but
// not required: without it we still emit resized JPEGs, which is far better
// than doing nothing while waiting on a host.
$useWebp = $imagickWebp || $hasGdWebp;
$canWork = $hasImagick || $gdLoaded;

if (!$canWork) {
    echo '<p class="err"><strong>No image library is enabled for PHP on this server.</strong></p>';
    echo '<h2>What is available right now</h2><table>';
    foreach ([
        'GD extension loaded'      => $gdLoaded,
        'GD can write WebP'        => $hasGdWebp,
        'GD can write JPEG'        => $hasGdJpeg,
        'Imagick class available'  => $hasImagick,
        'Imagick supports WebP'    => $imagickWebp,
    ] as $label => $ok) {
        printf('<tr><td>%s</td><td class="%s">%s</td></tr>',
            $label, $ok ? 'ok' : 'err', $ok ? 'yes' : 'no');
    }
    echo '</table>';
    echo '<p>PHP version: <code>' . PHP_VERSION . '</code></p>';
    echo '<h2>How to fix it</h2>';
    echo '<p>This is almost always a switched-off extension rather than something '
       . 'your host has to do. Switching PHP versions resets extensions to that '
       . "version's defaults, so an upgrade commonly turns GD off.</p>";
    echo '<ol>'
       . '<li>In cPanel, open <strong>Select PHP Version</strong>.</li>'
       . '<li>Go to the <strong>Extensions</strong> tab.</li>'
       . '<li>Tick <code>gd</code>, and <code>imagick</code> if it is listed.</li>'
       . '<li>Save, then reload this page.</li>'
       . '</ol>';
    echo '<p>If neither appears in that list, then it is worth asking your host to '
       . 'enable GD for PHP ' . PHP_VERSION . '.</p>';
    exit;
}

$engine = $hasImagick ? 'Imagick' : 'GD';
$outExt = $useWebp ? 'webp' : 'jpg';

if (!is_dir($src)) {
    exit('<p class="err">Source folder not found: <code>' . htmlspecialchars(SRC_DIR) . '</code></p>');
}
if (!is_dir($out) && !@mkdir($out, 0755, true)) {
    exit('<p class="err">Could not create output folder: <code>' . htmlspecialchars(OUT_DIR) . '</code></p>');
}

// ------------------------------------------------------------- file list

$files = [];
foreach (scandir($src) as $f) {
    if (preg_match('/\.(jpe?g|png)$/i', $f)) { $files[] = $f; }
}
sort($files);

$todo = [];
foreach ($files as $f) {
    $target = $out . '/' . preg_replace('/\.(jpe?g|png)$/i', '.' . $outExt, $f);
    if (!file_exists($target)) { $todo[] = $f; }
}

$total = count($files);
$done  = $total - count($todo);
$pct   = $total ? round($done / $total * 100) : 100;

echo '<p>Engine: <strong>' . $engine . '</strong> &middot; Writing: <strong>' . strtoupper($outExt) . '</strong> &middot; Source: <code>' . htmlspecialchars(SRC_DIR) . '</code> '
   . '&middot; Output: <code>' . htmlspecialchars(OUT_DIR) . '</code></p>';
echo '<div class="bar"><div style="width:' . $pct . '%"></div></div>';
echo '<p><strong>' . $done . '</strong> of <strong>' . $total . '</strong> converted (' . $pct . '%).</p>';

if (!$todo) {
    $srcBytes = 0; $outBytes = 0;
    foreach ($files as $f) { $srcBytes += @filesize($src . '/' . $f); }
    foreach (scandir($out) as $f) {
        if (preg_match('/\.(webp|jpg)$/i', $f)) { $outBytes += @filesize($out . '/' . $f); }
    }
    $mb = fn($b) => number_format($b / 1048576, 1) . ' MB';
    echo '<h2 class="ok">Finished.</h2>';
    echo '<p>Originals: <strong>' . $mb($srcBytes) . '</strong> &rarr; '
       . strtoupper($outExt) . ': <strong>' . $mb($outBytes) . '</strong>';
    if ($srcBytes > 0) {
        echo ' &mdash; a ' . round((1 - $outBytes / max($srcBytes, 1)) * 100) . '% reduction.';
    }
    echo '</p>';
    echo '<p class="warn"><strong>Now do two things:</strong><br>'
       . '1. Spot-check a few images in <code>' . htmlspecialchars(OUT_DIR) . '</code>.<br>'
       . '2. <strong>Delete this script from the server.</strong> It should not stay reachable.</p>';
    if (!$useWebp) {
        echo '<p class="warn">WebP was not available, so these were written as resized JPEGs. '
           . 'Most of the saving comes from the resize, so this is still a large win. '
           . 'If you enable <code>gd</code> or <code>imagick</code> with WebP support later, '
           . 'delete the output folder and re-run to get smaller files still.</p>';
    }
    echo '<p>Keep the originals until you are satisfied. They are your masters — '
       . 'ideally they live in your photo library rather than on the web server at all.</p>';
    exit;
}

// ---------------------------------------------------------------- convert

/** JPEGs off a camera carry EXIF rotation that GD ignores, so apply it manually. */
function applyExifOrientation($im, string $path) {
    if (!function_exists('exif_read_data')) { return $im; }
    $exif = @exif_read_data($path);
    if (empty($exif['Orientation'])) { return $im; }
    switch ($exif['Orientation']) {
        case 3: return imagerotate($im, 180, 0);
        case 6: return imagerotate($im, -90, 0);
        case 8: return imagerotate($im, 90, 0);
    }
    return $im;
}

$batch = array_slice($todo, 0, BATCH_SIZE);
echo '<table>';

foreach ($batch as $f) {
    $in  = $src . '/' . $f;
    $dst = $out . '/' . preg_replace('/\.(jpe?g|png)$/i', '.' . $outExt, $f);
    $inSize = @filesize($in);

    try {
        if ($hasImagick) {
            $img = new Imagick($in);
            $img->autoOrient();
            $w = $img->getImageWidth(); $h = $img->getImageHeight();
            if (max($w, $h) > MAX_EDGE) {
                if ($w >= $h) { $img->resizeImage(MAX_EDGE, 0, Imagick::FILTER_LANCZOS, 1);
                } else {        $img->resizeImage(0, MAX_EDGE, Imagick::FILTER_LANCZOS, 1); }
            }
            $img->setImageFormat($useWebp ? 'webp' : 'jpeg');
            $img->setImageCompressionQuality(QUALITY);
            $img->stripImage();
            $img->writeImage($dst);
            $img->destroy();
        } else {
            $info = @getimagesize($in);
            if (!$info) { throw new RuntimeException('unreadable'); }
            $im = ($info[2] === IMAGETYPE_PNG) ? @imagecreatefrompng($in) : @imagecreatefromjpeg($in);
            if (!$im) { throw new RuntimeException('decode failed'); }
            if ($info[2] !== IMAGETYPE_PNG) { $im = applyExifOrientation($im, $in); }
            $w = imagesx($im); $h = imagesy($im);
            if (max($w, $h) > MAX_EDGE) {
                $scale = MAX_EDGE / max($w, $h);
                $im2 = imagescale($im, (int) round($w * $scale), (int) round($h * $scale), IMG_BICUBIC);
                if ($im2) { imagedestroy($im); $im = $im2; }
            }
            if ($useWebp) { imagewebp($im, $dst, QUALITY); }
            else           { imagejpeg($im, $dst, QUALITY); }
            imagedestroy($im);
        }

        $outSize = @filesize($dst);
        $saved = $inSize > 0 ? round((1 - $outSize / $inSize) * 100) : 0;
        printf('<tr><td>%s</td><td>%s &rarr; %s</td><td class="ok">-%d%%</td></tr>',
            htmlspecialchars($f),
            number_format($inSize / 1048576, 1) . ' MB',
            number_format($outSize / 1024) . ' KB',
            $saved);
    } catch (Throwable $e) {
        printf('<tr><td>%s</td><td colspan="2" class="err">failed: %s</td></tr>',
            htmlspecialchars($f), htmlspecialchars($e->getMessage()));
        // Leave a marker so a broken file doesn't stall the run forever.
        @file_put_contents($dst, '');
    }
    flush();
}

echo '</table>';

$next = htmlspecialchars($_SERVER['PHP_SELF']) . '?token=' . urlencode($_GET['token']);
echo '<p>Continuing automatically&hellip; <a href="' . $next . '">click here if it stops</a></p>';
echo '<meta http-equiv="refresh" content="1;url=' . $next . '">';

<?php
/**
 * Shrinks oversized images already in use on the site — RUN, THEN DELETE.
 *
 * PageSpeed found /images/lexis-working.webp at 3600x3607 being displayed at
 * 887x592: roughly sixteen times more pixels than are ever shown, for 851 KB.
 * Across the homepage that pattern accounts for about 1.8 MB of waste.
 *
 * Deliberately edits FILES ONLY. Filenames, formats and dimensions-as-used all
 * stay the same, so no page markup changes and nothing needs redeploying —
 * the images simply get smaller.
 *
 * ---------------------------------------------------------------------
 * HOW TO USE
 *
 * 1. Change SECRET below.
 * 2. Upload to your site root (next to index.php).
 * 3. Visit:  https://jindrawebdev.com/resize-site-images.php?token=YOUR_SECRET
 *    Add &dry=1 first to preview without changing anything — recommended.
 * 4. Leave the tab open; it works in batches and reloads itself.
 * 5. Check the site looks right, then DELETE THIS FILE.
 *
 * Every original is copied to images/_originals/ before being touched, so
 * anything can be restored by copying it back.
 * ---------------------------------------------------------------------
 */

const SECRET     = 'change-me-to-something-random';
const IMG_DIR    = 'images';
const BACKUP_DIR = 'images/_originals';
const MAX_EDGE   = 1800;  // covers a ~900px slot on a 2x display
const QUALITY    = 82;
const BATCH_SIZE = 3;     // resizing costs more memory than converting

if (!isset($_GET['token']) || !hash_equals(SECRET, $_GET['token'])) {
    http_response_code(403);
    exit('Forbidden.');
}
$dry = isset($_GET['dry']) && $_GET['dry'] === '1';

@set_time_limit(0);
@ini_set('memory_limit', '512M');

$root   = __DIR__;
$imgDir = $root . '/' . IMG_DIR;
$bakDir = $root . '/' . BACKUP_DIR;

header('Content-Type: text/html; charset=utf-8');
echo '<!doctype html><meta charset="utf-8"><title>Resize site images</title>';
echo '<style>body{font:15px/1.6 system-ui,sans-serif;max-width:900px;margin:40px auto;padding:0 20px;color:#333}
      code{background:#f2f2f2;padding:2px 6px;border-radius:4px}
      .ok{color:#2e7d32}.warn{color:#b26a00}.err{color:#c62828}.muted{color:#888}
      table{border-collapse:collapse;width:100%;margin-top:16px}
      td,th{padding:5px 8px;border-bottom:1px solid #eee;font-size:13px;text-align:left}</style>';
echo '<h1>Resize site images</h1>';

if (!extension_loaded('gd') && !class_exists('Imagick')) {
    exit('<p class="err">No image library available. Enable <code>gd</code> in '
       . 'cPanel &rarr; Select PHP Version &rarr; Extensions.</p>');
}
$useImagick = class_exists('Imagick');

if (!is_dir($imgDir)) { exit('<p class="err">No <code>' . IMG_DIR . '</code> folder found.</p>'); }
if (!$dry && !is_dir($bakDir) && !@mkdir($bakDir, 0755, true)) {
    exit('<p class="err">Could not create backup folder.</p>');
}

// Only top-level images: subfolders like images/blog are already web-sized,
// and images/_originals must never be reprocessed.
$candidates = [];
foreach (scandir($imgDir) as $f) {
    $path = $imgDir . '/' . $f;
    if (!is_file($path) || !preg_match('/\.(jpe?g|png|webp)$/i', $f)) { continue; }
    $size = @getimagesize($path);
    if (!$size) { continue; }
    if (max($size[0], $size[1]) > MAX_EDGE) {
        $candidates[] = ['file' => $f, 'w' => $size[0], 'h' => $size[1], 'bytes' => filesize($path)];
    }
}

if (!$candidates) {
    exit('<h2 class="ok">Nothing to do.</h2><p>No image in <code>' . IMG_DIR
       . '</code> exceeds ' . MAX_EDGE . 'px on its long edge.</p>'
       . '<p class="warn">Remember to delete this script from the server.</p>');
}

$kb = fn($b) => number_format($b / 1024) . ' KB';

if ($dry) {
    $tot = 0;
    echo '<p class="warn"><strong>Dry run</strong> &mdash; nothing has been changed.</p>';
    echo '<table><tr><th>File</th><th>Current</th><th>Size</th><th>Will become</th></tr>';
    foreach ($candidates as $c) {
        $scale = MAX_EDGE / max($c['w'], $c['h']);
        printf('<tr><td>%s</td><td>%dx%d</td><td>%s</td><td>%dx%d</td></tr>',
            htmlspecialchars($c['file']), $c['w'], $c['h'], $kb($c['bytes']),
            (int) round($c['w'] * $scale), (int) round($c['h'] * $scale));
        $tot += $c['bytes'];
    }
    echo '</table>';
    echo '<p>' . count($candidates) . ' file(s), currently <strong>' . $kb($tot) . '</strong> in total.</p>';
    $go = htmlspecialchars($_SERVER['PHP_SELF']) . '?token=' . urlencode($_GET['token']);
    echo '<p><a href="' . $go . '"><strong>Run it for real &rarr;</strong></a></p>';
    exit;
}

// Anything already backed up has been processed; that is the resume marker.
$todo = array_values(array_filter($candidates,
    fn($c) => !file_exists($bakDir . '/' . $c['file'])));

$done = count($candidates) - count($todo);
echo '<p>' . $done . ' of ' . count($candidates) . ' oversized image(s) processed.</p>';

if (!$todo) {
    echo '<h2 class="ok">Finished.</h2>';
    echo '<p>Originals are in <code>' . BACKUP_DIR . '</code>. Check the site, then '
       . 'delete that folder to reclaim the space.</p>';
    echo '<p class="warn"><strong>Delete this script from the server now.</strong></p>';
    exit;
}

echo '<table><tr><th>File</th><th>Before</th><th>After</th><th>Saved</th></tr>';
foreach (array_slice($todo, 0, BATCH_SIZE) as $c) {
    $f    = $c['file'];
    $path = $imgDir . '/' . $f;
    $bak  = $bakDir . '/' . $f;

    try {
        if (!@copy($path, $bak)) { throw new RuntimeException('backup failed'); }
        $before = filesize($path);
        $isPng  = (bool) preg_match('/\.png$/i', $f);
        $isWebp = (bool) preg_match('/\.webp$/i', $f);

        if ($useImagick) {
            $im = new Imagick($path);
            $im->autoOrient();
            if ($c['w'] >= $c['h']) { $im->resizeImage(MAX_EDGE, 0, Imagick::FILTER_LANCZOS, 1); }
            else                    { $im->resizeImage(0, MAX_EDGE, Imagick::FILTER_LANCZOS, 1); }
            $im->setImageCompressionQuality(QUALITY);
            $im->stripImage();
            $im->writeImage($path);
            $im->destroy();
        } else {
            $src = $isWebp ? @imagecreatefromwebp($path)
                 : ($isPng ? @imagecreatefrompng($path) : @imagecreatefromjpeg($path));
            if (!$src) { throw new RuntimeException('could not decode'); }
            $scale = MAX_EDGE / max($c['w'], $c['h']);
            $dst = imagescale($src, (int) round($c['w'] * $scale), (int) round($c['h'] * $scale), IMG_BICUBIC);
            if (!$dst) { throw new RuntimeException('resize failed'); }
            if ($isPng) { imagealphablending($dst, false); imagesavealpha($dst, true); }
            if ($isWebp)      { imagewebp($dst, $path, QUALITY); }
            elseif ($isPng)   { imagepng($dst, $path, 6); }
            else              { imagejpeg($dst, $path, QUALITY); }
            imagedestroy($src); imagedestroy($dst);
        }

        clearstatcache(true, $path);
        $after = filesize($path);
        printf('<tr><td>%s</td><td>%s</td><td>%s</td><td class="ok">-%d%%</td></tr>',
            htmlspecialchars($f), $kb($before), $kb($after),
            $before ? round((1 - $after / $before) * 100) : 0);
    } catch (Throwable $e) {
        // Put the original back rather than leaving a half-written file live.
        if (file_exists($bak)) { @copy($bak, $path); }
        printf('<tr><td>%s</td><td colspan="3" class="err">failed: %s</td></tr>',
            htmlspecialchars($f), htmlspecialchars($e->getMessage()));
    }
    flush();
}
echo '</table>';

$next = htmlspecialchars($_SERVER['PHP_SELF']) . '?token=' . urlencode($_GET['token']);
echo '<p>Continuing&hellip; <a href="' . $next . '">click here if it stops</a></p>';
echo '<meta http-equiv="refresh" content="1;url=' . $next . '">';

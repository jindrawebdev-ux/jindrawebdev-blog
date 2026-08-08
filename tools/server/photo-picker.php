<?php
/**
 * Contact sheet for choosing photos — RUN, THEN DELETE.
 *
 * 331 files named CarlieKuhlmanPhotography-6231.webp are impossible to choose
 * between from a file listing. This lays them out as a grid, lets you click
 * the ones you want, and gives you the list to copy.
 *
 * ---------------------------------------------------------------------
 * 1. Change SECRET below.
 * 2. Upload to your site root.
 * 3. Visit:  https://jindrawebdev.com/photo-picker.php?token=YOUR_SECRET
 * 4. Click photos to select. The list at the top updates as you go.
 * 5. Copy the list, then DELETE THIS FILE from the server.
 *
 * Selections are kept in your browser, so you can close the tab and come
 * back without losing them.
 * ---------------------------------------------------------------------
 */

const SECRET  = 'change-me-to-something-random';
const DIR     = 'images/jindrawebdev-web';   // converted folder
const PER_PAGE = 60;

if (!isset($_GET['token']) || !hash_equals(SECRET, $_GET['token'])) {
    http_response_code(403);
    exit('Forbidden.');
}

$dir = __DIR__ . '/' . DIR;
if (!is_dir($dir)) {
    exit('Folder not found: ' . htmlspecialchars(DIR));
}

$files = [];
foreach (scandir($dir) as $f) {
    if (preg_match('/\.(webp|jpe?g|png)$/i', $f)) { $files[] = $f; }
}
natsort($files);
$files = array_values($files);

$page  = max(1, (int) ($_GET['p'] ?? 1));
$pages = max(1, (int) ceil(count($files) / PER_PAGE));
$page  = min($page, $pages);
$slice = array_slice($files, ($page - 1) * PER_PAGE, PER_PAGE);

$base = '/' . trim(DIR, '/') . '/';
$link = fn($p) => htmlspecialchars($_SERVER['PHP_SELF']) . '?token=' . urlencode($_GET['token']) . '&p=' . $p;
?><!doctype html>
<html lang="en"><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Photo picker</title>
<style>
  body{font:15px/1.6 system-ui,sans-serif;margin:0;padding:20px;background:#FBFAF7;color:#333}
  header{position:sticky;top:0;background:#FBFAF7;padding:14px 0 10px;border-bottom:2px solid #768473;z-index:5}
  h1{margin:0 0 8px;font-size:20px}
  .count{font-weight:700;color:#768473}
  textarea{width:100%;height:76px;font:13px ui-monospace,monospace;padding:8px;
           border:1px solid #ccc;border-radius:8px;background:#fff}
  .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(190px,1fr));gap:12px;margin-top:18px}
  figure{margin:0;background:#fff;border:3px solid transparent;border-radius:12px;overflow:hidden;
         cursor:pointer;transition:border-color .12s}
  figure.sel{border-color:#768473}
  figure img{width:100%;aspect-ratio:1;object-fit:cover;display:block;background:#eee}
  figcaption{font-size:11px;padding:6px;word-break:break-all;color:#666}
  figure.sel figcaption{background:#768473;color:#fff}
  nav{margin:24px 0;display:flex;gap:8px;flex-wrap:wrap;align-items:center}
  nav a,button{padding:8px 14px;border-radius:99px;border:1px solid #768473;background:#fff;
     color:#768473;text-decoration:none;font-weight:700;font-size:13px;cursor:pointer}
  nav a.on{background:#768473;color:#fff}
  .warn{background:#fff3cd;border:1px solid #e0c56d;padding:10px 14px;border-radius:8px;margin-top:20px}
</style></head><body>

<header>
  <h1>Photo picker &mdash; <span class="count" id="n">0</span> selected of <?php echo count($files); ?></h1>
  <textarea id="out" readonly placeholder="Click photos below; the filenames appear here."></textarea>
  <div style="margin-top:8px">
    <button onclick="copyList()">Copy list</button>
    <button onclick="clearAll()">Clear all</button>
  </div>
</header>

<div class="grid">
<?php foreach ($slice as $f): ?>
  <figure data-f="<?php echo htmlspecialchars($f); ?>">
    <img loading="lazy" src="<?php echo $base . rawurlencode($f); ?>" alt="">
    <figcaption><?php echo htmlspecialchars($f); ?></figcaption>
  </figure>
<?php endforeach; ?>
</div>

<nav>
  <?php if ($page > 1): ?><a href="<?php echo $link($page - 1); ?>">&larr; Prev</a><?php endif; ?>
  <?php for ($i = 1; $i <= $pages; $i++): ?>
    <a class="<?php echo $i === $page ? 'on' : ''; ?>" href="<?php echo $link($i); ?>"><?php echo $i; ?></a>
  <?php endfor; ?>
  <?php if ($page < $pages): ?><a href="<?php echo $link($page + 1); ?>">Next &rarr;</a><?php endif; ?>
</nav>

<p class="warn"><strong>When you are done:</strong> copy the list, then delete this file from the server.
Aim for 10&ndash;20 photos &mdash; a portrait, a couple of you working, a wide shot of your
space, and a few detail shots cover every slot on the site.</p>

<script>
// localStorage so selections survive paging and closing the tab.
const KEY = 'jwd-photo-picks';
let picks = JSON.parse(localStorage.getItem(KEY) || '[]');

function render() {
  document.getElementById('n').textContent = picks.length;
  document.getElementById('out').value = picks.join('\n');
  document.querySelectorAll('figure').forEach(el => {
    el.classList.toggle('sel', picks.includes(el.dataset.f));
  });
}
document.querySelectorAll('figure').forEach(el => {
  el.addEventListener('click', () => {
    const f = el.dataset.f;
    const i = picks.indexOf(f);
    if (i === -1) { picks.push(f); } else { picks.splice(i, 1); }
    localStorage.setItem(KEY, JSON.stringify(picks));
    render();
  });
});
function copyList() {
  const t = document.getElementById('out');
  t.select();
  navigator.clipboard.writeText(t.value).then(
    () => alert('Copied ' + picks.length + ' filenames.'),
    () => document.execCommand('copy')
  );
}
function clearAll() {
  if (!confirm('Clear all selections?')) return;
  picks = []; localStorage.setItem(KEY, '[]'); render();
}
render();
</script>
</body></html>

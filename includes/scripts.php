<?php
/**
 * Site-wide scripts + closes </body></html>.
 * Include last on every page, after includes/footer.php.
 *
 * Pages needing their own JS can set $page_scripts (raw JS, no <script>
 * wrapper) before including this file.
 */
if (!isset($page_scripts)) { $page_scripts = ""; }
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuOpenIcon = document.getElementById('mobile-menu-open-icon');
            const mobileMenuCloseIcon = document.getElementById('mobile-menu-close-icon');
            if (!mobileMenuButton || !mobileMenu) return;
            function closeMenu() {
                mobileMenu.classList.add('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
                mobileMenuButton.setAttribute('aria-label', 'Open mobile menu');
                if (mobileMenuOpenIcon) mobileMenuOpenIcon.classList.remove('hidden');
                if (mobileMenuCloseIcon) mobileMenuCloseIcon.classList.add('hidden');
            }
            mobileMenuButton.addEventListener('click', function () {
                const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                if (isExpanded) { closeMenu(); return; }
                mobileMenu.classList.remove('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'true');
                mobileMenuButton.setAttribute('aria-label', 'Close mobile menu');
                if (mobileMenuOpenIcon) mobileMenuOpenIcon.classList.add('hidden');
                if (mobileMenuCloseIcon) mobileMenuCloseIcon.classList.remove('hidden');
            });
            mobileMenu.querySelectorAll('a').forEach(function (link) { link.addEventListener('click', closeMenu); });
            document.addEventListener('keydown', function (event) { if (event.key === 'Escape') closeMenu(); });
        });
    </script>
<?php if ($page_scripts !== ''): ?>
    <script>
<?php echo $page_scripts; ?>
    </script>
<?php endif; ?>
</body>
</html>

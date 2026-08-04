<?php if (!isset($current_page)) { $current_page = ""; } ?>
<footer class="bg-brand-charcoal py-10 px-5 md:px-8 border-t border-white/10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6 text-[11px] uppercase tracking-[0.2em] font-bold text-white/55">
        <div>&copy; 2026 JindraWebDev</div>

        <div class="flex gap-4 items-center">
            <a href="mailto:contact@jindrawebdev.com" class="hover:text-white transition">Email</a>
            <a href="tel:4024506563" class="hover:text-white transition">402-450-6563</a>

            <a href="https://www.facebook.com/jindrawebdev" target="_blank" rel="noopener" class="w-10 h-10 rounded-full border border-white/15 text-white/70 flex items-center justify-center hover:text-white hover:border-white/40 hover:bg-white/10 transition" aria-label="JindraWebDev on Facebook">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12.061C22 6.505 17.523 2 12 2S2 6.505 2 12.061c0 5.022 3.657 9.184 8.438 9.939v-7.03h-2.54v-2.909h2.54V9.845c0-2.522 1.492-3.916 3.777-3.916 1.094 0 2.238.197 2.238.197v2.475h-1.26c-1.243 0-1.63.776-1.63 1.569v1.891h2.773l-.443 2.909h-2.33V22C18.343 21.245 22 17.083 22 12.061Z"/></svg>
            </a>

            <a href="https://www.instagram.com/jindrawebdev" target="_blank" rel="noopener" class="w-10 h-10 rounded-full border border-white/15 text-white/70 flex items-center justify-center hover:text-white hover:border-white/40 hover:bg-white/10 transition" aria-label="JindraWebDev on Instagram">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069Zm0-2.163C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0Zm0 5.838A6.162 6.162 0 1 0 12 18.162 6.162 6.162 0 0 0 12 5.838Zm0 10.162A4 4 0 1 1 12 8a4 4 0 0 1 0 8Zm6.406-11.845a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88Z"/></svg>
            </a>
        </div>

        <nav class="flex flex-wrap justify-center gap-6" aria-label="Footer navigation">
            <a href="/" class="<?php echo ($current_page == 'home') ? 'text-white transition' : 'hover:text-white transition'; ?>">Home</a>
            <a href="/about" class="<?php echo ($current_page == 'about') ? 'text-white transition' : 'hover:text-white transition'; ?>">About</a>
            <a href="/services" class="<?php echo ($current_page == 'services') ? 'text-white transition' : 'hover:text-white transition'; ?>">Services</a>
            <a href="/blog" class="<?php echo ($current_page == 'blog') ? 'text-white transition' : 'hover:text-white transition'; ?>">Blog</a>
            <a href="/contact" class="<?php echo ($current_page == 'contact') ? 'text-white transition' : 'hover:text-white transition'; ?>">Contact</a>
            <a href="/privacy" class="<?php echo ($current_page == 'privacy') ? 'text-white transition' : 'hover:text-white transition'; ?>">Privacy</a>
            <a href="/terms" class="<?php echo ($current_page == 'terms') ? 'text-white transition' : 'hover:text-white transition'; ?>">Terms</a>
            <a href="/accessibility" class="<?php echo ($current_page == 'accessibility') ? 'text-white transition' : 'hover:text-white transition'; ?>">Accessibility</a>
        </nav>
    </div>
</footer>

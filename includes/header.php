<?php
if (!isset($current_page)) { $current_page = ""; }
if (!function_exists('nav_class')) {
    function nav_class($page, $current_page) {
        if ($page == $current_page) { return "text-brand-dark transition"; }
        return "hover:text-brand-dark transition";
    }
}
if (!function_exists('mobile_nav_class')) {
    function mobile_nav_class($page, $current_page) {
        if ($page == $current_page) { return "block rounded-2xl px-5 py-4 transition bg-brand-dark text-white border border-brand-dark"; }
        return "block rounded-2xl px-5 py-4 transition bg-white border border-brand-dark/10 hover:border-brand-dark/30 text-brand-charcoal/75";
    }
}
?>
<header class="sticky top-0 z-50 bg-brand-cream/90 backdrop-blur border-b border-brand-dark/10">
    <nav class="max-w-7xl mx-auto px-5 md:px-8 py-4 flex items-center justify-between gap-4" aria-label="Main navigation">
        <a href="/" class="font-serif font-bold text-xl md:text-2xl tracking-wide text-brand-charcoal" aria-label="JindraWebDev home">JindraWebDev</a>

        <div class="hidden md:flex items-center gap-8 text-xs uppercase tracking-[0.22em] font-bold text-brand-charcoal/70">
            <a href="/" class="<?php echo nav_class('home', $current_page); ?>"<?php if ($current_page == 'home') { echo ' aria-current="page"'; } ?>>Home</a>
            <a href="/about" class="<?php echo nav_class('about', $current_page); ?>"<?php if ($current_page == 'about') { echo ' aria-current="page"'; } ?>>About</a>
            <a href="/services" class="<?php echo nav_class('services', $current_page); ?>"<?php if ($current_page == 'services') { echo ' aria-current="page"'; } ?>>Services</a>
            <a href="/blog" class="<?php echo nav_class('blog', $current_page); ?>"<?php if ($current_page == 'blog') { echo ' aria-current="page"'; } ?>>Blog</a>
            <a href="/contact" class="<?php echo nav_class('contact', $current_page); ?>"<?php if ($current_page == 'contact') { echo ' aria-current="page"'; } ?>>Contact</a>
        </div>

        <div class="hidden md:flex items-center gap-4">
            <a href="tel:4024506563" class="hidden lg:inline-flex text-xs uppercase tracking-[0.2em] font-bold text-brand-charcoal/60 hover:text-brand-dark transition">402-450-6563</a>
            <a href="/contact" class="rounded-full bg-brand-dark text-white px-5 py-2.5 text-xs uppercase tracking-[0.2em] font-bold hover:bg-brand-charcoal transition">Inquire</a>
        </div>

        <button id="mobile-menu-button" type="button" class="md:hidden inline-flex items-center gap-2 justify-center rounded-full border border-brand-dark/15 bg-white text-brand-charcoal px-4 py-3 text-xs uppercase tracking-[0.18em] font-bold hover:border-brand-dark/35 transition focus:outline-none focus:ring-2 focus:ring-brand-dark/40" aria-controls="mobile-menu" aria-expanded="false" aria-label="Open mobile menu">
            <span>Menu</span>
            <svg id="mobile-menu-open-icon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16"></path></svg>
            <svg id="mobile-menu-close-icon" class="hidden w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path></svg>
        </button>
    </nav>

    <div id="mobile-menu" class="hidden md:hidden border-t border-brand-dark/10 bg-brand-cream shadow-card">
        <nav class="px-5 py-5 space-y-3 text-sm uppercase tracking-[0.18em] font-bold" aria-label="Mobile navigation">
            <a href="/" class="<?php echo mobile_nav_class('home', $current_page); ?>"<?php if ($current_page == 'home') { echo ' aria-current="page"'; } ?>>Home</a>
            <a href="/about" class="<?php echo mobile_nav_class('about', $current_page); ?>"<?php if ($current_page == 'about') { echo ' aria-current="page"'; } ?>>About</a>
            <a href="/services" class="<?php echo mobile_nav_class('services', $current_page); ?>"<?php if ($current_page == 'services') { echo ' aria-current="page"'; } ?>>Services</a>
            <a href="/blog" class="<?php echo mobile_nav_class('blog', $current_page); ?>"<?php if ($current_page == 'blog') { echo ' aria-current="page"'; } ?>>Blog</a>
            <a href="/contact" class="<?php echo mobile_nav_class('contact', $current_page); ?>"<?php if ($current_page == 'contact') { echo ' aria-current="page"'; } ?>>Contact</a>
            <a href="/contact#contact-form" class="block rounded-full bg-brand-dark text-white text-center px-5 py-4 hover:bg-brand-charcoal transition">Start an inquiry</a>
            <a href="tel:4024506563" class="block rounded-full bg-white border border-brand-dark/10 text-center px-5 py-4 text-brand-charcoal/75 hover:border-brand-dark/30 transition">Call 402-450-6563</a>
        </nav>
    </div>
</header>

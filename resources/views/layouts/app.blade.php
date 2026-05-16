<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BuildCares') — Thoughtful Design, Lasting Care</title>
    <meta name="description" content="@yield('description', 'BuildCares is a freelance architectural design and CAD subcontractor specialising in planning drawings, loft conversions, extensions, garage conversions, and new builds for UK clients.')">

    <!-- Fonts: DM Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;1,9..40,400;1,9..40,600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="antialiased" style="background-color:#ffffff; color:#1e293b;">

    <header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-400">
        {{-- Top bar --}}
        <div id="topbar" class="border-b transition-all duration-400" style="background-color:#f8fafc; border-color:#e2e8f0;">
            <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-10 text-xs" style="color:#64748b;">
                <div class="hidden md:flex items-center gap-6">
                    <a href="mailto:anwar@buildcares.com" class="flex items-center gap-2 transition-colors hover:text-blue-600">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                        anwar@buildcares.com
                    </a>
                </div>
                <div class="flex items-center gap-4 ml-auto">
                    <div class="flex items-center gap-3">
                        @foreach(['M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.743l7.73-8.835L1.254 2.25H8.08l4.259 5.631zm-1.161 17.52h1.833L7.084 4.126H5.117z','M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z','M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z','M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z'] as $path)
                        <a href="#" class="hover:text-blue-600 transition-colors"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Main nav --}}
        <nav id="main-nav" class="border-b transition-all duration-400" style="background-color:rgba(255,255,255,0.98); border-color:#e2e8f0; backdrop-filter:blur(12px);">
            <div class="max-w-7xl mx-auto px-6 flex items-center justify-between py-4">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="/images/logo.svg" alt="BuildCares" class="h-10 w-auto">
                </a>

                <div class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('portfolio.index') }}" class="nav-link {{ request()->routeIs('portfolio.*') ? 'active' : '' }}">Portfolio</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact*') ? 'active' : '' }}">Contact</a>
                </div>

                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('contact') }}" class="btn-gold text-xs py-2.5 px-5">
                        Get a Quote
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                <button id="mobile-menu-btn" class="lg:hidden p-2 transition-colors" style="color:#475569;">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div id="mobile-menu" class="hidden lg:hidden border-t" style="background-color:#f8fafc; border-color:#e2e8f0;">
                <div class="px-6 py-4 space-y-1">
                    <a href="{{ route('home') }}" class="block py-3 text-xs font-semibold uppercase tracking-widest border-b transition-colors hover:text-blue-600" style="color:#475569; border-color:#e2e8f0;">Home</a>
                    <a href="{{ route('services.index') }}" class="block py-3 text-xs font-semibold uppercase tracking-widest border-b transition-colors hover:text-blue-600" style="color:#475569; border-color:#e2e8f0;">Services</a>
                    <a href="{{ route('portfolio.index') }}" class="block py-3 text-xs font-semibold uppercase tracking-widest border-b transition-colors hover:text-blue-600" style="color:#475569; border-color:#e2e8f0;">Portfolio</a>
                    <a href="{{ route('contact') }}" class="block py-3 text-xs font-semibold uppercase tracking-widest transition-colors hover:text-blue-600" style="color:#475569;">Contact</a>
                    <div class="pt-4"><a href="{{ route('contact') }}" class="btn-gold w-full text-center justify-center text-xs py-3">Get a Quote</a></div>
                </div>
            </div>
        </nav>
    </header>

    <main>@yield('content')</main>

    {{-- Footer --}}
    <footer style="background-color:#0f172a; border-top:1px solid rgba(255,255,255,0.06);">
        <div class="max-w-7xl mx-auto px-6 pt-16 pb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                <div class="lg:col-span-2">
                    <div class="mb-5">
                        <img src="/images/logo.svg" alt="BuildCares" class="h-10 w-auto brightness-0 invert opacity-70">
                    </div>
                    <p class="text-sm leading-relaxed max-w-xs mb-6" style="color:#64748b;">
                        Freelance architectural design and CAD subcontractor delivering precision drawings for UK construction projects.
                    </p>
                    <div class="space-y-2 text-sm" style="color:#64748b;">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 flex-shrink-0" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                            <a href="mailto:anwar@buildcares.com" class="hover:text-white transition-colors">anwar@buildcares.com</a>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 flex-shrink-0" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                            Monday – Sunday &nbsp; 9AM – 10PM
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold text-xs tracking-widest uppercase mb-4 gold-border-bottom inline-block" style="color:#f8fafc;">Services</h4>
                    <ul class="space-y-2 mt-4">
                        @foreach(['Garage Conversion','Loft Conversion','Extensions','New Build','Outbuilding','Internal Changes'] as $svc)
                        <li><a href="{{ route('services.index') }}" class="text-sm flex items-center gap-2 hover:text-white transition-colors" style="color:#64748b;"><span class="w-1 h-1 flex-shrink-0" style="background:#2563eb;"></span>{{ $svc }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-xs tracking-widest uppercase mb-4 gold-border-bottom inline-block" style="color:#f8fafc;">Quick Links</h4>
                    <ul class="space-y-2 mt-4">
                        @foreach([['Home',route('home')],['Portfolio',route('portfolio.index')],['Services',route('services.index')],['Contact',route('contact')],['Admin',route('admin.dashboard')]] as [$label,$href])
                        <li><a href="{{ $href }}" class="text-sm flex items-center gap-2 hover:text-white transition-colors" style="color:#64748b;"><span class="w-1 h-1 flex-shrink-0" style="background:#2563eb;"></span>{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4" style="border-top:1px solid rgba(255,255,255,0.06);">
                <p class="text-xs" style="color:#334155;">© {{ date('Y') }} BuildCares. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    @foreach(['M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.743l7.73-8.835L1.254 2.25H8.08l4.259 5.631zm-1.161 17.52h1.833L7.084 4.126H5.117z','M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z','M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z','M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z'] as $path)
                    <a href="#" class="hover:text-white transition-colors" style="color:#334155;"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg></a>
                    @endforeach
                </div>
            </div>
        </div>
    </footer>


    <button id="back-to-top" class="fixed bottom-20 right-8 z-40 w-10 h-10 border text-sm transition-all duration-300 opacity-0 translate-y-4 flex items-center justify-center" style="background:#0f172a; border-color:#2563eb; color:#60a5fa;" aria-label="Back to top">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
    </button>

    @stack('scripts')
    <script>
        const topbar = document.getElementById('topbar');
        const mainNav = document.getElementById('main-nav');
        const backToTop = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 60) {
                topbar.style.height = '0'; topbar.style.overflow = 'hidden'; topbar.style.opacity = '0';
                mainNav.style.boxShadow = '0 2px 16px rgba(15,23,42,0.1)';
                backToTop.classList.remove('opacity-0','translate-y-4');
                backToTop.classList.add('opacity-100','translate-y-0');
            } else {
                topbar.style.height = ''; topbar.style.overflow = ''; topbar.style.opacity = '1';
                mainNav.style.boxShadow = '';
                backToTop.classList.add('opacity-0','translate-y-4');
                backToTop.classList.remove('opacity-100','translate-y-0');
            }
        });
        backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        mobileBtn.addEventListener('click', () => {
            const isOpen = !mobileMenu.classList.contains('hidden');
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden', !isOpen);
            closeIcon.classList.toggle('hidden', isOpen);
        });
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('visible'); observer.unobserve(entry.target); } });
        }, { threshold: 0.08 });
        reveals.forEach(el => observer.observe(el));
    </script>
</body>
</html>

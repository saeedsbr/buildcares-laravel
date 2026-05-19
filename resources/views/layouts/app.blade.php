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
                    <a href="tel:+447586750755" class="flex items-center gap-2 transition-colors hover:text-blue-600">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                        +44 7586 750755
                    </a>
                </div>
            </div>
        </div>

        {{-- Main nav --}}
        <nav id="main-nav" class="border-b transition-all duration-400" style="background-color:rgba(255,255,255,0.98); border-color:#e2e8f0; backdrop-filter:blur(12px);">
            <div class="max-w-7xl mx-auto px-6 flex items-center justify-between py-4">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="/images/logo.jpeg" alt="BuildCares" class="h-12 w-auto">
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
                        <img src="/images/logo.jpeg" alt="BuildCares" class="h-12 w-auto">
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
                            <svg class="w-4 h-4 flex-shrink-0" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                            <a href="tel:+447586750755" class="hover:text-white transition-colors">+44 7586 750755</a>
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

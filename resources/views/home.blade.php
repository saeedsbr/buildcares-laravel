@extends('layouts.app')
@section('title', 'BuildCares — Architectural Design & CAD Services')
@section('content')

{{-- ═══ HERO ═══ --}}
<section class="relative min-h-screen flex items-center overflow-hidden" style="background-color:#f0f7ff;">
    {{-- Static background: blueprint grid + radial glow --}}
    <div class="absolute inset-0 z-0 pointer-events-none">
        <svg class="absolute inset-0 w-full h-full opacity-[0.05]" viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice">
            <defs>
                <pattern id="grid-sm" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#2563eb" stroke-width="0.5"/>
                </pattern>
                <pattern id="grid-lg" width="200" height="200" patternUnits="userSpaceOnUse">
                    <path d="M 200 0 L 0 0 0 200" fill="none" stroke="#2563eb" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid-sm)"/>
            <rect width="100%" height="100%" fill="url(#grid-lg)"/>
        </svg>
        <div class="absolute top-0 right-0 w-[900px] h-[900px] pointer-events-none" style="background:radial-gradient(circle at 75% 30%, rgba(37,99,235,0.10) 0%, transparent 65%);"></div>
    </div>

    {{-- Three.js ambient field: subtle drifting particles + wireframe shapes across the whole hero --}}
    <div id="hero-ambient-3d" class="absolute inset-0 z-[1] pointer-events-none" aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 pt-36 pb-24 w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="animate-fadeInUp" style="animation-delay:0.1s; font-family:'DM Sans',sans-serif; font-size:0.65rem; font-weight:700; letter-spacing:0.2em; text-transform:uppercase; color:#2563eb; display:flex; align-items:center; gap:0.625rem; margin-bottom:1.75rem;">
                    <span style="display:block;width:1.5rem;height:2px;background:#2563eb;flex-shrink:0;"></span>
                    Freelance-Based Subcontractor
                </div>

                <h1 class="animate-fadeInUp" style="animation-delay:0.2s; font-family:'DM Sans',sans-serif; font-size:clamp(2.75rem,5.5vw,4.5rem); font-weight:800; line-height:1.08; letter-spacing:-0.02em; color:#0f172a; margin-bottom:1.5rem;">
                    Thoughtful Design,<br>
                    <span style="color:#2563eb;">Lasting Care.</span>
                </h1>

                <p class="text-lg leading-relaxed max-w-md mb-10 animate-fadeInUp" style="animation-delay:0.3s; color:#64748b;">
                    Precision architectural drawings and CAD services for UK construction. From planning applications to building control — we deliver quality that gets approved.
                </p>

                <div class="flex flex-wrap gap-4 animate-fadeInUp" style="animation-delay:0.4s">
                    <a href="{{ route('portfolio.index') }}" class="btn-gold">
                        View Our Work
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="btn-outline-gold">Get a Quote</a>
                </div>

                <div class="flex flex-wrap items-center gap-6 mt-12 animate-fadeInUp" style="animation-delay:0.5s">
                    @foreach(['Planning Approved','3–5 Day Turnaround','UK Standards'] as $badge)
                    <div class="flex items-center gap-2 text-sm" style="color:#64748b;">
                        <svg class="w-4 h-4 flex-shrink-0" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $badge }}
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- 3D wireframe house — Three.js scene --}}
            <div class="relative hidden lg:block animate-fadeInUp" style="animation-delay:0.35s">
                <div class="relative">
                    {{-- Blueprint canvas frame (matches the rest of the design language) --}}
                    <div class="relative border shadow-xl" style="background:#ffffff; border-color:#dbeafe;">
                        <div class="p-2">
                            <div class="aspect-[4/3] relative overflow-hidden" style="background:linear-gradient(180deg,#f0f7ff 0%,#e6f0ff 100%);">
                                {{-- Subtle blueprint grid behind the 3D scene --}}
                                <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 400 300" preserveAspectRatio="none">
                                    <defs>
                                        <pattern id="bp-grid" width="20" height="20" patternUnits="userSpaceOnUse">
                                            <path d="M 20 0 L 0 0 0 20" fill="none" stroke="#dbeafe" stroke-width="0.8"/>
                                        </pattern>
                                    </defs>
                                    <rect width="400" height="300" fill="url(#bp-grid)"/>
                                </svg>

                                {{-- Three.js canvas mounts here --}}
                                <div id="hero-house-3d" class="absolute inset-0"></div>

                                {{-- Drawing-style labels on top --}}
                                <div class="absolute top-3 left-3 right-3 flex items-start justify-between pointer-events-none">
                                    <div class="text-[10px] uppercase tracking-[0.2em] font-bold" style="color:#2563eb;">3D Concept</div>
                                    <div class="text-right">
                                        <div class="text-[10px] font-bold" style="color:#60a5fa;">BuildCares</div>
                                        <div class="text-[9px]" style="color:#93c5fd;">Drawing No: BC-001</div>
                                    </div>
                                </div>
                                <div class="absolute bottom-3 left-3 right-3 flex items-end justify-between pointer-events-none">
                                    <div class="text-[10px] uppercase tracking-[0.2em]" style="color:#93c5fd;">Scale 1:50</div>
                                    <div class="text-[10px] uppercase tracking-[0.2em]" style="color:#93c5fd;">Rev. A</div>
                                </div>

                                {{-- Corner crops --}}
                                <div class="absolute top-3 left-3 w-5 h-5 border-l border-t pointer-events-none" style="border-color:#bfdbfe;"></div>
                                <div class="absolute top-3 right-3 w-5 h-5 border-r border-t pointer-events-none" style="border-color:#bfdbfe;"></div>
                                <div class="absolute bottom-3 left-3 w-5 h-5 border-l border-b pointer-events-none" style="border-color:#bfdbfe;"></div>
                                <div class="absolute bottom-3 right-3 w-5 h-5 border-r border-b pointer-events-none" style="border-color:#bfdbfe;"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating badges --}}
                    <div class="absolute -top-4 -right-4 px-4 py-3 text-sm font-semibold flex items-center gap-2 shadow-lg border" style="background:#ffffff; border-color:#dbeafe; color:#1e293b;">
                        <svg class="w-4 h-4" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        Planning Approved
                    </div>
                    <div class="absolute -bottom-4 -left-4 px-4 py-3 shadow-lg border" style="background:#ffffff; border-color:#dbeafe;">
                        <div class="text-xs uppercase tracking-wider font-bold" style="color:#94a3b8;">Turnaround</div>
                        <div class="font-bold text-xl" style="color:#2563eb;">3–5 Days</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce">
        <span class="text-xs tracking-widest uppercase" style="color:#94a3b8;">Scroll</span>
        <svg class="w-4 h-4" style="color:#2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </div>
</section>


{{-- ═══ HOUSE DESIGNS ═══ --}}
<section class="section-padding relative overflow-hidden" style="background-color:#0f172a;">
    {{-- Subtle blueprint grid background --}}
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice">
            <defs>
                <pattern id="hd-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#2563eb" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#hd-grid)"/>
        </svg>
    </div>
    <div class="absolute top-0 left-0 w-[600px] h-[600px] pointer-events-none" style="background:radial-gradient(circle at 20% 30%, rgba(37,99,235,0.08) 0%, transparent 65%);"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] pointer-events-none" style="background:radial-gradient(circle at 80% 80%, rgba(37,99,235,0.06) 0%, transparent 65%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <div class="section-label justify-center reveal">Our Expertise</div>
            <h2 class="section-title-light reveal">House Designs We Specialise In</h2>
            <p class="leading-relaxed max-w-2xl mx-auto reveal" style="color:#94a3b8;">From loft conversions to full new builds — explore the architectural design services we deliver with precision and care across the UK.</p>
        </div>

        @php
        $houseDesigns = [
            [
                'img'    => Storage::url('portfolio/cat-loft-conversion.jpg'),
                'title'  => 'Loft Conversion',
                'badge'  => 'Popular',
                'badgeColor' => '#10b981',
                'desc'   => 'Unlock your loft\'s potential with dormer or hip-to-gable conversions, fully drawn to approval standard.',
                'slug'   => 'loft-conversion',
                'highlights' => ['Dormer & Velux', 'Hip-to-Gable', 'Planning Approved', 'Extra Bedroom'],
            ],
            [
                'img'    => Storage::url('portfolio/cat-extension.jpg'),
                'title'  => 'Double Storey Extension',
                'badge'  => 'Premium',
                'badgeColor' => '#a855f7',
                'desc'   => 'Expand both floors outward with a perfectly matched two-storey side or rear extension.',
                'slug'   => 'extension',
                'highlights' => ['Two-Storey', 'Side & Rear', 'Max Space', 'Building Regs'],
            ],
            [
                'img'    => '/images/house-designs/rear-extension.png',
                'title'  => 'Single Storey Rear Extension',
                'badge'  => 'Trending',
                'badgeColor' => '#f97316',
                'desc'   => 'Open up your ground floor with a stunning single-storey extension featuring bi-fold doors and skylights.',
                'slug'   => 'extension',
                'highlights' => ['Bi-fold Doors', 'Open Plan', 'Skylights', 'Kitchen Diner'],
            ],
            [
                'img'    => Storage::url('portfolio/cat-garage-conversion.jpg'),
                'title'  => 'Garage Conversion',
                'badge'  => 'Best Value',
                'badgeColor' => '#06b6d4',
                'desc'   => 'Transform your garage into valuable living space with detailed planning and building control drawings.',
                'slug'   => 'garage-conversion',
                'highlights' => ['Cost Effective', 'Quick Build', 'No Planning Needed', 'Extra Room'],
            ],
            [
                'img'    => Storage::url('portfolio/cat-new-build.jpg'),
                'title'  => 'New Build',
                'badge'  => 'Full Package',
                'badgeColor' => '#2563eb',
                'desc'   => 'Complete architectural packages for new residential builds from concept through to planning submission.',
                'slug'   => 'new-build',
                'highlights' => ['Full Design', 'Planning Pack', 'Building Control', 'Bespoke'],
            ],
            [
                'img'    => Storage::url('portfolio/cat-outbuilding.jpg'),
                'title'  => 'Outbuilding & Garden Room',
                'badge'  => 'Lifestyle',
                'badgeColor' => '#84cc16',
                'desc'   => 'Garden rooms, home offices, studios and annexes — full drawings for permitted development or planning.',
                'slug'   => 'outbuilding',
                'highlights' => ['Home Office', 'Garden Studio', 'Annexe', 'Permitted Dev'],
            ],
        ];
        @endphp

        {{-- Top row: 3 large cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
            @foreach(array_slice($houseDesigns, 0, 3) as $i => $design)
            <a href="{{ route('portfolio.index', ['category' => $design['slug']]) }}"
               class="house-design-card group block reveal" style="animation-delay:{{ $i * 0.1 }}s;">
                <div class="relative overflow-hidden border transition-all duration-500 group-hover:border-blue-500/40 group-hover:shadow-2xl group-hover:shadow-blue-500/10 group-hover:-translate-y-1"
                     style="background:#1e293b; border-color:rgba(255,255,255,0.06);">

                    {{-- Image --}}
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ $design['img'] }}" alt="{{ $design['title'] }}" loading="lazy"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                        {{-- Dark gradient overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent"></div>

                        {{-- Centered title overlay --}}
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none px-4">
                            <h3 class="text-center text-2xl sm:text-3xl md:text-2xl lg:text-3xl font-extrabold text-white drop-shadow-lg" style="letter-spacing:0.02em;">{{ $design['title'] }}</h3>
                        </div>

                        {{-- Badge --}}
                        <div class="absolute top-4 left-4 flex items-center gap-2">
                            <span class="px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.15em] text-white"
                                  style="background:{{ $design['badgeColor'] }};">
                                {{ $design['badge'] }}
                            </span>
                        </div>

                        {{-- Sheet number --}}
                        <div class="absolute top-4 right-4 text-right pointer-events-none">
                            <div class="text-[9px] font-bold" style="color:rgba(255,255,255,0.5);">BuildCares</div>
                            <div class="text-[8px]" style="color:rgba(255,255,255,0.3);">Design {{ sprintf('%02d', $i + 1) }}</div>
                        </div>

                        {{-- Highlights / tags overlay at bottom of image --}}
                        <div class="absolute bottom-3 left-4 right-4 flex flex-wrap gap-1.5">
                            @foreach($design['highlights'] as $hl)
                            <span class="px-2 py-1 text-[9px] font-semibold uppercase tracking-wider text-white/90 backdrop-blur-sm"
                                  style="background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.15);">
                                {{ $hl }}
                            </span>
                            @endforeach
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2 transition-colors group-hover:text-blue-400" style="color:#f8fafc;">
                            {{ $design['title'] }}
                        </h3>
                        <p class="text-sm leading-relaxed mb-4 line-clamp-2" style="color:#94a3b8;">
                            {{ $design['desc'] }}
                        </p>
                        <div class="flex items-center justify-between pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <span class="text-[10px] uppercase tracking-[0.12em] font-medium" style="color:#475569;">Planning Ready</span>
                            <span class="text-xs font-bold uppercase tracking-widest flex items-center gap-1.5 group-hover:gap-2.5 transition-all" style="color:#2563eb;">
                                View Projects
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Bottom row: 3 cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach(array_slice($houseDesigns, 3, 3) as $i => $design)
            <a href="{{ route('portfolio.index', ['category' => $design['slug']]) }}"
               class="house-design-card group block reveal" style="animation-delay:{{ ($i + 3) * 0.1 }}s;">
                <div class="relative overflow-hidden border transition-all duration-500 group-hover:border-blue-500/40 group-hover:shadow-2xl group-hover:shadow-blue-500/10 group-hover:-translate-y-1"
                     style="background:#1e293b; border-color:rgba(255,255,255,0.06);">

                    {{-- Image --}}
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ $design['img'] }}" alt="{{ $design['title'] }}" loading="lazy"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                        {{-- Dark gradient overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent"></div>

                        {{-- Centered title overlay --}}
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none px-4">
                            <h3 class="text-center text-2xl sm:text-3xl md:text-2xl lg:text-3xl font-extrabold text-white drop-shadow-lg" style="letter-spacing:0.02em;">{{ $design['title'] }}</h3>
                        </div>

                        {{-- Badge --}}
                        <div class="absolute top-4 left-4 flex items-center gap-2">
                            <span class="px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.15em] text-white"
                                  style="background:{{ $design['badgeColor'] }};">
                                {{ $design['badge'] }}
                            </span>
                        </div>

                        {{-- Sheet number --}}
                        <div class="absolute top-4 right-4 text-right pointer-events-none">
                            <div class="text-[9px] font-bold" style="color:rgba(255,255,255,0.5);">BuildCares</div>
                            <div class="text-[8px]" style="color:rgba(255,255,255,0.3);">Design {{ sprintf('%02d', $i + 4) }}</div>
                        </div>

                        {{-- Highlights / tags overlay at bottom of image --}}
                        <div class="absolute bottom-3 left-4 right-4 flex flex-wrap gap-1.5">
                            @foreach($design['highlights'] as $hl)
                            <span class="px-2 py-1 text-[9px] font-semibold uppercase tracking-wider text-white/90 backdrop-blur-sm"
                                  style="background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.15);">
                                {{ $hl }}
                            </span>
                            @endforeach
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2 transition-colors group-hover:text-blue-400" style="color:#f8fafc;">
                            {{ $design['title'] }}
                        </h3>
                        <p class="text-sm leading-relaxed mb-4 line-clamp-2" style="color:#94a3b8;">
                            {{ $design['desc'] }}
                        </p>
                        <div class="flex items-center justify-between pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <span class="text-[10px] uppercase tracking-[0.12em] font-medium" style="color:#475569;">Planning Ready</span>
                            <span class="text-xs font-bold uppercase tracking-widest flex items-center gap-1.5 group-hover:gap-2.5 transition-all" style="color:#2563eb;">
                                View Projects
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Bottom CTA row --}}
        <div class="text-center mt-12 reveal">
            <a href="{{ route('portfolio.index') }}" class="btn-outline-gold-dark inline-flex items-center gap-2 text-sm">
                View All Projects
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>



{{-- ═══ WHAT WE DEAL IN ═══ --}}
<section class="section-padding" style="background-color:#f8fafc;">
    <div class="max-w-7xl mx-auto px-6">
        @php
        $serviceShowcase = [
            ['title' => 'Loft Conversion', 'img' => '/images/house-designs/loft-conversion.png', 'slug' => 'loft-conversion'],
            ['title' => 'Double Storey Extension', 'img' => '/images/house-designs/double-storey.png', 'slug' => 'extension'],
            ['title' => 'Single Storey Rear Extension', 'img' => '/images/house-designs/rear-extension.png', 'slug' => 'extension'],
            ['title' => 'Garage Conversion', 'img' => '/images/house-designs/garage-conversion.png', 'slug' => 'garage-conversion'],
            ['title' => 'New Build', 'img' => '/images/house-designs/new-build.png', 'slug' => 'new-build'],
            ['title' => 'Outbuilding & Garden Room', 'img' => '/images/house-designs/outbuilding.png', 'slug' => 'outbuilding'],
        ];
        @endphp

        <div class="grid lg:grid-cols-2 gap-16 items-start">
            <div>
                <div class="section-label reveal">Specialisation</div>
                <h2 class="section-title reveal">What We Deliver</h2>
                <p class="leading-relaxed mb-8 reveal" style="color:#64748b;">
                    As specialist CAD technicians and architectural designers, we produce drawings that planners and builders can rely on — precise, compliant, and delivered fast.
                </p>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    @foreach($serviceShowcase as $i => $item)
                    <a href="{{ route('portfolio.index', ['category' => $item['slug']]) }}" class="group reveal block overflow-hidden border bg-white" style="animation-delay:{{ $i * 0.08 }}s; border-color:#e2e8f0;">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>
                            <div class="absolute inset-0 flex items-end p-4">
                                <h4 class="text-sm font-bold leading-tight text-white drop-shadow-lg">{{ $item['title'] }}</h4>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div>
                <div class="section-label reveal">Tools of the Trade</div>
                <h3 class="font-bold text-2xl mb-8 reveal" style="color:#0f172a;">Software We Use</h3>
                <div class="grid grid-cols-2 gap-3">
                    @foreach([['SketchUp','3D Modelling','#0097D4'],['Autodesk Revit','BIM & 3D','#0696D7'],['AutoCAD','2D Drafting','#D2232A'],['Adobe Photoshop','Rendering','#31A8FF']] as $i => [$name, $type, $color])
                    <div class="card-light p-5 flex items-center gap-4 reveal" style="animation-delay:{{ $i * 0.08 }}s">
                        <div class="w-10 h-10 flex items-center justify-center flex-shrink-0" style="background-color:{{ $color }}15; border:1px solid {{ $color }}30;">
                            <span class="text-xs font-bold" style="color:{{ $color }};">{{ substr($name,0,2) }}</span>
                        </div>
                        <div>
                            <div class="font-semibold text-sm" style="color:#0f172a;">{{ $name }}</div>
                            <div class="text-xs" style="color:#94a3b8;">{{ $type }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ═══ WHY CHOOSE US ═══ --}}
<section class="section-padding bg-white border-t" style="border-color:#e2e8f0;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <div class="section-label justify-center reveal">Our Advantage</div>
            <h2 class="section-title reveal">Why Choose BuildCares</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['Expertise & Precision','CAD excellence with meticulous attention to every measurement and detail.','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                ['Cost-Effective','Competitive pricing without compromising quality — professional results at fair rates.','M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['Full Service Range','2D drawings, 3D models, Photoshop renders, Revit BIM — everything under one roof.','M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
                ['Fast Turnaround','Most projects delivered in 3–5 working days. Urgent submissions catered for.','M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
            ] as $i => [$title, $desc, $icon])
            <div class="card-light p-6 reveal" style="animation-delay:{{ $i * 0.1 }}s">
                <div class="w-12 h-12 flex items-center justify-center mb-5" style="background:#eff6ff; border:1px solid #dbeafe;">
                    <svg class="w-5 h-5" style="color:#2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $icon }}"/>
                    </svg>
                </div>
                <h3 class="font-bold text-sm mb-2" style="color:#0f172a;">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color:#64748b;">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══ ABOUT ═══ --}}
<section class="section-padding" style="background-color:#0f172a;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative reveal">
                <div class="p-6 border" style="background:rgba(30,41,59,0.8); border-color:rgba(37,99,235,0.2);">
                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div class="aspect-video flex items-center justify-center border" style="background:#080f1e; border-color:rgba(255,255,255,0.05);">
                            <svg class="w-10 h-10" style="color:rgba(37,99,235,0.3);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <div class="aspect-video flex items-center justify-center border" style="background:#080f1e; border-color:rgba(255,255,255,0.05);">
                            <svg class="w-10 h-10" style="color:rgba(37,99,235,0.3);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        </div>
                    </div>
                    <div class="p-4 border" style="background:#080f1e; border-color:rgba(255,255,255,0.05);">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-9 h-9 flex items-center justify-center text-white font-bold text-sm flex-shrink-0" style="background:#2563eb;">A</div>
                            <div>
                                <div class="text-sm font-semibold" style="color:#f8fafc;">Anwar</div>
                                <div class="text-xs" style="color:#475569;">Architectural Designer & CAD Technician</div>
                            </div>
                        </div>
                        <div class="space-y-2.5">
                            @foreach(['Technical Drawings','Design Modifications','3D Modelling','Documentation'] as $skill)
                            <div class="flex items-center gap-2">
                                <div class="flex-1 h-1.5 overflow-hidden" style="background:#1e293b;">
                                    <div class="h-full" style="background:linear-gradient(to right,#1d4ed8,#2563eb);width:{{ rand(78,95) }}%"></div>
                                </div>
                                <span class="text-xs w-28 text-right" style="color:#475569;">{{ $skill }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="section-label reveal">About Us</div>
                <h2 class="section-title-light reveal">Architectural Designer & CAD Technician</h2>
                <p class="leading-relaxed mb-6 reveal" style="color:#64748b;">
                    BuildCares is a Pakistan-based freelance architectural drawing service specialising in UK residential projects. We act as a skilled subcontractor, working directly with architects, builders and homeowners.
                </p>
                <p class="leading-relaxed mb-8 reveal" style="color:#64748b;">
                    Using industry-leading software — AutoCAD, Revit, SketchUp and Photoshop — we produce precise, professional drawings that meet UK planning and building control standards, delivered fast.
                </p>
                <ul class="space-y-3 mb-10 reveal">
                    @foreach(['Technical drawings for planning applications','Building regulations compliance drawings','3D visualisations and photorealistic renders','Fast turnaround with clear communication','Competitive rates with no compromise on quality'] as $point)
                    <li class="flex items-center gap-3 text-sm" style="color:#94a3b8;">
                        <span class="w-1.5 h-1.5 flex-shrink-0 rounded-full" style="background:#2563eb;"></span>
                        {{ $point }}
                    </li>
                    @endforeach
                </ul>
                <div class="flex gap-4 reveal">
                    <a href="{{ route('contact') }}" class="btn-gold">Start a Project</a>
                    <a href="{{ route('portfolio.index') }}" class="btn-outline-gold-dark">See Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ═══ CTA ═══ --}}
<section class="relative py-20 overflow-hidden border-t" style="background-color:#f8fafc; border-color:#e2e8f0;">
    <div class="absolute inset-0 pointer-events-none opacity-[0.04]">
        <svg class="w-full h-full" viewBox="0 0 1440 300" preserveAspectRatio="xMidYMid slice">
            <defs><pattern id="cta-grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="#2563eb" stroke-width="0.8"/></pattern></defs>
            <rect width="100%" height="100%" fill="url(#cta-grid)"/>
        </svg>
    </div>
    <div class="absolute left-0 top-0 bottom-0 w-1" style="background:#2563eb;"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
        <div class="section-label justify-center reveal">Ready to Build?</div>
        <h2 class="section-title reveal">Have a Project in Mind?</h2>
        <p class="text-lg mb-10 reveal max-w-xl mx-auto" style="color:#64748b;">
            Get in touch today for a free consultation and quote. Most enquiries receive a response within a few hours.
        </p>
        <div class="flex flex-wrap gap-4 justify-center reveal">
            <a href="{{ route('contact') }}" class="btn-gold text-sm px-8 py-4">
                Get a Free Quote
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection

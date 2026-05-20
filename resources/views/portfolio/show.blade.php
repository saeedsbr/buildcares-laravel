@extends('layouts.app')

@section('title', $item->title . ' — BuildCares Portfolio')
@section('description', $item->description ?? 'View this ' . $item->category_label . ' project by BuildCares.')

@section('content')

{{-- Page header --}}
<section class="pt-32 pb-8 border-b" style="background-color:#f8fafc; border-color:#e2e8f0;">
    <div class="max-w-7xl mx-auto px-6">
        <a href="{{ route('portfolio.index') }}" class="inline-flex items-center gap-2 text-sm mb-6 transition-colors hover:text-blue-600" style="color:#64748b;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
            Back to Portfolio
        </a>
        <span class="inline-block text-xs font-bold uppercase tracking-widest px-3 py-1 mb-4" style="background:#2563eb; color:#ffffff;">{{ $item->category_label }}</span>
        <h1 class="font-bold text-3xl md:text-5xl mb-4" style="color:#0f172a; font-family:'DM Sans',sans-serif; line-height:1.1;">{{ $item->title }}</h1>
        <div class="flex flex-wrap items-center gap-5 text-sm" style="color:#64748b;">
            @if($item->location)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 flex-shrink-0" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                {{ $item->location }}
            </span>
            @endif
            @if($item->year)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 flex-shrink-0" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                {{ $item->year }}
            </span>
            @endif
            @if($item->client)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 flex-shrink-0" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                {{ $item->client }}
            </span>
            @endif
        </div>
    </div>
</section>

{{-- Cover image --}}
<div style="background-color:#f8fafc;">
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="relative group inline-block w-full">
            <img src="{{ Storage::url($item->cover_image) }}" alt="{{ $item->title }}"
                 class="lightbox-trigger w-full object-contain" style="max-height:620px; border:1px solid #e2e8f0; cursor:zoom-in;">
            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none" style="background:rgba(0,0,0,0.08);">
                <div class="flex items-center gap-2 px-4 py-2 text-sm font-semibold" style="background:rgba(255,255,255,0.95); color:#0f172a; border:1px solid #e2e8f0;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                    Click to zoom
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Lightbox modal --}}
<div id="lightbox" class="fixed inset-0 z-[9999] hidden items-center justify-center p-4" style="background:rgba(0,0,0,0.92);">
    <button id="lightbox-close" class="absolute top-5 right-5 w-10 h-10 flex items-center justify-center transition-colors" style="color:#ffffff; background:rgba(255,255,255,0.12);" aria-label="Close">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <div class="relative w-full h-full flex items-center justify-center overflow-hidden" id="lightbox-inner">
        <img id="lightbox-img" src="" alt="" class="select-none" style="max-width:100%; max-height:100%; object-fit:contain; transform-origin:center; transition:transform 0.2s ease; cursor:grab;">
    </div>
    <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex items-center gap-3">
        <button id="lb-zoom-out" class="w-9 h-9 flex items-center justify-center text-sm font-bold transition-colors" style="background:rgba(255,255,255,0.12); color:#ffffff;">−</button>
        <span id="lb-zoom-label" class="text-xs w-12 text-center" style="color:#94a3b8;">100%</span>
        <button id="lb-zoom-in" class="w-9 h-9 flex items-center justify-center text-sm font-bold transition-colors" style="background:rgba(255,255,255,0.12); color:#ffffff;">+</button>
        <button id="lb-zoom-reset" class="px-3 h-9 flex items-center justify-center text-xs transition-colors" style="background:rgba(255,255,255,0.12); color:#ffffff;">Reset</button>
    </div>
</div>

{{-- Content --}}
<section class="section-padding" style="background-color:#ffffff;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-12">
            {{-- Main --}}
            <div class="lg:col-span-2">
                @if($item->description)
                <div class="mb-10">
                    <h2 class="font-bold text-xl mb-4" style="color:#0f172a;">Project Overview</h2>
                    <div class="leading-relaxed space-y-4" style="color:#475569;">
                        {!! nl2br(e($item->description)) !!}
                    </div>
                </div>
                @endif

                {{-- Gallery --}}
                @if($item->gallery_images && count($item->gallery_images))
                <div>
                    <h2 class="font-bold text-xl mb-6" style="color:#0f172a;">Project Gallery</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($item->gallery_images as $img)
                        <div class="lightbox-trigger portfolio-card rounded-md overflow-hidden" data-src="{{ Storage::url($img) }}" style="cursor:zoom-in;">
                            <img src="{{ Storage::url($img) }}" alt="Gallery image" loading="lazy">
                            <div class="overlay">
                                <div class="flex items-center justify-center h-full">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Project details --}}
                <div class="p-6 border" style="background:#f8fafc; border-color:#e2e8f0;">
                    <h3 class="font-semibold text-lg mb-5" style="color:#0f172a;">Project Details</h3>
                    <dl class="space-y-4">
                        <div>
                            <dt class="text-xs uppercase tracking-widest mb-1" style="color:#94a3b8;">Type</dt>
                            <dd class="text-sm font-medium" style="color:#1e293b;">{{ $item->category_label }}</dd>
                        </div>
                        @if($item->location)
                        <div>
                            <dt class="text-xs uppercase tracking-widest mb-1" style="color:#94a3b8;">Location</dt>
                            <dd class="text-sm font-medium" style="color:#1e293b;">{{ $item->location }}</dd>
                        </div>
                        @endif
                        @if($item->year)
                        <div>
                            <dt class="text-xs uppercase tracking-widest mb-1" style="color:#94a3b8;">Year</dt>
                            <dd class="text-sm font-medium" style="color:#1e293b;">{{ $item->year }}</dd>
                        </div>
                        @endif
                        @if($item->client)
                        <div>
                            <dt class="text-xs uppercase tracking-widest mb-1" style="color:#94a3b8;">Client</dt>
                            <dd class="text-sm font-medium" style="color:#1e293b;">{{ $item->client }}</dd>
                        </div>
                        @endif
                        @if($item->tags && count($item->tags))
                        <div>
                            <dt class="text-xs uppercase tracking-widest mb-2" style="color:#94a3b8;">Tags</dt>
                            <dd class="flex flex-wrap gap-2">
                                @foreach($item->tags as $tag)
                                <span class="text-xs px-2 py-1 border" style="background:#ffffff; border-color:#e2e8f0; color:#475569;">{{ $tag }}</span>
                                @endforeach
                            </dd>
                        </div>
                        @endif
                    </dl>
                </div>

                {{-- CTA --}}
                <div class="p-6 border" style="background:#eff6ff; border-color:#bfdbfe;">
                    <h3 class="font-semibold mb-3" style="color:#0f172a;">Similar Project?</h3>
                    <p class="text-sm mb-5" style="color:#475569;">Get in touch to discuss your {{ $item->category_label }} project and receive a free quote.</p>
                    <a href="{{ route('contact') }}?service={{ $item->category }}" class="btn-gold w-full justify-center text-sm">Get a Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Related projects --}}
@if($related->count())
<section class="py-16 border-t" style="background-color:#f8fafc; border-color:#e2e8f0;">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="font-bold text-2xl mb-8" style="color:#0f172a;">Related Projects</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($related as $rel)
            <a href="{{ route('portfolio.show', $rel->slug) }}" class="portfolio-card rounded-lg">
                <img src="{{ Storage::url($rel->cover_image) }}" alt="{{ $rel->title }}" loading="lazy">
                <div class="overlay">
                    <span class="text-xs font-semibold uppercase tracking-widest mb-1" style="color:#93c5fd;">{{ $rel->category_label }}</span>
                    <h3 class="text-white font-semibold text-base">{{ $rel->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@push('scripts')
<script>
(function () {
    const lightbox  = document.getElementById('lightbox');
    const lbImg     = document.getElementById('lightbox-img');
    const lbInner   = document.getElementById('lightbox-inner');
    const lbClose   = document.getElementById('lightbox-close');
    const lbZoomIn  = document.getElementById('lb-zoom-in');
    const lbZoomOut = document.getElementById('lb-zoom-out');
    const lbReset   = document.getElementById('lb-zoom-reset');
    const lbLabel   = document.getElementById('lb-zoom-label');

    let scale = 1, tx = 0, ty = 0;
    let isDragging = false, dragX, dragY, dragTx, dragTy;
    let lastTouchDist = null, isTouchPan = false, touchPanX, touchPanY, touchPanTx, touchPanTy;
    const STEP = 0.3, MIN = 0.5, MAX = 8;

    function containerCenter() {
        const r = lbInner.getBoundingClientRect();
        return { x: r.left + r.width / 2, y: r.top + r.height / 2 };
    }

    function applyTransform(animated) {
        lbImg.style.transition = animated ? 'transform 0.18s ease' : 'none';
        lbImg.style.transform = `translate(${tx}px, ${ty}px) scale(${scale})`;
        lbLabel.textContent = Math.round(scale * 100) + '%';
        if (!isDragging) lbImg.style.cursor = scale > 1 ? 'grab' : 'zoom-in';
    }

    // Zoom toward an arbitrary screen point (mx, my)
    function zoomAt(mx, my, newScale) {
        newScale = Math.min(MAX, Math.max(MIN, newScale));
        const c = containerCenter();
        const ratio = newScale / scale;
        tx = (mx - c.x) * (1 - ratio) + tx * ratio;
        ty = (my - c.y) * (1 - ratio) + ty * ratio;
        scale = newScale;
        applyTransform(false);
    }

    function reset(animated) {
        scale = 1; tx = 0; ty = 0;
        applyTransform(animated !== false);
    }

    function openLightbox(src) {
        lbImg.src = src;
        reset(false);
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = '';
        lbImg.src = '';
    }

    // Open triggers
    document.querySelectorAll('.lightbox-trigger').forEach(el => {
        el.addEventListener('click', () => {
            const src = el.dataset.src || el.src || el.querySelector('img')?.src;
            if (src) openLightbox(src);
        });
    });

    lbClose.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });

    // Mouse wheel — zoom toward cursor
    lbInner.addEventListener('wheel', e => {
        e.preventDefault();
        zoomAt(e.clientX, e.clientY, scale + (e.deltaY < 0 ? STEP : -STEP));
    }, { passive: false });

    // Double-click — zoom in at point, or reset if already zoomed
    lbImg.addEventListener('dblclick', e => {
        scale >= 2.5 ? reset() : zoomAt(e.clientX, e.clientY, scale * 2);
    });

    // Mouse drag to pan when zoomed
    lbImg.addEventListener('mousedown', e => {
        if (scale <= 1) return;
        isDragging = true;
        dragX = e.clientX; dragY = e.clientY;
        dragTx = tx; dragTy = ty;
        lbImg.style.cursor = 'grabbing';
        e.preventDefault();
    });
    document.addEventListener('mousemove', e => {
        if (!isDragging) return;
        tx = dragTx + (e.clientX - dragX);
        ty = dragTy + (e.clientY - dragY);
        applyTransform(false);
    });
    document.addEventListener('mouseup', () => {
        if (isDragging) { isDragging = false; lbImg.style.cursor = scale > 1 ? 'grab' : 'zoom-in'; }
    });

    // Touch: pinch-to-zoom + single-finger pan
    lbInner.addEventListener('touchstart', e => {
        if (e.touches.length === 2) {
            lastTouchDist = Math.hypot(
                e.touches[0].clientX - e.touches[1].clientX,
                e.touches[0].clientY - e.touches[1].clientY
            );
            isTouchPan = false;
        } else if (e.touches.length === 1 && scale > 1) {
            isTouchPan = true;
            touchPanX = e.touches[0].clientX; touchPanY = e.touches[0].clientY;
            touchPanTx = tx; touchPanTy = ty;
        }
    }, { passive: true });

    lbInner.addEventListener('touchmove', e => {
        e.preventDefault();
        if (e.touches.length === 2 && lastTouchDist) {
            const newDist = Math.hypot(
                e.touches[0].clientX - e.touches[1].clientX,
                e.touches[0].clientY - e.touches[1].clientY
            );
            const mx = (e.touches[0].clientX + e.touches[1].clientX) / 2;
            const my = (e.touches[0].clientY + e.touches[1].clientY) / 2;
            zoomAt(mx, my, scale * (newDist / lastTouchDist));
            lastTouchDist = newDist;
        } else if (e.touches.length === 1 && isTouchPan) {
            tx = touchPanTx + (e.touches[0].clientX - touchPanX);
            ty = touchPanTy + (e.touches[0].clientY - touchPanY);
            applyTransform(false);
        }
    }, { passive: false });

    lbInner.addEventListener('touchend', () => { lastTouchDist = null; isTouchPan = false; });

    // Buttons — zoom toward center
    lbZoomIn.addEventListener('click',  () => { const c = containerCenter(); zoomAt(c.x, c.y, scale + STEP); });
    lbZoomOut.addEventListener('click', () => { const c = containerCenter(); zoomAt(c.x, c.y, scale - STEP); });
    lbReset.addEventListener('click',   () => reset());

    // Keyboard
    document.addEventListener('keydown', e => {
        if (!lightbox.classList.contains('flex')) return;
        const c = containerCenter();
        if (e.key === 'Escape')              closeLightbox();
        if (e.key === '+' || e.key === '=')  zoomAt(c.x, c.y, scale + STEP);
        if (e.key === '-')                   zoomAt(c.x, c.y, scale - STEP);
        if (e.key === '0')                   reset();
    });
})();
</script>
@endpush

@endsection

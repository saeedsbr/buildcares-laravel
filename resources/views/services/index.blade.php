@extends('layouts.app')

@section('title', 'Services — BuildCares')
@section('description', 'Architectural drawing and CAD services: planning drawings, building control drawings, garage conversions, loft conversions, extensions and more.')

@section('content')

{{-- Page Header --}}
<section class="relative pt-40 pb-20 overflow-hidden" style="background-color:#0f172a;">
    <div class="absolute inset-0 opacity-[0.06] pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 1440 300" preserveAspectRatio="xMidYMid slice">
            <defs>
                <pattern id="sg" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="#2563eb" stroke-width="0.6"/></pattern>
                <pattern id="sg-lg" width="200" height="200" patternUnits="userSpaceOnUse"><path d="M 200 0 L 0 0 0 200" fill="none" stroke="#2563eb" stroke-width="1"/></pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#sg)"/>
            <rect width="100%" height="100%" fill="url(#sg-lg)"/>
        </svg>
    </div>
    <div class="absolute top-0 left-0 w-1 h-full" style="background-color:#2563eb;"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px" style="background:linear-gradient(to right, rgba(37,99,235,0.5), rgba(37,99,235,0.1), transparent);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="section-label">What We Do</div>
        <h1 class="section-title-light">Our Services</h1>
        <p style="color:#64748b;" class="max-w-xl">Professional architectural drawings and CAD services for UK residential construction — from first sketch to planning approval.</p>
    </div>
</section>

{{-- Services --}}
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-6">
        @php
        $serviceData = [
            ['slug'=>'garage-conversion','title'=>'Garage Conversion','img'=>'/images/house-designs/garage-conversion.png','icon'=>'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6','desc'=>'Convert your garage into a functional, comfortable living space. We produce full planning and building control drawing packages for single and double garage conversions, including structural details, drainage, insulation specifications and ventilation layouts.','features'=>['Full planning application drawings','Building control technical drawings','Structural beam calculations support','Drainage and ventilation layouts','Party wall drawings where applicable']],
            ['slug'=>'loft-conversion','title'=>'Loft Conversion','img'=>'/images/house-designs/loft-conversion.png','icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4','desc'=>'Dormer, hip-to-gable, mansard or Velux — we draw every loft conversion type to the standard needed for planning submission and building regulations approval.','features'=>['Dormer, hip-to-gable, mansard & Velux','Planning application full drawing set','Structural section drawings','Stair positions and headroom checks','Fire escape window specification']],
            ['slug'=>'extension','title'=>'Extensions','img'=>'/images/house-designs/rear-extension.png','icon'=>'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z','desc'=>'Single storey, double storey, rear, side or wrap-around — we deliver precisely drawn extensions to satisfy planners and building control officers.','features'=>['Existing and proposed floor plans','All elevations and cross-sections','Site plan and block plan','Planning statement drawings','Building control technical package']],
            ['slug'=>'new-build','title'=>'New Build','img'=>'/images/house-designs/new-build.png','icon'=>'M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z','desc'=>'Full architectural drawing services for new residential builds. From outline planning through to reserved matters and building control.','features'=>['Outline and detailed planning drawings','All floor plans, elevations and sections','Site layout and landscaping drawings','Building regulations full package','Coordination with structural engineers']],
            ['slug'=>'outbuilding','title'=>'Outbuilding','img'=>'/images/house-designs/outbuilding.png','icon'=>'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z','desc'=>'Garden rooms, home offices, workshops, annexes and holiday lets. We draw permitted development and planning application packages for all outbuilding types.','features'=>['Garden room and home office drawings','Annexe and holiday let packages','Permitted development compliance','Drainage and services coordination','Material schedules and specifications']],
            ['slug'=>'internal-changes','title'=>'Internal Changes','img'=>'/images/house-designs/outbuilding.png','icon'=>'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7','desc'=>'Internal reconfigurations, wall removals, new staircases and layout changes all require building control drawings.','features'=>['Existing and proposed layout drawings','Load-bearing wall assessment drawings','Structural beam specification support','Building control compliance package','As-built drawings on completion']],
        ];
        @endphp

        <div class="space-y-20">
            @foreach($serviceData as $i => $svc)
            <div class="grid lg:grid-cols-2 gap-12 items-center reveal">
                <div class="{{ $i % 2 === 1 ? 'lg:order-2' : '' }}">
                    <div class="card-light p-10 flex flex-col items-center justify-center min-h-64 relative overflow-hidden group" style="border-top:2px solid #2563eb;">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity" style="background:linear-gradient(135deg, #eff6ff 0%, transparent 100%);"></div>
                        @if(!empty($svc['img']))
                        <div class="w-full max-w-xs mb-4 rounded shadow-inner overflow-hidden">
                            <img src="{{ $svc['img'] }}" alt="{{ $svc['title'] }}" class="w-full h-40 object-cover">
                        </div>
                        @else
                        <div class="w-16 h-16 flex items-center justify-center mb-4" style="background:#eff6ff; border:1px solid #dbeafe;">
                            <svg class="w-8 h-8" style="color:#2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="{{ $svc['icon'] }}"/>
                            </svg>
                        </div>
                        @endif
                        <div class="text-center">
                            <div class="text-xs font-bold uppercase tracking-widest" style="color:#2563eb;">{{ $svc['title'] }}</div>
                            <div class="text-xs mt-1" style="color:#94a3b8;">Architectural Drawings</div>
                        </div>
                    </div>
                </div>

                <div class="{{ $i % 2 === 1 ? 'lg:order-1' : '' }}">
                    <div class="section-label">Service {{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</div>
                    <h2 class="section-title">{{ $svc['title'] }}</h2>
                    <p class="leading-relaxed mb-6 text-sm" style="color:#64748b;">{{ $svc['desc'] }}</p>
                    <ul class="space-y-2 mb-8">
                        @foreach($svc['features'] as $feat)
                        <li class="flex items-center gap-3 text-sm" style="color:#475569;">
                            <div class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background-color:#2563eb;"></div>
                            {{ $feat }}
                        </li>
                        @endforeach
                    </ul>
                    <div class="flex gap-4">
                        <a href="{{ route('portfolio.index', ['category' => $svc['slug']]) }}" class="btn-gold text-xs py-3 px-5">
                            View Examples
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ route('contact') }}?service={{ $svc['slug'] }}" class="btn-outline-gold text-xs py-3 px-5">Get a Quote</a>
                    </div>
                </div>
            </div>
            @if(!$loop->last)<div class="border-t" style="border-color:#e2e8f0;"></div>@endif
            @endforeach
        </div>
    </div>
</section>

{{-- What's Included --}}
<section class="py-16 border-t" style="background-color:#f8fafc; border-color:#e2e8f0;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <div class="section-label justify-center">Deliverables</div>
            <h2 class="section-title">What's Included</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px" style="background-color:#e2e8f0;">
            @foreach([['Planning Drawings','Site plans, block plans, floor plans, elevations, sections — everything needed for a planning application.','M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7'],['Building Control','Detailed structural, drainage, insulation and specification drawings for building regulations approval.','M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],['3D Models','SketchUp and Revit models to visualise the design before construction begins.','M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'],['Revisions','We include revision rounds to ensure the drawings match your requirements precisely.','M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15']] as $i => [$title, $desc, $icon])
            <div class="p-8 bg-white reveal" style="border-top:2px solid #2563eb; animation-delay:{{ $i * 0.1 }}s">
                <div class="w-10 h-10 flex items-center justify-center mb-4" style="background:#eff6ff; border:1px solid #dbeafe;">
                    <svg class="w-5 h-5" style="color:#2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $icon }}"/></svg>
                </div>
                <h3 class="font-bold text-sm mb-2" style="color:#0f172a;">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color:#64748b;">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16" style="background-color:#0f172a; border-top:2px solid #2563eb;">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="font-bold text-2xl mb-4" style="color:#f8fafc;">Ready to Get Started?</h2>
        <p class="mb-8" style="color:#64748b;">Discuss your project with us today. Fast turnaround, professional results.</p>
        <a href="{{ route('contact') }}" class="btn-gold px-8 py-4">Get a Free Quote</a>
    </div>
</section>

@endsection

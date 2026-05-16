@extends('layouts.app')

@section('title', $item->title . ' — BuildCares Portfolio')
@section('description', $item->description ?? 'View this ' . $item->category_label . ' project by BuildCares.')

@section('content')

{{-- Hero image --}}
<section class="relative h-[60vh] min-h-96 overflow-hidden">
    <img src="{{ Storage::url($item->cover_image) }}" alt="{{ $item->title }}"
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/50 to-transparent"></div>

    {{-- Back button --}}
    <div class="absolute top-28 left-6 z-10">
        <a href="{{ route('portfolio.index') }}" class="flex items-center gap-2 text-slate-300 hover:text-gold transition-colors text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
            Back to Portfolio
        </a>
    </div>

    <div class="absolute bottom-0 left-0 right-0 max-w-7xl mx-auto px-6 pb-10">
        <span class="inline-block text-xs bg-gold text-dark-900 font-bold uppercase tracking-widest px-3 py-1 mb-4">{{ $item->category_label }}</span>
        <h1 class="font-display text-3xl md:text-5xl font-bold text-white mb-3">{{ $item->title }}</h1>
        <div class="flex flex-wrap items-center gap-4 text-slate-400 text-sm">
            @if($item->location)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-gold" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                {{ $item->location }}
            </span>
            @endif
            @if($item->year)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-gold" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                {{ $item->year }}
            </span>
            @endif
            @if($item->client)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-gold" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                {{ $item->client }}
            </span>
            @endif
        </div>
    </div>
</section>

{{-- Content --}}
<section class="section-padding bg-dark-900">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-12">
            {{-- Main --}}
            <div class="lg:col-span-2">
                @if($item->description)
                <div class="mb-10">
                    <h2 class="font-display text-xl font-semibold text-white mb-4">Project Overview</h2>
                    <div class="text-slate-400 leading-relaxed space-y-4">
                        {!! nl2br(e($item->description)) !!}
                    </div>
                </div>
                @endif

                {{-- Gallery --}}
                @if($item->gallery_images && count($item->gallery_images))
                <div>
                    <h2 class="font-display text-xl font-semibold text-white mb-6">Project Gallery</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($item->gallery_images as $img)
                        <a href="{{ Storage::url($img) }}" target="_blank" class="portfolio-card rounded-md overflow-hidden">
                            <img src="{{ Storage::url($img) }}" alt="Gallery image" loading="lazy">
                            <div class="overlay">
                                <div class="flex items-center justify-center h-full">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Project details --}}
                <div class="card-dark rounded-lg p-6">
                    <h3 class="font-display font-semibold text-white mb-5 text-lg">Project Details</h3>
                    <dl class="space-y-4">
                        <div>
                            <dt class="text-xs uppercase tracking-widest text-slate-500 mb-1">Type</dt>
                            <dd class="text-slate-200 text-sm font-medium">{{ $item->category_label }}</dd>
                        </div>
                        @if($item->location)
                        <div>
                            <dt class="text-xs uppercase tracking-widest text-slate-500 mb-1">Location</dt>
                            <dd class="text-slate-200 text-sm font-medium">{{ $item->location }}</dd>
                        </div>
                        @endif
                        @if($item->year)
                        <div>
                            <dt class="text-xs uppercase tracking-widest text-slate-500 mb-1">Year</dt>
                            <dd class="text-slate-200 text-sm font-medium">{{ $item->year }}</dd>
                        </div>
                        @endif
                        @if($item->client)
                        <div>
                            <dt class="text-xs uppercase tracking-widest text-slate-500 mb-1">Client</dt>
                            <dd class="text-slate-200 text-sm font-medium">{{ $item->client }}</dd>
                        </div>
                        @endif
                        @if($item->tags && count($item->tags))
                        <div>
                            <dt class="text-xs uppercase tracking-widest text-slate-500 mb-2">Tags</dt>
                            <dd class="flex flex-wrap gap-2">
                                @foreach($item->tags as $tag)
                                <span class="text-xs bg-dark-600 border border-white/10 text-slate-300 px-2 py-1 rounded">{{ $tag }}</span>
                                @endforeach
                            </dd>
                        </div>
                        @endif
                    </dl>
                </div>

                {{-- CTA --}}
                <div class="card-dark rounded-lg p-6 border-gold/20">
                    <h3 class="font-display font-semibold text-white mb-3">Similar Project?</h3>
                    <p class="text-slate-400 text-sm mb-5">Get in touch to discuss your {{ $item->category_label }} project and receive a free quote.</p>
                    <a href="{{ route('contact') }}?service={{ $item->category }}" class="btn-gold w-full justify-center text-sm">Get a Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Related projects --}}
@if($related->count())
<section class="py-16 bg-dark-800 border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="font-display text-2xl font-bold text-white mb-8">Related Projects</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($related as $rel)
            <a href="{{ route('portfolio.show', $rel->slug) }}" class="portfolio-card rounded-lg">
                <img src="{{ Storage::url($rel->cover_image) }}" alt="{{ $rel->title }}" loading="lazy">
                <div class="overlay">
                    <span class="text-gold text-xs font-semibold uppercase tracking-widest mb-1">{{ $rel->category_label }}</span>
                    <h3 class="text-white font-display font-semibold text-base">{{ $rel->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

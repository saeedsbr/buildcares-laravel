@extends('layouts.admin')

@section('title', isset($service) ? 'Edit Service' : 'Add Service')
@section('page-title', isset($service) ? 'Edit: ' . $service->name : 'Add Service')

@section('content')

<div class="max-w-3xl">
    <div class="card-dark rounded-xl p-6">
        <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}"
              method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($service)) @method('PUT') @endif

            <div class="grid sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}"
                           class="input-dark @error('name') border-red-500/50 @enderror" required>
                    @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Short Description *</label>
                    <textarea name="short_description" rows="2"
                              class="input-dark resize-none @error('short_description') border-red-500/50 @enderror"
                              required maxlength="500"
                              placeholder="One- or two-line summary shown on cards">{{ old('short_description', $service->short_description ?? '') }}</textarea>
                    @error('short_description') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Full Description</label>
                    <textarea name="full_description" rows="6" class="input-dark resize-none"
                              placeholder="Full description shown on the service detail page (supports plain text with paragraphs)">{{ old('full_description', $service->full_description ?? '') }}</textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Features (one per line)</label>
                    <textarea name="features_text" rows="5" class="input-dark resize-none"
                              placeholder="Planning drawings&#10;Building control&#10;Structural co-ordination">{{ old('features_text', isset($service) && $service->features ? implode("\n", $service->features) : '') }}</textarea>
                    <p class="text-slate-500 text-xs mt-1">Each line becomes a bullet point on the service page.</p>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Cover Image</label>
                    @if(isset($service) && $service->cover_image)
                    <div class="mb-3">
                        <img src="{{ Storage::url($service->cover_image) }}" alt="Current" class="h-24 rounded object-cover">
                        <p class="text-slate-500 text-xs mt-1">Current image. Upload a new one to replace it.</p>
                    </div>
                    @endif
                    <input type="file" name="cover_image" accept="image/*"
                           class="text-slate-400 text-sm file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-gold/10 file:text-gold file:text-xs file:font-semibold file:uppercase file:tracking-wider hover:file:bg-gold/20 file:cursor-pointer">
                    @error('cover_image') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}"
                           class="input-dark" min="0">
                </div>

                <div class="flex flex-col gap-3 justify-center">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="w-4 h-4 accent-gold"
                               {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                        <span class="text-slate-700 text-sm">Active (visible on site)</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-2 border-t border-slate-200">
                <button type="submit" class="btn-gold text-xs py-3 px-6">
                    {{ isset($service) ? 'Update Service' : 'Create Service' }}
                </button>
                <a href="{{ route('admin.services.index') }}" class="btn-outline-gold text-xs py-3 px-6">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection

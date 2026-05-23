@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Portfolio Item' : 'Add Portfolio Item')
@section('page-title', isset($item) ? 'Edit: ' . $item->title : 'Add Portfolio Item')

@section('content')

<div class="max-w-3xl">
    <div class="card-dark rounded-xl p-6">
        <form action="{{ isset($item) ? route('admin.portfolio.update', $item) : route('admin.portfolio.store') }}"
              method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($item)) @method('PUT') @endif

            <div class="grid sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}"
                           class="input-dark @error('title') border-red-500/50 @enderror" required>
                    @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Category *</label>
                    <select name="category" class="input-dark @error('category') border-red-500/50 @enderror" required>
                        @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $item->category ?? '') === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('category') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Location</label>
                    <input type="text" name="location" value="{{ old('location', $item->location ?? '') }}"
                           class="input-dark" placeholder="Birmingham, UK">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Year</label>
                    <input type="number" name="year" value="{{ old('year', $item->year ?? date('Y')) }}"
                           class="input-dark" min="2000" max="2030">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Client</label>
                    <input type="text" name="client" value="{{ old('client', $item->client ?? '') }}"
                           class="input-dark" placeholder="Client name (optional)">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Description</label>
                    <textarea name="description" rows="5" class="input-dark resize-none"
                              placeholder="Describe the project...">{{ old('description', $item->description ?? '') }}</textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">
                        Cover Image {{ !isset($item) ? '*' : '' }}
                    </label>
                    @if(isset($item) && $item->cover_image)
                    <div class="mb-3">
                        <img src="{{ Storage::url($item->cover_image) }}" alt="Current cover" class="h-24 rounded object-cover">
                        <p class="text-slate-500 text-xs mt-1">Current image. Upload a new one to replace it.</p>
                    </div>
                    @endif
                    <input type="file" name="cover_image" accept="image/*"
                           class="text-slate-500 text-sm file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-gold/10 file:text-gold file:text-xs file:font-semibold file:uppercase file:tracking-wider hover:file:bg-gold/20 file:cursor-pointer"
                           {{ !isset($item) ? 'required' : '' }}>
                    @error('cover_image') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Gallery Images</label>

                    @if(isset($item) && !empty($item->gallery_images))
                    <div class="grid grid-cols-3 sm:grid-cols-4 gap-3 mb-4">
                        @foreach($item->gallery_images as $path)
                        <label class="relative block cursor-pointer group">
                            <img src="{{ Storage::url($path) }}" alt="" class="aspect-square w-full object-cover rounded border border-slate-200 group-has-[:checked]:opacity-30 group-has-[:checked]:border-red-500 transition-opacity">
                            <input type="checkbox" name="remove_gallery[]" value="{{ $path }}" class="peer absolute opacity-0">
                            <span class="absolute inset-0 flex items-center justify-center bg-red-500/80 text-white text-xs uppercase tracking-widest font-semibold opacity-0 peer-checked:opacity-100 transition-opacity rounded">
                                Remove
                            </span>
                        </label>
                        @endforeach
                    </div>
                    <p class="text-slate-500 text-xs mb-2">Click an image to mark it for removal. Removals apply on save.</p>
                    @endif

                    <input type="file" name="gallery_images[]" accept="image/*" multiple
                           class="text-slate-500 text-sm file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-slate-100 file:text-slate-700 file:text-xs file:font-semibold file:uppercase file:tracking-wider hover:file:bg-slate-200 file:cursor-pointer">
                    <p class="text-slate-500 text-xs mt-1">Upload one or more images to add to the gallery.</p>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-widest text-slate-500 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                           class="input-dark" min="0">
                </div>

                <div class="flex flex-col gap-3 justify-center">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="featured" value="1" class="w-4 h-4 accent-gold"
                               {{ old('featured', $item->featured ?? false) ? 'checked' : '' }}>
                        <span class="text-slate-700 text-sm">Featured on homepage</span>
                    </label>
                    @if(isset($item))
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="w-4 h-4 accent-gold"
                               {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                        <span class="text-slate-700 text-sm">Active (visible on site)</span>
                    </label>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-4 pt-2 border-t border-slate-200">
                <button type="submit" class="btn-gold text-xs py-3 px-6">
                    {{ isset($item) ? 'Update Item' : 'Create Item' }}
                </button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn-outline-gold text-xs py-3 px-6">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection

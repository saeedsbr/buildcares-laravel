@extends('layouts.admin')

@section('title', 'Portfolio Items')
@section('page-title', 'Portfolio Items')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-slate-400 text-sm">{{ $items->total() }} items total</p>
    <a href="{{ route('admin.portfolio.create') }}" class="btn-gold text-xs py-2.5 px-4">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Add Item
    </a>
</div>

<div class="card-dark rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-white/5">
                <th class="text-left py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium">Item</th>
                <th class="text-left py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium hidden md:table-cell">Category</th>
                <th class="text-left py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium hidden lg:table-cell">Location</th>
                <th class="text-center py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium">Featured</th>
                <th class="text-center py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium">Active</th>
                <th class="text-right py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($items as $item)
            <tr class="hover:bg-dark-700 transition-colors">
                <td class="py-3 px-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-9 rounded overflow-hidden bg-dark-600 flex-shrink-0">
                            <img src="{{ Storage::url($item->cover_image) }}" alt="{{ $item->title }}"
                                 class="w-full h-full object-cover">
                        </div>
                        <div>
                            <div class="text-white font-medium leading-snug">{{ $item->title }}</div>
                            <div class="text-slate-500 text-xs">{{ $item->slug }}</div>
                        </div>
                    </div>
                </td>
                <td class="py-3 px-4 hidden md:table-cell">
                    <span class="text-xs bg-gold/10 text-gold border border-gold/20 px-2 py-0.5 rounded-full">{{ $item->category_label }}</span>
                </td>
                <td class="py-3 px-4 text-slate-400 hidden lg:table-cell">{{ $item->location ?? '—' }}</td>
                <td class="py-3 px-4 text-center">
                    @if($item->featured)
                    <svg class="w-4 h-4 text-gold mx-auto" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @else
                    <span class="text-slate-600">—</span>
                    @endif
                </td>
                <td class="py-3 px-4 text-center">
                    <span class="inline-block w-2 h-2 rounded-full {{ $item->is_active ? 'bg-green-500' : 'bg-red-500/50' }}"></span>
                </td>
                <td class="py-3 px-4">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('portfolio.show', $item->slug) }}" target="_blank"
                           class="p-1.5 text-slate-500 hover:text-gold transition-colors" title="View">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                        <a href="{{ route('admin.portfolio.edit', $item) }}"
                           class="p-1.5 text-slate-500 hover:text-blue-400 transition-colors" title="Edit">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                        <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this portfolio item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 text-slate-500 hover:text-red-400 transition-colors" title="Delete">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-16 text-center text-slate-500">
                    No portfolio items yet. <a href="{{ route('admin.portfolio.create') }}" class="text-gold hover:underline">Add the first one</a>.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($items->hasPages())
<div class="mt-6 flex justify-center">
    {{ $items->links() }}
</div>
@endif

@endsection

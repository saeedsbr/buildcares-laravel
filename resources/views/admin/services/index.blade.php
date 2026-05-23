@extends('layouts.admin')

@section('title', 'Services')
@section('page-title', 'Services')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-slate-400 text-sm">{{ $services->total() }} services total</p>
    <a href="{{ route('admin.services.create') }}" class="btn-gold text-xs py-2.5 px-4">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Add Service
    </a>
</div>

<div class="card-dark rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-slate-200">
                <th class="text-left py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium">Service</th>
                <th class="text-left py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium hidden md:table-cell">Description</th>
                <th class="text-center py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium">Order</th>
                <th class="text-center py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium">Active</th>
                <th class="text-right py-3 px-4 text-xs uppercase tracking-widest text-slate-500 font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @forelse($services as $service)
            <tr class="hover:bg-light-warm transition-colors">
                <td class="py-3 px-4">
                    <div class="flex items-center gap-3">
                        @if($service->cover_image)
                        <div class="w-12 h-9 rounded overflow-hidden bg-slate-100 flex-shrink-0">
                            <img src="{{ Storage::url($service->cover_image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                        </div>
                        @else
                        <div class="w-12 h-9 rounded bg-gold/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                        </div>
                        @endif
                        <div>
                            <div class="text-dark-900 font-medium leading-snug">{{ $service->name }}</div>
                            <div class="text-slate-500 text-xs">{{ $service->slug }}</div>
                        </div>
                    </div>
                </td>
                <td class="py-3 px-4 text-slate-500 hidden md:table-cell max-w-xs">
                    <span class="line-clamp-2">{{ $service->short_description }}</span>
                </td>
                <td class="py-3 px-4 text-center text-slate-500">{{ $service->sort_order }}</td>
                <td class="py-3 px-4 text-center">
                    <span class="inline-block w-2 h-2 rounded-full {{ $service->is_active ? 'bg-green-500' : 'bg-red-500/50' }}"></span>
                </td>
                <td class="py-3 px-4">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.services.edit', $service) }}"
                           class="p-1.5 text-slate-500 hover:text-blue-500 transition-colors" title="Edit">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this service?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 text-slate-500 hover:text-red-500 transition-colors" title="Delete">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-16 text-center text-slate-500">
                    No services yet. <a href="{{ route('admin.services.create') }}" class="text-gold hover:underline">Add the first one</a>.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($services->hasPages())
<div class="mt-6 flex justify-center">
    {{ $services->links() }}
</div>
@endif

@endsection

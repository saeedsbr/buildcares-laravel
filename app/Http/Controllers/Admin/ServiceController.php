<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);
        $validated['slug'] = $this->makeUniqueSlug($validated['name']);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('services', 'public');
        }

        $validated['features']  = $this->parseFeatures($request->input('features_text'));
        $validated['is_active'] = $request->boolean('is_active', true);

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $this->validateRequest($request, $service);

        if ($request->hasFile('cover_image')) {
            if ($service->cover_image) {
                Storage::disk('public')->delete($service->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('services', 'public');
        }

        $validated['features']  = $this->parseFeatures($request->input('features_text'));
        $validated['is_active'] = $request->boolean('is_active', true);

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        if ($service->cover_image) {
            Storage::disk('public')->delete($service->cover_image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted.');
    }

    private function validateRequest(Request $request, ?Service $service = null): array
    {
        return $request->validate([
            'name'              => 'required|string|max:255',
            'icon'              => 'nullable|string|max:255',
            'short_description' => 'required|string|max:500',
            'full_description'  => 'nullable|string',
            'cover_image'       => 'nullable|image|max:4096',
            'sort_order'        => 'nullable|integer|min:0',
        ]);
    }

    private function parseFeatures(?string $text): array
    {
        if (! $text) return [];
        return collect(preg_split("/\r\n|\r|\n/", $text))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }

    private function makeUniqueSlug(string $name): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;
        while (Service::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}

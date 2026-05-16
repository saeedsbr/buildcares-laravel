<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $items = PortfolioItem::orderBy('sort_order')->paginate(20);
        return view('admin.portfolio.index', compact('items'));
    }

    public function create()
    {
        $categories = PortfolioItem::$categories;
        return view('admin.portfolio.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|string',
            'description'  => 'nullable|string',
            'location'     => 'nullable|string|max:255',
            'year'         => 'nullable|integer|min:2000|max:2030',
            'client'       => 'nullable|string|max:255',
            'cover_image'  => 'required|image|max:4096',
            'featured'     => 'boolean',
            'sort_order'   => 'integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        $validated['cover_image'] = $request->file('cover_image')->store('portfolio', 'public');
        $validated['featured'] = $request->boolean('featured');

        if ($request->hasFile('gallery_images')) {
            $gallery = [];
            foreach ($request->file('gallery_images') as $img) {
                $gallery[] = $img->store('portfolio/gallery', 'public');
            }
            $validated['gallery_images'] = $gallery;
        }

        PortfolioItem::create($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item created.');
    }

    public function edit(PortfolioItem $portfolio)
    {
        $categories = PortfolioItem::$categories;
        return view('admin.portfolio.form', ['item' => $portfolio, 'categories' => $categories]);
    }

    public function update(Request $request, PortfolioItem $portfolio)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'description' => 'nullable|string',
            'location'    => 'nullable|string|max:255',
            'year'        => 'nullable|integer|min:2000|max:2030',
            'client'      => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|max:4096',
            'featured'    => 'boolean',
            'is_active'   => 'boolean',
            'sort_order'  => 'integer',
        ]);

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($portfolio->cover_image);
            $validated['cover_image'] = $request->file('cover_image')->store('portfolio', 'public');
        }

        $validated['featured'] = $request->boolean('featured');
        $validated['is_active'] = $request->boolean('is_active');

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item updated.');
    }

    public function destroy(PortfolioItem $portfolio)
    {
        Storage::disk('public')->delete($portfolio->cover_image);
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item deleted.');
    }
}

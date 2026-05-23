<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioItem;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $query = PortfolioItem::active()->orderBy('sort_order');

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $portfolioItems = $query->paginate(12);
        $categories = PortfolioItem::$categories;

        return view('portfolio.index', compact('portfolioItems', 'categories', 'category'));
    }

    public function show(string $slug)
    {
        $item = PortfolioItem::active()->where('slug', $slug)->firstOrFail();

        $siblings = PortfolioItem::active()
            ->where('category', $item->category)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $index = $siblings->search(fn ($p) => $p->id === $item->id);
        $prev = $index > 0 ? $siblings->get($index - 1) : null;
        $next = $index !== false && $index < $siblings->count() - 1 ? $siblings->get($index + 1) : null;

        return view('portfolio.show', compact('item', 'siblings', 'prev', 'next'));
    }
}

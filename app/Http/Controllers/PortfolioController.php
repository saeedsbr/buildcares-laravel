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
        $related = PortfolioItem::active()
            ->where('category', $item->category)
            ->where('id', '!=', $item->id)
            ->limit(3)
            ->get();

        return view('portfolio.show', compact('item', 'related'));
    }
}

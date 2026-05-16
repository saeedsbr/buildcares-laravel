<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPortfolio = PortfolioItem::active()->featured()->orderBy('sort_order')->limit(6)->get();
        $services = Service::active()->get();

        return view('home', compact('featuredPortfolio', 'services'));
    }
}

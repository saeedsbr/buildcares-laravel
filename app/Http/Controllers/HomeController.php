<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->get();

        // Featured projects: one Loft Conversion, one Double Storey Side Extension,
        // one Single Storey Rear Extension. Match by category + title keyword so the
        // section keeps working even if slugs change.
        $featuredProjects = collect([
            [
                'label'   => 'Loft Conversion',
                'caption' => 'Adding a storey within the roof',
                'item'    => PortfolioItem::active()
                    ->where('category', 'loft-conversion')
                    ->orderBy('sort_order')
                    ->first(),
            ],
            [
                'label'   => 'Double Storey Side Extension',
                'caption' => 'Expanding both floors outward',
                'item'    => PortfolioItem::active()
                    ->where('category', 'extension')
                    ->where('title', 'like', '%Double Storey Side%')
                    ->orderBy('sort_order')
                    ->first(),
            ],
            [
                'label'   => 'Single Storey Rear Extension',
                'caption' => 'Opening up the ground floor',
                'item'    => PortfolioItem::active()
                    ->where('category', 'extension')
                    ->where('title', 'like', '%Single Storey Rear Extension%')
                    ->where('title', 'not like', '%Loft%')
                    ->orderBy('sort_order')
                    ->first(),
            ],
        ])->filter(fn ($f) => $f['item'] !== null)->values();

        return view('home', compact('services', 'featuredProjects'));
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioItem;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Idempotent: skip on redeploy so admin edits persist.
        if (PortfolioItem::query()->exists()) {
            return;
        }

        $items = [

            // NEW BUILD
            [
                'title'       => 'New Build House',
                'category'    => 'new-build',
                'location'    => 'UK',
                'year'        => 2024,
                'description' => 'A two-storey new build residential property featuring an open-plan ground floor with reception, kitchen/dining and living areas, WC and cycle store, plus a first floor with three bedrooms and bathroom. The design incorporates a contemporary flat roof detail to the rear.',
                'tags'        => ['new-build', 'two-storey', 'flat-roof', 'planning'],
                'featured'    => true,
                'sort_order'  => 1,
            ],

            // LOFT CONVERSIONS
            [
                'title'       => 'Loft Conversion with Flat Roof Dormer',
                'category'    => 'loft-conversion',
                'location'    => 'UK',
                'year'        => 2024,
                'description' => 'Full loft conversion on a two-storey semi-detached house, creating a new master bedroom with en-suite and generous eaves storage. The rear dormer features a flat roof design with large glazing to maximise natural light into the new loft space.',
                'tags'        => ['loft-conversion', 'dormer', 'ensuite', 'flat-roof'],
                'featured'    => true,
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Loft Conversion with Rear Dormer',
                'category'    => 'loft-conversion',
                'location'    => 'UK',
                'year'        => 2023,
                'description' => 'Loft conversion adding a spacious bedroom with en-suite bathroom and built-in eaves storage to an existing three-bedroom family home. The rear dormer blends sympathetically with the existing roof profile while maximising headroom and usable floor area.',
                'tags'        => ['loft-conversion', 'dormer', 'ensuite', 'eaves-storage'],
                'featured'    => false,
                'sort_order'  => 3,
            ],
            [
                'title'       => 'Single Storey Rear Extension & Loft Conversion',
                'category'    => 'loft-conversion',
                'location'    => 'UK',
                'year'        => 2026,
                'description' => 'Combined project delivering a single storey rear extension to enlarge the kitchen/sitting area alongside a full loft conversion to create additional bedroom accommodation. The scheme transforms a modest bungalow into a spacious family home, with full planning drawings produced in Revit.',
                'tags'        => ['loft-conversion', 'extension', 'combined', 'bungalow', 'revit'],
                'featured'    => true,
                'sort_order'  => 4,
            ],

            // EXTENSIONS
            [
                'title'       => 'Double Storey Side Extension',
                'category'    => 'extension',
                'location'    => 'UK',
                'year'        => 2024,
                'description' => 'Substantial double storey side extension expanding an existing detached property to five bedrooms each with en-suite, plus a study and balcony. The ground floor gains a large kitchen/breakfast room and dining/sitting room. All four elevations fully redesigned for a cohesive architect-designed appearance.',
                'tags'        => ['extension', 'double-storey', 'side', '5-bedroom', 'balcony', 'ensuite'],
                'featured'    => true,
                'sort_order'  => 5,
            ],
            [
                'title'       => 'Double Storey Rear Extension',
                'category'    => 'extension',
                'location'    => 'UK',
                'year'        => 2025,
                'description' => 'Double storey rear extension to a semi-detached property, extending the ground floor kitchen and living accommodation and adding a new bedroom and shower room at first floor level. Full existing and proposed floor plans and elevations produced in Revit.',
                'tags'        => ['extension', 'double-storey', 'rear', 'revit'],
                'featured'    => false,
                'sort_order'  => 6,
            ],
            [
                'title'       => 'Single Storey Extension with Crown Roof',
                'category'    => 'extension',
                'location'    => 'UK',
                'year'        => 2025,
                'description' => 'Single storey rear extension featuring a distinctive crown roof design, converting the existing garage footprint into a bright open-plan kitchen, reception and living space. Full planning drawings produced in Revit including 3D views of the existing and proposed scheme.',
                'tags'        => ['extension', 'single-storey', 'crown-roof', 'revit', '3d'],
                'featured'    => false,
                'sort_order'  => 7,
            ],
            [
                'title'       => 'Single Storey Rear Extension',
                'category'    => 'extension',
                'location'    => 'UK',
                'year'        => 2025,
                'description' => 'Single storey rear extension to a two-storey terraced property, creating a new open-plan study room and dining room. Full planning package produced in Revit including existing and proposed floor plans and all elevations with 3D views.',
                'tags'        => ['extension', 'single-storey', 'rear', 'revit'],
                'featured'    => false,
                'sort_order'  => 8,
            ],

            // OUTBUILDING
            [
                'title'       => 'Garden Outbuilding — Gym & Play Area',
                'category'    => 'outbuilding',
                'location'    => 'UK',
                'year'        => 2018,
                'description' => 'Detached garden outbuilding of 31.49 m² providing a private gym area and a flexible kids play area / home office space. The structure features a pitched roof to a total height of 3,900 mm, designed to sit sympathetically within the garden of the existing property.',
                'tags'        => ['outbuilding', 'gym', 'home-office', 'garden'],
                'featured'    => false,
                'sort_order'  => 9,
            ],

            // GARAGE CONVERSION
            [
                'title'       => 'Garage Conversion to Living Space',
                'category'    => 'garage-conversion',
                'location'    => 'UK',
                'year'        => 2024,
                'description' => 'Full conversion of an integral single garage into a bright, habitable living space. The project includes full planning and building control drawings, structural alterations, insulation upgrades and new window and door openings to match the existing property.',
                'tags'        => ['garage-conversion', 'living-space', 'planning', 'building-control'],
                'featured'    => true,
                'sort_order'  => 10,
            ],

            // INTERNAL CHANGES
            [
                'title'       => 'Internal Alterations & Reconfigurations',
                'category'    => 'internal-changes',
                'location'    => 'UK',
                'year'        => 2024,
                'description' => 'Internal reconfigurations including load-bearing wall removal, new structural steels and full redesign of the ground floor layout to create a modern open-plan living arrangement. Full building control drawings and structural calculations package provided.',
                'tags'        => ['internal-changes', 'open-plan', 'structural', 'building-control'],
                'featured'    => true,
                'sort_order'  => 11,
            ],
        ];

        $covers = [
            1  => 'portfolio/new-build-house-1.png',
            2  => 'portfolio/loft-conversion-flat-roof-dormer-1.png',
            3  => 'portfolio/loft-conversion-rear-dormer-1.png',
            4  => 'portfolio/single-storey-rear-extension-loft-conversion-1.png',
            5  => 'portfolio/double-storey-side-extension-1.png',
            6  => 'portfolio/double-storey-rear-extension-1.png',
            7  => 'portfolio/single-storey-extension-crown-roof-1.png',
            8  => 'portfolio/single-storey-rear-extension-1.png',
            9  => 'portfolio/garden-outbuilding-gym-play-area-1.png',
            10 => 'portfolio/cat-garage-conversion.jpg',
            11 => 'portfolio/cat-internal-changes.jpg',
        ];

        foreach ($items as $item) {
            PortfolioItem::create(array_merge($item, [
                'slug'          => Str::slug($item['title']) . '-' . $item['sort_order'],
                'cover_image'   => $covers[$item['sort_order']],
                'gallery_images'=> [],
                'is_active'     => true,
            ]));
        }
    }
}

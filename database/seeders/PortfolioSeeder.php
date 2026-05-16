<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioItem;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title'=>'Hillside Garage Conversion','category'=>'garage-conversion','location'=>'Birmingham, UK','year'=>2024,'description'=>'Double garage converted into a spacious open-plan living area with full planning and building control drawings.','featured'=>true,'sort_order'=>1],
            ['title'=>'Victorian Loft Conversion','category'=>'loft-conversion','location'=>'Manchester, UK','year'=>2024,'description'=>'Hip-to-gable loft conversion on a 1930s semi-detached home. Full structural drawings and planning submission package.','featured'=>true,'sort_order'=>2],
            ['title'=>'Single Storey Rear Extension','category'=>'extension','location'=>'London, UK','year'=>2023,'description'=>'6m single storey rear extension with roof lantern and bifold doors. Permitted development drawings.','featured'=>true,'sort_order'=>3],
            ['title'=>'Detached New Build 4-Bed','category'=>'new-build','location'=>'Leeds, UK','year'=>2023,'description'=>'Complete architectural drawing package for a detached 4-bedroom property from planning through to building regs.','featured'=>true,'sort_order'=>4],
            ['title'=>'Garden Office Outbuilding','category'=>'outbuilding','location'=>'Bristol, UK','year'=>2024,'description'=>'Insulated garden studio with mezzanine, full drawing set for planning application.','featured'=>true,'sort_order'=>5],
            ['title'=>'Open Plan Kitchen Conversion','category'=>'internal-changes','location'=>'Sheffield, UK','year'=>2023,'description'=>'Load-bearing wall removal and internal reconfigurations with full building control drawings.','featured'=>true,'sort_order'=>6],
            ['title'=>'Attached Garage Extension','category'=>'garage-conversion','location'=>'Nottingham, UK','year'=>2023,'description'=>'Single garage conversion to utility room and study. Building control drawings.','featured'=>false,'sort_order'=>7],
            ['title'=>'Dormer Loft Conversion','category'=>'loft-conversion','location'=>'Liverpool, UK','year'=>2024,'description'=>'Full-width rear dormer with 2 bedrooms and en-suite bathroom. Planning and building control package.','featured'=>false,'sort_order'=>8],
            ['title'=>'Wrap-Around Extension','category'=>'extension','location'=>'Oxford, UK','year'=>2024,'description'=>'Combined rear and side extension creating a large open-plan kitchen diner.','featured'=>false,'sort_order'=>9],
        ];

        foreach ($items as $item) {
            // Use a placeholder image path (admin will upload real ones)
            PortfolioItem::create(array_merge($item, [
                'slug'        => Str::slug($item['title']) . '-' . $item['sort_order'],
                'cover_image' => 'portfolio/placeholder.jpg',
                'is_active'   => true,
            ]));
        }
    }
}

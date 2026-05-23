<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Idempotent: skip on redeploy so admin edits persist.
        if (Service::query()->exists()) {
            return;
        }

        $services = [
            [
                'name'              => 'Loft Conversions',
                'short_description' => 'Full loft conversions including dormers, en-suites and structural alterations — from concept to building control.',
                'full_description'  => "We provide complete loft conversion design and drawings — from initial concept and planning drawings to building regulations and structural details. Our designs make the most of available headroom and natural light while integrating seamlessly with your existing home.\n\nServices include feasibility studies, planning applications, party-wall awareness, building control packages and structural co-ordination.",
                'features'          => ['Planning drawings', 'Building control', 'Structural co-ordination', 'Dormer & rooflight design', 'En-suite layouts', 'Eaves storage'],
                'sort_order'        => 1,
            ],
            [
                'name'              => 'Extensions',
                'short_description' => 'Single and double storey extensions designed in Revit, with full planning and building control packages.',
                'full_description'  => "We design rear, side, wrap-around and double-storey extensions tailored to your lifestyle and budget. Drawings are produced in Revit with full existing/proposed floor plans, elevations and 3D views for planning submissions.\n\nWe co-ordinate with structural engineers and building control to deliver a complete, build-ready package.",
                'features'          => ['Single & double storey', 'Revit 3D modelling', 'Planning applications', 'Building regulations', 'Structural co-ordination'],
                'sort_order'        => 2,
            ],
            [
                'name'              => 'Garage Conversions',
                'short_description' => 'Convert integral or detached garages into bright, habitable living spaces compliant with building regulations.',
                'full_description'  => "Garage conversions are one of the quickest and most cost-effective ways to add value and usable space to a home. We design layouts that integrate naturally with your existing rooms, including thermal upgrades, new openings and structural alterations.",
                'features'          => ['Building control package', 'Thermal upgrades', 'New window & door openings', 'Structural alterations', 'Layout & finish design'],
                'sort_order'        => 3,
            ],
            [
                'name'              => 'New Builds',
                'short_description' => 'Bespoke new build homes designed end-to-end with planning, building control and 3D visualisation.',
                'full_description'  => "From concept design to full planning and building control packages, we design contemporary and traditional new build homes tailored to the site and client brief. We co-ordinate with structural engineers and statutory consultees as required.",
                'features'          => ['Concept design', 'Planning submissions', 'Building regulations', '3D visualisations', 'Site analysis'],
                'sort_order'        => 4,
            ],
            [
                'name'              => 'Outbuildings',
                'short_description' => 'Garden rooms, gyms and home offices — designed as permitted development or full planning where required.',
                'full_description'  => "Detached garden buildings designed for home offices, gyms, studios and play areas. We advise on permitted development limits and prepare full drawings for planning submission where larger structures are required.",
                'features'          => ['Permitted development advice', 'Garden offices & gyms', 'Insulated build-ups', 'Foundations & drainage'],
                'sort_order'        => 5,
            ],
            [
                'name'              => 'Internal Alterations',
                'short_description' => 'Open-plan layouts, structural wall removals and reconfigurations with full building control drawings.',
                'full_description'  => "We design internal reconfigurations including load-bearing wall removals, new structural steels and full redesign of existing layouts. All work comes with a building control package and co-ordinated structural calculations.",
                'features'          => ['Load-bearing wall removal', 'Structural steels', 'Open-plan layouts', 'Building control drawings'],
                'sort_order'        => 6,
            ],
        ];

        foreach ($services as $s) {
            Service::create(array_merge($s, [
                'slug'      => Str::slug($s['name']),
                'is_active' => true,
            ]));
        }
    }
}

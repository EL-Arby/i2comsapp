<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsors = [
            [
                'name' => 'Innovation Center - Prince Sultan University',
                'slug' => 'psu-innovation',
                'description' => 'Innovation Center, Prince Sultan University, KSA',
                'website' => 'https://innovation.psu.edu.sa/',
                'logo_url' => '/images/sponsors/logo-pr-sultan.jpg',
                'level' => 'collaborator',
                'sort_order' => 3,
                'is_published' => true,
            ],

        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}

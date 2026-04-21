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
                'name' => 'University of Derby',
                'slug' => 'university-derby',
                'description' => 'Data Science Research Centre, College of Science and Engineering',
                'website' => 'https://www.derby.ac.uk/research/centres-groups/data-science-research-centre/',
                'logo_url' => '/images/sponsors/logo-derby-univ.jpg',
                'level' => 'collaborator',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'name' => 'LARI - Informatics Research Laboratory',
                'slug' => 'lari-research',
                'description' => 'Informatics Research Laboratory (LARI), Mohammed I University, Oujda, Morocco',
                'website' => 'http://oujda-nlp-team.net/',
                'logo_url' => '/images/sponsors/logo-lari.jpg',
                'level' => 'collaborator',
                'sort_order' => 2,
                'is_published' => true,
            ],
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
            [
                'name' => 'ALECSO',
                'slug' => 'alecso',
                'description' => 'Arab League Educational, Cultural and Scientific Organization',
                'website' => 'https://www.alecso.org/',
                'logo_url' => '/images/sponsors/logo-alecso.png',
                'level' => 'collaborator',
                'sort_order' => 4,
                'is_published' => true,
            ],
            [
                'name' => 'ENSIAS',
                'slug' => 'ensias',
                'description' => 'National School of Applied Sciences',
                'logo_url' => '/images/sponsors/logo-ensias.jpg',
                'level' => 'collaborator',
                'sort_order' => 5,
                'is_published' => true,
            ],
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}

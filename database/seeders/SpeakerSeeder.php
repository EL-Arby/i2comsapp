<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $speakers = [
            ];

        foreach ($speakers as $speaker) {
            Speaker::create($speaker);
        }
    }
}

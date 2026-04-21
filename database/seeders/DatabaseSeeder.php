<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@i2comsapp.local'],
            [
                'name' => 'Site Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        $this->call([
            ConferenceContentSeeder::class,
            CommitteeSeeder::class,
            SpeakerSeeder::class,
            WorkshopSeeder::class,
            HotelSeeder::class,
            SponsorSeeder::class,
        ]);
    }
}

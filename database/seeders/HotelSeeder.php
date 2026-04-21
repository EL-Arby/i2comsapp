<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\HotelRoomRate;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'name' => 'Sunset Hotel',
                'slug' => 'sunset-hotel',
                'address' => 'Nouakchott, Mauritania',
                'website' => 'http://www.sunsethotel.mr/',
                'image_url' => '/images/hotels/sunset-hotel.jpg',
                'sort_order' => 1,
                'is_published' => true,
                'rooms' => [
                    ['room_type' => 'Single', 'currency' => 'EUR', 'price' => 110],
                    ['room_type' => 'Double', 'currency' => 'EUR', 'price' => 125],
                ],
            ],
            [
                'name' => 'Nouakchott Hotel',
                'slug' => 'nouakchott-hotel',
                'address' => 'Nouakchott, Mauritania',
                'website' => 'http://www.nouakchotthotel.com/',
                'image_url' => '/images/hotels/nouakchott-hotel.jpg',
                'sort_order' => 2,
                'is_published' => true,
                'rooms' => [
                    ['room_type' => 'Single', 'currency' => 'EUR', 'price' => 109],
                    ['room_type' => 'Double', 'currency' => 'EUR', 'price' => 136],
                ],
            ],
            [
                'name' => 'Fasq Hotel',
                'slug' => 'fasq-hotel',
                'address' => 'Nouakchott, Mauritania',
                'website' => 'http://www.fasqhotels.com/',
                'image_url' => '/images/hotels/fasq-hotel.jpg',
                'sort_order' => 3,
                'is_published' => true,
                'rooms' => [
                    ['room_type' => 'Single', 'currency' => 'EUR', 'price' => 225],
                ],
            ],
        ];

        foreach ($hotels as $hotelData) {
            $rooms = $hotelData['rooms'];
            unset($hotelData['rooms']);

            $hotel = Hotel::create($hotelData);

            foreach ($rooms as $room) {
                HotelRoomRate::create([
                    'hotel_id' => $hotel->id,
                    'room_type' => $room['room_type'],
                    'currency' => $room['currency'],
                    'price' => $room['price'],
                ]);
            }
        }
    }
}

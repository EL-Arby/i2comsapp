<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelRoomRate extends Model
{
    protected $fillable = [
        'hotel_id',
        'room_type',
        'currency',
        'price',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'float',
        ];
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}

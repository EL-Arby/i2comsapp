<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    protected $fillable = [
        'user_id',
        'registration_date',
        'first_name',
        'last_name',
        'email',
        'phone',
        'organization',
        'job_title',
        'registration_type',
        'workshop_id',
        'participant_type',
        'amount_paid',
        'payment_received',
        'payment_method',
        'payment_proof',
        'notes',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'registration_date' => 'datetime',
            'payment_received' => 'boolean',
            'is_active' => 'boolean',
            'amount_paid' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function workshop(): BelongsTo
    {
        return $this->belongsTo(Workshop::class);
    }
}

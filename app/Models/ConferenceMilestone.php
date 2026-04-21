<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ConferenceMilestone extends Model
{
    protected $fillable = [
        'title',
        'milestone_date',
        'description',
        'accent',
        'sort_order',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'milestone_date' => 'date',
            'is_published' => 'boolean',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('milestone_date');
    }
}

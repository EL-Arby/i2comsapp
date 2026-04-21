<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'abstract',
        'keywords',
        'authors',
        'presenter',
        'email',
        'paper_file_path',
        'status',
        'sort_order',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'image_path',
        'is_top',
    ];

    protected function casts(): array
    {
        return [
            'is_top' => 'boolean',
        ];
    }
}

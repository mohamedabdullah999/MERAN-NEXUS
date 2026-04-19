<?php

namespace App\Models;

use App\Enums\PortfolioType;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'image_path',
        'description_en',
        'description_ar',
        'type',
    ];

    protected function casts(): array
    {
        return [
            'type' => PortfolioType::class,
        ];
    }
}

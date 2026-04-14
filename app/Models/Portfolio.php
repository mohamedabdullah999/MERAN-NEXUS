<?php

namespace App\Models;

use App\Enums\PortfolioType;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'name',
        'image_path',
        'description',
        'type',
    ];

    protected function casts(): array
    {
        return [
            'type' => PortfolioType::class,
        ];
    }
}

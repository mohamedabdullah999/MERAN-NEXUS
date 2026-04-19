<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
    protected $fillable = [
        'value_en',
        'value_ar',
        'label_en',
        'label_ar',
        'show_on_home',
    ];

    protected function casts(): array
    {
        return [
            'show_on_home' => 'boolean',
        ];
    }
}

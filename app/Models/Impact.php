<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
    protected $fillable = [
        'value',
        'label',
        'show_on_home',
    ];

    protected function casts(): array
    {
        return [
            'show_on_home' => 'boolean',
        ];
    }
}

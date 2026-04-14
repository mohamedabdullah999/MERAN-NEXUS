<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'image_path',
        'description',
        'show_on_home',
    ];

    protected function casts(): array
    {
        return [
            'show_on_home' => 'boolean',
        ];
    }
}

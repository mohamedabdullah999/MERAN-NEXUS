<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'hero_title',
        'hero_brief',
        'hero_image',
        'footer_logo',
        'social_links',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}

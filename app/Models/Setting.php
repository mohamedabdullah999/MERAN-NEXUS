<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name_en',
        'site_name_ar',
        'hero_title_en',
        'hero_title_ar',
        'hero_brief_en',
        'hero_brief_ar',
        'contact_email',
        'contact_phone',
        'hero_image',
        'footer_logo',
        'social_links',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}

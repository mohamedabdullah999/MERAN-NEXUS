<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'title_en',
        'title_ar',
        'image_path',
        'description_en',
        'description_ar',
        'reference_link',
    ];
}

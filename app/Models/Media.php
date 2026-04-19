<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'category_id',
        'title_en',
        'title_ar',
        'type',
        'file_path',
        'cover_image',
        'external_link',
        'show_on_home',
    ];

    protected $casts = [
        'show_on_home' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(MediaCategory::class, 'category_id');
    }
}

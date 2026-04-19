<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'slug_en', 'slug_ar'];

    public function media()
    {
        return $this->hasMany(Media::class, 'category_id');
    }
}

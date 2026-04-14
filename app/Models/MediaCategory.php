<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model
{
    protected $fillable = ['name'];

    public function media()
    {
        return $this->hasMany(Media::class, 'category_id');
    }
}

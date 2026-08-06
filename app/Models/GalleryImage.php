<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = ['album', 'title', 'description', 'image_path', 'sort_order', 'is_published'];

    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }
}

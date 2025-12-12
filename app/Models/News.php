<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title','slug','image_path','published_at','excerpt','content'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}

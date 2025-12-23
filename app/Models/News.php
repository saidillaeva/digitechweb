<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'slug',
        'image_path',
        'published_at',

        'title_ru','title_en','title_kg','title_de',
        'excerpt_ru','excerpt_en','excerpt_kg','excerpt_de',
        'content_ru','content_en','content_kg','content_de',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /* ================= COMMENTS RELATION ================= */
    public function comments()
    {
        return $this->hasMany(NewsComment::class);
    }

    /* ================= MULTI-LANGUAGE HELPERS ================= */
    public function getTitleAttribute()
    {
        $lang = app()->getLocale();
        return $this->{'title_'.$lang} ?? $this->title_ru;
    }

    public function getContentAttribute()
    {
        $lang = app()->getLocale();
        return $this->{'content_'.$lang} ?? $this->content_ru;
    }
}

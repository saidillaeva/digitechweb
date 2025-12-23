<?php

// app/Models/NewsComment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    protected $table = 'news_comments';

    protected $fillable = [
        'news_id',
        'name',
        'message',
        'is_approved'
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}


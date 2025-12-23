<?php

// app/Http/Controllers/NewsCommentController.php
namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsComment;
use Illuminate\Http\Request;

class NewsCommentController extends Controller
{
    public function store(Request $request, string $slug)
    {
        $request->validate([
            'name'    => 'required|string|max:120',
            'message' => 'required|string|max:2000',
        ]);

        $news = News::where('slug', $slug)->firstOrFail();

        NewsComment::create([
            'news_id' => $news->id,
            'name'    => $request->name,
            'message' => $request->message,
            'is_approved' => false, // ⛔ модерация
        ]);

        return back()->with('success', 'Комментарий отправлен и ожидает проверки.');
    }
}

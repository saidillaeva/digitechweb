<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $items = News::latest()->paginate(10);
        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ru' => ['required','string','max:255'],
            'title_en' => ['nullable','string','max:255'],
            'title_kg' => ['nullable','string','max:255'],
            'title_de' => ['nullable','string','max:255'],

            'excerpt_ru' => ['nullable','string','max:500'],
            'excerpt_en' => ['nullable','string','max:500'],
            'excerpt_kg' => ['nullable','string','max:500'],
            'excerpt_de' => ['nullable','string','max:500'],

            'content_ru' => ['required','string'],
            'content_en' => ['nullable','string'],
            'content_kg' => ['nullable','string'],
            'content_de' => ['nullable','string'],

            'published_at' => ['nullable','date'],
            'image' => ['nullable','image','max:4096'],
        ]);

        $data['slug'] = Str::slug($data['title_en'] ?? $data['title_ru']) . '-' . Str::random(6);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News created');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title_ru' => ['required','string','max:255'],
            'title_en' => ['nullable','string','max:255'],
            'title_kg' => ['nullable','string','max:255'],
            'title_de' => ['nullable','string','max:255'],

            'excerpt_ru' => ['nullable','string','max:500'],
            'excerpt_en' => ['nullable','string','max:500'],
            'excerpt_kg' => ['nullable','string','max:500'],
            'excerpt_de' => ['nullable','string','max:500'],

            'content_ru' => ['required','string'],
            'content_en' => ['nullable','string'],
            'content_kg' => ['nullable','string'],
            'content_de' => ['nullable','string'],

            'published_at' => ['nullable','date'],
            'image' => ['nullable','image','max:4096'],
        ]);

        if ($request->hasFile('image')) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News updated');
    }

    public function destroy(News $news)
    {
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();
        return back()->with('success', 'News deleted');
    }
}

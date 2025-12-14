<?php

namespace App\Http\Controllers;

use App\Models\News;

class EventController extends Controller
{
    public function index()
    {
        $events = News::latest()->paginate(6);
        return view('pages.events', compact('events'));
    }

    public function show(string $slug)
    {
        $event = News::where('slug', $slug)->firstOrFail();

        return view('pages.event-detail', compact('event'));
    }

}

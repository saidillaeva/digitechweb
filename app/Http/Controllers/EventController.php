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
}

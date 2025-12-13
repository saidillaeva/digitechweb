<?php

namespace App\Http\Controllers;

use App\Models\Document;

class DocumentPageController extends Controller
{
    public function index()
    {
        // Берём опубликованные документы
        $documents = Document::orderBy('published_at', 'desc')->get();

        // Группируем: group → period
        $grouped = $documents
            ->groupBy('doc_group')
            ->map(fn ($items) => $items->groupBy('period'));

        return view('pages.project-documentation', compact('grouped'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $items = Document::latest()->paginate(12);
        return view('admin.documents.index', compact('items'));
    }

    public function create()
    {
        $groups = Document::groups();
        $periods = Document::periods();
        return view('admin.documents.create', compact('groups','periods'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_kg' => 'required|string|max:255',
            'title_de' => 'required|string|max:255',

            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_kg' => 'nullable|string',
            'description_de' => 'nullable|string',

            'doc_group' => 'required|string',
            'period' => 'nullable|string',
            'published_at' => 'nullable|date',
            'file' => 'required|file|max:10240',
        ]);

        $data['file_path'] = $request->file('file')->store('documents', 'public');

        Document::create($data);

        return redirect()->route('admin.documents.index')->with('success', 'Document uploaded');
    }


    public function edit(Document $document)
    {
        $groups = Document::groups();
        $periods = Document::periods();
        return view('admin.documents.edit', compact('document','groups','periods'));
    }

    public function update(Request $request, Document $document)
    {
        $data = $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_kg' => 'required|string|max:255',
            'title_de' => 'required|string|max:255',

            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_kg' => 'nullable|string',
            'description_de' => 'nullable|string',

            'doc_group' => 'required|string',
            'period' => 'nullable|string',
            'published_at' => 'nullable|date',
            'file' => 'nullable|file|max:10240',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }

        $document->update($data);

        return redirect()->route('admin.documents.index')->with('success', 'Document updated');
    }


    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return back()->with('success', 'Document deleted.');
    }

    public function show(Document $document)
    {
        return redirect()->route('admin.documents.edit', $document);
    }
}

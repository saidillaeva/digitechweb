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
            'title' => ['required','string','max:255'],
            'doc_group' => ['required','string'],
            'period' => ['nullable','string'],
            'published_at' => ['nullable','date'],
            'description' => ['nullable','string'],
            'file' => ['required','file','max:10240'], // 10MB
        ]);

        $data['file_path'] = $request->file('file')->store('documents', 'public');

        Document::create($data);

        return redirect()->route('admin.documents.index')->with('success', 'Document uploaded.');
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
            'title' => ['required','string','max:255'],
            'doc_group' => ['required','string'],
            'period' => ['nullable','string'],
            'published_at' => ['nullable','date'],
            'description' => ['nullable','string'],
            'file' => ['nullable','file','max:10240'],
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }

        $document->update($data);

        return redirect()->route('admin.documents.index')->with('success', 'Document updated.');
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

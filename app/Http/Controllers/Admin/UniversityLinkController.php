<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversityLinkController extends Controller
{
    private string $jsonPath = 'university_links.json';

    public function index()
    {
        $universities = config('universities');
        $links = $this->readJson();

        return view('admin.universities.index', compact('universities','links'));
    }

    public function edit(string $universityKey)
    {
        $universities = config('universities');

        abort_unless(isset($universities[$universityKey]), 404);

        $links = $this->readJson();
        $current = $links[$universityKey] ?? [
            'title' => $universities[$universityKey],
            'events' => [],
        ];

        return view('admin.universities.edit', [
            'universityKey' => $universityKey,
            'universityName' => $universities[$universityKey],
            'current' => $current,
        ]);
    }

    public function update(Request $request, string $universityKey)
    {
        $universities = config('universities');
        abort_unless(isset($universities[$universityKey]), 404);

        $data = $request->validate([
            'events' => ['nullable','array'],
            'events.*.title' => ['required','string','max:255'],
            'events.*.url' => ['required','url','max:2048'],
        ]);

        $links = $this->readJson();

        $links[$universityKey] = [
            'title' => $universities[$universityKey],
            'events' => array_values($data['events'] ?? []),
        ];

        Storage::disk('local')->put($this->jsonPath, json_encode($links, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()->route('admin.universities.index')->with('success', 'University links saved (no DB).');
    }

    private function readJson(): array
    {
        if (!Storage::disk('local')->exists($this->jsonPath)) {
            return [];
        }

        $raw = Storage::disk('local')->get($this->jsonPath);
        $decoded = json_decode($raw, true);

        return is_array($decoded) ? $decoded : [];
    }
}

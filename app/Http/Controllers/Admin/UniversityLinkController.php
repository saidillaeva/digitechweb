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
        return view('admin.universities.index', [
            'universities' => config('universities'),
            'links' => $this->readJson(),
        ]);
    }

    public function edit(string $universityKey)
    {
        $universities = config('universities');
        abort_unless(isset($universities[$universityKey]), 404);

        $links = $this->readJson();

        return view('admin.universities.edit', [
            'universities' => $universities,
            'universityKey' => $universityKey,
            'current' => $links[$universityKey] ?? [
                    'title' => $universities[$universityKey],
                    'events' => [],
                ],
        ]);
    }

    // ➕ CREATE NEW LINK
    public function storeLink(Request $request, string $universityKey)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url'   => ['required', 'url', 'max:2048'],
        ]);

        $links = $this->readJson();

        // если университета ещё нет в JSON
        if (!isset($links[$universityKey])) {
            $links[$universityKey] = [
                'title' => config('universities')[$universityKey],
                'events' => [],
            ];
        }

        $links[$universityKey]['events'][] = [
            'title' => $request->title,
            'url'   => $request->url,
        ];

        $this->saveJson($links);

        return back()->with('success', 'Link added');
    }


    // ✏️ UPDATE ONE LINK
    public function updateLink(Request $request, string $universityKey, int $index)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url'   => ['required', 'url', 'max:2048'],
        ]);

        $links = $this->readJson();

        if (!isset($links[$universityKey]['events'][$index])) {
            return back()->with('error', 'Link not found');
        }

        $links[$universityKey]['events'][$index] = [
            'title' => $request->title,
            'url'   => $request->url,
        ];

        $this->saveJson($links);

        return back()->with('success', 'Link updated');
    }

    // 🗑 DELETE ONE LINK
    public function deleteLink(string $universityKey, int $index)
    {
        $links = $this->readJson();

        if (!isset($links[$universityKey]['events'][$index])) {
            return back()->with('error', 'Link not found');
        }

        unset($links[$universityKey]['events'][$index]);
        $links[$universityKey]['events'] = array_values($links[$universityKey]['events']);

        $this->saveJson($links);

        return back()->with('success', 'Link deleted');
    }

    // ===== HELPERS =====
    private function readJson(): array
    {
        if (!Storage::disk('local')->exists($this->jsonPath)) {
            return [];
        }

        return json_decode(
            Storage::disk('local')->get($this->jsonPath),
            true
        ) ?? [];
    }

    private function saveJson(array $data): void
    {
        Storage::disk('local')->put(
            $this->jsonPath,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }
}

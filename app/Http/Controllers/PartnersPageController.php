<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class PartnersPageController
{
    private string $jsonPath = 'university_links.json';

    private function getLinks(): array
    {
        if (!Storage::disk('local')->exists($this->jsonPath)) {
            return [];
        }

        return json_decode(
            Storage::disk('local')->get($this->jsonPath),
            true
        ) ?? [];
    }

    /** СТРАНИЦА ВСЕХ ПАРТНЁРОВ */
    public function index()
    {
        $universities = config('universities');
        return view('pages.partners', compact('universities'));
    }

    /** СТРАНИЦА ОДНОГО УНИВЕРСИТЕТА */
    public function show(string $universityKey)
    {
        $universities = config('universities');
        abort_unless(isset($universities[$universityKey]), 404);

        $links = $this->getLinks();
        $data = $links[$universityKey] ?? [
            'title' => $universities[$universityKey],
            'events' => [],
        ];

        return view('pages.partner-detail', [
            'universityKey' => $universityKey,
            'universityName' => $data['title'],
            'events' => $data['events'],
        ]);
    }
}

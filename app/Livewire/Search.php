<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = collect();

        if (strlen($this->search) > 2) {
            $results = Http::withToken(config('services.tmdb.token'))
                ->get("https://api.themoviedb.org/3/search/multi?include_adult=false&language=en-US&page=1&query=" . urlencode($this->search))
                ->json()['results'] ?? [];

            $searchResults = collect($results)
                ->filter(fn($r) => in_array($r['media_type'], ['movie', 'tv', 'person']))
                ->take(8);
        }

        return view('livewire.search', [
            'searchResults' => $searchResults,
        ]);
    }
}

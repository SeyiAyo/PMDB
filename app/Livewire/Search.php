<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) > 2) {
            $searchResults = Http::withToken(config('services.tmdb.token'))
                ->get("https://api.themoviedb.org/3/search/movie?include_adult=true&language=en-US&page=1&query=" . $this->search)
                ->json()['results'];
        }

        return view('livewire.search', [
            'searchResults' => collect($searchResults)->take(8)
        ]);
    }
}

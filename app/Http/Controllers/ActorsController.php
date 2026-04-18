<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    public function index()
    {
        $popularActors = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular?language=en-US&page=1')
            ->json()['results'];

        return view('actors.index', [
            'popularActors' => $popularActors,
        ]);
    }

    public function show(string $id)
    {
        $actor = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/$id?append_to_response=movie_credits,tv_credits,images&language=en-US")
            ->json();

        $movieCredits = collect($actor['movie_credits']['cast'] ?? [])
            ->sortByDesc('popularity')
            ->take(12)
            ->values();

        $tvCredits = collect($actor['tv_credits']['cast'] ?? [])
            ->sortByDesc('popularity')
            ->take(6)
            ->values();

        return view('actors.show', [
            'actor' => $actor,
            'movieCredits' => $movieCredits,
            'tvCredits' => $tvCredits,
        ]);
    }
}

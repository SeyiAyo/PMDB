<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class TvShowsController extends Controller
{
    public function index()
    {
        $popularShows = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular?language=en-US&page=1')
            ->json()['results'];

        $airingTodayShows = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/airing_today?language=en-US&page=1')
            ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list?language=en-US')
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('tv_shows.index', [
            'popularShows' => $popularShows,
            'airingTodayShows' => $airingTodayShows,
            'genres' => $genres,
        ]);
    }

    public function show(string $id)
    {
        $show = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/tv/$id?append_to_response=credits,images,videos,reviews&language=en-US")
            ->json();

        return view('tv_shows.show', [
            'show' => $show,
        ]);
    }
}

@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-6 pt-16">
        {{-- Popular Movies --}}
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" :key="$movie['id']"/>
                @endforeach
            </div>
        </div>
        {{-- End Popular Movies --}}

        {{-- Now Playing --}}
        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" :key="$movie['id']"/>
                @endforeach
            </div>
        </div>
        {{-- End Now Playing --}}
    </div>
@endsection

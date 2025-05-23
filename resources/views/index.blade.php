@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-6 pt-16">
        {{-- Popular Movies --}}
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $movie)
                    <div class="mt-8">
                        <a href="#">
                            <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm">
                                <span>⭐</span>
                                <span class="ml-1">{{ $movie['vote_average'] * 10 . '%'}} </span>
                                <span class="mx-2">|</span>
                                <span class="ml-1"> {{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                            </div>
                            <div class="text-gray-400 text-sm">
                                @foreach ($movie['genre_ids'] as $genreId)
                                    {{ $genres[$genreId] }}@if (!$loop->last), @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Popular Movies --}}

        {{-- Now Playing --}}
        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray-300">Movie Name</a>
                        <div class="flex items-center text-gray-400 text-sm">
                            <span>⭐</span>
                            <span class="ml-1">95% </span>
                            <span class="mx-2">|</span>
                            <span class="ml-1"> Feb 20, 2020</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            Action, Thriller, Comedy
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Now Playing --}}
    </div>
@endsection

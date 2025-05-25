@extends('layouts.main')

@section('content')
    {{-- Movie Info --}}
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="movie poster" class="w-64 lg:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold mt-2 md:mt-0">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-2">
                    <span>⭐</span>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 . '%'}} </span>
                    <span class="mx-2">|</span>
                    <span class="ml-1"> {{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span class="ml-1">
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last), @endif
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white text-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 5)
                                @if ($crew['job'] == 'Director' || $crew['job'] == 'Producer')
                                    <div class="mr-8">
                                        <div>{{ $crew['name'] }}</div>
                                        <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>

                @if (count($movie['videos']['results']) > 0 )
                    <div class="mt-12">
                        <a href="https://www.youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semi-bold px-5
                        py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"
                            /><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48
                            10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- end movie info --}}

    {{-- Movie Cast --}}
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 10)
                    <div class="mt-8">
                        <a href="#">
                            <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <div href="#" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</div>
                            <div class="text-gray-400 text-sm">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{--end movie cast --}}

    {{-- images --}}
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                        <div class="mt-8">
                            <a href="#">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $image['file_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- end images --}}

    {{-- Reviews --}}
    <div class="movie-reviews border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Reviews</h2>
            @if (isset($movie['reviews']['results']) && count($movie['reviews']['results']) > 0)
                <div class="grid grid-cols-1 gap-6 mt-8">
                    @foreach ($movie['reviews']['results'] as $review)
                        <div class="bg-gray-800 rounded-lg p-6 mb-6">
                            <div class="flex items-start">
                                <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-xl font-semibold text-white mr-4 flex-shrink-0 overflow-hidden">
                                    @if(isset($review['author_details']['avatar_path']) && $review['author_details']['avatar_path'])
                                        <img
                                            src="https://image.tmdb.org/t/p/w45{{ $review['author_details']['avatar_path'] }}"
                                            alt="{{ $review['author'] }}"
                                            class="w-full h-full object-cover"
                                            onerror="this.style.display='none'; this.parentNode.innerHTML='{{ substr($review['author'], 0, 1) }}';"
                                        >
                                    @else
                                        {{ substr($review['author'], 0, 1) }}
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-white">{{ $review['author'] }}</h3>
                                        @if(isset($review['author_details']['rating']))
                                            <div class="flex items-center bg-gray-700 px-2 py-1 rounded text-sm">
                                                <span class="text-yellow-400 mr-1">★</span>
                                                <span>{{ number_format($review['author_details']['rating'] / 2, 1) }}/5</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-gray-400 text-sm mb-4">
                                        {{ \Carbon\Carbon::parse($review['created_at'])->format('M d, Y') }}
                                    </div>
                                    <div class="text-gray-300 whitespace-pre-line">
                                        {{ $review['content'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-400 mt-4">No reviews available for this movie yet.</p>
            @endif
        </div>
    </div>
    {{-- end reviews --}}
@endsection

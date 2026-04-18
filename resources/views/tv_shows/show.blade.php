@extends('layouts.main')

@section('content')
    {{-- Show Info --}}
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            @if($show['poster_path'])
                <img src="https://image.tmdb.org/t/p/w500/{{ $show['poster_path'] }}" alt="show poster" class="w-64 lg:w-96">
            @else
                <div class="w-64 lg:w-96 bg-gray-800 flex items-center justify-center rounded">
                    <svg class="w-24 h-24 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold mt-2 md:mt-0">{{ $show['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-2">
                    <span>⭐</span>
                    <span class="ml-1">{{ number_format($show['vote_average'] * 10, 1) }}%</span>
                    <span class="mx-2">|</span>
                    @if(!empty($show['first_air_date']))
                        <span class="ml-1">{{ \Carbon\Carbon::parse($show['first_air_date'])->format('M d, Y') }}</span>
                        <span class="mx-2">|</span>
                    @endif
                    <span class="ml-1">
                        @foreach ($show['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last), @endif
                        @endforeach
                    </span>
                </div>

                @if(!empty($show['number_of_seasons']))
                    <div class="flex items-center text-gray-400 text-sm mt-2">
                        <span>{{ $show['number_of_seasons'] }} Season{{ $show['number_of_seasons'] > 1 ? 's' : '' }}</span>
                        <span class="mx-2">|</span>
                        <span>{{ $show['number_of_episodes'] }} Episode{{ $show['number_of_episodes'] > 1 ? 's' : '' }}</span>
                        @if(!empty($show['status']))
                            <span class="mx-2">|</span>
                            <span class="px-2 py-0.5 rounded text-xs
                                {{ $show['status'] === 'Returning Series' ? 'bg-green-700 text-green-200' : 'bg-gray-700 text-gray-300' }}">
                                {{ $show['status'] }}
                            </span>
                        @endif
                    </div>
                @endif

                <p class="text-gray-300 mt-8">
                    {{ $show['overview'] ?: 'No overview available.' }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex flex-wrap mt-4">
                        @foreach ($show['credits']['crew'] as $crew)
                            @if ($loop->index < 5)
                                @if (in_array($crew['job'], ['Executive Producer', 'Creator', 'Director', 'Producer']))
                                    <div class="mr-8 mb-4">
                                        <div>{{ $crew['name'] }}</div>
                                        <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                    </div>
                                @endif
                            @else
                                @break
                            @endif
                        @endforeach
                        @if(!empty($show['created_by']))
                            @foreach($show['created_by'] as $creator)
                                <div class="mr-8 mb-4">
                                    <div>{{ $creator['name'] }}</div>
                                    <div class="text-sm text-gray-400">Creator</div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div x-data="{ isOpen: false }">
                    @if (!empty($show['videos']['results']) && count($show['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true"
                                class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                    @endif

                    <div
                        style="background: rgba(0, 0, 0, 0.5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-50"
                        x-show="isOpen"
                        x-transition.opacity
                        x-transition.duration.500ms
                    >
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded-lg">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button @click="isOpen = false" @keydown.escape.window="isOpen = false" class="text-3xl hover:text-gray-300 leading-none">&times;</button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%;">
                                        @if(!empty($show['videos']['results'][0]['key']))
                                            <iframe width="560" height="315"
                                                class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                                src="https://www.youtube.com/embed/{{ $show['videos']['results'][0]['key'] }}"
                                                style="border: 0;" allow="autoplay; encrypted-media" allowfullscreen>
                                            </iframe>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Cast --}}
    @if(!empty($show['credits']['cast']))
        <div class="movie-cast border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Cast</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach ($show['credits']['cast'] as $cast)
                        @if ($loop->index < 10)
                            <div class="mt-8">
                                <a href="{{ route('actors.show', $cast['id']) }}">
                                    @if($cast['profile_path'])
                                        <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}" alt="{{ $cast['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                                    @else
                                        <div class="bg-gray-800 w-full h-64 flex items-center justify-center rounded hover:opacity-75 transition ease-in-out duration-150">
                                            <svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    @endif
                                </a>
                                <div class="mt-2">
                                    <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                                    <div class="text-gray-400 text-sm">{{ $cast['character'] ?? '' }}</div>
                                </div>
                            </div>
                        @else
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Images --}}
    @if(!empty($show['images']['backdrops']))
        <div class="movie-images border-b border-gray-800" x-data="{ isOpen: false, image: '' }">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Images</h2>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($show['images']['backdrops'] as $image)
                        @if ($loop->index < 6)
                            <div class="mt-8">
                                <a @click.prevent="isOpen = true; image = 'https://image.tmdb.org/t/p/original/{{ $image['file_path'] }}';" href="#">
                                    <img src="https://image.tmdb.org/t/p/w500/{{ $image['file_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            </div>
                        @else
                            @break
                        @endif
                    @endforeach
                </div>
                <div style="background: rgba(0, 0, 0, 0.5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-50" x-show="isOpen" x-transition.opacity x-transition.duration.500ms>
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded-lg">
                            <div class="flex justify-end pr-4 pt-2">
                                <button @click="isOpen = false" @keydown.escape.window="isOpen = false" class="text-3xl hover:text-gray-300 leading-none">&times;</button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image" alt="" class="w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Reviews --}}
    <div class="movie-reviews border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Reviews</h2>
            @if (!empty($show['reviews']['results']) && count($show['reviews']['results']) > 0)
                <div class="grid grid-cols-1 gap-6 mt-8">
                    @foreach ($show['reviews']['results'] as $review)
                        <div class="bg-gray-800 rounded-lg p-6 mb-6">
                            <div class="flex items-start">
                                <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-xl font-semibold text-white mr-4 flex-shrink-0 overflow-hidden">
                                    @if(isset($review['author_details']['avatar_path']) && $review['author_details']['avatar_path'])
                                        <img src="https://image.tmdb.org/t/p/w45{{ $review['author_details']['avatar_path'] }}" alt="{{ $review['author'] }}" class="w-full h-full object-cover" onerror="this.style.display='none';">
                                    @else
                                        {{ substr($review['author'], 0, 1) }}
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-white">{{ $review['author'] }}</h3>
                                        @if(isset($review['author_details']['rating']) && $review['author_details']['rating'])
                                            <div class="flex items-center bg-gray-700 px-2 py-1 rounded text-sm">
                                                <span class="text-yellow-400 mr-1">★</span>
                                                <span>{{ number_format($review['author_details']['rating'] / 2, 1) }}/5</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-gray-400 text-sm mb-4">{{ \Carbon\Carbon::parse($review['created_at'])->format('M d, Y') }}</div>
                                    <div class="text-gray-300 whitespace-pre-line">{{ $review['content'] }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-400 mt-4">No reviews available for this show yet.</p>
            @endif
        </div>
    </div>
@endsection

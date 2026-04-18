@extends('layouts.main')

@section('content')
    {{-- Actor Info --}}
    <div class="actor-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-shrink-0">
                @if($actor['profile_path'])
                    <img src="https://image.tmdb.org/t/p/w500/{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}" class="w-64 rounded-lg">
                @else
                    <div class="w-64 h-80 bg-gray-800 flex items-center justify-center rounded-lg">
                        <svg class="w-24 h-24 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                @endif

                <div class="mt-6 text-sm text-gray-400 space-y-2">
                    @if(!empty($actor['known_for_department']))
                        <div><span class="text-white font-semibold">Known For:</span> {{ $actor['known_for_department'] }}</div>
                    @endif
                    @if(!empty($actor['birthday']))
                        <div><span class="text-white font-semibold">Born:</span> {{ \Carbon\Carbon::parse($actor['birthday'])->format('M d, Y') }}</div>
                    @endif
                    @if(!empty($actor['deathday']))
                        <div><span class="text-white font-semibold">Died:</span> {{ \Carbon\Carbon::parse($actor['deathday'])->format('M d, Y') }}</div>
                    @endif
                    @if(!empty($actor['place_of_birth']))
                        <div><span class="text-white font-semibold">Birthplace:</span> {{ $actor['place_of_birth'] }}</div>
                    @endif
                </div>
            </div>

            <div class="md:ml-16 mt-8 md:mt-0">
                <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>

                @if(!empty($actor['biography']))
                    <h3 class="text-xl font-semibold mt-8 mb-4">Biography</h3>
                    <div class="text-gray-300 leading-relaxed space-y-4" x-data="{ expanded: false }">
                        @php $paragraphs = array_filter(explode("\n\n", trim($actor['biography']))); @endphp
                        @if(count($paragraphs) > 3)
                            <div>
                                @foreach(array_slice($paragraphs, 0, 3) as $para)
                                    <p class="mb-4">{{ $para }}</p>
                                @endforeach
                            </div>
                            <div x-show="expanded">
                                @foreach(array_slice($paragraphs, 3) as $para)
                                    <p class="mb-4">{{ $para }}</p>
                                @endforeach
                            </div>
                            <button @click="expanded = !expanded" class="text-orange-500 hover:text-orange-400 text-sm font-semibold">
                                <span x-show="!expanded">Read More ↓</span>
                                <span x-show="expanded">Read Less ↑</span>
                            </button>
                        @else
                            @foreach($paragraphs as $para)
                                <p class="mb-4">{{ $para }}</p>
                            @endforeach
                        @endif
                    </div>
                @else
                    <p class="text-gray-400 mt-8">No biography available.</p>
                @endif
            </div>
        </div>
    </div>

    {{-- Movie Credits --}}
    @if($movieCredits->count() > 0)
        <div class="border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold mb-8">Movies</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @foreach($movieCredits as $credit)
                        <div>
                            <a href="{{ route('movies.show_movie', $credit['id']) }}">
                                @if(!empty($credit['poster_path']))
                                    <img src="https://image.tmdb.org/t/p/w500/{{ $credit['poster_path'] }}" alt="{{ $credit['title'] }}" class="rounded hover:opacity-75 transition ease-in-out duration-150 w-full">
                                @else
                                    <div class="bg-gray-800 w-full h-48 flex items-center justify-center rounded hover:opacity-75 transition ease-in-out duration-150">
                                        <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                                        </svg>
                                    </div>
                                @endif
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('movies.show_movie', $credit['id']) }}" class="text-sm hover:text-gray-300 font-semibold">{{ $credit['title'] }}</a>
                                @if(!empty($credit['character']))
                                    <div class="text-gray-500 text-xs">{{ $credit['character'] }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- TV Credits --}}
    @if($tvCredits->count() > 0)
        <div class="border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold mb-8">TV Shows</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @foreach($tvCredits as $credit)
                        <div>
                            <a href="{{ route('tv.show', $credit['id']) }}">
                                @if(!empty($credit['poster_path']))
                                    <img src="https://image.tmdb.org/t/p/w500/{{ $credit['poster_path'] }}" alt="{{ $credit['name'] }}" class="rounded hover:opacity-75 transition ease-in-out duration-150 w-full">
                                @else
                                    <div class="bg-gray-800 w-full h-48 flex items-center justify-center rounded hover:opacity-75 transition ease-in-out duration-150">
                                        <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('tv.show', $credit['id']) }}" class="text-sm hover:text-gray-300 font-semibold">{{ $credit['name'] }}</a>
                                @if(!empty($credit['character']))
                                    <div class="text-gray-500 text-xs">{{ $credit['character'] }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection

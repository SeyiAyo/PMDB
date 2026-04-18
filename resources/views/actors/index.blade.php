@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-6 pt-16">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($popularActors as $actor)
                <div class="mt-8">
                    <a href="{{ route('actors.show', $actor['id']) }}">
                        @if($actor['profile_path'])
                            <img src="https://image.tmdb.org/t/p/w500/{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                        @else
                            <div class="bg-gray-800 w-full h-64 flex items-center justify-center rounded hover:opacity-75 transition ease-in-out duration-150">
                                <svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                    </a>
                    <div class="mt-2">
                        <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                        <div class="text-gray-400 text-sm">{{ $actor['known_for_department'] }}</div>
                        @if(!empty($actor['known_for']))
                            <div class="text-gray-500 text-xs mt-1 truncate">
                                Known for: {{ collect($actor['known_for'])->pluck('title')->filter()->merge(collect($actor['known_for'])->pluck('name')->filter())->implode(', ') }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

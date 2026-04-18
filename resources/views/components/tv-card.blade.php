<div class="mt-8">
    <a href="{{ route('tv.show', $show['id']) }}">
        @if($show['poster_path'])
            <img src="https://image.tmdb.org/t/p/w500/{{ $show['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150 w-full">
        @else
            <div class="bg-gray-800 w-full h-64 flex items-center justify-center rounded hover:opacity-75 transition ease-in-out duration-150">
                <svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
            </div>
        @endif
    </a>
    <div class="mt-2">
        <a href="{{ route('tv.show', $show['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $show['name'] }}</a>
        <div class="flex items-center text-gray-400 text-sm">
            <span>⭐</span>
            <span class="ml-1">{{ number_format($show['vote_average'] * 10, 1) }}%</span>
            @if(!empty($show['first_air_date']))
                <span class="mx-2">|</span>
                <span class="ml-1">{{ \Carbon\Carbon::parse($show['first_air_date'])->format('M d, Y') }}</span>
            @endif
        </div>
        @if(!empty($show['genre_ids']))
            <div class="text-gray-400 text-sm">
                @foreach ($show['genre_ids'] as $genreId)
                    {{ $genres[$genreId] ?? '' }}@if (!$loop->last), @endif
                @endforeach
            </div>
        @endif
    </div>
</div>

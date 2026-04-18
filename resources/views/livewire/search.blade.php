<li class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input
        wire:model.live.debounce.500ms="search"
        type="text"
        class="bg-gray-800 w-64 px-4 pl-8 py-2 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
        placeholder="Search movies, TV, people..."
        x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
        @keydown.*="isOpen = true"
    >
    <div class="absolute top-0">
        <svg class="w-5 h-5 text-gray-400 mt-2 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>

    <div wire:loading role="status" class="absolute top-1 right-1">
        <svg aria-hidden="true" class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-orange-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>

    @if (strlen($search) > 2)
        <div class="z-50 absolute bg-gray-800 w-72 mt-4 text-sm rounded-lg overflow-hidden shadow-xl"
            x-show="isOpen"
            x-transition.opacity
            x-transition.duration.300ms
        >
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        @php
                            $type = $result['media_type'];
                            if ($type === 'movie') {
                                $url = route('movies.show_movie', $result['id']);
                                $title = $result['title'] ?? '';
                                $image = $result['poster_path'] ?? null;
                                $badge = 'Movie';
                                $badgeColor = 'bg-blue-700';
                            } elseif ($type === 'tv') {
                                $url = route('tv.show', $result['id']);
                                $title = $result['name'] ?? '';
                                $image = $result['poster_path'] ?? null;
                                $badge = 'TV';
                                $badgeColor = 'bg-green-700';
                            } else {
                                $url = route('actors.show', $result['id']);
                                $title = $result['name'] ?? '';
                                $image = $result['profile_path'] ?? null;
                                $badge = 'Person';
                                $badgeColor = 'bg-purple-700';
                            }
                        @endphp
                        <li class="border-b border-gray-700 last:border-0">
                            <a href="{{ $url }}"
                                class="block hover:bg-gray-700 px-4 py-3 flex items-center transition duration-150"
                                @if ($loop->last) @keydown.tab="isOpen = false" @endif
                            >
                                @if ($image)
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $image }}" alt="{{ $title }}" class="w-8 h-12 object-cover rounded flex-shrink-0">
                                @else
                                    <div class="w-8 h-12 bg-gray-700 rounded flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="ml-3 min-w-0">
                                    <div class="text-white truncate">{{ $title }}</div>
                                    <span class="text-xs px-1.5 py-0.5 rounded {{ $badgeColor }} text-white">{{ $badge }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="px-4 py-3 text-gray-400">No results found for "{{ $search }}"</p>
            @endif
        </div>
    @endif
</li>

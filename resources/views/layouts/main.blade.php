<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMDB - Personal Movie Database</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans bg-gray-900 text-white">
    {{-- Nav Bar --}}
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movies.index') }}" class="flex items-center">
                        <svg class="w-8 h-8 text-orange-500" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 3v2h-2V3H8v2H6V3H4v18h2v-2h2v2h8v-2h2v2h2V3h-2zM8 17H6v-2h2v2zm0-4H6v-2h2v2zm0-4H6V7h2v2zm10 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V7h2v2z"/>
                        </svg>
                        <span class="ml-2 text-orange-500 font-bold text-xl tracking-wide">PMDB</span>
                    </a>
                </li>
                <li class="md:ml-8 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="text-gray-300 hover:text-white transition duration-150 {{ request()->routeIs('movies.*') ? 'text-white font-semibold' : '' }}">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('tv.index') }}" class="text-gray-300 hover:text-white transition duration-150 {{ request()->routeIs('tv.*') ? 'text-white font-semibold' : '' }}">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('actors.index') }}" class="text-gray-300 hover:text-white transition duration-150 {{ request()->routeIs('actors.*') ? 'text-white font-semibold' : '' }}">Actors</a>
                </li>
            </ul>

            <ul class="flex flex-col md:flex-row items-center">
                <livewire:search />
            </ul>
        </div>
    </nav>

    @yield('content')

    {{-- Footer --}}
    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <div class="flex flex-col items-center">
                <div class="flex items-center mb-4">
                    <svg class="w-6 h-6 text-orange-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M18 3v2h-2V3H8v2H6V3H4v18h2v-2h2v2h8v-2h2v2h2V3h-2zM8 17H6v-2h2v2zm0-4H6v-2h2v2zm0-4H6V7h2v2zm10 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V7h2v2z"/>
                    </svg>
                    <span class="ml-2 text-orange-500 font-bold">PMDB</span>
                </div>
                <p class="text-gray-400 text-sm">Copyright &copy; {{ date('Y') }} PMDB — Personal Movie Database</p>
                <p class="text-gray-600 text-xs mt-2">Powered by <a href="https://www.themoviedb.org" target="_blank" class="hover:text-gray-400">TMDB</a></p>
            </div>
        </div>
    </footer>
    @livewireScripts
</body>
</html>

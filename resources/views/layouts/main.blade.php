<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-900 text-white">
    {{-- Nav Bar --}}
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="/">Logo SVG</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#" class="text-gray-300 hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#" class="text-gray-300 hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#" class="text-gray-300 hover:text-gray-300">Actors</a>
                </li>
            </ul>

            <ul class="flex flex-col md:flex-row items-center">
                <li class="relative mt-3 md:mt-0">
                    <input type="text" class="bg-gray-800 w-64 px-4 pl-8 py-2 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Search">
                    <div class="absolute top-0">
                        <svg class="w-5 h-5 text-gray-400 mt-2 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#">
                        <img src="" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </li>
            </ul>

        </div>
    </nav>
    @yield('content')

    {{-- Footer --}}
    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <p class="text-gray-400 text-sm text-center">Copyright &copy; 2025 PMDB</p>
        </div>
    </footer>
</body>
</html>

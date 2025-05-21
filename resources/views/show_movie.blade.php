@extends('layouts.main')

@section('content')
    {{-- Movie Info --}}
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="img/gokool.jpg" alt="movie poster" class="w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold mt-2 md:mt-0">Movie Name</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-2">
                    <span>⭐</span>
                    <span class="ml-1">95% </span>
                    <span class="mx-2">|</span>
                    <span class="ml-1"> Feb 20, 2020</span>
                    <span class="mx-2">|</span>
                    <span class="ml-1">Action, Thriller, Comedy</span>
                </div>

                <p class="text-gray-300 mt-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>

                <div class="mt-12">
                    <h4 class="text-white text-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Mr Senpai</div>
                            <div class="text-sm text-gray-400">Screenplay, Director, Story</div>
                        </div>
                        <div class="ml-8">
                            <div>Paul ATreides</div>
                            <div class="text-sm text-gray-400">Screenplay</div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <button class="flex items-center bg-orange-500 text-gray-900 rounded font-semi-bold px-5
                    py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"
                        /><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48
                        10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end movie info --}}

    {{-- Movie Cast --}}
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <div href="#" class="text-lg mt-2 hover:text-gray-300">Real Name</div>
                        <div class="text-gray-400 text-sm">
                            Movie Name
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <div href="#" class="text-lg mt-2 hover:text-gray-300">Real Name</div>
                        <div class="text-gray-400 text-sm">
                            Movie Name
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <div href="#" class="text-lg mt-2 hover:text-gray-300">Real Name</div>
                        <div class="text-gray-400 text-sm">
                            Movie Name
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <div href="#" class="text-lg mt-2 hover:text-gray-300">Real Name</div>
                        <div class="text-gray-400 text-sm">
                            Movie Name
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <div href="#" class="text-lg mt-2 hover:text-gray-300">Real Name</div>
                        <div class="text-gray-400 text-sm">
                            Movie Name
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--end movie cast --}}

    {{-- images --}}
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="img/gokool.jpg" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

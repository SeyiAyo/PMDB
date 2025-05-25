<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ViewMoviesTest extends TestCase
{
    public function test_the_main_page_shows_correctly()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular*' => $this->fakePopularMoviesResponse(),
            'https://api.themoviedb.org/3/movie/now_playing*' => $this->fakeNowPlayingMoviesResponse(),
            'https://api.themoviedb.org/3/genre/movie/list*' => $this->fakeGenresResponse()
        ]);

        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
        $response->assertSee('Fake Movie');
        $response->assertSee('Now Playing Fake Movie');
        $response->assertViewHas('popularMovies');
        $response->assertViewHas('genres');
        $response->assertViewHas('nowPlayingMovies');
    }

    public function test_the_movie_page_shows_correctly()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/*' => $this->fakeMovieResponse()
        ]);

        $response = $this->get(route('movies.show_movie', 950387));

        $response->assertSuccessful();
        $response->assertSee('Fake Minecraft Movie');
    }

    private function fakePopularMoviesResponse()
    {
        return Http::response([
            'results' => [
                [
                    'adult' => false,
                    'backdrop_path' => '/2Nti3gYAX513wvhp8IiLL6ZDyOm.jpg',
                    'genre_ids' => [16, 12, 35],
                    'id' => 950387,
                    'original_language' => 'en',
                    'original_title' => 'Fake Movie',
                    'overview' => 'Four misfits find themselves struggling with ordinary problems when they are suddenly pulled through a mysterious portal into the Overworld',
                    'popularity' => 713.0295,
                    'poster_path' => '/yFHHfHcUgGAxziP1C3lLt0q2T4s.jpg',
                    'release_date' => '2025-03-31',
                    'title' => 'Fake Movie',
                    'video' => false,
                    'vote_average' => 6.53,
                    'vote_count' => 1397
                ]
            ]
        ], 200);
    }

    private function fakeNowPlayingMoviesResponse()
    {
        return Http::response([
            'results' => [
                [
                    'adult' => false,
                    'backdrop_path' => '/example.jpg',
                    'genre_ids' => [28, 12],
                    'id' => 12345,
                    'original_language' => 'en',
                    'original_title' => 'Now Playing Fake Movie',
                    'overview' => 'This is a now playing movie',
                    'popularity' => 500.123,
                    'poster_path' => '/path/to/poster.jpg',
                    'release_date' => '2025-04-15',
                    'title' => 'Now Playing Fake Movie',
                    'video' => false,
                    'vote_average' => 7.5,
                    'vote_count' => 1000
                ]
            ]
        ], 200);
    }

    private function fakeGenresResponse()
    {
        return Http::response([
            'genres' => [
                ['id' => 16, 'name' => 'Animation'],
                ['id' => 12, 'name' => 'Adventure'],
                ['id' => 35, 'name' => 'Comedy'],
                ['id' => 28, 'name' => 'Action']
            ]
        ], 200);
    }

    private function fakeMovieResponse()
    {
        return Http::response([
            'adult' => false,
            'backdrop_path' => '/2Nti3gYAX513wvhp8IiLL6ZDyOm.jpg',
            'belongs_to_collection' => [
                'id' => 1,
                'name' => 'Minecraft Collection',
                'poster_path' => '/path/to/collection.jpg',
                'backdrop_path' => '/path/to/backdrop.jpg'
            ],
            'budget' => 150000000,
            'genres' => [
                ['id' => 16, 'name' => 'Animation'],
                ['id' => 12, 'name' => 'Adventure']
            ],
            'homepage' => 'https://www.minecraft-movie.com',
            'id' => 950387,
            'imdb_id' => 'tt3566834',
            'origin_country' => ['US'],
            'original_language' => 'en',
            'original_title' => 'Fake Minecraft Movie',
            'overview' => 'Four misfits find themselves struggling with ordinary problems when they are suddenly pulled through a mysterious portal into the Overworld',
            'popularity' => 713.0295,
            'poster_path' => '/yFHHfHcUgGAxziP1C3lLt0q2T4s.jpg',
            'production_companies' => [
                [
                    'id' => 1,
                    'logo_path' => '/path/to/logo.png',
                    'name' => 'Production Company',
                    'origin_country' => 'US'
                ]
            ],
            'production_countries' => [
                ['iso_3166_1' => 'US', 'name' => 'United States']
            ],
            'release_date' => '2025-03-31',
            'revenue' => 929520013,
            'runtime' => 101,
            'spoken_languages' => [
                ['english_name' => 'English', 'iso_639_1' => 'en', 'name' => 'English']
            ],
            'status' => 'Released',
            'tagline' => 'Be there and be square.',
            'title' => 'Fake Minecraft Movie',
            'video' => false,
            'vote_average' => 6.52,
            'vote_count' => 1394,
            'credits' => [
                'cast' => [],
                'crew' => []
            ],
            'images' => [
                'backdrops' => [],
                'posters' => []
            ],
            'videos' => [
                'results' => []
            ],
            'reviews' => [
                'results' => []
            ]
        ], 200);
    }
}

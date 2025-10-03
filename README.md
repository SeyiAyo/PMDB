# PMDB - Personal Movie Database

<p align="center">
  <img src="public/images/logo.png" alt="PMDB Logo" width="200">
</p>

<p align="center">
  <a href="https://heroku.com/deploy?template=https://github.com/seyiayo/PMDB">
    <img src="https://www.herokucdn.com/deploy/button.svg" alt="Deploy">
  </a>
</p>

## About PMDB

PMDB is a comprehensive movie database application that allows users to explore, discover, and track their favorite films. Built with Laravel and powered by The Movie Database (TMDB) API, PMDB provides a rich collection of movie information in a user-friendly interface.

## Features

- **Extensive Movie Catalog**: Browse through thousands of movies with detailed information
- **Real-time Search**: Find movies instantly with Livewire-powered search
- **Movie Details**: View comprehensive information including cast, crew, reviews, and trailers
- **Popular & Now Playing**: Stay updated with trending and currently playing movies
- **Responsive Design**: Enjoy a seamless experience on any device
- **Fast Performance**: Optimized for speed with efficient API calls

## Local Development

1. Clone the repository
2. Install dependencies: `composer install && npm install`
3. Copy `.env.example` to `.env`
4. Add your TMDB Bearer Token to `.env`: `TMDB_TOKEN=your_token_here`
5. Generate app key: `php artisan key:generate`
6. Build assets: `npm run build`
7. Start server: `php artisan serve`

## Technology Stack

- **Backend**: Laravel 11, PHP 8.2+
- **Frontend**: Blade Templates, Livewire, TailwindCSS
- **API**: The Movie Database (TMDB)
- **Deployment**: Heroku ready with app.json

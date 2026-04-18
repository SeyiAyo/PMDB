# PMDB - Personal Movie Database

## Overview
A full-featured Laravel 12 web application for exploring movies, TV shows, and actors using The Movie Database (TMDB) API. Features real-time multi-type search powered by Livewire, detail pages for movies/shows/actors, and a responsive Tailwind CSS UI.

## Tech Stack
- **Backend**: PHP 8.2 / Laravel 12
- **Frontend**: Blade Templates, Livewire 3, Alpine.js, Tailwind CSS 4
- **Build Tool**: Vite 6 with laravel-vite-plugin
- **Database**: SQLite (development)
- **API**: TMDB (The Movie Database) REST API

## Features
- **Movies**: Popular movies, now playing, movie detail pages (cast, crew, trailer, images, reviews)
- **TV Shows**: Popular shows, airing today, show detail pages (cast, crew, trailer, images, reviews)
- **Actors**: Popular actors, actor detail pages (biography, movie credits, TV credits)
- **Search**: Livewire real-time multi-search across movies, TV shows, and people (using TMDB multi-search)
- **Navigation**: Active-state nav links, PMDB logo, active section highlighting
- **Cast links**: Cast members on movie/TV pages link to actor detail pages

## Project Structure
- `app/Http/Controllers/MoviesController.php` — Movie listing and detail
- `app/Http/Controllers/TvShowsController.php` — TV show listing and detail
- `app/Http/Controllers/ActorsController.php` — Actor listing and detail
- `app/Livewire/Search.php` — Real-time multi-search (movies, TV, people)
- `resources/views/layouts/main.blade.php` — Main layout with nav and footer
- `resources/views/index.blade.php` — Movies home page
- `resources/views/show_movie.blade.php` — Movie detail page
- `resources/views/tv_shows/` — TV show views
- `resources/views/actors/` — Actor views
- `resources/views/components/movie-card.blade.php` — Movie card component
- `resources/views/components/tv-card.blade.php` — TV show card component
- `config/services.php` — TMDB API config (`services.tmdb.token`)
- `routes/web.php` — Application routes

## Routes
- `/` — Movies index (popular + now playing)
- `/movies/{id}` — Movie detail
- `/tv-shows` — TV shows index (popular + airing today)
- `/tv-shows/{id}` — TV show detail
- `/actors` — Actors index (popular)
- `/actors/{id}` — Actor detail

## Environment Variables & Secrets
- `TMDB_TOKEN` (secret) — TMDB API Read Access Token (required)
- `DB_CONNECTION=sqlite` — SQLite database
- `DB_DATABASE=/home/runner/workspace/database/database.sqlite`
- `SESSION_DRIVER=file`
- `QUEUE_CONNECTION=sync`
- `CACHE_STORE=file`

## Running the App
Started via `start.sh` which runs migrations, builds frontend assets, and starts Laravel on `0.0.0.0:5000`.

Vite config has `allowedHosts: true` and `host: '0.0.0.0'` for Replit proxy support.

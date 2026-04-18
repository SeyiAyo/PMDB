# PMDB - Personal Movie Database

## Overview
A Laravel 12 web application for exploring and tracking movies using The Movie Database (TMDB) API. Features real-time search powered by Livewire, movie detail pages with cast/crew/reviews/trailers, and a responsive Tailwind CSS UI.

## Tech Stack
- **Backend**: PHP 8.2 / Laravel 12
- **Frontend**: Blade Templates, Livewire 3, Tailwind CSS 4
- **Build Tool**: Vite 6 with laravel-vite-plugin
- **Database**: SQLite (development)
- **API**: TMDB (The Movie Database) REST API

## Project Structure
- `app/Http/Controllers/MoviesController.php` — Movie listing and detail pages
- `app/Livewire/Search.php` — Real-time search component
- `resources/views/` — Blade templates
- `config/services.php` — TMDB API config (`services.tmdb.token`)
- `routes/web.php` — Application routes
- `vite.config.js` — Frontend build config (host: 0.0.0.0, allowedHosts: true for Replit proxy)

## Environment Variables & Secrets
- `TMDB_TOKEN` (secret) — TMDB API Read Access Token (required)
- `DB_CONNECTION=sqlite` — SQLite database
- `DB_DATABASE=/home/runner/workspace/database/database.sqlite`
- `SESSION_DRIVER=file`
- `QUEUE_CONNECTION=sync`
- `CACHE_STORE=file`

## Running the App
The app is started via `start.sh` which:
1. Sets env vars
2. Runs `php artisan migrate --force`
3. Builds frontend assets with `npm run build`
4. Starts Laravel dev server on `0.0.0.0:5000`

## Key Configuration
- Laravel serves on port **5000** (required for Replit webview)
- Vite config has `allowedHosts: true` and `host: '0.0.0.0'` for the Replit proxy
- TMDB token is used via `Http::withToken(config('services.tmdb.token'))`

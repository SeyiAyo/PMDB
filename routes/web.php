<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TvShowsController;
use App\Http\Controllers\ActorsController;

Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MoviesController::class, 'show'])->name('movies.show_movie');

Route::get('/tv-shows', [TvShowsController::class, 'index'])->name('tv.index');
Route::get('/tv-shows/{show}', [TvShowsController::class, 'show'])->name('tv.show');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/{actor}', [ActorsController::class, 'show'])->name('actors.show');

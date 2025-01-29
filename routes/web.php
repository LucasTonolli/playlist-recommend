<?php

use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlaylistController::class, 'home'])->name('home');
Route::get('/contato', fn() => view('page.contact'))->name('contact');
Route::get('/buscar', [PlaylistController::class, 'search'])->name('spotify.search');


Route::resource('playlist', PlaylistController::class)
    ->parameters(['playlist' => 'playlist:spotify_id'])
    ->except(['create', 'edit', 'update', 'show']);

<?php

use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('playlist', PlaylistController::class)
    ->parameters(['playlist' => 'playlist:spotify_id'])
    ->except(['create', 'edit', 'update']);

Route::get('playlists/buscar', [PlaylistController::class, 'search']);

<?php

use App\Http\Controllers\PlaylistController;
use App\Models\Playlist;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlaylistController::class, 'home']);

Route::resource('playlist', PlaylistController::class)
    ->parameters(['playlist' => 'playlist:spotify_id'])
    ->except(['create', 'edit', 'update', 'show']);

Route::get('playlists/buscar', [PlaylistController::class, 'search']);

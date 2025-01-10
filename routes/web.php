<?php


use App\Services\PlaylistService;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $playlistService = new PlaylistService();
    $playlistService->getPlaylists('nightcore');
    return view('welcome');
});

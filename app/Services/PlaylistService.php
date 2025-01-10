<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

use function Illuminate\Log\log;

class PlaylistService
{
    protected $spotifyService;

    public function __construct()
    {
        $this->spotifyService = new SpotifyService();
    }

    public function getPlaylists(string $term)
    {
        $response = $this->spotifyService->getPlaylists($term);

        $items    = $response->object()->playlists->items;
        $pagination = [
            'next' => $response->object()->playlists->next,
            'previous' => $response->object()->playlists->previous,
            'total' => $response->object()->playlists->total
        ];

        dd($items);


        return compact('items', 'pagination');
    }

    private function normalizePlaylists(array $playlists)
    {
        return $playlists;
    }
}

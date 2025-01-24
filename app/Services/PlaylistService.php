<?php

namespace App\Services;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class PlaylistService
{
    protected $spotifyService;

    public function __construct(SpotifyService $spotifyService)
    {
        $this->spotifyService = $spotifyService;
    }

    public function getPlaylists(string $term)
    {

        $response = $this->spotifyService->getPlaylists($term);

        $items    = $response->object()->playlists->items;
        $items    = $this->normalizePlaylists($items);
        $pagination = [
            'next' => $response->object()->playlists->next,
            'previous' => $response->object()->playlists->previous,
            'total' => $response->object()->playlists->total
        ];


        return (object)[
            'items' => $items,
            'pagination' => $pagination
        ];
    }

    public function createPlaylist(array $data)
    {
        $playlist = Playlist::create($data);

        return $playlist;
    }

    public function get(?string $id = null)
    {
        if ($id) {
            $playlist = Playlist::where('spotify_id', $id)->firstOrFail();
            $playlist = $this->normalizePlaylist($playlist);
            $playlist->setAttribute('musics', $this->getTracks($playlist->spotify_id));
            return $playlist;
        }

        return $this->normalizePlaylists(Playlist::all());
    }

    private function getTracks(string $playlistId)
    {
        $tracks = $this->spotifyService->getTracks($playlistId);
        return $tracks->object()->items;
    }



    private function normalizePlaylists(Collection|array $playlists)
    {
        return collect($playlists)
            ->filter(fn($playlist) => $playlist !== null)
            ->map(fn($playlist) => $this->normalizePlaylist($playlist));
    }

    private function normalizePlaylist(stdClass|Playlist $playlist)
    {

        if ($playlist instanceof stdClass) {
            $imageUrl = isset($playlist->images[0]->url) ? $playlist->images[0]->url : null;
            $musicQuantity = isset($playlist->tracks->total) ? $playlist->tracks->total : 0;
            $playlist = new Playlist([
                'name' => $playlist->name ?? 'Unknown',  // Garantir que sempre haja um valor
                'spotify_id' => $playlist->id ?? null,
                'image_url' => $imageUrl,
                'music_quantity' => $musicQuantity,
            ]);
        }


        $playlist->setAttribute('spotify_app', 'spotify:playlist:' . $playlist->spotify_id);
        $playlist->setAttribute('spotify_web', 'https://open.spotify.com/playlist/' . $playlist->spotify_id);
        return $playlist;
    }
}

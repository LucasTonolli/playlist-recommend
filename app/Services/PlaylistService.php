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

    public function getPlaylists(string $term, $page = 1)
    {

        $response = $this->spotifyService->getPlaylists($term, $page);

        $items    = $response->object()->playlists->items;
        $items    = $this->normalizePlaylists($items);
        $pagination = (object)[
            'next' => $response->object()->playlists->next,
            'current_page' => $page,
            'previous' => $response->object()->playlists->previous,
            'is_last_page' => $page === (int) $response->object()->playlists->total / 10,
            'page_qty'  => round($response->object()->playlists->total / 10),
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

    public function get(?string $term = null)
    {
        if ($term) {
            $playlists = Playlist::where('name', 'like', '%' . $term . '%')
                ->paginate(4);
        } else {
            $playlists = Playlist::paginate(4);
        }

        $playlists->setCollection(collect($this->normalizePlaylists($playlists->items())));
        return $playlists;
    }

    public function getRandom()
    {
        $playlist = Playlist::inRandomOrder()->first();
        $playlist = $this->normalizePlaylist($playlist);
        return $playlist;
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

<?php

namespace Tests\Unit;

use App\Services\PlaylistService;
use Illuminate\Foundation\Testing\TestCase;

use function Illuminate\Log\log;

class PlaylistServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_playlists(): void
    {
        $spotifyService = new PlaylistService();
        $playlists = $spotifyService->getPlaylists('nightcore');

        expect($playlists)->toBeArray();
        expect($playlists['items'])->toBeArray();
        expect($playlists['pagination'])->toBeArray();
    }
}

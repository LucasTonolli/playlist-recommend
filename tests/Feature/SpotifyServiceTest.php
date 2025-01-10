<?php

namespace Tests\Unit;

use App\Services\SpotifyService;
use Illuminate\Foundation\Testing\TestCase;

class SpotifyServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_playlists(): void
    {
        $spotifyService = new SpotifyService();
        $response = $spotifyService->getPlaylists('nightcore');

        expect($response->successful())->toBeBool();
    }
}

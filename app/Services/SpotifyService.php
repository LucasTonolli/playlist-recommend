<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

use function Illuminate\Log\log;
use function Laravel\Prompts\error;

class SpotifyService
{
    protected string $apiUrl;
    protected ApiTokenService $apiTokenService;

    public function __construct()
    {
        $this->apiUrl = config('spotify.api_url');
        $this->apiTokenService = new ApiTokenService();
    }

    private function request(string $method, string $endpoint, array $params = [])
    {
        $token = $this->apiTokenService->getAccessToken();
        $url   = $this->apiUrl . $endpoint;
        $response = Http::withToken($token)->$method($url, $params);

        return $response;
    }

    public function getPlaylists(string $term, $page = 1)
    {
        $response = $this->request('get', '/search', [
            'q' => $term,
            'type' => 'playlist',
            'market' => 'BR',
            'offset' => ($page - 1) * 10
        ]);

        return $response;
    }

    public function getTracks(string $playlistId)
    {
        $response = $this->request(
            'get',
            '/playlists/' . $playlistId . '/tracks',
            [
                'market' => 'BR',
                'fields' => 'items(track(name,href))'
            ]
        );

        return $response;
    }
}

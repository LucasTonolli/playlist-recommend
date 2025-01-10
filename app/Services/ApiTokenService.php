<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

use function Illuminate\Log\log;

class ApiTokenService
{
    protected $clientId;
    protected $clientSecret;
    protected $apiAccessTokenUrl;

    public function __construct()
    {
        $this->clientId = config('spotify.client_id');
        $this->clientSecret = config('spotify.client_secret');
        $this->apiAccessTokenUrl = config('spotify.api_access_token');
    }

    public function getAccessToken(): string
    {
        if (cache()->has('access_token')) {
            return cache()->get('access_token');
        }

        return $this->generateAccessToken();
    }

    private function generateAccessToken(): string
    {
        $response = Http::asForm()->post(
            $this->apiAccessTokenUrl,
            [
                'grant_type' => 'client_credentials',
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret
            ]
        );

        if ($response->failed()) {
            throw new \Exception($response->body());
        }

        cache()->put('access_token', $response->object()->access_token, $response->object()->expires_in);

        return  $response->object()->access_token;
    }
}

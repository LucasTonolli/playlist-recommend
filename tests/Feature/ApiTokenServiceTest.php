<?php

namespace Tests\Feature;

use App\Services\ApiTokenService;
use Tests\TestCase;

class ApiTokenServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_access_token(): void
    {

        $apiTokenService = new ApiTokenService();


        $response = $apiTokenService->getAccessToken();

        $this->assertIsString($response);
    }
}

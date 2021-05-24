<?php declare(strict_types=1);

namespace Tests\Requests\Login;

use Tests\TestCase;

class AccessTokenTest extends TestCase
{
    public function testAccessToken(): void
    {
        $response = $this->app->login->accessToken();

        $this->assertNotEmpty($response->accessToken);
        $this->assertNotEmpty($response->expiresIn);
    }
}
<?php declare(strict_types=1);

namespace Tests\Requests\Login;

use BytedanceMiniApp\Kernel\Http\HttpClient;
use Tests\TestCase;

class AccessTokenTest extends TestCase
{
    public function testAccessToken(): void
    {
        $http = $this->createMock(HttpClient::class);
        $http->expects($this->any())
            ->method('get')
            ->will(
                $this->returnValue([
                    'access_token' => 'test',
                    'expires_in' => time()
                ])
            );

        $app = $this->mockApp($http);
        $response = $app->login->accessToken();

        $this->assertNotEmpty($response->accessToken);
        $this->assertNotEmpty($response->expiresIn);
    }
}
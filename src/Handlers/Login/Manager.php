<?php declare(strict_types=1);

namespace BytedanceMiniApp\Handlers\Login;

use BytedanceMiniApp\Handlers\Login\Requests\AccessToken;
use BytedanceMiniApp\Handlers\Login\Requests\Code2Session\Code2SessionRequest;
use BytedanceMiniApp\Handlers\Login\Requests\Code2Session\Code2SessionResponse;

/**
 * @method AccessToken\AccessTokenResponse accessToken()
 * @method Code2SessionResponse code2Session(string $code)
 * @package BytedanceMiniApp\Handlers\Login
 */
class Manager extends \BytedanceMiniApp\Kernel\Manager
{
    protected function getClassMap(): array
    {
        return [
            'accessToken' => AccessToken\AccessTokenRequest::class,
            'code2Session' => Code2SessionRequest::class,
        ];
    }
}
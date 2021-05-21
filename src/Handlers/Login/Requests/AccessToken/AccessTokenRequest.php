<?php declare(strict_types=1);

namespace BytedanceMiniApp\Handlers\Login\Requests\AccessToken;


use BytedanceMiniApp\Kernel\Http\Request;
use BytedanceMiniApp\Kernel\Http\Response;

class AccessTokenRequest extends Request
{
    public function format(array $response): Response
    {
        return AccessTokenResponse::createFromArray($response);
    }

    public function sendRequest(...$arguments): array
    {
        return $this->http->get(
            'https://developer.toutiao.com/api/apps/token',
            [
                'grant_type' => 'client_credential',
                'appid' => $this->config->appId,
                'secret' => $this->config->secret
            ],
            []
        );
    }
}
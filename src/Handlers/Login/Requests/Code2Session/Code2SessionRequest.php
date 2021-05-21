<?php declare(strict_types=1);

namespace BytedanceMiniApp\Handlers\Login\Requests\Code2Session;

use BytedanceMiniApp\Kernel\Http\Request;
use BytedanceMiniApp\Kernel\Http\Response;

class Code2SessionRequest extends Request
{
    public function format(array $response): Response
    {
        return Code2SessionResponse::createFromArray($response);
    }

    public function sendRequest(...$argument): array
    {
        [$code] = $argument;

        return $this->http->get(
            'https://developer.toutiao.com/api/apps/jscode2session',
            [
                'appid' => $this->config->appId,
                'secret' => $this->config->secret,
                'code' => $code,
            ]
        );
    }
}
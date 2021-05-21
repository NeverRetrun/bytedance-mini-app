<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Login\Requests\AccessToken;


use BytedanceMiniApp\Kernel\Http\Response;

class AccessTokenResponse extends Response
{
    /**
     * 获取的 access_token
     * @var string
     */
    public string $accessToken;

    /**
     * access_token 有效时间，单位：秒
     * @var int
     */
    public int $expiresIn;

    public function __construct(
        string $accessToken,
        int $expiresIn
    )
    {
        $this->accessToken = $accessToken;
        $this->expiresIn = $expiresIn;
    }

    public static function createFromArray(array $array)
    {
        return new static(
            $array['access_token'],
            $array['expires_in']
        );
    }
}
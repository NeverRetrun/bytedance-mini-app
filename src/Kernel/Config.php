<?php declare(strict_types=1);


namespace BytedanceMiniApp\Kernel;


class Config
{
    /**
     * api app id
     * @var string
     */
    public string $appId;

    /**
     * api secret
     * @var string
     */
    public string $secret;

    public function __construct(
        string $appId,
        string $secret
    )
    {
        $this->appId = $appId;
        $this->secret = $secret;
    }
}
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

    /**
     * debug mode
     * if enable debug can log response
     * @var bool
     */
    public bool $isDebug;

    /**
     * payment salt
     * @var string
     */
    public string $salt;

    /**
     * payment token
     * @var string
     */
    public string $token;

    public function __construct(
        string $appId,
        string $secret,
        string $salt,
        string $token,
        bool $isDebug = false
    )
    {
        $this->appId   = $appId;
        $this->secret  = $secret;
        $this->salt = $salt;
        $this->token = $token;
        $this->isDebug = $isDebug;
    }
}
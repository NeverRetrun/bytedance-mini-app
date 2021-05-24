<?php declare(strict_types=1);


namespace BytedanceMiniApp\Kernel;


use BytedanceMiniApp\Kernel\Http\HttpClient;
use BytedanceMiniApp\Kernel\Log\Logger;

abstract class Handler implements HandlerInterface
{
    protected HttpClient $http;

    protected Config $config;

    protected ?Logger $logger;

    public function __construct(
        HttpClient $http,
        Config $config,
        ?Logger $logger
    )
    {
        $this->http   = $http;
        $this->config = $config;
        $this->logger = $logger;
    }
}
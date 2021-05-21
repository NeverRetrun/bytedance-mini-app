<?php declare(strict_types=1);


namespace BytedanceMiniApp\Kernel\Http;


use BytedanceMiniApp\Kernel\Config;
use BytedanceMiniApp\Kernel\Exceptions\RequestException;
use BytedanceMiniApp\Kernel\Kernel;
use Psr\Http\Message\ResponseInterface;

abstract class Request implements OpenApiInterface
{
    protected HttpClient $http;

    protected Config $config;

    protected Kernel $app;

    public function __construct(
        HttpClient $http,
        Config $config,
        Kernel $app
    )
    {
        $this->http   = $http;
        $this->config = $config;
        $this->app = $app;
    }

    abstract public function sendRequest(...$arguments): array;

    public function handle(...$arguments): Response
    {
        return $this->format(
            $this->sendRequest(...$arguments)
        );
    }
}
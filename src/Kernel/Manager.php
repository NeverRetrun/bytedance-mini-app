<?php declare(strict_types=1);


namespace BytedanceMiniApp\Kernel;


use BytedanceMiniApp\Kernel\Exceptions\Exception;
use BytedanceMiniApp\Kernel\Http\HttpClient;
use BytedanceMiniApp\Kernel\Http\OpenApiInterface;
use BytedanceMiniApp\Kernel\Log\Logger;

abstract class Manager
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

    /**
     * @param Kernel $kernel
     * @return static
     */
    public static function createFromKernel(Kernel $kernel)
    {
        return new static(
            $kernel->getClient(),
            $kernel->getConfig(),
            $kernel->getLogger(),
        );
    }

    /**
     * @return array
     */
    abstract protected function getClassMap(): array;

    public function __call($name, $arguments)
    {
        $classMap = $this->getClassMap();
        $handler  = new $classMap[$name](
            $this->http,
            $this->config,
            $this->logger
        );

        try {
            if ($handler instanceof OpenApiInterface) {
                return $handler->handle($arguments);
            } elseif ($handler instanceof HandlerInterface) {
                return $handler->handle($arguments);
            }
        }catch (Exception $exception) {
            if ($this->logger !== null) {
                $this->logger->errorFromException($exception);
            }
            throw $exception;
        }
    }
}
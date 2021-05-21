<?php declare(strict_types=1);


namespace BytedanceMiniApp\Kernel;


use BytedanceMiniApp\Kernel\Exceptions\Exception;
use BytedanceMiniApp\Kernel\Http\HttpClient;
use BytedanceMiniApp\Kernel\Log\Logger;
use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;

class Kernel
{
    protected HttpClient $client;

    protected Config $config;

    protected ?Logger $logger;

    protected ?CacheInterface $cache;

    protected bool $isDebug = false;

    public function __construct(HttpClient $client, Config $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    /**
     * 获取token
     * @return string
     */
    public function getAccessToken(): string
    {
        return (new \BytedanceMiniApp\Handlers\Login\Manager($this))
            ->accessToken()
            ->accessToken;
    }

    /**
     * @param LoggerInterface|null $logger
     * @return $this
     */
    public function withLoggerFormLoggerInterface(?LoggerInterface $logger): Kernel
    {
        if ($logger !== null) {
            $this->logger = new Logger($logger);
        }

        return $this;
    }

    /**
     * @param CacheInterface|null $cache
     * @return $this
     */
    public function withCache(?CacheInterface $cache): Kernel
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @param Exception $exception
     */
    public function log(Exception $exception): void
    {
        if (isset($this->logger)) {
            $this->logger->errorFromException($exception);
        }
    }

    public function debug(array $message):void
    {
        $this->logger->debug(json_encode($message));
    }

    /**
     * @return HttpClient
     */
    public function getClient(): HttpClient
    {
        return $this->client;
    }

    /**
     * @return Logger|null
     */
    public function getLogger(): ?Logger
    {
        return $this->logger;
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * enable debug
     * @return $this
     */
    public function enableDebug(): Kernel
    {
        $this->isDebug = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->isDebug;
    }
}
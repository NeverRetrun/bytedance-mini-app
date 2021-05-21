<?php declare(strict_types=1);


namespace BytedanceMiniApp\Kernel\Log;


use BytedanceMiniApp\Kernel\Exceptions\Exception;
use Psr\Log\LoggerInterface;

class Logger
{
    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $handler;

    public function __construct(LoggerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * log error message from exception
     * @param Exception $exception
     */
    public function errorFromException(Exception $exception): void
    {
        $this->error($exception->toString());
    }

    /**
     * log error message
     * @param string $message
     * @param array $context
     */
    public function error(string $message, array $context = []): void
    {
        $this->handler->error($message, $context);
    }
}
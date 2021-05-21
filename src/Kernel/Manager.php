<?php declare(strict_types=1);


namespace BytedanceMiniApp\Kernel;


use BytedanceMiniApp\Kernel\Exceptions\Exception;
use BytedanceMiniApp\Kernel\Http\HttpClient;
use BytedanceMiniApp\Kernel\Http\OpenApiInterface;

abstract class Manager
{
    protected Kernel $kernel;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    public static function createFromKernel(Kernel $kernel)
    {
        return new static($kernel);
    }

    /**
     * @return array
     */
    abstract public function getClassMap(): array;

    public function __call($name, $arguments)
    {
        $classMap = $this->getClassMap();
        $handler  = new $classMap[$name](
            $this->kernel->getClient(),
            $this->kernel->getConfig(),
            $this->kernel
        );

        try {
            if ($handler instanceof OpenApiInterface) {
                return $handler->handle($arguments);
            } elseif ($handler instanceof HandlerInterface) {
                return $handler->handle($arguments);
            }
        }catch (Exception $exception) {
            $this->kernel->log($exception);
            throw $exception;
        }
    }
}
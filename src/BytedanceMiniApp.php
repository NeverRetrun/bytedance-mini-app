<?php declare(strict_types=1);


namespace BytedanceMiniApp;


use BytedanceMiniApp\Kernel\Config;
use BytedanceMiniApp\Kernel\Exceptions\InvalidClassException;
use BytedanceMiniApp\Kernel\Http\HttpClient;
use BytedanceMiniApp\Kernel\Kernel;
use BytedanceMiniApp\Kernel\Manager;
use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * @property-read \BytedanceMiniApp\Handlers\Login\Manager $login
 * @property-read \BytedanceMiniApp\Utils\Encrypt\Manager $encrypt
 * @package BytedanceMiniApp
 */
class BytedanceMiniApp
{
    protected array $classMap = [
        'login' => \BytedanceMiniApp\Handlers\Login\Manager::class,
        'encrypt' => \BytedanceMiniApp\Utils\Encrypt\Manager::class,
    ];

    protected array $objectPool = [];

    protected Kernel $kernel;

    public function __construct(
        string $appId,
        string $secret,
        ?LoggerInterface $logger = null,
        ?CacheInterface $cache = null,
        bool $isDebug = false
    )
    {
        $this->kernel = (new Kernel(
            new HttpClient(),
            new Config($appId, $secret)
        ))
            ->withLoggerFormLoggerInterface($logger)
            ->withCache($cache);

        if ($isDebug) {
            $this->kernel->enableDebug();
        }
    }

    protected function getInstance(string $name): Manager
    {
        if (!isset($this->classMap[$name])) {
            throw new InvalidClassException('BytedanceMiniApp exception: not found class');
        }

        return $this->classMap[$name]::createFromKernel($this->kernel);
    }

    public function __get($name)
    {
        return $this->objectPool[$name] ??= $this->getInstance($name);
    }
}
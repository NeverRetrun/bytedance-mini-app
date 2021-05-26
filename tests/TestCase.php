<?php declare(strict_types=1);


namespace Tests;


use BytedanceMiniApp\BytedanceMiniApp;
use BytedanceMiniApp\Kernel\Http\HttpClient;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function mockApp(?HttpClient $http): BytedanceMiniApp
    {
        $env = $this->getEnv() ?? $_ENV;
        return new BytedanceMiniApp(
            $env['appId'],
            $env['secret'],
            $env['slot'],
            $env['token'],
            null,
            null,
            false,
            $http
        );
    }

    public function getEnv(): ?array
    {
        $envPath = dirname(__DIR__) . '/.env';
        if (file_exists($envPath)) {
            return parse_ini_file($envPath);
        }

        return null;
    }
}
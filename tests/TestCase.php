<?php declare(strict_types=1);


namespace Tests;


use BytedanceMiniApp\BytedanceMiniApp;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected \BytedanceMiniApp\BytedanceMiniApp $app;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mockApp();
    }

    public function mockApp()
    {
        $env = $this->getEnv() ?? $_ENV;
        $this->app = new BytedanceMiniApp(
            $env['appId'],
            $env['secret'],
            $env['slot'],
            $env['token'],
        );
    }

    public function getEnv():?array
    {
        $envPath = dirname(__DIR__).'/.env';
        if (file_exists($envPath)) {
            return parse_ini_file($envPath);
        }

        return null;
    }
}
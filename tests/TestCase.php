<?php declare(strict_types=1);


namespace Tests;


use BytedanceMiniApp\BytedanceMiniApp;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected \BytedanceMiniApp\BytedanceMiniApp $app;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->app = new BytedanceMiniApp($_ENV['appId'], $_ENV['secret']);
    }
}
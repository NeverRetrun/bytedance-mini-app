<?php declare(strict_types=1);


namespace BytedanceMiniApp\Kernel\Http;


use BytedanceMiniApp\Kernel\HandlerInterface;

interface OpenApiInterface extends HandlerInterface
{
    /**
     * @param $arguments
     * @return Response
     */
    public function handle($arguments): Response;

    public static function format(array $response): Response;
}
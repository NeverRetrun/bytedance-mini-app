<?php


namespace BytedanceMiniApp\Kernel;


interface HandlerInterface
{
    /**
     * @return mixed
     */
    public function handle(...$arguments);
}
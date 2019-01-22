<?php


namespace SeeNotEvil\Console\Core ;

use SeeNotEvil\Console\Core\Out\Out;

/**
 * Class KernelFactory
 * @package SeeNotEvil\Console\Core
 */
class KernelFactory {


    public static function factory(array $config = []) : Kernel
    {
        $argumentParser = new ArgumentParser() ;
        $router = new Route($argumentParser) ;
        $out = new Out() ;

        return new Kernel($router, $out, $config) ;
    }
}
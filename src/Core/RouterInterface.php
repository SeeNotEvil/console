<?php

namespace SeeNotEvil\Console\Core ;

/**
 * Осуществляет поиск маршрута
 * Interface RouterInterface
 * @package SeeNotEvil\Console\Core
 */
interface RouterInterface {

    const DEFAULT_PATH = "SeeNotEvil\\Console\\Command" ;
    const DEFAULT_METHOD = "execute" ;

    /**
     * Возвращает маршрут состоящий из имени кдасса метода и аргументов для передачи в метод
     * @param array $argv
     * @throws \Exception
     * @return RouteMap
     */
    public function mapping(array $argv) : RouteMap ;


}
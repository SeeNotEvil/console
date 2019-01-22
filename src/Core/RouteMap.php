<?php

namespace SeeNotEvil\Console\Core ;

/**
 * Результат (карта) роутинга
 *
 * Class RouteMap
 * @package SeeNotEvil\Console\Core
 */
class RouteMap {

    private $className  ;
    private $methodName  ;
    private $arguments = [];

    public function __construct(string $className, string $methodName)
    {
        $this->className = $className ;
        $this->methodName = $methodName ;
    }

    public function setClassName(string $className)
    {
        $this->className = $className ;
    }
    public function setMethodName(string $methoddName)
    {
        $this->methodName = $methoddName ;
    }
    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments ;
    }

    public function getClassName() : string
    {
        return $this->className  ;
    }
    public function getMethodName() : string
    {
        return $this->methodName  ;
    }
    public function getArguments() : array
    {
        return $this->arguments  ;
    }

}
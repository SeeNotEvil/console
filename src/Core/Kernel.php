<?php

namespace SeeNotEvil\Console\Core ;

/**
 * Class Kernel
 * @package SeeNotEvil\Console\Core
 */

class Kernel {

    private $config ;
    private $route ;
    private $out ;
    private $arguments = [] ;

    const STATUS_SUCCESS = 0 ;
    const STATUS_ERROR = 1 ;

    /**
     * Kernel constructor.
     * @param Route $route - роутинг который определяет какой класс и метод будут вызываться
     * @param Out $out - интерфейс для общения с консолью
     * @param array $config
     */
    public function __construct(RouterInterface $route, OutInterface $out, array $config)
    {
        $this->route = $route ;
        $this->out = $out ;
        $this->config = $config ;
    }

    /**
     * Основной метод выполняет команду
     * @param array $argv
     * @return int
     */
    public function execute(array $argv)
    {
        try {
            $this->runMethod($this->route->mapping($argv)) ;
            return self::STATUS_SUCCESS;
        } catch (\Exception $e) {
            $this->out->error($e->getMessage());
        } catch (\Throwable $e) {
            $this->out->error("Throwable : " . $e->getMessage());
        }

        return self::STATUS_ERROR;

    }

    /**
     * @param $className
     * @param $methodName
     * @param array $params
     * @throws \ReflectionException
     */
    private function runMethod(RouteMap $routeMap)
    {
        $reflection = new \ReflectionClass($routeMap->getClassName()) ;
        $method = $reflection->getMethod($routeMap->getMethodName()) ;

        $invokeArgs = [] ;
        $methodArgs = $method->getParameters() ;
        foreach ($methodArgs as $arg) {
            $pName = $arg->getName() ;
            if(isset($routeMap->getArguments()[$pName])) {
                $invokeArgs[] = $routeMap->getArguments()[$pName] ;
            }
        }

        $this->arguments = $invokeArgs ;
        $className = $routeMap->getClassName() ;
        $command = new $className($this) ;
        $method->invokeArgs($command, $this->arguments) ;
    }

    /**
     * Получаем конфиг консоли со списком команд
     * @return array
     */
    public function getConfig() : array
    {
        return $this->config ;
    }

    /**
     * Получает масси распарщенных аргементов
     * @return array
     */
    public function getArguments() : array
    {
        return $this->arguments ;
    }

    public function out() : OutInterface
    {
        return $this->out ;
    }

}
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
     * @param RouterInterface $route - роутинг который определяет какой класс и метод будут вызываться
     * @param OutInterface $out - интерфейс для общения с консолью
     * @param array $config
     */
    public function __construct(RouterInterface $route, OutInterface $out, array $config = [])
    {
        $this->route = $route ;
        $this->out = $out ;
        $this->config = $config ;
        $this->includeRouterFolder() ;
    }


    public function includeRouterFolder()
    {
        if(isset($this->config['routing_path'])) {
            foreach ((array)$this->config['routing_path'] as $filePath) {
                if(file_exists($filePath)) {
                    include $filePath ;
                }
            }
        }

        if(file_exists(__DIR__.'/../Routing.php')) {
            include __DIR__.'/../Routing.php' ;
        }

    }

    /**
     * Основной метод выполняет команду
     * @param array $arguments
     * @return int
     */
    public function execute(array $arguments = [])
    {
        global $argv ;

        $arguments = !empty($arguments) ? $arguments : $argv ;
        try {
            $this->runMethod($this->route->mapping($arguments)) ;
            return self::STATUS_SUCCESS;
        } catch (\Exception $e) {
            $this->out->error($e->getMessage());
        } catch (\Throwable $e) {
            $this->out->error("Throwable : " . $e->getMessage(). PHP_EOL.
                              "File : ". $e->getFile(). PHP_EOL
                              );
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
            } else {
                $invokeArgs[] = null ;
            }
        }

        $this->arguments = $invokeArgs ;
        $className = $routeMap->getClassName() ;
        $command = new $className($this) ;
        $method->invokeArgs($command, $this->arguments) ;
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

    public function getCommands() : array
    {
        return $this->route->getMaps() ;
    }

}
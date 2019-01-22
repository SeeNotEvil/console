<?php

namespace SeeNotEvil\Console\Core ;


/**
 * Class Route
 * @package SeeNotEvil\Console\Core
 */
class Route implements RouterInterface
{

    protected $maps = [] ;

    private $argumentParser;

    const PATTERN_VALID_COMMAND_NAME = "^[a-zA-Z0-9]+$" ;
    const PATTERN_VALID_METHOD_NAME = "^-[a-zA-Z0-9]+$" ;
    const PATTERN_VALID_PARAMS_NAME = "^--[a-zA-Z0-9]+$" ;

    const MINIMUM_ARGUMENTS = 2 ;

    public function __construct(ArgumentParserInterface $argumentParser)
    {
        $this->argumentParser = $argumentParser;
    }

    public function addRoute($commandName, $class)
    {
        $this->maps[$commandName] = $class ;
    }

    public function getRoutes() : array
    {
        return $this->maps ;
    }

    /**
     * Возвращает массив содержащий имя комманды, метод и параметры получанные из консоли
     * @param array $argv
     * @throws \Exception
     * @return array
     */
    public function mapping(array $argv): RouteMap
    {
        if (count($argv) < self::MINIMUM_ARGUMENTS) {
            throw new \Exception("Many arguments for routing");
        }

        $routerMap = new RouteMap("", self::DEFAULT_METHOD) ;

        if (!preg_match("/".self::PATTERN_VALID_COMMAND_NAME."/ui", $argv[1])) {
            throw new \Exception("Command name must be only numbers and letters ");
        }

        $className = $this->getClassPath($argv[1]) ;
        if(empty($className)) {
            throw new \Exception("Command class not exists");
        }
        $routerMap->setClassName($className) ;

        if(count($argv) == 2) {
            return $routerMap ;
        }

        if(preg_match("/".self::PATTERN_VALID_METHOD_NAME."/ui", $argv[2])) {
            $routerMap->setMethodName(substr($argv[2], 1, strlen($argv[2]))) ;
            $offsetParams = 3 ;
        } else {
            $offsetParams = 2;
        }

        $arguments = $this->argumentParser->parse(array_slice($argv, $offsetParams) ?? []);
        $routerMap->setArguments($arguments) ;

        return $routerMap ;

    }

    private function getClassPath(string $commandName)
    {
        return $this->maps[$commandName] ?? "";
    }



}
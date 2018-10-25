<?php

namespace SeeNotEvil\Console\Core ;

/**
 * Класс преобразует параметры из строки в массив аргементов для передачи внутрь команды
 * Реализует интерфейс ArgumentParserInterface
 * Class ArgumentParser
 * @package Console\Core
 */
class ArgumentParser implements ArgumentParserInterface {

    const PARAM_PREFIX = "--" ;

    /**
     * Метод преобразует парсит массив аргуементов из консоли и возвращает структурированный массив
     * Возвращает массив вида
     * [
     *    'Имя аргемента' => 'Значение'
     * ]
     *
     * @param array $array
     * @throws \Exception
     * @return array
     */
    public function parse(array $array) : array
    {
        $params = [] ;

        for($i = 0; $i < count($array); $i++) {
            if(!substr($array[$i], 0, strlen(self::PARAM_PREFIX)) == self::PARAM_PREFIX) {
                throw new \Exception("Error param syntax". $array[$i]) ;
            }

            $str = substr($array[$i], strlen(self::PARAM_PREFIX), strlen($array[$i])) ;
            list($key, $value) = explode("=", $str) ;

            if(empty($key) || empty($value)) {
                throw new \Exception("Error param syntax ". $array[$i]) ;
            }

            if(isset($params[$key])) {
                $params[$key] = array_merge((array)$params[$key], [$value]) ;
            } else {
                $params[$key] = $value ;
            }
        }
        return $params ;

    }

}
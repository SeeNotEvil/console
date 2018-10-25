<?php

namespace SeeNotEvil\Console\Core ;
/**
 * Интерфейс ArgumentParserInterface
 * Реализует парсинг аргументов переданных из консоли
 * Interface ArgumentParserInterface
 * @package SeeNotEvil\Console\Core
 */
interface ArgumentParserInterface {
    /**
     * @param array $array - массив аргументов
     * @return array - массив распаршенных аргументов
     */
    public function parse(array $array) : array ;

}
<?php

namespace SeeNotEvil\Console\Core ;

/**
 * Interface OutInterface
 * @package SeeNotEvil\Console\Core
 */
interface OutInterface {
    /**
     * Выводит строку
     * @param string $message
     */
    public function info(string $message, int $level = 0) ;

    /**
     * Выводит уведомление
     * @param string $message
     */
    public function notice(string $message) ;

    /**
     * Выводит предупреждение
     * @param string $message
     */
    public function warning(string $message) ;
    /**
     * Вывод ошибкки
     * @param string $message
     */
    public function error(string $message) ;

    /**
     * Выводим вопрос и принимаем ответ
     * @param string $message
     * @return string
     */
    public function question(string $message) : string ;

    public function questionVariants(string $message, array $variants, $default = null) : string ;

}
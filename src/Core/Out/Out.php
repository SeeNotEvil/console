<?php


namespace SeeNotEvil\Console\Core\Out ;

use SeeNotEvil\Console\Core\OutInterface;

/**
 * Класс предоставляющий работу с консолью
 * Class Out
 * @package SeeNotEvil\Console\Core
 */
class Out implements OutInterface
{
    /**
     * Типы сообщений
     */
    const ERROR_PREFIX = "ERROR" ;
    const NOTICE_PREFIX = "NOTICE" ;
    const WARNING_PREFIX = "WARNING" ;


    private function parseStr(string $str)
    {
        return preg_replace_callback("/<([a-zA-Z;:\s-]+)>(.*?)<\/([a-zA-Z;:\s-]+)>/ui", function($matches){
            return TagFactory::createOpenTag($matches[1]).$matches[2].TagFactory::createCloseTag() ;
        }, $str) ;

    }


    private function getMessage(string $message)
    {
        return $this->parseStr($message).PHP_EOL ;
    }


    /**
     * Выводит строку
     * @param string $message
     * @param int $level
     */
    public function info(string $message, int $level = 0)
    {
        echo str_repeat(" ", $level).$this->getMessage($message) ;
    }

    /**
     * Выводит уведомление
     * @param string $message
     */
    public function notice(string $message)
    {
        echo self::NOTICE_PREFIX . " ".$this->getMessage($message);
    }

    /**
     * Выводит предупреждение
     * @param string $message
     */
    public function warning(string $message)
    {
        echo self::WARNING_PREFIX . " ".$this->getMessage($message);
    }

    /**
     * Вывод ошибкки
     * @param string $message
     */
    public function error(string $message)
    {
        echo self::ERROR_PREFIX . " ".$this->getMessage($message);
    }

    /**
     * Выводим вопрос и принимаем ответ
     * @param string $message
     * @return string
     */
    public function question(string $message): string
    {
        $this->info($message) ;
        return fgets(STDIN);
    }


    public function questionVariants(string $message, array $variants, $default = null) : string
    {
        $this->info($message) ;
        while (true) {
            $answer = fgets(STDIN);
            if(in_array($answer, $variants)) {
                return $answer ;
            } else if($default) {
                return $default ;
            }
        }
    }

    public function infoArray(array $array, int $level)
    {
        foreach ($array as $key => $value) {
            if(is_array($value)) {
                $this->infoArray($value, $level++) ;
                continue ;
            }

            if(is_string($value)) {
                $this->infoOffset($value, $level) ;
            }

        }
    }
}
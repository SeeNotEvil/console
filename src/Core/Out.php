<?php


namespace SeeNotEvil\Console\Core ;

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


    private function getMessage(string $message)
    {
        return $message.PHP_EOL ;
    }

    /**
     * Выводит строку с отступом
     * @param string $message
     * @param int $level
     */
    public function infoOffset(string $message, int $level = 0)
    {
        $this->info(str_repeat(" ", $level). $message) ;
    }

    /**
     * Выводит строку
     * @param string $message
     */
    public function info(string $message)
    {
        echo $this->getMessage($message) ;
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
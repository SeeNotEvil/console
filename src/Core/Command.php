<?php

namespace SeeNotEvil\Console\Core ;

/**
 * Класс команды
 * Команда содержит логику выполнения
 * Class Command
 * @package SeeNotEvil\Console\Core
 */
abstract class Command {

    private $kernel ;

    /**
     * Command constructor.
     * @param Kernel $kernel
     */
    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel ;
    }

    /**
     * Получает приложение
     * @return Kernel
     */
    public function kernel() : Kernel
    {
        return $this->kernel ;
    }

    /**
     * Получает интерфейс для работы с консолью
     * @return OutInterface
     */
    public function out() : OutInterface
    {
        return $this->kernel->out() ;
    }

    /**
     * Метод вызваемый по умолчанию
     */


}
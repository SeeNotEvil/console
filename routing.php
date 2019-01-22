<?php


/**
 * @var \SeeNotEvil\Console\Core\Kernel $this
 */

$this->route->addRoute("test",\SeeNotEvil\Console\Command\Test::class) ;
$this->route->addRoute("help",\SeeNotEvil\Console\Command\Help::class) ;
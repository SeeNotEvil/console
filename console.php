<?php

include_once 'vendor/autoload.php' ;

$config = include 'config.php';
\SeeNotEvil\Console\Core\KernelFactory::factory($config)->execute($argv) ;


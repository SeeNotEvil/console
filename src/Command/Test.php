<?php

namespace SeeNotEvil\Console\Command ;

use SeeNotEvil\Console\Core\Command;
use SeeNotEvil\Console\Core\InputInterface;

class Test extends Command {

    protected static $description = "Test command" ;

    public function execute($a = 3)
    {
        $this->out()->info("Execute test: <color:blue;background-color:white>" .$a."</color>") ;
    }



}
<?php

namespace SeeNotEvil\Console\Command ;

use SeeNotEvil\Console\Core\Command;

class Test extends Command {

    public function help($a = 3)
    {
        $this->out()->info("This test help") ;
    }

    public function execute($a = 3)
    {
        $this->out()->info("Execute test") ;
    }

}
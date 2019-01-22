<?php

namespace SeeNotEvil\Console\Command ;

use SeeNotEvil\Console\Core\Command;

class Test extends Command {

    public function help()
    {
        $this->out()->info("This test help") ;
    }

    public function execute($a = 3)
    {
        $i = 5;

        echo --$i + $i++;

        //$this->out()->info("Execute test") ;
    }

}
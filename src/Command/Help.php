<?php

namespace SeeNotEvil\Console\Command ;

use SeeNotEvil\Console\Core\Command;


class Help extends Command {

    public function execute()
    {
        foreach ($this->kernel()->getCommands() as $commandName => $class) {
            echo $commandName ;
//            $this->out()->infoOffset($commandName, 0) ;
//            if(is_array($commandValue)) {
//                $this->out()->infoOffset($commandValue['description'], 2) ;
//            }
        }

    }

}

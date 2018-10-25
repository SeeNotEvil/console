<?php

namespace SeeNotEvil\Console\Command ;

use SeeNotEvil\Console\Core\Command;


class Help extends Command {

    public function execute($a = 6)
    {
        foreach ($this->kernel()->getConfig()['commands'] as $commandName => $commandValue) {

            $this->out()->infoOffset($commandName, 0) ;
            if(is_array($commandValue)) {
                $this->out()->infoOffset($commandValue['description'], 2) ;
            }
        }

    }

}

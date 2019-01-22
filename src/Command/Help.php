<?php

namespace SeeNotEvil\Console\Command ;

use SeeNotEvil\Console\Core\Command;


class Help extends Command {

    public function execute()
    {
        foreach ($this->kernel()->getCommands() as $commandName => $class) {
            if($commandName == "help") {
                continue ;
            }
            $this->out()->info('Command: '.$commandName) ;
            if(!$class instanceof Command) {
                continue ;
            }

            if(!empty($class::description())) {
                $this->out()->info('Description: '.$class::description(), 3);
            }
        }

    }

}

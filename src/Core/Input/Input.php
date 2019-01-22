<?php

namespace SeeNotEvil\Console\Core\Input ;

use SeeNotEvil\Console\Core\InputInterface;

class Input implements InputInterface {

    protected $args = [] ;

    public function __construct(array $args)
    {
        $this->args = $args ;
    }

    public function parse(string $str)
    {

    }

    public function input(string $name): string
    {

    }

    public function inputs(): array
    {
        // TODO: Implement inputs() method.
    }
}
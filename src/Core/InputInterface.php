<?php

namespace SeeNotEvil\Console\Core ;

interface InputInterface {

    public function input(string $name) : string  ;
    public function inputs() : array ;

}
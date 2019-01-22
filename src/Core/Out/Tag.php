<?php


namespace SeeNotEvil\Console\Core\Out ;

abstract class Tag {

    abstract public function toLine() : string ;

    public function __toString()
    {
        return $this->toLine() ;
    }

}
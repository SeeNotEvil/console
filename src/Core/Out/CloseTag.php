<?php

namespace SeeNotEvil\Console\Core\Out ;


class CloseTag extends Tag {

    public function toLine(): string
    {
        return "\e[0m" ;
    }
}
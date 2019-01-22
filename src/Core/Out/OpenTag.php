<?php

namespace SeeNotEvil\Console\Core\Out ;

class OpenTag extends Tag {

    private $styles = [] ;

    public function addStyle($style)
    {
        $this->styles[] = $style;
    }

    public function toLine(): string
    {
        return "\033[". implode(";", array_filter($this->styles))."m" ;
    }
}
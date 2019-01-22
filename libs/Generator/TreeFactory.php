<?php

namespace libs\Generator ;


abstract class TreeFactory {

    const TYPE_ARRAY  = 0 ;

    const DEFAULT_WIDTH = 5;
    const DEFAULT_HEIGHT = 5 ;

    protected $height = self::DEFAULT_HEIGHT ;
    protected $type = self::TYPE_ARRAY ;

    const KET_VALUE = "value" ;
    const KEY_CHILDREN = "children" ;

    public function setHeight(int $height) : self
    {
        $this->height = $height ;
        return $this ;
    }


    public function setType(int $type) : self
    {
        $this->type = $type ;
        return $this ;
    }


    protected function getGenerator($generator)
    {
        if($generator == null) {
            return function () {
                return rand(0, 1000)  ;
            } ;
        }
        if(is_callable($generator) ) {
            return $generator ;
        }

        return null ;
    }




}

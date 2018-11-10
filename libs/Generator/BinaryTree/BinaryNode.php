<?php


namespace libs\Generator\BinaryTree ;

class BinaryNode {

    public $value ;
    public $leftChild = null;
    public $rightChild = null;

    public function __construct($value)
    {


        $this->value = $value ;
    }


}
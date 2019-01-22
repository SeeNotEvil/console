<?php

namespace libs\Generator\BinaryTree ;

class BinaryTree {


    protected $root = null ;

    public function addValue($value)
    {
        $node = new BinaryNode($value) ;
        $this->insetNode($node, $this->root) ;

    }

    protected function insetNode($node, &$parentNode)
    {
        if ($parentNode === null) {
            $parentNode = $node;
        } else {
            if ($node->value > $parentNode->value) {
                $this->insetNode($node,$parentNode->rightChild ) ;
            } else if($node->value < $parentNode->value) {
                $this->insetNode($node,$parentNode->leftChild ) ;
            }
        }
    }

    protected function deleteNode($value)
    {
        $node = $this->root ;
        $parent = null ;

        while ($node) {
            if($node->value == $value) {
                break ;
            }

            if($value > $node->value) {
                $node = $node->rightChild ;
            }

            if($value > $node->value) {
                $node = $node->leftChild ;
            }
        }


    }

    public function search($value)
    {

        $node = $this->root ;

        while ($node) {
            if($node->value == $value) {
                break ;
            }

            if($value > $node->value) {
                $node = $node->rightChild ;
            }

            if($value > $node->value) {
                $node = $node->leftChild ;
            }
        }
        return $node ;

    }
}

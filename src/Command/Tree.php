<?php


namespace SeeNotEvil\Console\Command ;

use libs\Generator\BinaryTree\BinaryTree;
use libs\Profiler\Profiler;
use SeeNotEvil\Console\Core\Command;

class Tree extends Command {

    public function execute()
    {

//        $function = function () {
//            $tree = (new \libs\Generator\TreeArray())->setHeight(2)->generate(function(){
//                return rand(100, 2999) ;
//            }) ;
//            print_r($tree) ;
//        } ;

        $function = function () {
            $binaryTree = new BinaryTree() ;
            $binaryTree->addValue(10) ;
            $binaryTree->addValue(20) ;
            $binaryTree->addValue(40) ;
            $binaryTree->addValue(5) ;
            if($binaryTree->search(23)) {
                echo 'yes' ;
            } else {
                echo 'no' ;
            }
        } ;

        Profiler::profile($function) ;

    }

}
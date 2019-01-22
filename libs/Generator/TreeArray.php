<?php


namespace libs\Generator ;

class TreeArray extends TreeFactory {

    /**
     * @param null $generator
     * @return array
     */
    public function generate($generator = null) : array
    {
        $generator = $this->getGenerator($generator) ;
        if($generator == null) {
            throw new \InvalidArgumentException() ;
        }

        $tree = [] ;

        $currentHeight = 0 ;
        $tree[0] = $this->getNode($generator, $currentHeight) ;

        $this->generateRecursion($currentHeight, $tree[0][self::KEY_CHILDREN], $generator) ;
        return $tree ;

    }

    protected function getNode(callable $generator, int $height)
    {
        return [
            self::KET_VALUE => call_user_func($generator, $height),
            self::KEY_CHILDREN => []
        ] ;
    }



    private function generateRecursion(int $height, &$node, callable $generator)
    {
        $cntNode = rand(0, 10) ;

        for($i = 0; $i < $cntNode; $i++) {
            $node[] = $childrenNode = $this->getNode($generator, $height) ;
            if($height < $this->height) {
                $this->generateRecursion(++$height, $childrenNode[self::KEY_CHILDREN], $generator);
            }
        }

    }

}
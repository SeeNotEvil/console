<?php


namespace SeeNotEvil\Console\Core\Out ;


class TagFactory {

    const STYLE_COLOR = "color" ;
    const STYLE_BACKGROUND_COLOR = "background-color" ;

    public static function createOpenTag(string $str) : Tag
    {

        $tag = new OpenTag() ;

        $operands = explode(';', $str) ;
        $params = [] ;
        foreach($operands as $operand) {
            if(strpos($operand, ":") === false)
                continue ;

            [$key, $value] = explode(":", $operand) ;
            $params[$key] = $value ;
        }

        foreach ($params as $paramName => $param) {
            switch ($paramName) {
                case self::STYLE_COLOR :
                    $tag->addStyle(ColorManager::createForeground($param)) ;
                    break ;
                case self::STYLE_BACKGROUND_COLOR :
                    $tag->addStyle(ColorManager::createBackground($param)) ;
                    break ;

            }
        }
        return $tag ;
    }

    public static function createCloseTag() : Tag
    {
        return new CloseTag() ;
    }

}
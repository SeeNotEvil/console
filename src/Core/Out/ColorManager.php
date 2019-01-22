<?php


namespace SeeNotEvil\Console\Core\Out ;


class ColorManager {

    const COLOR_BOLD = "bold" ;
    const COLOR_DIM = "bold" ;
    const COLOR_DARK_GREY = "bold" ;
    const COLOR_BLUE = "bold" ;


    private static $foreground = [
        'bold'         => '1',
        'dim'          => '2',
        'black'        => '0;30',
        'dark_gray'    => '1;30',
        'blue'         => '0;34',
        'light_blue'   => '1;34',
        'green'        => '0;32',
        'light_green'  => '1;32',
        'cyan'         => '0;36',
        'light_cyan'   => '1;36',
        'red'          => '0;31',
        'light_red'    => '1;31',
        'purple'       => '0;35',
        'light_purple' => '1;35',
        'brown'        => '0;33',
        'yellow'       => '1;33',
        'light_gray'   => '0;37',
        'white'        => '1;37',
        'normal'       => '0;39',
    ];

    private static $background = [
        'black'        => '40',
        'red'          => '41',
        'green'        => '42',
        'yellow'       => '43',
        'blue'         => '44',
        'magenta'      => '45',
        'cyan'         => '46',
        'light_gray'   => '47',
    ];

    public static function createForeground(string $colorName) : string
    {
        return isset(self::$foreground[$colorName]) ?  self::$foreground[$colorName] : "" ;
    }

    public static function createBackground(string $colorName) : string
    {
        return isset(self::$background[$colorName]) ?  self::$background[$colorName] : "" ;
    }


}
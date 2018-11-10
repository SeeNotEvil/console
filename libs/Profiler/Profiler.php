<?php


namespace libs\Profiler ;

class Profiler {



    public static function profile(callable $method) : Result
    {
        $result = new Result() ;
        $time = microtime(true) ;
        $memory = memory_get_usage() ;

        call_user_func($method) ;

        $result->setTime(microtime(true) - $time) ;
        $result->setMemoryPeak(memory_get_peak_usage(true) ) ;
        $result->setMemoryUsage(memory_get_usage() - $memory) ;
        return $result ;
    }

}
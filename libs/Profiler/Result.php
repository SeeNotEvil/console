<?php

namespace libs\Profiler ;

class Result {

    private $time ;
    private $memoryUsage ;
    private $memoryPeak ;

    public function setTime(float $time)
    {
        $this->time = $time ;
    }
    public function getTime() : float
    {
        return $this->time ;
    }

    public function setMemoryUsage(float $time)
    {
        $this->memoryUsage = $time ;
    }
    public function getMemoryUsage() : float
    {
        return $this->memoryUsage ;
    }


    public function setMemoryPeak(float $time)
    {
        $this->memoryPeak = $time ;
    }
    public function getMemoryPeak() : float
    {
        return $this->memoryPeak ;
    }

}
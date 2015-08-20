<?php

namespace Timer;

/**
 * Class Timer
 */
class Timer
{
    private $startTime;
    private $stopTime;

    public function __construct()
    {
        date_default_timezone_set('UTC');
    }

    /**
     * @note start timer buy setting current time
     */
    public function start()
    {
        $this->startTime = microtime(true);
    }

    /**
     * @note stop timer by setting stop time
     */
    public function stop()
    {
        if(!isset($this->startTime)){
            return false;
        }
        $this->stopTime = microtime(true);
    }

    /**
     * @return bool|mixed
     */
    public function getTotalExecutionTime()
    {
        if(empty($this->stopTime)){
            return false;
        }
        return $this->getExecutionTime($this->stopTime);
    }

    /**
     * @return mixed
     */
    public function getElapsedTime()
    {
        return $this->getExecutionTime(microtime(true));
    }

    /**
     * @param $time
     * @return mixed
     */
    private function getExecutionTime($time)
    {
        if(empty($this->startTime)){
            return false;
        }
        return $time - $this->startTime;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @return mixed
     */
    public function getStopTime()
    {
        return $this->stopTime;
    }

    /**
     * @return bool
     * @note has the timer been stopped
     */
    public function isComplete()
    {
        return !empty($this->stopTime) && !empty($this->startTime);
    }
}

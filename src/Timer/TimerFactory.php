<?php

namespace Timer;

/**
 * Class TimerFactory
 */
class TimerFactory
{
    /**
     * @param $name
     * @return Timer
     */
    public function create($name)
    {
        return new Timer($name);
    }
}

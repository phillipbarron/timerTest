<?php

namespace Timer;

/**
 * Class TimerFactory
 */
class TimerFactory
{
    /**
     * @return Timer
     */
    public function create()
    {
        return new Timer();
    }
}

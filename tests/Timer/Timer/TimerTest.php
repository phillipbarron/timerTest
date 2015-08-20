<?php

use Timer\Timer;

class TimerTest extends PHPUnit_Framework_TestCase
{
    public function testIsCompleteRespondsWithAppropriateBoolean()
    {
        $timer = new Timer();
        $this->assertFalse($timer->isComplete());
        $timer->start();
        $this->assertFalse($timer->isComplete());
        $timer->stop();
        $this->assertTrue($timer->isComplete());
    }

    public function testStopReturnsFaleWhereTimerNotStarted()
    {
        $timer = new Timer();
        $this->assertFalse($timer->stop());
        $timer->start();
        $timer->stop();
        $this->assertTrue($timer->stop() !== false);
    }

    public function testGetStopTimeGetsStopTime()
    {
        $timer = new Timer();
        $this->assertTrue($timer->getStopTime() == null);
        $timer->start();
        $timer->stop();
        $this->assertTrue($timer->getStopTime() !== null);
    }
    public function testGetStartTimeGetsStopTime()
    {
        $timer = new Timer();
        $this->assertTrue($timer->getStartTime() == null);
        $timer->start();
        $this->assertTrue($timer->getStartTime() !== null);
    }
    public function testGetTotalExecutionTimeGetsTotalExecutionTime()
    {
        $timer = new Timer();
        $this->assertFalse($timer->getTotalExecutionTime());
        $timer->start();
        $timer->stop();
        $this->assertTrue($timer->getTotalExecutionTime() !== false);
    }
    public function testGetElapsedTimeGetsElapsedTime()
    {
        $timer = new Timer();
        $this->assertFalse($timer->getElapsedTime());
        $timer->start();
        $this->assertTrue($timer->getElapsedTime() !== false);
    }
}

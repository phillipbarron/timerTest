<?php

use Timer\ExecutionTimer;
use Timer\TimerFactory;

class ExecutionTimerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Timer\TimerNameDoesNotExistException
     */
    public function testThrowsExceptionForUnknownTimerName()
    {
        $timerFactory = new TimerFactory();
        $executionTime = new ExecutionTimer($timerFactory);
        $executionTime->getTotalExecutionTime('invalidName');
    }
    /**
     * @expectedException \Timer\DuplicateTimerNameException
     */
    public function testThrowsExceptionForDuplicateTimerName()
    {
        $timerFactory = new TimerFactory();
        $executionTime = new ExecutionTimer($timerFactory);
        $executionTime->addTimer('timer');
        $executionTime->addTimer('timer');
    }

    public function testStartTimerStartsTimer()
    {
        $timerFactory = new TimerFactory();
        $executionTime = new ExecutionTimer($timerFactory);
        $executionTime->addTimer('timer');
        $this->assertTrue($executionTime->startTimer('timer') !== false);
    }
    public function testStopTimerStopsTimer()
    {
        $timerFactory = new TimerFactory();
        $executionTime = new ExecutionTimer($timerFactory);
        $executionTime->addTimer('timer');
        $this->assertTrue($executionTime->stopTimer('timer') !== false);
    }
    /**
     * @expectedException \Timer\TimerNameDoesNotExistException
     */
    public function testStartTimerThrowsExceptionForUnknownTimerName()
    {
        $timerFactory = new TimerFactory();
        $executionTime = new ExecutionTimer($timerFactory);
        $executionTime->startTimer('timer');
    }
    /**
     * @expectedException \Timer\TimerNameDoesNotExistException
     */
    public function testStopTimerThrowsExceptionForUnknownTimerName()
    {
        $timerFactory = new TimerFactory();
        $executionTime = new ExecutionTimer($timerFactory);
        $executionTime->stopTimer('timer');
    }
    /**
     * @expectedException \Timer\TimerNameDoesNotExistException
     */
    public function testGetTotalExecutionTimeThrowsExceptionForUnknownTimer()
    {
        $timerFactory = new TimerFactory();
        $executionTime = new ExecutionTimer($timerFactory);
        $executionTime->getTotalExecutionTime('timer');
    }

    public function testGetTotalExecutionTimeGetsTotal()
    {
        $timerFactory = new TimerFactory();
        $executionTime = new ExecutionTimer($timerFactory);
        $executionTime->addTimer('timer');
        $executionTime->startTimer('timer');
        $executionTime->stopTimer('timer');
        $this->assertGreaterThan(0, $executionTime->getTotalExecutionTime());
        $this->assertGreaterThan(0, $executionTime->getTotalExecutionTime('timer'));
    }
}

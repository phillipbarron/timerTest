<?php

use Timer\Timer;
use Timer\TimerFactory;

class TimerFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testReturnsCorrectType()
    {
        $timerFactory = new TimerFactory();
        $this->assertTrue($timerFactory->create('name') instanceof Timer);
    }
}

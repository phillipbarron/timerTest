<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Timer\TimerFactory;
use Timer\ExecutionTimer;

$factory = new TimerFactory();
$executionTimer = new ExecutionTimer($factory);

$executionTimer->addTimer('script1');
$executionTimer->startTimer('script1');
sleep(1);
$executionTimer->stopTimer('script1');

echo 'Execution time for script1: ' . $executionTimer->getTotalExecutionTime('script1') . PHP_EOL;

$executionTimer->addTimer('script2');
$executionTimer->startTimer('script2');
sleep(3);
$executionTimer->stopTimer('script2');

echo 'Execution time for all: ' . $executionTimer->getTotalExecutionTime() . PHP_EOL;

echo 'Execution time for script1: ' . $executionTimer->getTotalExecutionTime('script1') . PHP_EOL;
echo 'Execution time for script2: ' . $executionTimer->getTotalExecutionTime('script2') . PHP_EOL;

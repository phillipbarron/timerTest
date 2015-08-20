Script timer composer package

usage

```php
        
        $timerFactory = new TimerFactory();
        $executionTimer = new ExecutionTimer($timerFactory);

        $executionTimer->addTimer('bob');
        $executionTimer->startTimer('bob');

        $executionTimer->addTimer('alice');
        $executionTimer->startTimer('alice');

        $executionTimer->stopTimer('bob');
        $executionTimer->stopTimer('phill');
        
        $executionTimer->getTotalExecutionTime(),
        $executionTimer->getTotalExecutionTime('alice'),
        $executionTimer->getTotalExecutionTime('phill')

```

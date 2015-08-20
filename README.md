Script timer composer package
## Timer
Timer is a script timer which will allow the timing of multiple named scripts and retrieval of execution time for the total timers or named instance.
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

Development
-----------

Install dev dependancies:

```
composer install
```

Run tests from within the tests folder

```
vendor/bin/phpunit tests
```
 

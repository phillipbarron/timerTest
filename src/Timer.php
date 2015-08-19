<?php

/**
 * Class Timer
 */
class Timer {
    private $break;
    private $start_time;
    private $stop_time;
    private $name;

    public function __construct($name) {
        $this->name = $name;
        date_default_timezone_set('UTC');
    }

    // Set start time
    public function start() {
        $this->start_time = microtime(true);
    }

    // Set stop/end time
    public function stop() {
        $this->stop_time = microtime(true);
    }

    // Returns time elapsed from start
    public function getElapsedTime() {
        return $this->getExecutionTime(microtime(true));
    }

    // Returns total execution time
    public function getTotalExecutionTime() {
        if (!$this->stop_time) {
            return false;
        }
        return $this->getExecutionTime($this->stop_time);
    }

    // Returns start time, stop time and total execution time
    public function getFullStats() {
        if (!$this->stop_time) {
            return false;
        }

        $stats = array();
        $stats['start_time'] = $this->getDateTime($this->start_time);
        $stats['stop_time'] = $this->getDateTime($this->stop_time);
        $stats['total_execution_time'] = $this->getExecutionTime($this->stop_time);

        return $stats;
    }

    // Prints time elapsed from start
    public function printElapsedTime() {
        echo $this->break . $this->break;
        echo "Elapsed time: " . $this->getExecutionTime(microtime(true));
        echo $this->break . $this->break;
    }

    // Prints total execution time
    public function printTotalExecutionTime() {
        if (!$this->stop_time) {
            return false;
        }
        echo "Total execution time: " . $this->getExecutionTime($this->stop_time);
    }

    // Prints start time, stop time and total execution time
    public function printFullStats() {
        if (!$this->stop_time) {
            return false;
        }

        echo $this->break . $this->break;
        echo "Script start date and time: " . $this->getDateTime($this->start_time);
        echo $this->break;
        echo "Script stop end date and time: " . $this->getDateTime($this->stop_time);
        echo $this->break . $this->break;
        echo "Total execution time: " . $this->getExecutionTime($this->stop_time);
        echo $this->break . $this->break;
    }

    // Get execution time by timestamp
    private function getExecutionTime($time) {
        return $time - $this->start_time;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}

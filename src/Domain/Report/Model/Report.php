<?php

namespace App\Domain\Report\Model;

/**
 * Class Report
 */
class Report
{
    /**
     * @var int
     */
    private $idFloor;
    /**
     * @var int
     */
    private $currentFloor;
    /**
     * @var int
     */
    private $counter;
    /**
     * @var int
     */
    private $timeEnd;

    /**
     * Report constructor.
     * @param int $idFloor
     * @param int $currentFloor
     * @param int $counter
     * @param int $timeEnd
     */
    public function __construct(int $idFloor, int $currentFloor, int $counter, int $timeEnd)
    {
        $this->idFloor = $idFloor;
        $this->currentFloor = $currentFloor;
        $this->counter = $counter;
        $this->timeEnd = $timeEnd;
    }

    /**
     * @return int
     */
    public function getIdFloor(): int
    {
        return $this->idFloor;
    }

    /**
     * @param int $idFloor
     */
    public function setIdFloor(int $idFloor): void
    {
        $this->idFloor = $idFloor;
    }

    /**
     * @return int
     */
    public function getCurrentFloor(): int
    {
        return $this->currentFloor;
    }

    /**
     * @param int $currentFloor
     */
    public function setCurrentFloor(int $currentFloor): void
    {
        $this->currentFloor = $currentFloor;
    }

    /**
     * @return int
     */
    public function getCounter(): int
    {
        return $this->counter;
    }

    /**
     * @param int $counter
     */
    public function setCounter(int $counter): void
    {
        $this->counter = $counter;
    }

    /**
     * @return int
     */
    public function getTimeEnd(): int
    {
        return $this->timeEnd;
    }

    /**
     * @param int $timeEnd
     */
    public function setTimeEnd(int $timeEnd): void
    {
        $this->timeEnd = $timeEnd;
    }

}
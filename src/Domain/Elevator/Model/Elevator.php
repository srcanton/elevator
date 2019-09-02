<?php

namespace App\Domain\Elevator\Model;

use App\Domain\Floor\Model\Floor;
use App\Domain\Sequence\Model\Sequence;

/**
 * Class Elevator
 */
class Elevator
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Sequence
     */
    private $sequence;

    /**
     * @var Floor
     */
    private $currentFloor;

    /**
     * @var int
     */
    private $counter;

    public function __construct($id, Sequence $sequence)
    {
        $this->id = $id;
        $this->sequence = $sequence;
        $this->currentFloor = $sequence->getOriginFloor();
        $this->counter = 0;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Sequence
     */
    public function getSequence(): Sequence
    {
        return $this->sequence;
    }

    /**
     * @param Sequence $sequence
     */
    public function setSequence(Sequence $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return Floor
     */
    public function getCurrentFloor(): Floor
    {
        return $this->currentFloor;
    }

    /**
     * @param Floor $currentFloor
     */
    public function setCurrentFloor(Floor $currentFloor): void
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
     * @param int $val
     */
    public function addCounter(int $val): void
    {
        $this->counter += $val;
    }




}
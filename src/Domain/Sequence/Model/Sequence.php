<?php

namespace App\Domain\Sequence\Model;

use App\Domain\Floor\Model\Floor;

/**
 * Class Elevator
 */
class Sequence
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Floor
     */
    private $originFloor;

    /**
     * @var Floor
     */
    private $destinyFloor;

    /**
     * @var int
     */
    private $begin;

    /**
     * @var int
     */
    private $end;

    /**
     * @var int
     */
    private $interval;

    public function __construct($id, $originFloor, $destinyFloor, $begin, $end, $interval)
    {
        $this->id = $id;
        $this->originFloor = $originFloor;
        $this->destinyFloor = $destinyFloor;
        $this->begin = $begin;
        $this->end = $end;
        $this->interval = $interval;

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
     * @return Floor
     */
    public function getOriginFloor(): Floor
    {
        return $this->originFloor;
    }

    /**
     * @param Floor $originFloor
     */
    public function setOriginFloor(Floor $originFloor): void
    {
        $this->originFloor = $originFloor;
    }

    /**
     * @return Floor
     */
    public function getDestinyFloor(): Floor
    {
        return $this->destinyFloor;
    }

    /**
     * @param Floor $destinyFloor
     */
    public function setDestinyFloor(Floor $destinyFloor): void
    {
        $this->destinyFloor = $destinyFloor;
    }

    /**
     * @return int
     */
    public function getBegin(): int
    {
        return $this->begin;
    }

    /**
     * @param int $begin
     */
    public function setBegin(int $begin): void
    {
        $this->begin = $begin;
    }

    /**
     * @return int
     */
    public function getEnd(): int
    {
        return $this->end;
    }

    /**
     * @param int $end
     */
    public function setEnd(int $end): void
    {
        $this->end = $end;
    }

    /**
     * @return int
     */
    public function getInterval(): int
    {
        return $this->interval;
    }

    /**
     * @param int $interval
     */
    public function setInterval(int $interval): void
    {
        $this->interval = $interval;
    }



}
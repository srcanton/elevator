<?php

namespace App\Domain\Floor\Model;

/**
 * Class Floor
 */
class Floor
{
    /**
     * @var int
     */
    private $id;

    public function __construct($id)
    {
        $this->id = $id;

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

}
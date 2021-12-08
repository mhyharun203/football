<?php
declare(strict_types=1);

namespace App\Model\DTO;

class TableDataTransferObject
{


    private string $name;
    private int $position;
    private int $points;
    private int $wins;
    private int $loses;
    private int $draws;

    public function getLoses(): int
    {
        return $this->loses;
    }


    public function setLoses(int $loses): void
    {
        $this->loses = $loses;
    }


    public function getDraws(): int
    {
        return $this->draws;
    }


    public function setDraws(int $draws): void
    {
        $this->draws = $draws;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getPosition(): int
    {
        return $this->position;
    }


    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    public function getPoints(): int
    {
        return $this->points;
    }


    public function setPoints(int $points): void
    {
        $this->points = $points;
    }


    public function getWins(): int
    {
        return $this->wins;
    }


    public function setWins(int $wins): void
    {
        $this->wins = $wins;
    }

}
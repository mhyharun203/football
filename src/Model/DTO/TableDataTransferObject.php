<?php
declare(strict_types=1);

namespace App\Model\DTO;

class TableDataTransferObject
{


    private string $name;
    private int $position;

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


}
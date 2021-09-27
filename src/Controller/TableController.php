<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\DTO\TableDataTransferObject;
use App\Model\TableRepository;


class TableController
{
private TableRepository $tableRepository;
public function __construct(TableRepository $tableRepository){
    $this->tableRepository = $tableRepository;
}

    public function tableAction(): array
    {



        $rawTable = $this->tableRepository->readTable();
        return $this->getTableContent($rawTable);

        }




    /**
     * @param TableDataTransferObject [] $table
     * @return array
     */
    public function getTableContent(array $table)
    {


        foreach ($table as $team) {

            $teamName = $team->getName();
            $teamPosition = $team->getPosition();


            $teamFinalArray[] = ['name' => $teamName,
                'position' => $teamPosition,
            ];


        }
        return $teamFinalArray;
    }


}
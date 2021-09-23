<?php
declare(strict_types=1);

namespace App\Controller;

use App\Core\Api;
use App\Model\DTO\TableDataTransferObject;
use App\Model\Mapper\TableMapper;
use App\Model\TableRepository;
use App\Model\TeamRepository;


class TableController
{
private TableRepository $tableRepository;
public function __construct(TableRepository $tableRepository){
    $this->tableRepository = $tableRepository;
}

    public function tableAction()
    {



        $rawTable = $this->tableRepository->readTable();
        $table = $this->getTableContent($rawTable);
        foreach ($table as $endTable) {
            echo $endTable["position"];
            echo "  ";
            echo $endTable["name"];
            echo  "<br>";
        }


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
<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\DTO\TableDataTransferObject;
use App\Model\Mapper\TableMapper;

class TableRepository

{
    private TableMapper $tableMapper;

    public function __construct(TableMapper $tableMapper)
    {
        $this->tableMapper = $tableMapper;
    }

    public function saveTable($teamFinalArray)
    {

        $json = json_encode($teamFinalArray, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . '/../table.json', $json);
        return $teamFinalArray;
    }


    public function saveBlTable($teamFinalArray)
    {
        $json = json_encode($teamFinalArray, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . '/../blTable.json',$json);
        return $teamFinalArray;

    }


    /**
     * @return TableDataTransferObject []
     */

    public function readTable(): array
    {

        $table = file_get_contents(__DIR__ . '/../table.json', true);
        $finalTable = json_decode($table, true);
        return $this->tableMapper->mapToDTO($finalTable);
    }

    public function readBlTable(): array
    {

        $table = file_get_contents(__DIR__ . '/../blTable.json', true);
        $finalTable = json_decode($table, true);
        return $this->tableMapper->mapToDTO($finalTable);
    }



}



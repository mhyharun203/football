<?php
declare(strict_types=1);

namespace App\Model;

use App\Core\Api;
use App\Model\DTO\TableDataTransferObject;
use App\Model\Mapper\TableMapper;


set_include_path(__DIR__ . '/../../src');

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
        file_put_contents("football.json", $json);
        return $teamFinalArray;
    }

    /**
     * @return TableDataTransferObject []
     */

    public function readTable(): array
    {

        $table = file_get_contents('football.json', true);
        $finalTable = json_decode($table, true);
        return $this->tableMapper->mapToDTO($finalTable);
    }
}



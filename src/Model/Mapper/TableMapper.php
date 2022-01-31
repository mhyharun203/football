<?php
declare(strict_types=1);


namespace App\Model\Mapper;

use App\Model\Dto\TableDataTransferObject;

class TableMapper
{
    /**
     * @param array $column
     * @return TableDataTransferObject []
     */
    public function mapToDTO(array $table): array
    {


        foreach ($table as $tableData) {
            $tableDTO = new TableDataTransferObject();
            $tableDTO->setPoints($tableData['points']);
            $tableDTO->setName($tableData['team']);
            $tableDTO->setPosition($tableData['position']);
            $tableDTO->setWins($tableData['wins']);
            $tableDTO->setLoses($tableData['loses']);
            $tableDTO->setDraws($tableData['draws']);
            $arraytableDTO[] = $tableDTO;


        }
        return $arraytableDTO;
    }
}






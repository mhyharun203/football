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
        $arraytableDTO = [];

        foreach ($table as $column) {

            $tableDTO = new TableDataTransferObject();
            $tableDTO->setPoints($column['points']);
            $tableDTO->setName($column['team']);
            $tableDTO->setPosition($column['position']);
            $tableDTO->setWins($column['wins']);
            $tableDTO->setLoses($column['loses']);
            $tableDTO->setDraws($column['draws']);
            $arraytableDTO[] = $tableDTO;
        }
        return $arraytableDTO;
    }

}






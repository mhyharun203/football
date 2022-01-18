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

        foreach ($table['standings'][0]['table'] as $column) {


            $tableDTO = new TableDataTransferObject();
            $tableDTO->setPoints($column['points']);
            $tableDTO->setName($column['team']['name']);
            $tableDTO->setPosition($column['position']);
            $tableDTO->setWins($column['won']);
            $tableDTO->setLoses($column['lost']);
            $tableDTO->setDraws($column['draw']);
            $arraytableDTO[] = $tableDTO;
        }
        return $arraytableDTO;
    }

}






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

        foreach ($table['standings'][0]['table'] as $column ) {

            $tableDTO = new TableDataTransferObject();

            $tableDTO->setName($column['team']['name']);
            $tableDTO->setPosition($column['position']);
            $arraytableDTO[] = $tableDTO;
        }
        return $arraytableDTO;
    }

}






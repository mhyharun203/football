<?php
declare(strict_types=1);

namespace App\Model;

use App\Core\DependencyProvider;
use App\Model\DTO\TableDataTransferObject;
use App\Model\Mapper\TableMapper;

use PDO;
use App\Core\PdoConnect;


class TableRepository

{
    private TableMapper $tableMapper;


    public function __construct(TableMapper $tableMapper)
    {
        $this->tableMapper = $tableMapper;


    }


    /**
     * @return TableDataTransferObject []
     */

    public function readPlTable(): array
    {

        $queryStatement =   "Select * FROM teamsTable WHERE liga = 'PremiereLeague'";
        $pdo = new PdoConnect();
        $result = $pdo->fetchAll($queryStatement);


        return $this->tableMapper->mapToDTO($result);

    }

    public function readBlTable(): array
    {
        $queryStatement =   "Select * FROM teamsTable WHERE liga = 'bundesLiga'";
        $pdo = new PdoConnect();
        $result = $pdo->fetchAll($queryStatement);


        return $this->tableMapper->mapToDTO($result);
    }

}




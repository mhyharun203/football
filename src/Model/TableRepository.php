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

        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');
        $query = $pdo->prepare("Select * FROM teamsTable WHERE liga = 'PremiereLeague'");
        $query->execute();
        $result = $query->fetchAll();
        return $this->tableMapper->mapToDTO($result);

    }

    public function readBlTable(): array
    {
        $pdo = new PdoConnect();
        $result = $pdo->fetchAll();


        return $this->tableMapper->mapToDTO($result);
    }

}




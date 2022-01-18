<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\DTO\TableDataTransferObject;
use App\Model\Mapper\TableMapper;
use App\Table;
use PDO;


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

        $table = file_get_contents(__DIR__ . '/../PlTable.json', true);
        $finalTable = json_decode($table, true);
        return $this->tableMapper->mapToDTO($finalTable);
    }

    public function readBlTable(): array
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');

        $query = $pdo->prepare("Select * FROM plTeam");
        $query->execute();

        $result = $query->fetchAll();
        dump($result);

        return $this->tableMapper->mapToDTO($result);
    }


    public function savePLTable(array $teamFinalArray)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');
        $teams = ($teamFinalArray['standings'][0]['table']);


        foreach ($teams as $team) {

            $query1 = "INSERT INTO plTeam (position,Team,points,wins,draws,loses) VALUES (:position ,:name, :points, :won, :draw, :lost)";
            $stmt = $pdo->prepare($query1);
            $stmt->execute(
                [
                    'position' => $team['position'],
                    'name' => $team['team']['name'],
                    'points' => $team['points'],
                    'won' => $team['won'],
                    'draw' => $team['draw'],
                    'lost' => $team['lost']
                    ]
            );
        }


    }

    public function saveBlTable($teamFinalArray)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');
        $teams = ($teamFinalArray['standings'][0]['table']);


        foreach ($teams as $team) {

            $query1 = "INSERT INTO blTeam (position,Team,points,wins,draws,loses) VALUES (:position ,:name, :points, :won, :draw, :lost)";
            $stmt = $pdo->prepare($query1);
            $stmt->execute(
                [
                    'position' => $team['position'],
                    'name' => $team['team']['name'],
                    'points' => $team['points'],
                    'won' => $team['won'],
                    'draw' => $team['draw'],
                    'lost' => $team['lost']
                ]
            );
        }


    }

}




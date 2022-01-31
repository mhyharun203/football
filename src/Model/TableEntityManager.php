<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\DTO\TableDataTransferObject;
use App\Model\Mapper\TableMapper;
use App\Table;
use PDO;



class TableEntityManager {

    public function savePLTable(array $teamFinalArray)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');
        $teams = ($teamFinalArray['standings'][0]['table']);

        foreach ($teams as $team) {
            $exists = 'SELECT * from teamsTable WHERE team = :name';
            $stmt2 = $pdo->prepare($exists);
            $stmt2->execute(
                [
                    'name' => $team['team']['name'],
                ]
            );

            $teamDB = $stmt2->fetch();

            if ($teamDB === false) {
                $query1 = "INSERT INTO teamsTable (liga,position,Team,points,wins,draws,loses) VALUES (:liga,:position ,:name, :points, :won, :draw, :lost)";
                $stmt = $pdo->prepare($query1);
                $stmt->execute(
                    [

                        'liga' => 'premiereLeague',
                        'position' => $team['position'],
                        'name' => $team['team']['name'],
                        'points' => $team['points'],
                        'won' => $team['won'],
                        'draw' => $team['draw'],
                        'lost' => $team['lost']
                    ]
                );
            } else {
                $updt = "UPDATE teamsTable SET points = :points WHERE Team = :name";
                $updtstmt = $pdo->prepare($updt);
                $updtstmt->execute(
                    [
                        'points' => $team['points'],
                        'name' => $team['team']['name']
                    ]


                );

            }
        }
    }

    public function saveBlTable($teamFinalArray)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');

        $teams = ($teamFinalArray['standings'][0]['table']);


        foreach ($teams as $team) {
            $exists = 'SELECT * from teamsTable WHERE team = :name';
            $stmt2 = $pdo->prepare($exists);
            $stmt2->execute(
                [
                    'name' => $team['team']['name'],
                ]
            );
            $teamDB = $stmt2->fetch();

            if ($teamDB === false) {


                $query1 = "INSERT INTO teamsTable (liga,position,Team,points,wins,draws,loses) VALUES (:liga, :position ,:name, :points, :won, :draw, :lost)";
                $stmt = $pdo->prepare($query1);
                $stmt->execute(
                    [
                        'liga' => 'bundesliga',
                        'position' => $team['position'],
                        'name' => $team['team']['name'],
                        'points' => $team['points'],
                        'won' => $team['won'],
                        'draw' => $team['draw'],
                        'lost' => $team['lost']
                    ]
                );
            } else {
                $updt = "UPDATE teamsTable SET points = :points WHERE Team = :name";
                $updtstmt = $pdo->prepare($updt);
                $updtstmt->execute(
                    [
                        'points' => $team['points'],
                        'name' => $team['team']['name']
                    ]


                );
            }
        }
    }




}
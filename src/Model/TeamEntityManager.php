<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\DTO\TableDataTransferObject;
use App\Model\Mapper\TableMapper;
use App\Model\Mapper\TeamDetailsMapper;
use App\Table;
use PDO;


class TeamEntityManager
{


    public function __construct(TableMapper $teamDetailsMapper)
    {
        $this->tableMapper = $teamDetailsMapper;
    }


    public function savePlTeamInformation($teamFinalArray)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');
        $teams = ($teamFinalArray['teams']);

        foreach ($teams as $teamDetails) {


            $exists = 'SELECT * from teamsInfo WHERE name = :name';
            $stmt2 = $pdo->prepare($exists);
            $stmt2->execute(
                [
                    'name' => $teamDetails['name'],
                ]
            );
            $teamDB = $stmt2->fetch();

            if ($teamDB === false) {
                $query1 = "INSERT INTO teamsInfo (league,name,shortName,tla,adresse,phone,website,email,founded,clubColor,venue) VALUES (:league,:name,:shortName,:tla,:adresse,:phone,:website,:email,:founded,:clubColor,:venue)";
                $stmt = $pdo->prepare($query1);

                $params = [
                    'league' => 'PremiereLeague',
                    'name' => $teamDetails['name'],
                    'shortName' => $teamDetails['shortName'],
                    'tla' => $teamDetails['tla'],
                    'phone' => $teamDetails['phone'],
                    'adresse' => $teamDetails['address'],
                    'website' => $teamDetails['website'],
                    'email' => $teamDetails['email'],
                    'founded' => (string)$teamDetails['founded'],
                    'clubColor' => $teamDetails['clubColor'],
                    'venue' => $teamDetails['venue'],
                ];

                $stmt->execute(
                    $params
                );
            }
        }

    }

    public function saveBlTeamInformation($teamFinalArray)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');
        $teams = ($teamFinalArray['teams']);

        foreach ($teams as $teamDetails) {
            $exists = 'SELECT * from teamsInfo WHERE name = :name';
            $stmt2 = $pdo->prepare($exists);
            $stmt2->execute(
                [
                    'name' => $teamDetails['name'],
                ]
            );
            $teamDB = $stmt2->fetch();

            if ($teamDB === false) {

                $query1 = "INSERT INTO teamsInfo  (league,name,shortName,tla,adresse,phone,website,email,founded,clubColor,venue) VALUES (:league,:name,:shortName,:tla,:adresse,:phone,:website,:email,:founded,:clubColor,:venue)";
                $stmt = $pdo->prepare($query1);
                $stmt->execute(
                    [
                        'league' => 'BundesLiga',
                        'name' => $teamDetails['name'],
                        'shortName' => $teamDetails['shortName'],
                        'tla' => $teamDetails['tla'],
                        'adresse' => $teamDetails['address'],
                        'phone' => $teamDetails['phone'],
                        'website' => $teamDetails['website'],
                        'email' => $teamDetails['email'],
                        'founded' => $teamDetails['founded'],
                        'clubColor' => $teamDetails['clubColors'],
                        'venue' => $teamDetails['venue']
                    ]
                );
            }
        }
    }
}

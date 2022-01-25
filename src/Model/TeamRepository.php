<?php
declare(strict_types=1);

namespace App\Model;


use App\Model\DTO\TeamDataTransferObject;
use App\Model\Mapper\TeamDetailsMapper;
use PDO;

require __DIR__ . '/../../vendor/autoload.php';


class TeamRepository
{
    private TeamDetailsMapper $teamDetailsMapper;

    public function __construct(TeamDetailsMapper $teamDetailsMapper)
    {
        $this->teamDetailsMapper = $teamDetailsMapper;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function readPLTeamInformation(): array
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');

        $query = $pdo->prepare("Select * FROM teamsInfo WHERE league = 'PremiereLeague'");
        $query->execute();

        $result = $query->fetchAll();
        return $this->teamDetailsMapper->mapToDTO($result);
    }

    public function readBLTeamInformation(): array
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');

        $query = $pdo->prepare("Select * FROM teamsInfo WHERE league = 'BundesLiga'");
        $query->execute();

        $result = $query->fetchAll();
        return $this->teamDetailsMapper->mapToDTO($result);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function getOneTeamByName(string $name): TeamDataTransferObject
    {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3336;dbname=football', 'root', 'demo');

        $query = $pdo->prepare("Select * FROM teamsInfo WHERE Name = :name");
        $query->execute(
            [

                'name'=> $name

            ]
        );



        $result = $query->fetch();
        $mapper = new TeamDetailsMapper();
        return $mapper->mapToDTO($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

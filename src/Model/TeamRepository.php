<?php
declare(strict_types=1);

namespace App\Model;


use App\Core\PdoConnect;
use App\Model\DTO\TeamDataTransferObject;
use App\Model\Mapper\TeamDetailsMapper;
use PDO;



class TeamRepository
{
    private TeamDetailsMapper $teamDetailsMapper;

    public function __construct(TeamDetailsMapper $teamDetailsMapper)
    {
        $this->teamDetailsMapper = $teamDetailsMapper;
    }



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function getOneTeamByName(string $name): TeamDataTransferObject
    {


        $queryStatement = "Select * FROM teamsInfo WHERE Name = :name ";
        $query = new PdoConnect();

        $result = $query->fetch($queryStatement, ['name'=> $name]);
        $mapper = new TeamDetailsMapper();
        return $mapper->mapToDTO($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

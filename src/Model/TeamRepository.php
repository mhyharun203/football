<?php
declare(strict_types=1);


namespace App\Model;

use App\Core\Api;
use App\Model\DTO\TeamDataTransferObject;
use App\Model\Mapper\TableMapper;
use App\Model\Mapper\TeamDetailsMapper;
use App\Table;

set_include_path(__DIR__ . '/../../src');


class TeamRepository
{
    private TeamDetailsMapper $teamDetailsMapper;

    public function __construct(TeamDetailsMapper $teamDetailsMapper)
    {
        $this->teamDetailsMapper = $teamDetailsMapper;

    }

    public function saveTeamInformation($teamFinalArray)
    {


        $json = json_encode($teamFinalArray, JSON_PRETTY_PRINT);
        file_put_contents("teamDetail.json", $json);
        return $teamFinalArray;
    }

    public function readTeamInformation()
    {

        $teamDetail = file_get_contents('teamDetail.json', true);
        $finalTable = json_decode($teamDetail, true);
        return $this->teamDetailsMapper->mapToDTO($finalTable);
    }


    /**
     * @param string $name
     *
     * @return array
     */
    public function getOneTeamByName(string $name): ?TeamDataTransferObject
    {
        $teams = $this->readTeamInformation();
        $teamDataTransferObject = new TeamDataTransferObject();
        foreach ($teams as $team) {
            if ($team->getTeamName() === $name) {
                $teamDataTransferObject = $team;
            }
        }
        return $teamDataTransferObject;

    }
}


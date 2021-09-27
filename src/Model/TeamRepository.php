<?php
declare(strict_types=1);


namespace App\Model;

use App\Core\Api;
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

}


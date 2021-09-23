<?php
declare(strict_types=1);


namespace App\Model;

use App\Core\Api;

class TeamRepository
{


    public function saveTeamInformation($teamFinalArray)
    {


        $json = json_encode($teamFinalArray);
        file_put_contents("teamDetail.json", $json);
        return $teamFinalArray;
    }

    public function readTeamInformation($teamFinalArray)
    {

        $json = json_decode($teamFinalArray);
        file_put_contents("teamDetail.json", $json);
        return $teamFinalArray;
    }

}


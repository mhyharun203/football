<?php

namespace App\Controller;

use App\Core\Api;
use App\Model\TeamRepository;

class TeamDetailController

{
    private API $apiInterface;


    public function __construct(Api $apiInterface)
    {
        $this->apiInterface = $apiInterface;
    }

    public function teamDetailAction()
    {
        $this->apiInterface->getTeams();
        $allTeamInformation = $this->apiInterface->getTeams();
        $allTeamInformationDisplay = $this->getOneTeamDetail($allTeamInformation);
        $repository = new TeamRepository();
        $repository->saveTeamInformation($allTeamInformationDisplay);
    }


    public function getOneTeamDetail($allTeamInformationDisplay)
    {

        $teamFinalArray = [];
        foreach ($allTeamInformationDisplay['teams'] as $team) {

            $teamName = $team['name'];
            $teamShortName = $team['shortName'];
            $teamTla = $team['tla'];
            $teamAddress = $team['address'];
            $teamPhone = $team['phone'];
            $teamWebsite = $team['website'];
            $teamEmail = $team['email'];
            $teamClubColors = $team['clubColors'];
            $teamVenue = $team['venue'];

            $teamFinalArray[] =
                [
                    'name' => $teamName,
                    'shortname' => $teamShortName,
                    'tla' => $teamTla,
                    'adress' => $teamAddress,
                    'phone' => $teamPhone,
                    'website' => $teamWebsite,
                    'email' => $teamEmail,
                    'clubColors' => $teamClubColors,
                    'venue' => $teamVenue


                ];

        }
        return $teamFinalArray;
    }
}










<?php

namespace App\Controller;

use App\Model\DTO\TeamDataTransferObject;
use App\Model\TeamRepository;

class TeamDetailController

{
    private TeamRepository $teamRepository;


    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }




    public function teamDetailAction(): array
    {

       $rawTeamDetailInformation = $this->teamRepository->readTeamInformation();
        return $this->getOneTeamDetail($rawTeamDetailInformation);

    }



    /**
     * @param TeamDataTransferObject [] $teamInfo
     * @return array
     */

    public function getOneTeamDetail(array $teamInfo)
    {

        foreach ($teamInfo as $team) {

            $teamName = $team->getTeamName();
            $teamShortName = $team->getTeamShortName();
            $teamTla = $team->getTeamTla();
            $teamAddress = $team->getTeamAddress();
            $teamPhone = $team->getTeamClubColors();
            $teamWebsite = $team->getTeamWebsite();
            $teamEmail = $team->getTeamEmail();
            $teamClubColors = $team->getTeamClubColors();
            $teamVenue = $team->getTeamVenue();

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










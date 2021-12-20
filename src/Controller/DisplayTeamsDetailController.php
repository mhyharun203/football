<?php

namespace App\Controller;

class DisplayTeamsDetailController implements ControllerInterface
{

    public function render(array $teamInfo)^^


    {
        foreach ($teamInfo as $team) {

            $teamName = $team->teamName;
            $teamShortName = $team->getTeamShortName();
            $teamTla = $team->getTeamTla();
            $teamAddress = $team->getTeamAddress();
            $teamWebsite = $team->getTeamWebsite();
            $teamClubColors = $team->getTeamClubColors();
            $teamVenue = $team->getTeamVenue();

            $teamFinalArray[] =
                [
                    'name' => $teamName,
                    'shortname' => $teamShortName,
                    'tla' => $teamTla,
                    'adress' => $teamAddress,
                    'website' => $teamWebsite,
                    'clubColors' => $teamClubColors,
                    'venue' => $teamVenue

                ];
        }
        return $teamFinalArray;
    }
}



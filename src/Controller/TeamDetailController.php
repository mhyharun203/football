<?php

namespace App\Controller;

use App\Model\DTO\TeamDataTransferObject;
use App\Model\TeamRepository;
use App\TwigView;

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
        return $this->getTeamsDetail($rawTeamDetailInformation);

    }

    public function oneTeamDetailAction(string $team) : void
    {
        $rawTeamDetailInformation = $this->teamRepository->getOneTeamByName($team);

        $clickedTeam = $this->getTeamsDetail([$rawTeamDetailInformation]);
        $b = new TwigView();
        $b->render('teamDetail.twig', 'teamDTO', $clickedTeam);
    }


    /**
     * @param TeamDataTransferObject [] $teamInfo
     * @return array
     */

    private function getTeamsDetail(array $teamInfo)
    {
        foreach ($teamInfo as $team) {

            $teamName = $team->getTeamName();
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










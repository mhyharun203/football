<?php

namespace App\Controller;

use App\Model\DTO\TeamDataTransferObject;
use App\Model\TeamRepository;
use App\TwigView;
use App\ViewInterface;

class TeamDetailController

{
    private TeamRepository $teamRepository;
    /**
     * @var \App\ViewInterface
     */
    private ViewInterface $view;

    /**
     * @param \App\Model\TeamRepository $teamRepository
     * @param \App\ViewInterface $view
     */
    public function __construct(
        TeamRepository $teamRepository,
        ViewInterface  $view
    )
    {
        $this->teamRepository = $teamRepository;
        $this->view = $view;
    }

    /**
     * @return array
     */
    public function teamDetailAction(): array
    {
        $rawTeamDetailInformation = $this->teamRepository->readTeamInformation();

        return $this->getTeamsDetail($rawTeamDetailInformation);
    }

    /**
     * @param string $team
     *
     * @return void
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function oneTeamDetailAction(string $team): void
    {
        $rawTeamDetailInformation = $this->teamRepository->getOneTeamByName($team);

        $clickedTeam = $this->getTeamsDetail([$rawTeamDetailInformation]);

        $this->view->render('teamDetail.twig', [
            'teamDTO' => $clickedTeam,
        ]);
    }

    /**
     * @param TeamDataTransferObject [] $teamInfo
     *
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










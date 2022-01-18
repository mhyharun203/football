<?php

namespace App\Controller;

use App\Model\TableRepository;
use App\ViewInterface;

class DisplayLeagueController implements ControllerInterface
{
    private TableRepository $tableRepository;
    private ViewInterface $view;

    public function __construct(
        TableRepository $tableRepository,
        ViewInterface   $view
    )
    {
        $this->tableRepository = $tableRepository;
        $this->view = $view;
    }

    /**
     *
     */

    public function render(): string

    {


        $league = $_GET ['league'];

        $leagueList = [
            'BL' => $this->tableRepository->readPLTable(),
            'PL' => $this->tableRepository->readBLTable()];


        foreach ($leagueList as $key => $leagueInfo) {


            if ($league !== $key) {
                $this->view->init();
                return $this->view->render('table.twig', [
                    'tableArray' => $this->getTableContent($leagueInfo),
                    'league' => $league,

                ]);
            }
        }

        return '';
    }


    private function getTableContent(array $table)
    {
        foreach ($table as $team) {

            $teamName = $team->getName();
            $teamPosition = $team->getPosition();
            $teamPoints = $team->getPoints();
            $teamWins = $team->getWins();
            $teamLoses = $team->getLoses();
            $teamDraws = $team->getDraws();


            $teamFinalArray[] = ['name' => $teamName,
                'position' => $teamPosition,
                'points' => $teamPoints,
                'wins' => $teamWins,
                'loses' => $teamLoses,
                'draws' => $teamDraws
            ];
        }
        return $teamFinalArray;
    }


}
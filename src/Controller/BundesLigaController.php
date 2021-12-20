<?php

namespace App\Controller;


use App\Controller\ControllerInterface;
use App\Model\TableRepository;
use App\ViewInterface;

class BundesLigaController implements ControllerInterface
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

    public function render(): void
    {
        $rawTable = $this->tableRepository->readBLTable();
        $this->view->init();
        $this->view->render('table.twig', [
            'tableArray' => $this->getTableContent($rawTable)
        ]);
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

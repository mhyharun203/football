<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\DTO\TableDataTransferObject;
use App\Model\TableRepository;
use App\ViewInterface;

class TableController
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

    public function chooseLeague()
    {
        $PL = 'Premier League';
        $BL1 = 'Bundesliga';
        $this->view->init();
        $this->view->render('index.twig', ['PL' => $PL, 'BL' => $BL1]);
    }

    public function PLTableAction(): void
    {
        $rawTable = $this->tableRepository->readTable();
        $this->view->init();
        $this->view->render('table.twig', [
            'tableArray' => $this->getTableContent($rawTable)
        ]);

    }

    public function BLTableAction(): void
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

<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\DTO\TableDataTransferObject;
use App\Model\TableRepository;
use App\ViewInterface;

class TableController
{
    private TableRepository $tableRepository;
    /**
     * @var \App\ViewInterface
     */
    private ViewInterface $view;

    /**
     * @param \App\Model\TableRepository $tableRepository
     * @param \App\ViewInterface $view
     */
    public function __construct(
        TableRepository $tableRepository,
        ViewInterface $view
    )
    {
        $this->tableRepository = $tableRepository;
        $this->view = $view;
    }

    /**
     * @return void
     */
    public function tableAction(): void
    {
        $rawTable = $this->tableRepository->readTable();

        $this->view->render('table.twig', [
            'tableArray' => $this->getTableContent($rawTable)
        ]);
    }


    /**
     * @param TableDataTransferObject [] $table
     * @return array
     */
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

<?php

namespace App\Controller;
use App\Model\DTO\TeamDataTransferObject;
use App\Model\TeamRepository;
use App\ViewInterface;


class OneTeamDetailController implements ControllerInterface
{
    public function __construct(
        TeamRepository $teamRepository,
        ViewInterface  $view
    )
    {
        $this->teamRepository = $teamRepository;
        $this->view = $view;
    }



    private $teamRepository;

    public function render(): void
    {
        $team = $_GET['team'];

        $this->view->init();
        $this->view->render('teamDetail.twig', [
            'teamDataTransferObject' => (array)$this->teamRepository->getOneTeamByName($team),
        ]);
    }
}
<?php


namespace App\Controller;

use App\Controller\ControllerInterface;
use App\Model\TableRepository;
use App\ViewInterface;


class ChooseLeagueController implements ControllerInterface
{

    private ViewInterface $view;


    public function __construct(
        TableRepository $tableRepository,
        ViewInterface   $view
    )
    {
        $this->tableRepository = $tableRepository;
        $this->view = $view;
    }

    public function render() :void
    {
        $PL = 'Premier League';
        $BL1 = 'Bundesliga';
        $this->view->init();
        $this->view->render('index.twig', ['PL' => $PL, 'BL' => $BL1]);
    }



}


<?php

declare(strict_types=1);

use App\Controller\TableController;

require __DIR__ . '/../vendor/autoload.php';

$twig = new \App\TwigView();

if (!isset($_GET['team'])) {
    $tableMapper = new \App\Model\Mapper\TableMapper();
    $tableRepository = new \App\Model\TableRepository($tableMapper);
    $tableController = new TableController($tableRepository, $twig);
    $tableController->tableAction();
} else {
    $teamMapper = new \App\Model\Mapper\TeamDetailsMapper();
    $teamRepository = new \App\Model\TeamRepository($teamMapper);
    $teamDetailController = new \App\Controller\TeamDetailController($teamRepository, $twig);
    $teamDetailController->teamDetailAction();
    $teamArray = ($teamDetailController->teamDetailAction());
    $teamArray = array($teamArray);
    $teamDetailController->oneTeamDetailAction($_GET['team']);
}




















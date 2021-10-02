<?php

declare(strict_types=1);

use App\Controller\TableController;

require __DIR__ . '/../vendor/autoload.php';

use App\Model\DTO\TableDataTransferObject;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\TwigView;


$loader = new \Twig\Loader\FilesystemLoader('View');
$twig = new \Twig\Environment($loader);



$tableMapper = new \App\Model\Mapper\TableMapper();
$tableRepository = new \App\Model\TableRepository($tableMapper);
$tableController = new TableController($tableRepository);

$tableController->tableAction();
$tableArray = ($tableController->tableAction());

$teamMapper = new \App\Model\Mapper\TeamDetailsMapper();
$teamRepository = new \App\Model\TeamRepository($teamMapper);
$teamDetailController = new \App\Controller\TeamDetailController($teamRepository);
$teamDetailController->teamDetailAction();
$teamArray = ($teamDetailController->teamDetailAction());
$teamArray = array($teamArray);


if (!isset($_GET['team'])) {
    echo $twig->render('table.twig', ["tableArray" => $tableArray]);
} else {
$a = $teamDetailController->oneTeamDetailAction($_GET['team']);

}




















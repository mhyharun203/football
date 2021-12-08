<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use App\Controller\TableController;
use App\Controller\TeamDetailController;
use App\Model\Mapper\TeamDetailsMapper;
use App\Model\TableRepository;
use App\Model\TeamRepository;
use App\TwigView;

$container = new \App\Core\Container();
$dependencyProvider = new \App\Core\DependencyProvider();
$dependencyProvider->provideDependencies($container);


$twig = new \App\TwigView();
$twig->init();


$tableController = new TableController($container->get(TableRepository::class), $container->get(TwigView::class));
$tableController->chooseLeague();


if (isset($_GET['leaguePL'])) {

    $tableController = new TableController($container->get(TableRepository::class), $container->get(TwigView::class));
    $tableController->PLtableAction();

} elseif (isset($_GET['leaguePL?team'])) {

    $teamDetailController = new TeamDetailController($container->get(TeamRepository::class), $container->get(TwigView::class));


    $teamDetailController->oneTeamDetailAction($_GET['leaguePL?team']);
}
if (isset($_GET['leagueBL1'])) {

    $tableController = new TableController($container->get(TableRepository::class), $container->get(TwigView::class));
    $tableController->BLtableAction();
}




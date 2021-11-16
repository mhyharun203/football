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

if (!isset($_GET['team'])) {
    $tableController = new TableController($container->get(TableRepository::class), $container->get(TwigView::class));
    $tableController->tableAction();
} else {
    $teamDetailController = new TeamDetailController($container->get(TeamRepository::class), $container->get(TwigView::class));
    $teamDetailController->teamDetailAction();
    $teamArray = ($teamDetailController->teamDetailAction());
    $teamArray = array($teamArray);
    $teamDetailController->oneTeamDetailAction($_GET['team']);
}



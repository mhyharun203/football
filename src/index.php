<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



use App\Model\TableRepository;
use App\Model\TeamRepository;
use App\TwigView;
use App\Controller\ChooseLeagueController;
use App\Controller\DisplayLeagueController;
use App\Controller\BundesLigaController;
use Twig\Environment;




$container = new \App\Core\Container();
$dependencyProvider = new \App\Core\DependencyProvider();
$dependencyProvider->provideDependencies($container);


$twig = new \App\TwigView();
$twig->init();


$controllerList = [
    '' => new ChooseLeagueController($container->get(TableRepository::class), $container->get(TwigView::class)),
    'DisplayLeague' => new DisplayLeagueController($container->get(TableRepository::class), $container->get(TwigView::class)),
    'league' => new \App\Controller\OneTeamDetailController($container->get(TeamRepository::class), $container->get(TwigView::class))
    ];

$page = $_GET['page'] ?? '';

foreach ($controllerList as $key => $controller) {
    if ($page === $key) {
        $controller->render();
    }
}

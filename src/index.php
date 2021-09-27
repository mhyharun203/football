<?php

declare(strict_types=1);

use App\Controller\TableController;

require __DIR__ . '/../vendor/autoload.php';

use App\Model\DTO\TableDataTransferObject;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


$loader = new \Twig\Loader\FilesystemLoader('View');
$twig = new \Twig\Environment($loader);

echo $twig->render('index.twig', ['name' => 'John Doe',
    'occupation' => 'gardener']);



$tableMapper = new \App\Model\Mapper\TableMapper();
$tableRepository = new \App\Model\TableRepository($tableMapper);
$tableController = new TableController($tableRepository);

$tableController->tableAction();
$tableArray = ($tableController->tableAction());

$teamMapper = new \App\Model\Mapper\TeamDetailsMapper();
$teamRepository = new \App\Model\TeamRepository($teamMapper);
$teamDetailController = new \App\Controller\TeamDetailController($teamRepository );
//$teamDetailController->teamDetailAction();




    if (!isset($_GET['team'])) {
        echo $twig->render('table.twig', ["tableArray" => $tableArray]);
    }else {
        foreach ($tableArray as $finalTableArray)
            if ($_GET['team'] === $finalTableArray['name']) {
                echo $finalTableArray['name'];
            }
    }




















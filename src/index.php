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



$b = new \App\Model\Mapper\TableMapper();
$a = new \App\Model\TableRepository($b);

$c = new TableController($a);
$c->tableAction();




















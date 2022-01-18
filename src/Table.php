<?php
declare(strict_types=1);

namespace App;


use App\Core\Api;
use App\Model\Mapper\TableMapper;
use App\Model\TableRepository;

require __DIR__ . '/../vendor/autoload.php';


class Table
{



    public function triggerApiForPL()
    {
        $api = new Api();
        $rawTable = $api->getPlStandings();
        $tableMapper = new TableMapper;
        $repository = new TableRepository($tableMapper);
        $repository->savePLTable($rawTable);
        return $rawTable;

    }


    public function triggerApiForBL()
    {
        $api = new Api();
        $rawTable = $api->getBLStandings();
        $tableMapper = new TableMapper;
        $repository = new TableRepository($tableMapper);
        $repository->saveBlTable($rawTable);
        return $rawTable;

    }


}

$c = new \App\Core\Api();
$a = new \App\Table($c);
$a->triggerApiForPL();


$api = new Api();
$Table = new Table($api);
$Table->triggerApiForBL();





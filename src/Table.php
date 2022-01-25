<?php
declare(strict_types=1);

namespace App;


use App\Core\Api;
use App\Model\Mapper\TableMapper;
use App\Model\TableEntityManager;
use App\Model\TableRepository;

require __DIR__ . '/../vendor/autoload.php';


class Table
{



    public function triggerApiForPL()
    {
        $api = new Api();
        $rawTable = $api->getPlStandings();
        $tableMapper = new TableMapper;
        $tableEntityManager = new TableEntityManager($tableMapper);
        $tableEntityManager->savePLTable($rawTable);
        return $rawTable;

    }


    public function triggerApiForBL()
    {
        $api = new Api();
        $rawTable = $api->getBLStandings();
        $tableMapper = new TableMapper;
        $tableEntityManager = new TableEntityManager($tableMapper);
        $tableEntityManager->saveBlTable($rawTable);
        return $rawTable;

    }


}

$a = new \App\Table();
$a->triggerApiForPL();


$Table = new Table();
$Table->triggerApiForBL();





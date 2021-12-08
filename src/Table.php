<?php
declare(strict_types=1);

namespace App;

use App\Core\Api;
use App\Core\ApiInterface;
use App\Model\Mapper\TableMapper;
use App\Model\TableRepository;

require __DIR__ . '/../vendor/autoload.php';


class Table
{

    private ApiInterface $api;


    public function __construct(ApiInterface $api)
    {

        $this->api = $api;
    }


    public function triggerApi()
    {
        $rawTable = $this->api->getPlStandings();
        $tableMapper = new TableMapper;
        $repository = new TableRepository($tableMapper);
        $repository->saveTable($rawTable);
        return $rawTable;

    }


    public function triggerApiForBL()
    {

        $rawTable = $this->api->getBLStandings();
        $tableMapper = new TableMapper;
        $repository = new TableRepository($tableMapper);
        $repository->saveBlTable($rawTable);
        return $rawTable;

    }


}

$c = new \App\Core\Api();
$a = new \App\Table($c);
$a->triggerApi();


$api = new Api();
$Table = new Table($api);
$Table->triggerApiForBL();





<?php
declare(strict_types=1);

namespace App;

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
        $this->api->getPlStandings();
        $rawTable = $this->api->getPlStandings();
        $a = new TableMapper;
        $repository = new TableRepository($a);
        $repository->saveTable($rawTable);
        return $rawTable;

    }


}

$c = new \App\Core\Api();
$a = new \App\Table($c);
$a->triggerApi();




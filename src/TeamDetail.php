<?php
declare(strict_types=1);

namespace App;

use App\Core\Api;
use App\Core\ApiInterface;
use App\Core\Container;
use App\Core\DependencyProvider;
use App\Model\Mapper\TableMapper;
use App\Model\Mapper\TeamDetailsMapper;
use App\Model\TableEntityManager;
use App\Model\TeamEntityManager;
use App\Model\TeamRepository;

require __DIR__ . '/../vendor/autoload.php';


class TeamDetail
{


    public function triggerPLApi()
    {
        $api = new Api();
        $rawTable = $api->getPLTeams();
        $teamDetialsMapper = new TeamDetailsMapper();
        $tableEntityManager = new TeamEntityManager($teamDetialsMapper);
        $tableEntityManager->savePlTeamInformation($rawTable);
        return $rawTable;

    }


    public function triggerBLApi()
    {
        $api = new Api();
        $rawTable = $api->getBLTeams();
        $teamDetailsMapper = new TeamDetailsMapper();
        $teamEntityManager = new TeamEntityManager($teamDetailsMapper);
        $teamEntityManager->saveBlTeamInformation($rawTable);
        return $rawTable;

    }


}

$a = new \App\TeamDetail();
$a->triggerPLApi();


$Table = new TeamDetail();
$Table->triggerBlApi();

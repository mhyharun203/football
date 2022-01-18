<?php
declare(strict_types=1);

namespace App;

use App\Core\Api;
use App\Core\ApiInterface;
use App\Core\Container;
use App\Core\DependencyProvider;
use App\Model\Mapper\TeamDetailsMapper;
use App\Model\TeamRepository;

require __DIR__ . '/../vendor/autoload.php';


class TeamDetail
{


    private TeamRepository $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {

        $this->teamRepository = $teamRepository;
    }


    public function triggerPLApi()
    {
        $container = new Container();
        $dependencyProvider = new DependencyProvider();
        $dependencyProvider->provideDependencies($container);

        $api = $container->get(Api::class);

        $api->getPLTeams();
        $rawTeamInformation = $api->getPLTeams();
        $this->teamRepository->savePLTeamInformation($rawTeamInformation);
        dump($rawTeamInformation);
        return $rawTeamInformation;
    }


    public function triggerBLApi()
    {
        $container = new Container();
        $dependencyProvider = new DependencyProvider();
        $dependencyProvider->provideDependencies($container);

        $api = $container->get(Api::class);


        $api->getBLTeams();
        $rawTeamInformation = $api->getBLTeams();
        $this->teamRepository->saveBLTeamInformation($rawTeamInformation);
        return $rawTeamInformation;

    }


}

$teamMapper = new TeamDetailsMapper();
$apiPL = new \App\Core\Api();
$teamRepository = new TeamRepository($teamMapper);
$teamDetailPL = new \App\TeamDetail($teamRepository,$apiPL);
$teamDetailPL->triggerBLApi();



$teamDetailBL = new \App\TeamDetail($teamRepository,$apiPL);
$teamDetailBL->triggerPLApi();

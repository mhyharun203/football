<?php
declare(strict_types=1);
namespace App;

use App\Core\ApiInterface;
use App\Model\TeamRepository;

require __DIR__ . '/../vendor/autoload.php';



class TeamDetail
{

    private ApiInterface $api;


    public function __construct(ApiInterface $api)
    {

        $this->api = $api;
    }


    public function triggerPLApi()
    {
        $this->api->getPLTeams();
        $rawTeamInformation = $this->api->getPLTeams();
        $repository = new TeamRepository();
        $repository->saveTeamInformation($rawTeamInformation);
        return $rawTeamInformation;

    }


    public function triggerBL1Api()
    {
        $this->api->getBLTeams();
        $rawTeamInformation = $this->api->getBLTeams();
        $repository = new TeamRepository();
        $repository->saveTeamInformation($rawTeamInformation);
        return $rawTeamInformation;

    }





}
$c = new \App\Core\Api();
$a = new \App\TeamDetail($c);
$a->triggerPLApi();

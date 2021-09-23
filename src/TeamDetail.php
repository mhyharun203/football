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


    public function triggerApi()
    {
        $this->api->getTeams();
        $rawTeamInformation = $this->api->getTeams();
        $repository = new TeamRepository();
        $repository->saveTeamInformation($rawTeamInformation);
        return $rawTeamInformation;

    }


}
$c = new \App\Core\Api();
$a = new \App\TeamDetail($c);
$a->triggerApi();

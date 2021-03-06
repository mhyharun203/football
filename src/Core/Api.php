<?php
declare(strict_types=1);

namespace App\Core;

class Api implements ApiInterface
{


    private function callApi(string $uri): array
    {
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token:3c03798f19d54d6e8d641691763d899f';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);

        return json_decode($response, true);
    }

    public function getPlStandings(): array
    {
        $uri = 'http://api.football-data.org/v2/competitions/PL/standings';

        return $this->callApi($uri);

    }

    public function getTeams(): array
    {
        $uri = 'http://api.football-data.org/v2/competitions/PL/teams';
        return $this->callApi($uri);

    }

}

$a = new Api();
$a->getPlStandings();
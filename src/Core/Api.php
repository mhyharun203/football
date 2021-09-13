<?php declare(strict_types=1);

namespace App\Core;

class Api implements ApiInterface
{
    public function getPlStandings(): array
    {
        $uri = 'http://api.football-data.org/v2/competitions/PL/standings';
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token:3c03798f19d54d6e8d641691763d899f';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        
        return json_decode($response, true);
    }
}

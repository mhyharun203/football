<?php
declare(strict_types=1);

namespace App\Controller;

class TableApi
{

    public function getPlStandings()
    {
        $uri = 'http://api.football-data.org/v2/competitions/PL/standings';
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token:3c03798f19d54d6e8d641691763d899f';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $matches = json_decode($response, true);

        return $this->getTableContent($matches['standings'][0]['table']);

    }

    private function getTableContent($table): array
    {

        $teamFinalArray = [];
        foreach ($table as $team) {
            $teamName = $team['team']['name'];
            $teamPosition = $team['position'];
            $teamFinalArray[] = ['name' => $teamName,
                'position' => $teamPosition,
            ];


        }
        return $teamFinalArray;

    }
}


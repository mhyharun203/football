<?php
declare(strict_types=1);

namespace App\Controller;

use App\Core\ApiInterface;

class TableController
{
    /**
     * @var \App\Core\ApiInterface
     */
    private ApiInterface $api;

    /**
     * @param \App\Core\ApiInterface $api
     */
    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }

    public function tableAction()
    {
        $matches = $this->api->getPlStandings();

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


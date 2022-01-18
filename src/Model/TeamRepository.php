<?php
declare(strict_types=1);

namespace App\Model;


use App\Model\DTO\TeamDataTransferObject;
use App\Model\Mapper\TeamDetailsMapper;

require __DIR__ . '/../../vendor/autoload.php';


class TeamRepository
{
    private TeamDetailsMapper $teamDetailsMapper;

    public function __construct(TeamDetailsMapper $teamDetailsMapper)
    {
        $this->teamDetailsMapper = $teamDetailsMapper;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function savePLTeamInformation($teamFinalArray)
    {

        $json = json_encode($teamFinalArray, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . '/../teamDetail.json', $json);
        return $teamFinalArray;
    }

    public function saveBLTeamInformation($teamFinalArray)
    {

        $json = json_encode($teamFinalArray, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . '/../BundesLigaTeamDetail.json', $json);
        return $teamFinalArray;
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function readPLTeamInformation(): array
    {

        $teamDetail = file_get_contents(__DIR__ . '/../teamDetail.json');
        $finalTable = json_decode($teamDetail, true);
        return $this->teamDetailsMapper->mapToDTO($finalTable);
    }


    public function readBLTeamInformation(): array
    {

        $teamDetail = file_get_contents(__DIR__ . '/../BundesLigaTeamDetail.json');
        $finalTable = json_decode($teamDetail, true);
        return $this->teamDetailsMapper->mapToDTO($finalTable);
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * @param string $name
     *
     * @return array
     */
    public function getOneTeamByName(string $name, string $league): ?TeamDataTransferObject
    {
        $teams = $this->readPLTeamInformation();

        if ($league === 'BL') {
            $teams = $this->readBLTeamInformation();
        }

        $teamDataTransferObject = new TeamDataTransferObject();
        foreach ($teams as $team) {
            if ($team->getTeamName() === $name) {
                $teamDataTransferObject = $team;
            }
        }
        return $teamDataTransferObject;
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

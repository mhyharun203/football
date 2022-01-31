<?php
declare(strict_types=1);


namespace App\Model\Mapper;

use App\Model\DTO\TableDataTransferObject;
use App\Model\DTO\TeamDataTransferObject;

class TeamDetailsMapper
{


    /**
     * @param array $finalTeamInfo
     * @return TeamDataTransferObject
     */
    public function mapToDTO(array $teamInfo): TeamDataTransferObject
    {


        $teamDTO = new TeamDataTransferObject();
        $teamDTO->setTeamName($teamInfo['shortName']);
        $teamDTO->setTeamShortName($teamInfo['tla']);
        $teamDTO->setTeamAddress($teamInfo['adresse']);
        $teamDTO->setTeamWebsite($teamInfo['website']);
        $teamDTO->setTeamVenue($teamInfo['venue']);


        return $teamDTO;
    }
}
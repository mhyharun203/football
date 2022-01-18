<?php
declare(strict_types=1);


namespace App\Model\Mapper;

use App\Model\DTO\TableDataTransferObject;
use App\Model\DTO\TeamDataTransferObject;

class TeamDetailsMapper
{


    /**
     * @param array $finalTeamInfo
     * @return TeamDataTransferObject[]
     */
    public function mapToDTO(array $teamInfo): array
    {
        $arrayTeamDTO = [];

        foreach ($teamInfo['teams'] as $finalTeamInfo) {


            $teamDTO = new TeamDataTransferObject();

            $teamDTO->setTeamName($finalTeamInfo['name']);
            $teamDTO->setTeamShortName($finalTeamInfo['shortName']);
            $teamDTO->setTeamTla($finalTeamInfo['tla']);
            $teamDTO->setTeamAddress($finalTeamInfo['address']);
            $teamDTO->setTeamWebsite($finalTeamInfo['website']);
            $teamDTO->setTeamClubColors($finalTeamInfo['clubColors']);
            $teamDTO->setTeamVenue($finalTeamInfo['venue']);

            $arrayTeamDTO[] = $teamDTO;
        }
        return $arrayTeamDTO;
    }
}
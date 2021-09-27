<?php
declare(strict_types=1);


namespace App\Model\Mapper;

use App\Model\DTO\TableDataTransferObject;
use App\Model\DTO\TeamDataTransferObject;

class TeamDetailsMapper
{


    /**
     * @param array $finalTeamInfo
     * @return TeamDataTransferObject []
     */
    public function mapToDTO(array $teamInfo): array
    {
        $arrayTeamDTO = [];

        foreach ($teamInfo as $finalTeamInfo) {


            $teamDTO = new TeamDataTransferObject();


            $teamDTO->setTeamName($finalTeamInfo['name']);
            $teamDTO->setTeamShortName($finalTeamInfo['shortname']);
            $teamDTO->setTeamTla($finalTeamInfo['tla']);
            $teamDTO->setTeamAddress($finalTeamInfo['adress']);
            $teamDTO->setTeamWebsite($finalTeamInfo['website']);
            $teamDTO->setTeamEmail($finalTeamInfo['email']);
            $teamDTO->setTeamClubColors($finalTeamInfo['clubColors']);
            $teamDTO->setTeamVenue($finalTeamInfo['venue']);

            $arrayTeamDTO[] = $teamDTO;
        }
        return $arrayTeamDTO;
    }
}
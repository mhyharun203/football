<?php
declare(strict_types=1);


namespace App\Model\Mapper;

use App\Model\DTO\TeamDataTransferObject;

class TeamDetailsMapper
{
    public function map(array $TeamDetail): TeamDataTransferObject
    {
        $TeamDTO = new TeamDataTransferObject();


        $TeamDTO->teamName = $TeamDetail['name'];
        $TeamDTO->teamShortName = $TeamDetail['shortname'] ?? '';
        $TeamDTO->teamTla = $TeamDetail['tla'] ?? '';
        $TeamDTO->teamAddress = $TeamDetail ['adress'];
        $TeamDTO->teamPhone = $TeamDetail ['phone'];
        $TeamDTO->teamWebsite = $TeamDetail ['website'];
        $TeamDTO->teamEmail = $TeamDetail['email'];
        $TeamDTO->teamClubColors = $TeamDetail ['clubColors'];
        $TeamDTO->teamVenue = $TeamDetail ['venue'];


        return $TeamDTO;
    }
}
<?php
declare(strict_types=1);


namespace App\Model\DTO;

class TeamDataTransferObject
{

    public string $teamName;
    public string $teamShortName;
    public string $teamTla;
    public string $teamAddress;
    public string $teamWebsite;
    public string $teamClubColors;
    public string $teamVenue;


    public function getTeamName(): string
    {
        return $this->teamName;
    }


    public function setTeamName(string $teamName): void
    {
        $this->teamName = $teamName;
    }


    public function getTeamShortName(): string
    {
        return $this->teamShortName;
    }


    public function setTeamShortName(string $teamShortName): void
    {
        $this->teamShortName = $teamShortName;
    }


    public function getTeamTla(): string
    {
        return $this->teamTla;
    }


    public function setTeamTla(string $teamTla): void
    {
        $this->teamTla = $teamTla;
    }


    public function getTeamAddress(): string
    {
        return $this->teamAddress;
    }


    public function setTeamAddress(string $teamAddress): void
    {
        $this->teamAddress = $teamAddress;
    }




    public function getTeamWebsite(): string
    {
        return $this->teamWebsite;
    }


    public function setTeamWebsite(string $teamWebsite): void
    {
        $this->teamWebsite = $teamWebsite;
    }





    public function getTeamClubColors(): string
    {
        return $this->teamClubColors;
    }


    public function setTeamClubColors(string $teamClubColors): void
    {
        $this->teamClubColors = $teamClubColors;
    }


    public function getTeamVenue(): string
    {
        return $this->teamVenue;
    }


    public function setTeamVenue(string $teamVenue): void
    {
        $this->teamVenue = $teamVenue;
    }

}
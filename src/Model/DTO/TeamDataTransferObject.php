<?php
declare(strict_types=1);


namespace App\Model\DTO;

class TeamDataTransferObject
{

    private string $teamName;
    private string $teamShortName;
    private string $teamTla;
    private string $teamAddress;
    private string $teamPhone;
    private string $teamWebsite;
    private string $teamEmail;
    private string $teamClubColors;
    private string $teamVenue;


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


    public function getTeamPhone(): string
    {
        return $this->teamPhone;
    }


    public function setTeamPhone(string $teamPhone): void
    {
        $this->teamPhone = $teamPhone;
    }


    public function getTeamWebsite(): string
    {
        return $this->teamWebsite;
    }


    public function setTeamWebsite(string $teamWebsite): void
    {
        $this->teamWebsite = $teamWebsite;
    }


    public function getTeamEmail(): string
    {
        return $this->teamEmail;
    }


    public function setTeamEmail(string $teamEmail): void
    {
        $this->teamEmail = $teamEmail;
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
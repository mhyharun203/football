<?php
declare(strict_types=1);


namespace AppTest;

use App\Model\Mapper\TeamDetailsMapper;
use App\Model\TeamRepository;
use PHPUnit\Framework\TestCase;


class TeamRepositoryTest extends TestCase
{
    public function testReadTeamInformation()
    {
        $mapper = new TeamDetailsMapper();
        $TeamRepository = new TeamRepository($mapper);


        self::assertCount(20, $TeamRepository->readTeamInformation());


    }

    private $testTeam = [

        "name" => "Arsenal FC",
        "shortname" => "Arsenal",
        "tla" => "ARS",
        "adress" => "75 Drayton Park London N5 1BU",
        "phone" => "+44 (020) 76195003",
        "website" => "http:\/\/www.arsenal.com",
        "email" => "info@arsenal.co.uk",
        "clubColors" => "Red \/ White",
        "venue" => "Emirates Stadium"


    ];


    public function testSaveTeamInformation()
    {
        $mapper = new TeamDetailsMapper();
        $teamRepository = new TeamRepository($mapper);
        $tableData = json_decode(file_get_contents(__DIR__ . '/teamDetail.json'), true);

        $this->assertSame($this->testTeam["name"], $teamRepository->saveTeamInformation());


    }
}

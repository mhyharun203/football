<?php
declare(strict_types=1);


namespace AppTest;

use App\Model\DTO\TeamDataTransferObject;
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
        "venue" => "Emirates Stadium" ];





    public function testSaveTeamInformation()
    {
        $teamRepository = new class {

            /**
             * @param $teamFinalArray
             */
            public function saveTeamInformation($teamFinalArray): void
            {
                $json = json_encode($teamFinalArray, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . '/teamDetail.json', $json);
            }
        };

        $teamRepository->saveTeamInformation($this->testTeam);

        $tableData = json_decode(file_get_contents(__DIR__ . '/teamDetail.json'), true);

        $this->assertSame($this->testTeam['name'], $tableData['name']);
        $this->assertSame($this->testTeam['shortname'], $tableData['shortname']);
        $this->assertSame($this->testTeam['tla'], $tableData['tla']);
        $this->assertSame($this->testTeam['adress'], $tableData['adress']);
        $this->assertSame($this->testTeam['phone'], $tableData['phone']);
        $this->assertSame($this->testTeam['website'], $tableData['website']);
        $this->assertSame($this->testTeam['email'], $tableData['email']);
        $this->assertSame($this->testTeam['clubColors'], $tableData['clubColors']);
        $this->assertSame($this->testTeam['venue'], $tableData['venue']);
    }

}
<?php
declare(strict_types=1);


namespace AppTests\Repository;

use App\Model\Mapper\TableMapper;
use App\Model\TableRepository;

use PHPUnit\Framework\TestCase;

class TableRepositoryTest extends TestCase
{
    public function testReadPLTable()
    {
        $mapper = new TableMapper();
        $TableRepository = new TableRepository($mapper);


        self::assertCount(20, $TableRepository->readPlTable());
    }


    public function testReadBLTable()
    {
        $mapper = new TableMapper();
        $TableRepository = new TableRepository($mapper);


        self::assertCount(18, $TableRepository->readBLTable());
    }




    private $testTable = [

        "table" => [

            "position" => 1,
            "team" => [
                "id" => 61,
                "name" => "Chelsea FC",
            ]
        ]
    ];


    public function testSavePLTable()
    {
        $tableRepository = new class {

            /**
             * @param $teamFinalArray
             */
            public function saveTableInformation($teamFinalArray): void
            {
                $json = json_encode($teamFinalArray, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . '/PLTable.json', $json);
            }
        };





        $tableRepository->saveTableInformation($this->testTable);

        $tableData = json_decode(file_get_contents(__DIR__ . '/PLTable.json'), true);

        $this->assertSame($this->testTable['table']['position'], $tableData['table']['position']);
        $this->assertSame($this->testTable['table']['team']['id'], $tableData['table']['team']['id']);
        $this->assertSame($this->testTable['table']['team']['name'], $tableData['table']['team']['name']);

    }

    public function testSaveBLTable()
    {
        $tableRepository = new class {

            /**
             * @param $teamFinalArray
             */
            public function saveTableInformation($teamFinalArray): void
            {
                $json = json_encode($teamFinalArray, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . '/BLTable.json', $json);
            }
        };

        $tableRepository->saveTableInformation($this->testTable);

        $tableData = json_decode(file_get_contents(__DIR__ . '/BLTable.json'), true);

        $this->assertSame($this->testTable['table']['position'], $tableData['table']['position']);
        $this->assertSame($this->testTable['table']['team']['id'], $tableData['table']['team']['id']);
        $this->assertSame($this->testTable['table']['team']['name'], $tableData['table']['team']['name']);
    }
}



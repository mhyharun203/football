<?php
declare(strict_types=1);


namespace AppTest;

use App\Model\Mapper\TableMapper;
use App\Model\TableRepository;

use PHPUnit\Framework\TestCase;

class TableRepositoryTest extends TestCase
{
    public function testReadTable()
    {
        $mapper = new TableMapper();
        $TableRepository = new TableRepository($mapper);


        self::assertCount(20, $TableRepository->readTable());
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



    public function testSaveTableInformation()
    {
        $tableRepository = new class {

            /**
             * @param $teamFinalArray
             */
            public function saveTableInformation($teamFinalArray): void
            {
                $json = json_encode($teamFinalArray, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . '/table.json', $json);
            }
        };
        $tableRepository->saveTableInformation($this->testTable);

        $tableData = json_decode(file_get_contents(__DIR__ . '/table.json'), true);

        $this->assertSame($this->testTable['table']['position'], $tableData['table']['position']);
        $this->assertSame($this->testTable['table']['team']['id'], $tableData['table']['team']['id']);
        $this->assertSame($this->testTable['table']['team']['name'], $tableData['table']['team']['name']);

    }
}



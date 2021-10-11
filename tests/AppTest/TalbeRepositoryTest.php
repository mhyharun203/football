<?php
declare(strict_types=1);


namespace AppTest;

use App\Model\Mapper\TableMapper;
use App\Model\TableRepository;
use App\Table;
use PHPUnit\Framework\TestCase;

class TalbeRepositoryTest extends TestCase
{
    public function testReadTable()
    {
        $mapper = new TableMapper();
        $TableRepository = new TableRepository($mapper);


        self::assertCount(20, $TableRepository->readTable());
    }


public function testSaveTable() {
        $mapper = new TableMapper();
        $TableRepository = new TableRepository($mapper);


        self::assertCount(20, $TableRepository->readTable());


}

}



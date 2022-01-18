<?php
declare(strict_types=1);

namespace AppTests;

use App\Core\ApiInterface;
use App\Model\Mapper\TeamDetailsMapper;
use App\Model\TeamRepository;
use App\TeamDetail;
use PHPUnit\Framework\TestCase;


class StubTest extends TestCase {
public function testStub() {
    $stub = $this->getMockBuilder(TeamDetail::class)
    ->disableOriginalConstructor()
        ->disableOriginalClone()
        ->disableArgumentCloning()
        ->disallowMockingUnknownTypes()
        ->getMock();

}





}
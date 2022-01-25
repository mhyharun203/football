<?php
declare(strict_types=1);


namespace AppTest;

use App\Core\Api;
use App\Core\ApiInterface;
use App\Core\Container;
use App\Core\DependencyProvider;
use App\Model\Mapper\TableMapper;
use App\Model\TableRepository;


use App\Table;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{


    public function testTriggerApiForPL()
    {

        $container = new Container();
        $dependencyProvider = new DependencyProvider();
        $dependencyProvider->provideDependencies($container);


        $api = $container->get(Api::class);
        $rawTable = $api->getPlStandings();

        $repository = $container->get(TableRepository::class);
        $repository->savePLTable($rawTable);
        $Table = new Table();

        self::assertCount(4, $Table->triggerApiForBL());

    }


    public function testTriggerApiForBL()
    {

        $container = new Container();
        $dependencyProvider = new DependencyProvider();
        $dependencyProvider->provideDependencies($container);


        $api = $container->get(Api::class);
        $rawTable = $api->getPlStandings();
        $repository = $container->get(TableRepository::class);

        $repository->savePLTable($rawTable);
        $Table = new Table();

        self::assertCount(4, $Table->triggerApiForPL());


    }
}

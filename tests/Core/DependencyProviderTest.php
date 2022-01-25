<?php
declare(strict_types=1);

namespace AppTests\Core;


use App\Core\Container;
use App\Core\DependencyProvider;
use App\Model\Mapper\TableMapper;
use App\Model\Mapper\TeamDetailsMapper;
use App\Model\TableRepository;

class DependencyProviderTest extends \PHPUnit\Framework\TestCase
{

    public function testProvideDependencies()
    {
        $dependencyProvider = new DependencyProvider();
        $container = new Container();
        $dependencyProvider->provideDependencies($container);
        $TableMapperFromContainer = $container->get(TableMapper::class);


        self::assertInstanceOf(TableMapper::class, $TableMapperFromContainer);

    }

    public function testProvideDependenciesNegativ()
    {
        $dependencyProvider = new DependencyProvider();
        $container = new Container();
        $dependencyProvider->provideDependencies($container);
        $TeamDetailsMapperFromContainer = $container->get(TeamDetailsMapper::class);


        self::assertNotInstanceOf(TableMapper::class, $TeamDetailsMapperFromContainer);

    }





}
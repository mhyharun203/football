<?php
declare(strict_types=1);


namespace AppTests\Controller;

use App\Controller\ChooseLeagueController;
use App\Core\Container;
use App\Core\DependencyProvider;
use App\Model\Mapper\TableMapper;
use App\Model\TableRepository;
use App\TwigView;
use PHPUnit\Framework\TestCase;

class ChooseLeagueControllerTest extends TestCase
{


    public function testChooseLeague()
    {
        $container = new \App\Core\Container();
        $dependencyProvider = new \App\Core\DependencyProvider();
        $dependencyProvider->provideDependencies($container);


        $view = $container->get(TwigView::class);
        $tableRepository = $container->get(TableRepository::class);


        $controller = new ChooseLeagueController($tableRepository, $view);

        $output = $controller->render();
        $this->assertStringContainsString('Premier League', $output);
        $this->assertStringContainsString('Bundesliga', $output);

    }

}
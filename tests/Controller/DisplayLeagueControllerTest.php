<?php

namespace AppTests\Controller;
use App\Controller\ChooseLeagueController;
use App\Model\TableRepository;
use App\TwigView;
use PHPUnit\Framework\TestCase;

class DisplayLeagueControllerTest extends TestCase
{


    public function testDisplayLeague()
    {
        $container = new \App\Core\Container();
        $dependencyProvider = new \App\Core\DependencyProvider();
        $dependencyProvider->provideDependencies($container);


        $view = $container->get(TwigView::class);
        $tableRepository = $container->get(TableRepository::class);

        $_GET ['league'] = '';

        $controller = new \App\Controller\DisplayLeagueController($tableRepository, $view);

        $output = $controller->render();

        $this->assertStringContainsString('FC Bayern München', $output);


    }
}


<?php
declare(strict_types=1);


namespace AppTest;

use App\Controller\ChooseLeagueController;
use App\Controller\OneTeamDetailController;
use App\Core\Container;
use App\Core\DependencyProvider;
use App\Model\TeamRepository;
use App\TwigView;
use PHPUnit\Framework\TestCase;


class OneTeamDetailControllerTest extends TestCase
{

    public function testOneTeamDetailController()
    {

        $container = new Container();
        $dependencyProvier = new DependencyProvider();
        $dependencyProvier->provideDependencies($container);

        $teamRepository = $container->get(TeamRepository::class);
        $view = $container->get(TwigView::class);


        $controller = new OneTeamDetailController($teamRepository, $view);
        $_GET['team'] = '';
        $_GET['league'] = '';

        $output = $controller->render();
        $this->assertStringContainsString('name', $output);


    }


}
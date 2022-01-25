<?php declare(strict_types=1);

namespace App\Core;

use App\Controller\DisplayTeamsDetailController;
use App\Controller\OneTeamDetailController;
use App\Controller\TableController;
use App\Controller\TeamDetailController;
use App\Model\Mapper\TableMapper;
use App\Model\Mapper\TeamDetailsMapper;
use App\Model\TableEntityManager;
use App\Model\TableRepository;
use App\Model\TeamRepository;
use App\TwigView;

class DependencyProvider implements DependencyProviderInterface
{
    /**
     * @param \App\Core\ContainerInterface $container
     */
    public function provideDependencies(ContainerInterface $container): void
    {


        $container->set(TableMapper::class, new TableMapper());
        $container->set(TeamDetailsMapper::class, new TeamDetailsMapper());
        $container->set(Api::class, new Api());
        $container->set(TableEntityManager::class, new TableEntityManager($container->get(TableMapper::class)));

        $container->set(TableRepository::class, new TableRepository($container->get(TableMapper::class)));
        $container->set(TeamRepository::class, new TeamRepository($container->get(TeamDetailsMapper::class)));
        $container->set(PdoConnect::class, new PdoConnect());

        $container->set(Api::class, new Api());
        $container->set(TwigView::class, new TwigView());
        $container->set(OneTeamDetailController::class, new OneTeamDetailController($container->get(TeamRepository::class), $container->get(TwigView::class)));
    }
}
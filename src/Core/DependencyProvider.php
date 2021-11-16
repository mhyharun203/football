<?php declare(strict_types=1);

namespace App\Core;

use App\Controller\TableController;
use App\Controller\TeamDetailController;
use App\Model\Mapper\TableMapper;
use App\Model\Mapper\TeamDetailsMapper;
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

        $teamDetailsMapper = new TeamDetailsMapper();
        $container->set(TableRepository::class, new TableRepository($container->get(TableMapper::class)));
        $container->set(TeamRepository::class, new TeamRepository($teamDetailsMapper));

        $container->set(Api::class, new Api());
        $container->set(TwigView::class, new TwigView());


    }
}
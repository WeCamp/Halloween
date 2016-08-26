<?php

namespace Halloween\TrickOrTreat\Container\Projection\Game;

use Halloween\TrickOrTreat\Projection\Game\MongodbGameReadRepository;
use Interop\Container\ContainerInterface;

final class MongodbGameReadRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return MongodbGameReadRepository
     */
    public function __invoke(ContainerInterface $container)
    {
        return new MongodbGameReadRepository($container->get('mongo_client'));
    }
}

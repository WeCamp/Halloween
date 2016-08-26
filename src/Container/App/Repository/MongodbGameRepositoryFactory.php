<?php

namespace Halloween\TrickOrTreat\Container\App\Repository;

use Halloween\TrickOrTreat\Infrastructure\Repository\MongodbGameRepository;
use Interop\Container\ContainerInterface;

final class MongodbGameRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return MongodbGameRepository
     */
    public function __invoke(ContainerInterface $container)
    {
        return new MongodbGameRepository($container->get('mongo_client'));
    }
}

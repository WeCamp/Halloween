<?php

namespace Halloween\TrickOrTreat\Container\App\Action;

use Halloween\TrickOrTreat\App\Action\GetCurrentGame;
use Halloween\TrickOrTreat\Infrastructure\Repository\MongodbGameRepository;
use Interop\Container\ContainerInterface;

final class GetCurrentGameFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return GetCurrentGame
     */
    public function __invoke(ContainerInterface $container)
    {
        return new GetCurrentGame($container->get(MongodbGameRepository::class));
    }
}

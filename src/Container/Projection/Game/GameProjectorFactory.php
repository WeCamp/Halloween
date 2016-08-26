<?php

namespace Halloween\TrickOrTreat\Container\Projection\Game;

use Halloween\TrickOrTreat\Projection\Game\GameProjector;
use Interop\Container\ContainerInterface;
use MongoClient;

final class GameProjectorFactory
{
    /**
     * @param ContainerInterface $container
     * @return GameProjector
     */
    public function __invoke(ContainerInterface $container)
    {
        return new GameProjector($container->get('mongo_client'));
    }
}

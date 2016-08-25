<?php

namespace Halloween\TrickOrTreat\Container\Infrastructure\Game;

use Halloween\TrickOrTreat\Infrastructure\Repository\EventStoreGame;
use Interop\Container\ContainerInterface;
use Prooph\EventStore\Container\Aggregate\AbstractAggregateRepositoryFactory;

final class EventStoreGameFactory extends AbstractAggregateRepositoryFactory
{
    /**
     * Returns the container identifier
     *
     * @return string
     */
    public function containerId()
    {
        return 'game';
    }
}

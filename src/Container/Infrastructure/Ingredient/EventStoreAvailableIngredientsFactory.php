<?php

namespace Halloween\TrickOrTreat\Container\Infrastructure\Ingredient;

use Halloween\TrickOrTreat\Infrastructure\Repository\EventStoreAvailableIngredients;
use Interop\Container\ContainerInterface;
use Prooph\EventStore\Container\Aggregate\AbstractAggregateRepositoryFactory;

final class EventStoreAvailableIngredientsFactory extends AbstractAggregateRepositoryFactory
{
    /**
     * Returns the container identifier
     *
     * @return string
     */
    public function containerId()
    {
        return 'available_ingredients';
    }
}

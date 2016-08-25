<?php

namespace Halloween\TrickOrTreat\Container\Projection\Ingredient;

use Halloween\TrickOrTreat\Projection\Ingredient\IngredientProjector;
use Interop\Container\ContainerInterface;
use MongoClient;

final class IngredientProjectorFactory
{
    /**
     * @param ContainerInterface $container
     * @return IngredientProjector
     */
    public function __invoke(ContainerInterface $container)
    {
        return new IngredientProjector($container->get('mongo_client'));
    }
}

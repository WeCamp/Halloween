<?php

namespace Halloween\TrickOrTreat\Container\Infrastructure\Ingredient;

use Halloween\TrickOrTreat\Infrastructure\Repository\InMemoryAvailableIngredients;
use Interop\Container\ContainerInterface;

final class InMemoryAvailableIngredientsFactory
{
    /**
     * @param ContainerInterface $container
     * @return InMemoryAvailableIngredients
     */
    public function __invoke(ContainerInterface $container)
    {
        return new InMemoryAvailableIngredients();
    }
}
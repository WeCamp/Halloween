<?php

namespace Halloween\TrickOrTreat\Container\Domain\Ingredient;

use Halloween\TrickOrTreat\Domain\Ingredient\AvailableIngredients;
use Halloween\TrickOrTreat\Domain\Ingredient\Handler\AddIngredientHandler;
use Interop\Container\ContainerInterface;

final class AddIngredientHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return AddIngredientHandler
     */
    public function __invoke(ContainerInterface $container)
    {
        return new AddIngredientHandler($container->get(AvailableIngredients::class));
    }
}

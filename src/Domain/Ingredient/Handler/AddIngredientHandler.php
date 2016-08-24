<?php

namespace Halloween\TrickOrTreat\Domain\Ingredient\Handler;

use Halloween\TrickOrTreat\Domain\Ingredient\AvailableIngredients;
use Halloween\TrickOrTreat\Domain\Ingredient\Command\AddIngredient;
use Halloween\TrickOrTreat\Domain\Ingredient\Ingredient;

class AddIngredientHandler
{
    /**
     * @var AvailableIngredients
     */
    private $availableIngredients;

    /**
     * AddIngredientHandler constructor.
     * @param AvailableIngredients $availableIngredients
     */
    public function __construct(AvailableIngredients $availableIngredients)
    {
        $this->availableIngredients = $availableIngredients;
    }

    /**
     * @param AddIngredient $command
     */
    public function __invoke(AddIngredient $command)
    {
        $ingredient = Ingredient::add($command->ingredientId(), $command->name());
        $this->availableIngredients->add($ingredient);
    }
}

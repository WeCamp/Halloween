<?php

namespace spec\Halloween\TrickOrTreat\Domain\Ingredient\Handler;

use Halloween\TrickOrTreat\Domain\Ingredient\AvailableIngredients;
use Halloween\TrickOrTreat\Domain\Ingredient\Command\AddIngredient;
use Halloween\TrickOrTreat\Domain\Ingredient\Ingredient;
use Halloween\TrickOrTreat\Domain\Ingredient\IngredientId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin \Halloween\TrickOrTreat\Domain\Ingredient\Handler\AddIngredientHandler
 */
class AddIngredientHandlerSpec extends ObjectBehavior
{
    function it_should_add_an_ingredient(AvailableIngredients $availableIngredients)
    {
        $this->beConstructedWith($availableIngredients);
        $ingredientId = IngredientId::generate();

        $availableIngredients->add(Argument::type(Ingredient::class))->shouldBeCalled();

        $this(AddIngredient::withData($ingredientId, 'pepper'));
    }
}

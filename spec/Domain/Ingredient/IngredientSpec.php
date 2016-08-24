<?php

namespace spec\Halloween\TrickOrTreat\Domain\Ingredient;

use Halloween\TrickOrTreat\Domain\Ingredient\IngredientId;
use PhpSpec\ObjectBehavior;

/**
 * @mixin \Halloween\TrickOrTreat\Domain\Ingredient\Ingredient
 */
class IngredientSpec extends ObjectBehavior
{
    function it_should_record_that_it_was_added()
    {
        $ingredientId = IngredientId::generate();
        $this->beConstructedThrough('add', [$ingredientId, 'pepper']);

        $this->shouldHaveRecorded(IngredientWasAdded::class);
    }
}
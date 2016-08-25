<?php

namespace Halloween\TrickOrTreat\Infrastructure\Repository;

use Halloween\TrickOrTreat\Domain\Ingredient\AvailableIngredients;
use Prooph\EventStore\Aggregate\AggregateRepository;
use Halloween\TrickOrTreat\Domain\Ingredient\Ingredient;
use Halloween\TrickOrTreat\Domain\Ingredient\IngredientId;

/**
 * Class EventStoreAvailableIngredients
 */
final class EventStoreAvailableIngredients extends AggregateRepository implements AvailableIngredients
{
    /**
     * @param Ingredient $ingredient
     * @return void
     */
    public function add(Ingredient $ingredient)
    {
        $this->addAggregateRoot($ingredient);
    }

    /**
     * @param IngredientId $ingredientId
     * @return Ingredient
     */
    public function get(IngredientId $ingredientId)
    {
        return $this->getAggregateRoot($ingredientId->toString());
    }
}

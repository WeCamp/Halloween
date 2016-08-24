<?php

namespace Halloween\TrickOrTreat\Domain\Ingredient;

use Halloween\TrickOrTreat\Domain\Ingredient\Event\IngredientWasAdded;
use Prooph\EventSourcing\AggregateRoot;

class Ingredient extends AggregateRoot
{
    /**
     * @var IngredientId
     */
    private $aggregateId;

    /**
     * @var string $name
     */
    private $name;

    public static function add(IngredientId $ingredientId, $name)
    {
        $ingredient = new self;
        $ingredient->recordThat(IngredientWasAdded::withData($ingredientId, $name));

        return $ingredient;
    }

    /**
     * @return string representation of the unique identifier of the aggregate root
     */
    protected function aggregateId()
    {
        return $this->aggregateId->toString();
    }

    protected function whenIngredientWasAdded(IngredientWasAdded $event)
    {
        $this->aggregateId = $event->ingredientId();
        $this->name = $event->name();
    }
}

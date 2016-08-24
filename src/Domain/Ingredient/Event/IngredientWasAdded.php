<?php
namespace Halloween\TrickOrTreat\Domain\Ingredient\Event;

use Halloween\TrickOrTreat\Domain\Ingredient\IngredientId;
use Prooph\EventSourcing\AggregateChanged;


class IngredientWasAdded extends AggregateChanged
{
    public static function withData(IngredientId $ingredientId, $name)
    {
        return self::occur($ingredientId->toString(), ['name' => (string)$name]);
    }

    /**
     * @return IngredientId
     */
    public function ingredientId()
    {
        return IngredientId::fromString($this->aggregateId());
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->payload['name'];
    }
}

<?php

namespace Halloween\TrickOrTreat\Domain\Ingredient;

class Ingredient
{
    /**
     * @var IngredientId
     */
    private $ingredientId;

    /**
     * @var string $name//
     */
    private $name;

    private function __construct(IngredientId $ingredientId, $name)
    {
        $this->ingredientId = $ingredientId;
        $this->name = $name;
    }

    public static function add(IngredientId $ingredientId, $name)
    {
        $ingredient = new Ingredient($ingredientId, $name);

        return $ingredient;
    }
}

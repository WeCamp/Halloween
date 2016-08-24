<?php

namespace Halloween\TrickOrTreat\Infrastructure\Repository;

use Halloween\TrickOrTreat\Domain\Ingredient\AvailableIngredients;
use Halloween\TrickOrTreat\Domain\Ingredient\Ingredient;
use Halloween\TrickOrTreat\Domain\Ingredient\IngredientId;

class InMemoryAvailableIngredients implements AvailableIngredients
{
    public function add(Ingredient $ingredient)
    {
//        var_dump($ingredient);
    }

    public function get(IngredientId $ingredientId)
    {
       return Ingredient::add($ingredientId, 'pepper');
    }


}
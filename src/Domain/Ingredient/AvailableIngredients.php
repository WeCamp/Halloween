<?php

namespace Halloween\TrickOrTreat\Domain\Ingredient;


interface AvailableIngredients
{

    public function add(Ingredient $ingredient);

    public function get(IngredientId $ingredientId);


}

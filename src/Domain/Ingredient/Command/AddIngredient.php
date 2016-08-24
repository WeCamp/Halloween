<?php
/**
 * Created by PhpStorm.
 * User: marieke
 * Date: 24-08-16
 * Time: 15:07
 */

namespace Halloween\TrickOrTreat\Domain\Ingredient\Command;


use Halloween\TrickOrTreat\Domain\Ingredient\IngredientId;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class AddIngredient extends Command implements PayloadConstructable
{
    use PayloadTrait;

    public static function withData(IngredientId $ingredientId, $name)
    {
        return new self(['ingredientId' => $ingredientId->toString(),'name' => $name]);
    }

    /**
     * @return IngredientId
     */
    public function ingredientId()
    {
        return IngredientId::fromString($this->payload['ingredientId']);
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->payload['name'];
    }
}

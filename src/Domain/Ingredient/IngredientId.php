<?php

namespace Halloween\TrickOrTreat\Domain\Ingredient;

use Rhumsaa\Uuid\Uuid;

class IngredientId
{
    /**
     * @var Uuid
     */
    private $uuid;

    /**
     * @return IngredientId
     */
    public static function generate()
    {
        return new self(Uuid::uuid4());
    }

    /**
     * @param $ingredientId
     * @return IngredientId
     */
    public static function fromString($ingredientId)
    {
        return new self(Uuid::fromString($ingredientId));
    }

    /**
     * @param Uuid $uuid
     */
    private function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->uuid->toString();
    }

    /**
     * @param IngredientId $other
     * @return bool
     */
    public function sameValueAs(IngredientId $other)
    {
        return $this->toString() === $other->toString();
    }
}

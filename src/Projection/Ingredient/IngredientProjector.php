<?php

namespace Halloween\TrickOrTreat\Projection\Ingredient;

use Halloween\TrickOrTreat\Domain\Ingredient\Event\IngredientWasAdded;
use MongoClient;

/**
 * Class IngredientProjector
  */
final class IngredientProjector
{
    /**
     * @var \MongoCollection $collection
     */
    private $collection;

    public function __construct(MongoClient $client)
    {
        $db = $client->trick_or_treat;
        $this->collection = $db->ingredient;
    }

    /**
     * @param IngredientWasAdded $event
     */
    public function onIngredientWasAdded(IngredientWasAdded $event)
    {
        $document = ['name' => $event->name()];
        $this->collection->insert($document);
    }
}

<?php

namespace Halloween\TrickOrTreat\Projection\Game;

use Halloween\TrickOrTreat\Domain\Game\GameId;
use MongoClient;

/**
 * Class MongodbGameReadRepository
 */
final class MongodbGameReadRepository
{
    /**
     * @var \MongoCollection $collection
     */
    private $collection;

    public function __construct(MongoClient $client)
    {
        $db = $client->trick_or_treat;
        $this->collection = $db->game;
    }

    /**
     * @param GameId $gameId
     * @return array|null
     */
    public function getGame(GameId $gameId)
    {
        $result = $this->collection->find(['gameId' => $gameId->toString()]);

        foreach ($result as $document) {
            return $document;
        }

        return null;
    }
}
